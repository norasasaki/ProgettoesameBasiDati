<?php
require_once 'connessionedb.php';
session_start();
$id = $_REQUEST['idb'] ;
if (isset ($_REQUEST['idb'])) {
		$querycontrol = "SELECT contatore FROM blog WHERE IDBlog ='$id'" ;
		$resultcontrol = $mysqli->query($querycontrol);
		$row = $resultcontrol->fetch_assoc();
		if ($row["contatore"] = NULL ) {
			$querya = "UPDATE blog SET contatore = 1 WHERE IDBlog = '$id' ";
			$resulta = $mysqli->query($querya);
		} else {
			$proviamo = $row["contatore"] +1 ;
			$queryb = "UPDATE blog SET contatore = contatore + 1 WHERE IDBlog = '$id' ";
			$resultb = $mysqli->query($queryb);
		}
} else {
	 die('Errore nella query (' . $mysqli->connect_errno .
') ' . $mysqli->connect_error);
};
?>