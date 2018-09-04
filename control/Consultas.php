<?php
require '../config/connection.php';
$matricula=$_POST['matricula'];
$sql="SELECT * FROM alumno a,solicitud b, alumnosolicitud c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Matricula=$matricula";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($filas as $filas):
$datos['d1']=$filas['tema'];
$datos['d2']=$filas[''];
$datos['d3']=$filas['Aprovacion'];
$datos['d4']=$filas['fecha'];
echo json_encode($datos);
endforeach;


?>
