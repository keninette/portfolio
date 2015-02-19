/*
 * onload function :
 *	-> adds a special link in #leftDiv to display BTS skill table
 */

window.onload = function() {
	var sNavLong = document.location.href;
	
	// add 'bts tableau de compétences' link
	if (sNavLong.indexOf('nav=projects') > -1) {
		$('#leftDiv').append('<p><a href="view/docs/bts-comp.pdf">Tableau de compétences BTS</a></p>');
	}
        
        // hiding form in contact div
        $('#formContact').css('display','none');
}