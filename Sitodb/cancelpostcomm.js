$(document).ready(function() { 
	$('body').on('click', '#cancellapost', function(event){
		var base = $(this).parent(".Post");
		var idp = base.attr("id");
		$.ajax({ type: "POST",   
			url: "cancellpostcomm.php",
			data: {"idp" : idp},
			success : function(risultato) {
				var base1 = $("#" + idp);
				var eliminare = base1.siblings("#boxcommento");
				eliminare.remove();
				$("#" + idp).remove();
				alert (risultato);
			}
		});
	});

	$('body').on('click', '#cancellacommento', function(event){
			var base1 = $(this).parent(".commentoprincipale");
			var idc = base1.attr("id");
			$.ajax({ type: "POST",   
				url: "cancellpostcomm.php",
				data: {"idc" : idc},
				success : function(risultato) {
					$("#" + idc).remove();
					alert(risultato);
				}
			});
	});

});