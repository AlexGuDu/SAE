<?php
require '../../config/connection.php';
session_start();
$matricula=$_POST['matricula'];
$_SESSION['matricula']=$matricula;
?>
