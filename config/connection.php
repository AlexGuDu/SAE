<?php
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"], 1);

$cleardb_server = 'localhost';
$cleardb_username = 'root';
$cleardb_password = '';
$cleardb_db = 'sae2';

define('SERVER', $cleardb_server);
define('USERNAME', $cleardb_username);
define('PASSWORD', $cleardb_password);
define('DATABASE', $cleardb_db);


try {
  $dbh = new PDO(
    'mysql:host=' . $cleardb_server .';dbname=' . $cleardb_db, // Cadena de conexion
    $cleardb_username, // Nombre de usuario de la base de datos
    $cleardb_password // Password del usuario
  );
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo "Error: " . $e.getMessage();
}
