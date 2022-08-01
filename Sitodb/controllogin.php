<?php
require_once 'connessionedb.php';
session_start();
if (isset ($_SESSION['password']) && $_SESSION["logged"] = true) {
	if (isset($_SESSION['username']) ) {
		$dato = $_SESSION['username'];
		$query = "SELECT nomeutente, Avatar FROM iscritti WHERE nomeutente = '$dato' ";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		$pathimg = "uploads/$dato/";
		if ($row){ 
		?>
			<button id="menuutente" class="menuutente">
				<?php
				if ($row["Avatar"] == NULL) { ?>
					<img class="avatarU"  src="uploads/standard/deafulticon.png" > 
				<?php
				} else {
				?> 
					<img class="avatarU"  src= "<?php echo $pathimg.$row["Avatar"]; ?> ">
				<?php
				}
				?> 
					<div class="nomeU"> <?php echo $row["nomeutente"]; ?>  </div>
					<svg width="14" height="14" viewBox="0 0 15 9" fill="var(--transparent-white-65)" style="transform: rotate(0deg);"><path d="M2.498 1.045a1.026 1.026 0 0 0-1.446.005 1.027 1.027 0 0 0 0 1.454l5.839 5.45a1.023 1.023 0 0 0 .83.29c-.017.004.02.006.057.006.27 0 .53-.106.726-.3l5.828-5.44a1.029 1.029 0 1 0-1.448-1.46l-5.19 4.845-5.196-4.85z"></path></svg> 
			</button>
			<div id="funzionalità" class="funzionalità">
					<a class="contenutomenuu"  href="/Sitodb/Schermata Utente.php"> SETTING</a>
					<a  class="contenutomenuu" href="/Sitodb/Schermata Utente.php #seconda" > SETTING BLOG</a>
					<a class="contenutomenuu" href="/Sitodb/Schermata Utente.php #terza" > NUOVO BLOG</a>
					<input class="contenutomenuu" type = "button" id = "out" value = "OUT" />
			</div>
		<?php
		}
	} else if (isset($_SESSION['email'])){
		$dato2 = $_SESSION['email'];
		$query2 = "SELECT nomeutente, Avatar FROM iscritti WHERE mail = '$dato2' ";
		$result2 = $mysqli->query($query2);
		$row2 = $result2->fetch_assoc();
		if ($row2){ ?>
				<img class="avatarU"  src= "<?php echo $row["Avatar"]; ?> ">
				<div class="nomeU"> <?php echo $row["nomeutente"]; ?>  </div>
				<button id="out" width="1%"> OUT </div>
		<?php
		}
	}
	unset($_SESSION['numero']);
} else {
	echo "non sei loggato";
}
?>