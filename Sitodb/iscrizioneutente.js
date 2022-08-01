$(document).ready(function() {
	$('body').on('click', '#submitIscrizione', function(event){
		var form = $(this).parents("#Registrazioneform");
		if($("#errorsRegistrazione") ){
			$("#errorsRegistrazione").remove();
		}
		var dati = new FormData(form[0]);
		event.preventDefault();
		$.ajax({
			type: "POST",   
			url: "iscrizionehome.php",
			data: dati,
			processData: false,
			cache: false, 
			contentType: false,
			success : function(risultato)
			{
				if (risultato == "iscrizione con successo") {
					location.reload(true);
				} else {
					$('#Registrazioneform').append(risultato);
				}
			} 
		});
	});
	
});