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
            width: 800px;
            float: right;
            display: block;
            background-image: url("fpbg.png");
            background-size: 89%;
            background-position: top;
            background-repeat: no-repeat;
            height: 3000px;
            overflow: scroll;

        } 
        #badge {
            width: 700px;
            margin: auto;
        }
        .sticky {
            position: fixed;
            top: 0;
            right: 50px;
        }
        .header {
            margin: auto;
        }
        .side2 {

            width: 600px;
            float: right;

        }
        #mission1 {
            width: 350px;
            float: left;

        }
        #mission22 {
            width: 300px;
            position: relative;
            top: 0px;
            float: right;
            margin: auto;
        }
        .missionarea {
            width: 100%;
            height: 500px;

        }
        #step1 {
            position: relative;
            top: 15px;
            width: 300px;
            display: block;
            margin: auto;

        }
        #step2 {
            position: relative;
            width: 300px;
            top: 45px;
            display: block;
            margin: auto;
        }
        #step3 {
            position: relative;
            width: 300px;
            top: 75px;
            display: block;
            margin: auto;
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
width: 200px;
            float: left;
            margin: auto;
            display: block;

        }
.datavissection {
    box-shadow: 1px 1px 6px black;
    background: linear-gradient(196deg, #fcec41, #d84848, #fea738, #fe6a38);
    background-size: 800% 800%;
    -moz-animation: AnimationName 28s ease infinite;
    animation: AnimationName 28s ease infinite;
    color: white;
    font-family: Poppins;

    border-radius: 15px;
}
        @-moz-keyframes AnimationName {
            0%{background-position:50% 0%}
            50%{background-position:51% 100%}
            100%{background-position:50% 0%}
        }
        @keyframes AnimationName {
            0%{background-position:50% 0%}
            50%{background-position:51% 100%}
            100%{background-position:50% 0%}
        }
        .cities {
            margin-left: 30px;
            line-height: 40pt;
        }
        .cityname {
            font-size: 15pt;
      padding-top: 25px;
            padding-left: 10px;

        }

        #cityphoto {
            float: left;
            box-shadow: 1px 1px 6px black;

        }
#datatitle {
    font-size: 17pt;
    margin: auto;
    padding-top: 0;
    padding-bottom: 5px;
    text-align: center;
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
        <div class="missionarea">
        <img src="mission1.png" id="mission1">
        <img src="mission2.png" id="mission22">
            <img src="giphy.gif" id="tire">
        </div>

        <div class="datavissection">
            <div id="datatitle"> <br>See the most popular <br>locations from our users:</div>

            <?php
            $dataviz = "SELECT * FROM DataVizImage";
            $resdv = $mysql->query($dataviz);

            while($crdata = $resdv->fetch_assoc()){

                ?>

                <div class="cities">
                    <img id="cityphoto" style="border-radius: 200px;width:<?php echo $crdata["TripCount"]*5; ?>px;height:<?php echo $crdata["TripCount"]*5; ?>px;" src="<?php echo $crdata["imageurl"]; ?>">
                   <div class="cityname"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $crdata["locationname"]; ?></div>
                    <br>
                </div>


            <?php
            }
            ?>
        </div>




        <img src="step1start.png" id="step1">
        <img src="step2end.png" id="step2">
        <img src="step3sites.png" id="step3">



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
