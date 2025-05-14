<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

global $link;
// Conectare la baza de date cu `adresa_server`, `utilizator`, `parola`, `nume_baza_de_date` 
$link = mysqli_connect('127.0.0.1', 'root', '', 'proiectweb');

// Verficare conexiune
if ($link === false) {
  die('ERROR: Could not connect. ' . mysqli_connect_error());
} else {
  echo 'connect OK';
}
?>