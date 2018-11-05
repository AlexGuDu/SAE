<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Alumnos</title>
    <link href="../../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/iconic/css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/css/menu.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style media="screen">
    tbody, thead tr { display: block; }
     tbody {
        height: 400px;
        overflow-y: auto;
        overflow-x: hidden;
    }
     tbody td, thead th {
        width: 130px;
    }

     thead th:last-child {
        width: 170px; /* 140px + 16px scrollbar width */
    }
    </style>
  </head>



  <body onload="consultaDeAlumnos()">
    <br>
    <!-- HEADER -->
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("_header-sae2.php #header-sae");
        </script>
    </div>
    <!-- FIN HEADER -->

    <div class="row justify-content-center">
      <div class="col-md-1 col-sm-1">
        <input type="button" name="" class="boton-regresar admbtn" id="regresar" style="padding: 1rem;">
      </div>
      <div class="col-md-3 col-sm-3">
        <input type="button" name="" class="boton admbtn" value="Registrar" id="registrar">
      </div>
    </div>

    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
        <div class="row justify-content-center">

      </div> <!-- Entire Page -->
    </div>

      <br>
    <!-- TABLA ACTIVIDADES -->
    <div id="entirePage" class="col-md-8 col-sm-10">
    <div class="container" >
      <div class="form-group">

        <div class="row justify-content-center align-items-center">
        <label> <h2><b> Alumnos </b></h2>  </label>
      </div>
        <div class="row justify-content-center align-items-center">
        <input type="text" class="form-control" style="width:20%" id="search" placeholder="Buscar...">
        </div>
      </div>


        <div class="row justify-content-center">
            <div >
                <table class="table table-bordered table-hover scroll" id='consultaAlum' >

                  <thead id="header-table">
                      <tr>
                          <th>Acciones<sup><span class="oi oi-question-mark" data-toggle="tooltip" data-placement="top" title="Modificar datos de alumno"></th>
                          <th>Matricula</th>
                          <th>Nombre</th>
                          <th>Grupo</th>
                          <th>Carrera</th>
                          <th>Etapa</th>

                      </tr>
                  </thead>
                  <tbody>
                    <!-- Cargar Folios - AJAX -->

                    <!-- Cargar Folios - AJAX -->

                  </tbody>
              </table>
            </div>
        </div>

        <div style="height:60px"></div>
        <!-- FIN TABLA ACTIVIDADES -->
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../assets/bootstrap/bootstrap.min.js"></script>
        <script src="../js/menu_Alumnos.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
          $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });
        </script>

  </body>
</html>
