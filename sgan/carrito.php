<?php
session_start();

if (isset($_POST['idart']) && isset($_POST['cantidad'])) {
    $id = $_POST['idart'];
    $cantidad = $_POST['cantidad'];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = $cantidad;
    }
}

// Función para obtener los detalles del producto por ID
function obtenerProducto($id)
{
    global $conexion;
    $resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
    return mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['carrito'] as $id => $cantidad) : ?>
                <?php $producto = obtenerProducto($id); ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $cantidad; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
