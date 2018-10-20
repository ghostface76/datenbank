<?php

require_once 'meta_class.php'; //require_once lädt Datei, wenn noch nicht
require_once 'ergebnis_class.php';

require_once('connection.class.php');    $conn = new DatenBankVerbindung;


$meta     = new Meta; //neues Objekt der Klasse Meta erzeugen (instanzieren)
$ergebnis = new SuchErgebnis;
 ?>
