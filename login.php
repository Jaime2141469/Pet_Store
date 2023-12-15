<?php 

    session_start();

    if (isset($_SESSION['usuario'])) {
        header("location: bienvenida.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store | Login & Register</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="icon" href="img/bg.ico">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar a la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesion</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesion</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <div class="contenedor__login-register">
                <form method="post" action="php/login_usuario_be.php" class="formulario__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" name="correo" id="" placeholder="Correo Electronico">
                    <input type="password" name="contrasena" id="" placeholder="Contraseña">
                    <button>Entrar</button>
                    <button><a href="index.html">Regresar</a></button>
                </form>

                <form method="post" action="php/registro_usuario_be.php" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" name="nombre_completo" id="" placeholder="Nombre Completo">
                    <input type="text" name="correo" id="" placeholder="Correo Electronico">
                    <input type="text" name="usuario" id="" placeholder="Usuario">
                    <input type="password" name="contrasena" id="" placeholder="Contraseña">
                    <button><a href="index.html">Regresar</a></button>
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script2.js"></script>
</body>
</html>