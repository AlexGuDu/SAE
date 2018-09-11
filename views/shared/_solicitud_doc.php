<!DOCTYPE html>
<?php
require_once '../../config/connection.php';
session_start();
$folio=$_GET["folio"];
$sql="SELECT * FROM solicitud where folio= :folio";
$stament = $dbh->prepare($sql);
$stament->bindParam(':folio', $folio);
$stament->execute();
 ?>

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Solicitud</title>
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/css/solicitud_doc.css" rel="stylesheet">
  </head>
  <body>
    <br>
    <div id="entirePage">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <?php foreach ($stament as $filas): ?>
            <label>Territorio:</label> <label id="territorio"></label> <br>
            <label>Pais:</label> <label id="pais"><?php echo $filas['Territorio']; ?></label>
          </div>
          <div class="col-md-6 col-sm-6">
            <label>Estado:</label> <label id="estado"><?php echo $filas['Estado']; ?></label> <br>
            <label>Ciudad:</label> <label id="ciudad"><?php echo $filas['Ciudad']; ?></label>
          </div>
        </div> <!-- Row #1 -->
        <hr>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <label>Tipo de Evento:</label> <label id="tipo_evento"><?php echo $filas['tipo_evento']; ?></label> <br>
            <label>Fecha Inicial de Evento:</label> <label id="fecha_inicial"><?php echo $filas['fecha_registro']; ?></label>
          </div>
          <div class="col-md-6 col-sm-6">
            <label>Tipo de Actividad:</label> <label id="tipo_actividad"><?php echo $filas['tipo_actividad']; ?></label> <br>
            <label>Hora Inicial de Evento:</label> <label id="hora_inicial"><?php echo $filas['hora']; ?></label>
          </div>
        </div><!-- Row #2 -->


        <hr>

        <div class="row">
          <div class="col-md-6 col-sm-6">
            <label>Nombre de la Empresa:</label> <label id="nombre_empresa"><?php echo $filas['hora']; ?></label> <br>
            <label>Nombre de Representante de Empresa:</label> <label id="nombre_representante"><?php echo $filas['hora']; ?></label>
          </div>

          <div class="col-md-6 col-sm-6">
            <label>Tema de la Visita:</label> <label id="tema_visita"><?php echo $filas['hora']; ?></label> <br>
            <label>Datos de Contacto de Empresa:</label> <label id="datos_contacto"><?php echo $filas['hora']; ?></label>
          </div>
        </div> <!-- Row #3 -->
        <hr>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <label>Objetivo de la Actividad:</label> <label id="objetivo_actividad"><?php echo $filas['hora']; ?></label>
          </div>
        </div> <!-- Row #4 -->
        <hr>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <label>Materia Fortalecida:</label> <label id="materia_fortalecida"><?php echo $filas['hora']; ?></label> <br>
            <label>Aspecto Profesiona Fortalecido:</label> <label id="aspecto_profesional"><?php echo $filas['hora']; ?></label>
          </div>
          <div class="col-md-6 col-sm-6">
            <label>Maestro Responsable:</label> <label id="maestro_responsable"><?php echo $filas['hora']; ?></label> <br>
            <label>Razon de Propuesta:</label> <label id="razon_propuesta"><?php echo $filas['hora']; ?></label>
          </div>
        </div> <!-- Row #5 -->
      </div> <!-- Container -->
    </div> <!-- Entire Page -->
  <?php endforeach ?>
  </body>
</html>
