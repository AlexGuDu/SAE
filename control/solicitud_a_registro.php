<?php
require_once '../config/connection.php';
session_start();

$folio=$_POST['folio'];
$matricula=$_SESSION['matricula'];
$aprobacionCoordinador = 1;

  $sql = "UPDATE alumnoactividad SET aprobacionCoordinador=:aprobacionCoordinador where Folio='$folio' and  Matricula='$matricula'";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':aprobacionCoordinador', $aprobacionCoordinador);

  $stament->execute();
  header('Location: ../views/index.php');

?>
