<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$correo = $_POST['correo'];
$telefono=$_POST['telefono'];
$password=$_POST['password'];

$sql = "UPDATE empleados SET nombre_emp='$nombre', paterno_emp='$paterno', materno_emp='$materno', correo_emp='$correo', telefono_emp='$telefono', password='$password'  WHERE id_emp='$id'";
$query =mysqli_query($con,$sql);

if($query){
    header("Location: ../../Vistas/Vista_empleados/empleados.php");
};
?>