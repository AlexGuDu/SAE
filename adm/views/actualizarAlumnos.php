<?php
require '../../config/connection.php';
session_start();

if(!isset($_SESSION['numEmpAdministrador'])){
    $_SESSION['error']=2;
      header('Location: ../index.php');
  }
 ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Actualizar alumnos</title>
    <link href="../../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/iconic/css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../../styles/css/menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
</head>

<body>

    <br>
    <!-- HEADER -->
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("_header-sae2.php #header-sae");
        </script>
    </div>
    <!-- FIN HEADER -->
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-md-6 col-lg-6">
            Selecciona el archivo a importar:
            <form name="importa" method="post" action="<?php echo $_SERVER['PHP_SELF'] ; ?>" enctype="multipart/form-data" >
                <input type="file" name="excel" />
                <input type='submit' name='enviar'  value="Importar"  />
                <input type="hidden" value="upload" name="action" />
            </form>
            </div>
            <div class="col-md-3 col-lg-3"></div>
        </div>
    </div>
    
    <!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->
    <?php
    $action=" ";
    extract($_POST);
    if ($action == "upload") {
        $archivo = $_FILES['excel']['name'];
        $tipo = $_FILES['excel']['type'];
        $destino = "bak_" . $archivo;
        if (copy($_FILES['excel']['tmp_name'], $destino)){
        }
        else{
            echo "Error Al Cargar el Archivo";
        }
        if (file_exists("bak_" . $archivo)) {
            /** Clases necesarias */
            require_once('Classes/PHPExcel.php');
            require_once('Classes/PHPExcel/Reader/Excel2007.php');
            // Cargando la hoja de cálculo
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load("bak_" . $archivo);
            $objFecha = new PHPExcel_Shared_Date();
            // Asignar hoja de excel activa
            $objPHPExcel->setActiveSheetIndex(0);
            //conectamos con la base de datos
            $conexion = mysqli_connect($cleardb_server,$cleardb_username,$cleardb_password, $cleardb_db);
            // Llenamos el arreglo con los datos  del archivo xlsx
            for ($i = 1; $i <= $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); $i++) {
                $_DATOS_EXCEL[$i]['Matricula'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i )->getCalculatedValue();
                $_DATOS_EXCEL[$i]['ApePa'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i )->getCalculatedValue();
                $_DATOS_EXCEL[$i]['ApeMa'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i )->getCalculatedValue();
                $_DATOS_EXCEL[$i]['Nombre'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i )->getCalculatedValue();
                $_DATOS_EXCEL[$i]['Carrera'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i )->getCalculatedValue();
                $_DATOS_EXCEL[$i]['Etapa'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i )->getCalculatedValue();
            }
        }
        //si por algo no cargo el archivo bak_
        else {
            echo "Necesitas primero importar el archivo";
        }
        $errores = 0;
        //recorremos el arreglo multidimensional
        //para ir recuperando los datos obtenidos
        //del excel e ir insertandolos en la BD
        $sql = "DELETE from alumno";
        $result = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
        $i= 1;
        foreach ($_DATOS_EXCEL as $campo => $valor) {
            $matricula= $_DATOS_EXCEL[$i]['Matricula'];
            $Apepa= $_DATOS_EXCEL[$i]['ApePa'];
            $ApeMA= $_DATOS_EXCEL[$i]['ApeMa'];
            $Nombre= $_DATOS_EXCEL[$i]['Nombre'];
            $Carrera= $_DATOS_EXCEL[$i]['Carrera'];
            $Etapa= $_DATOS_EXCEL[$i]['Etapa'];
            $i=$i+1;
            $sql = "INSERT INTO alumno(Matricula, ApePa, ApeMa, Nombre, Carrera, Etapa) VALUES ('$matricula','$Apepa','$ApeMA','$Nombre','$Carrera','$Etapa')";
            $result = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));

            $sql="SELECT count(*) FROM alumnoregactividad where matricula=:matricula";
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':matricula', $matricula);
            $statement->execute();
            $count = $statement;
            if($count->fetchColumn() == 0)
            {
              $sql = "INSERT INTO alumnoregactividad(matricula) VALUES ('$matricula')";
              $result = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
            }

            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }

        }
        echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
        unlink($destino);
    }
    ?>
     <script src="../../assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>
