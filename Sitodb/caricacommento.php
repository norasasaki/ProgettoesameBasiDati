<?php
require_once 'connessionedb.php';
session_start();
$testo = addslashes($_POST['iltesto']);
$prova = $_REQUEST["par1"];
if (isset($_SESSION['username']) ) {
		$nome = $_SESSION['username'];
		$query = "INSERT INTO commenti(testo, IDPost, Nomeutente) VALUES ('$testo','$prova','$nome')" ;
		$result = $mysqli->query($query);
		if ($result === TRUE){
			$idlastcom = $mysqli->insert_id;
			$pathimga = "uploads/$nome/";
			$queryme = "SELECT Avatar FROM iscritti WHERE Nomeutente = '$nome'";
			$resultme = $mysqli->query($queryme);
			$avatarme =  $resultme->fetch_assoc();
			?>
			<div class= "commentoprincipale" id="<?php echo $idlastcom; ?>">
				<div class="CommentMetadataBaby">
				<?php
				if ($avatarme["Avatar"] == NULL) { ?>
					<div class="AvatarA"> <img class="avatarU"  src="uploads/standard/deafulticon.png" > </div>
				<?php
				} else {
				?> 
					<div class="AvatarA"> <img class="avatarU"  src= "<?php echo $pathimga.$avatarme["Avatar"]; ?> "> </div>
				<?php
				}
				?>
					<div class="ActualCommentMetadata">ORA</div>
					<div class="NomeA"> <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $nome; ?>"><?php echo $nome; ?></a>  </div>
				</div>
				<div class="ContenutoC">
					<div class="testo"> <?php echo $testo; ?> </div>
				</div>
				<input  type = "button" id = "cancellacommento" value = "cancella commento" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto;">
			</div>
			<?php
		} else {
			echo "NON RIUSCITA";
			exit ("Errore nella query $query: " . $mysqli->error);
		}
	} 
?>