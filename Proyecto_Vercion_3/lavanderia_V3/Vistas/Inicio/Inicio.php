<?php
session_start();

include ('../../Conexion/ConexionDB.php');
$con = conectarBD();
$sql = "SELECT * FROM empleados";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../Recursos/CSS/estilismenu.css">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
        <!-- Nota si los iconos no se cargan puede ser por que no reconoce el codigo de fontawesome "este es el link: de la pagina que estoy usando: https://fontawesome.com/" -->
    <script src="https://kit.fontawesome.com/938fee697b.js" crossorigin="anonymous"></script>
    <style>
        /* Imagen de fondo */
        main {
            background-image: url('../../Imagenes/FondoGeneral.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;  
            padding: 20px;
        }


        h1 {
            position: relative;
            top: 0%; 
            right: -1900%; 
            font-size: 150%;
            color: black;
            white-space: nowrap;
        }
    </style>
</head>
<body id="body">

    <!-- Menú lateral -->
    <header> 
        <div class="icon__menu">
            <i class="fa-solid fa-bars" id="btn_open"></i>
            <h1 class="fa-solid fa-user" style="color: #000000;"> <?php echo "Bienvenido  &nbsp;". $_SESSION['nombre_emp']; ?>  </h1>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-jug-detergent"></i>
            <h4> Lavanderia "Luz de Luna"  </h4>
        </div>

        <div class="options__menu">
            <a href="../Inicio/Inicio.php" class="selected">
                <div class="option">
                    <i class="fa-solid fa-house" title="Inicio"></i>
                    <h4>Inicio </h4>
                </div>
            </a>
            <a href="../Vista_Empleados/empleados.php" class="menu-link" data-option="empleados">
                <div class="option">
                    <i class="fa-solid fa-users" title="Empleados"></i>
                    <h4>Empleados </h4>
                </div>
            </a>
            <a href="../Vista_ordenes/ordenes.php">
                <div class="option">
                    <i class="fa-solid fa-calendar-days" title="Ordenes"></i>
                    <h4>Ordenes </h4>
                </div>
            </a>
            <a href="../Vista_Servicio/servicio.php">
                <div class="option">
                <i class="fa-solid fa-bell" title="Servicios"></i>
                    <h4>Servicios </h4>
                </div>
            </a>
            <a href="../../Index.php">
                <div class="option">
                <i class="fa-solid fa-power-off" title="Salir"></i>
                    <h4>Salir </h4>
                </div>
            </a>
        </div>
    </div>

    <!-- Contenido principal -->
    <main>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div>
        <a href="../Graficos_Estadisticos/grafico_ordenes.php" class="btnagregar" target="_blank"> Generar Grafico</a>
        </div>
        <br>
        <br>
        <br>
        <div>
        <a href="../Vista_Empleados/empleados.php" class="btnagregar"> Empleados</a>
        <a href="../Vista_ordenes/ordenes.php" class="btnagregar"> Ordenes</a>
        </div>
        <br>
        <br>
        <br>
        <div>
        <a href="../Vista_Servicio/servicio.php" class="btnagregar"> Servicios</a>
        <a href="../../Index.php" class="btnagregar"> Salir</a>
        </div>
    </main>

    <script src="../../Recursos/Js/scrip.js"> </script>
</body>
</html>