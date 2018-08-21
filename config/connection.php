<?php

define('SERVER', 'localhost');
define('DATABASE', 'sae');
define('USERNAME', 'root');
define('PASSWORD', '');

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
