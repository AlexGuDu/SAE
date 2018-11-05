<?php
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"], 1);

define('SERVER', 'localhost');
define('DATABASE', 'sae');
define('USERNAME', 'root');
define('PASSWORD', '');

// define('SERVER', $cleardb_server);
// define('USERNAME', $cleardb_username);
// define('PASSWORD', $cleardb_password);
// define('DATABASE', $cleardb_db);

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
