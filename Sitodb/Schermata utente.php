<!DOCTYPE html>
<html lang="it">
<head>
  <title>Schermata Utente</title>
  <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="schermatautente.css" />
	<link rel="stylesheet" href="generalstyle1.css" />
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

 <?php
	require 'connessionedb.php';
	session_start();
?>
<script type = "text/javascript" src="controlloiniziale.js"></script> <!-- fa il controllo del login -->
<script type = "text/javascript" src="loginlogout.js"></script> <!-- gestisce logout -->
<!-- gestisce i bottoni per le modificche e i due di cancellazione: fa apparire i form e i control -->
<script type = "text/javascript" src="bottonimodificheC.js"></script> 
<script type = "text/javascript" src="gestorecreablog.js"></script> <!-- gestisce il creatore nuovo blog -->
<script type = "text/javascript" language = "javascript" src="gestoremodifiche.js"></script> <!-- gestisce scelta blog e i pulsanti delle opzioni-->

 
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

<div id="avvisiok"></div>

<h2 class="SectionTitles" > Gestisci Account</h2>
 <div id="prima" class="centrale">
  <div class="sinistra">
  	<ul>
		<li> <button id="cambianome" class="cambiamenti btn btn-outline-success my-2 my-sm-0"> Cambia Nome Utente</button> </li>
		<li> <button id="cambiapassword" class="cambiamenti btn btn-outline-success my-2 my-sm-0" > Cambia Password</button> </li>
		<li> <button id="cambiaEmail" class="cambiamenti btn btn-outline-success my-2 my-sm-0" > Cambia Indirizzo E-mail </button> </li>
		<li> <button id="cambiavatar" class="cambiamenti btn btn-outline-success my-2 my-sm-0" > Cambia Avatar</button> </li>
		<li> <button id="cancellautente" class="cambiamenti btn btn-outline-success my-2 my-sm-0" > Cancella l'attuale account utente</button> </li>
	</ul>
  </div>
  <div class="destra">
	<form id="forms" class ="form-control mr-sm-2" action= "modificheaccount.php" method="post" enctype="multipart/form-data"> </form>
  </div>
 </div>
<h2 class="SectionTitles"> Gestisci Blog</h2>
 <div id="seconda" class="centrale"> <br/>
 <div id="tuoiblog">
  <h3 class="SectionTitles"> Seleziona i tuoi blog</h2>
 	<div>
	<button  id ="scegli" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto;"> <div id="materiale">Scegli</div> <svg width="14" height="14" viewBox="0 0 15 9" fill="var(--transparent-white-65)" style="transform: rotate(0deg);"><path d="M2.498 1.045a1.026 1.026 0 0 0-1.446.005 1.027 1.027 0 0 0 0 1.454l5.839 5.45a1.023 1.023 0 0 0 .83.29c-.017.004.02.006.057.006.27 0 .53-.106.726-.3l5.828-5.44a1.029 1.029 0 1 0-1.448-1.46l-5.19 4.845-5.196-4.85z"></path></svg> </button>
	<div id="fondato">
<?php
		$nome = $_SESSION['username'];
		$queryA = "SELECT * FROM blog WHERE Fondatore = '$nome'";
		$resultA = $mysqli->query($queryA);
		if ($resultA->num_rows > 0) {
				while ($rowA = $resultA->fetch_assoc()){
					$codeb = $rowA["IDBlog"];
					$pathimgBlog = "uploads/$codeb/";
					if ($rowA["icon"] != NULL) {
			?>
				<div class= "blog" id = "<?php echo $rowA["IDBlog"]; ?>" >
					<span class="avatarU"> <img id="iconaok" src="<?php echo $pathimgBlog.$rowA["icon"]; ?> "> </span>
					<span class="title">  <?php echo $rowA["nome"]; ?> </span>
				</div>
			<?php
				} else {
					?>
			
				<div class="blog" id = <?php echo $rowA["IDBlog"]; ?> >
					<span class="avatarU"> <img id="iconaok" src="uploads/standard/deafulticon.png"> </span>
					<span class="title">  <?php echo $rowA["nome"]; ?> </span>
				</div>
			<?php
				}
			}
	} else {
	?>
		
		<div id="avviso"> NON HAI CREATO BLOG</div>
	<?php
	}
