<?php
require_once 'connessionedb.php';
session_start();

$titolo = addslashes($_POST['nuovotitolo']);
$testo = addslashes($_POST['nuovopost']);
$idblog = $_POST["par1"];
$img1 = $_FILES['immagine1'];
$img2 = $_FILES['immagine2']; 
$img3 = $_FILES['immagine3'];
$color1 = $_POST['colorscritta'];

$error = "";

if (isset($_SESSION['username']) ) {
		$nome = $_SESSION['username'];
		$timestamp = date("Y-m-d H:i:s");
		$query1 = "INSERT INTO post(testo, titolo, IDBlog, Scrittore, ora) VALUES ('$testo','$titolo', '$idblog','$nome', '$timestamp')";
		$result1 = $mysqli->query($query1);
		if (!$result1){
			echo "Impossibile aggiungere il post" ;
			exit;
		} else {
			$lastresult = $mysqli->insert_id;
			if (!file_exists("uploads/$idblog/posts")){
				mkdir("uploads/$idblog/posts");
			}
			$uploaddir = "uploads/$idblog/posts/";
				// aggiunge le immagini 
			$immagine1 = basename($_FILES['immagine1']['name']);
			$immagine2 = basename($_FILES['immagine2']['name']);
			$immagine3 = basename($_FILES['immagine3']['name']);
			$uploadfile1 = $uploaddir . basename($_FILES['immagine1']['name']);
			$uploadfile2 = $uploaddir . basename($_FILES['immagine2']['name']);
			$uploadfile3 = $uploaddir . basename($_FILES['immagine3']['name']);
			$uploadOk = 1;
			$imageFileType1 = strtolower(pathinfo($uploadfile1,PATHINFO_EXTENSION));
			$imageFileType2 = strtolower(pathinfo($uploadfile2,PATHINFO_EXTENSION));
			$imageFileType3 = strtolower(pathinfo($uploadfile3,PATHINFO_EXTENSION));
	//controlli 1
			if ($_FILES['immagine1']['name']!=""){
				$check1 = getimagesize($_FILES["immagine1"]["tmp_name"]);
				if($check1 !== false) {
					$uploadOk = 1;
				} else {
					$uploadOk = 0;
				}
				if ($_FILES["immagine1"]["size"] > 1000000) {
					global $error;
					$error .= "Il file 1 è troppo grande \n";
					$uploadOk = 0;
				}
				if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" 	&& $imageFileType1 != "gif" ) {
					global $error;
					$error .= "formato immagine 1 non corretto permessi solo JPG, JPEG, PNG & GIF.\n";
					$uploadOk = 0;
				}
			}
	//controlli 2
			if($_FILES['immagine2']['name']!="") {
				$check2 = getimagesize($_FILES["immagine2"]["tmp_name"]);
				if($check2 !== false) {
					$uploadOk = 1;
				} else {
					$uploadOk = 0;
				}
				if ($_FILES["immagine2"]["size"] > 1000000) {
					global $error;
					$error .= "Il file 2 è troppo grande";
					$uploadOk = 0;
				}
				if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" 	&& $imageFileType2 != "gif" ) {
					global $error;
					$error .= "formato immagine 2 non corretto permessi solo JPG, JPEG, PNG & GIF . \n";
					$uploadOk = 0;
				}
			}
	//controllo 3
				if($_FILES['immagine3']['name']!="") {
					$check2 = getimagesize($_FILES["immagine3"]["tmp_name"]);
					if($check2 !== false) {
						$uploadOk = 1;
					} else {
						$uploadOk = 0;
					}
					if ($_FILES["immagine3"]["size"] > 1000000) {
							global $error;
							$error .=  "Il file 3 è troppo grande \n";
							$uploadOk = 0;
					}
					if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" 	&& $imageFileType3 != "gif" ) {
						global $error;
						$error .=  "formato immagine 3 non corretto permessi solo  JPG, JPEG, PNG & GIF. \n";
						$uploadOk = 0;
					}
				}
	
			if ($uploadOk == 1) {
					$img1 = basename($_FILES['immagine1']['name']);
					$img2 = basename($_FILES['immagine2']['name']);
					$img3 = basename($_FILES['immagine3']['name']);
					
				if ($_FILES['immagine1']['name']!="" ){
					if (move_uploaded_file($_FILES['immagine1']['tmp_name'], $uploadfile1) ) {
						$queryeimg = "INSERT INTO immagini (CodeIMG) VALUES('$img1')";
						$status2 = $mysqli->query($queryeimg);
						if (!($status2 === true)){
							global $error;
							$error .=  "Impossibile caricare immagine 1 \n";
							$uploadOk = 0;
						} else {
							$lastid1 = $mysqli->insert_id;
							$queryeimgb = "INSERT INTO haimg (ID, IDimg) VALUES('$lastresult','$lastid1')";
							$statusb = $mysqli->query($queryeimgb);
							if (!($statusb === true)) {
								global $error;
								$error .=  "impossibile caricare immagine 1 \n";
								$querycancell1 = "DELETE FROM immagini WHERE IDimg = '$lastid1' "; 
								$result1 = $mysqli->query($querycancell1);
								if ($result1){
									$querycancell2 = "DELETE FROM post WHERE ID = '$lastresult' "; 
									$result2 = $mysqli->query($querycancell2);
									if ($result2){
										echo "<div id=\"errorsvari\">". $error."<div>";
										exit;
									}
								} 
							}
						}
					} else {
						global $error;
						$error .=  "Impossibile caricare le immagine 1 \n";
						$uploadOk = 0;
					}
				}
				if ($_FILES['immagine2']['name']!="" ){
					if (move_uploaded_file($_FILES['immagine2']['tmp_name'], $uploadfile2) ) {
						$queryeimgb = "INSERT INTO immagini (CodeIMG) VALUES('$img2')";
						$status2b = $mysqli->query($queryeimgb);
						if (!($status2b === true)){
							global $error;
							$error .=  "Impossibile caricare immagine 2 \n";
							$uploadOk = 0;
						} else {
							$lastid2 = $mysqli->insert_id;
							$queryeimgb2 = "INSERT INTO haimg (ID, IDimg) VALUES('$lastresult','$lastid2')";
							$status2c = $mysqli->query($queryeimgb2);
							if (!($status2c === true)) {
								global $error;
								$error .=  "impossibile caricare immagine 2 \n";
								$querycancell1 = "DELETE FROM immagini WHERE IDimg = '$lastid1' "; 
								$result1 = $mysqli->query($querycancell1);
								if ($result1){
									$querycancell2 = "DELETE FROM post WHERE ID = '$lastresult' "; 
									$result2 = $mysqli->query($querycancell2);
									if ($result2){
										echo "<div id=\"errorsvari\">". $error."<div>";
										exit;
									}
								} 
							}
						}
					} else {
						global $error;
						$error .=  "Impossibile caricare immagine 2 \n";
						$uploadOk = 0;
					}
				}
			
				if ($_FILES['immagine3']['name']!="" ){
					if (move_uploaded_file($_FILES['immagine3']['tmp_name'], $uploadfile3) ) {
						$queryeimgc = "INSERT INTO immagini (CodeIMG) VALUES('$img3')";
						$status3 = $mysqli->query($queryeimgc);
						if (!($status3 === true)){
							global $error;
							$error .=  " impossibile caricare l'immagine 3 \n";
							$uploadOk = 0;
						} else {
							$lastid3 = $mysqli->insert_id;
							$queryeimgc2 = "INSERT INTO haimg (ID, IDimg) VALUES('$lastresult','$lastid3')";
							$status32 = $mysqli->query($queryeimgc2);
							if (!($status32 === true)) {
								global $error;
								$error .=  "impossibile caricare immagine 3 \n";
								$querycancell1 = "DELETE FROM immagini WHERE IDimg = '$lastid1' "; 
								$result1 = $mysqli->query($querycancell1);
								if ($result1){
									$querycancell2 = "DELETE FROM post WHERE ID = '$lastresult' "; 
									$result2 = $mysqli->query($querycancell2);
									if ($result2){
										echo "<div id=\"errorsvari\">". $error."<div>";
										exit;
									}
								} 
							}
						}
					} else {
						global $error;
						$error .=  "Impossibile caricare immagine 3 \n";
						$uploadOk = 0;
					}
				}
				if ($uploadOk == 0 ){
					$querycancell2 = "DELETE FROM post WHERE ID = '$lastresult' "; 
					$result2 = $mysqli->query($querycancell2);
					if ($result2){
							echo "<div id=\"errorsvari\">". $error."<div>";
							exit;
					}
				}
				
			} else {
				$querycancell2 = "DELETE FROM post WHERE ID = '$lastresult' "; 
				$result2 = $mysqli->query($querycancell2);
				if ($result2){
					echo "<div id=\"errorsvari\">". $error."<div>";
					exit;
				} 
			}
			
			if ($color1) {
				$querycolor1 = "UPDATE post SET colore = '$color1' WHERE ID = '$lastresult'";
				$resultcolor1 = $mysqli->query($querycolor1);
				if (!($resultcolor1)) {
					global $error;
					$error .= "impossibile aggiungere il colore \n";
					echo "<div id=\"errorsvari\">". $error."<div>";
					exit;
				}
			}
			
			
			
			
			$path= "uploads/$idblog/posts/";
			$querypostsdata = "SELECT * FROM post WHERE ID = '$lastresult'";
			$resultpostdata = $mysqli->query($querypostsdata);
			if ($resultpostdata->num_rows > 0) {
				while ($rowpostsd = $resultpostdata->fetch_assoc()){
			?>
			<div class="conteiner">
				<div class="Post">
					<div class="titolo" ><?php echo $rowpostsd["titolo"]; ?> </div> 
					<div class="testo" >
					<?php
					$queryprendi = "SELECT * FROM haimg WHERE ID = '$lastresult'";
					$risultprendi = $mysqli->query($queryprendi);
					$numbers = $risultprendi->num_rows;
					if ($numbers == 0){
						$styletext = " width:100%; display:block;";
					}
					if ($risultprendi->num_rows > 0) {
							if ($numbers == 2 ){
								$imgstyle = "width:45%; object-fit:cover; height:300px; display:inline-flex; margin-left:3%;";
								$styletext = " margin:auto; width:100%; display:inline-table; margin-top:3%;";
							} else if ($numbers == 3 ){
								$imgstyle = "width:25%; object-fit:cover; height:150px; display:inline-flex; margin-left:4%;";
								$styletext = " margin:auto; width:100%; display:inline-table; margin-top:3%;";
							} else {
								$imgstyle = "";
								$styletext = " ";
							}
							while ($row = $risultprendi->fetch_assoc()){
								$codeimg = $row["IDimg"];
								$queryprendi2 = "SELECT * FROM immagini WHERE IDimg = '$codeimg'";
								$risultprendi2 = $mysqli->query($queryprendi2);
								while ($row2 = $risultprendi2->fetch_assoc()){
					?>
									<img id="immaginee" src="<?php echo $path.$row2["CodeIMG"]; ?>" style="<?php echo $imgstyle; ?>"> 
					<?php      
								}
							}
					}
					?>
					<p class="ActualParagraphs"  style="color:<?php echo $rowpostsd["colore"];?>; <?php echo $styletext;?>"> <?php echo $rowpostsd["testo"]; ?>
					</p>
					</div>
					<div class="ora"> <?php echo $rowpostsd["ora"]; ?>  </div>
					<div class="autorepost"> by  &nbsp; <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $rowpostsd["Scrittore"]; ?>"><?php echo $rowpostsd["Scrittore"]; ?></a>   </div>
					<?php
					if (isset($_SESSION['username'])) {
						if ($rowpostsd["Scrittore"] == $_SESSION['username']){
					?> 
						<input  type = "button" id = "cancellapost" value = "cancella post" class="btn btn-outline-success my-2 my-sm-0">
					<?php
						}
					}
					?>
			</div>
		<div>
			<?php
				}
			}
			
		}
}

?>