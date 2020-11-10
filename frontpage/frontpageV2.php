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

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}



?>


<html>
<head>
    <link rel = "stylesheet"
          type = "text/css"
          href = "...master2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>


        .side1 {
            width: 1000px;
            float: right;
            background-image: url("fpbg.png");
            background-size: 90%;
            background-position: top;
            background-repeat: no-repeat;
            height: 3500px;

        }
        #badge {
            width: 900px;
            margin: auto;
        }
        .sticky {
            position: fixed;
            top: 0;
            right: 42px;
        }
        .header {
            margin: auto;
        }
        .side2 {
            height: 3500px;
            width: 400px;
            float: right;

        }
        .mission {
            width: 350px;
            text-align: center;
            margin: auto;
            font-size: 30pt;
            font-weight: bold;
        }
        #mission1 {
            width: 400px;
        }
        #mission22 {
            width: 400px;
            position: relative;
            top: 0px;
            margin: auto;
        }
        #step1 {
            position: relative;
            width: 350px;

        }
        #step2 {
            position: relative;
            width: 350px;
            top: 75px;
        }
        #step3 {
            position: relative;
            width: 350px;
            top: 75px;
        }  #step4 {
               position: relative;
               width: 350px;
               top: 75px;
           }
        #step5 {
            position: relative;
            width: 350px;
            top: 75px;
        }
        #step6 {
            position: relative;
            width: 350px;
            top: 75px;
        }
        .howitworks {
            width: 300px;
            text-align: center;
            margin: auto;
            font-size: 30pt;
            padding-top: 50px;
            position: relative;
            top: 1300px;
            line-height: 300px;
        }
        .makeatrip {
            width: 300px;
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

        .label {
            padding: 10px;
            font-size: 14pt;
            text-align: center;
        }
        .submit {
            width: 100px;
            height: 30px;
            border-radius: 10px;
            background-color: #FFAC00;
            color: white;
        }
        h1 {
            text-align: center;
        }
        select {
            width: 200px;
            height: 30px;
            background-color: white;
            border-radius: 10px;

        }

        #single:hover {
            background-color: #FFAC00;
            width: 200px;
            height: 50px;
            font-weight: bold;
            box-sizing: border-box;
            border-radius: 10px;
        }
        #icon {
            margin: 10px;
            float: left;
            width: 25px;
            fill: white;
        }
        #tire {
            position: relative;

            margin: auto;
            display: block;

        }
        .profile {
            width: 100px;
            right: 0;
            /*height: 50px;*/
            top: 50px;
            position: absolute;
            /*background-color: red;*/
            float: left;
            padding: 5px;
            color: white;
            margin-right: 30px;
        }
        .profileimage{
            width: 100%;
            /*border-radius: 100px;*/
            /*line-height: 20px;*/
            /*text-align: center;*/
            /*float: right;*/
            /*background-color: #FFD789;*/
            /*font-size: 15pt;*/

            /*font-family: 'Yanone Kaffeesatz', sans-serif;*/
        }

    </style>
</head>
<body>
<div class="topheader">
    <a href="../frontpage/frontpageV2.php">
        <img src="myalogo1.png" id="logo"></a>
    <div class="navbar">

        <?php
        if(!empty($_SESSION["start"])){
            echo "<div class='profile'><a href='../UserProfile/userprofile.php'>";
            echo "<img class='profileimage' src='../myprofile_button-07.png'></a></div>";
        }else{
            echo "<div class='navitem'><br><br><a href='../Login/CA_RoadTripLOGIN.php'>LOGIN</a> </div>";
        }

        ?>

        <div class="navitem"><br><br><a href="../MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>
        <div class="navitem"><br><br><a href="../Community/communityMAIN.php">COMMUNITY</a> </div>
        <div class="navitem"><br><br><a href="../Mission/missionMAIN.php">OUR MISSION</a> </div>
        <div class="navitem"><br><br><a href="../Team/teamMAIN.php">OUR TEAM</a> </div>

    </div>



</div>
<!--<hr>-->

<div class="container">
    <div class="side1">

        <div class="header" id="badge">
            <img src="badgetan2.svg" >

        </div>
    </div>

    <div class="side2">
        <img src="mission1.png" id="mission1">
