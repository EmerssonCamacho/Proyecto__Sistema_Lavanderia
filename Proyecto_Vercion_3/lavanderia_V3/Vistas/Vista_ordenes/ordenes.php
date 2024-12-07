<?php
session_start();
include ('../../Conexion/ConexionDB.php');

$con =conectarBD();

$sql ="SELECT * FROM ordenes";
$query =mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes</title>
    
    <link rel="stylesheet" href="../../Recursos/CSS/estilismenu.css">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
    <script src="https://kit.fontawesome.com/938fee697b.js" crossorigin="anonymous"></script>
        <style>
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

    <main>
    <!-- agragar ususarios  -->
    <div>
        <a href="adicionar_ordenes.php" class="btnagregar">Agregar Ordenes</a>

        <a href="../../Librerias/Reportes_PDF/PruebaH.php" class="btnagregar" target="_blank"> Generar Reportes</a>
    </div> 
    <br>
    <br>
     <!-- Formulario para mostrar datos "Mysql"-->
     <div class="tablas">
        <table>
            <thead>
                <tr>
                    <!-- TH para mostrar el nombre de las tablas -->
                    <th>ID</th>
                    <th>Nombre Cliente</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Registro</th>
                    <th>Cantidad Kg</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                    <th>Servicio</th>
                    <th>Costo del servicio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
             <!-- Cuerpo para mostrar los datos que tenemos almacenados -->
             <tbody>
             <?php while ($row = mysqli_fetch_array($query)) : ?>
                <tr>
        <th> <?= $row['id_ord'] ?> </th>
        <th> <?= $row['nombre_cli'] ?></th>
        <th> <?= $row['paterno_cli'] ?></th>
        <th> <?= $row['materno_cli'] ?></th>
        <th> <?= $row['fecha_ord'] ?></th>
        <th>
            <?php 
            // Personalizar descripción según cantidad
            if ($row['servicio'] == 'Lavado Simple') {
                echo $row['cantidad_ord'] . ' kg ropa';
            } elseif ($row['servicio'] == 'Frasadas') {
                echo $row['cantidad_ord'] . ' frazadas';
            } elseif ($row['servicio'] == 'Trajes'){
                echo $row['cantidad_ord'] . ' Trajes';
            } else {
                echo $row['cantidad_ord'] . ' Kg ropa';
            }
            ?>
                </th>
                    <th> <?= $row['estado'] ?></th>
                    <th> <?= $row['descripcion'] ?></th>
                    <th> <?= $row['servicio'] ?></th>
                    <th> <?= $row['costo_total'] ?> Bs</th>
                    <!-- Botones para eliminar o modificar-->
                    <th><a href="../../Controladores/controladores_ordenes/eliminar.php?id=<?= $row['id_ord'] ?>" class="btneliminar">Eliminar</a></th>
                    <th><a href="../../Controladores/controladores_ordenes/vaciarcosto.php?id=<?= $row['id_ord'] ?>" class="btneditar">Editar</a></th>
                </tr>
              <?php endwhile; ?>
            </tbody>
        </table>
     </div>
    </main>
    
    <script src="../../Recursos/Js/scrip.js"> </script>
</body>
</html>