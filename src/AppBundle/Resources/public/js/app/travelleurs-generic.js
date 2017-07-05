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

        jQuery('.pimp_my_menu > div > a').each(function () {
            if (window.location.pathname.indexOf(jQuery(this).attr('href')) > -1) {
                jQuery(this).addClass('current');
                return false;
            }
        });

        autocompleteCountry();
    })

}



function autocompleteCountry(){
    jQuery( ".auto_country" ).autocomplete({
        source:function( request, response ) {
            $.ajax({
                url: Routing.generate('get_countries',this.value),
                dataType: "jsonp",
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function( event, ui ) {
            log( ui.item ?
            "Selected: " + ui.item.label :
            "Nothing selected, input was " + this.value);
        },
        open: function() {
            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
        },
        close: function() {
            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
        }
    });
}

function log( message ) {
    jQuery( "<div>" ).text( message ).prependTo( "#log" );
    $( "#log" ).scrollTop( 0 );
}