$(document).ready(function(){

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/


	/*************************************************/
	/****************** ENVOI AJAX *******************/
	/*************************************************/

	
	// Requête AJAX à intervales réguliers (1sec.)
	setInterval(envoi, 100);

	function envoi() {
		// Remplissage objet JSON
		var objetJSON = {};

		// Serialise objet JSON
		var donneesClient = JSON.stringify(objetJSON);

		// Envoyer donnees JSON
		jQuery.ajax({type: "POST", url: "page1.php", dataType: "JSON", data: 'donneesClient=' + donneesClient,
			success: function(donneesServeur) {
				// Traiter reponse serveur
				debug(donneesServeur);
			}
		});
	}


	/*************************************************/
	/**************** RECEPTION AJAX *****************/
	/*************************************************/

	// AJAX 1
	function debug(donneesServeur) {
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
