<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloaddInv.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Agregar productos | SGA</title>
</head>
<body>
<form action="addInv.php" method="post" id="agregar">  
<div class="caja">
<div class="imagenProd">
  <label for="upload-input">
    <img src="img/agregarimg.png" alt="Agregar imagen" name="imagenProd">
  </label>
  <input id="upload-input" type="file" accept="image/*" name="imagenProd">
</div>

    <div class="datosProd">
        <label>Nombre del producto</label>
        <input type="text" name="nombreart" required></input><br>
        <label>Descripcion breve</label>
        <input type="text"name="descripcionart" required></input><br>
        <label>Categoria</label>
        <?php 
        include("conectbd.php");
        $query = "SELECT * FROM categorias";
        $resultado = mysqli_query($conexion, $query);
       
          if (!$resultado) {
             die("Error al obtener las categorías: " . mysqli_error($conexion));
          }
          echo '<select name="categoriaart">';
            while ($fila = mysqli_fetch_assoc($resultado)) {
            $categoria = $fila['categoria'];
            echo '<option value="' . $categoria . '">' . $categoria . '</option>'; }
            echo '</select>';
        ?>

   
        <br><label>Stock Actual</label>
        <input type="number" class="pzsActual" name="pzsActual" required><br>
        <label>Minimo de piezas</label>
        <input type="number" class="minpzs" name="minart" required>
     
      </div>
      <div class="SendDatos">
      <input type="submit" value="Enviar" id="enviar-btn" name="enviar-btn">
       <input type="submit" value="Cancelar" id="cancelar-btn" name="cancelar-btn">
</div>
      
    </div>
    <?php

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    require_once("conectbd.php");
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
    $nombreart =$_POST["nombreart"];
    //$imagenProd =$_POST["imagenProd"];

    $image = $_FILES['image']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));

    $descripcionart =$_POST["descripcionart"];
    $categoriaart =$_POST["categoriaart"];
    $piezasart =$_POST["pzsActual"];
    $minart =$_POST["minart"];
    $conexion = mysqli_connect("localhost","root","") //Asignamos valores como usuario y contraseña para que nos valide el login de la entrada a MySQL
		or die ("Fallo en el establecimiento de la conexi�n"); //Si los valores no son correctos nos da error

		
		mysqli_select_db($conexion,"sga") //Seleccionamos la base de datos a utilizar
		or die("Error en la selecci�n de la base de datos");

    // Sentencia SQL para insertar los datos
    $sql = "INSERT INTO articulosga (imagenes,nombreart,descripcionart, categoriaart ,piezasart,minart )
    VALUES ('$imgContenido','$nombreart', '$descripcionart', '$categoriaart','$piezasart',' $minart')";

    if (mysqli_query($conexion, $sql)) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
  }else{
    echo "Por favor seleccione imagen a subir.";
}
    // Cierre de la conexión
    mysqli_close($conexion);
}
?>

    </form>
  </body>
</html>

