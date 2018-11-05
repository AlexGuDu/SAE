<?php
require '../config/connection.php';
session_start();

  $territorio= 'Nacional';
  $estado = 'BCN';
  $ciudad = 'Tijuana';
  $pais = 'Mexico';
  $tipo_evento=$_POST['tipo_evento'];
  $tipo_actividad=$_POST['tipo_actividad'];
  $fecha=$_POST['fecha'];
  $hora=$_POST['hora'];
  $lugar=$_POST['lugar_evento'];
  $tema=$_POST['nombreActividad'];
  $nombre_recibe=$_POST['nombreOrganiza'];
  $contacto_empresa = 'N/A';
  $objetivo=$_POST['objetivoEvento'];
  $materiaFortalecida=$_POST['materiaFortalecida'];
  $aspectoProfesional=$_POST['aspectoProfesional'];
  $proponeAsistir=$_POST['proponeAsistir'];
  $maestro=$_POST['maestroMateria'];
  $responsable=$_SESSION['matricula'];
  $matricula=$_SESSION['matricula'];
  $aprobacionCoordinador = 1;

  $sql = "INSERT INTO actividad(Territorio, Estado, Ciudad, Pais, fecha, hora, lugar, tema, Nombre_Recibe, Contacto_empresa, Objetivo, materia, Maestro, aspecto_pro, proponente, tipo_evento, tipo_actividad, responsable)
  values(:territorio, :estado, :ciudad, :pais,  :fecha, :hora, :lugar, :tema, :Nombre_Recibe, :contactoEmpresa, :Objetivo, :materia, :Maestro, :aspectoProfesional, :proponeAsistir, :tipo_evento, :tipo_actividad, :responsable)";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':territorio', $territorio);
  $stament->bindParam(':estado', $estado);
  $stament->bindParam(':ciudad', $ciudad);
  $stament->bindParam(':pais', $pais);
  $stament->bindParam(':fecha', $fecha);
  $stament->bindParam(':hora', $hora);
  $stament->bindParam(':lugar', $lugar);
  $stament->bindParam(':tema', $tema);
  $stament->bindParam(':Nombre_Recibe', $nombre_recibe);
  $stament->bindParam(':contactoEmpresa', $contacto_empresa);
  $stament->bindParam(':Objetivo', $objetivo);
  $stament->bindParam(':materia', $materiaFortalecida);
  $stament->bindParam(':Maestro', $maestro);
  $stament->bindParam(':aspectoProfesional', $aspectoProfesional);
  $stament->bindParam(':proponeAsistir', $proponeAsistir);
  $stament->bindParam(':tipo_evento', $tipo_evento);
  $stament->bindParam(':tipo_actividad', $tipo_actividad);
  $stament->bindParam(':responsable', $responsable);


  if(!$stament){
    echo "<script> alert('Error al cargar los datos'); </script>";
  }
  else{
    $stament->execute();
  }

  $cantidad=COUNT($_SESSION['matriculas']);
  $sql="SELECT * FROM actividad where Territorio='$territorio' and Estado='$estado' and Ciudad='$ciudad' and fecha='$fecha'
  and hora='$hora' and empresa='$empresa' and tema='$tema' and Nombre_Recibe='$nombre_recibe' and Contacto_empresa='$contacto_empresa' and Objetivo='$objetivo'
  and Maestro='$maestro' and tipo_evento='$tipo_evento' and tipo_actividad='$tipo_actividad' and responsable='$responsable'";
  $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($filas as $filas) :
    $folio= $filas['folio'];
  endforeach;



  if(isset($_SESSION['matriculas'])){
    for ($i=0; $i<$cantidad ; $i++) {
      if ($_SESSION['matriculas'][$i]!=0) {
      $sql = "INSERT INTO alumnoactividad(Matricula, Folio, aprobacionCoordinador) values( :matricula, :folio, :aprobacionCoordinador)";
      $stament = $dbh->prepare($sql);
      $stament->bindParam(':matricula', $_SESSION['matriculas'][$i]);
      $stament->bindParam(':folio', $folio);
        $stament->bindParam(':aprobacionCoordinador', $aprobacionCoordinador);
      $stament->execute();
      }
    }
  }
  $sql = "INSERT INTO alumnoactividad(Matricula, Folio, aprobacionCoordinador) values( :matricula, :folio, :aprobacionCoordinador)";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':matricula', $_SESSION['matricula']);
  $stament->bindParam(':folio', $folio);
  $stament->bindParam(':aprobacionCoordinador', $aprobacionCoordinador);
  $stament->execute();
  unset( $_SESSION['matriculas']);
  header('Location:../views/index.php');

 ?>
