<?php
require '../../config/connection.php';

$sql="SELECT COUNT(*) FROM alumno where Carrera='ADMINISTRACION DE EMPRESAS'";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo $stament[COUNT(*)];
 ?>
