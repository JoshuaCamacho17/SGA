<!-- Alam Yael Cardenas Villafaña | 19300402 | 7G1 | 28/11/2022 -->
<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/catalogo.css">
<link rel="stylesheet" type="text/css" href="galeriaP.css">
	


	<!-- <link rel="stylesheet" type="text/css" href="css/estilo.css"> -->
	<title>Galeria de Productos</title>
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

.back-btn {
    background-color: #0070ba;
    text-align: center;
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



</style>

<body>
	<header>
		<!-- Etiquetas que nos dan permiso de no guardar el cache -->
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">
	</header>
			<?php	
			session_start();	
// Si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Obtener los datos del producto del formulario
$imagenes = $_POST["imagenes"];
$nombreart = $_POST["nombreart"];
$cantidad1 = $_POST["cantidad"];


// Crear un arreglo con los datos del producto
$nuevoProducto = array(
  "imagenes" => $imagenes,
  "nombreart" => $nombreart,
  "cantidad" => $cantidad1
);


  
	// Agregar el producto al carrito
	if (isset($_SESSION["carrito"])) {
	  // Si ya existe un carrito en la sesión, agregamos el nuevo producto
	  $_SESSION["carrito"][] = $nuevoProducto;
	} else {
	  // Si no existe un carrito en la sesión, creamos uno y agregamos el producto
	  $_SESSION["carrito"] = array($nuevoProducto);
	}
  
	// Redirigir al usuario a la página del carrito
	header("Location: showArreglo.php");
	exit;
  }
  ?>
  <div class="Contenedor">
	<div class="row">
  <div class="product-info">
  <?php
			// Incluye el archivo que contiene la función conectar()
			include 'conectbd.php';
			// Llama a la función conectar() para establecer la conexión
			//Hacemos la consulta que se desea realizar a la tabla desarrollada
			$Resultado=mysqli_query($conexion,"SELECT * FROM `articulosga`;");
			//Creamos la tabla que mostrar� los elementos que se han consultado con anterioridad

			echo'<a type="submit" class="back-btn" href="principal/holi.html"><img src="img/sga.png" widht="250px" height="150px"></a>';
		?>
	<?php
			$Resultadoarts=mysqli_query($conexion,"SELECT * FROM `articulosga`;");
			echo'<table class="inventario">
				<thead>
					  <tr>
						<th>Imagen</th>
						<th>Producto</th>
						<th>Categoría</th>
						<th>Cantidad</th>
						<th>Acciones</th>
						  </tr>
				</thead>';
	
			while($row = mysqli_fetch_array($Resultadoarts)) { 
				echo "<tbody>";
				echo "";
				?>
				<td><img src='' class='Imagenes' width='100px' height='100px'></td>
						<td>
							   <div class='info-producto'>
							    <?php
							      echo"	
								   <div class='nombre'>".$row['nombreart']."</div>
								   <div class='descripcion'>".$row['descripcionart']."</div>";
								  ?>
							   </div>
						   </td>
						   <?php
						   echo"<td>".$row['categoriaart']."</td>
						   <td>
						   <label for='cantidad'>Cantidad a pedir:</label>
							<input type='number' name='cantidad' min='1' max='10' value='1'>
						   </td>"; 
						   ?>
							<?php
						   echo"<td><a href='?modificar=".$row['idart']."'><img src='vectores/editar.svg' height='20px' weight='20px'></a>"; ?>
						   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="AgregarCarrito">
						   <input type="hidden" name="imagenes">
								<input type="hidden" name="nombreart" value="<?php echo $row['nombreart']; ?>">
						   <input type='submit' name='Agregar' value='Agregar al carrito'>
						   </form>
							<?php  echo" <a href='?eliminar=".$row['idart']."'><img src='vectores/bote.svg' height='20px' weight='20px'></a></td>
							 </tr>";
				  echo "</tbody>";
				  
			}
	
			// Borrar usuario
		if (isset($_GET['eliminar'])) {
		$id = $_GET['eliminar'];
		$sql = "DELETE FROM articulosga WHERE idart=$id";
		mysqli_query($conexion, $sql);
		}?>

			
		</table>
		</div>
		</div>
</body>
</html>