<?php

	//////////////////////////////////////////////////////////////////////////////////////
	// Ouverture BD

		// Paramètres de connexion
		include_once("dbConfig.php");

		// Ouverture connexion
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);


	//////////////////////////////////////////////////////////////////////////////////////
	// Requète : Select

		// Requète
		$requete = "SELECT * FROM `tbl_touche` WHERE 1;";
		$resultat = $mysqli->query($requete);

		// Résultat
		$tch_up = NULL;
		while ($ligne = $resultat->fetch_assoc())
		{
			//Recupere l'id de la manette en question
			$manette_id = $ligne['id_touche_manette'];
			//recupere les touches
			$tch_up = $ligne['tch_up'];
			$tch_right = $ligne['tch_right'];
			$tch_down = $ligne['tch_down'];
			$tch_left = $ligne['tch_left'];
			//renvoi les reponses
			// AJAX 1
			$objetJSON = array();
			$objetJSON[] = array("manette_id" => $manette_id, "tch_up" => $tch_up, "tch_right" => $tch_right, "tch_down" => $tch_down, "tch_left" => $tch_left);

			// Serialize
			$donneesServeur = json_encode($objetJSON);

			// Serialize et envoie reponse
			echo "$donneesServeur";
		}

		// Destruction résultat
		$resultat->close();

		// Fermeture connection
		$mysqli->close();



	//////////////////////////////////////////////////////////////////////////////////////
	// Données serveur AJAX




?>