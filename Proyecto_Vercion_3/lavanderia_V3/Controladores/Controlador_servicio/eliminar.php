<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();

$id=$_GET['id'];

$sql= "DELETE FROM servicios WHERE id_serv='$id'";
$query =mysqli_query($con,$sql);

if($query){
    header("Location: ../../Vistas/Vista_Servicio/servicio.php");
};
?>
