<?php
include ('../../Conexion/ConexionDB.php');
$con = conectarBD();

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$fecha = $_POST['fecha_ord'];
$cantidad = (int)$_POST['cantidad_ord'];
$estado = $_POST['estado'];
$descripcion = $_POST['descripcion'];
$servicio = $_POST['servicio'];

// Precios por servicio
switch ($servicio) {
    case 'Lavado Simple':
        $precioUnitario = 10;  // Precio por kg lavado simple
        break;
    case 'Trajes':
        $precioUnitario = 25;  // Precio por unidad trajes
        break;
    case 'Frasadas':
        $precioUnitario = 20;  // Precio por unidad frazadas
        break;
    default:
        $precioUnitario = 0;  // En caso de que haya algún error con el servicio
        break;
}

$costoTotal = $precioUnitario * $cantidad;

$sql = "INSERT INTO ordenes (nombre_cli, paterno_cli, materno_cli, fecha_ord, cantidad_ord, estado, descripcion, servicio, costo_total) 
        VALUES ('$nombre', '$paterno', '$materno', '$fecha', '$cantidad', '$estado', '$descripcion', '$servicio', '$costoTotal')";

$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: ../../Vistas/Vista_ordenes/ordenes.php");
} else {
    echo "Error al insertar los datos: " . mysqli_error($con);
}
?>