/**
 * Created by stefan on 21.02.16.
 */
$(document).ready(function () {

    //get Google Maps
    var map = new GMaps({
        div: '#newRestaurantMap',
        lat: 47.802904,
        lng: 12.9863902,
        zoom: 11
    });

    map.setContextMenu({
        control: 'map',
        options: [{
            title: 'Wählen sie einen Ort aus',
            name: 'add_marker',
            action: function (e) {
                this.addMarker({
                    lat: e.latLng.lat(),
                    lng: e.latLng.lng(),
                    title: 'Ausgewählter Ort'
                });
            }
        }]
    });
});