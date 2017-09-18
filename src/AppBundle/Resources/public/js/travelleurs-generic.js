/**
 * Created by yves on 25/03/17.
 */


    function initJS (){

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
        
        jQuery(".trav-datepicker").datepicker({dateFormat: 'yy-mm-dd'});

        jQuery('.trav-multiselect').multiselect();
    })

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

function openTabAddVoyage(tabName, currentDiv) {

    jQuery(".step-tab").each(function () {
        var $this = jQuery(this);
        if($this.hasClass('show')) $this.removeClass('show').addClass('hidden');
    });

    jQuery('.tab-manager').each(function () {
        jQuery(this).addClass('text-default').removeClass('trav-secondary-color');
    });
    jQuery(tabName).addClass('show').removeClass('hidden');
    jQuery(currentDiv).find('div').eq(0).removeClass('text-default').addClass('trav-secondary-color');


}

function travCheckBoxes(){
    var nameRoot = $(this).attr('name'); // "refSchedSearchData[ages][]";

    nameRoot = nameRoot.substring(0,nameRoot.lastIndexOf('['));

    var group = 'input[type=checkbox][name^="' + nameRoot + '"]';

    var checked = $(this).prop('checked') ? true : false;

    $(group).prop('checked', checked);
}

function hideSteps() {
    $("div").each(function () {
        if ($(this).hasClass("activeStepInfo")) {
            $(this).removeClass("activeStepInfo");
            $(this).addClass("hiddenStepInfo");
        }
    });
}

function disableAll(obj) {
    jQuery("obj :input").attr("disabled", true);
    jQuery("obj :select").attr("disabled", true);
    jQuery("obj :textarea").attr("disabled", true);
}
function openOneTab(obj_btn){

    var btn = jQuery(obj_btn);
    var $div = btn.find('.manage_arrow').eq(0);
    if ($div.hasClass("fa-arrow-circle-left") ) {

        $div.removeClass('fa-arrow-circle-left').addClass('fa-arrow-circle-down');

    } else {

        $div.removeClass('fa-arrow-circle-down').addClass('fa-arrow-circle-left');
    }
}

function showCurrentStepInfo(step) {
    var id = "#" + step;
    $(id).addClass("activeStepInfo");
}


function sliderAgeRange(Vmin, Vmax,idMax,idMin){

    var read_max = jQuery( idMax ).val();
    var read_min = jQuery( idMin ).val();
    
    if(read_max!='' && typeof read_max != 'undefined' && !isNaN(read_max)) Vmax = read_max;
    if(read_min!='' && typeof read_min != 'undefined' && !isNaN(read_min)) Vmin = read_min;

    Vmax    = parseFloat(Vmax);
    Vmin    = parseFloat(Vmin);

    jQuery( "#slider-range" ).slider({
        range: true,
        min: 18,
        max: 100,
        values: [ Vmin, Vmax],
        slide: function( event, ui ) {
            jQuery( idMin ).val( ui.values[ 0 ]);
            jQuery(idMax).val(ui.values[ 1 ] );
        }
    });
    jQuery( idMin ).val( jQuery( "#slider-range" ).slider( "values", 0 ) );
    jQuery(idMax).val(jQuery( "#slider-range" ).slider( "values", 1 ) );

}

/* Google Maps */
var autocompleteEdit1;
var autocompleteEdit2;
var autocompleteProfile;
var autocompleteSearch;
var autocompleteIndexSearch;

function initAutoCompleteMaps(){

    /*Template edit.voyage */
    autocompleteEdit1 = new google.maps.places.Autocomplete(
        (document.getElementById('app_bundle_etape_type_lieuDepart_address')),
        {types: ['geocode']}
    );
    autocompleteEdit2 = new google.maps.places.Autocomplete(
        (document.getElementById('app_bundle_etape_type_lieuArrivee_address')),
        {types: ['geocode']}
    );

    autocompleteEdit1.addListener('place_changed',fillInAddressEtape1);
    autocompleteEdit2.addListener('place_changed',fillInAddressEtape2);

    /*Edit profile */
    autocompleteProfile = new google.maps.places.Autocomplete(
     (document.getElementById('fos_user_profile_form_address')),
        {types: ['geocode']});

    autocompleteProfile.addListener('place_changed',fillInAddressProfile);

    /*Search form */
    autocompleteSearch = new google.maps.places.Autocomplete(
       (document.getElementById('search_voyage_complete_address')),
        {types: ['geocode']});

    autocompleteSearch.addListener('place_changed', fillInSearch);

    autocompleteIndexSearch = new google.maps.places.Autocomplete(
       (document.getElementById('search_voyage_index_address')),
        {types: ['geocode']});

    autocompleteIndexSearch.addListener('place_changed', fillInSearchIndex);
}

function fillInSearch() {
    // Get the place details from the autocompleteProfile object.
    var place = autocompleteSearch.getPlace();
    //console.log(autocompleteProfile);
    if(place){

        document.getElementById('search_voyage_complete_lat').value= place.geometry.location.lat();
        document.getElementById('search_voyage_complete_lng').value = place.geometry.location.lng();

        if(place.place_id)
            document.getElementById('search_voyage_complete_placeId').value    = place.place_id;

        var addressComponent    = place.address_components;
        var locality,administrative_area,country;

        for (var i = 0; i < addressComponent.length; i++){
            var value = addressComponent[i];
            var types = value.types;
            var type0 = types[0];
            switch (type0){
                case 'locality':
                    locality = value.long_name;
                    break;
                case 'administrative_area_level_1':
                    administrative_area = value.long_name;
                    break;
                case 'country':
                    country = value.long_name;
                    break;
            }

        }

        document.getElementById('search_voyage_complete_locality').value = locality;
        document.getElementById('search_voyage_complete_administrative_area').value =administrative_area;
        document.getElementById('search_voyage_complete_country').value = country;


    }else{
        window.alert("No details available for input: '" + place.name + "'");
        return;
    }
}

