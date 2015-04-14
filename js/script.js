$(document).ready(function(){

	function getTemp(fenetre, nomSalle){
		console.log("fenetre : "+ fenetre);
		$.ajax({
			url: 'getTemp.php',
			type: 'GET',
			data: {fen: fenetre, nom: nomSalle},
		})
		.done(function(reponse) {

			var dataReponse = jQuery.parseJSON(reponse);
			console.log(dataReponse);
			setChardata(dataReponse);
			printBatteryLevel(dataReponse);
			
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			return false;
		});
	}

	function getTempFocus(fenetre, nomSalle, focus){
		console.log("fenetre : "+ fenetre);
		$.ajax({
			url: 'getTemp.php',
			type: 'GET',
			data: {fen: fenetre, nom: nomSalle, foc : focus},
		})
		.done(function(reponse) {

			var dataReponse = jQuery.parseJSON(reponse);
			console.log(dataReponse);
			setChardata(dataReponse);
			printBatteryLevel(dataReponse);
			
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			return false;
		});
	}

	function parametre(nomSalle, fenetre){
		this.nomSalle = nomSalle;
		this.fenetre = fenetre;
		this.focus = 1;
		this.changeSalle = function(nom){
			this.nomSalle = nom;
		};
		this.changeFenetre = function(fen){
			this.fenetre = fen;
		};
		this.changeFocus = function(fo){
			this.focus=fo;
		}

	}


	var p1 = new parametre($('#select-capteurSelect option:first').val(), $('#select-time option:first').val());
	getTemp(p1.fenetre, p1.nomSalle);


	$("#select-capteurSelect").change(function() {
		p1.changeSalle($('#select-capteurSelect').val());
		getTemp(p1.fenetre, p1.nomSalle);
		console.log(p1.nomSalle);

	});

	$("#select-time").change(function() {
		if($('#select-time').val() ==="month"){
			$('#selectTime-focus').show();
			
			p1.changeFocus($('#select-time-focus').val());
			p1.changeFenetre($('#select-time').val());
			console.log(p1.focus);
			getTempFocus(p1.fenetre, p1.nomSalle, p1.focus)
		}else{
			$('#selectTime-focus').hide();

			p1.changeFenetre($('#select-time').val());
			getTemp(p1.fenetre, p1.nomSalle);
			console.log(p1.nomSalle);	
		}
	});

	$("#select-time-focus").change(function() {
		$('#selectTime-focus').show();
		p1.changeFocus($('#select-time-focus').val());
		p1.changeFenetre($('#select-time').val());
		getTempFocus(p1.fenetre, p1.nomSalle, p1.focus)
	});


	function lineChartData(){
		this.labels = [];
		this.datasets = [
			{
				label: "My First dataset",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : []
			}
		
		],
		this.setData = function(reponse){
			l = reponse.length;
			for (var i = 0; i < l; i++) {
				this.datasets[0].data.push(reponse[i].temperature_salle);
			};
		},
		this.setLabels = function(reponse){
			l = reponse.length;
			for (var i = 0; i < l; i++) {
				this.labels.push(reponse[i].datePost);
			};
		}

	}
		

	function setChardata(reponse){
		$('#canvasChart').remove();
		$('#chartZone').append('<canvas id="canvasChart"></canvas>');
		var ctx = document.getElementById("canvasChart").getContext("2d");
		var HOUR = new lineChartData();

		HOUR.setData(reponse);
		HOUR.setLabels(reponse);

		var GraphHour = new Chart(ctx).Line(HOUR, {
			responsive: false
		});

	}

	


	function printBatteryLevel(lvl){
		
		var lvlB = lvl[lvl.length -1].batterie;
		$('#batteryValue').html(lvlB+"%");

		if (lvlB > 65) {  
		    $('.level').addClass('high');  
		} else if (lvlB >= 35 ) {  
		    $('.level').addClass('med');  
		} else {  
		    $('.level').addClass('low');  
		};

		$('.level').css('width', lvlB + '%'); 
	}
	
	//selectCapteurDefaut();
	printBatteryLevel();
	


	

});