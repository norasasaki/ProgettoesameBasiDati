<?php
/**************************************
* Open a Connection with MySQLi (OOP) *
**************************************/
$mysqli = new mysqli('localhost', 'root', '','tunglr');
if ($mysqli->connect_error) {
 die('Errore di connessione (' . $mysqli->connect_errno .
') ' . $mysqli->connect_error);
} 

?>