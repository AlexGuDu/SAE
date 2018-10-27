<?php
session_start();
unset($_SESSION['matricula']);
unset($_SESSION['matriculas']);
unset($_SESSION['error']);
header('Location: ../views/home.php');

?>
