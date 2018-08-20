<?php
require '../config/connection.php';
session_start();
$matricula=$_POST['matricula'];
$sql="SELECT * FROM alumno where Matricula='$matricula'";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($filas as $filas):
$datos['d1']=$filas['Nombre'];
$datos['d2']=$filas['Carrera'];
$datos['d3']=$filas['Grupo'];
$datos['d4']=$filas['Matricula'];
endforeach;

if(isset($_SESSION['matriculas'])){
  $cantidad=COUNT($_SESSION['matriculas']);
  $_SESSION['matriculas'][$cantidad]=$matricula;
}
else {
  $_SESSION['matriculas']=array();
  $cantidad=COUNT($_SESSION['matriculas']);
  $_SESSION['matriculas'][$cantidad]=$matricula;
}


echo json_encode($datos);


?>
