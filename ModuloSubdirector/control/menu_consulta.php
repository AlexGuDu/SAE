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
$i=$i+2;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
