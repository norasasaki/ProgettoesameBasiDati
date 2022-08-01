$(document).ready(function() { //gestisce il pulsante ancora per avere altri post
	$('body').on('click', '#ancorablog', function(event){
		var url_string = $(location).attr('href');
		var url = new URL(url_string);
		var idblog = url.searchParams.get("idblog");
		var idb = idblog ;
		$.ajax({ type: "GET",   
			url: "tldef.php",
			data: {"idb" : idb},
			success : function(risultato)
			{
				if (risultato != "Non ci sono più post"){
					$('#Posts').append(risultato);
				} else {
					$("#ancorablog").prop("disabled",true);
					$('#Posts').append("<div id=\"avvisopost\"> NON CI SONO POSTS</div>");
				}
			}
		});
	});


	$('body').on('click', '#ancora', function(event){
		$("#ancora").remove();	
		$.ajax({ type: "GET",   
				url: "tldef.php",   
				success : function(risultato) {
					if (risultato != "Non ci sono più post"){
						$('#caricati').append(risultato);
					} else {
						$('#caricati').append("<div id=\"avvisopost\"> NON CI SONO POSTS</div>");
					}
				}
		});
	});

});