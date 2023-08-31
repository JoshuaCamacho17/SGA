        
<?php
//VAlidación para cuando el botón sea presionado
if (isset(($_POST['btnsubmit']))){
    //variables necesarias para recvibir los datos de las cajas de texto
    $Usuario=$_POST['user'];
    $Pass=$_POST['password'];
    //librería hecha por nosotros para que nos conecté a la base de datos
    include("conectbd.php");
    //Consulta para ver si los datos existen en la bdd, si es así, continuamos con el proceso
    $Consultar=mysqli_query($conexion,"SELECT * FROM `usuariossga` WHERE `nombreusr`='$Usuario' AND `contrausr`='$Pass';");
    if(mysqli_num_rows($Consultar)==1) {
            echo '<span class="Etiquetas">¡Bienvenido!</span>';
            #Crear variable de sesion
            $_SESSION["usuario1"]="$Usuario"; //Guardamos la sesión del usuario en una variable
            $_SESSION["Enter"]=date("Y-m-j H:i:s");
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=holi.html">';
        }else {
            echo "No Aceptado";
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
            }
    mysqli_close($conexion); // Cerramos la conexion con la base de datos
}
?>