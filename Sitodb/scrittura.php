<?php
require_once 'connessionedb.php';
session_start();

$blogcode = $_POST['blogcode'];
$nameofutente = $_SESSION['username'];

$queryfondatore = "SELECT Fondatore FROM blog WHERE IDBlog = '$blogcode'";
$resultfondatore = $mysqli->query($queryfondatore);
$namerow = $resultfondatore->fetch_assoc();

if ($nameofutente == $namerow['Fondatore']) {
		?>
		<form id="postnuovo" name="postnuovo" method= "post">
				<h2 class="uhacca2">Inserisci il titolo del post</h2>
				<textarea type="textarea" name="nuovotitolo" id ="nuovotitolo"> </textarea>
				<h2 class="uhacca2" >Scrivi il tuo post </h2>
				<textarea type="textarea" name="nuovopost" id ="nuovopost" > </textarea>
				<input type="file" name="immagine1" class="newinputs" >
				<input type="file" name="immagine2" class="newinputs">
				<input type="file" name="immagine3" class="newinputs">
				<div class="newinputs"> colore testo:</div>
				<input type="color" name="colorscritta" value="#000000">
			<br>
		</form>
			<input type="submit" name="postapost" id ="postapost" value="Posta" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto;">
		<br>
		<?php
} else {
	$queryco = "SELECT NomeCoAutore FROM coautore WHERE IDBlog = '$blogcode'";
	$resultco = $mysqli->query($queryco);
	while ($namecoa = $resultco->fetch_assoc()){
		if ($nameofutente == $namecoa['NomeCoAutore']) {
			?>
			<form id="postnuovo" name="postnuovo" method= "post">
				<h2 class="uhacca2">Inserisci il titolo del post</h2>
				<textarea type="textarea" name="nuovotitolo" id ="nuovotitolo"> </textarea>
				<h2 class="uhacca2" >Scrivi il tuo post </h2>
				<textarea type="textarea" name="nuovopost" id ="nuovopost" > </textarea>
				<input type="file" name="immagine1" class="newinputs" >
				<input type="file" name="immagine2" class="newinputs">
				<input type="file" name="immagine3" class="newinputs">
				<div class="newinputs"> colore testo:</div>
				<input type="color" name="colorscritta" value="#000000">
				<br>
			</form>
				<input type="submit" name="postapost" id ="postapost" value="Posta" class="btn btn-outline-success my-2 my-sm-0" style="display:flex; margin:auto;">
			<br>
		<?php
		}
	}

}
?>