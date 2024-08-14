<?php
session_start();
$mensaje="";
if (empty($_POST["usuario"]) || empty($_POST["password"])) {
    $mensaje="Por favor ingresa todos los campos";
    enviarMensajeError($mensaje);
}else{
    if (validarUsuario($_POST["usuario"], $_POST["password"])) {
        $_SESSION["usuario"]=$_POST["usuario"];
        header("Location:index.php");
    }else{
        $mensaje="Los datos no son correctos.";
        enviarMensajeError($mensaje);
    }
}
//creamos una funcion que envie el mensaje al index
function enviarMensajeError($mensaje){
    header('Location: login.php?mensaje='.$mensaje);
}
//funcion
function validarUsuario($usuario, $password)
{
    $listaUsuarios=["Dani"=>"CEAT1234@","Marina"=>"CEAT1234@","Ana"=>"CEAT1234@"]; //Array asociativos
    if ( array_key_exists($usuario, $listaUsuarios)){
        if ( $listaUsuarios[$usuario]==$password){
            return true;
        }else{
            return false;
        }
    }
}