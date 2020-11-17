
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
    }else{

        $message = "Hello " . $_REQUEST["newusername"] . ", welcome to " . "<a href='http://webdev.iyaclasses.com/~kemccorm/CA_RoatTripBuilder/frontpage/frontpageV2.php'>" . "California Dreamin!" . "</a>" . " A road trip building app for California Explorers. Click Make A Trip to get started and explore our database of beautiful roadside attractions and national parks. After your trip, save and publish your route for others to see! And don't forget to leave a review at your favorite stops.
        Happy exploring!" . "<img src='http://webdev.iyaclasses.com/~kemccorm/CA_RoatTripBuilder/myalogo1.png' alt=''>"; //message here


        $emailSubject = "Welcome to California Dreamin!";
        $to = $_REQUEST["newemail"];

        //change the webmaster@example.com to whatever email address you want it to come from
     $headers = 'From: kwyllie@webdev.iyaclasses.com' . "\r\n" .
        'Reply-To: kwyllie@webdev.iyaclasses.com' . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-type:text/html;charset=iso-8859-1';

        //send email
        $mail= mail($to, $emailSubject, $message, $headers);
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
    //print_r($userresults);


    if($userresults->num_rows == 0 ){
        header("Location: ../Login/CA_RoadTripLOGIN.php");
//        echo "Something went wrong check error: " . $mysql->error;
//        echo "<a href='../Login/CA_RoadTripLOGIN.php'>Go Back to Login</a>";
        exit();
    }

    $currentrow = $userresults->fetch_assoc();


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

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .circleimage{
           width: 250px;
            height: 250px;

            clip-path: circle(250px at center);
            border: black 1px solid;
            border-radius: 150px;
            float: left;
            margin: 20px;
            color: black;
        }


        .adminbox{
            width:900px;
            height: 200px;
            margin: auto;
            display: block;
            margin-top: 0px;
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
            width: 100px;
            font-size: 14pt;
            background-color:#FFD788;
            height: 40px;
            line-height: 30pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 30px;
            text-decoration: none;
            text-decoration-color: #FFFFFF;
            float: left;
        }
        #adminpage {
            float: left;
            width: 160px;
            font-size: 12pt;
            background-color:#FFD788;
            height: 40px;
            line-height: 30pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 30px;
            color: #FFFFFF;
            font-family: 'Poppins', sans-serif;

        }
        #logoutbutton {
            float: left;
            width: 100px;
            font-size: 14pt;
            background-color:#FFD788;
            height: 40px;
            line-height: 30pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 30px;
            font-size: 12pt;
            color: #FFFFFF;
            font-family: 'Poppins', sans-serif;

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

            background-color: #FFFFFF;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
            float: left;

            font-weight: 100 / 300 / 500 / 700 / 900;
            font-style: normal;
        }
        .prodtile:hover {

            background-color: #FFAC00;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);

        }
        .roadtripinfo {

            margin-top: 10px;
        }
        #triptitle {
            font-size: 16pt;
            background-color: #FFD789;
            width: fit-content;
            padding: 9px;
            border-radius: 10px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            color: #37472A;

        }
        #tripnotes {
            font-size: 12pt;
            padding-top: 10px;
        }

        .prodimgtile {
            width: 100%;
            border-radius: 10px;
            min-height: 15vw;
            background-color: #6E8B55;
            margin: auto;
            display: block;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }

        h3 {
            text-align: center;
            font-size: 20pt;
            padding: 0;
            margin: 0;
        }

        input #adminpage {
            background-color: #FFFFFF;
        }
        .overflowbox{
            overflow: scroll;

            height: 900px;
        }
        .subtitle {
            margin: 0 0 2em 0;
        }
        .fancy {
            line-height: 0.5;
            text-align: center;
            font-size: 20pt;
        }
        .fancy span {
            display: inline-block;
            position: relative;
        }
        .fancy span:before,
        .fancy span:after {
            content: "";
            position: absolute;
            height: 5px;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            top: 0;
            width: 300px;
        }
        .fancy span:before {
            right: 100%;
            margin-right: 15px;
        }
        .fancy span:after {
            left: 100%;
            margin-left: 15px;
        }


    </style>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#content").find("[id^='tab']").hide(); // Hide all content
            $("#tabs li:nth-child(2)").attr("id","current"); // Activate the first tab
            $("#content #tab2").fadeIn(); // Show first tab's content
            $("#tab12").click(function (){
                // window.location.href="../MakeTrip/maketripMAIN.php";
                return false;
            });
            //$(".prodtile").click(function (){
            //    window.location.href="MyRoadtripDetails.php?tripid=<?php //echo $roadtripcr["savedtripID"] . "&userID=" . $_SESSION["UserId"]; ?>//";
            //    return false;
            //});

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
<?php include "../newheader.php" ?>
<div class="container">

