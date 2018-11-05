<?php
Session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<!-- BOOTSTRAP Y CSS STYLES -->
	<title>Registro de alumnos</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/css/alumnoRegistro.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>

<!-- HEADER -->
<div class="container-fluid" id="header">
	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <a href="../index.php">
			<img id="Escudo" src="../assets/img/logo-uabc.png" alt="Escudo UABC"> &nbsp;
			<img id="Letras" src="../assets/img/uabc-letras.png" alt="Letras UABC">
      </a>
		</div>
	</div>
</div>
<!-- FIN DE HEADER -->

<!-- REGISTRO -->
<div class="container-fluid" >

		<div id="registro" class="col-md-6 col-lg-6">
			<br> <img id="logo" src="../assets/img/Logo Oficial.png" alt="Escudo S.A.E."> <br>
			<form id="ingresarForm" action="../control/registroAlumno.php" method="post" name="rg_al_form">
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Matricula</label>
                <input class="form-control" type="text" name="matricula"  autofocus="autofocus" required>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Contrase&ntilde;a</label>
                <input class="form-control" type="password" name="contra"  required>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Correo</label>
                <input class="form-control" type="text" name="correo" required>
                <label for="correo" class="control-label inline">@uabc.edu.mx</label>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Grupo</label>
                <input class="form-control" type="text" name="grupo" required>
              </div>
          </div>
      </div>

      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <labe>Telefono</label>
                <input class="form-control" type="text" name="telefono"  placeholder="(664) 000-0000" required>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
            <?php
            if(isset($_SESSION['error'])){
              if ($_SESSION['error']==1) {
                echo '<label style="color:rgb(255,0,0);">La matricula intenta registrar ya se encuentra registrada.</label>';
              }
              if ($_SESSION['error']==2) {
                echo '<label style="color:rgb(255,0,0);">No se encontro un alumno con esta matricula!.</label>';
              }
              unset($_SESSION['error']);
            }
            ?>
            <label id="empty_warning"></label>
          </div>
      </div>



      </form>
			<input id="boton" type="submit" name="Registrar" form="ingresarForm" value="Registrar">
			<br>

	</div>
	<br>
</div>
<!-- FIN DE REGISTRO -->
<script src="../assets/bootstrap/bootstrap.min.js"></script>
<script src="../js/alumno_registro.js"></script>
</body>
</html>
