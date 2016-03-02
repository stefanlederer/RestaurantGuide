/**
 * Created by stefan on 21.02.16.
 */
$(document).ready(function () {

    console.log("gmaps");
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
        }
    });
});