<?php
require '../config/connection.php';
session_start();
$flag=0;
$bandera=0;
$matricula=$_POST['matricula'];
// Validacion matricula vacia
if ($matricula==0) {
  $datos['error']=1;
}
else {
  // Validar si la matricula existe
  $sql="SELECT * FROM alumno";
  $stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($stament as $filas):
    if($filas['Matricula']==$matricula){
        $bandera=1;
        if($filas['Contra']==''){
          $flag=1;
          $datos['error']=5;
        }

    }
  endforeach;
  if ($bandera==0) {
    $datos['error']=2;
  }
  // Validar que la matricula no sea igual a la matricula de sesion
  if ($matricula==$_SESSION['matricula']) {
    $datos['error']=3;
  }
  else {
    if(isset($_SESSION['matriculas'])){
      $cantidad=COUNT($_SESSION['matriculas']);
      for ($i=0; $i <$cantidad ; $i++) {
        if ($matricula==$_SESSION['matriculas'][$i]) {
          $flag=1;
          $datos['error']=4;
        }
      }
    }
    if ($flag==0 && $bandera==1) {
      $sql="SELECT * FROM alumno where Matricula='$matricula'";
      $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      foreach ($filas as $filas):
      $datos['d1']=$filas['Nombre'];
      $datos['d2']=$filas['Carrera'];
      $datos['d3']=$filas['Grupo'];
      $datos['d4']=$filas['Matricula'];
      $datos['d5']=$matricula;
      endforeach;
      if(isset($_SESSION['matriculas'])){
        $cantidad=COUNT($_SESSION['matriculas']);
        $_SESSION['matriculas'][$cantidad]=$matricula;
      }
      else {
        $_SESSION['matriculas']=array();
        $cantidad=COUNT($_SESSION['matriculas']);
        $_SESSION['matriculas'][$cantidad]=$matricula;
      }
    }
  }
}
echo json_encode($datos);


?>
