<?php
require '../config/connection.php';
$i=1;
session_start();
$matricula=$_SESSION['matricula'];
$sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Matricula=$matricula and b.solicitadoPrev=1 and b.estatusSolicitud=2 and c.aprobacionRegistro=0";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($filas as $filas):
$datos[$i]=$filas['folio'];
$datos[$i+1]=$filas['tema'];
$i=$i+2;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
