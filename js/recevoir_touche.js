$(document).ready(function(){

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/


	/*************************************************/
	/****************** ENVOI AJAX *******************/
	/*************************************************/

	
	// Requête AJAX à intervales réguliers (1000 = 1sec.) 
	setInterval(envoi, 1000);

	function envoi() {
		// Remplissage objet JSON
		//vide car aucune info à envoyer, juste recevoir
		var objetJSON = {};

		// Serialise objet JSON
		var donneesClient = JSON.stringify(objetJSON);

		// Envoyer donnees JSON
		jQuery.ajax({type: "POST", url: "ServeurAjaxRecupTouches.php", dataType: "JSON", data: 'donneesClient=' + donneesClient,
			success: function(donneesServeur) {
				// Traiter reponse serveur
				action(donneesServeur);
			}
		});
	}


	/*************************************************/
	/**************** RECEPTION AJAX *****************/
	/*************************************************/

	// Interpretation des touches ici
	// faire en sorte que le java lance des fonctions dans un autre js
	function action(donneesServeur) {
		// Tableau de données
		if (defined(donneesServeur)) {
			for (val of donneesServeur)
			{
				//touch up
				if (val.tch_up == "0")
				{
					jQuery('body').css('backgroundColor', 'red');
				}else{
					jQuery('body').css('backgroundColor', 'blue');
				}
			}
		}
	}




	/*************************************************/
	/******************** UTILES *********************/
	/*************************************************/



	// Teste si une variable est définie
	function defined(myVar) {
		if (typeof myVar != 'undefined') return true;
		return false;
	}
});
