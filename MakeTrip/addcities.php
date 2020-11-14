<?php
session_start();
$host = "webdev.iyaclasses.com";
$userid = "kemccorm";
$userpw = "Acad276_McCormick_2109860012";
$db = "kemccorm_roadtripbuilder";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if ($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
if(!empty ($_SESSION["start"])) {
    $usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

    $userresults = $mysql->query($usersql);
    $currentrow = $userresults->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Road Trip Builder</title>
<!--    Google Map Integration-->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ7GDJS8_HYW_ss1-CMpa5_H6ySas7sIQ&callback=initMap&libraries=&v=weekly"
            defer
    ></script>

    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>



        body {

            background-image: url("tiretracks.png");
            /*background: linear-gradient(to bottom, #f1f0c9, #ecf2d6);*/
            background-size: 2250px 1250px ;
        }
        .makeatrip {
            width: 110%;

           float: left;

text-align: left;
            color: black;
margin-top: 50px;
            margin-bottom: 20px;


        }
        h4 {
            padding: 0;
            margin: 0;
            font-size: 14pt;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        h1 {
            padding: 0;
            margin: 0;
            font-size: 24pt;
        }
        select {
            height: 35px;
            width: 200px;
            border-radius: 10px;

        }
        .mapAPI {
            width: 700px;
            height: 700px;
            border: 1px solid black;
           float: left;
            box-shadow: 5px 10px 10px 0 rgba(0,0,0, 0.29);

        }
        .sidebar {
            width: 500px;
            height: 800px;
            float: left;
            margin-left: 30px;
        }
        .container2 {
            width: 1300px;
            margin: auto;
        }
        #savetrip {
            width: 150px;
            float: right;
            height: 40px;
            border-radius: 15px;
            background-color: #6E8B55;
            font-size: 14pt;
            color: white;
margin-right: 80px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.29);

        }
        .citybox {
            width: 100%;;
            height: 175px;
            background-color: #FFFFFF;
            border-radius: 15px;
            margin-left: 15px;
            margin-top: 15px;

            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.29);
        }



        #cityimage {
            width: 100px;
            height: 130px;
            /*background-image: url("sanfrancisco.jpg");*/
            background-size: cover;
           margin-left: 5px;
            margin-top: 22px;
            border-radius: 15px;
float: left;
        }
        #removecity {
            width: 30px;
            height: 30px;
            border-radius: 100px;
            transform: translate(-10px,-10px);
            font-size: 12pt;
            color: white;
            margin: 0;
            padding: 0;
            float: left;
            background-color: orangered;
        }
        #cityname {
            float: left;
            margin-left: 25px;
            margin-top: 20px;
            font-size: 16pt;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        #citydescription {
overflow-wrap: normal;
            float: left;
            width: 63%;
            margin-left: 25px;
            margin-top: 13px;
            font-size: 12pt;
            font-family: 'Poppins Light', sans-serif;
            font-weight: light;
        }
        #filter {
            background-color: darkgrey;
            width: 700px;
            height: 60px;

            display: block;
            top: 0;
            transform: translate(0px,-16px);
        }
        .input {
            float: right;
            margin-right: 40px;


        }
        select {
            margin-top: 10px;
            padding: 0;
        }
        .label {
            float: left;
            margin-left: 15px;
            margin-right: 15px;
            line-height: 45pt;
        }
        #map {
            transform: translate(0px,-16px);
        /*Google map integration*/
            height: 100%;


        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // $(".citybox").click(function (){
            //     window.location.href="../UserProfile/locationdetails.php>";
            //     return false;
            // });
            $("#tab12").click(function (){
                window.location.href="userprofile.php";
                return false;
            });


            $('#tabs a').click(function(e) {
                e.preventDefault();
                if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
                    return;
                }
                else{
                    $("#content").find("[id^='tab']").hide(); // Hide all content
                    $("#tabs li").attr("id",""); //Reset id's
                    $(this).parent().attr("id","current"); // Activate this
                    $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
                }
            });
        });
    </script>
</head>
<body>
<?php include "../masterHTML.php" ?>
<!--<div class="topheader">-->
<!--    <a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/frontpage/frontpageV2.php">-->
<!--        <img src="myalogo1.png" id="logo"></a>-->
<!--    <div class="navbar">-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">LOGIN</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Community/communityMAIN.php">COMMUNITY</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Mission/missionMAIN.php">OUR MISSION</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Team/teamMAIN.php">OUR TEAM</a> </div>-->
<!--    </div>-->
<!--</div>-->
<!--<hr>-->

<?php
$titlesql = "SELECT * FROM city_table WHERE cityID = " . $_REQUEST["citysearchstart"];
$titleresults = $mysql->query($titlesql);
$titlecurrentrow = $titleresults-> fetch_assoc();

$t2 = "SELECT * FROM city_table WHERE cityID = " . $_REQUEST["citysearchend"];
$r2 = $mysql->query($t2);
$cr2 = $r2-> fetch_assoc();

