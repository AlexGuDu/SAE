<?php
require '../config/connection.php';
session_start();
$matricula=$_POST['matricula'];
$cantidad=COUNT($_SESSION['matriculas']);
for ($i=0; $i <$cantidad ; $i++) {
  if ($matricula==$_SESSION['matriculas'][$i]) {
    $_SESSION['matriculas'][$i]=0;
  }
}

 ?>
