<?php 

function getTemp($nom, $fenetre){

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=projet_temp', 'root', 'root'); 
	$tab = "temperatures";
	  
	$sql = "SELECT temperature_salle, datePost, batterie FROM temperatures WHERE datePost >  DATE_SUB( NOW() , INTERVAL $fenetre ) 
    AND nom_salle = :nom";
	$req = $pdo->prepare($sql); 
	$req->bindParam(":nom", $nom);
	$req->execute();
	$row = $req->fetchall(PDO::FETCH_ASSOC);

	$retour = array();
	
	$c = count($row);
	if($fenetre == "1 HOUR"){
		for ($i=0; $i < $c ; $i++) { 
		if(($i % 5) == 0)
			array_push($retour, $row[$i]);
		}
	}else if ($fenetre == "1 DAY"){
		for ($i=0; $i < $c ; $i++) { 
		if(($i % 30) == 0)
			array_push($retour, $row[$i]);
		}
	}else{
		echo json_encode($row);
	}
	
	if(count($retour) > 0)
		echo json_encode($retour);
	
}

function getTempFocus($nom, $fenetre, $focus){
	
	$focus = "'%".$focus.":00%'";
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=projet_temp', 'root', 'root'); 
	$tab = "temperatures";
	$sql = "SELECT temperature_salle, datePost, batterie FROM temperatures WHERE datePost > DATE_SUB( NOW() , INTERVAL 30 DAY ) AND DATE_FORMAT(datePost, '%H:%i') like $focus AND nom_salle = :nom";
	$req = $pdo->prepare($sql); 
	$req->bindParam(":nom", $nom);
	$req->execute();
	$row = $req->fetchall(PDO::FETCH_ASSOC);

	echo json_encode($row);



}



if(!empty($_GET["fen"]) && !empty($_GET["nom"]) ){
	if($_GET["fen"] == "hour")
		getTemp($_GET["nom"], "1 HOUR");
	else if($_GET["fen"] == "day")
		getTemp($_GET["nom"], "1 DAY");
	else if($_GET["fen"] == "month" && isset($_GET["foc"])){
		getTempFocus($_GET["nom"], "30 DAY", $_GET["foc"]);
	}
		
}
