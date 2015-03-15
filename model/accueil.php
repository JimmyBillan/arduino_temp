<?php

class modelAccueil {
	
	var $_selectCapteur;

	public function __construct()
	{
		$this->_selectCapteur = $this->getSelectCapteur();
	}

	public function getSelectCapteur(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=projet_temp', 'root', 'root'); 
		$tab = "temperatures";
		$sql = "SELECT DISTINCT nom_salle FROM temperatures ORDER BY id DESC ";
		$req = $pdo->prepare($sql); 
		$req->execute();
		$row = $req->fetchall(PDO::FETCH_ASSOC);
		return $row;
	}
}