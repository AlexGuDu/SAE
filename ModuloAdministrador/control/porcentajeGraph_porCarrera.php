<?php
require '../../config/connection.php';

$carrera = $_POST['carrera'];
$conteo_por_actividad['vinculacion'] = 0;
$conteo_por_actividad['cientifica'] = 0;
$conteo_por_actividad['deportiva'] = 0;
$conteo_por_actividad['responsabilidadSocial'] = 0;
$conteo_por_actividad['cultural'] = 0;

//Alumnos Admin Inicio
$sql="SELECT * FROM alumno where Carrera='$carrera'";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($stament as $filas):
  $conteo_por_actividad['vinculacion'] = $conteo_por_actividad['vinculacion']  + $filas['ActVinculacion'];
  $conteo_por_actividad['cientifica'] = $conteo_por_actividad['cientifica'] + $filas['ActCientifica'];
  $conteo_por_actividad['deportiva'] = $conteo_por_actividad['deportiva'] + $filas['ActDeportiva'];
  $conteo_por_actividad['responsabilidadSocial'] = $conteo_por_actividad['responsabilidadSocial'] + $filas['ActResponsabilidad Social'];
  $conteo_por_actividad['cultural'] = $conteo_por_actividad['cultural'] + $filas['ActCultural'];
endforeach;

//Alumnos Admin Final
echo json_encode($conteo_por_actividad);
 ?>
