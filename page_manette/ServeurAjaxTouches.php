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
	//select
		//selectionne dans la bdd les touches sur lesquels la manette appuie
		$select_tch_bdd = "SELECT * FROM `tbl_touche` where `id_touche_manette` = '$manette_id';";
		$resultat_tch = $mysqli->query($select_tch_bdd);
		
		//recup des touches et stock dans des variables
		while ($ligne = $resultat_tch->fetch_assoc()) 
		{
			//id de la manette
			$id_touche_manette = $ligne['id_touche_manette'];
			//deplacements
			$tch_up = $ligne['tch_up'];
			$tch_down = $ligne['tch_down'];
			$tch_left = $ligne['tch_left'];
			$tch_right = $ligne['tch_right'];
			//actions
			
		}
		//On detruit le resultat
		$resultat_tch->close();
		
	//////////////////////////////////////////////////////////////////////////////////////
	// Requète : update
	//mettre les touches en BDD
	
		// Requète pour mettre la touche en up ou l'enlever 
		//"up" veut dire que le joueur lâche et "down" que le joueur appuie
		//on met à 0 lorsqu'il lâche et 1 lorsqu'il appuie
			//touch up
		$tch_down_up_bdd = "Update `kiut`.`tbl_touche` set `tch_up` = '1' where `id_touche_manette` = '$id_touche_manette';";
		$tch_up_up_bdd = "Update `kiut`.`tbl_touche` set `tch_up` = '0' where `id_touche_manette` = '$id_touche_manette';";
			//touch right
		$tch_down_right_bdd = "Update `kiut`.`tbl_touche` set `tch_right` = '1' where `id_touche_manette` = '$id_touche_manette';";
		$tch_up_right_bdd = "Update `kiut`.`tbl_touche` set `tch_right` = '0' where `id_touche_manette` = '$id_touche_manette';";
			//touch down
		$tch_down_down_bdd = "Update `kiut`.`tbl_touche` set `tch_down` = '1' where `id_touche_manette` = '$id_touche_manette';";
		$tch_up_down_bdd = "Update `kiut`.`tbl_touche` set `tch_down` = '0' where `id_touche_manette` = '$id_touche_manette';";
			//touch left
		$tch_down_left_bdd = "Update `kiut`.`tbl_touche` set `tch_left` = '1' where `id_touche_manette` = '$id_touche_manette';";
		$tch_up_left_bdd = "Update `kiut`.`tbl_touche` set `tch_left` = '0' where `id_touche_manette` = '$id_touche_manette';";
		
		//action par touche
		if($touch = 'up')
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
		$objetJSON[] = array("touchOK" => $touchOK, "actionOK" => $actionOK);

		// Serialize
		$donneesServeur = json_encode($objetJSON);

		// Serialize et envoie reponse
		echo "$donneesServeur";
?>
