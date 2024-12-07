<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();


$id = null;
$nombre = $_POST['nombre_emp'];
$paterno = $_POST['paterno_emp'];
$materno = $_POST['materno_emp'];
$correo = $_POST['correo_emp'];
$telefono=$_POST['telefono_emp'];
$password=$_POST['password_emp'];

$sql = "INSERT INTO empleados VALUES('$id', '$nombre', '$paterno', '$materno', '$correo','$telefono', '$password')";
$query =mysqli_query($con,$sql);

if($query){
    Header("Location: ../../Vistas/Vista_empleados/empleados.php");
};

?>