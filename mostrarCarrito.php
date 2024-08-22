<?php
include 'header.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adidas - Carrito</title>
</head>
<body>
<div class="cesta">
    <h2 class="textoCentrado">Tu Cesta de la Compra</h2>
    <?php
    if (!empty($_SESSION['carrito'])): ?>
<table>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
        <th>Acciones</th>
    </tr>
    <?php
    $total = 0;
    foreach ($_SESSION['carrito'] as $productoID => $producto):
        $subtotal = $producto['cantidad'] * $producto['precio'];
        $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td>
                <form method="post" action="carrito.php">
                    <input type="hidden" name="id" value="<?php echo $productoID; ?>">
                    <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" min="1" class="cantidadCarrito" >
                    <input type="submit" name="actualizarProducto" value="Actualizar" class="botonPeque">
                </form>
            </td>
            <td><?php echo $producto['precio']; ?>€</td>
            <td><?php echo $subtotal; ?>€</td>
            <td>
                <form method="post" action="carrito.php">
                    <input type="hidden" name="product_id" value="<?php echo $productoID; ?>">
                    <input type="submit" name="eliminarProducto" value="Eliminar" class="botonPeque">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3">Total</td>
        <td><?php echo $total; ?>€</td>
        <td>
            <form method="post" action="carrito.php">
                <input type="submit" name="eliminarTodo" value="Vaciar Cesta" class="botonPeque">
            </form>
        </td>
    </tr>
</table>
        <a href="tramitarPedido.php" class="boton">Tramitar Pedido</a>
<?php else: ?>
<p>Tu cesta está vacía.</p>
<?php endif; ?>
</div>

</body>
</html>