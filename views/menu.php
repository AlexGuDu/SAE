<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/menu.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>


<body onload="ConsultaDeActividades(); ConsultaDeCumplimiento();">
    <br>
    <!-- HEADER -->
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("shared/_header-sae.php #header-sae");
        </script>
    </div>
    <!-- FIN HEADER -->
    <br>
    <!-- Solicitud_Doc -->
    <div id="solicitudPopup" class="modal">
      <div id="entirePopup" class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-7">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Territorio:</label> <label id="territorio"></label> <br>
              <label class="preview_label">Pais:</label> <label id="pais"></label>
            </div>
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Estado:</label> <label id="estado"></label> <br>
              <label class="preview_label">Ciudad:</label> <label id="ciudad"></label>
            </div>
          </div> <!-- Row #1 -->
          <hr>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Tipo de Evento:</label> <label id="tipo_evento"></label> <br>
              <label class="preview_label">Fecha Inicial de Evento:</label> <label id="fecha_inicial"></label>
            </div>
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Tipo de Actividad:</label> <label id="tipo_actividad"></label> <br>
              <label class="preview_label">Hora Inicial de Evento:</label> <label id="hora_inicial"></label>
            </div>
          </div><!-- Row #2 -->


          <hr>

          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Nombre de la Empresa:</label> <label id="nombre_empresa"></label> <br>
              <label class="preview_label">Nombre de Representante de Empresa:</label> <label id="nombre_representante"></label>
            </div>

            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Tema de la Visita:</label> <label id="tema_visita"></label> <br>
              <label class="preview_label">Correo de Empresa:</label> <label id="datos_contacto"></label>
            </div>
          </div> <!-- Row #3 -->
          <hr>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <label class="preview_label">Objetivo de la Actividad:</label> <label id="objetivo_actividad"></label>
            </div>
          </div> <!-- Row #4 -->
          <hr>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Materia Fortalecida:</label> <label id="materia_fortalecida"></label> <br>
              <label class="preview_label">Aspecto Profesional Fortalecido:</label> <label id="aspecto_profesional"></label>
            </div>
            <div class="col-md-6 col-sm-6">
              <label class="preview_label">Maestro Responsable:</label> <label id="maestro_responsable"></label> <br>
              <label class="preview_label">Razon de Propuesta:</label> <label id="razon_propuesta"></label>
            </div>
          </div> <!-- Row #5 --> <br>
          <div class="row">
            <div class="col-md-4 col-sm-4"></div>
            <div class="col-md-4 col-sm-4">
              <input id="cerrarPreview" class="boton" type="button" name="cerrar" value="CERRAR">
            </div>
            <div class="col-md-4 col-sm-4"></div>
          </div> <!-- Row #6 -->
        </div> <!-- Container -->
      </div> <!-- Entire Page -->
    </div> <!-- Modal -->


    <!-- BOTONES ACTIVIDAD -->

  <div class="container smooth-jazz" style="text-align: center;">
    <h4 id="actividades_realizadas">Actividades realizadas (2/5)</h4>
    <div id="barra_wrapper" class="progress" style="height: 3rem; border-outline: 5px solid green; border-radius: 10px">
        <div id="barra_progreso" class="progress-bar progress-bar-striped progress-bar-animated text-lg bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
  </div>
  <br>


  <div id="entirePage" class="col-md-8 col-sm-8">
    <!-- BOTONES ACTIVIDAD -->
    <div id="entire_content">
    <div class="container">
      <button class="btn btn-default" type="button" name="button" id="popup_test" style="display: none;"></button>
        <div class="row justify-content-center">


            <div class="col-5 col-md-5 col-lg-3">
                <input id="solicitarPermiso" class="boton" type="button" name="registrar" value="SOLICITAR PERMISO">
            </div>
            <div class="col-1 col-md-1"></div>
            <div class="col-6 col-md-5 col-lg-3">
                <input id="registrarActividad" class="boton" type="button" name="registradas" value="REGISTRAR ACTIVIDAD">
            </div>
        </div>
    </div>


    <!-- TABLA ACTIVIDADES -->

    <div class="container"> <br>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 pane">
                <table class="table table-bordered table-hover" id="consultaSolicitudes">
                    <thead id="header-table">
                      <tr>
                        <th colspan="4">Solicitudes de Actividades</th>
                      </tr>
                        <tr class="header-table-columns">
                            <th>Actividades</th>
                            <th>Estatus</th>
                            <th>Consulta</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                      <!-- Cargar Folios - AJAX -->

                      <!-- Cargar Folios - AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 pane">
                <table class="table table-bordered table-hover" id="consultaRegistros">
                    <thead id="header-table">
                        <tr>
                          <th colspan="4">Registros de Cumplimiento de Actividades</th>
                        </tr>
                        <tr class="header-table-columns">
                            <th>Actividades</th>
                            <th>Estatus</th>
                            <th>Consulta</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody >
                      <!-- Cargar Folios - AJAX -->

                      <!-- Cargar Folios - AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <br>


        <div class="row justify-content-center">
          <h4>Cumplimiento de Actividades por Categoria</h4>
        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="card" id="card_cientifica">
              <div class="card-body" >
                Cientifica<label id="count_cientifica" class="countlabel float-right"></label>
              </div>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-3">
            <div class="card" id="card_cultural">
              <div class="card-body" >
                Cultural<label id="count_cultural" class="countlabel float-right"></label>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="card" id="card_vinculacion">
              <div class="card-body" >
                Vinculacion<label id="count_vinculacion" class="countlabel float-right"></label>
              </div>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-3">
            <div class="card" id="card_deportiva">
              <div class="card-body">
                Deportiva<label id="count_deportiva" class="countlabel float-right"></label>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="card" id="card_responsabilidad_social">
              <div class="card-body">
                Responsabilidad Social <label id="count_responsabilidad_social" class="countlabel float-right"></label>
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="row justify-content-center">
          <div class="col-md-2 col-sm-2">
            <form class="" action="../control/logout.php">
            <input type="submit" name="" class="boton" value="Salir">
            </form>
          </div>
        </div>
      </div> <!-- Whole container -->
    </div> <!-- Entire content -->
    </div>
    <div style="height:60px"></div>


    <!-- FIN TABLA ACTIVIDADES -->
    <script src="../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../js/menu.js"></script>
</body>

</html>
