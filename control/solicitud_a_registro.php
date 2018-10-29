<?php
require_once '../config/connection.php';

$folio=$_POST['folio'];
$aprobacionCoordinador = 1;

  $sql = "UPDATE alumnosolicitud SET aprobacionCoordinador=:aprobacionCoordinador where Folio='$folio'";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':aprobacionCoordinador', $aprobacionCoordinador);

  $stament->execute();
  header('Location: ../views/home.php');

?>
