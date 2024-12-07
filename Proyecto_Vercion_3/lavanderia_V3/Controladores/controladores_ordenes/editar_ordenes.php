<?php
include ('../../Conexion/ConexionDB.php');
$con = conectarBD();


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$fecha = $_POST['fecha_ord'];
$cantidad = $_POST['cantidad_ord'];
$estado = $_POST['estado'];
$descripcion = $_POST['descripcion'];
$servicio = $_POST['servicio'];

// Validar la fecha
$fechaActual = date('Y-m-d');
if ($fecha < $fechaActual) {
    die("Error: La fecha ingresada no puede ser anterior a la fecha actual.");
}


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

// Actualizar la orden en la base de datos
$sql = "UPDATE ordenes 
        SET nombre_cli='$nombre', 
            paterno_cli='$paterno', 
            materno_cli='$materno', 
            fecha_ord='$fecha', 
            cantidad_ord='$cantidad', 
            estado='$estado', 
            descripcion='$descripcion', 
            servicio='$servicio',
            costo_total='$costoTotal'
        WHERE id_ord='$id'";

$query = mysqli_query($con, $sql);

// Verificar si la consulta fue exitosa
if ($query) {
    header("Location: ../../Vistas/Vista_ordenes/ordenes.php");
} else {
    echo "Error al actualizar la orden: " . mysqli_error($con);
}
?>