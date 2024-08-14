<?php
session_start();
if (isset($_POST["agregar"])){ //si han pulsado click en agregar
    $productoID=$_POST["id-producto"];
    $nombreProducto=$_POST["nombre-producto"];
    $precioProducto=$_POST["precio"];
    $cantidadProducto=$_POST["cantidad"];
    var_dump($cantidadProducto);
//El carrito es una variable de sesion
    if (!isset($_SESSION["carrito"])){
        $_SESSION["carrito"]=array();
    }
    //si esta creada la sesion del carrito con ese producto, aumentaremos la cantidad
    if (isset($_SESSION["carrito"][$productoID])){
        $_SESSION["carrito"][$productoID]["cantidad"]+=$cantidadProducto;
    }else{
        //se agrega el producto porque no existen en el carrito
        $_SESSION["carrito"][$productoID]=array(
            "nombre"=>$nombreProducto,
            "precio"=>$precioProducto,
            "cantidad"=>$cantidadProducto
        );
    }
    $_SESSION["totalProductos"]=0;
    foreach ($_SESSION["carrito"] as $productoID => $producto){
        $_SESSION["totalProductos"]+=$producto["cantidad"];
    }
   header("Location: index.php");

}