<?php
session_start();
require_once 'connessionedb.php';

$username = $_SESSION['username'];
$titolo = $_POST['titolo'];
$descrizione = $_POST['descrizione'];
$header = $_FILES['header'];
$icon = $_FILES['icon'];
$sfondo = $_FILES['sfondo'];
$coautori = $_POST['coautori'];
$argomenti = $_POST['argomenti'];
$coautorei = $_POST['coautori'];

//crea array argomenti
$stringaarg= implode(",",$argomenti);
$argomentidef = explode(",", $stringaarg);

// crea array coautorei
$coautoridef = explode(",", $coautorei);

$querycontrolname1 = "SELECT nome FROM blog WHERE nome = '$titolo' ";
$controlname1 = $mysqli->query($querycontrolname1);
$count1 = $controlname1->num_rows;
if($count1 > 0){
	echo "<div id='errorsnewb'>Il titolo non è disponibile</div> ";
	exit;
} else {
	$querynuovo = $mysqli->prepare("INSERT INTO blog(nome,Descrizione, Fondatore ) VALUES (? ,? ,?)");
	$querynuovo->bind_param('sss',$titolo, $descrizione,$username );
	$status = $querynuovo->execute();
}


$idre = $mysqli->insert_id;

//controllo che ha creato il blog 
if ($status === true) {
	//aggiunge gli argomenti al blog
	$errorsvarie = "";
	if ($argomenti != NULL ) {
		foreach($argomentidef as $value){
			$query1 = "SELECT * FROM argomenti WHERE argomento = '$value'";
			$result1 = $mysqli->query($query1);
			$count = $result1->num_rows;
			if($count > 0){
			} else {
				$queryargomenti = $mysqli->prepare("INSERT INTO argomenti(argomento) VALUES (?)");
				$queryargomenti->bind_param('s',$value);
				$statusb = $queryargomenti->execute();
			}
			global $idre;
			$queryarg = $mysqli->prepare("INSERT INTO trattadi(IDBlog, argomento) VALUES (?, ?)");
			$queryarg->bind_param('is',$idre,$value);
			$statusb = $queryarg->execute();
			if (!($statusb === true)){
				$errorsvarie .= "impossibile aggiungere gli argomenti";
			}
			$queryarg->close();
		}
	} else {
		$errorsvarie .= "Devi selezionare almeno un argomento";
	}
	//aggiungo i coautorei
	if ($coautorei != NULL){
		foreach($coautoridef as $value1){
			$querycontrol = "SELECT nomeutente FROM iscritti WHERE nomeutente = '$value1' ";
			$controlname = $mysqli->query($querycontrol);
			$controller = 0;
			$count = $controlname->num_rows;
			if($count == 0){
					$errorsvarie .= "L'utente non esiste, impossibile aggiungerlo come coautore";
			} else {
					global $idre;
					$querycoautore = $mysqli->prepare("INSERT INTO coautore(IDBlog, NomeCoAutore) VALUES (?, ?)");
					$querycoautore->bind_param('is', $idre, $value1);
					$statusc = $querycoautore->execute();
					if (!($statusc === true)){
						$errorsvarie .= "impossibile aggiungere il coautore  ".$value1;
					}
					$querycoautore->close();
			}
		}
	}
	
	// aggiunge le immagini 
	$imgicon = basename($_FILES['icon']['name']);
	$imgheader = basename($_FILES['header']['name']);
	$imgheader = basename($_FILES['sfondo']['name']);
	mkdir("uploads/$idre");
	global $idre;
	$uploaddir = "uploads/$idre/";
	$uploadfile1 = $uploaddir . basename($_FILES['header']['name']);
	$uploadfile2 = $uploaddir . basename($_FILES['icon']['name']);
	$uploadfile3 = $uploaddir . basename($_FILES['sfondo']['name']);
	$uploadOk = 1;
	$imageFileType1 = strtolower(pathinfo($uploadfile1,PATHINFO_EXTENSION));
	$imageFileType2 = strtolower(pathinfo($uploadfile2,PATHINFO_EXTENSION));
	$imageFileType3 = strtolower(pathinfo($uploadfile3,PATHINFO_EXTENSION));
	//controlli header
	if ($_FILES['header']['name']!=""){
		$check1 = getimagesize($_FILES["header"]["tmp_name"]);
		if($check1 !== false) {
			$uploadOk = 1;
		} else {
			$errorsvarie .= "header non è un immagine <br>";
			$uploadOk = 0;
		}
		if ($_FILES["header"]["size"] > 10000000) {
			$errorsvarie .= "header è troppo grande <br>";
			$uploadOk = 0;
		}
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" 	&& $imageFileType1 != "gif" ) {
			$errorsvarie .= "Solo i formati JPG, JPEG, PNG & GIF sono permessi.<br>";
			$uploadOk = 0;
		}
	}
	//controlli icon
	if($_FILES['icon']['name']!="") {
		$check2 = getimagesize($_FILES["icon"]["tmp_name"]);
		if($check2 !== false) {
			$uploadOk = 1;
		} else {
			$errorsvarie .= "icon non è un immagine <br>";
			$uploadOk = 0;
		}
		if ($_FILES["icon"]["size"] > 1000000) {
			$errorsvarie .= "icon è troppo grande<br>";
			$uploadOk = 0;
		}
		if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" 	&& $imageFileType2 != "gif" ) {
			$errorsvarie .= "Solo i formati JPG, JPEG, PNG & GIF sono permessi.<br>";
			$uploadOk = 0;
		}
	}
	//controllo sfondo
	if($_FILES['sfondo']['name']!="") {
		$check2 = getimagesize($_FILES["sfondo"]["tmp_name"]);
		if($check2 !== false) {
			$uploadOk = 1;
		} else {
			$errorsvarie .= "sondo non è un immagine <br>";
			$uploadOk = 0;
		}
		if ($_FILES["sfondo"]["size"] > 10000000) {
			$errorsvarie .= "sfondo è troppo grande <br>";
			$uploadOk = 0;
		}
		if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" 	&& $imageFileType3 != "gif" ) {
			$errorsvarie .= "Solo i formati JPG, JPEG, PNG & GIF sono permessi. <br>";
			$uploadOk = 0;
		}
	}
	
	if ($errorsvarie != ""){
		global $idre;
		$queryerrorsdeA = "DELETE FROM trattadi WHERE IDBlog = '$idre' ";
		$controlnameA = $mysqli->query($queryerrorsdeA);
		$queryerrorsdeB = "DELETE FROM coautore WHERE IDBlog = '$idre' ";
		$controlnameB = $mysqli->query($queryerrorsdeB);
		$queryerrorsdel = "DELETE FROM blog WHERE IDBlog = '$idre' ";
		$controlname1 = $mysqli->query($queryerrorsdel);
		echo "<div id='errorsnewb'>". $errorsvarie."</div>";
		exit;
	}
	
	if ($uploadOk == 1) {
		$errorsimg = "";
		$nuovoicon = basename($_FILES['icon']['name']);
		$nuovoheader = basename($_FILES['header']['name']);
		$nuovosfondo = basename($_FILES['sfondo']['name']);
			
		if ($_FILES['header']['name']!="" ){
			if (move_uploaded_file($_FILES['header']['tmp_name'], $uploadfile1) ) {
				$queryeimg = $mysqli->prepare("UPDATE blog SET header = ?  WHERE IDBlog = ? ");
				$queryeimg->bind_param('ss', $nuovoheader, $idre );
				$status2 = $queryeimg->execute();
				if (!($status2 === true)){
					$errorsimg .= "Impossibile caricare l'header";
				}
			} else {
				$errorsimg .= "Impossibile caricare le immagini";
			}
		}
			
		if($_FILES['sfondo']['name']!="" ) {
			if (move_uploaded_file($_FILES['sfondo']['tmp_name'], $uploadfile3) ) {
				$queryesfondo = $mysqli->prepare("INSERT INTO temi (sfondo, IDBlog) VALUES (?, ?) ");
				$queryesfondo->bind_param('si', $nuovosfondo, $idre );
				$status3 = $queryesfondo->execute();
				if (!($status3 === true)){
					$errorsimg .= " impossibile caricare lo sfondo. \n";
				}
			} else {
				$errorsimg .= "Impossibile caricare lo sfondo. \n";
			}
		}
		
		if($_FILES['icon']['name']!=""){
			if (move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile2) ) {
				$queryeimg2 = $mysqli->prepare("UPDATE blog SET icon = ? WHERE IDBlog = ? ");
				$queryeimg2->bind_param('ss', $nuovoicon, $idre );
				$status2b = $queryeimg2->execute();
				if (!($status2b === true)){
					$errorsimg .= "Impossibile caricare la icon";
				}
				$vall = '0';
				$querycontroltemi = "SELECT IDBlog FROM temi WHERE IDBlog = '$idre' ";
				$controltemi = $mysqli->query($querycontroltemi);
				$conttemi = $controltemi->num_rows;
				if($conttemi > 0){
					$corniceA = $mysqli->prepare("UPDATE temi SET cornice = ? WHERE IDBlog = ? ");
					$corniceA->bind_param('is', $vall, $idre );
					$finish = $corniceA->execute();
				} else {
					$querynuovo = $mysqli->prepare("INSERT INTO temi(cornice,IDBlog ) VALUES (? ,?)");
					$querynuovo->bind_param('is', $vall, $idre );
					$status = $querynuovo->execute();
				}
			} else {
				$errorsimg .= "Impossibile caricare le immagini";
			}
		}	
		
		
		if ($errorsimg != NULL){
			global $idre;
			$dirname = "uploads/$idre";
			if (file_exists("uploads/$idre")){
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
				rmdir("uploads/$idre");
			}
			$querycancellA = "DELETE FROM trattadi WHERE IDBlog = '$idre' ";
			$controlA = $mysqli->query($querycancellA);
			$querycancellB = "DELETE FROM coautore WHERE IDBlog = '$idre' ";
			$controlB = $mysqli->query($querycancellB);
			$querydelet2 = "DELETE FROM blog WHERE IDBlog = '$idre' ";
			$controldelet = $mysqli->query($querydelet2);
			echo "<div id='errorsnewb'>". $errorsimg."</div>";
			exit;
		}
		
	}	
		
		
	echo "successo";
	
} else {
	echo "Impossibile creare un nuovo blog";
	exit;
}

?>