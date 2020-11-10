
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

if (empty($_SESSION["start"])){

    if(!empty($_REQUEST["newusername"])){


    $sql= "INSERT INTO user_data_table " .
        "(username, userpassword, User_Email)" .
        "VALUES" .
        "( " .
        " '" . $_REQUEST["newusername"] . "', " .
        " '" . $_REQUEST["newpassword"] . "', " .
        " '" . $_REQUEST["newemail"] . "' " .

        " ) ";



    $results = $mysql->query($sql);

    if(!$results){
        echo "Something went wrong check error: " . $mysql->error;
        exit();
    }
        $_SESSION["username"] = $_REQUEST["newusername"];
        $_SESSION["password"] = $_REQUEST["newpassword"];

    }else {


        $_SESSION["username"] = $_REQUEST["usernamel"];
        $_SESSION["password"] = $_REQUEST["passwordl"];

    }

    $usersql = "SELECT * FROM user_data_table WHERE username='" . $_SESSION["username"] . "' AND userpassword = '" . $_SESSION["password"] . "' ";
    //echo $usersql;

    $userresults = $mysql-> query($usersql);
    $currentrow = $userresults->fetch_assoc();


    if(!$userresults){
        echo "Something went wrong check error: " . $mysql->error;
        echo "<a href='../Login/CA_RoadTripLOGIN.php'>Go Back to Login</a>";
        exit();
    }


    $_SESSION["IsAdmin"] = $currentrow["Is_Admin"];
    $_SESSION["UserId"] = $currentrow["userID"];

    $_SESSION["start"] = "started";


} else {
    $usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"] ;
//    echo "hello" . $usersql;

    $userresults = $mysql-> query($usersql);
    $currentrow = $userresults->fetch_assoc();
}












//    echo $currentrow["username"];


