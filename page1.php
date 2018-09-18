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
		while ($ligne = $resultat->fetch_assoc()) {
			$tch_up = $ligne['tch_up'];
		}

		// Destruction résultat
		$resultat->close();

		// Fermeture connection
		$mysqli->close();



	//////////////////////////////////////////////////////////////////////////////////////
	// Données serveur AJAX

		// AJAX 1
		$objetJSON = array();
		$objetJSON[] = array("tch_up" => $tch_up);

		// Serialize
		$donneesServeur = json_encode($objetJSON);

		// Serialize et envoie reponse
		echo "$donneesServeur";


?>