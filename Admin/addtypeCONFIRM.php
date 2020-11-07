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
$sql= "INSERT INTO type_table " .
    "(type)" .
    "VALUES" .
    "( " .
    " '" . $_REQUEST["newtype"] . "' ) ";

$results = $mysql->query($sql);

if(!$results){
    echo "Something went wrong check error: " . $mysql->error;
    exit();
}else{
    echo "Congratulations you added the '". $_REQUEST['newtype'] . "' type";


}
?>

<html>
<head>
    <title>Add Type Confirmation</title>

</head>
<body>
<br><br>
<a href="addtype.php">Add Another Type</a>
<br>
<a href="adminmainTYPE.php">Go Back to Main Page</a>

</body>
</html>
