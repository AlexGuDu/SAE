<?php
require '../../config/connection.php';
session_start();
$i=1;
$sql="SELECT * FROM coocarrera where numEmp= :numEmpCoordinador";
$stament = $dbh->prepare($sql);
$stament->bindParam(':numEmpCoordinador', $_SESSION['numEmpCoordinador']);
$stament->execute();
foreach ($stament as $filas):
  $carrera=$filas['CarreraAsig'];
endforeach;
$sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Carrera= :carrera  and c.aprobacionRegistro=0 and c.aprobacionCoordinador=1";
$stament = $dbh->prepare($sql);
$stament->bindParam(':carrera', $carrera);
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
