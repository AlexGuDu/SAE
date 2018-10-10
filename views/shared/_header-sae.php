<!DOCTYPE html>
<?php
require_once '../../config/connection.php';
session_start();
$sql="SELECT * FROM alumno where Matricula= :matricula";
$stament = $dbh->prepare($sql);
$stament->bindParam(':matricula', $_SESSION['matricula']);
$stament->execute();

 ?>
<html>

<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap and CSS styles -->
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/css/header-sae.css">
</head>

<body>
    <div id="header-sae">
        <!-- LOGO -->
        <div class="container" id="logo-sae">
            <div class="row top-buffer align-items-center justify-content-center">
                <div class="col-3 col-md-2">
                  <a href="menu.php"><img id="cimarron" src="../assets/img/logo-sae-cimarron.png" class="img-fluid"></a>

                </div>
                <div class="col-7 col-md-9">
                    <p class="h1 font-weight-light text-center ">Sistema de Actividades Extracurriculares</p>
                    <img src="../assets/img/linea-verde.png" class="img-fluid">
                </div>
                <div class="col-2 col-md-1 align-self-start">
                    <img src="../assets/img/interrogacion.png" class="img-fluid" id="interrogacion">
                </div>
            </div>
        </div>
        <!-- FIN DE LOGO -->

        <!-- DATOS DE ALUMNO -->
        <div class="container" id="info-alumno">
            <div class="row justify-content-end  top-buffer-alumno">
                <div class="col-4">
                    <p class="text-center">Matr&Iacute;cula</p>
                    <img src="../assets/img/linea-verde.png" class="img-fluid">
                    <p class="text-center" id="matricula"><?php foreach ($stament as $filas) :
                      echo $filas['Matricula'];
                    ?></p>
                </div>
                <div class="col-4">
                    <p class="text-center">Nombre del Alumno</p>
                    <img src="../assets/img/linea-verde.png" class="img-fluid">
                    <p class="text-center"><?php
                      echo $filas['ApePa']." ".$filas['ApeMa']." ".$filas['Nombre'];
                    ?></p>
                </div>
                <div class="col-4">
                    <p class="text-center">Carrera</p>
                    <img src="../assets/img/linea-verde.png" class="img-fluid">
                    <p class="text-center" ><?php
                      echo $filas['Carrera'];
                    endforeach; ?></p>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../../js/header-sae.js"></script>

</html>
