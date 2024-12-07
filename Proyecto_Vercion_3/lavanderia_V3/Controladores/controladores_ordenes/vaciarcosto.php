<?php
include ('../../Conexion/ConexionDB.php');
$con = conectarBD();

$id = $_GET ['id']; 

// Vaciar el campo costo
$sql = "UPDATE ordenes SET costo_total=NULL WHERE id_ord='$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    // Redirigir a editar.php pasando el ID en la URL
    header("Location: editar.php?id=$id");
} else {
    echo "Error al vaciar el costo total: " . mysqli_error($con);
}
?>