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
    <title>Edit Type Confirmation</title>

</head>
<body>
EDIT TYPE CONFIRMATION
<br><br>


<a href="../adminmainTYPE.php">Go Back to Main Page</a>

</body>
</html>
