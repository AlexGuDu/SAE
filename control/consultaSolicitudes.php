<?php
  require '../config/connection.php';
  $i=1;
  session_start();
  $matricula=$_SESSION['matricula'];

  $sql="SELECT * FROM alumno a,actividad b, alumnoactividad c where a.Matricula=c.Matricula and b.folio=c.Folio and a.Matricula=$matricula and b.solicitadoPrev=1 and c.aprobacionCoordinador=0";

  $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($filas as $filas):
    $datos[$i]=$filas['tema'];
    $datos[$i+1]=$filas['estadoCoordinador'];
    $datos[$i+2]=$filas['estatusSolicitud'];
    $datos[$i+3]=$filas['fecha_registro'];
    $datos[$i+4]=$filas['folio'];
    $i=$i+5;
  endforeach;

  $datos['count']=$i;
  echo json_encode($datos);
?>
