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
$sql = "UPDATE city_table
        SET 
        city ='" . $_REQUEST["editcity"] . "' " .
    "WHERE cityID = " . $_REQUEST["id"];

$results = $mysql -> query($sql);

if(!$results){
    echo "Error " . $mysql-> error;
    echo "<br>SQL" . $sql;
}else{
?>

<html>
<head>
    <title>Edit City Confirmation</title>

</head>
<body>
EDIT CITY CONFIRMATION
<br><br>
<?php
echo "Your City edit has been updated!";
}

?>

<br><br>


<a href="../adminmainCITY.php">Go Back to Main Page</a>

</body>
</html>

