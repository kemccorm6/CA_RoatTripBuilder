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
    <!-- Stepper CSS -->
    <link href="css/addons-pro/steppers.css" rel="stylesheet">
    <!-- Stepper CSS - minified-->
    <link href="css/addons-pro/steppers.min.css" rel="stylesheet">

    <!-- Stepper JavaScript -->
    <script type="text/javascript" src="js/addons-pro/steppers.js"></script>
    <!-- Stepper JavaScript - minified -->
    <script type="text/javascript" src="js/addons-pro/steppers.min.js"></script>
    <title>User Profile</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .bigbox{
            width:1000px;
            padding: 15px;
            margin:auto;
            height: 1300px;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            margin-bottom: 100px;
        }
        #tabs {
            overflow: hidden;
            width: 1000px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin: auto;
        }

        #tabs li {
            float: left;
            margin: 0 .5em 0 0;
        }
        #tabs li {
            float: left;
            margin: 0 .5em 0 0;
        }

        #tabs a {
            position: relative;
            background: #ddd;
            background-image: linear-gradient(to bottom, #fff, #ddd);
            padding: .7em 3.5em;
            float: left;
            text-decoration: none;
            color: #444;
            text-shadow: 0 1px 0 rgba(255,255,255,.8);
            border-radius: 5px 0 0 0;
            box-shadow: 0 2px 2px rgba(0,0,0,.4);
        }

        #tabs a:hover,
        #tabs a:hover::after,
        #tabs a:focus,
        #tabs a:focus::after {
            background: #fff;
        }

        #tabs a:focus {
            outline: 0;
        }
        #tabs a::after {
            content:'';
            position:absolute;
            z-index: 1;
            top: 0;
            right: -.5em;
            bottom: 0;
            width: 1em;
            background: #ddd;
            background-image: linear-gradient(to bottom, #fff, #ddd);
            box-shadow: 2px 2px 2px rgba(0,0,0,.4);
            transform: skew(10deg);
            border-radius: 0 5px 0 0;
        }

        #tabs #current a,
        #tabs #current a::after {
            background: #fff;
            z-index: 3;
        }

        .triptitle {
            font-size: 20pt;
            background-color: white;
            text-align: center;
            width: 850px;
            margin: auto;
            padding: 10px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            border-radius: 15px;
        }
        .banner {
            width: 900px;
            margin: auto;
            display: block;
            padding-top: 20px;
        }
        .banner1 {
            width: 33%;
            height: 200px;
        }
        img {
object-fit: cover;
        }
        .banner2 {
            width: 33%;
            height: 200px;
        padding: 0;
            margin: 0;
        }
        .banner3 {
            width: 33%;
            height: 200px;
        }



.description {
    width: 850px;
    background-color: #FFFFFF;
    margin: auto;
    height: 70px;
    padding: 10px;
    padding-left: 15px;
    margin-top: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
}
        html, body, .grid-container { height: 80%; margin: auto; }

        .grid-container {
            display: grid;
            grid-template-columns: 0.5fr 2fr;
            grid-template-rows: repeat(6, 1fr);
            gap: 13px 0px;
            margin-top: 50px;
            width: 90%;

            grid-template-areas:
    "start start-location"
    "stop-1 destination-1"
    "stop-2 destination-2"

    "end end-location";
        }

        .start { grid-area: start; }

        .start-location { grid-area: start-location; }

        .stop-1 { grid-area: stop-1; }

        .destination-1 { grid-area: destination-1; }

        .stop-2 { grid-area: stop-2; }



        .end { grid-area: end; }

        .end-location { grid-area: end-location; }

        .destination-2 { grid-area: destination-2; }


        .grid-container * {

            position: relative;
        }


        /* For presentation only, no need to copy the code below */

        #stepcircle{
            width:75px;
            height:75px;
            border-radius: 150px;
            margin: auto;
            background-color: #FFFFFF;
            border: 1px solid white;
text-align: center;
            line-height: 60pt;
            color: black;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);

            top: 25%;
            left: 0%;
        }
        #stopinfo {
            background-color: #FFFFFF;
            padding: 15px;
        }
#locationpicture {
    background-image: url("mountain.jpg");
    width: 130px;
    height: 130px;
  float: left;
   background-size: 100%;
}
#locationname {
    float: left;
    width: 200px;
    font-size: 16pt;
    margin-top: 10px;
    margin-left: 30px;
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
    <div class="profile"> <a href="userprofile.php"><div class="profileimage">My<br>Profile</div> </a></div>
</div>
<hr>
<div class="container">

        <ul id="tabs">
            <li><a href="userprofile.php" name="tab1" id="tab12" style="width: 90px; text-align: center; padding: .7em 1.5em;">BACK</a></li>
        </ul>

    <div class="bigbox">
        <hr><br>
        <div class="triptitle">Roadtrip Name</div>

        <div class="banner">
            <img class="banner1" id="image1" src="fpbg.png">
            <img class="banner2" id="image2" src="fpbg.png">
            <img class="banner3" id="image3" src="fpbg.png">
        </div>

        <div class="description">
            <p> Write a description about your roadtrip. Include goals, ideas, key places and memories!</p>
        </div>

        <div class="steps">
            <div class="grid-container">

                <div class="start" id="step#">
                    <div id="stepcircle">Start</div>
                </div>

                <div class="start-location" id="stopinfo">
                    <div id="locationpicture"></div>
                    <div id="locationname">Location Name</div>
                    <div id="types"></div>
                    <div id="notes"></div>
                </div>

                <div class="stop-1" id="step#">
                    <div id="stepcircle">#1</div>
                </div>

                <div class="destination-1" id="stopinfo"></div>

                <div class="stop-2" id="step#">
                    <div id="stepcircle">#2</div>
                </div>

                <div class="destination-2" id="stopinfo"></div>

                <div class="end" id="step#">
                    <div id="stepcircle">End</div>
                </div>
                <div class="end-location" id="stopinfo"></div>


            </div>

            </div>
        </div>


    </div><!-- Close Big Box -->
</div> <!-- Close Container -->

</body>
