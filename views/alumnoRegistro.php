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
			<img id="Escudo" src="../assets/img/logo-uabc.png" alt="Escudo UABC"> &nbsp;
			<img id="Letras" src="../assets/img/uabc-letras.png" alt="Letras UABC">
		</div>
	</div>
</div>
<!-- FIN DE HEADER -->

<!-- REGISTRO -->
<div class="container-fluid" >

		<div id="registro" class="col-md-6 col-lg-6">
			<br> <img id="logo" src="../assets/img/Logo Oficial.png" alt="Escudo S.A.E."> <br>
			<form id="ingresarForm" onsubmit="event.preventDefault(); validateForm();" action="../control/register.php" method="post" >










      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Matricula</label>
                <input class="form-control" type="text" name="matricula" id="mat" autofocus="autofocus">
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Contrase&ntilde;a</label>
                <input class="form-control" type="password" name="contra" id="con" >
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Correo</label>
                <input class="form-control" type="text" name="correo" id="cor">
                <label for="correo" class="control-label inline">@uabc.edu.mx</label>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <label>Grupo</label>
                <input class="form-control" type="text" name="grupo" id="gru">
              </div>
          </div>
      </div>

      <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                <labe>Telefono</label>
                <input class="form-control" type="text" name="telefono" id="tel" placeholder="(664) 000-0000">
              </div>
          </div>
      </div>





			<?php
			if(isset($_SESSION['error'])){
				if ($_SESSION['error']=1) {
					echo '<p style="color:rgb(255,0,0);">La cuenta que trata de ingresar ya se encuentra registrada.</p>';
				}
				unset($_SESSION['error']);
			}
			?>

      </form>
			<input id="boton" type="SUBMIT" name="Registrar" form="ingresarForm" value="Registrar">

			<br>

	</div>
	<br>
</div>
<!-- FIN DE REGISTRO -->
<script src="../assets/bootstrap/bootstrap.min.js"></script>
<script src="../js/alumno_registro.js"></script>
</body>
</html>
