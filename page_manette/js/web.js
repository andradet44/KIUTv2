$(document).ready(function(){

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/

	// Clic sur image change son affichage
	jQuery("#aff_2").click(function() {
		jQuery(this).css("visibility", "hidden");
		jQuery("#aff_1").css("visibility", "visible");
	});
	jQuery("#aff_1").click(function() {
		jQuery(this).css("visibility", "hidden");
		jQuery("#aff_2").css("visibility", "visible");
	});
});
