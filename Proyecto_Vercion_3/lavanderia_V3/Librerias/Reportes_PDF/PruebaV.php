<?php

require('./fpdf.php');

class PDF extends FPDF
{
   // Cabecera de página
   function Header()
   {
      $this->Image('logo.png', 185, 5, 20); // Logo de la empresa
      $this->SetFont('Arial', 'B', 19);
      $this->Cell(45); // Mover a la derecha
      $this->SetTextColor(0, 0, 0);
      $this->Cell(110, 15, utf8_decode('Luz de Luna'), 1, 1, 'C', 0);
      $this->Ln(3);
      $this->SetTextColor(103);
      $this->Cell(110);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación: Nuestra Señora de La Paz"), 0, 0, '', 0);
      $this->Ln(5);
      $this->Cell(110);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono: 12345678"), 0, 0, '', 0);
      $this->Ln(5);
      $this->Cell(110);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo: Luzdeluna@gmail.com"), 0, 0, '', 0);
      $this->Ln(5);

      // Título de la tabla
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50);
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("Reporte de Ordenes "), 0, 1, 'C', 0);
      $this->Ln(7);

      // Encabezados de la tabla
      $this->SetFillColor(228, 100, 0);
      $this->SetTextColor(255, 255, 255);
      $this->SetDrawColor(163, 163, 163);
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('Cliente'), 1, 0, 'C', 1); // Aumentado el ancho de la celda
      $this->Cell(30, 10, utf8_decode('Servicio'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Estado'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Costo Total'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C');
   }
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

// Conexión a la base de datos
include('../../Conexion/ConexionDB.php');
$con = conectarBD();

// Consulta para obtener los datos
$sql = "SELECT * FROM ordenes";
$query = mysqli_query($con, $sql);

// Mostra datos
while ($row = mysqli_fetch_assoc($query)) {
    // Calcular el costo 
    $costoTotal = $row['cantidad_ord'] * 50;

    // Mostrar los datos en el PDF
    $pdf->Cell(18, 10, $row['id_ord'], 1, 0, 'C', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50, 10, utf8_decode($row['nombre_cli'] . ' ' . $row['paterno_cli'] . ' ' . $row['materno_cli']), 1, 0, 'C', 0); 
    $pdf->Cell(30, 10, utf8_decode($row['servicio']), 1, 0, 'C', 0); 
    $pdf->Cell(25, 10, utf8_decode($row['estado']), 1, 0, 'C', 0); 
    $pdf->Cell(30, 10, utf8_decode($row['cantidad_ord']), 1, 0, 'C', 0); 
    $pdf->Cell(30, 10, utf8_decode($costoTotal), 1, 1, 'C', 0); 
}

// Generar el PDF
$pdf->Output('Reporte_de_Ordenes.pdf', 'I');
?>