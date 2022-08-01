<?php
require 'connessionedb.php';
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$idpost = $_REQUEST["idp"];
$idcommento = $_REQUEST["idc"];

if ( $idpost ) {
	$blogapp = "SELEC IDBlog FROM post WHERE IDPost = '$idpost' ";
	$idblogapp = $mysqli->query($blogapp);
	$querycancell1 = "DELETE FROM commenti WHERE IDPost = '$idpost' ";
	$result = $mysqli->query($querycancell1);
	if ($result) {
		$queryselectimg = "SELECT * FROM haimg WHERE ID = '$idpost' ";
		$resultselect = $mysqli->query($queryselectimg);
		if ($resultselect->num_rows > 0) {
					while ($rowselect = $resultselect->fetch_assoc()){
						$numerimg = $rowselect['IDimg'] ;
						$querycancellb = "DELETE FROM haimg WHERE ID = '$idpost' and IDimg = '$numerimg '"; 
						$resultb = $mysqli->query($querycancellb);
						if ($resultb) {
							$querycancellc = "DELETE FROM immagini WHERE IDimg = '$numerimg '"; 
							$resultc = $mysqli->query($querycancellc);
							$dirname = "uploads/$idblogapp/$idpost";
							if (file_exists("uploads/$idblogapp/$idpost")){
									$dir_handle = opendir($dirname);
									while($file = readdir($dir_handle)) {
										if ($file != "." && $file != "..") {
											if (!is_dir($dirname."/".$file))
												unlink($dirname."/".$file);
											else
												delete_directory($dirname.'/'.$file);
										}
									}
									closedir($dir_handle);
									rmdir("uploads/$idblogapp/$idpost");
							}
						}
					}
		}
		$querycancell2 = "DELETE FROM post WHERE ID = '$idpost' "; 
		$result2 = $mysqli->query($querycancell2);
		if ($result2){
			echo "post cancellato";
		} else {
			echo "impossibile cancellare il post ";
		}
	} else {
		echo "impossibile cancellare il post ";
		exit;
	}
} else if ($idcommento){
	$querycancelcom = "DELETE FROM commenti WHERE IDComm = '$idcommento' "; 
	$resultcomm = $mysqli->query($querycancelcom);
	if ( $resultcomm) {
		echo "commento cancellato con successo";
	} else {
		echo " impossibile cancellare il commento ";
	}
} else {
	echo "impossibile eseguire l'operazione";
	exit;
}

?>