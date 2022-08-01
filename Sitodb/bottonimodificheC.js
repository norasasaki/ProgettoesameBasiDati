$(document).ready(function() {
var VarieForms1 = {
	'cambianome' : " \n Name Attuale: <input type=\"text\" name=\"name\"><br> \n Nuovo Nome: <input type=\"text\" name=\"nuovonome\"><br> \n <input type=\"button\" name=\"submit1\" class=\"submit1\" value = \"invia\"> \n  ",
	'cambiapassword' : " \n Vecchia Password: <input type=\"text\" name=\"oldpasswprd\"><br> \n Nuova Password: <input type=\"text\" name=\"NuovaPassword\"><br> \n Ripeti Nuova Password: <input type=\"text\" name=\"AgainNuovaPass\"><br> \n <input type=\"button\" name=\"submit1\" class=\"submit1\" value = \"invia\"> \n",
	'cambiaEmail' : "\n Nuova Email: <input type=\"text\" name=\"nuovaEmail\"><br> \n Ripeti Nuova Email: <input type=\"text\" name=\"againNuovaEmail\"><br> \n <input type=\"button\" name=\"submit1\" class=\"submit1\" value = \"invia\">\n ",
	'cambiavatar' : " \n Nuova Avatar: <input type=\"file\" name=\"nuovoAvatar\"><br> \n <input type=\"button\" name=\"submit1\" class=\"submit1\" value = \"invia\"> \n ",
	'cambiatitolo' : "\n Nuova Titolo: <input type=\"text\" name=\"nuovaTitolo\"><br> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\"> \n ",
	'cambiaheader' : "\n Nuovo Header: <input type=\"file\" name=\"nuovoHeader\"><br> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\"> \n ",
	'cambiaicon' : " \n Nuova Icon: <input type=\"file\" name=\"nuovaIcon\"><br> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\" > \n ",
	'cambiacornice' : " \n Nuova Cornice icon: <select name=\"forma\" id=\"forma\"> <option value=\"defaulf\" id =\"default\">Seleziona un opzione</option><option value=\"0\">Quadrato</option> <option value=\"1\">Tondo</option></select> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\" > \n ",
	'cambiasfondo' : " \n Nuovo Sfondo: <input type=\"file\" name=\"nuovoSfondo\"><br> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\" > \n ",
	'cambiacolore' : " \n Nuovo Colore Descrizione: <input type=\"color\" name=\"nuovocolore\" value=\"#000000\" ><br> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\" > \n ",
	'cambiabio' : " \n Nuova Bio: <input type=\"text\" name=\"nuovaBio\"><br> \n <input type=\"button\" name=\"submit2\" class=\"submit2\" value = \"invia\" > \n ",
	'gestionecoautori' : " \n Nome Co-Autore: <input type=\"text\" name=\"nomecoautore\" id=\"nomecoautore\"><br> \n <input type=\"button\" name=\"Aggiunti\" value=\"Aggiunti\" id=\"Aggiunti\"> \n <input type=\"button\" name=\"Elimina\" value=\"Elimina\" id=\"Elimina\"> ",
	'gestioneargomenti' : " \n Argomento: <input type=\"text\" name=\"newargomento\" id=\"newargomento\"><br> \n <input type=\"button\" name=\"Aggiunti\" value=\"Aggiunti\" id=\"Aggiunti\"> \n <input type=\"button\" name=\"Elimina\" value=\"Elimina\" id=\"Elimina\"> "
};

$('body').on('click', ".sinistra button", function(event){
		$("#fondato").css("display", "none");
		var valuta = $(this).attr("id");
		var subject = VarieForms1[valuta];
		if (valuta == "cambianome" || valuta == "cambiapassword" || valuta == "cambiaEmail" || valuta == "cambiavatar" ) {
			scriviMessaggio ($("#forms"), subject);
		}else if (valuta == "cancellablog") {
			Cancellazione1 ($("#forms2"));
		} else if (valuta == "cancellautente"){
			Cancellazione2 ($("#forms"));
		}
		else {
			scriviMessaggio ($("#forms2"), subject);
		}

});

function scriviMessaggio (nodoD, messaggio) {
	var nodoTesto = document.createElement ("div");
	nodoTesto.innerHTML = messaggio;
	var figlio = nodoD.children(":first");
	if (figlio) {
		nodoD.empty();
	}
	nodoD.append(nodoTesto);
}

function Cancellazione1 (nodoB) {
	var figlio = nodoB.children(":first");
	if (figlio) {
		nodoB.empty();
	}
	var idb = $(".blog.active").attr("id");
	if (idb === undefined || idb === null) {
		alert ("Selezionare un blog per poter cancellare ");
	} else {
		if (confirm('Sicuro di voler cancellare tutti i dati legati al blog'+""+ idb)) {
			var idb = $(".blog.active").attr("id");
			$.ajax({
					url: "cancellablog.php",
					type: "POST",
					data: {blog : idb},
					success: function(result) {
						location.reload(true);
					}
			});
		} else {
			nodoB.append("Operazione di cancellazione del blog annullata");
		}
	}
}


function Cancellazione2 (nodoC) {
	var figlio = nodoC.children(":first");
	if (figlio) {
		nodoC.empty();
	}
	if (confirm('Sicuro di voler cancellare il tuo profilo utente? \n i dati non potranno essere recuperati')) {
		$.ajax({
                url: "cancellautente.php",
                type: "POST",
                success: function(result) {
					window.location.href = '/Sitodb/Home.php';
                }
            });

	} else {
		nodoC.append("Operazione di cancellazione del profilo annullata");
	}
}

	$('body').on('click', '#scegli', function(event){
			if ($(this).hasClass('active')){
				$("#fondato").css("display", "none");
			} else {
				$("#fondato").css("display", "block");
				$(this).toggleClass('active');
			}
			
	});
	$('body').on('click', '.blog', function(event){
		$("#materiale").empty();
		$("#fondato").css("display", "none");
		var fratelli = $(this).siblings(".blog");
		fratelli.removeClass('active');
		var contenuto = $(this).html();
		$("#materiale").append(contenuto);
		$(this).toggleClass('active');
	});

});