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
?>
<html>
<head>
    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        body {

            background-image: url("tiretracks.png");
            /*background: linear-gradient(to bottom, #f1f0c9, #ecf2d6);*/
            background-size: 2250px 1250px ;
        }
        .makeatrip {
            width: 50%;
            margin: auto;
            z-index: 10;
            /*position: fixed;*/
            top: 200px;
            box-shadow: 1px 1px 6px black;
            background-color: #D14A0A;
            color: white;
            border-radius: 15px;
            height: 450px;
            left: 300px;
            padding: 15px;
            padding-bottom: 30px;
            text-align: center;
            font-size: 18pt;
            margin-top: 100px;
        }
        select {
            height: 40px;
            width: 200px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            border-radius: 10px;
            font-family: 'Yanone Kaffeesatz', sans-serif;
            font-size: 14pt;


        }

        .input {
            margin: auto;
            width: 350px;
            clear: both;
            text-align: right;
        }

        .label {
            float: left;
        }
        #submit {
            width:50% !important;
            height: 40px;
            font-size: 16pt;
            border-radius: 15px;
            margin:0 auto !important;
            display:block !important;
            float:none !important;
            background-color: #85A867;
            color: #FFFFFF;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }
        form {
            margin: auto;
        }
        h1 {margin-bottom: 60px;
        }
    </style>

</head>
<body>
<?php include "../masterHTML.php" ?>
<!--<div class="topheader">-->
<!--    <a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/frontpage/frontpageV2.php">-->
<!--        <img src="myalogo1.png" id="logo"></a>-->
<!--    <div class="navbar">-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">LOGIN</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Community/communityMAIN.php">COMMUNITY</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Mission/missionMAIN.php">OUR MISSION</a> </div>-->
<!--        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Team/teamMAIN.php">OUR TEAM</a> </div>-->
<!--        <div class="navitem"><br><br>Hi --><?php //echo $currentrow["User_Real_Name"] ?><!-- !</div>-->
<!--    </div>-->
<!--   <div class="profile"><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php"><img class="profileimage" src="myprofile_button-07.png"></a></div>-->
<!--</div>-->
<!--<hr>-->
<div class="container">
    <div class="makeatrip">

                        <h1>Make a Trip</h1>
        <form action="addcities.php">
            <div class="input">
            <div class="label">Start City:</div>

                <select name="citysearchstart">
                    <?php
                        $citysearchsql = "SELECT * FROM city_table ";

                        $cityresults = $mysql->query($citysearchsql);

                        while($citycurrentrow = $cityresults-> fetch_assoc()){
                        echo "<option value= '" . $citycurrentrow["cityID"] . "'>" . $citycurrentrow["city"] . "</option>";
                    }
                    ?>

                    <option>Los Angeles</option>
                </select>
            </div>
<br>
            <div class="input">
                <div class="label">End City:</div>
                <select name="citysearchend">
                    <?php
                    $citysearchsql2 = "SELECT * FROM city_table ";

                    $cityresults2 = $mysql->query($citysearchsql2);

                    while($citycurrentrow2 = $cityresults2-> fetch_assoc()){
                        echo "<option value= '" . $citycurrentrow2["cityID"] . "'>" . $citycurrentrow2["city"] . "</option>";
                    }
                    ?>

                </select>
            </div>
            <br><br>

                <input type="submit" id="submit" value="Make Trip" />

        </form>
<!--                        <hr>-->
<!--                        <br>-->
                     <!--   <form method="get" action="../results/results.php">



                            <div class="label">Start City:</div>
                            <div class="input">

                                <select name="citysearch">
                                    <option value="ALL">SELECT CITY</option>
                                    <option value="ALL">--------------</option>

                             //       <?php

                         //           $sql = "SELECT * FROM city_table".
                           //             " WHERE city != '' AND city != ' '";

                          //          $results = $mysql->query($sql);

                           //         while($currentrow = $results->fetch_assoc()){
                                     //   echo "<option>" . $currentrow["city"] . "</option>";
                           //         }
                            //        ?>

                                </select>
                            </div> <br clear="all"/>

    <div class="label">End City:</div>
    <div class="input">

        <select name="citysearch">
            <option value="ALL">SELECT CITY</option>
            <option value="ALL">--------------</option>



        /*    $sql = "SELECT * FROM city_table".
                " WHERE city != '' AND city != ' '";

            $results = $mysql->query($sql);

            while($currentrow = $results->fetch_assoc()){
                echo "<option>" . $currentrow["city"] . "</option>";
            }
            ?>

        </select>
    </div> <br clear="all"/>

                                <br>
                                <input type="submit" value="Search" class="submit">
                                                    </form>

                            </div>
                            <br><br>
                            -->

                    </div>
                </div>
</div>




</div>
</body>
</html>
