<?php

class controlleurAccueil {

	public function generateSelectArduino($listCapteur){
		$optionGenerate ="";
		foreach ($listCapteur as $key => $value) {
			$optionGenerate= $optionGenerate."<option>".$value['nom_salle']."</option>";
		}
		return $optionGenerate;
	}
}

?>