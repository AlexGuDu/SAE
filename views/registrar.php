<!DOCTYPE html>

<?php
Session_start();
if(!isset($_SESSION['matricula'])){
  $_SESSION['error']=2;
	header('Location: ../index.php');
}
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registro de actividad</title>
    <!-- Bootstrap and CSS styles -->
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/iconic/css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <link href="../assets/progressbar/progress-wizard.min.css" rel="stylesheet">
    <link href="../styles/css/registrar.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body onload="materia_ComboBox(); folio_ComboBox(); limpiarMatriculas();">
    <!-- HEADER -->
    <div style="height:30px"></div>
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("shared/_header-sae.php #header-sae");
        </script>
    </div> <br>
    <!-- FIN HEADER -->

    <div id="form_titulo" class="container">
      <h1>Registro de Cumplimiento de Actividad</h1>
    </div>

    <form name="entireForm" action="../control/registroRegistrar.php" method="post" onsubmit="return validateSection_3();">
        <div style="height:55px">
          <ul class="progress-indicator stepped">
            <li class="completed" id="bubble1">
              <span class="bubble"> </span>
                <h5>1</h5>
            </li>
            <li class="" id="bubble2">
              <span class="bubble"> </span>
                <h5>2</h5>
            </li>
            <li class="" id="bubble3">
              <span class="bubble"> </span>
                <h5>3</h5>
            </li>
          </ul></div>
        <div id="entirePage">
            <!-- FIRST ROW CONTAINING DROPDOWNS, MATRICULA INPUT AND TABLE -->
            <div id="section_one">


            <div class="container">
                <div class="row">
                    <div  id="confirm_campus"class="col-4">
                        <label>LA ACTIVIDAD SE REALIZO DENTRO DEL CAMPUS?</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons" id="confirmacion_button_group">
                          <label class="btn btn-success btn-sm active" id="confirmacionSi">
                            <input  type="radio" name="confirmacion" value="Si" checked> SI
                          </label>
                          <label class="btn btn-success btn-sm" id="confirmacionNo">
                            <input  type="radio" name="confirmacion" value="No"> NO
                          </label>
                        </div>
                    </div>
                    <div class="col"> </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label>SELECCIONE LA SOLICITUD PENDIENTE POR REGISTAR: </label>

                            <select class="form-control" id='folioCB' name="folio">

                            <option selected hidden value="0"> SELECCIONE </option>
                            <option value="clear">Ninguna </opction>
                        </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-11 col-md-4">
                        <div class="form-group">
                            <label> SELECCIONE EL TIPO DE EVENTO DE INTERES: </label>
                            <select id="eventoSelector" class="custom-select" name="tipo_evento">
                            <option selected disabled hidden value="0"> SELECCIONE </option>
                            <option value="1"> Vinculacion </option>
                            <option value="2"> Cientifica </option>
                            <option value="3"> Deportiva </option>
                            <option value="4"> Responsabilidad Social </option>
                            <option value="5"> Cultural </option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>SELECCIONE TIPO DE ACTIVIDAD A REALIZAR: </label>
                            <select id="actividadSelector" class="custom-select" disabled="disabled" name="tipo_actividad">
                            <option selected disabled hidden value="0"> SELECCIONE </option>
                            <option hidden value="1"> Visitas Empresariales </option>
                            <option hidden value="2"> Viajes de Estudio </option>
                            <option hidden value="3"> Practicas Academicas </option>
                            <option hidden value="4"> Congresos </option>
                            <option hidden value="5"> Conferencias </option>
                            <option hidden value="6"> Talleres </option>
                            <option hidden value="7"> Platicas </option>
                            <option hidden value="8"> Maratones </option>
                            <option hidden value="9"> Diplomados </option>
                            <option hidden value="10"> Caminata </option>
                            <option hidden value="11"> Otro </option>
                        </select>
                        </div>

                        <div style="height:5px;"></div>
                        <hr style="height: 10px;">
                        <!-- STATE AND CITY DROPDOWNS -->
                        <div id="infoGeo">
                          <div class="form-group">
                              <label> ESTADO: </label>
                              <br>
                              <input type="text" class="form-control" id="estado_show" name="estado"></input>
                          </div>
                          <div class="form-group">
                              <label> CIUDAD: </label>
                              <br>
                              <input type="text" class="form-control" id="ciudad_show" name="ciudad"></input>
                          </div>
                          <div style="height:5px;"></div>
                          <hr style="height: 10px;">
                        </div>

                        <div class="form-group">
                            <label>FECHA INICIAL DEL EVENTO: </label>
                            <input type="date" class="form-control" name="fecha" id=fecha>
                        </div>
                        <div class="form-group">
                            <label>HORA INICIAL DEL EVENTO: </label> <br>
                            <input type="time" class="form-control" id="hora" name="hora">
                        </div>
                    </div>
                    <!-- End of left column -->

                    <div class="col"> </div>
                    <div class="col-11 col-md-7">
                        <div class="form-group">
                            <label>INGRESAR MATRICULA DE LOS INTEGRANTES QUE ASISTIRAN: <sup><span class="oi oi-question-mark" data-toggle="tooltip" data-placement="top" title="Tu matricula ya está ingresada"></span></sup></label>
                            <div class="input-group">
                                <input id="ingresar_matricula" type="text" class="form-control" placeholder="ej. 1218229" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="button" id="boton_ingresar_matricula">Ingresar</button>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="scrollable">
                            <table class="table table-bordered" id="mostrarMatriculas">
                                <thead>
                                    <tr>
                                        <td>Accion</td>
                                        <td>Matricula</td>
                                        <td>Nombre</td>
                                        <td>Carrera</td>
                                        <td>Grupo</td>
                                    </tr>
                                </thead>
                                <tbody id="matriculasTbody">

                                </tbody>

                            </table>

                        </div>

                    </div>
                    <!-- End of right column -->
                </div>
                <!-- End of row -->
            </div>
            <!-- End first row container -->

            <br>

            <!-- LUGAR DEL EVENTO -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>LUGAR DEL EVENTO</label>
                            <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" placeholder="ej. CECUT">
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="button" id="nextBtn_one" class="btn btn-success btn-lg">SIGUIENTE</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FIN LIGAR DEL EVENTO -->
            </div> <!-- section one -->

            <!-- DATOS DE LA ACTIVIDAD -->

            <div class="container" id="section_two">
              <div class="text-center"><button type="button" id="previousBtn_one" class="btn btn-success btn-lg">ANTERIOR</button></div> <br>
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7">
                        <div class="form-group">
                            <label for="nombreActividad">Nombre de la actividad:</label>
                            <input type="text" class="form-control" id="nombreActividad" name="nombreActividad">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8 col-md-7">
                        <div class="form-group">
                            <label for="nombreOrganiza">Nombre de quien organiza:</label>
                            <input type="text" class="form-control" id="nombreOrganiza" name="nombreOrganiza">
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="button" id="nextBtn_two" class="btn btn-success btn-lg">SIGUIENTE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN DATOS DE LA ACTIVIDAD -->


            <!-- JUSTIFICACION DEL EVENTO -->
            <div class="container" id="section_three">
              <div class="text-center"><button type="button" id="previousBtn_two" class="btn btn-success btn-lg">ANTERIOR</button></div> <br>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-8">
                        <div class="form-group">
                            <label for="objetivoEvento">Ingrese brevemente el objetivo de la asistencia a este evento:</label>
                            <input type="text" class="form-control" id="objetivoEvento" name="objetivoEvento">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-8 col-sm-8">
                      <div class="form-group">
                          <label for="materiaFortalecida">Seleccione la materia que se vera fortalecida por la realizacion de esta actividad:</label>
                          <select class="custom-select" id="materiaCB" name="materiaFortalecida">
                              <option selected disabled hidden value="0"> SELECCIONE </option>
                          </select>
                      </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-8">
                        <div class="form-group">
                            <label for="maestroMateria">Nombre del maestro responsable de la materia:</label>
                            <input type="text" class="form-control" id="maestroMateria" name="maestroMateria">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-8">
                        <div class="form-group">
                            <label for="aspectoProfesional">Aspecto profesional que se fortalecera por la realizacion de esta actividad: </label>
                            <select class="custom-select" id="aspectoProfesional" name="aspectoProfesional">
                              <option selected disabled hidden value="0"> SELECCIONE </option>
                              <option value="Tecnico">Tecnico</option>
                              <option value="Deportivo">Deportivo</option>
                              <option value="Social">Social</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-8">
                      <div class="form-group">
                          <label for="proponeAsistir">Quien propone asistir al evento: </label>
                          <select class="custom-select" id="proponeAsistir" name="proponeAsistir">
                            <option selected disabled hidden value="0"> SELECCIONE </option>
                            <option value="Coordinacion">Coordinacion</option>
                            <option value="Docente">Docente</option>
                            <option value="Subdireccion">Subdireccion</option>
                            <option value="Otros">Otros</option>
                          </select>
                      </div>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button id="registrarActividad" class="btn btn-primary btn-lg">REGISTRAR ACTIVIDAD</button>
                </div>
            </div>
            <!-- FIN JUSTIFICACION DEL EVENTO -->
        </div>
    </form>

    <div style="height:40px"></div>
    <div id="warningModal" class="modal">
        <div class="modal-content">
            <h2>Favor de llenar todos los campos.</h2>
            <input id="ok_modal"  class="btn btn-success btn-lg" type="button" name="ok_modal" value="Ok">
        </div>
    </div>
    <div id="warningModalMatricula" class="modal">
        <div class="modal-content">
          <h2 id="error1">No se ingreso ninguna matricula</h2>
          <h2 id="error2">La matricula que ingreso no existe</h2>
          <h2 id="error3">No puede ingresar su matricula en esta tabla</h2>
          <h2 id="error4">La matricula ya fue ingresada</h2>
          <h2 id="error5">El alumno asociado con esta matricula no esta dado de alta</h2>
          <input id="ok_modalMatricula"  class="btn btn-success btn-lg" type="button" name="ok_modal" value="Ok">
        </div>
    </div>

</body>
<!-- SCRIPTS -->
<script src="../assets/popper/popper.min.js"></script>
<script src="../assets/bootstrap/bootstrap.min.js"></script>
<script src="../js/registrar.js"></script>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>

</html>
