<?php
require_once '../config/connection.php';

$folio=$_POST['folio'];
$aprobacionRegistro = 1;

  $sql = "UPDATE alumnosolicitud SET aprobacionRegistro=:aprobacionRegistro where Folio='$folio'";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':aprobacionRegistro', $aprobacionRegistro);

  $stament->execute();
  header('Location: ../views/home.php');

?>
