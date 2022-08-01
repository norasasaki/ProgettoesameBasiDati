//gestore commenti
$(document).ready(function() { 
 $('body').on('click', '#commenti', function(event){
	var base = $(this).parent(".Post");
	var idp = base.attr("id");
	if ($(this).hasClass('active')){
		var eliminare = base.siblings("#boxcommento");
		eliminare.remove();
		$(this).removeClass('active');
	} else {
		$(this).toggleClass('active');
		$.ajax({
			type: "POST",
			url: "commenti.php",
			data: {"idp" : idp},
			success: function(risultato)
		{
			base.after(risultato);
		},
		error: function()
		{
			alert("Chiamata fallita, si prega di riprovare...");
		}	
		});
	}
 });
	

 
$('body').on('click', '#aggiungicommento', function(event){
	var ilform = $(this).parents(".conteiner");
	var idp = ilform.children(".Post").attr("id");
	var form = $(this).parents("#addcomment");
	var testo = $(this).siblings("#exampleFormControlTextarea1");
	var prima = form.parents("#creatore");
	var tuoi = prima.siblings("#tuoi");
	
	$.ajax({
			type: "POST",
			url: form.attr("action"),
			data: form.serialize() +"&par1="+idp ,
			success: function(risultato)
	{
		if ( tuoi.children("#nulla")){
			var cancellare = tuoi.children("#nulla");
			cancellare.remove();
		}
		var crazione= tuoi.prepend(risultato);
		testo.val('').change();

	},
	error: function()
	{
		alert("Chiamata fallita, si prega di riprovare...");
	}

	});
 });

 });