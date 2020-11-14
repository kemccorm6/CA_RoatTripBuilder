<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ7GDJS8_HYW_ss1-CMpa5_H6ySas7sIQ&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 70%;
            width: 50%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;

            margin: 0;
            padding: 0;
        }
    </style>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });

            newplace = new google.maps.Marker({position: {lat: -34.397, lng: 150.945}, map: map});
            newplace2 = new google.maps.Marker({position: {lat: -34.497, lng: 150.945}, map: map});
            createMarker(newplace);
            createMarker(newplace2);
        }
    </script>
</head>
<body>
<div id="map"></div>
</body>
</html>
<script>

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route(
            {
                origin: {
                    query: document.getElementById("start").value,
                },
                destination: {
                    query: document.getElementById("end").value,
                },
                waypoints: [
                    { location: "Adelaide, SA" },
                    { location: "Broken Hill, NSW" },
                ],
                travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) => {
                if (status === "OK") {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert("Directions request failed due to " + status);
                }
            }
        );
    }

</script>








<!--<script defer-->
<!--        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ih69Nwp8cJZzYoDR6e9rBcasxUkdq0Y&libraries=localContext&v=beta&callback=initMap">-->
<!--</script>-->
<!---->
<!---->
<!---->
<!--<script>-->
<!--    let map;-->
<!---->
<!--    function initMap() {-->
<!--        const localContextMapView = new google.maps.localContext.LocalContextMapView({-->
<!--            element: document.getElementById("map"),-->
<!--            placeTypePreferences: ["restaurant", "tourist_attraction"],-->
<!--            maxPlaceCount: 12,-->
<!--        });-->
<!--        map = localContextMapView.map;-->
<!--        map.setOptions({-->
<!--            center: { lat: 51.507307, lng: -0.08114 },-->
<!--            zoom: 14,-->
<!--        });-->
<!--    }-->
<!--</script>-->