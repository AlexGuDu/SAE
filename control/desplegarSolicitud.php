<?php
require '../config/connection.php';
session_start();
$folio=$_POST['folio'];
$sql="SELECT * FROM solicitud where folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->execute();
foreach ($stament as $stament):

$datos['d1']=$stament['folio'];
$datos['Territorio']=$stament['Territorio'];
$datos['Estado']=$stament['Estado'];
$datos['Ciudad']=$stament['Ciudad'];
$datos['Pais']=$stament['Pais'];
$datos['fecha']=$stament['fecha'];
$datos['hora']=$stament['hora'];
$datos['lugar']=$stament['lugar'];
$datos['empresa']=$stament['empresa'];
$datos['tema']=$stament['tema'];
$datos['Nombre_Recibe']=$stament['Nombre_Recibe'];
$datos['Contacto_empresa']=$stament['Contacto_empresa'];
$datos['Objetivo']=$stament['Objetivo'];
$datos['Maestro']=$stament['Maestro'];
$datos['tipo_actividad']=$stament['tipo_actividad'];
$datos['tipo_evento']=$stament['tipo_evento'];
$datos['Maestro']=$stament['Maestro'];
if ($datos['estatusSolicitud']==0) {
  $stament['estatusSolicitud']='Pendiente';
}
endforeach;
echo json_encode($datos);
?>
