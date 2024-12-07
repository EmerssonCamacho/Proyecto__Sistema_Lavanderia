<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Recursos/CSS/estilos.css">
    <title>Agregar Servicio</title>
</head>
<body>
    <!-- Formulario para agragar servicos -->
    <div class="formagregar">
        <form action="../../Controladores/Controlador_servicio/agregar_servicio.php" method="POST">
            <h1>Agregar Servicio</h1>
            <input type="text" name="nombre_serv" placeholder="Nombre del Servicio" required>
            <textarea name="descrip_serv" placeholder="Descripción del Servicio" required></textarea>
            <input type="number" step="0.01" name="costo_serv" placeholder="Costo del Servicio en !Bs" required>
            <input type="submit" value="Agregar Servicio">
        </form>
    </div> 
</body>
</html>