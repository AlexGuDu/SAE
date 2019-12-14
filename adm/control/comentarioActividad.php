<?php
require '../../config/connection.php';
$folio=$_POST['folio'];
$sql="SELECT Comentario FROM actividad where folio= :folio";
$statement = $dbh->prepare($sql);
$statement->bindParam(':folio', $folio);
$statement->execute();
foreach ($statement as $statement):
  $comentario = $statement['Comentario'];
endforeach;
echo json_encode($comentario);
 ?>
