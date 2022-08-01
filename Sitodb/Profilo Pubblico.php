<!DOCTYPE html>
<html lang="it">
<head>
  <title>Profilo Pubblico</title>
  <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="generalstyle1.css" />
 
<script type = "text/javascript"
 src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/
jquery.min.js">
 </script>
 <?php
	require 'connessionedb.php';
	$utente = $_REQUEST["nick"];
	$pathimg = "uploads/$utente/";
?>

<script src="controlloiniziale.js"></script> <!-- fa il controllo del login -->
<script src="loginlogout.js"></script> <!-- fgestisce logout -->

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


  <div class="centrale" id="centrale"> 
	<div id="baricentro">
		<div id="Sinistra" class="Sinistra">
			<div id="testa">
			<?php
				$query = "SELECT nomeutente, mail, numerotelefono, Avatar FROM iscritti WHERE nomeutente = '$utente'";
				$result = $mysqli->query($query);
				$row = $result->fetch_assoc();
				if ($row["Avatar"] != NULL){
					$avatarname = $pathimg.$row["Avatar"];
				} else {
					$avatarname = "uploads/standard/deafulticon.png " ;
				}
				$queryA = "SELECT * FROM blog WHERE Fondatore = '$utente'";
				$resultA = $mysqli->query($queryA);
				$numero = $resultA->num_rows;
				$queryB = "SELECT * FROM coautore WHERE NomeCoAutore = '$utente'";
				$resultB = $mysqli->query($queryB);
				$numeroB = $resultB->num_rows;
				$queryC = "SELECT * FROM post WHERE Scrittore = '$utente'";
				$resultC = $mysqli->query($queryC);
				$numeroC = $resultC->num_rows;
				?>
				<div id="Avatar" class="Avatar"> <img style="width:100%" id="immagineavatarUT"  src= "<?php echo $avatarname; ?> "> </div>
				<div id="NomeUtente" name="nomeutente"> <?php echo $row["nomeutente"]; ?> </div>
			</div>
			<br>
			<div id="base">
				<h4> Statistiche</h4>
				<div id="2" class="others" style="text-align:center;"> Numero Blog Fondati:
					<span id="NumBlog" > <?php echo $numero; ?></span>
				</div>
				<div id="3" class="others" style="text-align:center;"> Numero Blog Cogestiti:
					<span id="NumbBlogC"> <?php echo $numeroB; ?></span>
				</div>
				<div id="4" class="others" style="text-align:center;"> Numero Post:
					<span id="NumbPost"> <?php echo $numeroC; ?></span>
				</div>
			</div>
		</div>
  
		<div id="Destra" class="Destra">
			<h4> BLOG CREATI</h4>
			<div id="Blogcreati" class="others" >
			<?php
				$query1 = "SELECT * FROM blog WHERE Fondatore = '$utente'";
				$result1 = $mysqli->query($query1);
				if ($result->num_rows > 0) {
					while ($row1 = $result1->fetch_assoc()){
						$codeb = $row1["IDBlog"];
						$pathimgBlog = "uploads/$codeb/";
						if($row1["header"] != NULL){
							$nomeheader = $pathimgBlog.$row1["header"] ;
						} else {
							$nomeheader = "uploads/standard/defaultheader.jpg" ;
						}
						if($row1["icon"] != NULL){
							$nomeicon = $pathimgBlog.$row1["icon"] ;
						} else {
							$nomeicon = "uploads/standard/deafulticon.png" ;
						}
				?>
				<a href="/Sitodb/Pagina Blog.php?idblog=<?php echo $codeb; ?>">
				<div class="fondato">
						<span class="icona"> <img id="iconaok" src="<?php echo $nomeicon; ?> "> </span>
						<span class="header"> <img id="headerok" src="<?php echo $nomeheader; ?>"> </span>
						<span class="title">  <?php echo $row1["nome"]; ?> </span>
				</div>
				</a>
				<br>
			<?php
				}
			} else {
			?>
					<p style="text-align: center;"> Non ci sono blog gestiti</p>
			<?php
			}
			?>
			</div>
			<br>
			<h4> BLOG Gestiti</h4>
			<div id="Bloggestiti" class="others" >
			<?php
				$query2 = "SELECT IDBlog FROM coautore WHERE NomeCoAutore = '$utente'";
				$result2 = $mysqli->query($query2);
				if ($result2->num_rows > 0) {
					while ($row2 = $result2->fetch_assoc()){
						$bloggestito = $row2["IDBlog"];
						$queryb = "SELECT * FROM blog WHERE IDBlog = '$bloggestito'";
						$resultb = $mysqli->query($queryb);
						while ($rowb = $resultb->fetch_assoc()){
							$codec = $rowb["IDBlog"];
							$pathimgGest = "uploads/$codec/";
							if($rowb["header"] != NULL){
								$nomeheader2 = $pathimgGest.$rowb["header"] ;
							} else {
								$nomeheader2 = "uploads/standard/defaultheader.jpg" ;
							}
							if($rowb["icon"] != NULL){
								$nomeicon2 = $pathimgGest.$rowb["icon"] ;
							} else {
								$nomeicon2 = "uploads/standard/deafulticon.png" ;
							}
				?>
							<a href="/Sitodb/Pagina Blog.php?idblog=<?php echo $bloggestito; ?>">
							<div class="gestito">
									<span class="icona"><img id="iconaok" src="<?php echo $nomeicon2 ; ?> ">  </span>
									<span class="header"> <img id="headerok" src="<?php echo $nomeheader2; ?>"></span>
									<span class="title"> <?php echo $rowb["nome"]; ?> </span>
							</div>
							</a>
							<br>
			<?php
						}
					} 
				} else {
			?>
					<p style="text-align: center;"> Non ci sono blog gestiti</p>
			<?php
				}
			?>
			</div>
			<div id="Commenti" class="others">
<!-- qui direi di mettere nel caso tipo solo casella bianca con commento e sopra link a che post si riferisce --> 
				<span class="scritto"></span>
			</div>
		</div>
	</div>
</div>

<div id="Footer">
	<h1 id="FooterTitolo">About Tunglr</h1>
	<h2 id="FooterSottotitolo">Crea un profilo e dai vita a numeriso blog per qualsiasi tuo interesse! </h2>
	<h3 id="FooterSottotitolo" style="font-size: 27px; margin-top:2%;"> By Eleonora Piancatelli per il corso di "Basi di dati e laboratorio web" </h3>
	<div id="Credits" style="text-aling:center;">
		We use <a href="https://getbootstrap.com/">Bootstrap</a> 
	</div>
</div>
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>