<?php

define('SERVER', 'us-cdbr-iron-east-01.cleardb.net');
define('DATABASE', 'heroku_26c40112c9d3cd0');
define('USERNAME', 'b1fc433e9998d9');
define('PASSWORD', '813a4239');

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
