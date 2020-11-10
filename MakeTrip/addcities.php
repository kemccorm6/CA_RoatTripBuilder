<?php

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
?>
<html>
<head>
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
            background-image: url("sanfrancisco.jpg");
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
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".citybox").click(function (){
                window.location.href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/UserProfile/locationdetails.php";
                return false;
            });
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
<div class="topheader">
    <a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/frontpage/frontpageV2.php">
        <img src="myalogo1.png" id="logo"></a>
    <div class="navbar">
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">LOGIN</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Community/communityMAIN.php">COMMUNITY</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Mission/missionMAIN.php">OUR MISSION</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Team/teamMAIN.php">OUR TEAM</a> </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="makeatrip">
        <h1>Make a Trip</h1>
        <h4>You can drag around locations and delete locations if you wish</h4>
        <button type="button" id="savetrip">Save Trip</button>
</div><br clear="all"/>
    <div class="container2">
    <div class="mapAPI">
        <div id="filter">
            <form>

            <div class="input">
                <select name="citysearch">
                    <option value="ALL">Filter By:</option>
                    <option value="ALL">--------------</option>
                </select>
            </div>
        </div>
            </form>

        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3308496.245845227!2d-122
        .58131165475461!3d35.92364149981422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s
        0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA!3m2!1d34.0522342!2d-118.2436
        8489999999!4m5!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA!3m2!1d37.
        7749295!2d-122.4194155!5e0!3m2!1sen!2sus!4v1604996032683!5m2!1sen!2sus"
                width="700" height="650"  frameborder="1"  style="border:0;"
                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="sidebar">
<div class="citybox">
    <button type="button" id="removecity">X</button>
    <div id="cityimage"></div>
    <div id="cityname">San Francisco</div>
    <div id="citydescription">A popular tourist destination, San Francisco is known for its cool summers, fog, steep rolling hills, eclectic mix of architecture, and landmarks, including the Golden Gate Bridge
    </div>
    </div>

        <div class="citybox">
            <button type="button" id="removecity">X</button>
            <div id="cityimage" style="background-image: url('sanjose.jpg')"></div>
            <div id="cityname">San Jose</div>
            <div id="citydescription">A popular tourist destination, San Francisco is known for its cool summers, fog, steep rolling hills, eclectic mix of architecture, and landmarks, including the Golden Gate Bridge
            </div>
        </div>

        <div class="citybox">
            <button type="button" id="removecity">X</button>
            <div id="cityimage" style="background-image: url('santamaria.jpg')"></div>
            <div id="cityname">Santa Maria</div>
            <div id="citydescription">A popular tourist destination, San Francisco is known for its cool summers, fog, steep rolling hills, eclectic mix of architecture, and landmarks, including the Golden Gate Bridge
            </div>
        </div>

        <div class="citybox">
            <button type="button" id="removecity">X</button>
            <div id="cityimage" style="background-image: url('santabarbara.jpg')"></div>
            <div id="cityname">Santa Barbara</div>
            <div id="citydescription">A popular tourist destination, San Francisco is known for its cool summers, fog, steep rolling hills, eclectic mix of architecture, and landmarks, including the Golden Gate Bridge
            </div>
        </div>
    </div>
</div>
</body>
</html>
