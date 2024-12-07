<?php
include ('../../Conexion/ConexionDB.php');
$con = conectarBD();


$nombre = $_POST['nombre_serv'];
$descripcion = $_POST['descrip_serv'];
$costo = $_POST['costo_serv'];


$sql = "INSERT INTO servicios (nombre_serv, descrip_serv, costo_serv) VALUES ('$nombre', '$descripcion', '$costo')";
$query = mysqli_query($con, $sql);


if ($query) {
    Header("Location: ../../Vistas/Vista_Servicio/servicio.php");
}
?>