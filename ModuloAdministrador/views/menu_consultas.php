<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="../../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/css/menu.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style media="screen">

    </style>
</head>


<body onload="ConsultaDeAlumnos(); makeAllSortable();">
    <br>
    <!-- HEADER -->
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("_header-sae2.php #header-sae");
        </script>
    </div>
    <!-- FIN HEADER -->
    <br>


    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
        <div class="row justify-content-center">

      </div> <!-- Entire Page -->
    </div>
    <!-- BOTONES ACTIVIDAD -->
    <!-- <div class="row justify-content-center">
      <div class="col-md-2 col-sm-2">
        <input type="button" name="" class="boton" value="regresar" id="regresar">
      </div>
    </div> -->

    <br>
    <!-- TABLA ACTIVIDADES -->
    <div class="container actnbar">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-1 col-sm-1" >
          <input type="button" name="" class="boton-regresar" id="regresar" style="padding: 1rem;">
        </div>
          <label> VISTA GENERAL </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label> PERIODO </label>  &nbsp;&nbsp;
          <select class="form-control-sm" name="semestre">
            <option selected value="0"> 2018-2 </option>
          </select >  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label> Tipo de evento </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" class="form-control" style="width:20%" id="search" placeholder="Buscar...">


      </div>
    </div>



    </div>
        <br>
        <div class="row justify-content-center">
            <div id="entirePage" style="padding:2rem;">
               <div >
                  <table class="table table-bordere scroll" id="Alumnos" >
                    <thead id="header-table"  style=" ">
                        <tr>
                            <th >#</th>
                            <th >CARRERA</th>
                            <th >MATRICULA</th>
                            <th >ACTIVIDADES</th>
                            <th >VINCULACION</th>
                            <th >CIENTIFICA</th>
                            <th >DEPORTIVA</th>
                            <th >SOCIAL</th>
                            <th >CULTURAL</th>
                        </tr>
                    </thead>
                    <tbody style=" ">
                      <!-- Cargar Folios - AJAX -->

                      <!-- Cargar Folios - AJAX -->
                    </tbody>
                </table>
              </div>
            </div> <!-- entire page id -->
        </div>
        <br>
    </div>
    <div class="container">
    <div class="row justify-content-center align-items-center">
    <div class="col-md-2 col-sm-2" >
      <input style="height: 2.5rem;" type="button" name="" class="boton admbtn" value="Generar Reporte" onclick="generarReporte()" id="reporte">
    </div>
  </div>
</div>
    <!-- FIN TABLA ACTIVIDADES -->
    <script src="../../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../js/menu_consulta.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>

</html>
