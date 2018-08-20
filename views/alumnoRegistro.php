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
			<img id="Escudo" src="../assets/img/logo-uabc.png" alt="Escudo UABC">
			<img id="Letras" src="../assets/img/uabc-letras.png" alt="Letras UABC">
		</div>
	</div>
</div>
<!-- FIN DE HEADER -->

<!-- REGISTRO -->
<div class="container-fluid" >
	<div class="row">
		<div id="registro" class="col-11 col-md-10 col-lg-6">
			<img id="logo" src="../assets/img/Logo Oficial.png" alt="Escudo S.A.E.">
			<form action="../control/register.php" method="post">
			<p class="texto">Matricula</p>
			<input class="textBox form-control block" type="text" name="matricula" autofocus="autofocus">
			<p class="texto">Contrase&ntilde;a</p>
			<input class="textBox form-control block" type="password" name="contra" >
			<p class="texto">Correo</p>
			<input class="textBox form-control block" type="text" name="correo" >
			<label for="correo" class="control-label inline">@uabc.edu.mx</label>
			<p class="texto">Grupo</p>
			<input class="textBox" type="text" name="telefono">
			<p class="texto">Telefono</p>
			<input class="textBox" type="text" name="telefono">
			<?php
			if(isset($_SESSION['error'])){
				if ($_SESSION['error']=1) {
					echo '<p style="color:rgb(255,0,0);">La cuentra que trata de ingresar ya se encuentra registrada.</p>';
				}
				unset($_SESSION['error']);
			}
			?>
			<br>
			<input id="boton" type="button" name="Registrar" value="Registrar">
			</form>
			<br>
		</div>
	</div>
	<br>
</div>
<!-- FIN DE REGISTRO -->


</body>
</html>
