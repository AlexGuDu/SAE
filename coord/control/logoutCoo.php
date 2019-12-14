<?php
session_start();
unset($_SESSION['numEmpCoordinador']);
unset($_SESSION['error']);
header('Location: ../views/home_coordinador.php');


 ?>
