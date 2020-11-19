
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
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.35);
            clip-path: circle(250px at center);

            border-radius: 150px;
            float: left;
            margin: 20px;
            color: black;
        }

        .adminbox{
            width:1000px;
            height: 300px;
            margin: auto;
            display: block;
            margin-top: 0px;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.45);
            background: linear-gradient(58deg, #ffedcb, #ffc65a, #ffd788);
            background-size: 600% 600%;

            -webkit-animation: AnimationName 23s ease infinite;
            -o-animation: AnimationName 23s ease infinite;
            animation: AnimationName 23s ease infinite;

            color: black;
            border-radius: 15px;
        }
        @-webkit-keyframes AnimationName {
            0%{background-position:0% 83%}
            50%{background-position:100% 18%}
            100%{background-position:0% 83%}
        }
        @-o-keyframes AnimationName {
            0%{background-position:0% 83%}
            50%{background-position:100% 18%}
            100%{background-position:0% 83%}
        }
        @keyframes AnimationName {
            0%{background-position:0% 83%}
            50%{background-position:100% 18%}
            100%{background-position:0% 83%}
        }
        #profileinfo {
            float: left;
            width: 420px;
            margin-left: 50px;
        }
        #bio {
            overflow-wrap: normal;
            font-size: 14pt;
            font-family: Poppins;

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
            font-size: 12pt;
            background-color: white;
            height: 40px;
            line-height: 30pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 18.5px;
            text-decoration: none;
            text-decoration-color: #FFFFFF;
            float: left;
            font-family: Poppins;
            border: 1px solid black;
        }
        .editprofile a {
            text-decoration: none!;
            color: black;
        }
        #adminpage {
            float: left;
            width: 160px;
            font-size: 12pt;
            background-color:white;
            height: 42px;
            margin-left: 20px;
            line-height: 20pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 10px;
            color: black;
            font-family: 'Poppins', sans-serif;

        }
        #logoutbutton {
            float: left;
            width: 100px;
            margin-left: 20px;
            background-color:white;
            height: 40px;
            line-height: 20pt;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 1px 4px dimgrey;
            margin-top: 10px;
            font-size: 12pt;
            color: black;
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
            background-color: #FFD788;
            padding: .7em 3.5em;
            font-family: Poppins;
            float: left;
            text-decoration: none;
            color: #444;
            text-shadow: 0 1px 0 rgba(255,255,255,.8);
            border-radius: 5px 0 0 0;
            box-shadow: 0 2px 2px rgba(0,0,0,.4);
            color: black;
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
            background-color: #FFD788;
            box-shadow: 2px 2px 2px rgba(0,0,0,.4);
            transform: skew(10deg);
            border-radius: 0 5px 0 0;
        }

        #tabs #current a,
        #tabs #current a::after {
            background-image: linear-gradient(to bottom, #FFD788, #E9C37C);
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


        h3 {
            text-align: center;
            font-size: 20pt;
            padding: 0;
            margin: 0;
        }
        h1 {
            font-family: Poppins;

            text-align: left;

            font-size: 30pt;
            margin-bottom: 0;
        }

        input #adminpage {
            background-color: #FFFFFF;
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
        hr.buttonline {
            background-color: black;
            width: 120%;
            height: 4px;
            border-top: 1px solid black;
        }
        .editdelete{
            width: 100px;

            padding: 10px;
        }
        .locationandedit{
            border: 1px solid black;
            border-left: none;
            border-right: none;
            width: 70%;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        .edittyp a {
            width: 200px;
            height: 100px;
            display: block;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FEE7B9;
            float: left;
            margin-left: 20px;
            margin-bottom: 0px;
            text-decoration: none;

            box-shadow: 2px -1px 4px dimgrey;
        }
        .editcit a {
            width: 200px;
            height: 100px;
            display: block;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FEE7B9;
            float: left;
            margin-left: 20px;
            margin-bottom: 0px;
            text-decoration: none;
            box-shadow: 2px -1px 4px dimgrey;
        }

        .editcit :hover {
            background-color: #FFD688;
        }
        .edittyp :hover {
            background-color: #FFD688;

            width: 200px;
            height: 100px;
        }
        .edittyp:hover + .editloc a{
            color: #85A867;
            background-color: black;
        }

        a {
            text-decoration: none;
            text-decoration-color: black;
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
            float: left;
            margin-left: 30px;
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
        .newcity {
            width: 200px;
            background-color: #85A867;
            height: 40px;
            text-align: center;
            font-size: 14pt;
            margin-top: 25px;
            line-height: 30pt;
            border-radius: 15px;
            float: left;
            margin-left: 30px;
            box-shadow: 2px 1px 4px dimgrey;
        }
        .newtype {
            width: 200px;
            background-color: #85A867;
            height: 40px;
            text-align: center;
            font-size: 14pt;
            margin-top: 25px;
            line-height: 30pt;
            border-radius: 15px;
            float: left;
            margin-left: 30px;
            box-shadow: 2px 1px 4px dimgrey;
        }

    </style>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#content").find("[id^='tab']").hide(); // Hide all content

            <?php
            $tabn = 1;
            if(!empty($_REQUEST["tabn"])) {
                $tabn = $_REQUEST["tabn"];
            } else {
                $tabn = 1;}

            echo '$("#tabs li:nth-child(' . $tabn  . ')").attr("id","current");' ;
            echo '$("#content #tab' .  $tabn  . '").fadeIn();';
            ?>

            //$("#tabs li:nth-child(<?php $tabn ?>)").attr("id","current"); // Activate the first tab
            //$("#tabs li:nth-child(<?php echo $tabn ?>)").attr("id","current"); // Activate the first tab
            //$("#content #tab<?php echo $tabn ?>").fadeIn(); // Show first tab's content



            $("#tab12").click(function (){
                window.location.href="../MakeTrip/maketripMAIN.php";
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

    <div class="adminbox">
        <div><img class="circleimage" style="max-width: 100%; max-height: 100%" src="<?php echo $currentrow["User_Profile_Picture"]; ?>"</div>
        <br>
        <div id="profileinfo">
            <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
            <div id="bio">
                <p><?php echo $currentrow["User_Description"]; ?></p>
            </div><!--close bio-->
            <hr class="buttonline">
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
                    echo "<form action='../UserProfile/userprofile.php?id=". $_SESSION["UserId"] .
                        "'><input type='submit'  value='Main Profile Page' id='adminpage'></form>";
                }
                ?>
            </div>
        </div><!--close profile info-->
    </div><!--close admin box-->
</div>
<br><Br>
<div id="tabs">
    <ul id="tabs">
        <!--               -->
        <li><a  name="tab1">Location</a></li>
        <li><a  name="tab2">City</a></li>
        <li><a  name="tab3">Type</a></li>
        <li><a  name="tab4">Google Analytics</a></li>
    </ul>
</div>


<div class="bigbox"><hr><br>

    <div id="content">

        <div id="tab1"> <div class="newloc"> <a href="addlocation.php">+ Add New Location</a> </div>

            <br>
            <div class="searchbox">
                <form action="">
                    <input type="text" id="searchbox" name="locationsearch" placeholder="Search Locations">
                    <input type="submit" id="go" value="Go">
                </form>
            </div>

            <?php
            $sql = "SELECT * FROM location_table WHERE locationname LIKE '%" . $_REQUEST["locationsearch"]. "%'";

            $results =$mysql->query($sql);

            if(!$results){
                echo "Your SQL " . $sql . "<br>";
                echo "SQL Error " . $mysql-> error . "<br>";
                exit();
            }

            $startp = 1;

            if(!empty($_REQUEST["startp"])){
                $startp = $_REQUEST["startp"];
            }

            $limit = 10;
            $end = $startp + $limit - 1;

            if ($results->num_rows < $end ) {
                $displayend = $results->num_rows;
            } else {
                $displayend = $end;
            }

            echo "<br><br><br>";
            echo "There are " . $results->num_rows . " results. Displaying " . $startp . " - " . ($displayend) . ". ";
            echo "<br><br>";


            $counter = $startp;

            $results->data_seek($startp-1);

            while($currentrow2 = $results->fetch_assoc()){


                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $counter . ") " . $currentrow2["locationname"] ?></div>
                    <div class="editdelete"><a href="editlocation.php?id=<?php echo $currentrow2["locationID"] ?>">Edit</a> | <a href="deletelocation.php?id=<?php echo $currentrow2["locationID"]; ?>">Delete</a></div>
                </div>

                <?php

                $counter++;

                if($counter > $end){
                    break;
                }

            }

            $formdata = "";
            $formdata .= "locationsearch=" . $_REQUEST["locationsearch"];
            $formdata .= "&startp=" . ($startp+$limit);
            //            echo "<hr>" . $formdata . "<hr>";

            if($startp > $limit){
                echo "<a href='combinedadmnin.php?" . $formdata . "&startp=" . ($startp - $limit) . "&tabn=1" . "'>Prev</a>";
            }

            echo " | ";

            if($results->num_rows >= $startp + $limit){
                echo "<a href='combinedadmnin.php?" . $formdata . "&startp=" . ($startp + $limit) . "&tabn=1" . "'>Next</a>";
            }

            ?>

        </div>
        <div id="tab2">
            <div class="newcity"> <a href="addcity.php">+ Add New City</a> </div>
            <br>
            <div class="searchbox">
                <form action="">
                    <input type="text" id="searchbox" name="citysearch" placeholder="Search Cities">
                    <input type="submit" id="go" value="Go">
                </form>
            </div>

            <br><br>
            <?php
            $sql = "SELECT * FROM city_table WHERE city LIKE '%" . $_REQUEST["citysearch"]. "%'";

            $results =$mysql->query($sql);

            if(!$results){
                echo "Your SQL " . $sql . "<br>";
                echo "SQL Error " . $mysql-> error . "<br>";
                exit();
            }

            $startp = 1;

            if(!empty($_REQUEST["startp"])){
                $startp = $_REQUEST["startp"];
            }

            $limit = 10;
            $end = $startp + $limit - 1;
            if ($results->num_rows < $end ) {
                $displayend = $results->num_rows;
            } else {
                $displayend = $end;
            }


            echo "<br><br><br>";
            echo "There are " . $results->num_rows . " results. Displaying " . $startp . " - " . $displayend . ". ";
            echo "<br><br>";


            $counter = $startp;

            $results->data_seek($startp-1);

            while($currentrow2 = $results->fetch_assoc()){
                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $counter . ") " . $currentrow2["city"] ?></div>
                    <div class="editdelete"><a href="editcity.php?id=<?php echo $currentrow2["cityID"]; ?>">Edit</a> | <a href="deletecity.php?id=<?php echo $currentrow2["cityID"];?>">Delete</a></div>
                </div>

                <?php
                $counter++;

                if($counter > $end){
                    break;
                }
            }

            $formdata = "";
            $formdata .= "citysearch=" . $_REQUEST["citysearch"];
            $formdata .= "&startp=" . ($startp+$limit);
            //            echo "<hr>" . $formdata . "<hr>";

            if($startp > $limit){
                echo "<a href='combinedadmnin.php?" . $formdata . "&startp=" . ($startp - $limit) . "&tabn=2" . "'>Prev</a>";
            }

            echo " | ";

            if($results->num_rows >= $startp + $limit){
                echo "<a href='combinedadmnin.php?" . $formdata . "&startp=" . ($startp + $limit) . "&tabn=2" . "'>Next</a>";
            }
            ?>
        </div>
        <div id="tab3">
            <div class="newtype"> <a href="addtype.php">+ Add New Type</a> </div>
            <br>
            <div class="searchbox">
                <form action="">
                    <input type="text" id="searchbox" name="typesearch" placeholder="Search Types">
                    <input type="submit" id="go" value="Go">
                </form>
            </div>

            <?php
            $sql = "SELECT * FROM type_table WHERE type LIKE '%" . $_REQUEST["typesearch"]. "%'";

            $results =$mysql->query($sql);

            if(!$results){
                echo "Your SQL " . $sql . "<br>";
                echo "SQL Error " . $mysql-> error . "<br>";
                exit();
            }

            $startp = 1;

            if(!empty($_REQUEST["startp"])){
                $startp = $_REQUEST["startp"];
            }

            $limit = 10;
            $end = $startp + $limit - 1;
            if ($results->num_rows < $end ) {
                $displayend = $results->num_rows;
            } else {
                $displayend = $end;
            }


            echo "<br><br><br>";
            echo "There are " . $results->num_rows . " results. Displaying " . $startp . " - " . $displayend . ". ";
            echo "<br><br>";


            $counter = $startp;

            $results->data_seek($startp-1);

            while($currentrow2 = $results->fetch_assoc()){


                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $counter . ") " . $currentrow2["type"] ?></div>
                    <div class="editdelete"><a href="edittype.php?id=<?php echo $currentrow2["typeID"]; ?>">Edit</a> | <a href="deletetype.php?id=<?php echo $currentrow2["typeID"]; ?>">Delete</a></div>
                </div>

                <?php
                $counter++;

                if($counter > $end){
                    break;
                }
            }

            $formdata = "";
            $formdata .= "typesearch=" . $_REQUEST["typesearch"];
            $formdata .= "&startp=" . ($startp+$limit);
            //            echo "<hr>" . $formdata . "<hr>";

            if($startp > $limit){
                echo "<a href='combinedadmnin.php?" . $formdata . "&startp=" . ($startp - $limit) .   "&tabn=3" . "'>Prev</a>";
            }

            echo " | ";

            if($results->num_rows >= $startp + $limit){
                echo "<a href='combinedadmnin.php?" . $formdata . "&startp=" . ($startp + $limit) .   "&tabn=3" .  "'>Next</a>";
            }
            ?>

        </div>

        <div id="tab4">
            Welcome to Google Analytics! Click on each image to enlarge.
            <br><br>
            <a href="CA_Roadtripbuilder_GoogleAnalytics1.jpeg" target="_blank"><img style="width:450px;" src="CA_Roadtripbuilder_GoogleAnalytics1.jpeg"></a>
            <br><br>
            <a href="CA_RoadtripBuilder_GoogleAnalytics2.jpeg" target="_blank"><img style="width:450px;" src="CA_RoadtripBuilder_GoogleAnalytics2.jpeg"></a>
            <br><br>
            <a href="CA_Roadtripbuilder_GoogleAnalytics3.jpeg" target="_blank"><img style="width:200px;" src="CA_Roadtripbuilder_GoogleAnalytics3.jpeg"></a>
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
