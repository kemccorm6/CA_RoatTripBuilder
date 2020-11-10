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
    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .makeatrip {
            width: 40%;
            margin: auto;
            z-index: 10;
            position: fixed;
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
        }
    </style>
</head>
<body>
<div class="topheader">
    <a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/frontpage/frontpageV2.php">
        <img src="myalogo1.png" id="logo"></a>
    <div class="navbar">
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">LOGIN</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Community/communityMAIN.php">COMMUNITY</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Mission/missionMAIN.php">OUR MISSION</a> </div>
        <div class="navitem"><br><br><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Team/teamMAIN.php">OUR TEAM</a> </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="makeatrip">
                    <div class="left-col">
                        <h1>Make a Trip</h1>
<!--                        <hr>-->
                        <br>
                        <form method="get" action="../results/results.php">

                            <div class="label">Location:</div>
                            <div class="input">

                                <select name="locationsearch">
                                    <option value="ALL">SELECT LOCATION</option>
                                    <option value="ALL">--------------</option>

                                    <?php

                                    $sql = "SELECT * FROM location_table".
                                        " WHERE locationname != '' AND locationname != ' '";

                                    $results = $mysql->query($sql);

                                    while($currentrow = $results->fetch_assoc()){
                                        echo "<option>" . $currentrow["locationname"] . "</option>";
                                    }
                                    ?>

                                </select>


<!--                                                     <form>-->
<!--                                                           <select name="location">-->
<!--                                                              <option value="ALL">Select a Location</option>-->
<!--                                                               <option value="ALL">---------------</option>-->
<!--                                                         </select>-->
<!--                                                  </form>-->


                            </div> <br clear="all"/>
                            <div class="label">City:</div>
                            <div class="input">

                                <select name="citysearch">
                                    <option value="ALL">SELECT CITY</option>
                                    <option value="ALL">--------------</option>

                                    <?php

                                    $sql = "SELECT * FROM city_table".
                                        " WHERE city != '' AND city != ' '";

                                    $results = $mysql->query($sql);

                                    while($currentrow = $results->fetch_assoc()){
                                        echo "<option>" . $currentrow["city"] . "</option>";
                                    }
                                    ?>

                                </select>

<!--                                                       <form>-->
<!--                                                           <select name="city">-->
<!--                                                                <option value="ALL">Select a City</option>-->
<!--                                                            <option value="ALL">---------------</option>-->
<!--                                                          </select>-->
<!--                                                      </form>-->


                            </div> <br clear="all"/>

                            <div class="label">Type:</div>
                            <form class="input">

                                <select name="typesearch">
                                    <option value="ALL">SELECT TYPE</option>
                                    <option value="ALL">--------------</option>

                                    <?php

                                    $sql = "SELECT * FROM type_table".
                                        " WHERE type != '' AND type != ' '";

                                    $results = $mysql->query($sql);

                                    while($currentrow = $results->fetch_assoc()){
                                        echo "<option>" . $currentrow["type"] . "</option>";
                                    }
                                    ?>

                                </select>
                            </form>

<!--                                <form>-->
<!--                                    <select name="city">-->
<!--                                        <option value="ALL">Select a Type</option>-->
<!--                                        <option value="ALL">---------------</option>-->
<!--                                    </select>-->

<!--                                </form>-->
                                <br>
                                <input type="submit" value="Search" class="submit">
                                <!--                    </form>

                            </div>
                            <br><br>

                    </div>
                </div>




</div>
</body>
</html>
