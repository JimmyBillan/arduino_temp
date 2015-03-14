$(document).ready(function(){
	$.ajax({
		url: 'getTemp.php',
		type: 'GET',
		dataType: 'json',
		data: {hour: 1, nom: 'salle224'},
			}).done(function(reponse){
				console.log(reponse);
			});
	});