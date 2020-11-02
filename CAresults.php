<head>
    <meta charset="UTF-8">
    <style>
        .lname{
            /*border: black 1px solid;*/
            width: 400px;
            float: left;
        }
        .cname{
            /*border: black 1px solid;*/
            width: 200px;
            float: left;
        }
        .aname{
            /*border: black 1px solid;*/
            width: 400px;
            float: left;
            clear: none;
        }
    </style>
</head>

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

if($mysql->connect_errno) {
echo "db connection error : " . $mysql->connect_error;
exit();
}

$sql = "SELECT * FROM LocationView WHERE 1=1 ";

    if($_REQUEST["locationsearch"] != "ALL"){
        $sql .= " AND locationname = '" . $_REQUEST["locationsearch"] . "' ";
    }

    if($_REQUEST["citysearch"] != "ALL"){
        $sql .= " AND city = '" . $_REQUEST["citysearch"] . "' ";
    }

    if($_REQUEST["typesearch"] != "ALL"){
        $sql .= " AND type = '" . $_REQUEST["typesearch"] . "' ";
    }

$results = $mysql->query($sql);

    echo "There are " . $results->num_rows . " results.";
    echo "<hr>";
    echo "<div class='lname'> <strong>Location:</strong></div>";
    echo "<div class='cname'> <strong>City:</strong></div>";
    echo "<div class='cname'> <strong>Type:</strong></div>";
    echo "<div class='aname'> <strong>Address:</strong></div>";
    echo "<br><br>"; 


    while($currentrow = $results->fetch_assoc()){
        echo "<div class='lname'>". $currentrow["locationname"] . "</div>";
        echo "<div class='cname'>". $currentrow["city"] . "</div>";
        echo "<div class='cname'>". $currentrow["type"] . "</div>";
        echo "<div class='aname'>". $currentrow["address"] . "</div>";
        echo "<br>";

    }
?>
