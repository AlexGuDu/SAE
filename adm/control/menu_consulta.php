<?php
require '../../config/connection.php';
$i=1;
session_start();
$sql="SELECT * FROM alumno a, alumnoregactividad b where a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($stament as $filas):
$datos[$i]=$filas['Matricula'];
$datos[$i+1]=$filas['Carrera'];
$datos[$i+2]=$filas['ActVinculacion'];
$datos[$i+3]=$filas['ActCientifica'];
$datos[$i+4]=$filas['ActDeportiva'];
$datos[$i+5]=$filas['ActResponsabilidadSocial'];
$datos[$i+6]=$filas['ActCultural'];
$datos[$i+7]=$filas['ActVinculacion']+$filas['ActCientifica']+$filas['ActDeportiva']+$filas['ActResponsabilidadSocial']+$filas['ActCultural'];
$i=$i+8;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
