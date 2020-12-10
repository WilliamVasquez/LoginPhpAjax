<?php
ob_start();

require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/images/logo-uese.png',10,8,40);    
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    /* $this->Cell(80); */
    // Título
    $this->Cell(0,0,'Reporte de Expedientes',0,1,'C');
    $this->Ln(8);
    /* $this->Cell(80); */
    $this->SetFont('');
    $this->SetFont('Arial','',8);
    // Salto de línea
    $this->Ln(30);
    $this->SetFont('');
    $this->SetFont('Arial','B',10);
    $this->Cell(30, 10, 'Expediente', 1, 0, '', 0);
    $this->Cell(20, 10, 'Carnet', 1, 0, '', 0);
    $this->Cell(25, 10, 'Apellidos', 1, 0, '', 0);
    $this->Cell(25, 10, 'Nombres', 1, 0, '', 0);
    $this->Cell(20, 10, 'Estado', 1, 0, '', 0);
    $this->Cell(25, 10, 'Motivo', 1, 0, '', 0);
    $this->Cell(25, 10, 'F.Cancelacion', 1, 0, '', 0);
    $this->Cell(35, 10, 'Programa', 1, 0, '', 0);
    $this->Cell(20, 10, 'Ubicacion', 1, 0, '', 0);
    $this->Cell(30, 10, 'Facultad', 1, 0, '', 0);
    $this->Cell(25, 10, 'Observacion', 1, 0, '', 0);
    $this->Ln(10);

}

// Pie de página
function Footer()
{
    require('cn.php');
    $consulta = "SELECT NOW();";
    $resultado = $mysqli->query($consulta);
    
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    while ($row = $resultado->fetch_assoc()) {
        $this->Cell(0, 10, $row['NOW()'], 1, 0, '', 0);
    }    
    // Número de página
    $this->Cell(0,10,utf8_decode('Pág.: ').$this->PageNo().'/{nb}',0,0,'R');

}
}

require('cn.php');

$consulta = "CALL reporte_ingresado ('Ingresado')";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['Expediente'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Carnet'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['Apellidos'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['Nombres'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Estado'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['Motivo'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['FechaDeCancelacion'], 1, 0, '', 0);
    $pdf->Cell(35, 10, $row['Programa'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Ubicacion'], 1, 0, '', 0);
    $pdf->Cell(30, 10, $row['Facultad'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['Observacion'], 1, 0, '', 0);
    $pdf->Ln(10);
}
$nombre = 'ReporteDeExpedientes';
$pdf->SetTitle($nombre);

$pdf->Output("I", $nombre.'.pdf',true);
ob_end_flush(); 
?>