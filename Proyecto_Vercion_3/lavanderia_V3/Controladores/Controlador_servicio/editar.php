<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();

$id=$_GET['id'];

$sql= "SELECT * FROM servicios WHERE id_serv='$id'";
$query =mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
    <title>Editar Servicio</title>
</head>
<body>
    <div class="formagregar">
        <form action="editar_servicio.php" method="POST">
            <h1>Editar Servicio</h1>
            
            <input type="hidden" name="id_serv" value="<?= $row['id_serv'] ?>">


            <input type="text" name="nombre_serv" placeholder="Nombre del Servicio" value="<?= $row['nombre_serv'] ?>" required>
            <textarea name="descrip_serv" placeholder="Descripción del Servicio" required><?= $row['descrip_serv'] ?></textarea>
            <input type="number" step="0.01" name="costo_serv" placeholder="Costo del Servicio en Bs" value="<?= $row['costo_serv'] ?>" required>

            <input type="submit" value="Actualizar">  
        </form>
    </div> 
</body>
</html>