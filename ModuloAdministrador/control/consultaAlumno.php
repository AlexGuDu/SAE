<?php
require '../../config/connection.php';
session_start();
$i=1;
$sql="SELECT * FROM alumno ";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($stament as $filas):
  $datos[$i]=$filas['Matricula'];
  $datos[$i+1]=$filas['Nombre'];
  $datos[$i+2]=$filas['ApePa'];
  $datos[$i+3]=$filas['ApeMa'];
  $datos[$i+4]=$filas['Grupo'];
  $datos[$i+5]=$filas['Carrera'];
  $datos[$i+6]=$filas['Etapa'];
$i=$i+7;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
