<?php
include 'bdd.php'; // Incluye el archivo de conexión a la base de datos

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nuevoNombre = $_POST['nuevo_nombre'];
    $nuevaContraMD5 = md5($_POST['nueva_contra']);
    $nuevoPhono = $_POST['nuevo_telefono'];
    $nuevoCorreo = $_POST['nuevo_correo'];
    $nuevoRol = $_POST['nuevo_rol'];
    
    // Actualizar usuario en la base de datos
    $sql = "UPDATE usuariossga SET nombreusr='$nuevoNombre',contrausr='$nuevaContraMD5',telefonousr='$nuevoPhono', emailusr='$nuevoCorreo',rol_usr='$nuevoRol' WHERE idusr=$id";
    if (mysqli_query($conexion, $sql)) {
        echo "Usuario actualizado exitosamente.";
        echo'<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=crud.php">';
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion); // Cierra la conexión
?>
