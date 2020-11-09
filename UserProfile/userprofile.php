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
            width:150px;
            height:150px;
            border: black 1px solid;
            border-radius: 100px;
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

            width:500px;
            height: 200px;
            margin: auto;


        }
        .bigbox{
            width:1200px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;

        }

        .newloc {
            width: 200px;
            background-color: #85A867;
            height: 40px;
            text-align: center;
            font-size: 14pt;
            margin-top: 25px;
            line-height: 30pt;
            border-radius: 15px;

          margin: auto;
            box-shadow: 2px 1px 4px dimgrey;
        }
        .searchbox {
            width: 400px;
            float: right;
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
            width: 1200px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin: auto;
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
            $("#tabs li:first").attr("id","current"); // Activate the first tab
            $("#content #tab1").fadeIn(); // Show first tab's content

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







    <div class="adminacc">
        <div class="adminbox">
            <div class="circleimage"></div>
            <br>
            <h1>Jonny Appleseed</h1>

            Admin

        </div>
        <div class="newloc"> <a href="MakeTrip/maketripMAIN.php">+ Make New Trip</a> </div>
        <br><Br>
        <div id="tabs">
            <ul id="tabs">
                <li><a href="MyRoadtrips" name="tab1">My Roadtrips</a></li>
                <li><a href="SavedTrips" name="tab2">Saved Trips</a></li>
            </ul>

        </div>

        <div class="bigbox">
            <hr>


            <br>
            <div class="searchbox">
                <form action="">
                    <input type="text" id="searchbox" name="locationsearch" placeholder="Search Locations">
                    <input type="submit" id="go" value="Go">
                </form>
            </div>
            <div id="content">
                <div id="tab1">my roadtrips</div>
                <div id="tab2">...</div>

            </div>



        </div>

    </div>
</div>
</div> <!-- close container-->
</body>
</html>


