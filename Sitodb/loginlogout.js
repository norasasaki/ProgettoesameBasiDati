$(document).ready(function() { //fa logout e riorganizza la pag
	$('body').on('click', '#submitlogin', function(event){
		var form = $(this).parents("#Login");
		if($("#errorslogin") ){
			$("#errorslogin").remove();
		}
		$.ajax({ type: "POST",   
			url: "login.php",
			data: form.serialize(),
			success : function(risultato)
			{
				if (risultato == "login con successo") {
					location.reload(true);
				} else {
					$('#menuforlogin').append(risultato);
				}					
				
			} 
		});
	});
	
	
	$('body').on('click', '#out', function(event){
		$("#togliere").css("display", "block");
        $('#infoutente').remove();
		$(document).load("logout.php");
		if((document.title) == "Schermata Utente"){
			window.location.replace('/Sitodb/Home.php');
		};
	
		//riorganizza la pagina home
		$("#caricati").empty();
		$('#caricati').load("iscrizioneform.html");
		//riorganizza la pagina del blog
		if ($('#postnuovo')){
			$('#postnuovo').remove();
			$("#scrittura").empty();
		}
	});
});