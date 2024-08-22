<?php
session_start();
if (isset($_POST["agregar"])){ //si han pulsado click en agregar
    $productoID=$_POST["id-producto"];
    $nombreProducto=$_POST["nombre-producto"];
    $precioProducto=$_POST["precio"];
    $cantidadProducto=$_POST["cantidad"];
    //var_dump($cantidadProducto);
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

if (isset($_POST["actualizarProducto"])){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    }
    actualizarCesta();
    header("Location: mostrarCarrito.php");

}
// Manejar eliminación de productos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminarProducto'])) {
    $id = $_POST['product_id'];
    unset($_SESSION['carrito'][$id]);
    actualizarCesta();
    header("Location: mostrarCarrito.php");
}

// Vaciar la cesta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminarTodo'])) {
    unset($_SESSION['carrito']);
    actualizarCesta();
    header("Location: mostrarCarrito.php");

}

// Actualizar cantidad de productos
function actualizarCesta()
{
    $_SESSION["totalProductos"]=0;
    if (isset($_SESSION["carrito"])){
        foreach ($_SESSION["carrito"] as $productoID => $producto) {
            $_SESSION["totalProductos"] += $producto["cantidad"];
        }
    }
}