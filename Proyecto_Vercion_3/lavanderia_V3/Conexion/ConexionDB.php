<?php
// Función para conectar a la base de datos
function conectarBD() {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $basededatos = "Lavanderia";

    $conexion = mysqli_connect($servidor, $usuario, $clave, $basededatos);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    return $conexion;
}
?>