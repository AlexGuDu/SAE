<?php
require '../config/connection.php';
$i=1;
$sql="SELECT * FROM `alumno` ORDER BY Carrera ";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($filas as $filas):
$datos[$i]=$filas['Matricula'];
$datos[$i+1]=$filas['Carrera'];
$i=$i+2;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
