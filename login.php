<?php
include_once "header.php";
if(!isset($_SESSION["usuario"])){
?>
<div class="container-2">
    <div class="izquierda">
    <h2>Inicio de sesión</h2>
    <form action="controlador.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        <input type="submit" name="iniciarSesion" value="Iniciar Sesión" class="boton">
    </form>
</div>
    <div class="derecha">
    <h2>Registro de Nuevo Usuario</h2>
    <form action="controlador.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        <label for="password2">Repetir Contraseña</label>
        <input type="password" id="password2" name="password2">
        <input type="submit" name="crearUsuario" value="Crear Usuario" class="boton">
    </form>
    </div>
</div>
<?php
    if (!empty($_GET["mensaje"])) {
        echo $_GET["mensaje"]; //darle estilo de error
    }
}
?>