?>
		</div>
	</div>
</div>
 
  <div class="sinistra">
	<ul>
		<li> <button id="cambiatitolo" class="btn btn-outline-success my-2 my-sm-0"> Cambia Titolo</button> </li>
		<li> <button id="cambiabio" class="btn btn-outline-success my-2 my-sm-0"> Cambia Descrizione</button> </li>
		<li> <button id="gestionecoautori" class="btn btn-outline-success my-2 my-sm-0"> Gestione Coautori</button> </li>
		<li> <button id="gestioneargomenti" class="btn btn-outline-success my-2 my-sm-0"> Gestione Argomenti</button> </li>
		<li> <button id="cancellablog" class="btn btn-outline-success my-2 my-sm-0"> Cancella Blog Selezionato</button> </li>
		<li> GRAFICA </li>
		<li> <button id="cambiaheader" class="btn btn-outline-success my-2 my-sm-0"> Cambia Header</button> </li>
		<li> <button id="cambiaicon" class="btn btn-outline-success my-2 my-sm-0"> Cambia Icon </button> </li>
		<li> <button id="cambiacornice" class="btn btn-outline-success my-2 my-sm-0"> Cambia Froma Icon </button> </li>
		<li> <button id="cambiacolore" class="btn btn-outline-success my-2 my-sm-0"> Cambia Colore Descrizione </button> </li>		
		<li> <button id="cambiasfondo" class="btn btn-outline-success my-2 my-sm-0"> Cambia Sfondo</button> </li>
	</ul>
  </div>
  <div class="destra">
	<form id="forms2" class ="form-control mr-sm-2" method="post" enctype="multipart/form-data"> </form>
  </div>
</div>

<h2 class="SectionTitles"> Crea un nuovo blog</h2>
 <div id="terza" class="centrale" >
	<form method="post" id="nuovoblog" enctype="multipart/form-data">
		<h3 class="smallermaybe">Titolo Blog</h3><br>
		<input class="form-control mr-sm-2" type="text" name="titolo" required><br>
		<h3 class="smallermaybe">Descrizione</h3><br>
		<input class="form-control mr-sm-2" type="text" name="descrizione"><br>
		<h3 class="smallermaybe">Header</h3><br>
		<input class="form-control mr-sm-2" type="file" name="header">
		<br>
		<h3 class="smallermaybe">Icon</h3> <br>
		<input class="form-control mr-sm-2" type="file" name="icon">
		<br>
		<h3 class="smallermaybe">Sfondo</h3> <br>
		<input class="form-control mr-sm-2" type="file" name="sfondo">
		<br>
		<h3 class="smallermaybe">Co-Autori</h3> <br>
		<input class="form-control mr-sm-2" type="text" name="coautori"><br>
		<br>
		<h3 class="smallermaybe">Argomenti</h3> <br>
		<input type="checkbox" id="argomento1" name="argomenti" value="Cucina"> <label for="argomento1"> Cucina</label>  
		<input type="checkbox" id="argomento2" name="argomenti" value="Moda"><label for="argomento2"> Moda</label>  
		<input type="checkbox" id="argomento3" name="argomenti" value="Musica"> <label for="argomento3">Musica</label>  
		<input type="checkbox" id="argomento4" name="argomenti" value="Letteraura"> <label for="argomento4">Letteratura</label>  
		<input type="checkbox" id="argomento5" name="argomenti" value="Videogiochi"> <label for="argomento5">Videogiochi</label>  
		<input type="checkbox" id="argomento6" name="argomenti" value="Politica"><label for="argomento6"> Politica</label>
		<input type="checkbox" id="argomento7" name="argomenti" value="Sport"><label for="argomento7"> Sport</label>
		<h3 class="smallermaybe">Altri Argomenti</h3>
		<input type="text" name="altri" id="altriarg"><br>
		 <p> *gli argomenti devono essere separati da una virgola.
			<br> **gli spazi sono contati all'interno degli argomenti es: (" cane" sarà diverso da "cane")
		</p>
		<button class="btn btn-outline-success my-2 my-sm-0" type="button" name="invia" id="nuovoblogsubmit" style="margin-top:2%;"> Invia i dati</button>
	</form>
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