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
    <link rel = "stylesheet"
          type = "text/css"
          href = "master.css" />
    <style>

    </style>
</head>
<body>




<div class="topheader">
    <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/myalogo1.jpeg" id="logo">

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
                <a style="text-decoration:none; color:white" href="login">User Login&nbsp;</a></div>
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

    <?php
    $sql = "SELECT * FROM LocationView WHERE 1=1 ";

    if($_REQUEST["locationsearch"] != "ALL"){
        $sql .= " AND locationname = '" . $_REQUEST["locationsearch"] . "' ";
    }

    if($_REQUEST["citysearch"] != "ALL"){
        $sql .= " AND city = '" . $_REQUEST["citysearch"] . "' ";
    }

    if($_REQUEST["typesearch"] != "ALL"){
        $sql .= " AND type = '" . $_REQUEST["typesearch"] . "' ";
    }

    $results = $mysql->query($sql);

    echo "There are " . $results->num_rows . " results.";
    ?>

    <div class="container">




    </div> <!-- close container-->
</body>
</html>
</body>
</html>
