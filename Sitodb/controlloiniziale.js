$(document).ready(function() {
	var url_string = $(location).attr('href');
	var url = new URL(url_string);
	var idblog = url.searchParams.get("idblog");
	var idb = idblog ;
	$('#Posts').load("tldef.php", {idb : idb});
 $.ajax({ type: "POST",   
     url: "controllogin.php",   
     success : function(risultato)
     {
		if (risultato == "non sei loggato"){
			$('#caricati').load("iscrizioneform.html");
		} else {
			$("#togliere").css("display", "none");
			$('#infoutente').append(risultato);
			 if ( sessionStorage.successMessage) {
				var messaggio = sessionStorage.getItem("risposta");
				$("#avvisiok").append(messaggio);
				sessionStorage.clear();
				setTimeout(function(){ $("#avvisiok").empty();}, 5000);
			}
			$('#caricati').load("tldef.php");
			if ($("#scrittura")) {
				$('#Posts').before("<div id='scrittura'> <div>");
				var url_string = $(location).attr('href');
				var url = new URL(url_string);
				var idblog = url.searchParams.get("idblog");
				var idb = idblog ;
				$("#scrittura").load("scrittura.php", {blogcode : idb});
			}
		}
     }
});
});