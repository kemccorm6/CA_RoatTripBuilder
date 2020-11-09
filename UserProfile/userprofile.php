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

$sql= "INSERT INTO user_data_table " .
    "(username, userpassword, User_Email)" .
    "VALUES" .
    "( " .
    " '" . $_REQUEST["username"] . "', " .
    " '" . $_REQUEST["password"] . "', " .
    " '" . $_REQUEST["email"] . "' " .

    " ) ";

echo $sql;

$results = $mysql->query($sql);

if(!$results){
    echo "Something went wrong check error: " . $mysql->error;
    exit();
}else{
    echo "Congratulations you added the '". $_REQUEST['newtype'] . "' type";


}

?>
<html>
<head>
    <title>Main Locations</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .circleimage{
            width:250px;
            height:250px;
            border: black 1px solid;
            border-radius: 150px;
            float: left;
            margin: 20px;
            color: black;
        }
        .profile {
            width: 10%;
            right: 0;
            height: 50px;
            top: 50px;
            position: absolute;
            /*background-color: red;*/
            float: left;
            padding: 5px;
            color: white;
            margin-right: 30px;
        }
        .profileimage{
            width:120px;
            height:60px;
            border-radius: 100px;
            line-height: 20px;
            text-align: center;
            float: right;
            background-color: #FFD789;
            font-size: 15pt;
            line-height: 18pt;
            font-family: 'Yanone Kaffeesatz', sans-serif;
        }
        .adminbox{
            width:800px;
            height: 300px;
            margin: auto;
            margin-top: 50px;
        }
        #profileinfo {
           float: left;
            width: 400px;
            margin-left: 50px;
        }
        #bio {
            overflow-wrap: normal;
            font-size: 16pt;
        }
        h1 {
         /*   width: 300px;
            background-color: #FFFFFF;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 1px 1px 4px dimgrey; */
        }
        .bigbox{
            width:1000px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
        }

        .newtrip {
            width: 1000px;
            text-align: center;
             margin: auto;
        }
        #newtrip {
            width: 200px;
            font-size: 14pt;
            background-color: #85A867;
            height: 40px;
            line-height: 30pt;
            border-radius: 15px;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 50px;
        }
        .editprofile {
            width: 200px;
            font-size: 14pt;
            background-color:#FFD788;
            height: 40px;

            line-height: 30pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 30px;
        }

        input[id="searchbox"] {
            width: 300px;
            height: 40px;
            font-size: 14pt;
            border-radius: 15px;
            color: #FFAC00;
        }
        input[id="go"] {
            width: 50px;
            height: 40px;
            margin-left: 10px;
            font-size: 14pt;
            background-color: #F06A00;
            border-radius: 15px;
        }
        #tabs {
            overflow: hidden;
            width: 1000px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin: auto;
        }
        #makey a{
            background-color: #85A867;
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
        #content {
            background: #fff;
            padding: 2em;
            height: 220px;
            position: relative;
            z-index: 2;
            border-radius: 0 5px 5px 5px;
            box-shadow: 0 -2px 3px -2px rgba(0, 0, 0, .5);
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#content").find("[id^='tab']").hide(); // Hide all content
            $("#tabs li:nth-child(2)").attr("id","current"); // Activate the first tab
            $("#content #tab2").fadeIn(); // Show first tab's content
            $("#tab12").click(function (){
                window.location.href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/MakeTrip/maketripMAIN.php";
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
    <div class="profile"> <a href="userprofile.php"><div class="profileimage">My<br>Profile</div> </a></div>
</div>
<hr>

<div class="container">

        <div class="adminbox">
            <div class="circleimage"></div>
            <br>
            <div id="profileinfo">
            <h1>Jonny Appleseed</h1>
            <div id="bio">
                <p>I love going on road trips with my puppy.<br> I mostly travel in the Socal area</p>
            </div><!--close bio-->
                <div class="editprofile">
                    <a href="MakeTrip/maketripMAIN.php">Edit Profile</a>
                </div> <!--close edit profile-->
            </div><!--close profile info-->
        </div><!--close admin box-->

        <br><Br>
        <div id="tabs">
            <ul id="tabs">

                <li><a href="MakeTrip/maketripMAIN.php" name="tab1" id="tab12" style="width: 90px; color: #6E8B55;  padding: .7em 1.5em;">+ New Trip</a></li>
                <li><a href="MyRoadtrips" name="tab2">My Roadtrips</a></li>
                <li><a href="SavedTrips" name="tab3">Saved Trips</a></li>
            </ul>
        </div>


        <div class="bigbox">
            <hr>
            <br>
            <div id="content">
                <div id="tab1">make new trip</div>
                <div id="tab2">my roadtrips</div>

                <div id="tab3">...</div>

            </div>
        </div>
    </div>
</div>
</div> <!-- close container-->
</body>
</html>


