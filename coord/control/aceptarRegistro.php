<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$matricula=$_POST['matricula'];
$comentario=$_POST['comentario'];
$sql = "UPDATE alumnoactividad set aprobacionCoordinador= 2, aprobacionRegistro=1  WHERE Folio=:folio and Matricula=:matricula";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->bindParam(':matricula', $matricula);
$stament->execute();
$sql = "UPDATE actividad set Comentario = :comentario  WHERE folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->bindParam(':comentario', $comentario);
$stament->execute();
 ?>
