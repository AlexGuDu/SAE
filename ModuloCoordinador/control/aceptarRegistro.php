<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$comentario=$_POST['comentario'];
$sql = "UPDATE alumnosolicitud set aprobacionCoordinador= 2, aprobacionRegistro=1  WHERE folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->execute();
$sql = "UPDATE solicitud set Comentario = :comentario  WHERE folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->bindParam(':comentario', $comentario);
$stament->execute();
 ?>