<!--    LOG OUT BUTTON-->



<!--    <a href="../Login/CA_RoadTripLOGIN.php">LOG OUT</a> --><?php // ?>

        <div class="adminbox">
            <div><img class="circleimage" style="max-width: 100%; max-height: 100%" src="<?php echo $currentrow["User_Profile_Picture"]; ?>"</div>
            <br>
            <div id="profileinfo">
            <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
            <div id="bio">
                <p><?php echo $currentrow["User_Description"]; ?></p>
            </div><!--close bio-->
                <div class="editprofile">
                    <a href="editprofile.php?id=<?php echo $_SESSION["UserId"]; ?>">Edit Profile</a>
                </div> <!--close edit profile-->
                <div class="logout">
                <form action="../Login/CA_RoadTripLOGIN.php">
                    <input type="submit"  value="Log Out" id="logoutbutton">
                </form>
                </div>
                <div class="adminpage">
                <?php
                if($_SESSION["IsAdmin"] == 1){
                    echo "<form action='../Admin/adminmainLOCATION.php?id=". $_SESSION["UserId"] .
                        "'><input type='submit'  value='Main Admin Page' id='adminpage'></form>";
                }
                ?>
                </div>
            </div><!--close profile info-->
        </div><!--close admin box-->
</div>




        <br><Br>
        <div id="tabs">
            <ul id="tabs">
<!--                name="tab 1" id="tab12"-->

<!--                <li><a href="../MakeTrip/maketripMAIN.php" style="width: 90px; color: #6E8B55;  padding: .7em 1.5em;">+ New Trip</a></li>-->
                <li><a href="MyRoadtrips" name="tab2">My Roadtrips</a></li>
<!--                <li><a href="SavedTrips" name="tab3">Saved Trips</a></li>-->
            </ul>
        </div>


        <div class="bigbox">
            <hr>
            <br>
            <div id="content">
                <div id="tab1">make new trip
                </div>
                <div id="tab2">

                    <p class="subtitle fancy"><span>My Roadtrips</span></p>
                    <div class="overflowbox">
                    <?php
                    $rtsqlii = "SELECT * FROM OneImagePerTrip WHERE userID =" . $_SESSION["UserId"];
                    $rtresults1 = $mysql->query($rtsqlii);
                    while($roadtripcr = $rtresults1->fetch_assoc()){
                    ?>

                    <div class="prodtile" id="prodtile<?php echo $roadtripcr["savedtripID"]; ?>">
                        <input type="hidden" name="tripid" value="<?php echo $roadtripcr["savedtripID"]; ?>">
                        <div ><img class="prodimgtile" id="prodimgtile" src="<?php echo $roadtripcr["imageurl"]; ?>"></div>

                        <div class="roadtripinfo">
                            <div id="triptitle"> <?php echo $roadtripcr["trip_name"] ?> </div>
                            <div id="tripnotes"> <?php echo $roadtripcr["trip_description"] ?> </div>
                        </div>
                    </div>

                        <script>
                            $("#prodtile<?php echo $roadtripcr["savedtripID"]; ?>").click(function (){
                                window.location.href="MyRoadtripDetails.php?tripid=<?php echo $roadtripcr["savedtripID"] . "&userID=" . $_SESSION["UserId"]; ?>";
                                return false;
                            });
                        </script>

                    <?php
                    }
                    ?>

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


