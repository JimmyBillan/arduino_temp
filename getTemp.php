<?php 

function getTemp($nom, $fenetre){

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=projet_temp', 'root', 'root'); 
	$tab = "temperatures";
	  
	$sql = "SELECT temperature_salle, datePost FROM temperatures WHERE datePost > DATE( DATE_SUB( NOW() , INTERVAL $fenetre ) )
    AND nom_salle = :nom";
	$req = $pdo->prepare($sql); 
	$req->bindParam(":nom", $nom);
	$req->execute();
	$row = $req->fetchall(PDO::FETCH_ASSOC);
	echo json_encode($row);
}


if(!empty($_GET["fen"]) && !empty($_GET["nom"])){
	if($_GET["fen"] == "hour")
		getTemp($_GET["nom"], "60 MINUTE");
	else if($_GET["fen"] == "day")
		getTemp($_GET["nom"], "24 HOUR");
}






