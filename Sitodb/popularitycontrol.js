$(document).ready(function() { 

	$('body').on('click', '#infossimbol', function(event){
		if($(this).hasClass('active')){
				$("#descrizioneblog").css("display", "block");
				$("#infosblog").css("display", "none");
				$("#infossimbol").removeClass('active');
			} else {
				$("#infosblog").css("display", "block");
				$("#descrizioneblog").css("display", "none");
				$("#infossimbol").toggleClass('active');
			}
	});

	var url_string = $(location).attr('href');
	var url = new URL(url_string);
	var idblog = url.searchParams.get("idblog");
	var idb = idblog ;
	$.ajax({
			type: "POST",
			url: "popularitycounter.php",
			data: {"idb" : idb},
			success: function(risultato){
			},
			error: function()
			{
			alert("Chiamata fallita, si prega di riprovare...");
			}

	});

 
});