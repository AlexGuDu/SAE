<?php
require '../config/PHPPDF/fpdf.php';
require '../config/connection.php';
session_start();
$sql="SELECT * FROM alumno where Matricula= :matricula";
$statement = $dbh->prepare($sql);
$statement->bindParam(':matricula', $_SESSION['matricula']);
$statement->execute();

foreach ($statement as $row):
  $matricula = $row['Matricula'];
  $nombre_completo = $row['ApePa']." ".$row['ApeMa']." ".$row['Nombre'];
  $carrera = $row['Carrera'];
  $act01=$row['ActVinculacion'];
  $act02=$row['ActCientifica'];
  $act03=$row['ActDeportiva'];
  $act04=$row['ActResponsabilidadSocial'];
  $act05=$row['ActCultural'];
endforeach;
$total = $act01+$act02+$act03+$act04+$act05;

if ($total < 5) {
  header('Location: ../views/menu.php');
}

$pdf = new FPDF();
$pdf->SetTitle('sae'.$matricula);
$pdf->AddPage();
$pdf->SetFont('Helvetica','',16);

$pdf->Image('../assets/img/logo-uabc.png',20,5,10);
$pdf->Image('../assets/img/exito.png',125,70,60);
$pdf->Image('../assets/img/logo-uabc.png',180,5,10);
$pdf->Image('../assets/img/uabc-letras.png',55,8,100);

$pdf->Cell(60,15, '', 0, 1,'C');
$pdf->Cell(190,12,  $nombre_completo, 1, 1, 'C');
$pdf->Cell(40,12,  $matricula, 1, 0,'C');
$pdf->Cell(150,12,  $carrera, 1, 1,'C');
$pdf->Cell(60,15, '', 0, 1,'C');

$pdf->Cell(85,10,  "Actividades Realizadas", 1, 1);
$pdf->Cell(65,10,  "Vinculacion:", 1, 0);
$pdf->Cell(20,10,  $act01, 1, 1, 'C');
$pdf->Cell(65,10,  "Cientifica:", 1, 0);
$pdf->Cell(20,10,  $act02, 1, 1, 'C');
$pdf->Cell(65,10,  "Deportiva:", 1, 0);
$pdf->Cell(20,10,  $act03, 1, 1, 'C');
$pdf->Cell(65,10,  "Responsabilidad Social:", 1, 0);
$pdf->Cell(20,10,  $act04, 1, 1, 'C');
$pdf->Cell(65,10,  "Cultural:", 1, 0);
$pdf->Cell(20,10,  $act05, 1, 1, 'C');

$pdf->SetFont('Helvetica','B',16);
$pdf->Cell(65,10,  "Total:", 1, 0);
$pdf->Cell(20,10,  $total, 1, 1, 'C');

$pdf->Output('D', ('sae'.$matricula.'.pdf'));
?>
