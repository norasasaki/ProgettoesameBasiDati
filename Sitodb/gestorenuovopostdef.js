$(document).ready(function() { //gestisce il pulsante ancora per avere altri post
	$('body').on('click', '#postapost', function(event){
		var form = $(this).siblings("#postnuovo");
		var testo = form.children("#nuovopost");
		var testo2 = testo.val();
		var url_string = $(location).attr('href');
		var url = new URL(url_string);
		var idblog = url.searchParams.get("idblog");
		var idb = idblog;
		event.preventDefault();
		var dati = new FormData(form[0]);
		dati.append('par1', idb);
		$.ajax({
			type: "POST",
			url: "postare.php",
			data: dati ,
			processData: false,
			cache: false, 
			contentType: false,
			success: function(response) {
				if ($("#errorsvari")) {
					$("#errorsvari").remove();
				}
				$("#Posts").prepend(response);
			},
			error: function(responseTxt,statusTxt, xhr)
			{
				alert("Error: " + xhr.status + ": " + xhr.statusText);
			}

		});
		
		
		
	});



 });