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

            background-image: url("tiretracks_copy.png");
            /*background: linear-gradient(to bottom, #f1f0c9, #ecf2d6);*/
            background-size: 2250px 1250px ;
        }
.missionbox {
    /*background-color: #f9d793;*/
    background: -webkit-linear-gradient(to bottom, #f6c157, #f9d793);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #f9d793, #f6c157); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    margin: auto;
    width: 50%;
    border-radius: 7px;
    padding-left: 50px;
    padding-right: 50px;
    padding-bottom: 40px;
    padding-top: 10px;
    font-size: 18pt;
    box-shadow: 5px 5px 10px black;
}
.missionlogobox {
    width: 40%;
    margin: auto;
}
        .missionlogo {
            width: 100%;
        }
.missionbox h1 {
    text-align: center;
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
    <div class="profile"><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php"><img class="profileimage" src="myprofile_button-08.png"></a></div>
</div>
<!--<hr>--><br>
<div class="container">
<div class="missionlogobox"><div class="missionlogo"><img class="missionlogo" src="ourmission_logo-07.png"></div></div>
    <br><br>
    <div class="missionbox">California Dreamin’ is a volunteer based platform bringing you all of the best road trip stops up the California coast. Our mission is to bring adventure enthusiasts together through a simple one-stop platform. Head over to “Make a Trip” to begin planning your excursion, browse through photos posted by other users, and publish your adventures for others to see!
        <br><br>
        Because it’s not just a trip, it’s a story to share!</div>




</div>
</body>
</html>
