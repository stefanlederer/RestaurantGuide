/**
 * Created by stefan on 21.02.16.
 */
$(document).ready(function () {

    var lng;
    var lat;
    var streetnumber;
    var streetname;
    var plz;
    var place;
    //get Google Maps
    var map2 = new GMaps({
        div: '#newRestaurantMap',
        lat: 47.802904,
        lng: 12.9863902,
        zoom: 11,
        click: function(e) {
            map2.removeMarkers();
            map2.addMarker({
                lat: oldlat = e.latLng.lat(),
                lng: oldlng = e.latLng.lng(),
                title: 'Ausgewählter Ort'
            });
            lat = e.latLng.lat();
            lng = e.latLng.lng();
            GMaps.geocode({
                lng: lng,
                lat: lat,
                callback: function (results) {
                    var allResult = results[0];
                    console.log(allResult);
                    streetnumber = allResult.address_components[0].long_name;
                    streetname = allResult.address_components[1].long_name;
                    plz = allResult.address_components[6].long_name;
                    place = allResult.address_components[2].long_name;
                }
            });

            $(".form-lat").val(lat);
            $(".form-lng").val(lng);
            $(".form-street").val(streetname);
            $(".form-streetnumber").val(streetnumber);
            $(".form-plz").val(plz);
            $(".form-place").val(place);

            $("#newRestaurantForm").slideDown();
            $("#slider").removeClass("fa fa-sort-desc").addClass("fa fa-sort-asc");
        }
    });
});