<!doctype html>
<html lang="IT">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
	 <link rel="stylesheet" href="home.css" />
	 <link rel="stylesheet" href="generalstyle1.css" />
	<title>Tunglr</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <?php
		require 'connessionedb.php';
		session_start();
	?>

<script type="text/javascript" src="controlloiniziale.js"></script> <!-- fa il controllo del login -->
<script type="text/javascript" src="loginlogout.js"></script> <!-- fgestisce logout -->
<script type="text/javascript" src="gestoreancora.js"></script> <!-- gestisce la tl e bottone ancora -->
<script type = "text/javascript" src="gestorecommenti.js"> </script><!-- gestisce i commenti -->
<script type = "text/javascript" src="cancelpostcomm.js"></script> <!-- gestisce cancellazione post & commenti-->
<script type = "text/javascript" src="carosello.js"></script>
<script type = "text/javascript" src="iscrizioneutente.js"></script>

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

 
<div id="Sezione1">
	<h1 id="Sezione1Titolo">tunglr</h1>
	
</div>

<h2 id="TrendingSubtitle"> BLOG POPOLARI</h2>
<div id="Sezione2">
<!-- Carosello con blog più popolari -->
<div id="mostpopblog">
 <div class="bigcontainer">
 <?php
$queryblogp = "SELECT * FROM blog ORDER by contatore DESC LIMIT 5 ";
$resultblogp = $mysqli->query($queryblogp);
if ($resultblogp->num_rows > 0) {
			$i = 0;
			while ($rowblogp = $resultblogp->fetch_assoc()){
				$idblog = $rowblogp["IDBlog"];
				$pathimgpop = "uploads/$idblog/";
				if ($rowblogp["icon"] !=NULL){
					$icongp = $pathimgpop.$rowblogp["icon"];
				} else {
					$icongp = "uploads/standard/deafulticon.png ";
				}
				if ($rowblogp["header"] !=NULL){
					$headergp = $pathimgpop.$rowblogp["header"];
				} else {
					$headergp = "uploads/standard/defaultheader.jpg ";
				}
					$perid= $i;
					$i++;
					if ($perid != 0 ){
						$classepiù = "no";
					} else {
						$classepiù = "";
					}
			?> 
				<div class="contanierblog <?php echo $classepiù; ?>" id="<?php echo $perid; ?>">
					<h1 id="titlepop"> <a href="/Sitodb/Pagina%20Blog.php?idblog=<?php echo $idblog; ?>"><?php echo $rowblogp["nome"]; ?></a></h1>
					<h1 id="titlepop" class="nomefondpop"> by <a href="/Sitodb/Profilo%20Pubblico.php?nick=<?php echo $rowblogp["Fondatore"]; ?>"><?php echo $rowblogp["Fondatore"]; ?></a></h1>
					<div class ="part1">
						<img src="<?php echo $icongp; ?>" id="popicon" >
						<img src="<?php echo $headergp; ?>" id="popheader" >
					</div>
						<div class="descrizione"><?php echo $rowblogp["Descrizione"]; ?></div>
				</div>
				<?php
					}
			?>

		<?php
} else{
?>
		<div id="avviso"> NON CI SONO BLOG</div>
	<?php
};
	
?>
		<a class="prev" id="prev">&#10094;</a>
		<a class="next" id="next">&#10095;</a>	
  </div>
  <br>

</div> 
</div>


<div id="Sezione3">
<h2 style="padding-top:2%; text-align:center;" > NEW BLOG</h2>
<div class="prev1" id="prev1">&#10094;</div>
	 <div class="bigcontainer1">
<?php
$queryblogn = "SELECT * FROM blog ORDER by IDBlog DESC LIMIT 6 ";
$resultblogn = $mysqli->query($queryblogn);
if ($resultblogn->num_rows > 0) {
			$i = 5;
			while ($rowblogn = $resultblogn->fetch_assoc()){
				$blognew = $rowblogn["IDBlog"];
				$pathimgnew = "uploads/$blognew/";
				if ($rowblogn["icon"] !=NULL){
					$iconnew = $pathimgnew.$rowblogn["icon"];
				} else {
					$iconnew = "uploads/standard/deafulticon.png ";
				}
				if ($rowblogn["header"] !=NULL){
					$headernew = $pathimgnew.$rowblogn["header"];
				} else {
					$headernew = "uploads/standard/defaultheader.jpg ";
				}				
				
					$perid= $i;
					$i++;
					if ($perid != 5){
						$classepiù = "no";
					} else {
						$classepiù = "";
					}
					if ($perid == 6){
						$classepiù = " ";
					}
			?> 
				   <div class="contanierblognew <?php echo $classepiù; ?>" id="<?php echo $perid; ?>" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,1) 100%), url('<?php echo $headernew; ?> ');background-size: cover;">
						<img src="<?php echo $iconnew; ?>" class="imgB">
						<div class="descrizioneB"><?php echo $rowblogn["Descrizione"]; ?></div>
						<div class="nameB"><a href="/Sitodb/Pagina%20Blog.php?idblog=<?php echo $blognew; ?>"><?php echo $rowblogn["nome"]; ?></a></div>
						</br>
						<div class="nomefond"> by <a href="/Sitodb/Profilo%20Pubblico.php?nick=<?php echo $rowblogn["Fondatore"]; ?>"><?php echo $rowblogn["Fondatore"]; ?></a></div>
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
	<div class="next1" id="next1" >&#10095;</div>	
	<br>
</div>

<div id="caricati"> </div>
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