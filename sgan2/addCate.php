<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar categoria | SGA</title>
</head>
<body>
<?php
		if ($_POST['btnAddCat']){
			//Variable que guarda el nombre
			$Categoria=$_POST['txtCategoria'];
			
			include("conectbd.php");
			#Consulta para insertar
			$Resultadocat=mysqli_query($conexion,"INSERT INTO `sga`.`categorias` (`categoria`) VALUES ('$Categoria');");
			if($Resultado==true) {echo "<br>Categoria Registrada.\n";
			}
			
			mysqli_close($conexion); // Cerramos la conexion con la base de datos
		}

		?>

</body>
</html>