?>
<div class="container">
    <div class="makeatrip">
        <h1>Make a Trip from <em><?php echo $titlecurrentrow["city"] ?></em> to <em><?php echo $cr2["city"] ?></em> </h1>
        <h4>Here are all the locations between your two cities! Delete places you don't <br> wish to visit, and click on the location to get details and save the trip when you are done!</h4>
        <a href="../UserProfile/MyRoadtripDetails.php"><button type="submit" id="savetrip">Save Trip</button></a>
</div><br clear="all"/>
    <div class="container2">
    <div class="mapAPI">
        <div id="filter">
<!--            <form action="addcities.php?typeid=--><?php //echo $currentfilter["typeID"];?><!--&citysearchstart=--><?php //echo $mapstartcurrentrow["cityID"]; ?><!--&citysearchend=--><?php //echo $mapendcurrentrow["cityID"]; ?><!--">-->

            <div class="input">
                Your route will take:
<!--                <select name="citysearch">-->
<!--                    <option value="ALL">Filter By:</option>-->
<!--                    <option value="ALL">--------------</option>-->
<!---->
<!--                    --><?php
//                    $filtersql = "SELECT * FROM type_table";
//                    $filterresults = $mysql->query($filtersql);
//                    while($currentfilter = $filterresults->fetch_assoc()){
//                        echo "<option value='". $currentfilter["typeID"] ."'>" . $currentfilter["type"] . "</option>";
//                    }
//
//                    ?>
<!---->
<!--                </select>-->

<!--                <input type="submit" value="Go">-->
            </div>

            </div>
            </form>
        <?php

        $mapsql = "SELECT * FROM city_table WHERE cityID = " . $_REQUEST["citysearchstart"];
        $mapstartresults = $mysql->query($mapsql);
        $mapstartcurrentrow = $mapstartresults-> fetch_assoc();

//            echo "<br> long = " . $mapstartcurrentrow["city_longitude"] . " lat = " . $mapstartcurrentrow["city_latitude"];


//        echo "<br>";

        // citysearchend

        $mapsqlend = "SELECT * FROM city_table WHERE cityID = " . $_REQUEST["citysearchend"];
        $mapendresults = $mysql->query($mapsqlend);
        $mapendcurrentrow = $mapendresults-> fetch_assoc();

        //Generating trip points

//        echo "start Lat " . $mapstartcurrentrow["city_latitude"] . " end lat " . $mapendcurrentrow["city_latitude"] ;
//        echo "<br>";
        //lat minimum
        $latmin = $mapstartcurrentrow["city_latitude"];
        if($mapendcurrentrow["city_latitude"] < $latmin){
            $latmin = $mapendcurrentrow["city_latitude"];
        }
//        echo "Min Lat " . $latmin;
//        echo "<br>";

        //lat maximum
        $latmax = $mapendcurrentrow["city_latitude"];
        if($mapstartcurrentrow["city_latitude"] > $latmax){
            $latmax = $mapstartcurrentrow["city_latitude"];
        }
//        echo "Max Lat "  . $latmax;
//        echo "<br>";


        //long min
        $longmin = $mapstartcurrentrow["city_longitude"];
        if($mapendcurrentrow["city_longitude"] < $longmin){
            $longmin = $mapendcurrentrow["city_longitude"];
        }
//        echo "Min Long " . $longmin;
//        echo "<br>";

        //long max
        $longmax = $mapendcurrentrow["city_longitude"];
        if($mapstartcurrentrow["city_longitude"] > $longmax){
            $longmax = $mapstartcurrentrow["city_longitude"];
        }
//        echo "Max Long " . $longmax;
//        echo "<br>";
//        echo "<br>";

        $locationsql = "SELECT * FROM location_table WHERE latitude >= " . $latmin . " AND latitude <= " . $latmax .
                       " AND longitude >= " . $longmin . " AND longitude <= " .$longmax;

        $locresults = $mysql->query($locationsql);


