<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Pagine blog2</title>
      <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="generalstyle1.css" /> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
	require 'connessionedb.php';
	$idblog = $_REQUEST["idblog"];
	$pathimgb = "uploads/$idblog/";
	$querytemi = "SELECT * FROM temi WHERE IDBlog = '$idblog'"; 
	$resulttemi = $mysqli->query($querytemi);
	$rowtemi = $resulttemi->fetch_assoc();
	session_start();
?>
<style>
  body {background-image: url('<?php echo $pathimgb.$rowtemi["sfondo"]; ?>');
		background-size: cover;}
</style>


<script type = "text/javascript" src="controlloiniziale.js"></script> <!-- fa il controllo del login -->
<script type = "text/javascript" src="loginlogout.js"></script> <!-- fgestisce logout -->
<script type = "text/javascript" language = "javascript" src="gestoreancora.js"></script> <!--gestisce bottone ancora -->
<script type = "text/javascript" language = "javascript" src="popularitycontrol.js"></script> <!-- contatore visite -->
<script type = "text/javascript" src="gestorenuovopostdef.js"></script> <!-- gestore aggiunta new post -->
<script type = "text/javascript" src="cancelpostcomm.js"></script> <!-- gestisce cancellazione post -->
<script type = "text/javascript" src="gestorecommenti.js"> </script><!-- gestisce i commenti -->
 
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



<div id="informazioni">

	 <?php
	 if ($rowtemi["cornice"] == 1){
		 $cornice = "border-radius: 110px;";
	 } else {
		 $cornice = "border-radius: 0px;";
	 }
		$query = "SELECT header, icon, nome, Descrizione, Fondatore FROM blog WHERE IDBlog = '$idblog'"; 
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		if($row["icon"] != NULL){
			$nameiconblog = $pathimgb.$row["icon"];
		} else {
			$nameiconblog = "uploads/standard/deafulticon.png";
		}
		if($row["header"] != NULL){
			$nameheaderblog =  $pathimgb.$row["header"] ;
		} else {
			$nameheaderblog = "uploads/standard/defaultheader.jpg" ;
		}			
		
	?>	<div id="Header">
			<img style="object-fit:cover" id="headerimg" src="<?php echo $nameheaderblog; ?>">  
		</div>
		<div id="Avatarblog" style="margin-left:0%; display:inline-block;">
			<img id="avatarimg" src="<?php echo $nameiconblog; ?>" style="<?php echo $cornice ; ?>">
		</div>
		<div class="infossimbol" id="infossimbol">
		<span style="width:2%;">&#8505;</span>
		</div>
</div>


<div id="Descrizione">
	<div id= "Titolo">
		<?php echo $row["nome"]; ?>
	</div>
	<div id="descrizioneblog" class="descrizioneblog" style=" color:<?php echo $rowtemi["colorDescrizione"]; ?>" >
		<?php echo $row["Descrizione"]; ?>
	</div>
	<div id="infosblog" class="infosblog" style="display:none";>
		<div id= "autore">
			<span class="titleinfos" style="display:inline-block;">Autore:</span>
			<a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $row["Fondatore"]; ?>"><?php echo $row["Fondatore"]; ?> </a>
		</div> 

		<span class="titleinfos" id= "coautore" >Coautori:</span>
		<div>
		<?php 
		$queryfìpercoautori = " SELECT * FROM coautore WHERE IDBlog = '$idblog'";
		$resultcoautore = $mysqli->query($queryfìpercoautori);
		while ($rowcoautore = $resultcoautore->fetch_assoc()){
		?>	
			<a href="/Sitodb/Profilo Pubblico.php?nick=<?php echo $rowcoautore["NomeCoAutore"]; ?>"> &#62; <?php echo $rowcoautore["NomeCoAutore"]; ?> </a>
			<br>
		<?php 	
		}
		?>
		</div>
		<span class="titleinfos" id="argomentis" >Argomenti:</span>
		<div>
		<?php 
		$queryargomentis = " SELECT * FROM trattadi WHERE IDBlog = '$idblog'";
		$resultargomentis = $mysqli->query($queryargomentis);
		while ($rowargomentis = $resultargomentis->fetch_assoc()){
		?>
			<div class ="trattadiarg" style="display:inline-block;"> 
				<a class="argomentotratta" href="/Sitodb/cerca.php?search=<?php echo $rowargomentis["argomento"]; ?>"><?php echo $rowargomentis["argomento"]; ?></a>
			</div>
		<?php
		}
		?>
	
		</div>
	</div>
	
</div>

<div id="barriera">
	<div id="Posts">
	</div>	
	<input type = "button" id = "ancorablog" value = "ALTRI POST" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto;" />
</div>
<div id="Footer" style="margin-top:2%">
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
