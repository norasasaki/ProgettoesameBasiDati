<?php
session_start();
require_once 'connessionedb.php';
error_reporting(E_ALL ^ E_NOTICE);

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];

$nome = $_POST['name'];
$NuovoNome = $_POST['nuovonome'];
$OldPassword = $_POST['oldpasswprd'];
$NewPassword = $_POST['NuovaPassword'];
$AgainNewPassword = $_POST['AgainNuovaPass'];
$NuovaEmail = $_POST['nuovaEmail'];
$AgainNuovaEmail = $_POST['againNuovaEmail'];
$NuovoAvatar = $_FILES['nuovoAvatar'];

if ($nome && $NuovoNome) {
	$querycontrol = "SELECT nomeutente FROM iscritti WHERE nomeutente = '$NuovoNome' ";
	$controlname = $mysqli->query($querycontrol);
	$controller = 0;
	$count = $controlname->num_rows;
	if($count > 0){
		echo "Il nickname non è disponibile ";
		exit;
	} else {
		$controller = 1;
	}
	if ($controller = 1 ){
		$querynome = $mysqli->prepare("UPDATE iscritti SET nomeutente = ? WHERE nomeutente = ? ");
		$querynome->bind_param('ss', $NuovoNome, $username);
		$status = $querynome->execute();
		if ($status === true) {
				$querynome->close();
				if (file_exists("uploads/$nome/")){
				$direct = "uploads/$nome/";
				rename($direct, "uploads/$NuovoNome/");
				}
				$_SESSION['username'] = $NuovoNome ;
				echo "Nome Utente Aggiornato ";
				exit;
			} else {
				echo "Errore";
			}
	}

} else if ($NewPassword && $OldPassword && $AgainNewPassword) {
	if ($OldPassword == $_SESSION['password']) {
		if ($NewPassword == $AgainNewPassword) {
			$hashed_password = password_hash($NewPassword, PASSWORD_BCRYPT);
			$querypassword = $mysqli->prepare("UPDATE iscritti SET password= ? WHERE nomeutente =  ? ");
			$querypassword->bind_param('ss', $hashed_password, $username);
			$status = $querypassword->execute();
		if ($status === true) {
				$_SESSION['password'] = $NewPassword;
				echo " Password aggiornata!";
				$querypassword->close();
				exit;
			} else {
				echo "Errore";
			}
		} else {
			echo "Le password non corrispondono";
		}
	}else {
		echo "La vecchia password non è la tua attuale password";
	}
} else if ($NuovaEmail && $AgainNuovaEmail) {
	$querycontrol1 = "SELECT mail FROM iscritti";
	$controlmail = $mysqli->query($querycontrol1);
	$controller1 = 0;
	while ($rows1 = $controlmail->fetch_assoc()){
		if ($rows1["mail"] == $NuovaEmail){
			echo "l'email $NuovaEmail è già associata ad un account ";
			exit;
		} else {
			$controller1 = 1;
		}
	}
	if ($controller1 = 1 ){
		if ($AgainNuovaEmail == $NuovaEmail) {
			$queryemail = $mysqli->prepare("UPDATE iscritti SET mail= ? WHERE nomeutente = ? ");
			$queryemail->bind_param('ss', $NuovaEmail, $username);
			$status = $queryemail->execute();
		if ($status === true) {
				$_SESSION['username'] = $NuovaEmail;
				echo "Email aggiornata";
				$queryemail->close();
				exit;
			} else {
				echo "Errore";
			}
		} else {
			echo "Le email non sono uguali";
		}
	}
} else if($_FILES['nuovoAvatar']['name']!="") {
	if (!file_exists("uploads/$username")){
		mkdir("uploads/$username");
	}
	$uploaddir = "uploads/$username/";
	$uploadfile = $uploaddir . basename($_FILES['nuovoAvatar']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["nuovoAvatar"]["tmp_name"]);
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
	if ($_FILES["nuovoAvatar"]["size"] > 1000000) {
		echo "Il tuo file è troppo grande";
		$uploadOk = 0;
		exit;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 	&& $imageFileType != "gif" ) {
			echo "Solo i formati JPG, JPEG, PNG & GIF sono permessi.";
			$uploadOk = 0;
			exit;
	}

	if ($uploadOk == 1) {
		$nuovoavatar = basename($_FILES['nuovoAvatar']['name']);
		if (move_uploaded_file($_FILES['nuovoAvatar']['tmp_name'], $uploadfile)) {
			$queryeavatar = $mysqli->prepare("UPDATE iscritti SET Avatar = ? WHERE nomeutente = ? ");
			$queryeavatar->bind_param('ss', $nuovoavatar, $username);
			$status = $queryeavatar->execute();
			if ($status === true) {
				echo "L'avatar è stato cambiato " ;
			} else {
				echo "Errore";
			}
		} else {
			echo "Possible file upload attack!\n";
		}
	}
	
} else {
	echo "Devi compilare tutti i campi";
	exit;
}



$mysqli->close();
exit;
?>
