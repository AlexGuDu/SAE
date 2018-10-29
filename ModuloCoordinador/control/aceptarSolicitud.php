<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$sql = "UPDATE solicitud set estatusSolicitud=2  WHERE folio=$folio";
$filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
header('Location:../views/menu.html');
 ?>
