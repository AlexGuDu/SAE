<?php
require_once '../../config/connection.php';
session_start();
$numEmp=$_POST['numEmp'];
$pass=$_POST['contra'];
$bandera=0;
if(strlen($numEmp) > 0 && strlen($pass) > 0){
  $sql="SELECT * FROM coocarrera";
  $stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($stament as $filas):
    if($filas['numEmp']==$numEmp && $filas['Contra']==$pass){
        $bandera=1;
        $_SESSION['numEmpCoordinador']=$numEmp;
    }
  endforeach;
  if ($bandera==1) {
    header('Location: ../views/menu.php');
  }else {
    $_SESSION['error']=1;
    header('Location: ../views/home_coordinador.php');
  }
}else{
  $_SESSION['error']=1;
header('Location: ../views/home_coordinador.php');
}
?>