<!--        <div class="makeatrip">-->
<!--            <div class="left-col">-->
<!--                <h1>Make a Trip</h1>-->
<!--                <hr>-->
<!--                <br>-->
<!--                <form method="get" action="../results/results.php">-->
<!---->
<!--                    <div class="label">Location:</div>-->
<!--                    <div class="input">-->
<!---->
<!--                        <select name="locationsearch">-->
<!--                            <option value="ALL">SELECT LOCATION</option>-->
<!--                            <option value="ALL">--------------</option>-->
<!---->
<!--                            --><?php
//
//                            $sql = "SELECT * FROM location_table".
//                                " WHERE locationname != '' AND locationname != ' '";
//
//                            $results = $mysql->query($sql);
//
//                            while($currentrow = $results->fetch_assoc()){
//                                echo "<option>" . $currentrow["locationname"] . "</option>";
//                            }
//                            ?>
<!---->
<!--                        </select>-->
<!---->
<!---->
<!--                                             <form>-->
<!--                                                   <select name="location">-->
<!--                                                      <option value="ALL">Select a Location</option>-->
<!--                                                       <option value="ALL">---------------</option>-->
<!--                                                 </select>-->
<!--                                          </form>-->
<!---->
<!---->
<!--                    </div> <br clear="all"/>-->
<!--                    <div class="label">City:</div>-->
<!--                    <div class="input">-->
<!---->
<!--                        <select name="citysearch">-->
<!--                            <option value="ALL">SELECT CITY</option>-->
<!--                            <option value="ALL">--------------</option>-->
<!---->
<!--                            --><?php
//
//                            $sql = "SELECT * FROM city_table".
//                                " WHERE city != '' AND city != ' '";
//
//                            $results = $mysql->query($sql);
//
//                            while($currentrow = $results->fetch_assoc()){
//                                echo "<option>" . $currentrow["city"] . "</option>";
//                            }
//                            ?>
<!---->
<!--                        </select>-->
<!---->
<!--                                               <form>-->
<!--                                                   <select name="city">-->
<!--                                                        <option value="ALL">Select a City</option>-->
<!--                                                    <option value="ALL">---------------</option>-->
<!--                                                  </select>-->
<!--                                              </form>-->
<!---->
<!---->
<!--                    </div> <br clear="all"/>-->
<!---->
<!--                    <div class="label">Type:</div>-->
<!--                    <div class="input">-->
<!---->
<!--                        <select name="typesearch">-->
<!--                            <option value="ALL">SELECT TYPE</option>-->
<!--                            <option value="ALL">--------------</option>-->
<!---->
<!--                            --><?php
//
//                            $sql = "SELECT * FROM type_table".
//                                " WHERE type != '' AND type != ' '";
//
//                            $results = $mysql->query($sql);
//
//                            while($currentrow = $results->fetch_assoc()){
//                                echo "<option>" . $currentrow["type"] . "</option>";
//                            }
//                            ?>
<!---->
<!--                        </select>-->


                        <!--                        <form>-->
                        <!--                            <select name="city">-->
                        <!--                                <option value="ALL">Select a Type</option>-->
                        <!--                                <option value="ALL">---------------</option>-->
                        <!--                            </select>-->
                        <!---->
                        <!--                        </form>-->
<!--                        <br><br>-->
<!--                        <input type="submit" value="Search" class="submit">-->
<!--                        <!--                    </form>-->
<!---->
<!--                    </div>-->
<!--                    <br><br>-->
<!---->
<!--            </div>-->
<!--        </div>-->
        <img src="mission2.png" id="mission22">
        <img src="giphy.gif" id="tire">

        <img src="step1.png" id="step1">
        <img src="step2.png" id="step2">
        <img src="step3.png" id="step3">
        <img src="step4.png" id="step4">
        <img src="step5.png" id="step5">
        <img src="step6.png" id="step6">


    </div>

    </div>
</div>


</body>
<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("badge");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
            background-oregon-grapes.classList.add("addbg");
        } else {
            header.classList.remove("sticky");
        }
    }


</script>
</html>
