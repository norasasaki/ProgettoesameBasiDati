<?php
require_once 'connessionedb.php';
session_start();

$idpost = $_REQUEST["idp"];
$nome = "";

if (isset($_SESSION['username'])){
		$nome = $_SESSION['username'];
?>
	<div id = "boxcommento">
		<h2 style="text-align:center; margin: 3%;"> I TUOI COMMENTI </h2>
		<div id="creatore">
		<form id ='addcomment' action = 'caricacommento.php'>
			<div class='form-group'>
				<label for='exampleFormControlTextarea1'>
					<h3>Inserisci un commento</h3>
				</label>
				<textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='iltesto'>
				</textarea>
				<br />
				<button type='button' class='btn btn-outline-secondary' id = 'aggiungicommento'>Add a Comment</button>
			</div>
		</form>
		</div>
		<br />
		<div id="tuoi">
		<?php
		$query2 = "SELECT * FROM commenti WHERE Nomeutente = '$nome' and IDPost = '$idpost'";		
		$result2 = $mysqli->query($query2);
		if ($result2->num_rows > 0){
			$pathimga = "uploads/$nome/";
			$queryme = "SELECT Avatar FROM iscritti WHERE Nomeutente = '$nome'";
			$resultme = $mysqli->query($queryme);
			$avatarme =  $resultme->fetch_assoc();
			while ($row2 = $result2->fetch_assoc()){
				if ($avatarme["Avatar"] == NULL) {
					$nameavatarme = "uploads/standard/deafulticon.png" ;
				} else {
					$nameavatarme = $pathimga.$avatarme["Avatar"];
				}
			?>
				<div class= "commentoprincipale" id="<?php echo $row2["IDComm"]; ?>">
					<div class="CommentMetadata">
						<div class="AvatarA"> <img class="avatarU"  src="<?php echo $nameavatarme; ?>" > </div>
						<div class="NomeA"> <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $row2["Nomeutente"]; ?>"><?php echo $row2["Nomeutente"]; ?></a>  </div>
					</div>
					<div class="ContenutoC">
						<div class="testo"> <?php echo $row2["testo"]; ?> </div>
					</div>
					<input  type = "button" id = "cancellacommento" value = "cancella commento" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto; font-size: 9.5pt;">
				</div>
			<?php
			}
		} else {
			echo " <div id=\"nulla\"> Non hai scritto commenti per questo post </div> ";
		}
}
?>
	</div>
	<h2 style="text-align:center; margin: 3%;" > TUTTI I COMMENTI</h2>
	<div id="dialtri">
<?php
$query1 = "SELECT * FROM commenti WHERE Nomeutente != '$nome' and IDPost = '$idpost'";
$result1 = $mysqli->query($query1);
if ($result1->num_rows > 0){
		while ($row1 = $result1->fetch_assoc()){
				$scrittore = $row1["Nomeutente"];
				$pathimgb = "uploads/$scrittore/";
				$queryscrittore = "SELECT Avatar FROM iscritti WHERE Nomeutente = '$scrittore'";
				$resultscrittore = $mysqli->query($queryscrittore);
				$avtarae =  $resultscrittore->fetch_assoc();
				if ($avtarae["Avatar"] == NULL) {
					$nomeavatar = $pathimgb.$avtarae["Avatar"];
				} else {
					$nomeavatar ="uploads/standard/deafulticon.png";
				}
			?>
			<div class= "commentoprincipale">
				<div class="CommentMetadata">
					<div class="AvatarA"> <img class="avatarU"  src="<?php echo $nomeavatar; ?>" > </div>
					<div class="NomeA"> <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $row1["Nomeutente"]; ?>"><?php echo $row1["Nomeutente"]; ?></a> </div>
				</div>
				<div class="ContenutoC">
					<div class="testo"> <?php echo $row1["testo"]; ?> </div>
				</div>
			</div>
			<?php
		}
} else {
	echo " <div id=\"nullaaltri\" > Non ci sono commenti </div> <br> ";
} ;
?>
	</div>
</div>

