<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();

$id=$_GET['id'];

$sql= "SELECT * FROM empleados WHERE id_emp='$id'";
$query =mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
    <title>Editar Usuario</title>
</head>
<body>
    <div class="formagregar">
        <form action="editar_usuario.php" method="POST">
            <h1>Editar</h1>
            <input type="hidden" name = "id" value="<?= $row['id_emp'] ?>">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre_emp'] ?>">
            <input type="text" name="paterno" placeholder="Apellido Paterno" value="<?= $row['paterno_emp'] ?>">
            <input type="text" name="materno" placeholder="Apellido Materno" value="<?= $row['materno_emp'] ?>">
            <input type="email" name="correo" placeholder="Correo@gmail.com" value="<?= $row['correo_emp'] ?>">
            <input type="text" name="telefono" placeholder="12345678" value="<?= $row['telefono_emp'] ?>">
            <input type="text" name="password" placeholder="emer1234" value="<?= $row['password'] ?>">
            <input type="submit" value="Actualizar">  
        </form>
    </div> 
</body>
</html>