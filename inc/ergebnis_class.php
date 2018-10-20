<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SuchErgebnis {

  public function ausgebenErgebnis()
  {
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=test_card-ausgabe', 'root', '');
    } catch (PDOException $e) {
      echo 'Datenbank-Fehler: ' . $e->getMessage();
    }

    
      echo "gesuchten Daten werden ausgegeben";
      $suchwort = $_REQUEST['suche'];

      $statement = $pdo->prepare
              ("SELECT *
        FROM mythings
        WHERE bezeichnung LIKE :bezeichnung");

      $statement->execute(array('bezeichnung' => "%$suchwort%"));
    
    return $statement;
  }

}
