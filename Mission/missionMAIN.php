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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP0XNFSS02"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HP0XNFSS02');
    </script>
    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        body {

            background-image: url("tiretracks_copy.png");
            /*background: linear-gradient(to bottom, #f1f0c9, #ecf2d6);*/
            background-size: 2250px 1250px ;
        }
.missionbox {
    /*background-color: #f9d793;*/
    margin: auto;
    background: linear-gradient(196deg, #fcec41, #d84848, #fea738, #fe6a38);
    background-size: 800% 800%;
    -moz-animation: AnimationName 28s ease infinite;
    animation: AnimationName 28s ease infinite;
    color: white;
    width: 70%;
    border-radius: 20px;
    padding-left: 50px;
    padding-right: 50px;
    padding-bottom: 40px;
    padding-top: 30px;
    font-size: 18pt;
    text-align: center;
    box-shadow: 5px 5px 10px black;
    font-family: 'Poppins', sans-serif;
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
.missionlogobox {
    width: 60%;
    margin: auto;
    margin-bottom: 15px;
}
        .missionlogo {
            width: 100%;
        }
.missionbox h1 {
    text-align: center;
}



    </style>
</head>
<body>

<?php include "../newheader.php" ?>
<br>
<div class="container">

    <br><br>
    <div class="missionbox">
        <div class="missionlogobox"><div class="missionlogo"><img class="missionlogo" src="ourmission_logo-07.png"></div></div>
        California Dreamin’ is a volunteer based platform bringing you all of the best road trip stops up the California coast. Our mission is to bring adventure enthusiasts together through a simple one-stop platform. Head over to “Make a Trip” to begin planning your excursion, browse through photos posted by other users, and publish your adventures for others to see!
        <br><br>
        Because it’s not just a trip, it’s a story to share!</div>




</div>
</body>
</html>
