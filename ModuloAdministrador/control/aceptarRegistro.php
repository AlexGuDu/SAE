<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$matricula=$_POST['matricula'];
$comentario=$_POST['comentario'];
$sql = "UPDATE alumnoactividad set  aprobacionRegistro = 2  WHERE folio= :folio and Matricula=:matricula";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->bindParam(':matricula', $matricula);
$stament->execute();

$sql="SELECT tipo_evento FROM actividad where folio=:folio";
$statement = $dbh->prepare($sql);
$statement->bindParam(':folio', $folio);
$statement->execute();
foreach ($statement as $statement):
  $clave_tipo_evento = $statement['tipo_evento'];
endforeach;

$sql="SELECT nomEvento FROM tipo_evento where idEvento=$clave_tipo_evento";
$statement = $dbh->prepare($sql);
$statement->execute();
foreach ($statement as $statement):
  $nombre_evento = $statement['nomEvento'];
endforeach;

$nombre_evento = 'Act'.$nombre_evento;

$sql = "UPDATE alumno set $nombre_evento = $nombre_evento+1  WHERE Matricula = $matricula";
$statement = $dbh->prepare($sql);
$statement->execute();

$sql = "UPDATE actividad set Comentario = :comentario  WHERE folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->bindParam(':comentario', $comentario);
$stament->execute();
 ?>
