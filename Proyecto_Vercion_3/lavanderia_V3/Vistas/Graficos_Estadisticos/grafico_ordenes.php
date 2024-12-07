<?php
require_once "../../Conexion/ConexionDB.php";
$con = conectarBD();

// Consulta para contar las ventas de cada servicio
$sql = "SELECT servicio, COUNT(*) as cantidad FROM ordenes GROUP BY servicio";
$consulta = mysqli_query($con, $sql);
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Servicio', 'Cantidad'],
          <?php
          // Recorremos los resultados de la consulta para obtener los datos
          while ($resultado = mysqli_fetch_assoc($consulta)) {
            // Procesamos el ENUM 'servicio' y lo mostramos junto con la cantidad
            // El ENUM podría tener valores como 'Lavado', 'Planchado', 'Secado', etc.
            echo "['" . addslashes($resultado['servicio']) . "', " . (int)$resultado['cantidad'] . "],";
          }
          ?>
        ]);

        var options = {
          title: 'Cantidad de Servicios Vendidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>