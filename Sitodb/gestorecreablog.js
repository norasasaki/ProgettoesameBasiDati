//gestore creazione blog
$(document).ready(function() { 
$('body').on('click', '#nuovoblogsubmit', function(event){
	if ($("#errorsnewb")){
		$("#errorsnewb").empty();
	}
	var form = $(this).parents("#nuovoblog");
	var varidati = new FormData(form[0]);
	var favorite = [];
    $.each($("input[name='argomenti']:checked"), function(){            
           favorite.push($(this).val());
        });
	if ("#altriarg" != ""){
		 favorite.push($("#altriarg").val());
	 }
    varidati.append('argomenti[]',favorite);

	event.preventDefault();
	$.ajax({
			type: "POST",
			url: "creazioneblog.php",
			data: varidati ,
			processData: false,
			cache: false, 
			contentType: false,
			success: function(result)
	{
		if (result == "successo"){
			location.reload(true);
		} else {
			$("#nuovoblog").append(result);
		}
	},
	error: function(responseTxt,statusTxt, xhr)
	{
		alert("Error: " + xhr.status + ": " + xhr.statusText);
	}

	});
 });

});