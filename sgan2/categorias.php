<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar categoria | SGA</title>
</head>
<body>
  

<!-- Para conectar un `select` de HTML a una base de datos en PHP y mostrar las categorías almacenadas, necesitarás realizar lo siguiente:

1. Establecer la conexión con la base de datos. Suponiendo que estás utilizando MySQL, puedes utilizar la extensión MySQLi de PHP para conectarte. Asegúrate de proporcionar los detalles correctos de tu base de datos, como el nombre de host, nombre de usuario, contraseña y nombre de la base de datos.


<?php
 $usuario = "root";
 $contraseña = "";
 $base_de_datos = "sga";

 $conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

 if (!$conexion) {
     die("Error al conectar a la base de datos: " . mysqli_connect_error());
 }
 ?>


// 2. Consultar las categorías de la base de datos. Puedes ejecutar una consulta SQL para obtener las categorías de la tabla correspondiente. Suponiendo que tienes una tabla llamada "categorias" con un campo llamado "nombre_categoria", puedes utilizar la siguiente consulta:


 <?php
 $query = "SELECT * FROM categorias";
 $resultado = mysqli_query($conexion, $query);

 if (!$resultado) {
     die("Error al obtener las categorías: " . mysqli_error($conexion));
 }
 ?>


// 3. Generar las opciones del `select`. Utiliza un bucle `while` para recorrer los resultados de la consulta y generar las opciones del `select` con los nombres de las categorías.

 ```php
 <?php
 echo '<select name="categorias">';
 while ($fila = mysqli_fetch_assoc($resultado)) {
     $categoria = $fila['categoria'];
    echo '<option value="' . $categoria . '">' . $categoria . '</option>'; }
echo '</select>';
?>

// 4. Cerrar la conexión con la base de datos después de haber terminado de obtener los datos.
<?php
mysqli_close($conexion);
?>


En el código anterior, debes asegurarte de reemplazar los nombres de host, usuario, contraseña, base de datos, tabla y campos con los correspondientes a tu configuración de base de datos.

Recuerda que este es solo un ejemplo básico para mostrar cómo conectar un `select` a una base de datos en PHP. En un entorno de producción, deberías considerar implementar medidas de seguridad adicionales, como validación y filtrado de datos, para proteger tu aplicación contra ataques. -->


</body>
</html>