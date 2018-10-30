<?php

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte.xls');

require('../../config/PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Sae')->setLastModifiedBy('Sae')->
        setTitle('Reporte');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setTitle('Actividades');

require '../../config/connection.php';
$i=2;
$sql="SELECT * FROM alumno ORDER BY Carrera";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$pagina->setCellValue('A1', 'MATRICULA');
$pagina->setCellValue('B1', 'NOMBRE');
$pagina->setCellValue('C1', 'CARRERA');
$pagina->setCellValue('D1', 'VICULACION ');
$pagina->setCellValue('E1', 'CIENTIFICA');
$pagina->setCellValue('F1', 'DEPORTIVA');
$pagina->setCellValue('G1', 'SOCIAL');
$pagina->setCellValue('H1', 'CULTURAL');
$pagina->setCellValue('I1', 'TOTAL');

$pagina->getStyle('A1:C1')->getFont()->setBold(true);
$pagina->getStyle('A1:E1')->getFont()->setSize(12);
foreach ($stament as $filas):
  $pagina->setCellValue('A'.($i), $filas['Matricula']);
  $NombreCom=$filas['ApePa'].' '.$filas['ApeMa'].' '.$filas['Nombre'];
  $pagina->setCellValue('B'.($i), $NombreCom);
  $pagina->setCellValue('C'.($i), $filas['Carrera']);
  $i=$i+1;
endforeach;

  foreach (range('A','C') as $column ):
    $pagina->getColumnDimension($column)->setAutoSize(true);
  endforeach;

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output');
 ?>
