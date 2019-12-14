<?php
    session_start();
    unset($_SESSION['numEmpAdministrador']);
    unset($_SESSION['error']);
    header('Location: ../');
?>
