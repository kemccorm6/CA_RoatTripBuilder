

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

$usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

$userresults = $mysql-> query($usersql);
$currentrow = $userresults->fetch_assoc();

?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Add City Confirmation</title>


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
        }
        .adminbox{
            width:500px;
            height: 200px;
            margin: auto;
        }
        .addform{
            width:700px;

            margin:auto
        }
        .bigbox{
            width:800px;
            padding: 15px;
            height: 200px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            text-align: center;
        }
        .adminacc {
            width: 800px;
            margin:auto;
            margin-top: 50px;
            margin-bottom: 100px;
        }
        .tabs {
            width: 800px;
            height: 100px;
            overflow: hidden;
        }
        .editloc a {
            width: 200px;
            display: block;
            height: 100px;
            text-align: center;
            line-height: 17pt;
            padding: 10px;
            font-size: 18pt;
            background-color: #FEE7B9;
            margin-left: 35px;
            float: left;
            text-decoration: none;
            box-shadow: 2px -1px 4px dimgrey;
            z-index: -10px;

        } #back a {
            width: 200px;
            display: block;
            height: 100px;
            text-align: center;
            line-height: 70pt;
            font-size: 18pt;
            background-color: #FEE7B9;
            margin-left: 35px;
            float: left;
            text-decoration: none;
            box-shadow: 2px -1px 4px dimgrey;
            z-index: -10px;

        }
        .titlediv{
            width:250px;
            padding: 10px;
        }
        input {

            padding: 10px;
        }
        .titlesubmit{
            border: 1px solid black;
            border-left: none;
            border-right: none;
            width: 70%;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        h2 {
            margin: auto;
            text-align: center;
            padding: 15px;
            font-size: 24pt;
        }
        #submit {
            width: 40%;
            border-radius: 10px;
            background-color: #85A867;
            color: white;
            margin: auto;
            text-align: center;
        }
        .submit {
            margin: auto;
        }
        .yay {
            font-size: 24pt;
        }
    </style>
</head>
<body>
<?php include "../newheader.php" ?>
<!--<div class="topheader">-->
<!--    <a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/frontpage/frontpageV2.php">-->
<!--        <img src="myalogo1.png" id="logo"></a>-->
<!--    <div class="navbar">-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">LOGIN</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Community/communityMAIN.php">COMMUNITY</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Mission/missionMAIN.php">OUR MISSION</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Team/teamMAIN.php">OUR TEAM</a> </div>-->
<!--        <div class="navitem"><br><br>Hi --><?php //echo $currentrow["User_Real_Name"] ?><!-- !</div>-->
<!--    </div>-->
<!--     <div class="profile"> <a href="../UserProfile/userprofile.php"><div class="profileimage">My<br>Profile</div> </a></div>-->
<!--</div>-->
<!--<hr>-->
<div class="container">
    <div class="adminacc">
        <div class="adminbox">
            <div ><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"] ?>"</div>
            <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
            Admin
        </div>
        <br>

        <div class="tabs">
            <div class="editloc" id="editloc" > <a href="addcity.php"><br>Add Another City</a></div>
            <div class="editloc" id="back" > <a href="adminmainCITY.php">BACK</a></div>
        </div>

        <div class="bigbox">
            <br><br>

<div class="yay">
           <?php
           $sql= "INSERT INTO city_table " .
            "(city)" .
            "VALUES" .
            "( " .
            " '" . $_REQUEST["newcity"] . "' ) ";
            $results = $mysql->query($sql);
            if(!$results){
            echo "Something went wrong check error: " . $mysql->error;
            exit();
            }else{
            echo "Congratulations you added the '". $_REQUEST['newcity'] . "' city";
            }
            ?>
</div>
        </div>
    </div>
</div>

