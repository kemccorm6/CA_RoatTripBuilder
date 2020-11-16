<?php
session_start();
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
if(!empty ($_SESSION["start"])) {
    $usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

    $userresults = $mysql->query($usersql);
    $currentrow = $userresults->fetch_assoc();

}

$ausql = "UPDATE saved_trips_table SET trip_name = '" . $_REQUEST["newtitletext"] . "' WHERE savedtripID = " . $_REQUEST["tripid"] .
" AND userID =" . $_SESSION["UserId"];
echo $ausql;
$ressql = $mysql->query($ausql);





header("Location: ../UserProfile/MyRoadtripDetails.php?tripid=" . $_REQUEST["tripid"] . "&userID=" . $_SESSION["UserId"])
?>

