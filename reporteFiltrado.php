<?php
ob_start();
require('fpdf.php');
require('cn.php');
$facultad = $_POST['cmbFacultad'];
$programa = $_POST['cmbPrograma'];
$año = $_POST['cmbCancelacion'];

//Connect to your database
include("cn.php");
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('assets/images/logo-uese.png',10,8,40);    
    $this->SetFont('Arial','B',16);
    $this->Cell(0,0,'Reporte de Expedientes',0,1,'C');
    $this->Ln(8);
    $this->SetFont('');
    $this->SetFont('Arial','',8);
    $this->Ln(30);
    $this->SetFont('');
    $this->SetFillColor(232,232,232);
    $this->SetFont('Arial','B',10);
    $this->Cell(30, 10, 'Expediente', 1, 0, '', 0);
    $this->Cell(20, 10, 'Carnet', 1, 0, '', 0);
    $this->Cell(30, 10, 'Apellidos', 1, 0, '', 0);
    $this->Cell(30, 10, 'Nombres', 1, 0, '', 0);
    $this->Cell(20, 10, 'Estado', 1, 0, '', 0);
    $this->Cell(25, 10, 'Motivo', 1, 0, '', 0);
    $this->Cell(25, 10, 'F.Cancelacion', 1, 0, '', 0);
    $this->Cell(35, 10, 'Programa', 1, 0, '', 0);
    $this->Cell(20, 10, 'Ubicacion', 1, 0, '', 0);
    $this->Cell(20, 10, 'Facultad', 1, 0, '', 0);
    $this->Ln(10);
}

function Footer()
{
    require('cn.php');
    $consulta = "SELECT NOW();";
    $resultado = $mysqli->query($consulta);
    
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    while ($row = $resultado->fetch_assoc()) {
        $this->Cell(0, 10, $row['NOW()'], 1, 0, '', 0);
    }    
    $this->Cell(0,10,utf8_decode('Pág.: ').$this->PageNo().'/{nb}',0,0,'R');
}
}
//Create new pdf file
$pdf = new PDF('L','mm','A4');

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',8);


//Select the Products you want to show in your PDF file
$result=$mysqli->query("SELECT 
ex.codigo AS Expediente,
ex.FechaIngresado AS FechaIngresado,
a.Carnet AS Carnet,
CONCAT(a.PriApellido, ' ', a.SegApellido) AS Apellidos,
CONCAT(a.PriNombre, ' ', a.SegNombre) AS Nombres,
ex.estado AS Estado,
mc.Nombre AS Motivo,
dex.FechaCancelacion AS FechaDeCancelacion,
p.Nombre AS Programa,
ex.ubicacion AS Ubicacion,
ex.comentario AS Comentario,
ex.observacion AS Observacion,
f.Nombre as Facultad

FROM
expediente ex
    INNER JOIN
detalle_expediente AS dex ON ex.Codigo = dex.Codigo
    INNER JOIN
motivocancelacion AS mc ON dex.IdMotivoCancelacion = mc.IdMotivoCancelacion
    INNER JOIN
programa p ON dex.IdPrograma = p.IdPrograma
    INNER JOIN
alumno a ON dex.Carnet = a.Carnet
    INNER JOIN 
facultad f ON f.idfacultad = dex.idfacultad
WHERE
dex.IdFacultad = $facultad AND dex.IdPrograma = $programa AND year(dex.FechaCancelacion) = $año;");

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

while($row = $result->fetch_assoc())
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->Cell(30, 10, $row['Expediente'], 1, 0, '', 0);
        $pdf->Cell(20, 10, $row['Carnet'], 1, 0, '', 0);
        $pdf->Cell(25, 10, $row['Apellidos'], 1, 0, '', 0);
        $pdf->Cell(25, 10, $row['Nombres'], 1, 0, '', 0);
        $pdf->Cell(20, 10, $row['Estado'], 1, 0, '', 0);
        $pdf->Cell(25, 10, $row['Motivo'], 1, 0, '', 0);
        $pdf->Cell(25, 10, $row['FechaDeCancelacion'], 1, 0, '', 0);
        $pdf->Cell(35, 10, $row['Programa'], 1, 0, '', 0);
        $pdf->Cell(20, 10, $row['Ubicacion'], 1, 0, '', 0);
        $pdf->Cell(20, 10, $row['Comentario'], 1, 0, '', 0);
        $pdf->Cell(20, 10, $row['Observacion'], 1, 0, '', 0);
        
        //Go to next row
                
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    
    $pdf->Cell(30, 10, $row['Expediente'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Carnet'], 1, 0, '', 0);
    $pdf->Cell(30, 10, $row['Apellidos'], 1, 0, '', 0);
    $pdf->Cell(30, 10, $row['Nombres'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Estado'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['Motivo'], 1, 0, '', 0);
    $pdf->Cell(25, 10, $row['FechaDeCancelacion'], 1, 0, '', 0);
    $pdf->Cell(35, 10, $row['Programa'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Ubicacion'], 1, 0, '', 0);
    $pdf->Cell(20, 10, $row['Facultad'], 1, 0, '', 0);

    //Go to next row
        $i = $i + 1;
}

//Send file
$pdf->Output();
?>