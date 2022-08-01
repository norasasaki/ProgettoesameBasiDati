<?php
session_start();
require_once 'connessionedb.php';
error_reporting(E_ALL ^ E_NOTICE);

$email = $_SESSION['username'];
$password = $_SESSION['password'];
$Idblog = $_REQUEST['par2'];
$valuta = $_REQUEST['par3'];

$NuovoTitolo = $_POST['nuovaTitolo'];
$NuovoHeader = $_FILES['nuovoHeader'];
$NuovaIcon = $_FILES['nuovaIcon'];
$NuovaBio = $_POST['nuovaBio'];
$Coautore = $_POST['nomecoautore'];
$Argomento = $_POST['newargomento'];

//elementi del tema
$NuovoSfondo = $_FILES['nuovoSfondo'];
$NuovaCornice = $_REQUEST['selezione']; 
$NuovoColore = $_POST['nuovocolore'];


if ($NuovoTitolo) {
	$querycontrol = "SELECT nome FROM blog WHERE nome = '$NuovoTitolo' ";
	$controlname = $mysqli->query($querycontrol);
	$controller = 0;
	$count = $controlname->num_rows;
	if($count > 0){
		echo "Il titolo $NuovoTitolo non è disponibile ";
		exit;
	} else {
		$controller = 1;
	}
	if ($controller = 1 ){
		$querytitolo = $mysqli->prepare("UPDATE blog SET nome = ? WHERE IDBlog = ? ");
		$querytitolo->bind_param('si', $NuovoTitolo, $Idblog);
		$status = $querytitolo->execute();
		if ($status === true) {
			$querytitolo->close();
			echo "Titolo blog $Idblog modificato";
		} else {
			echo "Erroe";
		}
	}
} else if ($_FILES['nuovoHeader']['name']!="") {
	if (!file_exists("uploads/$Idblog")){
		mkdir("uploads/$Idblog");
	}
	$uploaddir = "uploads/$Idblog/";
	$uploadfile = $uploaddir . basename($_FILES['nuovoHeader']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["nuovoHeader"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "Il file non è un immagine";
			$uploadOk = 0;
			exit;
		}
	}
	if (file_exists($uploadfile)) {
		unlink($uploadfile);
		$uploadOk = 1;
	}
	if ($_FILES["nuovoHeader"]["size"] > 500000) {
		echo "Il tuo file è troppo grande";
		exit;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 	&& $imageFileType != "gif" ) {
	  echo "Solo i formati JPG, JPEG, PNG & GIF sono permessi.";
	  exit;
	}
	if ($uploadOk == 1) {
		$nuovoheader = basename($_FILES['nuovoHeader']['name']);
		if (move_uploaded_file($_FILES['nuovoHeader']['tmp_name'], $uploadfile)) {
			$queryheader = $mysqli->prepare("UPDATE blog SET header = ? WHERE IDBlog = ?");
			$queryheader->bind_param('si', $nuovoheader, $Idblog);
			$status = $queryheader->execute();
			if ($status === true) {
				$queryheader->close();
				echo "Header aggiornato";
				exit;
			} else {
				echo "Impossibile caricare l'header";
				exit;
			}
		} else {
			echo "Possible file upload attack!\n";
		}
	}
} else if ($_FILES['nuovaIcon']['name']!="") {
	if (!file_exists("uploads/$Idblog")){
		mkdir("uploads/$Idblog");
	}
	$uploaddir = "uploads/$Idblog/";
	$uploadfile = $uploaddir . basename($_FILES['nuovaIcon']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["nuovaIcon"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "Il file non è un immagine";
			$uploadOk = 0;
			exit;
		}
	}
	if (file_exists($uploadfile)) {
		unlink($uploadfile);
		$uploadOk = 1;
	}
	if ($_FILES["nuovaIcon"]["size"] > 500000) {
		echo "Il tuo file è troppo grande";
		exit;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 	&& $imageFileType != "gif" ) {
	  echo "Solo i formati JPG, JPEG, PNG & GIF sono permessi.";
	  exit;
	}
	if ($uploadOk == 1) {
		$nuovoicon = basename($_FILES['nuovaIcon']['name']);
		if (move_uploaded_file($_FILES['nuovaIcon']['tmp_name'], $uploadfile)) {
			$queryicon = $mysqli->prepare("UPDATE blog SET icon = ? WHERE IDBlog = ? ");
			$queryicon->bind_param('si', $nuovoicon, $Idblog);
			$status = $queryicon->execute();
			if ($status === true) {
				$queryicon->close();
				echo"Icon aggiornata";
				exit;
			} else {
				echo "Impossibile aggiornare l'icon";
				exit;
			}
		} else {
			echo "Possible file upload attack!\n";
		}
	}
} else if (isset($_REQUEST['selezione']) && $_REQUEST['selezione'] != "undefined"){
	$querycontrol = "SELECT * FROM temi WHERE IDBlog = '$Idblog' ";
	$controltema = $mysqli->query($querycontrol);
	$controller = 0;
	$count = $controltema->num_rows;
	if($count > 0){
		$querycornice = $mysqli->prepare("UPDATE temi SET cornice = ? WHERE IDBlog = ? ");
		$querycornice->bind_param('ii', $NuovaCornice, $Idblog);
		$statusa = $querycornice->execute();
		if ($statusa === true) {
			$querycornice->close();
			echo"cornice aggiornata";
			exit;
		} else {
			echo "Impossibile aggiornare la cornice";
			exit;
		}
	} else {
		$querycornicenew = $mysqli->prepare("INSERT INTO temi(IDBlog, cornice) VALUES (?, ?)");
		$querycornicenew->bind_param('ii',$Idblog, $NuovaCornice);
		$statusb = $querycornicenew->execute();
		if ($statusb === true) {
			echo"cornice aggiornato";
			exit;
		} else {
			echo "Impossibile aggiornare la cornice";
			exit;
			}
		}
} else if ($_FILES['nuovoSfondo']['name']!=""){
	if (!file_exists("uploads/$Idblog")){
		mkdir("uploads/$Idblog");
	}
	$uploaddir = "uploads/$Idblog/";
	$uploadfile = $uploaddir . basename($_FILES['nuovoSfondo']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["nuovoSfondo"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "Il file non è un immagine";
			$uploadOk = 0;
			exit;
		}
	}
	if (file_exists($uploadfile)) {
		unlink($uploadfile);
		$uploadOk = 1;
	}
	if ($_FILES["nuovoSfondo"]["size"] > 800000) {
		echo "Il tuo file è troppo grande";
		exit;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 	&& $imageFileType != "gif" ) {
	  echo "Solo i formati JPG, JPEG, PNG & GIF sono permessi.";
	  exit;
	}
	if ($uploadOk == 1) {
		$nuovosfondo = basename($_FILES['nuovoSfondo']['name']);
		if (move_uploaded_file($_FILES['nuovoSfondo']['tmp_name'], $uploadfile)) {
			$querycontrol = "SELECT * FROM temi WHERE IDBlog = '$Idblog' ";
			$controltema = $mysqli->query($querycontrol);
			$controller = 0;
			$count = $controltema->num_rows;
			if($count > 0){
				$querysfondo = $mysqli->prepare("UPDATE temi SET sfondo = ? WHERE IDBlog = ? ");
				$querysfondo->bind_param('si', $nuovosfondo, $Idblog);
				$status1 = $querysfondo->execute();
				if ($status1 === true) {
					$querysfondo->close();
					echo"sfondo aggiornato";
					exit;
				} else {
					echo "Impossibile aggiornare lo sfondo";
					exit;
				}
			} else {
				$querysfondonew = $mysqli->prepare("INSERT INTO temi(IDBlog, sfondo) VALUES (?, ?)");
				$querysfondonew->bind_param('is',$Idblog, $nuovosfondo);
				$status = $querysfondonew->execute();
				if ($status === true) {
					echo"sfondo aggiornato";
					exit;
				} else {
					echo "Impossibile aggiornare lo sfondo";
					exit;
				}
			}
		} else {
			echo "Possible file upload attack!\n";
		}
	}
} else if ($NuovaBio) {
	$querybio = $mysqli->prepare("UPDATE blog SET Descrizione = ? WHERE IDBlog = ?");
	$querybio->bind_param('si', $NuovaBio, $Idblog);
	$status = $querybio->execute();
	if ($status === true) {
		$querybio->close();
		echo" Biografia aggiornata";
	} else  {
		echo "impossibile cambiare la Descrizione";
	}
}else if ($NuovoColore){
	$querycontrol = "SELECT * FROM temi WHERE IDBlog = '$Idblog' ";
	$controltema = $mysqli->query($querycontrol);
	$controller = 0;
	$count = $controltema->num_rows;
	if($count > 0){
		$querycolor = $mysqli->prepare("UPDATE temi SET colorDescrizione = ? WHERE IDBlog = ? ");
		$querycolor->bind_param('si', $NuovoColore, $Idblog);
		$statuscolor = $querycolor->execute();
		if ($statuscolor === true) {
				$querycolor->close();
				echo"colore aggiornato";
				exit;
		} else {
			echo "Impossibile aggiornare il colore";
			exit;
		}
	} else {
		$queryscolornew = $mysqli->prepare("INSERT INTO temi(IDBlog, colorDescrizione) VALUES (?, ?)");
		$queryscolornew->bind_param('is',$Idblog, $NuovoColore);
		$statuscolorn = $queryscolornew->execute();
		if ($statuscolorn === true) {
				echo"colore aggiornato";
				exit;
		} else {
			echo "Impossibile aggiornare il colore";
			exit;
			}
	}
} else if ($Coautore){
	$testoA = "";
	$querycontrol = "SELECT nomeutente FROM iscritti WHERE nomeutente = '$Coautore' ";
	$controlname = $mysqli->query($querycontrol);
	$controller = 0;
	$count = $controlname->num_rows;
	if($count == 0){
		$nope= "L'utente non esiste ";
		echo $nope;
		exit;
	} else {
		$controller = 1;
	}
	if ($controller = 1) {
		$queryvaluta = "Select * FROM  coautore WHERE IDBlog = '$Idblog' and NomeCoAutore = '$Coautore'";
		$result8 = $mysqli->query($queryvaluta);
		if ($valuta == "Aggiunti"){
			if ($result8->num_rows == 0) {
				$querycoautore = $mysqli->prepare("INSERT INTO coautore(IDBlog, NomeCoAutore) VALUES (?, ?)");
				$querycoautore->bind_param('is', $Idblog, $Coautore);
				$querycoautore->execute();
				$querycoautore->close();
				$testoA = "Coautore aggiunto con successo";
				echo $testoA;
				exit;
			}else {
				$testoA = "Coautore già presente";
				echo $testoA;
				exit;
			}
		} else {
			if ($result8->num_rows == 1) {
				$querycoautoreb = $mysqli->prepare("DELETE FROM coautore WHERE IDBlog = ? and NomeCoAutore = ? ");
				$querycoautoreb->bind_param('is', $Idblog, $Coautore);
				$querycoautoreb->execute();
				$querycoautoreb->close();
				$testoA = "Cancellazione coautore avvenuta con successo";
				echo $testoA ;
			}else {
				$testoA = "Coautore non presente";
				echo $testoA;
					exit;
			}
		}
	}

} else if ($Argomento){
	$testoB = "";
	$controllexits = 0;
	$queryvalutaA = "Select * FROM  trattadi WHERE IDBlog = '$Idblog' and argomento = '$Argomento'";
	$result9 = $mysqli->query($queryvalutaA);
	if ($valuta == "Aggiunti"){
		$queryvalutaB = "Select * FROM argomenti WHERE argomento = '$Argomento'";
		$resultB = $mysqli->query($queryvalutaB);
		if($resultB->num_rows == 0){
			$aggiuntaargo = "INSERT INTO argomenti (argomento) VALUES ('$Argomento')";
			$resultargo = $mysqli->query($aggiuntaargo);
			if ($resultargo) {
				$controllexits = 1;
			}
		} else {
			$controllexits = 1;
		}
		if ($controllexits = 1) {
			if ($result9->num_rows == 0) {
				$queryargomento = $mysqli->prepare("INSERT INTO trattadi(IDBlog, argomento) VALUES (?, ?)");
				$queryargomento->bind_param('is', $Idblog, $Argomento);
				$queryargomento->execute();
				$queryargomento->close();
				$testoB = "Argomento aggiunto con successo";
				echo $testoB;
				exit;
			}else {
				$testoB = "Argomento già assegnato adl blog". "".$Idblog;
				echo $testoB;
				exit;
			}
		} else {
			$testoB = "Impossibile aggiungere l'argomento". " ".$Argomento ;
			echo $testoB;
			exit;
		}
	} else {
			if ($result9->num_rows == 1) {
				$queryargomentob = $mysqli->prepare("DELETE FROM trattadi WHERE IDBlog = ? and argomento = ? ");
				$queryargomentob->bind_param('is', $Idblog, $Argomento);
				$queryargomentob->execute();
				$queryargomentob->close();
				$testoB = "Cancellazione argomento avvenuta con successo";
				echo $testoB ;
			}else {
				$testoB = "Argomento non presente per il blog". "".$Idblog;
				echo $testoB;
				exit;
			}
	}
	
} else {
	echo "Tutti i campi devono essere compilati";
	exit;
}

$mysqli->close();
exit;
?>
