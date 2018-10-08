<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/menu.css">
    <link href="../styles/css/solicitud_doc.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>


<body  onload="ConsultaDeRegistros()">
    <br>
    <!-- HEADER -->
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("shared/_header-sae.php #header-sae");
        </script>
    </div>
    <!-- FIN HEADER -->
    <br>


    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
        <div class="row justify-content-center">
    <!-- Solicitud_Doc -->
    <div id="solicitudPopup" class="modal" >
      <div id="entirePage">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label>Territorio:</label> <label id="territorio"></label> <br>
              <label>Pais:</label> <label id="pais"></label>
            </div>
            <div class="col-md-6 col-sm-6">
              <label>Estado:</label> <label id="estado"></label> <br>
              <label>Ciudad:</label> <label id="ciudad"></label>
            </div>
          </div> <!-- Row #1 -->
          <hr>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label>Tipo de Evento:</label> <label id="tipo_evento"></label> <br>
              <label>Fecha Inicial de Evento:</label> <label id="fecha_inicial"></label>
            </div>
            <div class="col-md-6 col-sm-6">
              <label>Tipo de Actividad:</label> <label id="tipo_actividad"></label> <br>
              <label>Hora Inicial de Evento:</label> <label id="hora_inicial"></label>
            </div>
          </div><!-- Row #2 -->


          <hr>

          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label>Nombre de la Empresa:</label> <label id="nombre_empresa"></label> <br>
              <label>Nombre de Representante de Empresa:</label> <label id="nombre_representante"></label>
            </div>

            <div class="col-md-6 col-sm-6">
              <label>Tema de la Visita:</label> <label id="tema_visita"></label> <br>
              <label>Datos de Contacto de Empresa:</label> <label id="datos_contacto"></label>
            </div>
          </div> <!-- Row #3 -->
          <hr>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <label>Objetivo de la Actividad:</label> <label id="objetivo_actividad"></label>
            </div>
          </div> <!-- Row #4 -->
          <hr>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label>Materia Fortalecida:</label> <label id="materia_fortalecida"></label> <br>
              <label>Aspecto Profesiona Fortalecido:</label> <label id="aspecto_profesional"></label>
            </div>
            <div class="col-md-6 col-sm-6">
              <label>Maestro Responsable:</label> <label id="maestro_responsable"></label> <br>
              <label>Razon de Propuesta:</label> <label id="razon_propuesta"></label>
            </div>
          </div> <!-- Row #5 -->
        </div> <!-- Container -->
      </div> <!-- Entire Page -->
    </div>

    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
      <button class="btn btn-default" type="button" name="button" id="popup_test" style="display: none;"></button>
        <div class="row justify-content-center">


            <div class="col-5 col-md-5 col-lg-3">
                <input id="solicitarPermiso" class="boton" type="button" name="registar" value="SOLICITAR PERMISO">
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
            <div class="col-12 col-lg-7 ">

                <table class="table table-bordered table-hover" id="consulta">
                    <thead id="header-table">
                        <tr>
                            <th>Actividades solicitadas</th>
                            <th>Estatus</th>
                            <th>Vista Preliminar</th>
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
            <div class="col-12 col-lg-7 s">
                <table class="table table-bordered table table-hover">
                    <thead id="header-table">
                        <tr>
                            <th>Actividades registradas</th>
                            <th>Estatus</th>
                            <th>Vista Preliminar</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tecnologias renovables</td>
                            <td>Rechazada</td>
                            <td><a href="">Archivo.pdf</a></td>
                            <td>2018/02/02</td>
                        </tr>
                        <tr>
                            <td>Tecnologias renovables</td>
                            <td>Rechazada</td>
                            <td><a href="">Archivo.pdf</a></td>
                            <td>2018/02/02</td>
                        </tr>
                        <tr>
                            <td>Tecnologias renovables</td>
                            <td>Rechazada</td>
                            <td><a href="">Archivo.pdf</a></td>
                            <td>2018/02/02</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        </div>
        <div class="row justify-content-center">

        <form class="" action="../control/logout.php">
        <input type="submit" name="" class="boton" value="Salir">
        </form>

        </div>
    </div>
    <!-- FIN TABLA ACTIVIDADES -->
    <script src="../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../js/menu.js"></script>
</body>

</html>
