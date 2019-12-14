<?php
require '../../config/connection.php';
$totalAlumnos_LAE = 0;
$totalAlumnos_LI = 0;
$totalAlumnos_LNI = 0;
$totalAlumnos_LC = 0;
$totalAlumnos_LAE_CACECA = 0;
$totalAlumnos_LI_CACECA = 0;
$totalAlumnos_LNI_CACECA = 0;
$totalAlumnos_LC_CACECA = 0;

//Alumnos Admin Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b  where Carrera='ADMINISTRACION DE EMPRESAS' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($stament as $filas):
  $totalActividades=$filas['ActVinculacion']+$filas['ActCientifica']+$filas['ActDeportiva']+$filas['ActResponsabilidadSocial']+$filas['ActCultural'];
  if ($totalActividades != 0) {
    $totalAlumnos_LAE_CACECA = $totalAlumnos_LAE_CACECA + 1;
  }
  $totalAlumnos_LAE = $totalAlumnos_LAE + 1;
endforeach;

$porcentajes['porcentaje_LAE']= ($totalAlumnos_LAE_CACECA*100) / $totalAlumnos_LAE;
//Alumnos Admin Final

//Alumnos INFO Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b  where Carrera='INFORMATICA' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($stament as $filas):
  $totalActividades=$filas['ActVinculacion']+$filas['ActCientifica']+$filas['ActDeportiva']+$filas['ActResponsabilidadSocial']+$filas['ActCultural'];
  if ($totalActividades != 0) {
    $totalAlumnos_LI_CACECA = $totalAlumnos_LI_CACECA + 1;
  }
  $totalAlumnos_LI = $totalAlumnos_LI + 1;
endforeach;

$porcentajes['porcentaje_LI']= ($totalAlumnos_LI_CACECA*100) / $totalAlumnos_LI;
//Alumnos INFO Final

//Alumnos NEGO-IN Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b  where Carrera='NEGOCIOS INTERNACIONALES' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($stament as $filas):
  $totalActividades=$filas['ActVinculacion']+$filas['ActCientifica']+$filas['ActDeportiva']+$filas['ActResponsabilidadSocial']+$filas['ActCultural'];
  if ($totalActividades != 0) {
    $totalAlumnos_LNI_CACECA = $totalAlumnos_LNI_CACECA + 1;
  }
  $totalAlumnos_LNI = $totalAlumnos_LNI + 1;
endforeach;

$porcentajes['porcentaje_LNI']= ($totalAlumnos_LNI_CACECA*100) / $totalAlumnos_LNI;
//Alumnos NEGO-IN Final

//Alumnos CONTA Inicio
$sql="SELECT * FROM alumno a, alumnoregactividad b  where Carrera='CONTADURIA' and a.Matricula = b.matricula";
$stament = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($stament as $filas):
  $totalActividades=$filas['ActVinculacion']+$filas['ActCientifica']+$filas['ActDeportiva']+$filas['ActResponsabilidadSocial']+$filas['ActCultural'];
  if ($totalActividades != 0) {
    $totalAlumnos_LC_CACECA = $totalAlumnos_LC_CACECA + 1;
  }
  $totalAlumnos_LC = $totalAlumnos_LC + 1;
endforeach;

$porcentajes['porcentaje_LC']= ($totalAlumnos_LC_CACECA*100) / $totalAlumnos_LC;
//Alumnos CONTA Fin

echo json_encode($porcentajes);
 ?>
