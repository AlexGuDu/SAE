<!DOCTYPE html>
<?php
// Session_start();
// if(isset($_SESSION['matricula'])){
// 	header('Location: menu.php');
// }
?>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP Y CSS STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/home.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/home_coordinador.css">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <title>SAE - Login Administrador</title>
</head>

<body>
    <!-- INGRESAR -->
    <div class="container-fluid">
        <div class="row">
            <div id="ingresar" class="col-11 col-md-10 col-lg-6">
                <br>
                <img id="logo" src="../assets/img/Logo Oficial.png" alt="Escudo S.A.E.">
                <br>

                    <div class="form-group">
                        <form id="ingresarForm" action="control/loginSAEAdmin.php" method="post" >
                        <label> Numero de empleado: </label>
                        <input type="text" class="form-control" autofocus="autofocus" name="numEmp">
                    </div>
                    <div class="form-group">
                        <label> Contrase&ntilde;a </label>
                        <input type="password" class="form-control" name="contra">
                      </form>
                    </div>
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
                        <a href="">Entra aqui</a>
                    </p>
            </div>
        </div>
    </div>

    <!-- FIN DE INGRESAR -->
    <script src="../../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../../js/home.js"></script>
</body>

</html>
