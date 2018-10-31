<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$comentario=$_POST['comentario'];
$sql = "UPDATE alumnoactividad set  aprobacionRegistro = 2  WHERE folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->execute();
$sql = "UPDATE actividad set Comentario = :comentario  WHERE folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->bindParam(':comentario', $comentario);
$stament->execute();
 ?>
