<?php
include_once "header.php";
if(!isset($_SESSION["usuario"])){
?>
<div class="container">
    <h2>Inicio de sesión</h2>
    <form action="controlador.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="Iniciar Sesión" class="boton">
    </form>

<?php
    if (!empty($_GET["mensaje"])) {
        echo $_GET["mensaje"]; //darle estilo de error
    }
}
?>
</div>