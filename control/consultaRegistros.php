<?php
  require '../config/connection.php';
  $i=1;
  session_start();
  $matricula=$_SESSION['matricula'];

  $sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Matricula=$matricula and c.aprobacionCoordinador!=0";

  $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($filas as $filas):
    $datos[$i]=$filas['tema'];
    $datos[$i+1]=$filas['aprobacionCoordinador'];
    $datos[$i+2]=$filas['aprobacionRegistro'];
    $datos[$i+3]=$filas['fecha'];
    $datos[$i+4]=$filas['folio'];
    $i=$i+5;
  endforeach;

  $datos['count']=$i;
  echo json_encode($datos);
?>
