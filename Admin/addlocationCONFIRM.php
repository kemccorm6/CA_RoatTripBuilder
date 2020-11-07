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

$sql= "INSERT INTO location_table" .
    "(locationname, address, city, type, petfriendly, latitude, longitude, wifi, star_review)" .
    "VALUES " .
    "( " .
    " '" . $_REQUEST["newlocationname"] . "', " .
    " '" . $_REQUEST["newaddress"] . "', " .
    $_REQUEST["newcity"] . ", " .
    $_REQUEST["newtype"] . ", " .
    $_REQUEST["petfriendly"] . ", " .
    " '" . $_REQUEST["newlat"] . "', " .
    " '" . $_REQUEST["newlong"] . "', " .
    $_REQUEST["wifi"] . ", " .
    " '" . $_REQUEST["starreview"] . "' " .
    ")";

$results = $mysql->query($sql);

if(!$results){
    echo "Something went wrong check error: " . $mysql->error;
    exit();
}else{
    echo "Congratulations you added a ". $_REQUEST['newlocationname'];


}


?>
<html>
<head>
    <title>Add Location Confirmation</title>

</head>
<body>
<br><br>
<a href="addlocation.php">Add Another Location</a>
<br>
<a href="adminmainLOCATION.php">Go Back to Main Page</a>

</body>
</html>

