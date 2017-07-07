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
                url: Routing.generate('api_1_getcitylistCities',{'term':this.value},true),
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

function resetActive(event, percent, step) {
    $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
    $(".progress-completed").text(percent + "%");

    $("div").each(function () {
        if ($(this).hasClass("activestep")) {
            $(this).removeClass("activestep");
        }
    });

    if (event.target.className == "col-md-2") {
        $(event.target).addClass("activestep");
    }
    else {
        $(event.target.parentNode).addClass("activestep");
    }

    hideSteps();
    showCurrentStepInfo(step);
}

function hideSteps() {
    $("div").each(function () {
        if ($(this).hasClass("activeStepInfo")) {
            $(this).removeClass("activeStepInfo");
            $(this).addClass("hiddenStepInfo");
        }
    });
}

function showCurrentStepInfo(step) {
    var id = "#" + step;
    $(id).addClass("activeStepInfo");
}