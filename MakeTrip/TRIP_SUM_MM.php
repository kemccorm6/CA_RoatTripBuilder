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
$ausql = "UPDATE saved_trips_table SET userID = " . $_SESSION["UserId"] ." , trip_name='My Trip' , trip_description='Write a description about your roadtrip. Include goals, ideas, key places and memories!' WHERE savedtripID = " . $_REQUEST["tripid"];
//echo $ausql;
$ressql = $mysql->query($ausql);

$pointseq = explode( "_" ,  $_REQUEST['pointorder']);

print_r($pointseq);
echo "<br> ";
$getpoints = "SELECT trippointID , locationID FROM trip_points_table WHERE tripID = " . $_REQUEST["tripid"] . " ORDER BY trippointID ASC";
echo $getpoints . "<br>";
$getpointsres = $mysql -> query($getpoints) ;

$revseq = [] ;
for( $i = 0 ; $i < sizeof($pointseq) ; $i ++) {
    $revseq[$pointseq[$i]] = $i;
};

print_r($revseq) ;
$index = 0 ;
while ($getpointrow = $getpointsres -> fetch_assoc()  ) {
    $updatesql = "UPDATE trip_points_table set waypointorder = " . $revseq[ $getpointrow["locationID"] ] . " WHERE trippointid = " . $getpointrow["trippointID"] ;
    $res = $mysql -> query($updatesql) ;
    $index += 1 ;
    echo $updatesql . "<br>";
}



header("Location: ../UserProfile/MyRoadtripDetails.php?tripid=" . $_REQUEST["tripid"] . "&userID=" . $_SESSION["UserId"])
?>
