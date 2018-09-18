<?php
require '../config/connection.php';
$i=1;
session_start();
$folio=$_POST['folio'];
$sql="SELECT * FROM solicitud where folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->execute();
foreach ($stament as $stament):
$datos['d1']=$stament['folio'];
$datos['Territorio']=$stament['Territorio'];
$datos['Estado']=$stament['Estado'];
$datos['Ciudad']=$stament['Ciudad'];
$datos['Pais']=$stament['Pais'];
$datos['fecha']=$stament['fecha'];
$datos['hora']=$stament['hora'];
$datos['lugar']=$stament['lugar'];
$datos['empresa']=$stament['empresa'];
$datos['tema']=$stament['tema'];
$datos['Nombre_Recibe']=$stament['Nombre_Recibe'];
$datos['Contacto_empresa']=$stament['Contacto_empresa'];
$datos['Objetivo']=$stament['Objetivo'];
$datos['Maestro']=$stament['Maestro'];
$datos['tipo_actividad']=$stament['tipo_actividad'];
$datos['tipo_evento']=$stament['tipo_evento'];
$datos['Maestro']=$stament['Maestro'];
endforeach;

$sql="SELECT * FROM alumno a,alumnosolicitud b where a.Matricula=b.Matricula and b.folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->execute();
foreach ($stament as $alum) :
  $datos['alumno'][$i]=$alum['Matricula'];
  $datos['alumno'][$i+1]=$alum['Nombre'];
  $datos['alumno'][$i+2]=$alum['Carrera'];
  $datos['alumno'][$i+3]=$alum['Grupo'];
  $i=$i+4;
endforeach;
$datos['count']=$i;

echo json_encode($datos);
?>
