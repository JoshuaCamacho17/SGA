<!-- Alam Yael Cardenas Villafaña | 19300402 | 7G1 | 28/11/2022 -->
<?php

	$conexion = mysqli_connect("localhost","root","") //Asignamos valores como usuario y contraseña para que nos valide el login de la entrada a MySQL
		or die ("Fallo en el establecimiento de la conexi�n"); //Si los valores no son correctos nos da error

		
		mysqli_select_db($conexion,"sga") //Seleccionamos la base de datos a utilizar
		or die("Error en la selecci�n de la base de datos"); //Y de igual manera, si no existe la misma, mandamos error
		
?>