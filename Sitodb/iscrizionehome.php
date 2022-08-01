<?php
session_start();
require 'connessionedb.php';

$nome = $_POST['inputNomeUtente'];
$email = $_POST['inputEmail4'];
$password = $_POST['inputPassword4'];
$documento = $_POST['inputDocument'];
$numero = $_POST['inputNumTel'];
$premium = $_POST['premium'] ;
$avatar = $_FILES['inputAvatar'];

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$controllore = 0;
$errorcontrol = "";

if (strlen($nome) < 4 ) {
	$errorcontrol .= "Il nickname deve essere tra 4 e 25 caratteri <br>";
	$controllore = 1;
} else if (strlen($nome) > 25 ) {
	$errorcontrol .= "Il nickname deve essere tra 4 e 25 caratteri <br>";
	$controllore = 1;
} else {
	$querycontrol = "SELECT nomeutente FROM iscritti WHERE nomeutente = '$nome' ";
	$controlname = $mysqli->query($querycontrol);
	$count = $controlname->num_rows;
	if($count > 0){
		$errorcontrol .= "Il nickname non è disponibile. <br>";
		$controllore = 1;
	} 
}

if (strlen($password) < 6 ) {
	$errorcontrol .= "La Password deve essere almeno 6 caratteri <br>";
	$controllore = 1;
}


if(!preg_match('/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $email)) {
	$errorcontrol .= "inserisci un email valida <br>";
	$controllore = 1;
} else {
	$querycontrolb = "SELECT mail FROM iscritti WHERE mail = '$email'";
	$controlmail = $mysqli->query($querycontrolb);
	$countb = $controlmail->num_rows;
	if ($countb > 0){
		$errorcontrol .= "l'email $email è già associata ad un account. <br>";
		$controllore = 1;
	}
}

if (!preg_match('/^[0-9]{3}\s[0-9]{3}\s[0-9]{4}$/',  $numero)){
	$errorcontrol .= "Inserisci un Numero di Telefono valido <br>";
	$controllore = 1;
}

if(!preg_match('/[a-zA-Z0-9\s]+/', $documento)){
	$errorcontrol .= "Il Documento deve essere alfanumerico <br>";
	$controllore = 1;
} else {
	if(strlen($documento) < 9 ) {
		$errorcontrol .= "il Documento deve essere di 9 caratteri<br>";
		$controllore = 1;
	} 
}

if ($premium != ""){
	if (! ctype_digit(strval($premium))){
		$errorcontrol .= "Il numero della carta deve essere numerico <br>";
		$controllore = 1;
	} else {
		if(strlen($premium) < 13 || strlen($premium) > 16 ) {
		$errorcontrol .= "Il numero della carta deve essere tra 13 e 16 caratteri <br>";
		$controllore = 1;
		} 
	}
}
if ($controllore == 0){
	if(!empty($_FILES['inputAvatar']['name'])) {
		mkdir("uploads/$nome");
		$uploaddir = "uploads/$nome/";
		$uploadfile = $uploaddir . basename($_FILES['inputAvatar']['name']);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["inputAvatar"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				echo "<div id='errorsRegistrazione'>File non è un immagine.</div>";
				exit;
			}
		}
		if ($_FILES["inputAvatar"]["size"] > 1000000) {
			echo "<div id='errorsRegistrazione'>L'immagine è troppo grande.</div>";
			exit;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 	&& $imageFileType != "gif" ) {
			echo "<div id='errorsRegistrazione'>Permessi solo JPG, JPEG, PNG & GIF .</div>";
			exit;
		}
		if ($uploadOk == 0) {
			echo "<div id='errorsRegistrazione'>impossibile caricare l'immagine, riprovare</div>";
			exit;
		} else {
			$nuovoavatar = $uploadfile;
			if (move_uploaded_file($_FILES['inputAvatar']['tmp_name'], $uploadfile)) {
				$queryeavatar = $mysqli->prepare("INSERT INTO iscritti(password,nomeutente, mail, numerotelefono, documento, Pagamento, Avatar) VALUES (?,?,?,?,?,?,?)");
				$queryeavatar->bind_param('sssssis', $hashed_password, $nome, $email, $numero, $documento, $premium, $nuovoavatar );
				if ($queryeavatar->execute()) {
					$queryeavatar->close();
					echo "iscrizione con successo";
					exit;
				} else {
					exit ("Errore nella query : " . $mysqli->error);
				}
			} else {
				echo "<div id='errorsRegistrazione'>Possible file upload attack!</div>";
				exit;
			}
		}
	
	}else {
		$querye = $mysqli->prepare("INSERT INTO iscritti(password,nomeutente, mail, numerotelefono, documento, Pagamento) VALUES (?,?,?,?,?,?)");
		$querye->bind_param('sssssi', $hashed_password, $nome, $email, $numero, $documento, $premium);
		if ($querye->execute()) {
				$messaggiob = urlencode("TUTTO OKB"); 
				$referer = $_SERVER['HTTP_REFERER'];
				echo "iscrizione con successo";
				exit;
		} else {
			echo "<div id='errorsRegistrazione'>Impossibile creare l'account utente</div>";
			exit;
		}
	}
} else {
	echo "<div id='errorsRegistrazione'>".$errorcontrol."</div>";
	exit;
}
$mysqli->close();
?>
