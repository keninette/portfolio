/* 
 * Functions used on home screen
 */

/**
 * Features :
 *  - Stretches contact div to increase its height
 *  - Adds all forms required for contact section
 *  - Changes clicked img meta to 1 and alt to "^"
 *  OR
 *  - Hide contact form
 *  - Diminish contact div height
 *  - Changes clicked img meta to "0" and alt to "v"
 * @param {none}
 * @returns {none}
 */
function showContact(){
    // meta = 0 : form not displayed
    if($('#contactArrow').attr('meta') === '0'){
        $('#optContact').animate({height:"+=145"});
        $('#formContact').css('display','block');
        $('#contactArrow').attr('meta','1');
        $('#contactArrow').attr('alt','↑');
    // meta = 1 : form displayed
    } else {
        $('#formContact').css('display','none');
        $('#optContact').animate({height:"-=145"});
        $('#contactArrow').attr('meta','0');
        $('#contactArrow').attr('alt','↓');
    }
}

