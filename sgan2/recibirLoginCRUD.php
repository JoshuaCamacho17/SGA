<?php
//VAlidación para cuando el botón sea presionado
if (isset(($_POST['btnsubmit']))){
    //variables necesarias para recvibir los datos de las cajas de texto
    $Usuario=$_POST['user'];
    $nuevaContraMD5 = md5($_POST['password']);
    //librería hecha por nosotros para que nos conecté a la base de datos
    include("bdd.php");
    //Consulta para ver si los datos existen en la bdd, si es así, continuamos con el proceso
    $Consultar=mysqli_query($conexion,"SELECT * FROM `usuariossga` WHERE `nombreusr`='$Usuario' AND `contrausr`='$nuevaContraMD5';");
    if(mysqli_num_rows($Consultar)==1) {
            echo '<span class="Etiquetas">¡Bienvenido!</span>';
            #Crear variable de sesion
            $_SESSION["usuario1"]="$Usuario"; //Guardamos la sesión del usuario en una variable
            $_SESSION["Enter"]=date("Y-m-j H:i:s");
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=crud.php">';
        }else {
            echo "No Aceptado";
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=login.html">';
            }
    mysqli_close($conexion); // Cerramos la conexion con la base de datos
}
?>