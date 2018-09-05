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

<body>
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
    <div id="solicitudPopup" class="modal" >
          <script type="text/javascript">
              $("#solicitudPopup").load("shared/_solicitud_doc.php");
          </script>
    </div>

    <!-- BOTONES ACTIVIDAD -->
    <div class="container">
      <button class="btn btn-default" type="button" name="button" id="popup_test">Solicitud Popup</button>
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

    <br>
    <!-- TABLA ACTIVIDADES -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 scrollable">
                <table class="table table-bordered table-hover">
                    <thead id="header-table">
                        <tr>
                            <th>Actividades solicitadas</th>
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
        <br><br>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 scrollable">
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
