<?php
define('SERVER', '148.231.130.234');
define('DATABASE', 'alu36216');
define('USERNAME', 'alu36216');
define('PASSWORD', 'alumno16');

try {
  $dbh = new PDO(
    'mysql:host=' . SERVER .';dbname=' . DATABASE, // Cadena de conexion
    USERNAME, // Nombre de usuario de la base de datos
    PASSWORD // Password del usuario
  );
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo "Error: " . $e.getMessage();
}
