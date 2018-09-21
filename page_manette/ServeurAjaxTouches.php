<?php
	//////////////////////////////////////////////////////////////////////////////////////
	// Données client AJAX

	// AJAX 1
	$donneesClient = json_decode($_POST['donneesClient'], true);
	// Id de la manette qui envoi une touche
	$manette_id = $donneesClient['manette_id'];
	// Action détermine si l'utilisateur appuie ou lâche
	$action = $donneesClient['action'];
	// La touche sur laquelle la manette appuie
	$touch = $donneesClient['touch'];

	//////////////////////////////////////////////////////////////////////////////////////
	// Ouverture BD

		// Paramètres de connexion
		include_once("../dbConfig.php");

		// Ouverture connexion
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
		
	//////////////////////////////////////////////////////////////////////////////////////
	// Requète : update
	//mettre les touches en BDD
	
		// Requète pour mettre la touche en up ou l'enlever 
		//"up" veut dire que le joueur lâche et "down" que le joueur appuie
		//on met à 0 lorsqu'il lâche et 1 lorsqu'il appuie
			//touch up
		$tch_down_up_bdd = "Update `kiut`.`tbl_touche` set `tch_up` = '1' where `id_touche_manette` = '$manette_id';";
		$tch_up_up_bdd = "Update `kiut`.`tbl_touche` set `tch_up` = '0' where `id_touche_manette` = '$manette_id';";
			//touch right
		$tch_down_right_bdd = "Update `kiut`.`tbl_touche` set `tch_right` = '1' where `id_touche_manette` = '$manette_id';";
		$tch_up_right_bdd = "Update `kiut`.`tbl_touche` set `tch_right` = '0' where `id_touche_manette` = '$manette_id';";
			//touch down
		$tch_down_down_bdd = "Update `kiut`.`tbl_touche` set `tch_down` = '1' where `id_touche_manette` = '$manette_id';";
		$tch_up_down_bdd = "Update `kiut`.`tbl_touche` set `tch_down` = '0' where `id_touche_manette` = '$manette_id';";
			//touch left
		$tch_down_left_bdd = "Update `kiut`.`tbl_touche` set `tch_left` = '1' where `id_touche_manette` = '$manette_id';";
		$tch_up_left_bdd = "Update `kiut`.`tbl_touche` set `tch_left` = '0' where `id_touche_manette` = '$manette_id';";
		
		//action par touche
		if($touch == 'up')
		{
			if($action == 1)
			{
				//il appuie sur la touche
				$resultat_tch_up = $mysqli->query($tch_down_up_bdd);
				//si il reussi à insérer en bDD
				if($resultat_tch_up)
				{
					$touchOK = 'up';
					$actionOK = '1';
				}else{
					//error
				}
			}else{
				//il n'appuie plus sur la touche
				$resultat_tch_up = $mysqli->query($tch_up_up_bdd);
				if($resultat_tch_up)
				//si il reussi à insérer en bDD
				{
					$touchOK = 'up';
					$actionOK = '0';
				}else{
					//error
				}
			}
		}else if ($touch == 'right')
		{
			if($action == 1)
			{
				$resultat_tch_right = $mysqli->query($tch_down_right_bdd);
				if($resultat_tch_right)
				{
					$touchOK = 'right';
					$actionOK = '1';
				}
			}else{
				$resultat_tch_right = $mysqli->query($tch_up_right_bdd);
				if($resultat_tch_right)
				{
					$touchOK = 'right';
					$actionOK = '0';
				}
			}
		}else if ($touch == 'left')
		{
			if($action == 1)
			{
				$resultat_tch_left = $mysqli->query($tch_down_left_bdd);
				if($resultat_tch_left)
				{
					$touchOK = 'left';
					$actionOK = '1';
				}
			}else{
				$resultat_tch_left = $mysqli->query($tch_up_left_bdd);
				if($resultat_tch_left)
				{
					$touchOK = 'left';
					$actionOK = '0';
				}
			}
		}else if ($touch == 'down')
		{
			if($action == 1)
			{
				$resultat_tch_down = $mysqli->query($tch_down_down_bdd);
				if($resultat_tch_down)
				{
					$touchOK = 'down';
					$actionOK = '1';
				}
			}else{
				$resultat_tch_down = $mysqli->query($tch_up_down_bdd);
				if($resultat_tch_down)
				{
					$touchOK = 'down';
					$actionOK = '0';
				}
			}
		}
	//////////////////////////////////////////////////////////////////////////////////////
	// Fermeture BD

		// Fermeture connection
		$mysqli->close();

	//////////////////////////////////////////////////////////////////////////////////////
	// Données serveur AJAX
	//reponse pour le debuggage

		// AJAX
		$objetJSON = array();
		$objetJSON[] = array("touche" => $touch,"touchOK" => $touchOK, "actionOK" => $actionOK);

		// Serialize
		$donneesServeur = json_encode($objetJSON);

		// Serialize et envoie reponse
		echo "$donneesServeur";
?>
