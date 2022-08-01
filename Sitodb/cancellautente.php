<?php
require 'connessionedb.php';
session_start();
$nomeutente = $_SESSION['username'];
$controllore = 1;

$queryblogs = "SELECT * FROM blog WHERE Fondatore = '$nomeutente'";
$resultblogs = $mysqli->query($queryblogs);
if ($resultblogs->num_rows > 0) {
		while ($rowblog = $resultblogs->fetch_assoc()){
			$idblog = $rowblog["IDBlog"];
			$queryposts = "SELECT * FROM post WHERE IDBlog = '$idblog'";
			$resultposts = $mysqli->query($queryposts);
			if ($resultposts->num_rows > 0) {
				while ($row = $resultposts->fetch_assoc()){
						$idpost = $row["ID"];
						$querycommenti = "DELETE FROM commenti WHERE IDPost = '$idpost' ";
						$resultcomm = $mysqli->query($querycommenti);
						if ($resultcomm){
							$controllore = 1;
							$querycontenuti2 = "DELETE FROM post WHERE IDBlog = '$idblog'";
							$resultcont2 = $mysqli->query($querycontenuti2);
							if($resultcont2){
								$controllore = 1;
							} else {
								$controllore = 0;
								echo "impossibile cancellare i post";
							}
						}else {
							$controllore = 0;
							echo "impossibile cancellare i commenti";
						}
				}
			}
			$querycontenuti1 = "DELETE FROM temi WHERE IDBlog = '$idblog'";
			$resultcont1 = $mysqli->query($querycontenuti1);
			$querycontenuti2 = "DELETE FROM trattadi WHERE IDBlog = '$idblog'";
			$resultcont2 = $mysqli->query($querycontenuti2);
			$querycontenuti3 = "DELETE FROM coautore WHERE IDBlog = '$idblog'";
			$resultcont3= $mysqli->query($querycontenuti3);

			if(!$resultcont1){
				$controllore = 0;
				echo "impossibile cancellare il tema";
			}
			if(!$resultcont2){
				$controllore = 0;
				echo "impossibile cancellare gli argomenti";
			}
			if(!$resultcont3){
				$controllore = 0;
				echo "impossibile cancellare i coautori";
			}
			$dirname = "uploads/$idblog";
			if (file_exists("uploads/$idblog")){
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
				rmdir("uploads/$idblog");
			}
	
			if($controllore == 1){
				$queryblog = "DELETE FROM blog WHERE IDBlog = '$idblog' ";
				$resultblog = $mysqli->query($queryblog);
				if($resultblog){
					echo " Cancellazione Blog". "". $idblog."" ."avvenuta con successo ";
				} else {
					echo "impossibile cancellare il blog".$idblog;
				}
			}
			
	}
} 


$query = "DELETE FROM iscritti WHERE nomeutente = '$nomeutente' ";
$result = $mysqli->query($query);
if ($result) {
	unset($_SESSION['password']) ;
	unset($_SESSION["logged"]);
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	session_destroy();
}

?>