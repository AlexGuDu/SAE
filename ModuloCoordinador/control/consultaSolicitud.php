<?php
require '../../config/connection.php';
session_start();
$i=1;
$sql="SELECT * FROM coocarrera where numEmp= :numEmp";
$stament = $dbh->prepare($sql);
$stament->bindParam(':numEmp', $_SESSION['numEmp']);
$stament->execute();
foreach ($stament as $filas):
  $carrera=$filas['CarreraAsig'];
endforeach;
$sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Carrera= :carrera and a.Matricula=b.responsable and b.solicitadoPrev=1 and b.estatusSolicitud=0  and b.estadoCoordinador=1";
$stament = $dbh->prepare($sql);
$stament->bindParam(':carrera', $carrera);
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
