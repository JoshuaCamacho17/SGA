<?php
if (!empty($_GET['idart'])) {
    // Credenciales de conexion
    $Host = 'localhost';
    $Username = 'root';
    $Password = '';
    $dbName = 'sga';
    
    // Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    
    // Revisar conexion
    if ($db->connect_error) {
       die("Connection failed: " . $db->connect_error);
    }
    
    // Extraer imagen de la BD mediante GET
    $idart = $_GET['idart']; // Recuperar el idart del GET
    $result = $db->query("SELECT imagenes FROM articulosga WHERE idart = $idart");
    if ($result->num_rows > 0) {
        $imgDatos = $result->fetch_assoc();
        
        // Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgDatos['imagenes']; 
    } else {
        echo 'Imagen no existe...';
    }
}
?>
