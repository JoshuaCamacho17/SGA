<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
<?php
session_start();

if(isset($_GET['idart']) && isset($_SESSION['carrito'])){
  $id = $_GET['idart'];

  // Buscar el producto en el carrito
  foreach ($_SESSION['carrito'] as $key => $producto) {
    if ($producto['idart'] == $id) {
      // Eliminar el producto del carrito
      unset($_SESSION['carrito'][$key]);
      break;
    }
  }
}

// Redirigir al usuario a la página del carrito
header("Location: showArreglo.php");
exit;
?>

</body>
</html>