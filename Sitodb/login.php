<?php
require_once 'connessionedb.php';

$username = $_POST['EmailLogin'];
$password = $_POST['PasswordLogin'];

if(!preg_match('/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $username)) {
		$query = "SELECT nomeutente, password, mail FROM iscritti WHERE nomeutente = '$username' ";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		if (!$row) {
			echo "<div id='errorslogin'> nome utente non corretto</div>";
			exit;
		} else {
			if (password_verify($password, $row["password"])) {
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['email'] = $row["mail"];
					$_SESSION["logged"] = true;
					echo "login con successo";
			} else {
				echo "<div id='errorslogin'>La password inserita non è corretta</div>";
				exit;
			}
		}
} else {
		$query2 = "SELECT mail, password, nomeutente  FROM iscritti WHERE mail = '$username' ";
		$result2 = $mysqli->query($query2);
		$row2 = $result2->fetch_assoc();
		if (!$row2) {
				echo "<div id='errorslogin'>email non corretta</div>";
				exit;
		} else {
			if (password_verify($password, $row["password"])) {
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['email'] = $row["email"];
					$_SESSION["logged"] =true;
					echo "login con successo";
			} else {
				echo "<div id='errorslogin'>La password inserita non è corretta</div>";
				exit;
			}
		}
}
?>