function fillInSearchIndex() {
    // Get the place details from the autocompleteProfile object.
    var place = autocompleteIndexSearch.getPlace();
    //console.log(autocompleteProfile);
    if(place){

        document.getElementById('search_voyage_index_lat').value= place.geometry.location.lat();
        document.getElementById('search_voyage_index_lng').value = place.geometry.location.lng();

        if(place.place_id)
            document.getElementById('search_voyage_index_placeId').value    = place.place_id;

        var addressComponent    = place.address_components;
        var locality,administrative_area,country;

        for (var i = 0; i < addressComponent.length; i++){
            var value = addressComponent[i];
            var types = value.types;
            var type0 = types[0];
            switch (type0){
                case 'locality':
                    locality = value.long_name;
                    break;
                case 'administrative_area_level_1':
                    administrative_area = value.long_name;
                    break;
                case 'country':
                    country = value.long_name;
                    break;
            }

        }

        document.getElementById('search_voyage_index_locality').value = locality;
        document.getElementById('search_voyage_index_administrative_area').value =administrative_area;
        document.getElementById('search_voyage_index_country').value = country;


    }else{
        window.alert("No details available for input: '" + place.name + "'");
        return;
    }
}

function fillInAddressEtape1() {
// Get the place details from the autocompleteProfile object.
    var place = autocompleteEdit1.getPlace();

    if(place){

        document.getElementById('app_bundle_etape_type_lieuDepart_lat').value= place.geometry.location.lat();
        document.getElementById('app_bundle_etape_type_lieuDepart_lng').value = place.geometry.location.lng();

        if(place.place_id)
            document.getElementById('app_bundle_etape_type_lieuDepart_placeId').value    = place.place_id;

        var addressComponent    = place.address_components;
        var locality,administrative_area,country;

        for (var i = 0; i < addressComponent.length; i++){
            var value = addressComponent[i];
            var types = value.types;
            var type0 = types[0];
            switch (type0){
                case 'locality':
                    locality = value.long_name;
                    break;
                case 'administrative_area_level_1':
                    administrative_area = value.long_name;
                    break;
                case 'country':
                    country = value.long_name;
                    break;
            }

        }

        document.getElementById('app_bundle_etape_type_lieuDepart_locality').value = locality;
        document.getElementById('app_bundle_etape_type_lieuDepart_administrative_area').value =administrative_area;
        document.getElementById('app_bundle_etape_type_lieuDepart_country').value = country;


    }else{
        window.alert("No details available for input: '" + place.name + "'");
        return;
    }
}

function fillInAddressEtape2() {
// Get the place details from the autocompleteProfile object.
    var place = autocompleteEdit2.getPlace();
//console.log(autocompleteProfile);
    if(place){

        document.getElementById('app_bundle_etape_type_lieuArrivee_lat').value= place.geometry.location.lat();
        document.getElementById('app_bundle_etape_type_lieuArrivee_lng').value = place.geometry.location.lng();

        if(place.place_id)
            document.getElementById('app_bundle_etape_type_lieuArrivee_placeId').value    = place.place_id;

        var addressComponent    = place.address_components;
        var locality,administrative_area,country;

        for (var i = 0; i < addressComponent.length; i++){
            var value = addressComponent[i];
            var types = value.types;
            var type0 = types[0];
            switch (type0){
                case 'locality':
                    locality = value.long_name;
                    break;
                case 'administrative_area_level_1':
                    administrative_area = value.long_name;
                    break;
                case 'country':
                    country = value.long_name;
                    break;
            }

        }

        document.getElementById('app_bundle_etape_type_lieuArrivee_locality').value = locality;
        document.getElementById('app_bundle_etape_type_lieuArrivee_administrative_area').value =administrative_area;
        document.getElementById('app_bundle_etape_type_lieuArrivee_country').value = country;


    }else{
        window.alert("No details available for input: '" + place.name + "'");
        return;
    }
}

function fillInAddressProfile() {
    // Get the place details from the autocompleteProfile object.
    var place = autocompleteProfile.getPlace();
    //console.log(autocompleteProfile);
    if(place){

        document.getElementById('fos_user_profile_form_lat').value= place.geometry.location.lat();
        document.getElementById('fos_user_profile_form_lng').value = place.geometry.location.lng();

        if(place.place_id)
            document.getElementsById('fos_user_profile_form_placeId').value    = place.place_id;

        var addressComponent    = place.address_components;
        var locality,administrative_area,country;

        for (var i = 0; i < addressComponent.length; i++){
            var value = addressComponent[i];
            var types = value.types;
            var type0 = types[0];
            switch (type0){
                case 'locality':
                    locality = value.long_name;
                    break;
                case 'administrative_area_level_1':
                    administrative_area = value.long_name;
                    break;
                case 'country':
                    country = value.long_name;
                    break;
            }

        }

        document.getElementById('fos_user_profile_form_locality').value = locality;
        document.getElementById('fos_user_profile_form_administrative_area').value =administrative_area;
        document.getElementById('fos_user_profile_form_country').value = country;


    }else{
        window.alert("No details available for input: '" + place.name + "'");
        return;
    }
}

function geolocateProfil() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocompleteEdit1.setBounds(circle.getBounds());
            autocompleteEdit2.setBounds(circle.getBounds());
        });
    }
}