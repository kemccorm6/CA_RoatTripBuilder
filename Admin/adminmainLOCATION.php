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


?>
<html>
<head>
    <title>Main Locations</title>
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
            margin-top: 100px;
        }
        .tabs {
            width: 800px;
            height: 100px;
        }
        .editloc {
            width: 200px;
            height: 100px;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FFD688;
            margin-left: 35px;
            float: left;
            text-decoration: none;

           box-shadow: 2px -1px 4px dimgrey;
        }
        .edittyp {
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
        .edittyp :hover {
            background-color: #FFD688;
            width: 200px;
            height: 100px;
        }
        .container2 {
            width: 900px;
            float: left;
            margin:auto;

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
    </style>
</head>


<html>
<head>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../account.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>

    </style>
</head>
<body>
<div class="topheader">
    <img src="myalogo1.png" id="logo">

    <div class="login">
        <a style="text-decoration:none; color:white" href="login.html">Login</a>
    </div>
</div>
<hr>

    <div class="menu" style="border-right:1px solid #000; height: 2000px">
        <div class="menuitem">

            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/user.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">User Login&nbsp;</a></div>
            <hr>
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/team.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Admin Login</a></div>
        </div>
        <hr>
        <div class="menuitem">

            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/suitcases.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Make a Trip</a></div>
            <hr>
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/conversation.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Discover Community</a></div>
        </div>
        <hr>
        <div class="menuitem">
            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/target.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Our Mission</a></div>
            <hr>
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/support.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Our Team</a></div>
        </div>
        <hr>
        <div class="menuitem">
            <a href="login"></a>
        </div><hr>
    </div>
<div class="container2">
        <div class="adminacc">
        <div class="adminbox">
            <div class="circleimage"></div>
            <br>
           <h1>Jonny Appleseed</h1>

            Admin
        </div>
        <br><Br>
            <div class="tabs">
            <div class="editloc" ><a href="adminmainLOCATION.php" style="text-decoration:none">Edit Locations</a></div>
            <div class="edittyp"><a href="adminmainTYPE.php" style="text-decoration:none">Edit Type</a></div>
            <div class="edittyp"> <a href="adminmainCITY.php" >Edit City</a></div>
            </div>

        <div class="bigbox">
            <hr>
            <div class="newloc"> <a href="addlocation.php">+ Add New Location</a> </div>

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

            while($currentrow = $results->fetch_assoc()){


                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $currentrow["locationname"] ?></div>
                    <div class="editdelete"><a href="editlocation.php">Edit</a> | <a href="deletelocation.php">Delete</a></div>
                </div>

                <?php
            }
            ?>

        </div>

        </div>
        </div>
    </div> <!-- close container-->
</body>
</html>


