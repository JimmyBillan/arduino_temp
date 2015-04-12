<?php
	require_once 'model/accueil.php';
	require_once 'controlleur/accueil.php'; 
	$a = new modelAccueil();
	$listCapteur = controlleurAccueil::generateSelectArduino($a->getSelectCapteur());

?>

<html>
<head>
	<script src="js/Chart.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="chartZone">
		<div id="chart">
			
		<canvas id="canvasChart"></canvas>
		</div>
	</div>
	<div id="commandZone">
		<label id="title">Panneau de Controle</label>
		
		<div id="selectArduino">
	  		<label id="title-form">Choix du capteur</label>
			<select id="select-capteurSelect" class="form-control">
			  <?php echo $listCapteur ?>
			</select>
		</div>

		<div id="selectTime">
			<label id="title-form">Fenetre de temps</label>
			<select id="select-time" class="form-control">
				<option value="hour">1H</option>
				<option value="day">24h</option>
				<option value="month">30J</option>

			</select> 
		</div>

		<div id="selectTime-focus" style='display:none'>
			<label id="title-form">Choisir une heure</label>
			<select id="select-time-focus" class="form-control">
				<option value="0">0H00</option>
				<option value="1">1h00</option>
				<option value="2">2h00</option>
				<option value="3">3h00</option>
				<option value="4">4h00</option>
				<option value="5">5h00</option>
				<option value="6">6h00</option>
				<option value="7">7h00</option>
				<option value="8">8h00</option>
				<option value="9">9h00</option>
				<option value="10">10h00</option>
				<option value="11">11h00</option>
				<option value="12">12h00</option>
				<option value="13">13h00</option>
				<option value="14">14h00</option>
				<option value="15">15h00</option>
				<option value="16">16h00</option>
				<option value="17">17h00</option>
				<option value="18">18h00</option>
				<option value="19">19h00</option>
				<option value="20">20h00</option>
				<option value="21">21h00</option>
				<option value="22">22h00</option>
				<option value="23">23h00</option>

			</select> 
		</div>

		<div class="battery">
			<div class="level">
					
			</div>
		</div>
		<div id="batteryValue"></div>

	</div>

</body>
</html>
