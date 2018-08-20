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


  $sql = "INSERT INTO solicitud( Territorio, Estado, Ciudad, Pais, fecha, hora, lugar, empresa, tema, Nombre_Recibe, Contacto_empresa, Objetivo, Maestro, tipo_evento, tipo_actividad, responsable)
  values(:territorio, :estado,:Ciudad, :Pais, :fecha, :hora, :lugar, :empresa, :tema, :Nombre_Recibe, :Contacto_empresa, :Objetivo, :Maestro, :tipo_evento, :tipo_actividad, :responsable )";
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
  if(!$stament){
    echo "<script> alert('Error al cargar los datos'); </script>";
  }
  else{
    $stament->execute();
  }
  $aprovacion="0";
  $cantidad=COUNT($_SESSION['matriculas']);


  $sql="SELECT * FROM solicitud where Territorio='$territorio' and Estado='$estado' and Ciudad='$ciudad' and fecha='$fecha'
  and hora='$hora' and empresa='$empresa' and tema='$tema' and Nombre_Recibe='$nombre_recibe' and Contacto_empresa='$contacto_empresa' and Objetivo='$objetivo'
  and Maestro='$maestro' and tipo_evento='$tipo_evento' and tipo_actividad='$tipo_actividad' and responsable='$responsable'";
  $filas = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($filas as $filas) :
    $folio= $filas['Folio'];
  endforeach;


  echo $folio;
  echo "<br>";
  echo $cantidad;
  echo "<br>";
  echo $_SESSION['matriculas'][0];
  echo "<br>";
  echo $_SESSION['matriculas'][1];
  for ($i=0; $i<$cantidad ; $i++) {
  $sql = "INSERT INTO alumnosolicitud(Matricula, Folio, Aprobacion) values( :matricula, :folio, :aprobacion)";
  $stament = $dbh->prepare($sql);
  $stament->bindParam(':matricula', $_SESSION['matriculas'][$i]);
  $stament->bindParam(':folio', $folio);
  $stament->bindParam(':aprobacion', $aprovacion);
  $stament->execute();
  echo "<script>
  alert('Solicitud Registrada');
  </script>";
  header('Location:home.php');
  }
  unset( $_SESSION['matriculas']);
 ?>
