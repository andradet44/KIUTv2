$(document).ready(function(){

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/

	// Activations des event par touches (tactile)
	//trouve la touche up
	var tch_up = jQuery("#up")[0];
	//start et move lance action = 1
	tch_up.addEventListener("touchstart", function(){tch('up','1')}, false);
	tch_up.addEventListener("touchmove", function(){tch('up','1')}, false);
	//le reste désactive automatiquement
	tch_up.addEventListener("touchend", function(){tch('up','0')}, false);
	tch_up.addEventListener("touchcancel", function(){tch('up','0')}, false);
	tch_up.addEventListener("touchleave", function(){tch('up','0')}, false);
	//trouve la touche right
	var tch_right = jQuery("#right")[0];
	tch_right.addEventListener("touchstart", function(){tch('right','1')}, false);
	tch_right.addEventListener("touchmove", function(){tch('right','1')}, false);
	tch_right.addEventListener("touchend", function(){tch('right','0')}, false);
	tch_right.addEventListener("touchcancel", function(){tch('right','0')}, false);
	tch_right.addEventListener("touchleave", function(){tch('right','0')}, false);
	//trouve la touche down
	var tch_down = jQuery("#down")[0];
	tch_down.addEventListener("touchstart", function(){tch('down','1')}, false);
	tch_down.addEventListener("touchmove", function(){tch('down','1')}, false);
	tch_down.addEventListener("touchend", function(){tch('down','0')}, false);
	tch_down.addEventListener("touchcancel", function(){tch('down','0')}, false);
	tch_down.addEventListener("touchleave", function(){tch('down','0')}, false);
	//trouve la touche left
	var tch_left = jQuery("#left")[0];
	tch_left.addEventListener("touchstart", function(){tch('left','1')}, false);
	tch_left.addEventListener("touchmove", function(){tch('left','1')}, false);
	tch_left.addEventListener("touchend", function(){tch('left','0')}, false);
	tch_left.addEventListener("touchcancel", function(){tch('left','0')}, false);
	tch_left.addEventListener("touchleave", function(){tch('left','0')}, false);
	


	/*************************************************/
	/****************** ENVOI AJAX *******************/
	/*************************************************/



	function tch(touch, action)
	{
		// Remplissage objet JSON
		var manette_id = jQuery(".manette_id").val();
		var objetJSON = {'manette_id': '1', 'action' : action, 'touch' : touch};

		// Serialise objet JSON
		var donneesClient = JSON.stringify(objetJSON);

		// Envoyer donnees JSON
		jQuery.ajax({type: "POST", url: "ServeurAjaxTouches.php", dataType: "JSON", data: 'donneesClient=' + donneesClient,
			success: function(donneesServeur) {
				// debug si ça marche et si seulement c'est nécessaire
				debug(donneesServeur);
			}
		});
	}

	/*************************************************/
	/**************** RECEPTION AJAX *****************/
	/*************************************************/

	// Si on nécessite un debug
	// dans ce cas on utilisera le debug pour changer l'opcaité des boutons
	//les boutons sont foncés si l'on appuie sinon il reste transparent
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
						//le bouton est appuyé
						jQuery("#up").css("opacity", "1");
					}else{
						//le bouton n'est pas appuyé
						jQuery("#up").css("opacity", "0.7");
					}
				} else 	if (val.touchOK == "right")
				{
					if (val.actionOK == "1")
					{
						//le bouton est appuyé
						jQuery("#right").css("opacity", "1");
					}else{
						//le bouton n'est pas appuyé
						jQuery("#right").css("opacity", "0.7");
					}
				} else 	if (val.touchOK == "left")
				{
					if (val.actionOK == "1")
					{
						//le bouton est appuyé
						jQuery("#left").css("opacity", "1");
					}else{
						//le bouton n'est pas appuyé
						jQuery("#left").css("opacity", "0.7");
					}
				} else 	if (val.touchOK == "down")
				{
					if (val.actionOK == "1")
					{
						//le bouton est appuyé
						jQuery("#down").css("opacity", "1");
					}else{
						//le bouton n'est pas appuyé
						jQuery("#down").css("opacity", "0.7");
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
