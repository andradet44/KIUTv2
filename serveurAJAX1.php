<?php





	//////////////////////////////////////////////////////////////////////////////////////
	// Données client AJAX

	// AJAX 1
	$donneesClient = json_decode($_POST['donneesClient'], true);
	$manette_id = $donneesClient['manette_id'];
	$action = $donneesClient['action'];
	$touch = $donneesClient['touch'];





	//////////////////////////////////////////////////////////////////////////////////////
	// Ouverture BD

		// Paramètres de connexion
		include_once("dbConfig.php");

		// Ouverture connexion
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);





	//////////////////////////////////////////////////////////////////////////////////////
	//select
		$select_tch_bdd = "SELECT * FROM `tbl_touche` where `id_touche_manette` = '1';";
		$resultat_tch = $mysqli->query($select_tch_bdd);
		
		//recup des touches
		while ($ligne = $resultat_tch->fetch_assoc()) 
		{
			$id_touche_manette = $ligne['id_touche_manette'];
			//deplacements
			$tch_up = $ligne['tch_up'];
			$tch_down = $ligne['tch_down'];
			$tch_left = $ligne['tch_left'];
			$tch_right = $ligne['tch_right'];
			//actions
			
		}
		
	//////////////////////////////////////////////////////////////////////////////////////
	// Requète : update
		// Requète pour mettre la touche en up
		$tch_down_up_bdd = "Update `kiut`.`tbl_touche` set `tch_up` = '1' where `id_touche_manette` = '1';";
		$tch_up_up_bdd = "Update `kiut`.`tbl_touche` set `tch_up` = '0' where `id_touche_manette` = '1';";
		
		//action par touche
		if($touch = 'up')
		{
		if($action == 1)
			{
				$resultat_tch_up = $mysqli->query($tch_down_up_bdd);
				if($resultat_tch_up)
				{
					$touchOK = 'up';
					$actionOK = '1';
				}else{
					//error
					
				}
			}else{
				$resultat_tch_up = $mysqli->query($tch_up_up_bdd);
				if($resultat_tch_up)
				{
					$touchOK = 'up';
					$actionOK = '0';
				}else{
					//error
					
				}
			}
		}
	//////////////////////////////////////////////////////////////////////////////////////
	// Fermeture BD

		// Fermeture connection
		$mysqli->close();





	//////////////////////////////////////////////////////////////////////////////////////
	// Données serveur AJAX

		// AJAX 1
		$objetJSON = array();
		$objetJSON[] = array("touchOK" => $touchOK, "actionOK" => $actionOK);

		// Serialize
		$donneesServeur = json_encode($objetJSON);

		// Serialize et envoie reponse
		echo "$donneesServeur";
?>
