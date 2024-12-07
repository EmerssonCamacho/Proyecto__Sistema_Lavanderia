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
        <form action="../../Controladores/Controladores_empleados/agregar_empleado.php" method="POST">
            <h1> Agregar Empleado </h1>
            <input type="text" name="nombre_emp" placeholder="Nombre" required>
            <input type="text" name="paterno_emp" placeholder="Apellido Paterno">
            <input type="text" name="materno_emp" placeholder="Apellido Materno">
            <input type="email" name="correo_emp" placeholder="Correo@gmail.com">
            <input type="text" name="telefono_emp" placeholder="12345678">
            <input type="text" name="password_emp" placeholder="constraseña">
            <input type="submit" value="Agregar Usuario">  
        </form>
    </div> 
</body>
</html>