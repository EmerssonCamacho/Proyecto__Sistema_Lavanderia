<?php
include ('../../Conexion/ConexionDB.php');
$con = conectarBD();

if (!isset($_GET['id'])) {
    die('El ID no está presente en la URL');
}

$id = $_GET['id'];

// Consulta para obtener los datos de la orden
$sql = "SELECT * FROM ordenes WHERE id_ord='$id'";
$query = mysqli_query($con, $sql);

if (!$query) {
    die('Error en la consulta SQL: ' . mysqli_error($con));
}

if (mysqli_num_rows($query) == 0) {
    die('No se encontraron registros para este ID');
}

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
    <title>Editar Ordenes</title>
</head>
<body>
    <div class="formagregar">
    <form action="editar_ordenes.php" method="POST">
    <h1>Editar</h1>
    <!-- Campo oculto para pasar el ID de la orden -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id_ord']) ?>">
    
    <!-- Campos de texto -->
    <input type="text" name="nombre" placeholder="Nombre" value="<?= htmlspecialchars($row['nombre_cli']) ?>" required>
    <input type="text" name="paterno" placeholder="Apellido Paterno" value="<?= htmlspecialchars($row['paterno_cli']) ?>" >
    <input type="text" name="materno" placeholder="Apellido Materno" value="<?= htmlspecialchars($row['materno_cli']) ?>" >
    <input type="date" name="fecha_ord" placeholder="AAAA/MM/DD" min="<?= date('Y-m-d') ?>" value="<?= htmlspecialchars($row['fecha_ord']) ?>" required>
    <input type="text" name="cantidad_ord" placeholder="5 KG" value="<?= htmlspecialchars($row['cantidad_ord']) ?>" required>
    
    
    <!-- Menú desplegable para el estado -->
    <select name="estado" required>
        <option value="Pendiente" <?= $row['estado'] === 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
        <option value="Procesada" <?= $row['estado'] === 'Procesada' ? 'selected' : '' ?>>Procesada</option>
        <option value="Completada" <?= $row['estado'] === 'Completada' ? 'selected' : '' ?>>Completada</option>
        <option value="Cancelada" <?= $row['estado'] === 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
    </select>

    <!-- Campo de descripción -->
    <textarea name="descripcion" placeholder="Descripción de la orden"><?= htmlspecialchars($row['descripcion']) ?></textarea>
    
    <select name="servicio" required>
    <option value="Lavado Simple" <?= $row['servicio'] === 'Lavado Simple' ? 'selected' : '' ?>>Lavado Simple</option>
    <option value="Trajes" <?= $row['servicio'] === 'Trajes' ? 'selected' : '' ?>>Trajes</option>
    <option value="Frasadas" <?= $row['servicio'] === 'Frasadas' ? 'selected' : '' ?>>Frasadas</option>
    </select>
    <!-- Botón para enviar -->
    <input type="submit" value="Actualizar">  
</form>
    </div> 
</body>
</html>