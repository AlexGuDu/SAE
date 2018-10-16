<!DOCTYPE html>
<?php
Session_start();
if(isset($_SESSION['matricula'])){
	header('Location: menu.php');
}
?>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP Y CSS STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/home.css">
    <title>Login Alumnos</title>
</head>

<body>
    <!-- HEADER -->
    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img id="Escudo" src="../assets/img/logo-uabc.png" alt="Escudo UABC"> &nbsp;
                <img id="Letras" src="../assets/img/uabc-letras.png" alt="Letras UABC">
            </div>
        </div>
    </div>
    <!-- FIN DE HEADER -->

    <!-- INGRESAR -->
    <div class="container-fluid">
        <div class="row">
            <div id="ingresar" class="col-11 col-md-10 col-lg-6">
                <br>
                <img id="logo" src="../assets/img/Logo Oficial.png" alt="Escudo S.A.E.">
                <br>
                <form id="ingresarForm" action="../control/loginSAE.php" method="post" >

                    <div class="form-group">
                        <label> Matricula </label>
                        <input type="text" class="form-control" autofocus="autofocus" name="matricula">
                    </div>
                    <div class="form-group">
                        <label> Contrase&ntilde;a </label>
                        <input type="password" class="form-control" name="contra">
                    </div>
										</form>
                    <button type="submit" id="iniciarSesion" form="ingresarForm">Iniciar</button> <br><br>
                    <?php
                    if(isset($_SESSION['error'])){
                      if ($_SESSION['error']=1) {
                        echo '<p style="color:rgb(255,0,0);">La autentificaci&oacute;n ha fallado. Por favor int&eacute;ntelo de nuevo.</p>';
                      }
                      unset($_SESSION['error']);
                    }
                    ?>
                    <p class="texto">
                        Has olvidado tu contrase&ntilde;a? O no te has registrado?
                        <br>
                        <a href="alumnoRegistro.php">Entra aqui</a>
                    </p>
            </div>
        </div>
    </div>

    <!-- FIN DE INGRESAR -->
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
</body>

</html>
