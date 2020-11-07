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
    <a href="adminmainLOCATION.php">BACK</a>
    <div class="addform">
        ADD a new Location
        <br><br>
        <form action="addlocationCONFIRM.php">
            Location Name: <input type="text" placeholder="Type Location Name" name="newlocationname">
            <br>
            Address: <input type="text" placeholder="Type Address" name="newaddress">
            <br>
            City:
                <select name="newcity">
                    <?php
                    $sql = "SELECT * FROM city_table ";

                    $results = $mysql->query($sql);

                    while($currentrow = $results-> fetch_assoc()){
                        echo "<option value= '" . $currentrow["cityID"] . "'>" . $currentrow["city"] . "</option>";
                    }
                    ?>

                </select>
            <br>
            Type:
            <select name="newcity">
                <?php
                $sql = "SELECT * FROM type_table ";

                $results = $mysql->query($sql);

                while($currentrow = $results-> fetch_assoc()){
                    echo "<option value= '" . $currentrow["typeID"] . "'>" . $currentrow["type"] . "</option>";
                }
                ?>

            </select>
            <br>
            Pet Friendly:
            <select name="petfriendly">
                <option>N/A</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

            <br>
            Latitude: <input type="text" name="newlat" placeholder="Type New Latitude">
            <br>
            Longitude: <input type="text" name="newlong" placeholder="Type New Longitude">
            <br>
            Wifi:
            <select name="wifi">
                <option>N/A</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <br>
            Star Review: <input type="text" name="starreview" placeholder="Type New Star Review">
            <br><br>

            <input type="submit" value="Add New Location">
        </form>

    </div>
</body>
</html>
