<?php
require '../../config/connection.php';
session_start();
$i=1;
$sql="SELECT * FROM coofp where numEmp= :numEmpAdministrador";
$stament = $dbh->prepare($sql);
$stament->bindParam(':numEmpAdministrador', $_SESSION['numEmpAdministrador']);
$stament->execute();
$sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio and c.aprobacionRegistro=1 and c.aprobacionCoordinador=2 ";
$stament = $dbh->prepare($sql);
$stament->execute();
foreach ($stament as $filas):
  $datos[$i]=$filas['tema'];
  $datos[$i+1]=$filas['Matricula'];
  $datos[$i+2]=$filas['fecha_registro'];
  $datos[$i+3]=$filas['folio'];
  $datos[$i+4]=$filas['evidenciaImg'];
  $i=$i+5;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
