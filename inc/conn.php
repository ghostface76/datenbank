<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=test_card-ausgabe', 'root', '');
}

catch (PDOException $e)
{
  echo 'Datenbank-Fehler: ' . $e->getMessage();
}
 ?>
