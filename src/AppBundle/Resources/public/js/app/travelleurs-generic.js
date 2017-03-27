/**
 * Created by yves on 25/03/17.
 */


function initJS(){
    jQuery(document).ready(function(){

        
        jQuery('.nav > li > a').each(function () {
            if (window.location.pathname.indexOf(jQuery(this).attr('href')) > -1) {
                jQuery(this).closest('li').addClass('current');
                return false;
            }
        });
    })

}