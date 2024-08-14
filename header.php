<?php
session_abort();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adidas Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
     </head>
<body>
<?php
if (isset($_SESSION['usuario'])) {
    echo "Hola " . $_SESSION['usuario'];
}else{
    ?>
<div class="header">
    <a href="login.php" class="button">Inicar Sesión </a>
<?php
}
?>
<nav>
    <img src="media/logo-adidas.webp" alt="Logo Adidas">
    <!--        menu-->
    <div class="menu">
        <a href="#mujer">Mujer</a>
        <a href="#hombre">Hombre</a>
        <a href="#infantil">Infantil</a>
        <a href="#zapatillas">Zapatillas</a>
        <a href="#contacto">Contacto</a>
    </div>

</nav>