?>
<html>
<head>
    <script src="http://code.jquery.com/jquery.js"></script>

    <title>User Profile</title>
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
            top: 35px;
            position: absolute;

            float: left;
            padding: 5px;
            color: white;
            margin-right: 30px;
        }
        .profileimage{
            width:120px;
            height:60px;
            border-radius: 100px;

            float: right;


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

        .bigbox{
            width:1000px;
            padding: 15px;
            margin:auto;
           height: 1000px;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            margin-bottom: 100px;
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

            padding: 2em;
            height: auto;
            position: relative;
            z-index: 2;
            border-radius: 0 5px 5px 5px;
            box-shadow: 0 -2px 3px -2px rgba(0, 0, 0, .5);
            font-family: 'Poppins', sans-serif;
        }
        .prodtile {
            width: 20vw;
            min-height: 10vw;
            padding: 2vw;
            margin-top: 1vw;
            margin-left: 4vw;
            background-color: #FFFFFF;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
            float: left;

            font-weight: 100 / 300 / 500 / 700 / 900;
            font-style: normal;
        }
        .prodtile:hover {
            width: 21vw;
            min-height: 11vw;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }
        .roadtripinfo {

            margin-top: 10px;
        }
        #triptitle {
            font-size: 16pt;
        }
        #tripnotes {
            font-size: 12pt;
            padding-top: 10px;
        }
        #prodtile1 {
        }
        #prodtile2 {
        }
        #prodtile3 {
        }

        #prodtile4 {

        }

        .prodimgtile {
            width: 100%;
            border-radius: 10px;
            min-height: 20vw;
            background-color: #6E8B55;

        }

        #prodimgtile1 {
            background-image: url("fpbg.png");
            background-size: 110%;
            background-position: center;
            background-repeat: no-repeat;
        }
        #prodimgtile2 {
            background-image: url("fpbg.png");
            background-size: 110%;
            background-position: top;
            background-repeat: no-repeat;
        }
        #prodimgtile3 {
            background-image: url("fpbg.png");
            background-size: 110%;
            background-position: bottom;
            background-repeat: no-repeat;
        }
        #prodimgtile4 {
            background-image: url("fpbg.png");
            background-size: 110%;
            background-position: center bottom;
            background-repeat: no-repeat;
        }
        h3 {
            text-align: center;
            padding: 0;
            margin: 0;
        }
        #logged {
            float: right;
            font-size: 14pt;
           bottom: 0;
            line-height: 35pt;
            font-family: 'Poppins';
            font-weight: 300;

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
            $(".prodtile").click(function (){
                window.location.href="MyRoadtripDetails.php";
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
    <a href="../frontpage/frontpageV2.php">
        <img src="myalogo1.png" id="logo"></a>
    <div class="navbar">
        <?php
        if(!empty($_SESSION["start"])){
            echo "<div class='profile'><a href='../UserProfile/userprofile.php?id=". $_SESSION["UserId"] ."'>";
            echo "<img class='profileimage' src='../myprofile_button-07.png'></a></div>";
        }else{
            echo "<div class='navitem'><br><br><a href='../Login/CA_RoadTripLOGIN.php'>LOGIN</a> </div>";
        }

        ?>

        <div class="navitem"><br><br><a href="../MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>
        <div class="navitem"><br><br><a href="../Community/communityMAIN.php">COMMUNITY</a> </div>
        <div class="navitem"><br><br><a href="../Mission/missionMAIN.php">OUR MISSION</a> </div>
        <div class="navitem"><br><br><a href="../Team/teamMAIN.php">OUR TEAM</a> </div>


    </div>

<!--    <div class="profile"><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/UserProfile/userprofile.php">-->
<!--            <img class="profileimage" src="myprofile_button-07.png"></a></div>-->
    <div id="logged"><br><br>Hi <?php echo $currentrow["User_Real_Name"] ?> !</div>
</div>
<hr>

<div class="container">

<!--    LOG OUT BUTTON-->
    <form action="../Login/CA_RoadTripLOGIN.php">
        <input type="submit" value="LOG OUT" id="logoutbutton">
    </form>


<!--    <a href="../Login/CA_RoadTripLOGIN.php">LOG OUT</a> --><?php // ?>

        <div class="adminbox">
            <div><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"]; ?>"</div>
            <br>
            <div id="profileinfo">
            <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
            <div id="bio">
                <p><?php echo $currentrow["User_Description"]; ?></p>
            </div><!--close bio-->
                <div class="editprofile">
                    <a href="editprofile.php?id=<?php echo $_SESSION["UserId"]; ?>">Edit Profile</a>
                </div> <!--close edit profile-->
            </div><!--close profile info-->
        </div><!--close admin box-->

    <?php
    if($_SESSION["IsAdmin"] == 1){
        echo "<form action='../Admin/adminmainLOCATION.php?id=". $_SESSION["UserId"] ."'><input type='submit' value='Main Admin Page'></form>";
    }
    ?>


        <br><Br>
        <div id="tabs">
            <ul id="tabs">

                <li><a href="MakeTrip/maketripMAIN.php?id=<?php echo $_SESSION["UserId"]; ?>" name="tab1" id="tab12" style="width: 90px; color: #6E8B55;  padding: .7em 1.5em;">+ New Trip</a></li>
                <li><a href="MyRoadtrips" name="tab2">My Roadtrips</a></li>
                <li><a href="SavedTrips" name="tab3">Saved Trips</a></li>
            </ul>
        </div>


        <div class="bigbox">
            <hr>
            <br>
            <div id="content">
                <div id="tab1">make new trip

                </div>

                <div id="tab2">
                    <h3>My Roadtrips</h3>
                    <div class="prodtile" id="prodtile1">
                        <div class="prodimgtile" id="prodimgtile1"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Forest Mountain Trip </div>
                            <div id="tripnotes"> Trip ideas for the Fall </div>
                        </div>
                    </div>
                    <div class="prodtile" id="prodtile2">
                        <div class="prodimgtile" id="prodimgtile2"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Beach Trip </div>
                            <div id="tripnotes"> Trip ideas for the Summer </div>
                        </div>
                    </div>
                    <div class="prodtile" id="prodtile3">
                        <div class="prodimgtile" id="prodimgtile3"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Desert Trip </div>
                            <div id="tripnotes"> Trip ideas for the Spring </div>
                        </div>
                    </div>
                    <div class="prodtile" id="prodtile4">
                        <div class="prodimgtile" id="prodimgtile4"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Desert Trip </div>
                            <div id="tripnotes"> Trip ideas for the Winter </div>
                        </div>
                    </div>


                </div> <!-- Close tab 2-->

                <div id="tab3">
                    <h3>Saved Trips</h3>
                    <div class="prodtile" id="prodtile1">
                        <div class="prodimgtile" id="prodimgtile1"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Forest Mountain Trip </div>
                            <div id="tripnotes"> Trip ideas for the Fall </div>
                        </div>
                    </div>
                    <div class="prodtile" id="prodtile2">
                        <div class="prodimgtile" id="prodimgtile2"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Beach Trip </div>
                            <div id="tripnotes"> Trip ideas for the Summer </div>
                        </div>
                    </div>
                    <div class="prodtile" id="prodtile3">
                        <div class="prodimgtile" id="prodimgtile3"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Desert Trip </div>
                            <div id="tripnotes"> Trip ideas for the Spring </div>
                        </div>
                    </div>
                    <div class="prodtile" id="prodtile4">
                        <div class="prodimgtile" id="prodimgtile4"></div>
                        <div class="roadtripinfo">
                            <div id="triptitle"> Desert Trip </div>
                            <div id="tripnotes"> Trip ideas for the Winter </div>
                        </div>
                    </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
</div> <!-- close container-->
</body>
</html>


