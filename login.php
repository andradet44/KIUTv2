<!DOCTYPE html>

<html>
	<!-- En tête -->
	<head>
		<!-- Fichiers CSS -->
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />

		<!-- Fichiers Javascripts -->
		<script type='text/javascript' src='./js/jquery-2.0.3.min.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>
		<script type='text/javascript' src='./js/ajax2.js'></script>

		<!-- Encodage UTF8 pour les accents -->
		<meta charset='UTF-8'>

		<!-- Icône de l'onglet -->
		<link rel='icon' type='image/png' href='./images/favicon.png' />

		<!-- Titre de l'onglet -->
		<title></title>
	</head>



	<!-- Corps du document -->
	<body>
		<!-- Wrapper -->
		<div class='wrapper'>

			<section>
				<h2>Login</h2>
				<h3 class='statique'>login.html</h3>
				<article>
					<form action='testLogin.php' method='post'>
						<input type='text' name='login' placeholder='Login' pattern='[a-z]{2,20}' title='Entre 2 et 20 minuscules'>
						<input type='password' name='pwd' placeholder='Mot de passe' pattern='.{6,20}' title='Entre 6 et 20 caractères'>
							<input type='submit' value='OK'>
					</form>
				</article>
			</section>

		</div>
	</body>
</html>
