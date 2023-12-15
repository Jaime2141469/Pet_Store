import KEYS from "../assets/keys.js";

const $d = document;
const $mascotas = $d.getElementById("mascotas");
const $template = $d.getElementById("mascota-template").content;
const $fragmento = $d.createDocumentFragment();
const options = { headers: {Authorization: `Bearer ${KEYS.secret}`}}
const formatoDeMoneda = num => `$ ${num.slice(0, -2)}.${num.slice(-2)}`;

let products, prices;

Promise.all([
    fetch("https://api.stripe.com/v1/products", options),
    fetch("https://api.stripe.com/v1/prices", options)
])
.then(responses => Promise.all(responses.map(res => res.json())))
.then(json => {
    products = json[0].data;
    prices = json[1].data;

    prices.forEach(el => {
        let productData = products.filter(product => product.id === el.product);
        
        $template.querySelector(".mascota").setAttribute("data-price", el.id);
        $template.querySelector("img").src = productData[0].images[0];
        $template.querySelector("img").alt = productData[0].name;
        $template.querySelector("figcaption").innerHTML = `${productData[0].name} ${formatoDeMoneda(el.unit_amount_decimal)} ${(el.currency).toUpperCase()}`;

        let $clone = $d.importNode($template, true);

        $fragmento.appendChild($clone)
    });

    $mascotas.appendChild($fragmento);
})
.catch(error => {
    let message = error.statuText || "Ocurrió un error en la peticion";

    $mascotas.innerHTML = `Error: ${error.status}: ${message}`
})

$d.addEventListener("click", e => {
    if (e.target.matches(".mascotas *")) {
        let priceId = e.target.parentElement.getAttribute("data-price");

        Stripe(KEYS.public).redirectToCheckout({
            lineItems: [{
                price: priceId,
                quantity: 1
            }],
            mode: "subscription",
            successUrl: "http://localhost/pagina/pasarela_pagos/assets/success.html",
            cancelUrl: "http://localhost/pagina/pasarela_pagos/assets/cancel.html"
        })
        .then(res => {
            if (res.error) {
                $mascotas.insertAdjacentElement("afterend", res.error.message);
            }
        })
    }
})