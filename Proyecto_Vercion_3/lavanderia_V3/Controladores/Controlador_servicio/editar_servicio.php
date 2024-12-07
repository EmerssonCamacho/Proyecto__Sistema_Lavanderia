<?php
include ('../../Conexion/ConexionDB.php');
$con = conectarBD();


$id = $_POST['id_serv'];
$nombre = $_POST['nombre_serv'];
$descripcion = $_POST['descrip_serv'];
$costo = $_POST['costo_serv'];


$sql = "UPDATE servicios SET nombre_serv='$nombre', descrip_serv='$descripcion', costo_serv='$costo' WHERE id_serv='$id'";
$query = mysqli_query($con, $sql);

// Validar el resultado de la consulta
if ($query) {
    Header("Location: ../../Vistas/Vista_Servicio/servicio.php");
}
?>