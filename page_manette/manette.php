<!DOCTYPE html>

<html>
	<!-- En tête -->
	<head>
		<!-- Fichiers CSS -->
		<link rel='stylesheet' type='text/css' href='./css/manette.css' media='screen' />

		<!-- Fichiers Javascripts -->
		<script type='text/javascript' src='./js/jquery-2.0.3.min.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>
		<!-- Javascript pour envoyer les actions sur les touches-->
		<script type='text/javascript' src='./js/envoyer_touche.js'></script>

		<!-- Encodage UTF8 pour les accents -->
		<meta charset='UTF-8'>

		<!-- Icône de l'onglet -->
		<link rel='icon' type='image/png' href='./includes/icon/favicon.png' />

		<!-- Titre de l'onglet -->
		<title>Manette KIUTv2</title>
	</head>
	<!-- Pour permettre à l'utilisateur de pas zoomer -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">


	<!-- Corps du document -->
	<body>
		<!-- Affichage général et canvas -->
		<h1 class='id_manette' style='display:none'>
			001
		</h1>
		<h1>
			Nom utilisateur
		</h1>
		<h2>
			Titre jeu ici
		</h2>
		<div class='affichage' id='canvas'>
			Instructions ici
		</div>
		<!-- Touches déplacement -->
		<div class='bouton' id='up'>
			up
		</div>
		<div class='bouton' id='down'>
			down
		</div>
		<div class='bouton' id='left'>
			left
		</div>
		<div class='bouton' id='right'>
			right
		</div>
		
		<!-- Touches Action -->
		<div class='bouton' id='bouton_A'>
			A
		</div>
		<div class='bouton' id='bouton_B'>
			B
		</div>
		<div class='bouton' id='bouton_C'>
			C
		</div>
		<div class='bouton' id='bouton_D'>
			D
		</div>
		<div class='bouton' id='opt'>
			Options
		</div>
	</body>
</html>
