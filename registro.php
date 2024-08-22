<?php
include_once "header.php";
if(!isset($_SESSION["usuario"])){
?>
<div class="container">
    <h2>Nueva Cuenta</h2>
    <form action="controlador.php" method="post">
        <label for="nombre">Nombre y Apellidos</label>
        <input type="text" id="nombre" name="nombre">
        <label for="usuario">Usuario (nick name)</label>
        <input type="text" id="usuario" name="usuario">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
         <label for="password">Repetir Contraseña</label>
        <input type="password" id="password2" name="password2">
           <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
           <label for="telelfono">Teléfono</label>
        <input type="text" id="telelfono" name="telefono">
        <input type="checkbox" value="acepta"><a href="politicas.php">Acepta las políticas de Privacidad y Protección de Datos</a>
        <input type="submit" value="Crear Usuario" class="boton" name="crear">
    </form>

<?php
    if (!empty($_GET["mensaje"])) {
        echo $_GET["mensaje"]; //darle estilo de error
    }
}else
?>
</div>