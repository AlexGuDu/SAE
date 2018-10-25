<?php
  require '../config/connection.php';
  $i=1;
  session_start();
  $matricula=$_SESSION['matricula'];

  $sql="SELECT * FROM alumno a,solicitud b, alumnosolicitud c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Matricula=$matricula";

  $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($filas as $filas):
    $datos[$i]=$filas['tema'];
    $datos[$i+1]=$filas['aprobacionRegistro'];
    $datos[$i+2]=$filas['fecha'];
    $datos[$i+3]=$filas['folio'];
    $i=$i+4;
  endforeach;

  $datos['count']=$i;
  echo json_encode($datos);
?>
