<?php
session_start();
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
    <script src="js/script.js"></script>
</head>
<body>
<div class="header">
<?php
if (isset($_SESSION["usuario"])){
    echo "<img src='media/user.svg' alt='Iniciar Sesión' class='icono'> ".$_SESSION['usuario'];


}else{
?>
    <a href="login.php" class="icono"><img src="media/user.svg" alt="Iniciar Sesión"></a>
<?php
}?>
<a href='carrito.php' class="icono"><img src='media/carrito.svg' alt='Resumen de la compra'></a>
    <?php
        if(isset($_SESSION["totalProductos"])){
            echo $_SESSION["totalProductos"];
        }
    ?>
</div>

<nav>
    <img src="media/logo-adidas.webp" alt="Logo Adidas">
    <!--        menu-->
    <div class="menu">
        <a href="index.php#mujer">Mujer</a>
        <a href="index.php#hombre">Hombre</a>
        <a href="index.php#infantil">Infantil</a>
        <a href="index.php#zapatillas">Zapatillas</a>
        <a href="index.php#contacto">Contacto</a>
    </div>

</nav>
