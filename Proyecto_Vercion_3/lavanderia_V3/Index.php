
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta autor="Emersson Camacho Cori">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Recursos/CSS/Lavanderia.css">
    <style>
        body {
            margin: 0;
            background-image: url('imagenes/Fondo_Login.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <!-- Seccion Principal -->
    <div name="Marco Inicial" class="Marco">
        <!-- Seccion del logo -->
        <div name="Logo Img" class="Logo_Login">
            <img src="imagenes/Logo.png" alt="">
            <br>
            <?php
                include ('Conexion/controlador.php');
            ?>
        </div>
        <!-- Formulario de Login -->
        <form action="" method="POST">
            
            <!-- Usuario -->
            <div>
                <h3 class="Usuario"> Usuario </h3>
                <input type="text" id="nombre" name="nombre" >
            </div>
            <br>
            <br>
            <br>
            <!-- Contraseña -->
            <div>
                <h3 class="Contraseña"> Contraseña </h3>
                <input type="password" id="password" name="password" >
            </div>

            <!-- Boton de Iniciar Sesion -->
            <input class="BtnLogin" type="submit" name="bntingresar" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>