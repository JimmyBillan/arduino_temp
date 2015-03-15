$(document).ready(function(){

	var lineChartData = {
			labels : ["00h00","01h00","02h00","03h00","04h00","05h00","06h00","07h00", "08h00", "09h00","10h00","11h00","12h00", "13h00", "14h00", "15h00", "16h00", "17h00", "18h00", "19h00","20h00", "21h00", "22h00", "23h00" ],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [22.3,22.9,24,26,17,9,9]
				}
			
			]

		}
		
		//console.log(lineChartData.datasets[0].data);

		/*window.onload = function(){
		var ctx = document.getElementById("chartHour").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: false
		});*/
	}

	function setChardata(reponse, chartID){
		console.log(reponse);
	}

	function getTemp(nomSalle, chartID){

		$.ajax({
			url: 'getTemp.php',
			type: 'GET',
			data: {hour: 1, nom: 'salle224'},
		})
		.done(function(reponse) {
			console.log("success");
			setChardata(reponse, chartID);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			return false;
		});
	}

	getTemp("salle224", "chartHour");


	

});