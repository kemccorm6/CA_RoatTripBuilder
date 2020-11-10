


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
    <title>Main City</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url("tiretracks.png");
            background-size: 2250px 1250px ;
            background-color: white;
        }
        .circleimage{
            width:150px;
            height:150px;
            border: black 1px solid;
            border-radius: 100px;
            float: left;
            margin: 20px;
        }
        .adminbox{

            width:800px;
            height: 200px;
            margin: auto;


        }
        .bigbox{
            width:800px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;

        }
        .locationdiv{
            width:350px;

            padding: 10px;

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
        .adminacc {
            width: 800px;
            margin:auto;

            margin-bottom: 100px;
        }
        .tabs {
            width: 800px;
            height: 100px;
            margin-top: 100px;
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
            background-color: #FFD688;
            float: left;
            margin-left: 20px;
            margin-bottom: 0px;
            text-decoration: none;
            box-shadow: 2px -1px 4px dimgrey;
        }
        .editloc :hover {
            background-color: #FFD688;
        }
        .edittyp :hover {
            background-color: #FFD688;
        }
        .edittyp:hover + .editloc a{
            color: #85A867;
            background-color: black;
        }

        a {
            text-decoration: none;
            text-decoration-color: black;
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
    <div class="profile"> <a href="../UserProfile/userprofile.php"><div class="profileimage">My<br>Profile</div> </a></div>
</div>
<hr>
    <div class="container">
        <div class="adminacc">
        <div class="adminbox">
            <div ><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"] ?>"</div>
            <br>
           <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>

            Admin
        </div>
        <br><br>
            <div class="tabs">
                <div class="editloc" id="editloc" ><a href="adminmainLOCATION.php" style="text-decoration:none">Edit Locations</a></div>
                <div class="edittyp" id="edittyp" ><a href="adminmainTYPE.php" style="text-decoration:none">Edit Type</a></div>
                <div class="editcit"> <a href="adminmainCITY.php" >Edit City</a></div>
            </div>
        <div class="bigbox">
            <hr>
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
            while($currentrow = $results->fetch_assoc()){
                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $currentrow["city"] ?></div>
                    <div class="editdelete"><a href="editcity.php?id=<?php echo $currentrow["cityID"]; ?>">Edit</a> | <a href="deletecity.php?id=<?php echo $currentrow["cityID"];?>">Delete</a></div>
                </div>

                <?php
            }
            ?>

        </div>


    </div> <!-- close container-->
</body>
</html>
</body>
</html>



