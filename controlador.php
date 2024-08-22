<?php
session_start();
$mensaje="";
//si pulsan clic en iniciar sesion se ejecuta las siguientes lineas
if (isset($_POST["iniciarSesion"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        $mensaje = "Por favor ingresa todos los campos";
        enviarMensajeError($mensaje);
    } else {
        if (validarUsuario($_POST["usuario"], $_POST["password"])) {
            $_SESSION["usuario"] = $_POST["usuario"];
            header("Location:index.php");
        } else {
            $mensaje = "Los datos no son correctos.";
            enviarMensajeError($mensaje);
        }
    }
}

//si se pulsa clic en Crear usuario debemos dar el alta a un nuevo usuario
if (isset($_POST["crearUsuario"])) {
   if (!empty($_POST["usuario"]) && !empty($_POST["password"]) && !empty($_POST["password2"])) {
        $nombre = $_POST["usuario"];
        $password= $_POST["password"];
        $password2= $_POST["password2"];
    if ($password == $password2) {
        if (!isset($_SESSION["listaUsuarios"])){
            $_SESSION["listaUsuarios"]=array();
        }
        $_SESSION["listaUsuarios"][$nombre]=$password;
        $mensaje="Se ha creado el usuario correctamente";
        enviarMensajeError($mensaje);
    }else{
        $mensaje="Los passwords no coinciden";
        enviarMensajeError($mensaje);
    }
    }
}

//creamos una funcion que envie el mensaje al index
function enviarMensajeError($mensaje){
    header('Location: login.php?mensaje='.$mensaje);
}
//funcion
function validarUsuario($usuario, $password)
{
   //Array asociativos

    if ( array_key_exists($usuario,$_SESSION["listaUsuarios"])){
        if ( $_SESSION["listaUsuarios"][$usuario]==$password){
            return true;
        }else{
            return false;
        }
    }
}