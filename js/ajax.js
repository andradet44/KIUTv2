$(document).ready(function(){

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/

	// Activations des event par touches (tactile)
	var tch_up = jQuery("#up")[0];
	tch_up.addEventListener("touchstart", function(){tch('up','1')}, false);
	tch_up.addEventListener("touchmove", function(){tch('up','1')}, false);
	tch_up.addEventListener("touchend", function(){tch('up','0')}, false);
	tch_up.addEventListener("touchcancel", function(){tch('up','0')}, false);
	tch_up.addEventListener("touchleave", function(){tch('up','0')}, false);

  function up_start(evt) {
  evt.preventDefault();
  var ctx = el.getContext("2d");
  var touches = evt.changedTouches;
        
  for (var i=0; i<touches.length; i++) {
    // ongoingTouches.push(touches[i]);
    // var color = colorForTouch(touches[i]);
    ctx.fillStyle = "#000000";
    ctx.fillRect(touches[i].pageX-50, touches[i].pageY, 4, 4);
  }
}

	/*************************************************/
	/****************** ENVOI AJAX *******************/
	/*************************************************/



	function tch(touch, action) {
		// Remplissage objet JSON
		var manette_id = jQuery(".manette_id").val();
		var objetJSON = {'manette_id': '1', 'action' : action, 'touch' : touch};

		// Serialise objet JSON
		var donneesClient = JSON.stringify(objetJSON);

		// Envoyer donnees JSON
		jQuery.ajax({type: "POST", url: "serveurAJAX1.php", dataType: "JSON", data: 'donneesClient=' + donneesClient,
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
				if (val.touchOK == "up")
				{
					if (val.actionOK == "1")
					{
						jQuery('h2').text("Appuie sur Up");
					}else{
						jQuery('h2').text("Vous avez laché Up");
					}
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
