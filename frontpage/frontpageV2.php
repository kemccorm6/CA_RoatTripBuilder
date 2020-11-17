<?php
session_start();
//session_destroy();
//$_SESSION["start"] = "";

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



if(!empty ($_SESSION["start"])){


$usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

$userresults = $mysql-> query($usersql);
$currentrow = $userresults->fetch_assoc();


}

?>


<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP0XNFSS02"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HP0XNFSS02');
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>


        .side1 {
            width: 1000px;
            float: right;
            display: block;
            background-image: url("fpbg.png");
            background-size: 90%;
            background-position: top;
            background-repeat: no-repeat;
            height: 3500px;
            overflow: scroll;

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

            width: 400px;
            float: right;

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



        h1 {
            text-align: center;
        }
        select {
            width: 200px;
            height: 30px;
            background-color: white;
            border-radius: 10px;

        }

        #tire {
            position: relative;

            margin: auto;
            display: block;

        }


    </style>
</head>
<body>

<?php include "../newheader.php" ?>


<div class="container">
    <div class="side1">

        <div class="header" id="badge">
            <img src="badge.svg" >

        </div>
    </div>

    <div class="side2">
        <div>
        See the most popular locations from our users:
            <br><br>
            <?php
            $dataviz = "SELECT * FROM DataVizImage";
            $resdv = $mysql->query($dataviz);

            while($crdata = $resdv->fetch_assoc()){

                ?>

                <div>
                    <img style="border-radius: 200px;width:<?php echo $crdata["TripCount"]*5; ?>px;height:<?php echo $crdata["TripCount"]*5; ?>px;" src="<?php echo $crdata["imageurl"]; ?>">
                    <?php echo $crdata["locationname"]; ?>
                    <br>
                </div>


            <?php
            }
            ?>
        </div>

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
<!--                                         </form>-->
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
