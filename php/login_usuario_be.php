<?php

    session_start();

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'");

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;
        header("location: ../pasarela_pagos/index.html");
        exit();
    }else {
        echo '
        
            <script>
                alert("Usuario no existe, intente con otro o verifique los datos");
                window.location = "../login.php";
            </script>

        ';
        exit();
    }

?>