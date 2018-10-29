<?php
session_start();
unset($_SESSION['numEmp']);
unset($_SESSION['error']);
header('Location: ../views/home_administrador.php');


 ?>
