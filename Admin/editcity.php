

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

$sql= "SELECT * FROM city_table WHERE cityID =" . $_REQUEST['id'];

$results = $mysql-> query($sql);

$currentrow = $results->fetch_assoc();

?>
<html>
<head>
    <title>Edit City</title>
    <title>Edit Type</title>
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
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
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
            line-height: 80pt;
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

            width: 150px;
            margin-top: 30px;
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
        <div class="navitem"><br><br>Hi <?php echo $currentrow["User_Real_Name"] ?> !</div>
    </div>
</div>
<hr>
<div class="container">
    <div class="adminacc">
<div class="adminbox">
    <div class="circleimage"></div>
    <br>
    Jonny Appleseed
    <br>
    Admin
</div>
<br>
        <div class="tabs">
            <div class="editloc" id="editloc" > <a href="adminmainTYPE.php">BACK</a></div>
        </div>

        <div class="bigbox">
<div class="addform">
    <h2>Edit City</h2>
    <br><br>
    <form action="EditConfirmationPages/editcityCONFIRM.php ">
        <div class="titlesubmit">
        <input type="hidden" name="id" value="<?php echo $currentrow["cityID"] ?>">
            <div class="titlediv"> Edit City: </div>
            <input type="text" value="<?php echo $currentrow["city"] ?>" name="editcity">
        </div>
        <input type="submit" value="Edit City">
    </form>
</div>
        </div>
</div>
</body>
</html>


