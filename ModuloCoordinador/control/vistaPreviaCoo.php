<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$sql="SELECT * FROM actividad where folio= :folio";
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
$datos['materia']=$stament['materia'];
$datos['Maestro']=$stament['Maestro'];
$datos['aspecto_pro']=$stament['aspecto_pro'];
$datos['proponente']=$stament['proponente'];
$datos['tipo_actividad']=$stament['tipo_actividad'];
$datos['tipo_evento']=$stament['tipo_evento'];
endforeach;
echo json_encode($datos);
 ?>
