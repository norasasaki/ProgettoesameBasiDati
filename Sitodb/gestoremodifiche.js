$(document).ready(function() { //gestore modifiche blog

$('body').on('click', '.submit1', function(event){
	var form = $(this).parents("#forms");
	event.preventDefault();
	$.ajax({
			type: "POST",
			url: "modificheaccount.php",
			data: new FormData(form[0]) ,
			processData: false,
			cache: false, 
			contentType: false,
			success: function(risultatoa)
	{
		$(":text").val('').change();
		$(":file").val('').change();
		sessionStorage.successMessage= true;
		sessionStorage.setItem("risposta", (risultatoa));
		location.reload(true);
	},
	error: function(responseTxt,statusTxt, xhr)
	{
		alert("Error: " + xhr.status + ": " + xhr.statusText);
	}

	});
 });
 
$('body').on('click', '.submit2', function(event){
	var idp = $(".blog.active").attr("id");
	var form = $(this).parents("#forms2");
	event.preventDefault();
	var dati = new FormData(form[0]);
	dati.append('par2', idp);
	var seletto = $("#forma option:selected").val();
	if (seletto != "" && seletto != "defaulf"){
		dati.append('selezione', seletto);
	}
	if (idp === undefined || idp === null) {
		alert ("Selezionare un blog per poter far l'azione ");
	} else {
		$.ajax({
				type: "POST",
				url: "modificheblog.php",
				data: dati,
				processData: false,
				cache: false, 
				contentType: false,
				success: function(risultatob) {
					$(":text").val('').change();
					$(":file").val('').change();
					sessionStorage.successMessage= true;
					sessionStorage.setItem("risposta", (risultatob));
					location.reload(true);
				},
				error: function(responseTxt,statusTxt, xhr)
				{
				alert("Error: " + xhr.status + ": " + xhr.statusText);
				}

		});
	}
 });


$('body').on('click', '#Aggiunti', function(event){
	var idp = $(".blog.active").attr("id");
	var form = $(this).parents("#forms2");
	var valuta = $(this).attr("id");
	
	if (idp === undefined || idp === null) {
		alert ("Selezionare un blog per poter far l'azione ");
	} else {
		$.ajax({
				type: "POST",
				url: "modificheblog.php",
				data: form.serialize()+"&par2="+idp+"&par3="+valuta ,
				success: function(risultato) {
					$(":text").val('').change();
					if ($(".result").length > 0) {
						$(".result").empty();
						$(".result").append(risultato);
					} else {
						var base1 = $("<div class = \"result\"> </div>");
						$("#forms2").append(base1);
						$(".result").append(risultato);
					}
		
				},
				error: function()
				{
					alert("Error: " + xhr.status + ": " + xhr.statusText);
				}	
		});
	}
 });

$('body').on('click', '#Elimina', function(event){
	var idp = $(".blog.active").attr("id");
	var form = $(this).parents("#forms2");
	var valuta = $(this).attr("id");
	
	if (idp === undefined || idp === null) {
		alert ("Selezionare un blog per poter far l'azione ");
	} else {
		$.ajax({
				type: "POST",
				url: "modificheblog.php",
				data: form.serialize()+"&par2="+idp+"&par3="+valuta ,
				success: function(risultato1) {
					$(":text").val('').change();
					if ($(".result").length > 0) {
						$(".result").empty();
						$(".result").append(risultato1);
					} else {
						var base1 = $("<div class = \"result\"> </div>");
						$("#forms2").append(base1);
						$(".result").append(risultato1);
					}
				},
				error: function()
				{
					alert("Error: " + xhr.status + ": " + xhr.statusText);
				}
		});
	}
 });
 
 
 });