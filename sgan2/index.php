<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Inicio de sesion | SGA</title>
</head>
<body>
    <form action="recibirLogin.php"method="post" >
        <div class="contenedor">
            <div class="login">
                <div class="wave">
                    <div class="logo">  
                        <img src="img/sga.png" alt="Logo de la empresa" id="logoSGA" name="logoSGA" class="logoSGA"width="200px" height="200px">    
                    </div>
                </div>
               <div class="cajas">
                <div class="caja1">
                    <p>
                        <label>Ingrese su usuario</label><br>
                        <input type="text" id="usuario" class="usuario" name="user" required/>
                        <span class="icon"> <i class="fa fa-user"></i> </span>
                        </p>
                </div>
                <div class="caja2">
                    <p>
                        <label>Ingrese su contraseña</label><br>
                        <input type="password" class="password" id="password" name="password" minlength="8" required/>       
                        <span class="icon2"><i class="fa fa-lock"></i></span>
                    </p>
                </div>
               </div>
                
                <div class="boton">
                    <input type="submit" class="aceptar" name="btnsubmit" value="Iniciar sesi&oacute;n">
                </div>      
            </div>
        </div>
        </form>    
</body>
</html>