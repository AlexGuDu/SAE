<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>:: Importar de Excel a la Base de Datos ::</title>
</head>
<body>
    Selecciona el archivo a importar:
    <form name="importa" method="post" action="<?php echo $_SERVER['PHP_SELF'] ; ?>" enctype="multipart/form-data" >
        <input type="file" name="excel" />
        <input type='submit' name='enviar'  value="Importar"  />
        <input type="hidden" value="upload" name="action" />
    </form>
    <!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->
    <?php
    $action=" ";
    extract($_POST);
    if ($action == "upload") {
        $archivo = $_FILES['excel']['name'];
        $tipo = $_FILES['excel']['type'];
        $destino = "bak_" . $archivo;
        if (copy($_FILES['excel']['tmp_name'], $destino)){
            echo "Archivo Cargado Con Éxito";
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
            $conexion = mysqli_connect("localhost", "root", '', 'sae');
            $cn = mysqli_connect("localhost", "root", '') or die("ERROR EN LA CONEXION");
            $db = mysqli_select_db($cn,'sae') or die("ERROR AL CONECTAR A LA BD");
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
        $result = mysqli_query($conexion,$sql) or die (mysqli_error($db));
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
            $result = mysqli_query($conexion,$sql) or die (mysqli_error($db));
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }

        }
        echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
        unlink($destino);
    }
    ?>
</body>
</html>
