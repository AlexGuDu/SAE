<?php
require '../../config/connection.php';
session_start();
$i=1;
$sql="SELECT * FROM coofp where numEmp= :numEmpAdministrador";
$stament = $dbh->prepare($sql);
$stament->bindParam(':numEmpAdministrador', $_SESSION['numEmpAdministrador']);
$stament->execute();
$sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio  and a.Matricula=b.responsable and b.solicitadoPrev=1 and b.estatusSolicitud=1 and b.estadoCoordinador=2";
$stament = $dbh->prepare($sql);
$stament->execute();
foreach ($stament as $filas):
  $datos[$i]=$filas['tema'];
  $datos[$i+1]=$filas['responsable'];
  $datos[$i+2]=$filas['fecha_registro'];
  $datos[$i+3]=$filas['folio'];
  $i=$i+4;
endforeach;

$datos['count']=$i;
echo json_encode($datos);
?>
