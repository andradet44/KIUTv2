<?php





	//////////////////////////////////////////////////////////////////////////////////////
	// Logout

		// Ouverture session
		session_start();

		// Destruction variables de session
		session_unset();

		// Fermeture session, retour page accueil
		if (session_destroy()) {
			header("Location: index.php");
		}
?>
