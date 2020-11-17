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
echo $usersql;

    $userresults = $mysql->query($usersql);
    $currentrow = $userresults->fetch_assoc();
}else{
    header("Location: ../Login/CA_RoadTripLOGIN.php");
}
?>
<html>
<head>


    <title>User Profile</title>
    <style>
        .bigbox{
            width:1000px;
            padding: 15px;
            margin:auto;
            height: 1300px;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            margin-bottom: 100px;
        }
        th, td {
            border: 1px solid #900;
            border-collapse: collapse;
            padding:    10px;
            text-align: center;
        }
        #stepcircle{
            width:75px;
            height:75px;
            border-radius: 150px;
            margin: auto;
            background-color: #FFFFFF;
            border: 1px solid white;
            text-align: center;
            line-height: 60pt;
            color: black;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);

            top: 25%;
            left: 0%;
        }

    </style>
</head>
<body>
<?php include "../newheader.php" ?>
<div class="container">
    <div class="bigbox">
        <table style="width:100%">
            <tr>
                <th>Stop #</th>
                <th>Location Details</th>

            </tr>
            <tr>
                <td> <div id="stepcircle">Start</div></td>
                <td>
                    <div class="" id="stopinfo">
                    <?php
                    $cityse = "SELECT * FROM StartEndCities WHERE savedtripID = ". $_REQUEST["tripid"] ." AND userID =" . $_SESSION["UserId"];
                    $cer = $mysql->query($cityse);
                    $cecr = $cer->fetch_assoc();
                    ?>

                        <div id="locationname"><?php echo $cecr["citySTART"]; ?></div>
                        <div id="typesrow">

                        </div><br>
                        <div id="notes">
                            Start city
                        </div>
                    </div>
                </td>

            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>

            </tr>

        </table>

    </div>
</div>

</body>
</html>
