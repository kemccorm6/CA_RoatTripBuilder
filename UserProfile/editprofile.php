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

$sql = "SELECT * FROM user_data_table WHERE userID =" . $_REQUEST['id'];

$results = $mysql-> query($sql);

$currentrow = $results->fetch_assoc();
?>
<html>
<head>
    <title>Edit Profile</title>
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
</style>
</head>








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
<!--        <div class="navitem"><br><br>Hi --><?php //echo $currentrow["User_Real_Name"] ?><!-- !</div>-->
<!---->
<!--    </div>-->
<!--    <div class="profile"> <a href="userprofile.php"><div class="profileimage">My<br>Profile</div> </a></div>-->
<!--</div>-->
<!--<hr>-->

<div class="container">

        <div class="adminbox">
            <form action="profileupdateCONFIRM.php">
                <input type="hidden" name="id" value="<?php echo $currentrow["userID"] ?>">
                <div><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"]; ?>"</div>
                <br>
                <div id="profileinfo">
                <h1>Edit Name:</h1>
                    <input type="text" name="nusername" value="<?php echo $currentrow["User_Real_Name"]; ?>"
                <div id="bio">
                    <br>
                    <p>Edit Description:</p>
                    <input type="text" name="editdesc" value="<?php echo $currentrow["User_Description"]; ?>" >
                    <br><br>
                    Copy profile picture link here:
                    <br>
                    <input type="text" name="profp" value="<?php echo $currentrow["User_Profile_Picture"]; ?>">

                </div><!--close bio-->
                    <div class="editprofile">
                        <input type="submit" value="Update">
                    </div> <!--close edit profile-->
                </div><!--close profile info-->
            </div><!--close admin box-->
            </form>
</div>
</body>
</html>
