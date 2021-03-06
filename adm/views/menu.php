<html lang="en">

<?php
Session_start();
if(!isset($_SESSION['numEmpAdministrador'])){
  $_SESSION['error']=2;
	header('Location: ../index.php');
}
?>

<head>
    <meta charset="UTF-8">
    <title>Menu Administrador</title>
    <link href="../../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/iconic/css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/css/menu.css">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>



<body  onload="consultaDeSolicitud(); consultaDeRegistro()">
    <br>
    <!-- HEADER -->
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("_header-sae2.php #header-sae");
        </script>
    </div>
    <!-- FIN HEADER -->
    <br>

    <div id="comentarioAceptarS" class="modal">
      <div id="entirePopup" class="col-md-4 col-lg-4">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <input type="button" name="" class="boton-regresar" id="exit_sol_aceptar" style="padding: 20px;">
            </div>
            <div class="col-md-10">
              <h1>Aceptar solicitud</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="preview_label">Comentario</label><br>
              <textarea id="com_sol_aceptar" name="comentario" rows="8" cols="80"></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <input type="button" id="sol_aceptar" name="boton"  class="botonsm boton-add float-right" value=" " >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="comentarioDenegarS" class="modal">
      <div id="entirePopup" class="col-md-4 col-lg-4">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
                <input type="button" name="" class="boton-regresar" id="exit_sol_denegar" style="padding: 20px">
            </div>
            <div class="col-md-10">
              <h1>Rechazar solicitud</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="preview_label">Comentario</label><br>
              <textarea id="com_sol_denegar" name="comentario" rows="8" cols="80"></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <input type="button" id="sol_denegar" name="boton" class="botonsm boton-del float-right" value=" " >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="comentarioAceptarR" class="modal">
      <div id="entirePopup" class="col-md-4 col-lg-4">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <input type="button" name="" class="boton-regresar" id="exit_reg_aceptar" style="padding: 20px;">
            </div>
            <div class="col-md-10">
              <h1>Aceptar registro</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="preview_label">Comentario</label><br>
              <textarea id="com_reg_aceptar" name="comentario" rows="8" cols="80"></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <input type="button" id="reg_aceptar" name="boton" class="botonsm boton-add float-right" value=" " >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="comentarioDenegarR" class="modal">
      <div id="entirePopup" class="col-md-4 col-lg-4">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <input type="button" name="" class="boton-regresar" id="exit_reg_denegar" style="padding: 20px;">
            </div>
            <div class="col-md-10">
              <h1>Rechazar registro</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="preview_label">Comentario</label><br>
              <textarea id="com_reg_denegar" name="comentario" rows="8" cols="80"></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <input type="button" id="reg_denegar" name="boton" class="botonsm boton-del float-right" value=" " >
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Solicitud_Doc -->
    <div id="solicitudPopup" class="modal">
        <div id="entirePopup" class="container col-xl-8" id="container-popup">
          <div class="row" id="stripe_1">
            <div class="col-xl-12 col-sm-12">
              <div class="stripe">
                <div class="stripe__segment" style="border-radius: 10rem 0 0 2rem;"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment" style="border-radius: 0 10rem 2rem 0;"></div>
              </div>
            </div>
          </div> <!-- Row #0 --> <br>
          <div class="row">
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Territorio:</label> <label id="territorio"></label> <br>
              <label class="preview_label">Pais:</label> <label id="pais"></label>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Estado:</label> <label id="estado"></label> <br>
              <label class="preview_label">Ciudad:</label> <label id="ciudad"></label>
            </div>
          </div> <!-- Row #1 -->
          <hr>
          <div class="row">
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Tipo de Evento:</label> <label id="tipo_evento"></label> <br>
              <label class="preview_label">Fecha Inicial de Evento:</label> <label id="fecha_inicial"></label>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Tipo de Actividad:</label> <label id="tipo_actividad"></label> <br>
              <label class="preview_label">Hora Inicial de Evento:</label> <label id="hora_inicial"></label>
            </div>
          </div><!-- Row #2 -->
          <hr>
          <div class="row">
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Nombre de la Empresa:</label> <label id="nombre_empresa"></label> <br>
              <label class="preview_label">Nombre de Representante de Empresa:</label> <label id="nombre_representante"></label>
            </div>

            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Tema de la Visita:</label> <label id="tema_visita"></label> <br>
              <label class="preview_label">Correo de Empresa:</label> <label id="datos_contacto"></label>
            </div>
          </div> <!-- Row #3 -->
          <hr>
          <div class="row">
            <div class="col-xl-12 col-sm-12">
              <label class="preview_label">Objetivo de la Actividad:</label> <label id="objetivo_actividad"></label>
            </div>
          </div> <!-- Row #4 -->
          <hr>
          <div class="row">
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Materia Fortalecida:</label> <label id="materia_fortalecida"></label> <br>
              <label class="preview_label">Aspecto Profesional Fortalecido:</label> <label id="aspecto_profesional"></label>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label class="preview_label">Maestro Responsable:</label> <label id="maestro_responsable"></label> <br>
              <label class="preview_label">Razon de Propuesta:</label> <label id="razon_propuesta"></label>
            </div>
          </div> <!-- Row #5 -->
          <hr>
          <div class="row">
            <div class="col-xl-12 col-sm-12">
              <label class="preview_label">Comentario por Administracion:</label> <label id="comentario"></label>
            </div>
          </div> <!-- Row #6 -->
          <br>
          <div class="row">
            <div class="col-xl-4 col-sm-4"></div>
            <div class="col-xl-4 col-sm-4">
              <button id="cerrarPreview" class="boton fas fa-eye-slash" type="button" name="cerrar"></button>
            </div>
            <div class="col-xl-4 col-sm-4"></div>
          </div> <!-- Row #7 -->
          <br>
          <div class="row">
            <div class="col-xl-12 col-sm-12">
              <div class="stripe">
                <div class="stripe__segment" style="border-radius: 2rem 0 0 10rem;"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment" style="border-radius: 0 2rem 10rem 0;"></div>
              </div>
            </div>
          </div> <!-- Row #8 -->
        </div> <!-- Container -->
    </div> <!-- Modal -->

    <div id="previewImgEvidencePopup" class="modal">
        <div id="entirePopup" class="container col-xl-4" id="container-popup">
          <div class="row" id="stripe_1">
            <div class="col-xl-12 col-sm-12">
              <div class="stripe">
                <div class="stripe__segment" style="border-radius: 10rem 0 0 2rem;"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment" style="border-radius: 0 10rem 2rem 0;"></div>
              </div>
            </div>
          </div>
         <br>
          <div class="row">
            <div class="col-xl-2 col-sm-2"> </div>
              <div class="col-xl-8 col-sm-8">
                  <img id="previewImgEvidence" width="400" height="400">
              </div>
            <div class="col-xl-2 col-sm-2"> </div>
          </div> 
          <br>
          <div class="row">
            <div class="col-xl-12 col-sm-12">
              <div class="stripe">
                <div class="stripe__segment" style="border-radius: 2rem 0 0 10rem;"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment"></div>
                <div class="stripe__segment" style="border-radius: 0 2rem 10rem 0;"></div>
              </div>
            </div>
          </div>

        </div> <!-- Container -->
    </div> <!-- Modal -->

    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-3">
        <input type="button" name="" class="boton admbtn" value="Consultar actividades registradas" id="actividadRegistradas">
      </div>
      <div class="col-md-2 col-sm-2">
        <input type="button" name="" class="boton admbtn" value="Alumnos" id="alumnos">
      </div>
      <div class="col-md-2 col-sm-2">
        <input type="button" name="" class="boton admbtn" value="Actualizar alumnos" id="actualizar_alumnos">
      </div>
      </div>
    </div>

    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
        <div class="row justify-content-center">

      </div> <!-- Entire Page -->
    </div>

    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
      <button class="btn btn-default" type="button" name="button" id="popup_test" style="display: none;"></button>
        <div class="row justify-content-center">
        </div>
    </div>

    <br>
    <!-- TABLA ACTIVIDADES -->
    <div id="entirePage" class="col-md-8 col-sm-10">
    <div class="container" >
      <div class="form-group">
          <label> <b> Solicitudes para desarrollar actividades por atender </b> </label>
      </div>
        <div class="row justify-content-center">
            <div class="col-25 col-lg-20 ">
                <table class="table table-bordered table-hover" id='consultaSolicitud' >
                  <thead id="header-table">
                      <tr style="text-align:center;">
                          <th>Acciones <sup><span class="oi oi-question-mark" data-toggle="tooltip" data-placement="top" title="Aceptar o Rechazar solicitud"></span></sup></th>
                          <th>Matricula</th>
                          <th>Actividad</th>
                          <th>Vista Preliminar</th>
                          <th>Fecha de emision</th>
                      </tr>
                  </thead>
                  <tbody>
                    <!-- Cargar Folios - AJAX -->

                    <!-- Cargar Folios - AJAX -->

                  </tbody>
              </table>
            </div>
        </div>
        <br> <br>

        <div class="form-group">
            <label><strong> Solicitudes para registro de actividad por atender </strong></label>
        </div>
        <div class="row justify-content-center">
            <div class="col-25 col-lg-20 ">
                <table class="table table-bordered table-hover" id='consultaRegistro' >
                  <thead id="header-table">
                      <tr style="text-align:center;">
                          <th>Acciones <sup><span class="oi oi-question-mark" data-toggle="tooltip" data-placement="top" title="Aceptar o Rechazar solicitud"></th>
                          <th>Matricula</th>
                          <th>Actividad</th>
                          <th>Vista Preliminar</th>
                          <th>Fecha de emision</th>
                      </tr>
                  </thead>
                  <tbody>
                    <!-- Cargar Folios - AJAX -->

                    <!-- Cargar Folios - AJAX -->

                  </tbody>
              </table>
            </div>
        </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-2 col-sm-2">
            <form class="" action="../control/logoutAdmin.php">
            <input type="submit" name="" class="boton" value="Salir">
            </form>
          </div>
        </div>
    </div>
  </div>
    <div style="height:60px"></div>
    <!-- FIN TABLA ACTIVIDADES -->
    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../js/menu.js"></script>
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
    </script>
</body>

</html>
