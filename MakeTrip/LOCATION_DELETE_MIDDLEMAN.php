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
$delsql = "DELETE FROM trip_points_table WHERE tripID=" . $_REQUEST["tripid"] . " AND " . "locationID=" . $_REQUEST["deletedlocationid"];
echo $delsql;
$deleteresult = $mysql->query($delsql);

echo "console.log('" . $deleteresult . "');";



header("Location: addcities.php?tripid=" . $_REQUEST["tripid"] . "&citysearchstart=" . $_REQUEST["citysearchstart"] . "&citysearchend=" . $_REQUEST["citysearchend"]);
?>
