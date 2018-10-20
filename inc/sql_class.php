<?php

/**
 * Klasse für Datenbankverbindung
 * $pdo = new PDO('mysql:host=localhost;dbname=test_card-ausgabe', 'root', '');
 */
class Sql {

  protected static  //protected -> von außen nicht manipulierbar static->aufrufen ohne Object
          $dbh;

  public static function connect($host, $username, $password, $database = null)
  {
    try {
      // wenn $database übergeben wurde,
      // dann wird beim herstellen der verbindung auch gleich die datenbank ausgewählt
      // $database = (wenn) ? dann : sonst;
      $database = ($database) ? ';dbname=' . $database : '';
      self::$dbh = new PDO('mysql:host=' . $host . $database, $username, $password);
      return;
    } catch (PDOException $e) {
      // beim erstellen der neuen instanz der in PHP vordefinierten klasse PDO ist "was schief gelaufen"
      // der fehler steckt im object $e
      // die fehlermeldung bekommt man mit $e->getMessage(), den fehlercode mit $e->getCode()
      // (zusätzlich gibt es noch $e->getFile(), $e->getLine(), und einen backtrace)

      throw new Exception($e->getMessage());

      echo 'hallo';
      // das hier wird nie ausgegeben,
      // denn entweder haben wir bei erfolg durch return -
      // oder throw new Exception($e->getMessage()); diese methode verlassen
    }
  }

  public static function close()
  {
    self::$dbh = null;
    // wir setzen $dbh auf den wert NULL,
    // wodurch der __destruct() der in PHP vordefinierten klasse PDO ausgeführt wird
  }

  public static function exe($sql, $para = null)
  {
    // parameter:
    // $sql: (string) irgend eine sql-abfrage (keine multi-queries! wird von PDO nicht unterstützt)
    // $para: (array) enthält die in der sql-query verwendeten platzhalter und deren werte
    //	  $para Bsp: array( 'name' => 'hans', 'limit' => 1)
    // hier erstellen wir eine kopie von $para. die copy wird später für die fehlerbehandlung genutzt
    $para_copy = $para;

    // die sql query "vorbereiten"
    $stmt = self::$dbh->prepare($sql);
    // die vorbereitete query "steck" nun als object in der variable $stmt (für statement)
    // für genaueres siehe: http://php.net/manual/de/pdo.prepare.php
    // $bind_para: momentan nur um platzhalter bei einem LIMIT nutzen zu können
    // platzhalter wie zB LIMIT :x, :y müssen "gebunden" werden,
    // der grund kurz gefasst:
    //  die sql-anweisung LIMIT erwartet integer (ganzzahlen).
    //  ohne bindParam() wird aber ein string in die query (an dessen platzhalter) eingefügt.
    //  wir würden also einen fehler bekommen, da LIMIT "1", "10" nicht valid ist.
    // für genaueres siehe: http://php.net/manual/de/pdostatement.bindparam.php
    //
		// $bind_para = (wenn) ? dann : sonst;
    $bind_para = ($para !== NULL
            /* suche nach "... LIMIT :placeholder ...", oder "... limit :placeholder ..." */
            and (strpos($sql, 'LIMIT :') !== false or (strpos($sql, ' limit :') !== false)
            ) ? true : false;
  }

  public static function lastInsert()
  {

  }

}
