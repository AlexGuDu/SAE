<?php
$date = date("Y-m-d");
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte'.$date.'.xls');

require('../../config/PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('SAE')->setLastModifiedBy('SAE')->
        setTitle('Reporte'.$date);

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setTitle('Actividades');

require '../../config/connection.php';

//Insertar titulos
$pagina->setCellValue('A1', 'MATRICULA');
$pagina->setCellValue('B1', 'NOMBRE');
$pagina->setCellValue('C1', 'CARRERA');
$pagina->setCellValue('D1', 'VINCULACION ');
$pagina->setCellValue('E1', 'CIENTIFICA');
$pagina->setCellValue('F1', 'DEPORTIVA');
$pagina->setCellValue('G1', 'SOCIAL');
$pagina->setCellValue('H1', 'CULTURAL');
$pagina->setCellValue('I1', 'TOTAL');
$pagina->setCellValue('J1', 'ACREDITACION');
$pagina->setCellValue('K1', '%');

//Agregar fuente
$pagina->getStyle('A1:K1')->getFont()->setBold(true);
$pagina->getStyle('A1:K1')->getFont()->setSize(12);
$i=2;
$count=0;

//Alumnos Admin Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b where Carrera='ADMINISTRACION DE EMPRESAS' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//Agregar alumnos
foreach ($stament as $filas):
  $pagina->setCellValue('A'.($i), $filas['Matricula']);
  $NombreCom=$filas['ApePa'].' '.$filas['ApeMa'].' '.$filas['Nombre'];
  $pagina->setCellValue('B'.($i), $NombreCom);
  $pagina->setCellValue('C'.($i), $filas['Carrera']);
  $pagina->setCellValue('D'.($i), $filas['ActVinculacion']);
  $pagina->setCellValue('E'.($i), $filas['ActCientifica']);
  $pagina->setCellValue('F'.($i), $filas['ActDeportiva']);
  $pagina->setCellValue('G'.($i), $filas['ActResponsabilidadSocial']);
  $pagina->setCellValue('H'.($i), $filas['ActCultural']);
  $pagina->setCellValue('I'.($i), '=SUM(D'.$i.':H'.$i.')');
  $pagina->setCellValue('J'.($i), '=IF(I'.$i.'=0,0,1)');
  $i=$i+1;
  $count=1+$count;
endforeach;
  $pagina->setCellValue('C'.($i), 'SUMA:');
  //Guardar celda ultimo alumno
  $A=$i-1;
  //Calcular SUMA actividades
  $pagina->setCellValue('D'.($i), '=SUM(D2:D'.$A.')');
  $pagina->setCellValue('E'.($i), '=SUM(E2:E'.$A.')');
  $pagina->setCellValue('F'.($i), '=SUM(F2:F'.$A.')');
  $pagina->setCellValue('G'.($i), '=SUM(G2:G'.$A.')');
  $pagina->setCellValue('H'.($i), '=SUM(H2:H'.$A.')');
  $pagina->setCellValue('I'.($i), '=SUM(I2:I'.$A.')');
  $pagina->setCellValue('J'.($i), '=SUM(J2:J'.$A.')');
  $pagina->setCellValue('K'.($i), '=(J'.$i.'*100)/'.$count);
//Alumnos Admin Final


//Alumnos INFO Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b where Carrera='INFORMATICA' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$count=0;
$i=$i+2;
$E=$i;
//Insertar titulos
$pagina->setCellValue('A'.$i, 'MATRICULA');
$pagina->setCellValue('B'.$i, 'NOMBRE');
$pagina->setCellValue('C'.$i, 'CARRERA');
$pagina->setCellValue('D'.$i, 'VINCULACION ');
$pagina->setCellValue('E'.$i, 'CIENTIFICA');
$pagina->setCellValue('F'.$i, 'DEPORTIVA');
$pagina->setCellValue('G'.$i, 'SOCIAL');
$pagina->setCellValue('H'.$i, 'CULTURAL');
$pagina->setCellValue('I'.$i, 'TOTAL');
$pagina->setCellValue('J'.$i, 'ACREDITACION');
$pagina->setCellValue('K'.$i, '%');
//Agregar fuente
$pagina->getStyle('A'.$i.':K'.$i)->getFont()->setBold(true);
$pagina->getStyle('A'.$i.':K'.$i)->getFont()->setSize(12);
$i=$i+1;


//Agregar alumnos
foreach ($stament as $filas):
  $pagina->setCellValue('A'.($i), $filas['Matricula']);
  $NombreCom=$filas['ApePa'].' '.$filas['ApeMa'].' '.$filas['Nombre'];
  $pagina->setCellValue('B'.($i), $NombreCom);
  $pagina->setCellValue('C'.($i), $filas['Carrera']);
  $pagina->setCellValue('D'.($i), $filas['ActVinculacion']);
  $pagina->setCellValue('E'.($i), $filas['ActCientifica']);
  $pagina->setCellValue('F'.($i), $filas['ActDeportiva']);
  $pagina->setCellValue('G'.($i), $filas['ActResponsabilidadSocial']);
  $pagina->setCellValue('H'.($i), $filas['ActCultural']);
  $pagina->setCellValue('I'.($i), '=SUM(D'.$i.':H'.$i.')');
  $pagina->setCellValue('J'.($i), '=IF(I'.$i.'=0,0,1)');
  $i=$i+1;
  $count=1+$count;
endforeach;
  $pagina->setCellValue('C'.($i), 'SUMA:');
  //Guardar celda ultimo alumno
  $A=$i-1;
  //Calcular SUMA actividades
  $pagina->setCellValue('D'.($i), '=SUM(D'.$E.':D'.$A.')');
  $pagina->setCellValue('E'.($i), '=SUM(E'.$E.':E'.$A.')');
  $pagina->setCellValue('F'.($i), '=SUM(F'.$E.':F'.$A.')');
  $pagina->setCellValue('G'.($i), '=SUM(G'.$E.':G'.$A.')');
  $pagina->setCellValue('H'.($i), '=SUM(H'.$E.':H'.$A.')');
  $pagina->setCellValue('I'.($i), '=SUM(I'.$E.':I'.$A.')');
  $pagina->setCellValue('J'.($i), '=SUM(J'.$E.':J'.$A.')');
  $pagina->setCellValue('K'.($i), '=(J'.$i.'*100)/'.$count);
//Alumnos INFO Final

//Alumnos NEGO-IN Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b where Carrera='NEGOCIOS INTERNACIONALES' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$count=0;
$i=$i+2;
$E=$i;
//Insertar titulos
$pagina->setCellValue('A'.$i, 'MATRICULA');
$pagina->setCellValue('B'.$i, 'NOMBRE');
$pagina->setCellValue('C'.$i, 'CARRERA');
$pagina->setCellValue('D'.$i, 'VINCULACION ');
$pagina->setCellValue('E'.$i, 'CIENTIFICA');
$pagina->setCellValue('F'.$i, 'DEPORTIVA');
$pagina->setCellValue('G'.$i, 'SOCIAL');
$pagina->setCellValue('H'.$i, 'CULTURAL');
$pagina->setCellValue('I'.$i, 'TOTAL');
$pagina->setCellValue('J'.$i, 'ACREDITACION');
$pagina->setCellValue('K'.$i, '%');
//Agregar fuente
$pagina->getStyle('A'.$i.':K'.$i)->getFont()->setBold(true);
$pagina->getStyle('A'.$i.':K'.$i)->getFont()->setSize(12);
$i=$i+1;
//Agregar alumnos
foreach ($stament as $filas):
  $pagina->setCellValue('A'.($i), $filas['Matricula']);
  $NombreCom=$filas['ApePa'].' '.$filas['ApeMa'].' '.$filas['Nombre'];
  $pagina->setCellValue('B'.($i), $NombreCom);
  $pagina->setCellValue('C'.($i), $filas['Carrera']);
  $pagina->setCellValue('D'.($i), $filas['ActVinculacion']);
  $pagina->setCellValue('E'.($i), $filas['ActCientifica']);
  $pagina->setCellValue('F'.($i), $filas['ActDeportiva']);
  $pagina->setCellValue('G'.($i), $filas['ActResponsabilidadSocial']);
  $pagina->setCellValue('H'.($i), $filas['ActCultural']);
  $pagina->setCellValue('I'.($i), '=SUM(D'.$i.':H'.$i.')');
  $pagina->setCellValue('J'.($i), '=IF(I'.$i.'=0,0,1)');
  $i=$i+1;
  $count=1+$count;
endforeach;
  $pagina->setCellValue('C'.($i), 'SUMA:');
  //Guardar celda ultimo alumno
  $A=$i-1;
  //Calcular SUMA actividades
  $pagina->setCellValue('D'.($i), '=SUM(D'.$E.':D'.$A.')');
  $pagina->setCellValue('E'.($i), '=SUM(E'.$E.':E'.$A.')');
  $pagina->setCellValue('F'.($i), '=SUM(F'.$E.':F'.$A.')');
  $pagina->setCellValue('G'.($i), '=SUM(G'.$E.':G'.$A.')');
  $pagina->setCellValue('H'.($i), '=SUM(H'.$E.':H'.$A.')');
  $pagina->setCellValue('I'.($i), '=SUM(I'.$E.':I'.$A.')');
  $pagina->setCellValue('J'.($i), '=SUM(J'.$E.':J'.$A.')');
  $pagina->setCellValue('K'.($i), '=(J'.$i.'*100)/'.$count);
//Alumnos NEGO-IN Final

//Alumnos CONTA Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b where Carrera='CONTADURIA' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$count=0;
$i=$i+2;
$E=$i;
//Insertar titulos
$pagina->setCellValue('A'.$i, 'MATRICULA');
$pagina->setCellValue('B'.$i, 'NOMBRE');
$pagina->setCellValue('C'.$i, 'CARRERA');
$pagina->setCellValue('D'.$i, 'VINCULACION ');
$pagina->setCellValue('E'.$i, 'CIENTIFICA');
$pagina->setCellValue('F'.$i, 'DEPORTIVA');
$pagina->setCellValue('G'.$i, 'SOCIAL');
$pagina->setCellValue('H'.$i, 'CULTURAL');
$pagina->setCellValue('I'.$i, 'TOTAL');
$pagina->setCellValue('J'.$i, 'ACREDITACION');
$pagina->setCellValue('K'.$i, '%');
//Agregar fuente
$pagina->getStyle('A'.$i.':K'.$i)->getFont()->setBold(true);
$pagina->getStyle('A'.$i.':K'.$i)->getFont()->setSize(12);
$i=$i+1;

//Agregar alumnos
foreach ($stament as $filas):
  $pagina->setCellValue('A'.($i), $filas['Matricula']);
  $NombreCom=$filas['ApePa'].' '.$filas['ApeMa'].' '.$filas['Nombre'];
  $pagina->setCellValue('B'.($i), $NombreCom);
  $pagina->setCellValue('C'.($i), $filas['Carrera']);
  $pagina->setCellValue('D'.($i), $filas['ActVinculacion']);
  $pagina->setCellValue('E'.($i), $filas['ActCientifica']);
  $pagina->setCellValue('F'.($i), $filas['ActDeportiva']);
  $pagina->setCellValue('G'.($i), $filas['ActResponsabilidadSocial']);
  $pagina->setCellValue('H'.($i), $filas['ActCultural']);
  $pagina->setCellValue('I'.($i), '=SUM(D'.$i.':H'.$i.')');
  $pagina->setCellValue('J'.($i), '=IF(I'.$i.'=0,0,1)');
  $i=$i+1;
  $count=1+$count;
endforeach;
  $pagina->setCellValue('C'.($i), 'SUMA:');
  //Guardar celda ultimo alumno
  $A=$i-1;
  //Calcular SUMA actividades
  $pagina->setCellValue('D'.($i), '=SUM(D'.$E.':D'.$A.')');
  $pagina->setCellValue('E'.($i), '=SUM(E'.$E.':E'.$A.')');
  $pagina->setCellValue('F'.($i), '=SUM(F'.$E.':F'.$A.')');
  $pagina->setCellValue('G'.($i), '=SUM(G'.$E.':G'.$A.')');
  $pagina->setCellValue('H'.($i), '=SUM(H'.$E.':H'.$A.')');
  $pagina->setCellValue('I'.($i), '=SUM(I'.$E.':I'.$A.')');
  $pagina->setCellValue('J'.($i), '=SUM(J'.$E.':J'.$A.')');
  $pagina->setCellValue('K'.($i), '=(J'.$i.'*100)/'.$count);
//Alumnos CONTA Final


//Acomodar celdas
  foreach (range('A','K') as $column ):
    $pagina->getColumnDimension($column)->setAutoSize(true);
  endforeach;
//Descargar excel
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output');
 ?>
