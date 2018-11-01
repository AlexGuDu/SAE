<?php
require '../../config/connection.php';
$cveMateria = $_POST['cveMateria'];
$sql="SELECT * FROM materia WHERE cveMateria=:cveMateria";
$stament = $dbh->prepare($sql);
$stament->bindParam(':cveMateria', $cveMateria);
$stament->execute();

foreach ($stament as $stament):
  $datos['NomMateria']=$stament['NomMateria'];
endforeach;

echo json_encode($datos);
?>
