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
			<label> Depuis 60 minutes</label>
		<canvas id="canvasChart"></canvas>
		</div>
	</div>
	<div id="commandZone">
		<label id="title">Panneau de Controle</label>
		
		<div id="selectArduino">
	  		<label id="capteurSelect">Choix du capteur</label>
			<select id="select-capteurSelect" class="form-control">
			  <?php echo $listCapteur ?>
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
