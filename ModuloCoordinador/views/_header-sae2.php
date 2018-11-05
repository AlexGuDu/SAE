<!DOCTYPE html>
<?php
require_once '../../config/connection.php';
session_start();
$sql="SELECT * FROM coocarrera where numEmp= :numEmp";
$stament = $dbh->prepare($sql);
$stament->bindParam(':numEmp', $_SESSION['numEmp']);
$stament->execute();

 ?>
<html>

<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap and CSS styles -->
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/css/header-sae.css">
</head>

<body>
    <div id="header-sae">
        <!-- LOGO -->
        <div class="container" id="logo-sae">
            <div class="row top-buffer align-items-center justify-content-center">
                <div class="col-3 col-md-2">
                  <a href="menu.php"><img id="cimarron" src="../../assets/img/logo-sae-cimarron.png" class="img-fluid"></a>

                </div>
                <div class="col-7 col-md-9">
                    <a href="menu.php" id="anchor_sae" class="h1 font-weight-light text-center"><p >Sistema de Actividades Extracurriculares</p> </a>
                    <img src="../../assets/img/linea-verde.png" class="img-fluid">
                </div>
                <div class="col-2 col-md-1 align-self-start">
                    <img src="../../assets/img/interrogacion.png" class="img-fluid" id="interrogacion">
                </div>
            </div>
        </div>
        <!-- FIN DE LOGO -->

        <!-- DATOS DE ALUMNO -->
        <div class="container" id="info-alumno">
            <div class="row justify-content-end  top-buffer-alumno">
                <div class="col-6">
                    <p class="text-center">Nombre Coordinador</p>
                    <img src="../../assets/img/linea-verde.png" class="img-fluid">
                    <p class="text-center"><?php foreach ($stament as $filas) :
                     echo $filas['ApePa']." ".$filas['ApeMa']." ".$filas['Nombre'];
                    ?></p>
                </div>
                <div class="col-6">
                    <p class="text-center">Carrera</p>
                    <img src="../../assets/img/linea-verde.png" class="img-fluid">
                    <p class="text-center" ><?php
                     echo $filas['CarreraAsig'];
                   endforeach; ?></p>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../../js/header-sae.js"></script>

</html>
