<?php





	//////////////////////////////////////////////////////////////////////////////////////
	// Données client (avec filtrage)

		// Filtres
		$filtres = array(
			"login" => array(
				"filter" => FILTER_VALIDATE_REGEXP,
				"options" => array(
					"regexp" => "/^[a-z]{2,20}$/"
				)
			),
			"pwd" => array(
				"filter" => FILTER_VALIDATE_REGEXP,
				"options" => array(
					"regexp" => "/^.{6,20}$/"
				)
			)
		);

		// Filtrage
		$post = filter_input_array(INPUT_POST, $filtres);

		// Si valeurs client incorrectes
		if ($post['login'] == "" || $post['pwd'] == "") {
			header("Location: pageLogout.php");
		} else {
			$login = $post['login'];
			$pwd = $post['pwd'];
		}




	//////////////////////////////////////////////////////////////////////////////////////
	// Ouverture BD

		// Paramètres de connexion
		include_once("dbConfig.php");

		// Ouverture connexion
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);





		//////////////////////////////////////////////////////////////////////////////////////
		// Requète : Select

			// Echappe caractères interdits
			$login = $mysqli->real_escape_string($login);
			$pwd = $mysqli->real_escape_string($pwd);

			// Requète
			$requete = "SELECT * FROM `tblUtilisateurs` WHERE login = '$login' AND pwd = '$pwd' ;";
			$resultat = $mysqli->query($requete);

			// Résultat
			$id = NULL;
			while ($ligne = $resultat->fetch_assoc()) {
				$id = $ligne['id'];
			}
			$nbLignes = $resultat->num_rows;

			// Destruction résultat
			$resultat->close();





	//////////////////////////////////////////////////////////////////////////////////////
	// Fermeture BD

		// Fermeture connection
		$mysqli->close();





	//////////////////////////////////////////////////////////////////////////////////////
	// Redirection

		if ($nbLignes == 0) {
			header("Location: login.html");
		} else if ($nbLignes == 1 && $id != NULL) {
			// Ouvre session
			session_start();

			// Enregistre dans session
			$_SESSION['id'] = $id;

			header("Location: page1.php");
		} else {
			echo "<h1>We have a problem !</h1>";
		}



?>
