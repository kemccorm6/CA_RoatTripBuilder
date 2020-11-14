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
}else{
    header("Location: ../Login/CA_RoadTripLOGIN.php");
}

?>
<html>
<head>
    <title>Trip Detail</title>
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
            /*height: 1300px;*/
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
            width: 600px;
            background-color: #FFFFFF;
            float: left;
            height: 110px;
            padding: 10px;
            padding-left: 15px;
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            margin-left: 50px;
        } .address {
              width: 600px;
              background-color: #FFFFFF;
              float: left;
              margin-left: 50px;
              height: 40px;
              padding: 10px;
              padding-left: 15px;
              margin-top: 30px;
              border-radius: 15px;
              box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
          }
        .rating {
            width: 200px;
            background-color: #FFFFFF;
            height: 200px;
            padding: 15px;
            float: right;
            margin-top: 25px;
            margin-right: 75px;
            border-radius: 15px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            clear: bottom;
        }
        #typesrow {
            width: 200px;

            float: left;
        }
        .types{
            float: left;
            background-color: gray;
            width: px;
            margin: 5px;
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
            height: 30px;
            border-radius: 5px;
            line-height: 23pt;
            font-size: 10pt;
        }
        .detailsarea {
            width: 100%;
            height: 225px;
        }
        .userreview {
            width:870px;
            background-color: white;
            height: 150px;
            border-radius: 15px;
            margin: auto;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            padding: 15px;
        }
        #profilepic {
            width:100px;
            height:100px;
            border-radius: 150px;
            float: left;
            background-color: #FFFFFF;
            border: 1px solid gray;
            float: left;
            margin-left: 50px;
            margin-top: 20px;
            color: black;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }
        #username {
            float: left;
            width: 400px;
            font-size: 18pt;
            margin-top: 20px;
            margin-left: 40px;
        }
        #locationreview {
            width: 500px;
            margin-left: 40px;
            margin-top: 30px;
            overflow-wrap: normal;
            font-size: 12pt;
            float: left;

        }




    </style>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#tab12").click(function (){
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
<!---->
<!--    </div>-->
<!--    <div class="profile"> <a href="userprofile.php"><div class="profileimage">My<br>Profile</div> </a></div>-->
<!--</div>-->
<!--<hr>-->

<?php

$locationsql = "SELECT * FROM LocationCityTypeView2 WHERE locationID =" . $_REQUEST["id"];
//echo $locationsql;
$locresults = $mysql->query($locationsql);

$loccurrentrow = $locresults->fetch_assoc();

?>
<div class="container">

    <ul id="tabs">
<!--        <li><a href="addcities.php?" name="tab1" id="tab12" style="width: 90px; text-align: center; padding: .7em 1.5em;">BACK</a></li>-->
    </ul>

    <div class="bigbox">
        <hr><br>
        <div class="triptitle"><?php echo $loccurrentrow["locationname"] ?></div>

        <div class="banner">

            <?php
            $imgsql = "SELECT * FROM images_table WHERE locationID= " . $_REQUEST["id"];

            $ir = $mysql->query($imgsql);
            $count =0;
            while($imgrow = $ir->fetch_assoc()){
                $count += 1;
            ?>

            <img class="banner<?php echo $count; ?>" id="image<?php echo $count; ?>" src="<?php echo $imgrow["imageurl"]; ?>">
<!--            <img class="banner2" id="image2" src="--><?php //echo $imgrow["imageurl"]; ?><!--">-->
<!--            <img class="banner3" id="image3" src="--><?php //echo $imgrow["imageurl"]; ?><!--">-->
            <?php
            }
            ?>
        </div>

        <div class="detailsarea">
            <div class="address">
                <?php echo $loccurrentrow["address"] ?>
            </div>
            <div class="rating">
                Star Review:
                <br><?php echo $loccurrentrow["star_review"];
                    if($loccurrentrow["star_review"] == 0){
                        echo "0";
                    }

                        ?><br>
                Amenities:
                <div id="typesrow">


                    <?php $loccurrentrow["petfriendly"];
                    if($loccurrentrow["petfriendly"] == 1){
                        echo "<div class='types' id='type1'>Pet Friendly</div>";
                    }

                    ?>
                    <?php
                    $loccurrentrow["wifi"];
                    if($loccurrentrow["wifi"] == 1){
                        echo "<div class='types' id='type2'>Wifi</div>";
                    }


                    ?>

                    <div class="types" id="type3"><?php echo $loccurrentrow["type_name"] ?></div>
                </div>
            </div>
            <div class="description">
                <p> <?php echo $loccurrentrow["location_description"] ?></p>
            </div>
        </div>
        <br><br><br>
<!--        <div class="userreview">-->
<!--            <div id="profilepic"></div>-->
<!--            <div id="username">Johnny Appleseed</div>-->
<!--            <div id="locationreview">Me and my buddies had an incredible time hiking this mountain! 10/10 Recommmend</div>-->
<!--        </div>-->
<!--        <br><br>-->
<!--        <div class="userreview">-->
<!--            <div id="profilepic"></div>-->
<!--            <div id="username">Johnny Appleseed</div>-->
<!--            <div id="locationreview">Me and my buddies had an incredible time hiking this mountain! 10/10 Recommmend</div>-->
<!--        </div>-->
<!--        <br><br>-->
<!--        <div class="userreview">-->
<!--            <div id="profilepic"></div>-->
<!--            <div id="username">Johnny Appleseed</div>-->
<!--            <div id="locationreview">Me and my buddies had an incredible time hiking this mountain! 10/10 Recommmend</div>-->
<!--        </div>-->
    </div>

</div>


</body>
</html>
