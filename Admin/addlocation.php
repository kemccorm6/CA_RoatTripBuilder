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
<html>
<head>
    <title>Location Add</title>
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
<!--    </div>-->
<!--</div>-->
<!--<hr>-->
<div class="container">
    <div class="adminacc">
    <div class="adminbox">
        <div ><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"] ?>"</div>
        <br><h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
        Admin
    </div>
    <br>

        <div class="tabs">
            <div class="editloc" id="editloc" > <a href="adminmainLOCATION.php">BACK</a></div>
        </div>

        <div class="bigbox">
    <div class="addform">
       <h2>Add a New Location</h2>

        <form action="addlocationCONFIRM.php">
            <div class="titlesubmit">
           <div class="titlediv"> Location Name:</div><input type="text" placeholder="Type Location Name" name="newlocationname">
            </div>
                <br>
            <div class="titlesubmit">
                <div class="titlediv">Address: </div><input type="text" placeholder="Type Address" name="newaddress">
            </div><br>
            <div class="titlesubmit">
                <div class="titlediv">City: </div>


                <select name="newcity">
                    <?php
                    $sql = "SELECT * FROM city_table ";

                    $results = $mysql->query($sql);

                    while($currentrow = $results-> fetch_assoc()){
                        echo "<option value= '" . $currentrow["cityID"] . "'>" . $currentrow["city"] . "</option>";
                    }
                    ?>

                </select>
            </div>
            <br>
           <div class="titlesubmit">
               <div class="titlediv"> Type: </div>

            <select name="newtype">
                <?php
                $sql = "SELECT * FROM type_table ";

                $results = $mysql->query($sql);

                while($currentrow = $results-> fetch_assoc()){
                    echo "<option value= '" . $currentrow["typeID"] . "'>" . $currentrow["type"] . "</option>";
                }
                ?>

            </select>
           </div>
                <br>
            <div class="titlesubmit">
                <div class="titlediv"> Pet Friendly:</div>
            <select name="petfriendly">
                <option value="NULL">N/A</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            </div>
            <br>
            <div class="titlesubmit">
                <div class="titlediv"> Latitude: </div>
            <input type="text" name="newlat" placeholder="Type New Latitude">
            </div>
            <br>
            <div class="titlesubmit">
                <div class="titlediv"> Longitude:</div>
          <input type="text" name="newlong" placeholder="Type New Longitude">

            </div><br>
            <div class="titlesubmit">
                <div class="titlediv"> Wifi:</div>
            <select name="wifi">
                <option value="NULL">N/A</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            </div>
            <br>
            <div class="titlesubmit">
                <div class="titlediv"> Star Review: </div>
             <input type="text" name="starreview" placeholder="Type New Star Review">
            </div>
            <br><br>

            <input type="submit" value="Add New Location">
        </form>

    </div>
</div>
</body>
</html>
