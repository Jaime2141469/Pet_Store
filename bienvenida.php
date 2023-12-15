<?php 

    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo '
        
            <script>
            
                alert("Por favor debes iniciar sesion");
                window.location = "login.php";

            </script>
        
        ';
        session_destroy();
        die();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="icon" href="img/bg.ico">
</head>
<body>
    <img src="https://flagcdn.com/160x120/co.png" alt="colombia">
    <h1>BIENVENIDO A LA PAGINA</h1>
    <a href="php/cerrar_sesion.php">Cerrar sesion</a>
</body>
</html>