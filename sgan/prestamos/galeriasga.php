<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="galeriaP.css">
	<link rel="stylesheet" href="estilopop.css">
	<title>Herramientas | SGA</title>
</head>
<body>
	<header>
		<!-- Etiquetas que nos dan permiso de no guardar el cache -->
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">
	</header>
	
	<section class="Contenedor">
		<div class="navbar">
			<form method="GET" action="busqueda.php">
				<div class="finder">
					<input type="text" name="buscador">
					<a href=""><img src="vectores/lupa.svg" name="btnbuscador" width="40px" height="40px"></a>
				</div>
			</form>
			
			<div class="filtrar">
				<a href=""><img src="vectores/filtro.svg" name="btnFiltro" width="40px" height="40px">Filtro</img></a>
			</div>
			<div class="Categorias">
			<button id="btn-abrir-popup" class="btn-abrir-popup"><img src="vectores/categoria.svg" name="btnCategorias" width="40px" height="40px">Categorias</img></button>	
			<!-- <a href="categorias.html"><img src="vectores/categoria.svg" name="btnCategorias" width="40px" height="40px">Categorias</img></a> -->
			<div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>Agregar categoría</h3>
				<form action="addCate.php" method="POST">
					<div class="contenedor-inputs">
						<input type="text" placeholder="Nombre categoria" name="txtCategoria" required>
					</div>
					<input type="submit" class="btn-submit" name="btnAddCat"value="Agregar">
				</form>
			</div>
		</div>
		<script src="popup.js"></script>
			</div>
			<div class="Exportar">
				<a href=""><img src="vectores/export.svg" name="btnExport" width="40px" height="40px">Exportar</img></a>
			</div>
			<div class="Agregar">
			<a href="addInv.php"><img src="img/agregar.png" name="btn" width="40px" height="40px">Producto</img></a>
				
			</div>
		</div>
		<form method="POST">
		<?php
		include("conectbd.php");
		$Resultadoarts=mysqli_query($conexion,"SELECT * FROM `articulosga`;");
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

		while($row = mysqli_fetch_array($Resultadoarts)) { 
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
   					<td><a href='?modificar=".$row['idart']."'><img src='vectores/editar.svg' height='20px' weight='20px'></a>
					   <a href='?add=".$row['idart']."'>Agregar al carrito</a>
   						<a href='?eliminar=".$row['idart']."'><img src='vectores/bote.svg' height='20px' weight='20px'></a></td>
						 </tr>";
  			echo "</tbody>";
		}

		// Borrar usuario
	if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM articulosga WHERE idart=$id";
    mysqli_query($conexion, $sql);
	}

		mysqli_close($conexion);
	
	?>
		 </table>
		</form>
	</section>  
</body>
</html>