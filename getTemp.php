<?php 

function preparHour(){
	$madate = (int) date('G:i');
	$t = $madate -1;

	if($t < 0)
		$t +=24;

	return $date = date('Y-m-d '.$t.':i:s');
}

function getTemp_Hour($nom, $date){


	$pdo = new PDO('mysql:host=127.0.0.1;dbname=projet_temp', 'root', 'root'); 
	$tab = "temperatures";
	  
	$sql = "SELECT temperature_salle, datePost FROM temperatures WHERE datePost > :dateP  AND nom_salle = :nom";
	$req = $pdo->prepare($sql); 
	$req->bindParam(":dateP", $date);
	$req->bindParam(":nom", $nom);
	$req->execute();
	$row = $req->fetchall(PDO::FETCH_ASSOC);
	echo json_encode($row);
}

if(!empty($_GET["hour"]) && !empty($_GET["nom"])){

	$date = preparHour();
	getTemp_Hour($_GET["nom"], $date);

}





/*foreach ($row as $key ) {
	var_dump($key);
}




 // mysqli_c close();
/*}*/