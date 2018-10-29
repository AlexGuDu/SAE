<?php
require '../config/connection.php';
$i=1;

$sql="SELECT * FROM materia a ORDER BY a.carrera";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($filas as $filas):
  $datos[$i]=$filas['NomMateria'];
  $datos[$i+1]=$filas['carrera'];
  $datos[$i+2]=$filas['cveMateria'];
  $i=$i+3;
endforeach;

$datos['count']=$i;
echo json_encode($datos);
?>
