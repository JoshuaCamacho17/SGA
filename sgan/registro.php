<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/login-styles.css">
       <!-- Texto que aparece en la pestaña del navegador  -->
		<title>Registrate | SGA</title>
	</head>
    <style>
       body {
            background-color: #21b2fe;
            font-family: Arial, sans-serif;
        }

        .caja-madre {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #21b2fe;
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #21b2fe;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #1a79b2;
        }

        .radio {
            margin-bottom: 10px;
        }

        label {
            margin-right: 10px;
            display: inline-block;
        }

        .subtitulo {
            color: #21b2fe;
            font-weight: bold;
        }
    </style>
	<body>
        <!-- Div general donde todos los objetos están incluidos -->
        <div class="caja-madre">
            <!-- Metodo que recibe los datos y los envía al archivo recibirPost.php usando el metódo POST -->
            <form action="registro.php" method="POST">
           <!--Objetos Incluidos en la caja madre (coontendor, también se podís usar un section, pero no lo usé) -->
           <h1>Crea tu cuenta | SGA</h1>  <!--  Titulo de la caja madre -->
                <div class="user"> <!-- Caja de texto para introducir el usuario este es unico porque quería ponerle un acomodo específico-->
                    <input type="text" placeholder="Nombre" name="txtUsuario" required><br>
                </div>
                <div class="pswde"> <!-- Caja de texto para introducir la contraseña -->
                    <input type="password" placeholder="Password" name="txtPass" minlength="8" required>
                </div>
               
                <div class="datos"> <!-- Caja de texto para introducir el usuario -->
                    <input type="email" name="txtCorreo" placeholder="Correo" required>
                    <input type="number" name="txtPhone" placeholder="Telefono" minlength="10"required>
                </div>
             

                <div class="radio"> <!-- Radio button para decir su sexo biologico -->
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
                <input type="radio" name="rdbrol" id="radioButton" value="1" />
                <label>Empleado </label>
                <input type="radio" name="rdbrol" id="radioButton" value="2" />
                <label>Becario </label>
                <input type="radio" name="rdbrol" id="radioButton" value="3" />
                <label>Provedor </label>
                <input type="radio" name="rdbrol" id="radioButton" value="4" />
                </div>

                <div class="botones">
                    <p>
                        <!-- Caja de tipo boton reset para limpiar las cajas de texto (reset - limpiar datos) -->
                        <input type="reset" name="btnLimpiar" id="btnAccion" value="Limpiar" />
                        <!-- Caja de tipo boton para enviar los datos (submit - enviar datos) -->
                        <input type="submit" name="btnEnviar" id="btnSubmit" value="Enviar" />
                    </p>
                </div>
                    <?php
		if (isset(($_POST['btnEnviar']))){
    
			//Variable que guarda el nombre
			$Nombre=$_POST['txtUsuario'];
			//Variable que guarda el numero telefonico
			$Correo=$_POST['txtCorreo'];
            $Telefono=$_POST['txtPhone'];
			//Variable para la contraseña
            $pswd=$_POST['txtPass'];

             // Encriptar la contraseña utilizando el algoritmo MD5
             $contrasenaEncriptada = md5($pswd);
			//Variables de Lista de permisos
			$rdbrol=$_POST['rdbrol'];

            $conexion = mysqli_connect("localhost","u233954965_root","4A181fe85") //Asignamos valores como usuario y contraseña para que nos valide el login de la entrada a MySQL
            or die ("Fallo en el establecimiento de la conexi�n"); //Si los valores no son correctos nos da error
    
            
            mysqli_select_db($conexion,"u233954965_SGA") //Seleccionamos la base de datos a utilizar
            or die("Error en la selecci�n de la base de datos");
    
        // Sentencia SQL para insertar los datos
        $sql = "INSERT INTO usuariossga (nombreusr,contrausr,telefonousr,emailusr, rolusr)
        VALUES ('$Nombre','$contrasenaEncriptada','$Telefono','$Correo',  '$rdbrol')";
    
        if (mysqli_query($conexion, $sql)) {
            echo "Datos insertados correctamente";
           
        } else {
            echo "Error al insertar datos: " . mysqli_error($conexion);
        }
		}   
		?>
            </form>
        </div>    
	</body>
</html>
