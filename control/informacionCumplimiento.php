<?php
require '../config/connection.php';
session_start();
$matricula=$_SESSION['matricula'];

$sql="SELECT * FROM alumno where Matricula=:matricula";
$statement = $dbh->prepare($sql);
$statement->bindParam(':matricula', $matricula);
$statement->execute();
foreach ($statement as $statement):
  $datos['act01']=$statement['ActVinculacion'];
  $datos['act02']=$statement['ActCientifica'];
  $datos['act03']=$statement['ActDeportiva'];
  $datos['act04']=$statement['ActResponsabilidad Social'];
  $datos['act05']=$statement['ActCultural'];
endforeach;
  $datos['total']=$datos['act01']+$datos['act02']+$datos['act03']+$datos['act04']+$datos['act05'];
  if ($datos['total']>5) {
    $datos['total']=5;
  }
echo json_encode($datos);
 ?>
