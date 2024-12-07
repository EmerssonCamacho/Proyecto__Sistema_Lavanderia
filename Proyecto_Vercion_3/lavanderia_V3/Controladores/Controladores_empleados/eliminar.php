<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();

$id=$_GET['id'];

$sql= "DELETE FROM empleados WHERE id_emp='$id'";
$query =mysqli_query($con,$sql);

if($query){
    header("Location: ../../Vistas/Vista_empleados/empleados.php");
};
?>
