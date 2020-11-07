
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
    <title> Main Type</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        .circleimage{
            width:100px;
            height:100px;
            border: black 1px solid;
            border-radius: 100px;
        }
        .adminbox{
            border: solid red 1px;
            width:150px;
            margin-right:auto;
            margin-left:auto;
        }
        .bigbox{
            width:500px;
            border: black 1px solid;
            margin:auto;
        }
        .locationdiv{
            width:350px;


        }
        .editdelete{
            width: 100px;


        }
        .locationandedit{

            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }

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
<div class="sides">
    <div class="menu" style="border-right:1px solid #000;height:3500px">
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



    <div class="container">

        <div class="adminbox">
            <div class="circleimage">picture</div>
            <br>
            Jonny Appleseed
            <br>
            Admin
        </div>
        <br><Br>
        <div class="bigbox">
            <a href="adminmainLOCATION.php">Edit Locations</a> | <a href="adminmainTYPE.php">Edit Type</a> | <a href="adminmainCITY.php">Edit City</a>
            <hr>
            <a href="addtype.php">Add New Type</a>
            <br><br>
            <form action="">
                <input type="text" name="typesearch" placeholder="Search Types">
                <input type="submit" value="Go">
            </form>

            <?php
            $sql = "SELECT * FROM type_table WHERE type LIKE '%" . $_REQUEST["typesearch"]. "%'";

            $results =$mysql->query($sql);

            if(!$results){
                echo "Your SQL " . $sql . "<br>";
                echo "SQL Error " . $mysql-> error . "<br>";
                exit();
            }

            while($currentrow = $results->fetch_assoc()){


                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $currentrow["type"] ?></div>
                    <div class="editdelete"><a href="edittype.php?id=<?php echo $currentrow["typeID"] ?>">Edit</a> | <a href="deletetype.php">Delete</a></div>
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


