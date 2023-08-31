<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php include 'bdd.php'; ?>

    <h1>CRUD de Usuarios</h1>
    <h2>Crear Usuario</h2>
    <form method="post">
        Nombre: <input type="text" name="nombre">
        Contraseña: <input type="password" name="password" required>
        Telefono: <input type="number" name="telefono" minlength="10"required>
        Correo: <input type="email" name="correo" required>
         <!--
             Roles
            Administrador: 0
            Encargado: 1
            Empleado: 2
            Becario: 3
            Provedor: 4 
                    -->
        <label class="subtitulo">Rol asignado: </label><br><br>
                <label>Administrador </label>
                <input type="radio" name="rdbrol" id="radioButton" value="0" /><br>
                <label>Encargado </label>
                <input type="radio" name="rdbrol" id="radioButton" value="1" /><br>
                <label>Empleado </label>
                <input type="radio" name="rdbrol" id="radioButton" value="2" /><br>
                <label>Becario </label>
                <input type="radio" name="rdbrol" id="radioButton" value="3" /><br>
                <label>Provedor </label>
                <input type="radio" name="rdbrol" id="radioButton" value="4" /><br>
                </div>

        <input type="submit" name="crear" value="Crear">
    </form>

    <h2>Usuarios</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php
        $usuarios = array();
        $resultado = mysqli_query($conexion, "SELECT * FROM usuariossga");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }

        foreach ($usuarios as $usuario) {
            echo '<tr>';
            echo '<td>' . $usuario['idusr'] . '</td>';
            echo '<td>' . $usuario['nombreusr'] . '</td>';
            echo '<td>' . $usuario['contrausr'] . '</td>';
            echo '<td>' . $usuario['telefonousr'] . '</td>';
            echo '<td>' . $usuario['emailusr'] . '</td>';
            echo '<td>' . $usuario['rol_usr'] . '</td>';
            echo '<td>';
            echo '<a href="?editar=' . $usuario['idusr'] . '" >Editar <br></a>';
            echo '<a href="?borrar=' . $usuario['idusr'] . '"> Borrar</a>';
            echo '</td>';
            echo '</tr>';
        }

    echo'</table>';

    // Crear usuario
if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $nuevaContraMD5 = md5($_POST['password']);
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rdbrol=$_POST['rdbrol'];
    $sql = "INSERT INTO usuariossga (nombreusr, contrausr,telefonousr, emailusr,rol_usr) VALUES ('$nombre', '$nuevaContraMD5','$telefono','$correo',$rdbrol)";
    mysqli_query($conexion, $sql);
}

// Borrar usuario
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $sql = "DELETE FROM usuariossga WHERE idusr=$id";
    mysqli_query($conexion, $sql);
}


    if (isset($_GET['editar'])) {
        $idEditar = $_GET['editar'];
        $sqlEditar = "SELECT * FROM usuariossga WHERE idusr=$idEditar";
        $resultadoEditar = mysqli_query($conexion, $sqlEditar);
        $usuarioEditar = mysqli_fetch_assoc($resultadoEditar);
        ?>
    <h2>Editar Usuario</h2>
    <form method="post" action="actualizar_usuario.php">
        <input type="hidden" name="id" value="<?php echo $usuarioEditar['idusr']; ?>">
        Nombre: <input type="text" name="nuevo_nombre" value="<?php echo $usuarioEditar['nombreusr']; ?>">
        Contraseña: <input type="text" name="nueva_contra" value="<?php echo $usuarioEditar['contrausr']; ?>">
        Telefono: <input type="text" name="nuevo_telefono" value="<?php echo $usuarioEditar['telefonousr']; ?>">
        Correo: <input type="email" name="nuevo_correo" value="<?php echo $usuarioEditar['emailusr']; ?>">
        Roles<br>
            Administrador: 0
            Encargado: 1
            Empleado: 2
            Becario: 3
            Provedor: 4 <br>
        Rol: <input type="number" name="nuevo_rol" value="<?php echo $usuarioEditar['rol_usr']; ?>" minlength="1"required>
        <!-- <label class="subtitulo">Rol asignado: </label><br><br>
                <label>Administrador </label>
                <input type="radio" name="rdbrol" id="radioButton" value=" echo $usuarioEditar['rol_usr']; ?>" /><br>
                <label>Encargado </label>
                <input type="radio" name="rdbrol" id="radioButton" value="p echo $usuarioEditar['rol_usr']; ?>" /><br>
                <label>Empleado </label>
                <input type="radio" name="rdbrol" id="radioButton" value="?php echo $usuarioEditar['rol_usr']; ?>" /><br>
                <label>Becario </label>
                <input type="radio" name="rdbrol" id="radioButton" value="?php echo $usuarioEditar['rol_usr']; ?>" /><br>
                <label>Provedor </label>
                <input type="radio" name="rdbrol" id="radioButton" value="?php echo $usuarioEditar['rol_usr']; ?>" /><br>
                </div> -->
        <input type="submit" name="actualizar" value="Actualizar">
    </form>

    
    <?php } 

 mysqli_close($conexion); ?>
</body>
</html>
