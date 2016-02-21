/**
 * Created by stefan on 02.02.16.
 */
$(document).ready(function() {

    $lat = $("#CoordinateLati").text();
    $lng = $("#CoordinateLong").text();
    $restaurantName = $("#informationPosition:first").text();

    //get Google Maps
    var map = new GMaps({
        div: '#routemap',
        lat: $lat,
        lng: $lng
    });

    //set a marker at the position of the restaurant
    map.addMarker({
        lat: $lat,
        lng: $lng,
        infoWindow: {
            content: $restaurantName
        }
    });

    //get my Location
    GMaps.geolocate({
        success: function (position) {
            map.setCenter(position.coords.latitude, position.coords.longitude);
            $mylat = position.coords.latitude;
            $mylng = position.coords.longitude;

            //set a marker at my position
            map.addMarker({
                lat: $mylat,
                lng: $mylng,
                infoWindow: {
                    conent: "Hier bin ich"
                }
            });

            //draw Route from my position to the position of the restaurant
            map.drawRoute({
                origin: [$mylat, $mylng],
                destination: [$lat, $lng],
                travelMode: 'driving',
                strokeColor: '#045FB4',
                strokeOpacity: 0.6,
                strokeWeight: 6
            });
        },
        error: function (error) {
            alert('Geolocation failed: ' + error.message);
        },
        not_supported: function () {
            alert("Your browser does not support geolocation");
        }
    });

});