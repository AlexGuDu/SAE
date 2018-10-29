<?php
require '../config/connection.php';
session_start();
  $territorio=$_POST['territorio'];
  if ($territorio=="Nacional") {
    $estado=$_POST['estado'];
    $ciudad=$_POST['ciudad'];
    $pais="Mexico";
  }
  else {
    $estado=$_POST['estado_extranjera'];
    $ciudad=$_POST['ciudad_extranjera'];
    $pais=$_POST['pais'];
  }
  $tipo_evento=$_POST['tipo_evento'];
  $tipo_actividad=$_POST['tipo_actividad'];
  $fecha=$_POST['fecha'];
  $hora=$_POST['hora'];
  $lugar=$_POST['lugar_evento'];
  $empresa=$_POST['nombreEmpresa'];
  $tema=$_POST['temaVisita'];
  $nombre_recibe=$_POST['recibeEmpresa'];
  $contacto_empresa=$_POST['contactoEmpresa'];
  $objetivo=$_POST['objetivoEvento'];
  $maestro=$_POST['maestroMateria'];
  $responsable=$_SESSION['matricula'];
  $solicitudPrev=1;
  $estatusSolicitud=1;
  $aprobacion="0";


  $sql = "INSERT INTO solicitud( Territorio, Estado, Ciudad, Pais, fecha, hora, lugar, empresa, tema, Nombre_Recibe, Contacto_empresa, Objetivo, Maestro, tipo_evento, tipo_actividad, responsable, solicitadoPrev, estatusSolicitud)
  values(:territorio, :estado,:Ciudad, :Pais, :fecha, :hora, :lugar, :empresa, :tema, :Nombre_Recibe, :Contacto_empresa, :Objetivo, :Maestro, :tipo_evento, :tipo_actividad, :responsable, :solicitadoPrev, :estatusSolicitud )";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':territorio', $territorio);
  $stament->bindParam(':estado', $estado);
  $stament->bindParam(':Ciudad', $ciudad);
  $stament->bindParam(':Pais', $pais);
  $stament->bindParam(':fecha', $fecha);
  $stament->bindParam(':hora', $hora);
  $stament->bindParam(':lugar', $lugar);
  $stament->bindParam(':empresa', $empresa);
  $stament->bindParam(':tema', $tema);
  $stament->bindParam(':Nombre_Recibe', $nombre_recibe);
  $stament->bindParam(':Contacto_empresa', $contacto_empresa);
  $stament->bindParam(':Objetivo', $objetivo);
  $stament->bindParam(':Maestro', $maestro);
  $stament->bindParam(':tipo_evento', $tipo_evento);
  $stament->bindParam(':tipo_actividad', $tipo_actividad);
  $stament->bindParam(':responsable', $responsable);
  $stament->bindParam(':solicitadoPrev', $solicitudPrev);
  $stament->bindParam(':estatusSolicitud', $estatusSolicitud);

  if(!$stament){
    echo "<script> alert('Error al cargar los datos'); </script>";
  }
  else{
    $stament->execute();
  }

  $cantidad=COUNT($_SESSION['matriculas']);
  $sql="SELECT * FROM solicitud where Territorio='$territorio' and Estado='$estado' and Ciudad='$ciudad' and fecha='$fecha'
  and hora='$hora' and empresadd='$empresa' and tema='$tema' and Nombre_Recibe='$nombre_recibe' and Contacto_empresa='$contacto_empresa' and Objetivo='$objetivo'
  and Maestro='$maestro' and tipo_evento='$tipo_evento' and tipo_actividad='$tipo_actividad' and responsable='$responsable'";
  $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($filas as $filas) :
    $folio= $filas['folio'];
  endforeach;


  if(isset($_SESSION['matriculas'])){
    for ($i=0; $i<$cantidad ; $i++) {
      if ($_SESSION['matriculas'][$i]!=0) {
      $sql = "INSERT INTO alumnosolicitud(Matricula, Folio, aprobacionRegistro) values( :matricula, :folio, :aprobacion)";
      $stament = $dbh->prepare($sql);
      $stament->bindParam(':matricula', $_SESSION['matriculas'][$i]);
      $stament->bindParam(':folio', $folio);
      $stament->bindParam(':aprobacion', $aprobacion);
      $stament->execute();
      }
    }

  }
  $sql = "INSERT INTO alumnosolicitud(Matricula, Folio, aprobacionRegistro) values( :matricula, :folio, :aprobacion)";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':matricula', $_SESSION['matricula']);
  $stament->bindParam(':folio', $folio);
  $stament->bindParam(':aprobacion', $aprobacion);
  $stament->execute();
  unset( $_SESSION['matriculas']);
  header('Location:../views/home.php');
 ?>
