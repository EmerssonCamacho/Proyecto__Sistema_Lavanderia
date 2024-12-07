<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
    <title>Agregar Usario</title>
</head>
<body>
    <!-- Formulario para agragar ususarios Nota,"poner en otro archivo" -->
    <div class="formagregar">
    <form action="../../Controladores/controladores_ordenes/agregar_ordenes.php" method="POST">
    <h1>Agregar Ordenes</h1>
    <!-- Campos de texto -->
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="paterno" placeholder="Apellido Paterno" >
    <input type="text" name="materno" placeholder="Apellido Materno" >
    <input type="date" name="fecha_ord" placeholder="AAAA/MM/DD" min="<?= date('Y-m-d') ?>" required>
    <input type="text" name="cantidad_ord" placeholder="5 KG" required>
    
    <!-- Menú desplegable para el estado -->
    <select name="estado" required>
        <option value="Pendiente">Pendiente</option>
        <option value="Procesada">Procesada</option>
        <option value="Completada">Completada</option>
        <option value="Cancelada">Cancelada</option>
    </select>

    <!-- Campo de descripción -->
    <textarea name="descripcion" placeholder="Descripción de la orden"></textarea>

    <select name="servicio" required>
    <option value="Lavado Simple">Lavado Simple</option>
    <option value="Trajes">Trajes</option>
    <option value="Frasadas">Frasadas</option>
    </select>
    
    <!-- Botón para enviar -->
    <input type="submit" value="Agregar Orden">  
</form>
    </div> 
</body>
</html>