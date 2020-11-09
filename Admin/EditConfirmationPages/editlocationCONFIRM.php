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
$sql = "UPDATE location_table
        SET 
        locationname ='" . $_REQUEST["editlocationname"] . "', " .
        "address ='" . $_REQUEST["editaddress"] . "', " .
        "city ='" . $_REQUEST["editlocationcity"] . "', " .
        "type ='" . $_REQUEST["editlocationtype"] . "', " .
        "petfriendly ='" . $_REQUEST["editpetfriend"] . "', " .
        "latitude ='" . $_REQUEST["editlatitude"] . "', " .
        "longitude ='" . $_REQUEST["editlongitude"] . "', " .
        "wifi ='" . $_REQUEST["editwifi"] . "', " .
        "star_review ='" . $_REQUEST["editstar"] . "' " .
    "WHERE locationID = " . $_REQUEST["id"];



$results = $mysql -> query($sql);

if(!$results){
    echo "Error " . $mysql-> error;
    echo "<br>SQL" . $sql;
}else{
//?>

<html>
<head>
    <title>Edit Location Confirmation</title>

</head>
<body>
EDIT LOCATION CONFIRMATION
<br><br>
<?php
echo "Your Location edit has been updated!";

}
?>

<br><br>


<a href="../adminmainLOCATION.php">Go Back to Main Page</a>

</body>
</html>


