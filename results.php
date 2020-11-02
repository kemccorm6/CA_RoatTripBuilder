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
    <style>
        body {
            margin: 0 !important;
            padding: 0 !important;
            font-family: SF Pro Display;
            background-color: #FFD789;
            background-size: 40%;
            background-
        }
        .topheader {
            width: 100%;
            height: 100px;
            background-color: #6E8B55;
            margin: none;

        }
        #logo {
            width: 400px;

            margin: 30px;
        }
        .login {
            float: right;
            width: 100px;
            background-color: #F06A00;
            border-radius: 5px;
            margin: 30px;
            color: white;
            text-align: center;
            text-decoration: none;
            padding: 10px;
        }
        .sides {
            width: 100%;

        }

        .menu {
            width: 200px;
            float: left;
            height: 400px;
            background-color:  #85A867;
        }
        hr {
            margin: 0;
        }
        .menuitem {
            box-sizing: border-box;
            height: 20px;

            width: 200px;
            text-align: right;
            line-height: 50px;
        }
        .menuitem1 {
            box-sizing: border-box;
            color: black;
            background-color: #6E8B55;
            width: 200px;
            text-align: left;
            line-height: 50px;
            text-decoration: none;
            text-decoration-color: black;
            text-decoration-line: none;

        }
        #single:hover {
            background-color: #FFAC00;
            width: 200px;
            height: 50px;
            font-weight: bold;
            box-sizing: border-box;
            border-radius: 10px;
        }
        #icon {
            margin: 10px;
            float: left;
            width: 25px;
            fill: white;
        }
        .container {
            position: absolute;
            background-color: #FFD789;
            margin-left: 200px;
            overflow: none;
            width: 100vw;
        }



        .maanahead {
            padding-top: 3px;
            margin-left: 10px;
            display: block;
        }

        .maanahead:hover {
            padding-top: 3px;
            margin-left: 10px;
            font-family: 'round-trap-regular';
            display: block;
        }

        .prodtile {
            width: 33vw;
            min-height: 40vw;
            padding: 2vw;
            margin-top: 4vw;
            margin-left: 4vw;

            background-color: #FFFFFF;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
            float: left;
            font-family: museo, serif;
            font-weight: 100 / 300 / 500 / 700 / 900;
            font-style: normal;
        }

        #prodtile1 {

        }

        #prodtile2 {

        }

        #prodtile3 {

        }

        #prodtile4 {

        }

        .prodimgtile {
            width: 100%;
            border-radius: 10px;
            min-height: 40vw;

        }

        #prodimgtile1 {
            background-image: url(trojanred.png);
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        #prodimgtile2 {
            background-image: url(trojanyellow.png);
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        #prodimgtile3 {
            background-image: url(trojanred.png);
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        #prodimgtile4 {
            background-image: url(trojanred.png);
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>




<div class="topheader">
    <img src="logo.png" id="logo">

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
                <img src="user.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">User Login&nbsp;</a></div>
            <hr>
            <div id="single">
                <img src="team.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Admin Login</a></div>
        </div>
        <hr>
        <div class="menuitem">

            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="suitcases.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Make a Trip</a></div>
            <hr>
            <div id="single">
                <img src="conversation.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Discover Community</a></div>
        </div>
        <hr>
        <div class="menuitem">
            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="target.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Our Mission</a></div>
            <hr>
            <div id="single">
                <img src="support.svg" id="icon"/>
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

<?php
    while($currentrow = $results->fetch_assoc()){
?>



        <div class="prodtile" id="prodtile1">
            <div class="prodimgtile" id="prodimgtile1">
            </div>


            <?php
            echo "<div class='lname'><strong> Location: </strong>". $currentrow["locationname"] . "</div>";
            echo "<div class='cname'><strong>City: </strong>". $currentrow["city"] . "</div>";
            echo "<div class='cname'><strong> Type: </strong>". $currentrow["type"] . "</div>";
            echo "<div class='aname'><strong> Address: </strong>". $currentrow["address"] . "</div>";
            echo "<br>"
            ?>
        </div>

<?php
    }
?>


    </div>
</body>
</html>
</body>
</html>
