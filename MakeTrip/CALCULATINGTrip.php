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




                $insertsql = "INSERT INTO saved_trips_table (start_cityID , end_cityID ) VALUES ( " .
                    $_REQUEST["citysearchstart"] . " , " . $_REQUEST["citysearchend"] . ")" ;
                echo($insertsql);
                $readback =$mysql -> query($insertsql) ;
                echo($readback);

                $lastidsql = "SELECT max(savedtripID)  as LastID from saved_trips_table";
                $lastid = $mysql -> query($lastidsql);
                $lastidvalres = $lastid -> fetch_assoc();

                $lastidval = $lastidvalres["LastID"];



                $mapsql = "SELECT * FROM city_table WHERE cityID = " . $_REQUEST["citysearchstart"];
                $mapstartresults = $mysql->query($mapsql);
                $mapstartcurrentrow = $mapstartresults-> fetch_assoc();

                //            echo "<br> long = " . $mapstartcurrentrow["city_longitude"] . " lat = " . $mapstartcurrentrow["city_latitude"];


                //        echo "<br>";

                // citysearchend

                $mapsqlend = "SELECT * FROM city_table WHERE cityID = " . $_REQUEST["citysearchend"];
                $mapendresults = $mysql->query($mapsqlend);
                $mapendcurrentrow = $mapendresults-> fetch_assoc();

                //Generating trip points

                //        echo "start Lat " . $mapstartcurrentrow["city_latitude"] . " end lat " . $mapendcurrentrow["city_latitude"] ;
                //        echo "<br>";
                //lat minimum
                $latmin = $mapstartcurrentrow["city_latitude"];
                if($mapendcurrentrow["city_latitude"] < $latmin){
                    $latmin = $mapendcurrentrow["city_latitude"];
                }
                //        echo "Min Lat " . $latmin;
                //        echo "<br>";

                //lat maximum
                $latmax = $mapendcurrentrow["city_latitude"];
                if($mapstartcurrentrow["city_latitude"] > $latmax){
                    $latmax = $mapstartcurrentrow["city_latitude"];
                }
                //        echo "Max Lat "  . $latmax;
                //        echo "<br>";


                //long min
                $longmin = $mapstartcurrentrow["city_longitude"];
                if($mapendcurrentrow["city_longitude"] < $longmin){
                    $longmin = $mapendcurrentrow["city_longitude"];
                }
                //        echo "Min Long " . $longmin;
                //        echo "<br>";

                //long max
                $longmax = $mapendcurrentrow["city_longitude"];
                if($mapstartcurrentrow["city_longitude"] > $longmax){
                    $longmax = $mapstartcurrentrow["city_longitude"];
                }
                //        echo "Max Long " . $longmax;
                //        echo "<br>";
                //        echo "<br>";

                //$locationsql = "SELECT * FROM location_table WHERE latitude >= " . $latmin . " AND latitude <= " . $latmax .
                //    " AND longitude >= " . $longmin . " AND longitude <= " .$longmax;
                $addlocationsql = "INSERT INTO trip_points_table (locationID , tripID ) SELECT location_table.locationID , " .
                    $lastidval . " as tripid FROM location_table WHERE latitude >= " . $latmin . " AND latitude <= " . $latmax .
                    " AND longitude >= " . $longmin . " AND longitude <= " .$longmax . " LIMIT 23";


                $addlocresults = $mysql->query($addlocationsql);






header("Location: addcities.php?tripid=" . $lastidval . "&citysearchstart=" . $_REQUEST["citysearchstart"] . "&citysearchend=" . $_REQUEST["citysearchend"]);
?>



