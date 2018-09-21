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
		<h1 class='id_manette' style='display:none'>
			001
		</h1>
		<h1>
			Nom utilisateur
		</h1>
		<h2>
			Titre jeu ici
		</h2>
	<div class='manette'>
		<!-- Affichage général 1 -->	
		<div class='affichage' id='aff_1' style='background-image: url("./includes/icon/btn_typ2_jaune.png");'>
			Instructions ici
		</div>
		<!-- Affichage général 2 -->	
		<div class='affichage' id='aff_2' style='background-image: url("./includes/icon/btn_typ2_rouge.png");'>
			Instructions ici
		</div>
		<!-- Touches déplacement -->
		<div class='bouton' id='up' style='background-image: url("./includes/icon/btn_typ1_up.png");'></div>
		<div class='bouton' id='down' style='background-image: url("./includes/icon/btn_typ1_down.png");'></div>
		<div class='bouton' id='left' style='background-image: url("./includes/icon/btn_typ1_left.png");'></div>
		<div class='bouton' id='right' style='background-image: url("./includes/icon/btn_typ1_right.png");'></div>
		<!-- Touches Action -->
		<div class='bouton' id='bouton_A' style='background-image: url("./includes/icon/btn_typ4_vert.png");'></div>
		<div class='bouton' id='bouton_B' style='background-image: url("./includes/icon/btn_typ4_rouge.png");'></div>
		<div class='bouton' id='bouton_C' style='background-image: url("./includes/icon/btn_typ4_bleu.png");'></div>
		<div class='bouton' id='bouton_D' style='background-image: url("./includes/icon/btn_typ4_jaune.png");'></div>
		<!-- Options -->
		<div class='bouton' id='opt' style='background-image: url("./includes/icon/btn_typ4_options.png");'></div>
	</div>
	<section class='ecran'>
		<h1>Veuillez pivoter votre écran pour accéder à l'interface</h1>
	</section>
	</body>
</html>
