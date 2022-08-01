<!doctype html>
<html lang="IT">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Slick Carousel CSS-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
    <!-- Custom CSS -->
<link rel="stylesheet" href="generalstyle1.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="controlloiniziale.js"></script> <!-- fa il controllo del login -->
<script type="text/javascript" src="loginlogout.js"></script> <!-- fgestisce logout -->
<script type = "text/javascript" src="gestorecommenti.js"> </script><!-- gestisce i commenti -->
<script type = "text/javascript" src="cancelpostcomm.js"></script> <!-- gestisce cancellazione post & commenti-->


<style>
.avatarU {max-width: 50px;border-radius: 40px;}
.nomeU {display: inline;}
h3 {
	font-family: Jost;
    text-align: center;
    margin-top: 5px;
}
</style>

<title>Tunglr</title>
 <?php
		require 'connessionedb.php';
		session_start();
		$testo = $_GET['search'];
?>
</head>

  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="MainNav">
	<a class="navbar-brand" href="/Sitodb/Home.php">Tunglr</a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="/Sitodb/Home.php">Home <span class="sr-only">(current)</span></a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="#Footer">About</a>
			</li>
      
			<li class="nav-item" id="refistrati!">
				<a class="nav-link" href="#Registratiform">Registrati</a>
			</li>
<!--Searchbar--> 
<nav class="navbar navbar-light bg-light">
	<form class="form-inline" method="get" action="cerca.php">
		<input class="form-control mr-sm-2" type="search" name = "search" placeholder="Esplora blog, cerca argomenti, trova utenti!" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg> Cerca </button>
	</form>
</nav>
		</ul>
				<div id="infoutente" class="infoutente"> </div>
	</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" >
      <li class="nav-item dropdown" id="togliere">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="menuforlogin">
         <form name="Login"  id="Login" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg> Username</label>
    <input type="text" class="form-control" id="EmailLogin" aria-describedby="emailHelp" placeholder="username" name="EmailLogin">
    <small id="emailHelp" class="form-text text-muted">Puoi anche usare il tuo indirizzo e-mail</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg> Password</label>
    <input type="password" class="form-control" id="PasswordLogin" placeholder="password" name="PasswordLogin">
  </div>
<button type= "button" id="submitlogin" class="btn btn-primary">Login</button>
</form>
        </div>
      </li>
    </ul>
  </div>
</nav>
</nav>

<h3 class="titoliricerche"> ARGOMENTI </h3>
<div id="risultatiargomenti" class="risultati">
<?php
$querycercargomento ="SELECT * FROM argomenti WHERE argomento = '$testo' OR argomento LIKE '%" . $testo . "%'";
$risultatiargomento = $mysqli->query($querycercargomento);
if($risultatiargomento->num_rows > 0) {
	while($rowargomento = $risultatiargomento->fetch_assoc()) {
			?> 
				<div>
					<div class ="part1cerca"> 
						<a class="argomenticercare" href="/Sitodb/cerca.php?search=<?php echo $rowargomento["argomento"]; ?>"><?php echo $rowargomento["argomento"]; ?></a>
					</div>
				</div>
				<?php
					}
	} else{
?>
		<div id="avviso"> NON CI SONO ARGOMENTI</div>
	<?php
	};
	
?>
</div>
 

<h3 class="titoliricerche"> BLOG </h3>
<div id="risultatiblog" class="risultati">
<?php

$querycercablog ="SELECT * FROM blog  WHERE nome LIKE '%" . $testo ."%'";
$risultatiblog = $mysqli->query($querycercablog);
if($risultatiblog->num_rows > 0) {
	while($rowblog = $risultatiblog->fetch_assoc()) {
				$idblog = $rowblog["IDBlog"];
				$pathimgpop = "uploads/$idblog/";
				if ($rowblog["icon"] !=NULL){
					$icongp = $pathimgpop.$rowblog["icon"];
				} else {
					$icongp = "uploads/standard/deafulticon.png ";
				}
				if ($rowblog["header"] !=NULL){
					$headergp = $pathimgpop.$rowblog["header"];
				} else {
					$headergp = "uploads/standard/defaultheader.jpg ";
				}
			?> 
					<div class ="part2cerca">
						<span class="iconacerca"> <img style="height:100px; width:100px;" src="<?php echo $icongp ; ?>"></span>
						<span class="headercerca"> <img style="height:100px" id="headerok" src="<?php echo $headergp; ?>"> </span>
						<h1 class="nomecerca"> <a href="/Sitodb/Pagina%20Blog.php?idblog=<?php echo $idblog; ?>"><?php echo $rowblog["nome"]; ?></a></h1>
					</div>
				<?php
					}
	} else{
?>
		<div id="avviso"> NON CI SONO BLOG</div>
	<?php
	};

	
