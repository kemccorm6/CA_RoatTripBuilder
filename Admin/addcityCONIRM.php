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
$sql= "INSERT INTO city_table " .
    "(city)" .
    "VALUES" .
    "( " .
    " '" . $_REQUEST["newcity"] . "' ) ";

$results = $mysql->query($sql);

if(!$results){
    echo "Something went wrong check error: " . $mysql->error;
    exit();
}else{
    echo "Congratulations you added the '". $_REQUEST['newcity'] . "' city";


}
?>

<html>
<head>
    <title>Add City Confirmation</title>

</head>
<body>
<br><br>
<a href="addcity.php">Add Another City</a>
<br>
<a href="adminmainCITY.php">Go Back to Main Page</a>

</body>
</html>

