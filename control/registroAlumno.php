<?php
require_once '../config/connection.php';
session_start();
$mat_found = false;
$matricula=$_POST['matricula'];
$contra=$_POST['contra'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$grupo=$_POST['grupo'];
$sql="SELECT * FROM alumno";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($stament as $filas):
  if($filas['Matricula']==$matricula){
    $mat_found = true;
        if($filas['Contra']==null && $filas['Grupo']==null && $filas['Telefono']==null && $filas['Correo']==null){
          $sql = "UPDATE alumno SET Correo=:correo , Contra=:contra , Grupo=:grupo ,Telefono=:telefono where Matricula='$matricula'";
          $stament = $dbh->prepare($sql);
          $stament->bindParam(':correo', $correo);
          $stament->bindParam(':contra', $contra);
          $stament->bindParam(':grupo', $grupo);
          $stament->bindParam(':telefono', $telefono);
          $stament->execute();
          header('Location: ../index.php');
        } else {
          $_SESSION['error']=1;
          header('Location: ../views/alumnoRegistro.php');
        }
      }
endforeach;
if ($mat_found == false){
  $_SESSION['error']=2;
  header('Location: ../views/alumnoRegistro.php');
}
?>
