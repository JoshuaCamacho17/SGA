
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloaddInv.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Modificar productos | SGA</title>
</head>
<body>
<form action="#" method="post" id="agregar">  
<div class="caja">
<div class="imagenProd">
  <label for="upload-input">
    <img src="img/agregarimg.png" alt="Agregar imagen" name="imagenProd">
  </label>
  <input id="upload-input" type="file" accept="image/*" name="imagenProd">
</div>

    <div class="datosProd">
        <label>Nombre del producto</label>
        <input type="text" name="nameP" required></input><br>
        <label>Descripcion breve</label>
        <input type="text"name="descripcionP" required></input><br>
        <label>Categoria</label>
        <?php 
            echo'<select name="categoriaP">';
            echo'<option value="categorias">categoría</option>';
            echo'</select>';
        ?>
        <br><label>Stock Actual</label>
        <input type="number" class="pzsActual" name="pzsActual" required><br>
        <label>Minimo de piezas</label>
        <input type="number" class="minpzs" name="minpzs" required>
     
      </div>
      <div class="SendDatos">
      <input type="submit" value="Enviar" id="enviar-btn" name="enviar-btn">
       <input type="submit" value="Cancelar" id="cancelar-btn" name="cancelar-btn">
</div>
      
    </div>
  
    </form>
  </body>
</html>