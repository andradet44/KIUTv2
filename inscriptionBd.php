<?php





	//////////////////////////////////////////////////////////////////////////////////////
	// Données client (sans vérification)
	$login = NULL;
	if (isset($_POST['login'])) {
		$login = $_POST['login'];
	}
	$pwd = NULL;
	if (isset($_POST['pwd'])) {
		$pwd = $_POST['pwd'];
	}
	$pwdConfirm = NULL;
	if (isset($_POST['pwdConfirm'])) {
		$pwdConfirm = $_POST['pwdConfirm'];
	}
	$pseudo = NULL;
	if (isset($_POST['pseudo'])) {
		$pseudo = $_POST['pseudo'];
	}
	$age = NULL;
	if (isset($_POST['age'])) {
		$age = $_POST['age'];
	}





	//////////////////////////////////////////////////////////////////////////////////////
	// Ouverture BD

		// Paramètres de connexion
		include_once("dbConfig.php");

		// Ouverture connexion
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);





	//////////////////////////////////////////////////////////////////////////////////////
	// Requète : Insert

		// Check
		if ($login != NULL && $login != "" && $pwd != NULL && $pwd != "" && $pseudo != NULL && $pseudo != "" && $age != NULL && $age != "" && $pwd == $pwdConfirm) {
			// Requète
			$requete = "INSERT INTO `tblUtilisateurs` (`id`, `login`, `pwd`, `pseudo`, `age`) VALUES (NULL, '$login', '$pwd', '$pseudo', '$age');";
			$resultat = $mysqli->query($requete);
		}





	//////////////////////////////////////////////////////////////////////////////////////
	// Fermeture BD

		// Fermeture connection
		$mysqli->close();





	//////////////////////////////////////////////////////////////////////////////////////
	// Redirection

		if ($resultat) {
			header("Location: login.html");
		} else {
			header("Location: inscription.html");
		}



?>
