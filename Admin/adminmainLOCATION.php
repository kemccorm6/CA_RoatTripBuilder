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
    <title>Admin Main</title>
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
    <br><Br>
    <div class="bigbox">
        <a href="adminmainLOCATION.php">Edit Locations</a> | <a href="adminmainTYPE.php">Edit Type</a> | <a href="adminmainCITY.php">Edit City</a>
        <hr>
        <a href="addlocation.php">Add New Location</a>
        <br><br>
        <form action="">
            <input type="text" name="locationsearch" placeholder="Search Locations">
            <input type="submit" value="Go">
        </form>
    </div>

    <?php
        $sql = "SELECT * FROM type_table WHERE";
        $results
    ?>
</body>
</html>
