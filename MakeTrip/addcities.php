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
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        body {

            background-image: url("tiretracks.png");
            /*background: linear-gradient(to bottom, #f1f0c9, #ecf2d6);*/
            background-size: 2250px 1250px ;
        }
        .makeatrip {
            width: 100%;

           float: left;
            margin-left: 50px;
text-align: left;
            color: black;
margin-top: 50px;
            margin-bottom: 20px;


        }
        h4 {
            padding: 0;
            margin: 0;
            font-size: 14pt;
        }
        h1 {
            padding: 0;
            margin: 0;
            font-size: 24pt;
        }
        select {
            height: 40px;
            width: 300px;
        }
        .mapAPI {
            width: 700px;
            height: 700px;
            border: 1px solid black;
           float: left;

        }
        .sidebar {
            width: 500px;
            height: 800px;
            border: 2px solid red;

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
        }
        .citybox {
            width: 100%;;
            height: 175px;
            background-color: #FFAC00;
            border-radius: 15px;
            margin-left: 15px;
            margin-top: 15px;
        }
        #cityimage {
            width: 100px;
            height: 130px;
            background-image: url("sanfrancisco.jpg");
            background-size: cover;
           margin-left: 25px;
            border-radius: 15px;
float: left;
        }
        #removecity {
            width: 30px;
            height: 30px;
            border-radius: 100px;
            transform: translate(-10px,-10px);
            font-size: 16pt;
            margin: 0;
            padding: 0;
            float: left;
        }
    </style>
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
API Google Maps
    </div>
    <div class="sidebar">
<div class="citybox">
    <button type="button" id="removecity">X</button>
    <div id="cityimage"></div>
    <div id="cityname">San Francisco</div>
    <div id="citydescription"></div>
    </div>
    </div>
</div>
</body>
</html>
