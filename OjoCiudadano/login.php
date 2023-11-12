<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link rel="icon" href="assets/img/ojociudadanoVec.png" type="image/png">
    <link rel="stylesheet" href="assets/css/log.css">
</head>
<body>
    <a class="btn-1" href="index.html">Página principal</a>
    <form action="sesion.php" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
            //Comprobar si existe una sesion
            if(isset($_SESSION['user'])){
                header("Location: adminIndex.php");
            }
        ?>
        <h2>Iniciar sesión</h2>
        <p>Correo electrónico: <br>
        <input type="text" name="username" placeholder="Ingresa tu nombre de usuario"></p>
        <p>Contraseña: <br>
        <input type="password" name="password" placeholder="Ingresa tu contraseña"></p>
        <p class="center"><input type="submit" class=".input-submit" value="Iniciar Sesión"></p>
    </form>
</body>
</html>