<?php
include ('../../Conexion/ConexionDB.php');
$con =conectarBD();

$id=$_GET['id'];

$sql= "DELETE FROM ordenes WHERE id_ord='$id'";
$query =mysqli_query($con,$sql);

if($query){
    header("Location: ../../Vistas/Vista_ordenes/ordenes.php");
};
?>
