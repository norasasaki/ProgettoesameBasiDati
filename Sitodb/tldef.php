<?php
require 'connessionedb.php';
session_start();

if (isset($_REQUEST["idb"]) ){
		$idblog = $_REQUEST["idb"];
		
		if (isset($_SESSION['contatore'])){
			$_SESSION['contatore'] = $_SESSION['contatore'] + 5;
		} else {
			$_SESSION['contatore'] = 0;
		};
		$contatore = $_SESSION['contatore'];
		$query2 = "SELECT * FROM post WHERE IDBlog = '$idblog' ORDER by ID DESC LIMIT 5 OFFSET $contatore";
		$result2 = $mysqli->query($query2);
		if ($result2->num_rows > 0) {
				while ($row2 = $result2->fetch_assoc()){
					
				?> 
				<div class = "conteiner">
					<div class="Post" id="<?php echo $row2["ID"]; ?>">
						<div class="titolo"><?php echo $row2["titolo"]; ?> </div> 
						<div class="testo" style="color:<?php echo $row2["colore"];?>" > 
						<?php
							$path= "uploads/$idblog/posts/";
							$postsident = $row2["ID"];
							$queryprendi = "SELECT * FROM haimg WHERE ID = '$postsident'";
							$risultprendi = $mysqli->query($queryprendi);
							$numbers = $risultprendi->num_rows;
							if ($numbers == 0){
								$styletext = " width:100%; display:block;";
							}
							if ($risultprendi->num_rows > 0) {
								if ($numbers == 2 ){
									$imgstyle = "width:20%; object-fit:cover; height:200px; display:inline-flex; margin-left:3%;";
									$styletext = " margin:auto; width:100%; display:inline-table; margin-top:3%;";
								} else if ($numbers == 3 ){
									$imgstyle = "width:20%; object-fit:cover; height:200px; display:inline-flex; margin-left:3%; margin-right:3%;";
									$styletext = " margin:auto; width:100%; display:inline-table; margin-top:3%;";
								} else {
									$imgstyle = "";
									$styletext = " ";
								}
								while ($rowimg = $risultprendi->fetch_assoc()){
										$codeimg = $rowimg["IDimg"];
										$queryprendi2 = "SELECT * FROM immagini WHERE IDimg = '$codeimg'";
										$risultprendi2 = $mysqli->query($queryprendi2);
										while ($rowimg2 = $risultprendi2->fetch_assoc()){
						?>
									<img id="immaginee" src="<?php echo $path.$rowimg2["CodeIMG"]; ?>" style="<?php echo $imgstyle; ?>"> 
						<?php      
								}
							}
						}
						?>
						<p class="ActualParagraphs"  style="color:<?php echo $row2["colore"];?>; <?php echo $styletext;?>"> <?php echo $row2["testo"]; ?> 
						</p>
						</div>
							<div class="ora"> <?php echo $row2["ora"]; ?>  </div>
							<div class="autorepost"> by  &nbsp; <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $row2["Scrittore"]; ?>"><?php echo $row2["Scrittore"]; ?></a>   </div>
							<?php
					if (isset($_SESSION['username'])) {
						if ($row2["Scrittore"] == $_SESSION['username']){
					?> 
						<input  type = "button" id = "cancellapost" value = "cancella post" class="btn btn-outline-success my-2 my-sm-0">
					<?php
						}
					}
					?>
						<input  type = "button" id = "commenti" value = "Commenti" class="btn btn-outline-success my-2 my-sm-0">
					</div>
				</div>
				
		<?php
				} 
			?>
			<br>
			<input type = "button" id = "ancorablog" value = "ALTRI POST" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto; />
			<?php
		} else{
			unset($_SESSION['contatore']);
			echo "Non ci sono più post";
		};
} else {

	if (isset($_SESSION['numero'])){
		$_SESSION['numero'] = $_SESSION['numero'] + 5;
	} else {
		$_SESSION['numero'] = 0;
	};
	$contatore = $_SESSION['numero']; 
	$query2 = "SELECT * FROM post ORDER by ID DESC LIMIT 5 OFFSET $contatore";
	$result2 = $mysqli->query($query2);
	if ($result2->num_rows > 0) {
			while ($row2 = $result2->fetch_assoc()){
				$idblogpost = $row2["IDBlog"];
				$querynameB = "SELECT nome FROM blog WHERE IDBlog = '$idblogpost'";
				$resultnameB = $mysqli->query($querynameB);
				$nameB = $resultnameB->fetch_assoc();
			?>
			<head>		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="generalstyle1.css" /></head>
				<div class = "conteiner" id="conteinerhome">
					<div class="Post" id="<?php echo $row2["ID"]; ?>">
						<div class="PostTitle" ><?php echo $row2["titolo"]; ?> </div>
						<div class="ActualPost" style="text-align:center">
						<?php
							$path= "uploads/$idblogpost/posts/";
							$postsident = $row2["ID"];
							$queryprendi = "SELECT * FROM haimg WHERE ID = '$postsident'";
							$risultprendi = $mysqli->query($queryprendi);
							$numbers = $risultprendi->num_rows;
							if ($numbers == 0){
								$styletext = " width:100%; display:block;";
							}
							if ($risultprendi->num_rows > 0) {
								if ($numbers == 2 ){
									$imgstyle = "width:20%; object-fit:cover; height:200px; display:inline-flex; margin-left:3%;";
									$styletext = " margin:auto; width:100%; display:inline-table; margin-top:3%;";
								} else if ($numbers == 3 ){
									$imgstyle = "width:20%; object-fit:cover; height:200px; display:inline-flex; margin-left:10%;";
									$styletext = " margin:auto; width:100%; display:inline-table; margin-top:3%;";
								} else {
									$imgstyle = "";
									$styletext = " ";
								}
								while ($rowimg = $risultprendi->fetch_assoc()){
										$codeimg = $rowimg["IDimg"];
										$queryprendi2 = "SELECT * FROM immagini WHERE IDimg = '$codeimg'";
										$risultprendi2 = $mysqli->query($queryprendi2);
										while ($rowimg2 = $risultprendi2->fetch_assoc()){
						?>
									<img id="immaginee" src="<?php echo $path.$rowimg2["CodeIMG"]; ?>" style="<?php echo $imgstyle; ?>"> 
						<?php      
								}
							}
						}
						?>
						<p class="ActualParagraphs"  style="color:<?php echo $row2["colore"];?>; <?php echo $styletext;?>"> <?php echo $row2["testo"]; ?>
						</p>
						</div>
						<div class="ifonsposts">
							<div class="ora">  <?php echo $row2["ora"]; ?> </div>
							<div class="autorepost"> by  &nbsp;  <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $row2["Scrittore"]; ?>"><?php echo $row2["Scrittore"]; ?></a>  </div>
							<div class="nomeblogp"> in  &nbsp;  <a href="/Sitodb/Pagina Blog.php?idblog=<?php echo $idblogpost; ?>"><?php echo $nameB["nome"] ?></a>  </div>
						</div>
					<?php
					if (isset($_SESSION['username'])) {
						if ($row2["Scrittore"] == $_SESSION['username']){
					?> 
							<input  type = "button" id = "cancellapost" value = "cancella post" class="btn btn-outline-success my-2 my-sm-0" >
					<?php
						}
					}
					?>
							<input  type = "button" id = "commenti" value = "Commenti" class="btn btn-outline-success my-2 my-sm-0" style="float:none;">
					</div>
				</div>
				<?php
					} 
			?> 
			<br>
			<input type = "button" id = "ancora" value = "ALTRI POST" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto;">
			<?php
	} else{
		echo " <div id=\"finitipost\" > Non ci sono altri post </div> <br> ";
	};
	

}
?>