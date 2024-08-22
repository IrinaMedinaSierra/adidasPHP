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
    actualizarCesta();
    header("Location: index.php");

}

/**
Función que cuenta los articulos que estan en la cesta para mostrarlos en el header
 */

function actualizarCesta()
{
    $_SESSION["totalProductos"]=0;
    foreach ($_SESSION["carrito"] as $productoID => $producto){
        $_SESSION["totalProductos"]+=$producto["cantidad"];
    }

}
/*VACIAR CARRITO*/
if (isset($_POST["eliminarCarrito"])){ //si han pulsado sobre el boton de Vaciar Carrito se ejecutan estas líenas
    unset($_SESSION["carrito"]); //Eliminar el array $_SESSION["carrito"]
    actualizarCesta();
    header("Location: mostrarCarrito.php");
}
/*ACTULIZAR CANTIDAD DE ARTICULO*/
if (isset($_POST["actualizarCarrito"])){
    $id=$_POST["id"];
    $cantidad=$_POST["cantidad"];
    if (isset($_SESSION["carrito"][$id])){ //ubica el id en el array
        $_SESSION["carrito"][$id]["cantidad"]=$cantidad; //sustituye en el array la cantidad que tenia por la nueva cantidad
    }
    actualizarCesta();
    header("Location: mostrarCarrito.php");
}

/* ELIMINAR PRODUCTO EN LA LINEA*/
if (isset($_POST["eliminarProducto"])){
    $id=$_POST["id"]; //Necesitamos el id para buscarlo y eliminarlo del array
    if (isset($_SESSION["carrito"][$id])) {
        unset($_SESSION["carrito"][$id]); //eliminando un valor del array
    }
    actualizarCesta();
    header("Location: mostrarCarrito.php");

}