//        echo "$locationsql";
//        echo "<br><br><br>";


        ?>

        <script>
            let map;

            var avglatitude = (<?php echo $mapstartcurrentrow["city_latitude"];  ?> + <?php echo $mapendcurrentrow["city_latitude"];  ?>)/2;
            var avglongitude = (<?php echo $mapstartcurrentrow["city_longitude"]; ?> + <?php echo $mapendcurrentrow["city_longitude"];  ?>)/2;


            function initMap() {

                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer();

                const map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: avglatitude, lng: -avglongitude },
                    zoom: 7,
                });

                directionsRenderer.setMap(map);


                //startnewplace = new google.maps.Marker({position: {lat: <?php echo $mapstartcurrentrow["city_latitude"];  ?>, lng: -<?php echo $mapstartcurrentrow["city_longitude"]; ?>}, map: map});

                const trippoint = [] ;
                <?php
                $i = 0;
                while($loccurrentrow = $locresults-> fetch_assoc()){
                //
                    $i += 1;
                    //echo "console.log(" . $i . ");";
                //echo "trippoint[" . $i . "] = " . $i . " ;";
                    //$s = "trippoint[" . $i . "] = new google.maps.Marker({position: {lat: " . $loccurrentrow["latitude"] . ", lng: -" . $loccurrentrow["longitude"] . "}, map: map});";
                    $s = "trippoint.push({ location : { lat: " . $loccurrentrow["latitude"] . ", lng: -" . $loccurrentrow["longitude"] . " } , stopover : true  });";
                    echo "console.log('" . $s . "');" ;
                    echo $s ;

                    //echo "createMarker(trippoint[" . $i . "]);";
                    //echo "console.log( trippoint[" . $i . "] );" ;
                }
                //
                //
                ?>
                //createMarker(trippoint) ;

                //endnewplace = new google.maps.Marker({position: {lat: <?php echo $mapendcurrentrow["city_latitude"];  ?>, lng: -<?php echo $mapendcurrentrow["city_longitude"];  ?>}, map: map});
                // test = new google.maps.Marker({position: {lat: 39.4526, lng: -123.8135}, map: map});
                //createMarker(startnewplace);
                //createMarker(endnewplace);
                // createMarker(test);

                //Draw Route


                directionsService.route(
                    {
                        origin: {lat: <?php echo $mapstartcurrentrow["city_latitude"];  ?>, lng: -<?php echo $mapstartcurrentrow["city_longitude"]; ?> } ,
                        destination: {lat: <?php echo $mapendcurrentrow["city_latitude"];  ?>, lng: -<?php echo $mapendcurrentrow["city_longitude"];  ?>} ,
                        waypoints :  trippoint ,
                        travelMode: google.maps.TravelMode.DRIVING,
                        optimizeWaypoints: true
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


            <div id="map"></div>

<!--        iframe test map-->
<!--        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3308496.245845227!2d-122-->
<!--        .58131165475461!3d35.92364149981422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s-->
<!--        0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA!3m2!1d34.0522342!2d-118.2436-->
<!--        8489999999!4m5!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA!3m2!1d37.-->
<!--        7749295!2d-122.4194155!5e0!3m2!1sen!2sus!4v1604996032683!5m2!1sen!2sus"-->
<!--                width="700" height="650"  frameborder="1"  style="border:0;"-->
<!--                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
    </div>

        <?php



        ?>
    <div class="sidebar">

<!--        Start location-->

<!--        <div class="citybox">-->
<!--          <button type="button" id="removecity">X</button>-->
<!--           <div ><img id="cityimage" src="sanfrancisco.jpg"></div>-->
<!--            <div id="cityname">--><?php //echo $mapstartcurrentrow["city"]; ?><!--</div>-->
<!--            <div id="citydescription">Start City-->
<!--            </div>-->
<!--        </div>-->

<!--        trip points-->
<!--        location_table-->

        <?php

        $locationsql = "SELECT * FROM location_table WHERE latitude >= " . $latmin . " AND latitude <= " . $latmax .
            " AND longitude >= " . $longmin . " AND longitude <= " .$longmax;

        $locresults = $mysql->query($locationsql);

        while($loccurrentrow = $locresults-> fetch_assoc()){

            ?>


            <div class="citybox">

                <button type="button" id="removecity">X</button>
                <div ><a href="MakeTripLocationDetail.php?id=<?php echo $loccurrentrow["locationID"] ?>"><img id="cityimage" src="sanfrancisco.jpg"></a></div>
                <div id="cityname"><?php echo $loccurrentrow["locationname"]; ?></div>
                <div id="citydescription"><?php echo $loccurrentrow["location_description"]; ?>
                 </div>
            </div>


        <?php

            }


        ?>

<!--        End Location-->
<!--        <div class="citybox">-->
<!--            <button type="button" id="removecity">X</button>-->
<!--            <div ><img id="cityimage" src="sanfrancisco.jpg"></div>-->
<!--            <div id="cityname">--><?php //echo $mapendcurrentrow["city"]; ?><!--</div>-->
<!--            <br><br>-->
<!--            <div id="citydescription">End City-->
<!--            </div>-->
<!--        </div>-->


<!--        <div class="citybox">-->
<!--            <button type="button" id="removecity">X</button>-->
<!--            <div id="cityimage" style="background-image: url('sanjose.jpg')"></div>-->
<!--            <div id="cityname">San Jose--><?php //echo $counter; ?><!--</div>-->
<!--            <div id="citydescription">A popular tourist destination, San Francisco is known for its cool summers, fog, steep rolling hills, eclectic mix of architecture, and landmarks, including the Golden Gate Bridge-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="citybox">-->
<!--            <button type="button" id="removecity">X</button>-->
<!--            <div id="cityimage" style="background-image: url('santamaria.jpg')"></div>-->
<!--            <div id="cityname">Santa Maria</div>-->
<!--            <div id="citydescription">A popular tourist destination, San Francisco is known for its cool summers, fog, steep rolling hills, eclectic mix of architecture, and landmarks, including the Golden Gate Bridge-->
<!--            </div>-->
<!--        </div>-->


    </div>
</div>
</body>
</html>