?>
</div>	

<h3 class="titoliricerche"> UTENTI </h3>
<div id="risultatiutenti" class="risultati">
<?php
$i = 0;
if ($i = 0){
	$querycercautenti ="SELECT * FROM iscritti WHERE nomeutente = '$testo'";
	$i++;
} else {
	$querycercautenti ="SELECT * FROM iscritti WHERE nomeutente LIKE '%" . $testo . "%'";
}
$querycercautenti ="SELECT * FROM iscritti WHERE nomeutente LIKE '%" . $testo . "%'";
$risultatiutenti = $mysqli->query($querycercautenti);
if($risultatiutenti->num_rows > 0) {
	while($rowutenti = $risultatiutenti->fetch_assoc()) {
				$idutente = $rowutenti["nomeutente"];
				$pathimgut = "uploads/$idutente/";
				if ($rowutenti["Avatar"] != NULL){
					$avatarname = $pathimgut.$rowutenti["Avatar"];
				} else {
					$avatarname = "uploads/standard/deafulticon.png " ;
				}
			?> 	
				<a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $rowutenti["nomeutente"]; ?>">
					<div class ="part3cerca">
						<div class="equilibrio">
							<img class="avatarU" src="<?php echo $avatarname; ?>"  >
							<h1 class="nomecercab"> <a href="/Sitodb/Profilo%20Pubblico.php?nick=<?php echo $rowutenti["nomeutente"]; ?>"><?php echo $rowutenti["nomeutente"]; ?></a> </h1>
						</div>
					</div>
				</a>
				<?php
					}
	} else{
?>
		<div id="avviso"> NON CI SONO UTENTI </div>
	<?php
	};
	
?>
</div>

<h3 class="titoliricerche"> POST </h3>
<div id="risultatipost" class="risultatib">
<?php
$querycercapost ="SELECT * FROM post WHERE titolo LIKE '%" . $testo . "%'";
$risultatipost = $mysqli->query($querycercapost);
if($risultatipost->num_rows > 0) {
	while($rowcercapost = $risultatipost->fetch_assoc()) {
				$idblogpost = $rowcercapost["IDBlog"];
				$querynameB = "SELECT nome FROM blog WHERE IDBlog = '$idblogpost'";
				$resultnameB = $mysqli->query($querynameB);
				$nameB = $resultnameB->fetch_assoc();
			?> 
				<div class = "conteiner" id="cercaposts">
					<div class="Post" id="<?php echo $rowcercapost["ID"]; ?>">
						<div class="titolo"><?php echo $rowcercapost["titolo"]; ?> </div> 
						<div class="testo" style="color:<?php echo $rowcercapost["colore"];?>" > 
						<?php
							$path= "uploads/$idblogpost/posts/";
							$postsident = $rowcercapost["ID"];
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
						<p class="ActualParagraphs"  style="color:<?php echo $rowcercapost["colore"];?>; <?php echo $styletext;?>"> <?php echo $rowcercapost["testo"]; ?> 
						</p>
						</div>
							<div class="ifonsposts">
							<div class="ora">  <?php echo $rowcercapost["ora"]; ?> </div>
							<div class="autorepost"> by  &nbsp;  <a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $rowcercapost["Scrittore"]; ?>"><?php echo $rowcercapost["Scrittore"]; ?></a>  </div>
							<div class="nomeblogp"> in  &nbsp;  <a href="/Sitodb/Pagina Blog.php?idblog=<?php echo $idblogpost; ?>"><?php echo $nameB["nome"] ?></a>  </div>
						</div>
							<?php
					if (isset($_SESSION['username'])) {
						if ($rowcercapost["Scrittore"] == $_SESSION['username']){
					?> 
						<input  type = "button" id = "cancellapost" value = "cancella post" class="btn btn-outline-success my-2 my-sm-0">
					<?php
						}
					}
					?>
						<input  type = "button" id = "commenti" value = "Commenti" class="btn btn-outline-success my-2 my-sm-0" style="float:none">
					</div>
				</div>
				
				<?php
	}
} else{
?>
		<div id="avviso"> NON CI SONO POST CHE CONTENGONO  <?php echo $testo; ?> NEL TITTOLO</div>
	<?php
	};
	
?>
</div>

<div id="Footer">
	<h1 id="FooterTitolo">About Tunglr</h1>
	<h2 id="FooterSottotitolo">Crea un profilo e dai vita a numeriso blog per qualsiasi tuo interesse! </h2>
	<h3 id="FooterSottotitolo" style="font-size: 27px; margin-top:2%;"> By Eleonora Piancatelli per il corso di "Basi di dati e laboratorio web" </h3>
	<div id="Credits" style="text-aling:center;">
		We use <a href="https://getbootstrap.com/">Bootstrap</a> 
	</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  </body>
</html>