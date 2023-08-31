<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/galeriaP.css">
    <title>Document</title>
</head>
<body>
    
<?php
// Obtener el término de búsqueda ingresado por el usuario
$busqueda = $_GET['buscador'];

// Conectarse a la base de datos MySQL (asegúrate de tener los datos correctos de tu servidor MySQL)
$conexion = mysqli_connect("localhost", "root", "", "sga");

// Verificar si la conexión fue exitosa
if (mysqli_connect_errno()) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    exit();
}

// Escapar el término de búsqueda para evitar problemas de seguridad
$busqueda = mysqli_real_escape_string($conexion, $busqueda);

// Realizar la consulta SQL para buscar los resultados en la base de datos
$query = "SELECT * FROM articulosga WHERE nombreart LIKE '%$busqueda%'";
$resultado = mysqli_query($conexion, $query);

// Mostrar los resultados
echo'<table class="inventario">
			<thead>
  				<tr>
					<th>Imagen</th>
					<th>Producto</th>
					<th>Categoría</th>
					<th>Pz</th>
					<th>Acciones</th>
  					</tr>
			</thead>';

		while($row = mysqli_fetch_array($resultado)) { 
			echo "<tbody>";
			echo "<tr onclick=\"window.location='modificar.php?idart=".$row['idart']."';\">
			
			<td><img src='vista.php?idart=3' class='Imagenes' width='100px' height='100px'></td>
					<td>
	   					<div class='info-producto'>
			  			  <div class='nombre'>".$row['nombreart']."</div>
		   				  <div class='descripcion'>".$row['descripcionart']."</div>
						</div>
   					</td>
   					<td>".$row['categoriaart']."</td>
   					<td>".$row['piezasart']."</td>
   					<td><a href='modificar.php?idart=".$row['idart']."'>EDIT</art>
   						<a href='eliminar.php?idart=".$row['idart']."'><img src='vectores/bote.svg' height='20px' weight='20px'></a></td>
						 </tr>";
  			echo "</tbody>";
		}
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
</body>
</html>
