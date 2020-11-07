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
    <title>Location Add</title>
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
        .addform{
            width:500px;
            border: solid 1px black;
            margin:auto
        }
    </style>
</head>
<body>
<div class="adminbox">
    <div class="circleimage">picture</div>
    <br>
    Jonny Appleseed
    <br>
    Admin
</div>
<br>
<a href="adminmainTYPE.php">BACK</a>
<div class="addform">
    ADD a new Type
    <br><br>
    <form action="addtypeCONFIRM.php">
        Type: <input type="text" placeholder="Type New Type" name="newtype">

        <input type="submit" value="Add New Type">
    </form>

</div>
</body>
</html>

