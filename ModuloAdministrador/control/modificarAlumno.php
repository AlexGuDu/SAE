<?php
require_once '../../config/connection.php';
$matricula=$_POST['matricula'];
$contra=$_POST['contra'];
$correo=$_POST['correo'];
$grupo=$_POST['grupo'];
$telefono=$_POST['telefono'];
$sql="UPDATE alumno set Matricula = :matricula, Contra = :contra, Grupo= :grupo, Correo= :correo, Telefono = :telefono  where Matricula= :matricula";
$stament = $dbh->prepare($sql);
$stament->bindParam(':matricula', $matricula);
$stament->bindParam(':contra', $contra);
$stament->bindParam(':correo', $correo);
$stament->bindParam(':grupo', $grupo);
$stament->bindParam(':telefono', $telefono);
$stament->execute();
header('Location: ../views/menu_alumnos.html');
 ?>
