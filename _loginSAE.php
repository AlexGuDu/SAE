<?php
require_once '_connection.php';
session_start();
$matricula=$_POST['matricula'];
$pass=$_POST['contra'];
$bandera=0;
if(strlen($matricula) > 0 && strlen($pass) > 0){
  $sql="SELECT * FROM alumno";
  $stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($stament as $filas):
    if($filas['Matricula']==$matricula && $filas['Contra']==$pass){
        $bandera=1;
        $_SESSION['matricula']=$matricula;
    }
  endforeach;
  echo "$bandera";
  if ($bandera==1) {
    header('Location: menu.html');
  }else {
    $_SESSION['error']=1;
    header('Location: home.php');
  }
}else{
  $_SESSION['error']=1;
header('Location: home.php');
}
?>
