<?php
session_start();
include "conexiondb.php";
$conexion = conectarBD();

if (isset($_POST["bntingresar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["password"])) {
        $usuario = $_POST["nombre"];
        $password = $_POST["password"];

        // Consulta de la tabla empleados
        $sql = $conexion->query("SELECT * FROM empleados WHERE nombre_emp='$usuario' AND password='$password'");

        if ($datos = $sql->fetch_object()) {

            $_SESSION["nombre_emp"] = $datos->nombre_emp;  

            // Redirige a la página de inicio
            header("Location: Vistas/Inicio/Inicio.php");
            exit();
        } else {
            echo "<div>Acceso denegado</div>"; 
        }
    } else {
        echo "<div>Campos vacíos</div>";  
    }
}
?>