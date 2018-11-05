<?php
require '../../config/connection.php';
$i=1;
session_start();
$sql="SELECT * FROM coocarrera where numEmp= :numEmp";
$stament = $dbh->prepare($sql);
$stament->bindParam(':numEmp', $_SESSION['numEmp']);
$stament->execute();
foreach ($stament as $filas):
  $carrera=$filas['CarreraAsig'];
endforeach;

$sql="SELECT * FROM `alumno` where Carrera= :carrera";
$stament = $dbh->prepare($sql);
$stament->bindParam(':carrera', $carrera);
$stament->execute();
foreach ($stament as $filas):
  $datos[$i]=$filas['Matricula'];
  $datos[$i+1]=$filas['Carrera'];
  $datos[$i+2]=$filas['ActVinculacion'];
  $datos[$i+3]=$filas['ActCientifica'];
  $datos[$i+4]=$filas['ActDeportiva'];
  $datos[$i+5]=$filas['ActResponsabilidad Social'];
  $datos[$i+6]=$filas['ActCultural'];
  $datos[$i+7]=$filas['ActVinculacion']+$filas['ActCientifica']+$filas['ActDeportiva']+$filas['ActResponsabilidad Social']+$filas['ActCultural'];
  $i=$i+8;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
