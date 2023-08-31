<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" type="text/css" href="carrito.css">
    <title>Carrito de prestamos | SGA</title>
</head>

<style>
    /* Estilos generales */
body {
    font-family: Arial, sans-serif;
}

/* Estilos para el modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    position: relative;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modal-message {
    text-align: center;
    padding-top: 20px;
    font-size: 24px;
}

.checkmark {
    color: green;
    font-size: 48px;
}

/* Estilos generales */
body {
    font-family: Arial, sans-serif;
}

/* Estilos para el botón de retroceso */
.back-btn {
    display: block;
    margin-top: 20px;
    text-align: center;
    text-decoration: none;
    color: #333;
}

/* Estilos para la tabla de carrito */
.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.cart-table th,
.cart-table td {
    padding: 10px;
    text-align: center;
}

/* Estilos para el botón de préstamo */
.btnprestamo{
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    border: none;
    cursor: pointer;
}

/* Agrega aquí estilos adicionales según tus preferencias */


</style>
<body>
  
<?php
session_start();

if(isset($_SESSION['carrito'])){
  $carrito = $_SESSION['carrito'];
?>
<a type="submit" class="back-btn" href="galeria.php"><img src="img/sga.png" widht="250px" height="150px"></a>
<table class="cart-table">
  <thead>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
      
  <?php 
  foreach($carrito as $row){ 
    include 'conectbd.php';    
      ?>
    <tr>
      <td><img src="<?php ?>" width="100" height="100"></td>
      <td><?php echo $row['nombreart']; ?></td>
      <td><?php echo $row['cantidad']; ?></td>
      <td><a href="eliminar.php?idart=<?php echo $row['idart']; ?>"><img src="vectores/bote.svg" height="20px" weight="20px"></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>



<?php } else {
  echo "El carrito está vacío.";
}
?>

  <input id="openModalButton" type="submit" name="btnPrestamo" class="btnprestamo" value="Realizar prestamo">
  <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-message">
                <span class="checkmark">&#10004;</span>
                <p>Préstamo realizado</p>
            </div>
        </div>
    </div>
    
    <script>
        // Abre la ventana emergente al hacer clic en el botón
document.getElementById("openModalButton").onclick = function() {
    document.getElementById("myModal").style.display = "block";
};
setTimeout(function() {
        document.getElementById("myModal").style.display = "none";
    }, 3000);

// Cierra la ventana emergente al hacer clic en la "x"
document.getElementsByClassName("close")[0].onclick = function() {
    document.getElementById("myModal").style.display = "none";
};

// Cierra la ventana emergente al hacer clic fuera de ella
window.onclick = function(event) {
    if (event.target == document.getElementById("myModal")) {
        document.getElementById("myModal").style.display = "none";
    }
};

    </script>  
</body>
</html>