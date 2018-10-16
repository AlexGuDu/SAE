<?php
require '../config/connection.php';
$i=1;
$sql="SELECT * FROM solicitud ";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($filas as $filas):
$datos[$i]=$filas['tema'];
$datos[$i+1]=$filas['responsable'];
$datos[$i+2]=$filas['fecha_registro'];
$datos[$i+3]=$filas['folio'];
$i=$i+4;
endforeach;
$datos['count']=$i;
echo json_encode($datos);
?>
