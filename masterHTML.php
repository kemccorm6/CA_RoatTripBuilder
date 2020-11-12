<html>
<head>
    <script src="http://code.jquery.com/jquery.js"></script>

    <title>User Profile</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>


        </style>
</head>
<body>
<div class="topheader">
    <a href="../frontpage/frontpageV2.php">
        <img src="myalogo1.png" id="logo"></a>
    <div class="navbar">
        <?php
        if(!empty($_SESSION["start"])){
            echo "<div class='profile'><a href='../UserProfile/userprofile.php?id=". $_SESSION["UserId"] ."'>";
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

    <!--    <div class="profile"><a href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/UserProfile/userprofile.php">-->
    <!--            <img class="profileimage" src="myprofile_button-07.png"></a></div>-->
    <div id="logged"><br><br>Hi <?php echo $currentrow["User_Real_Name"] ?> !</div>
</div>
<hr>

<div class="container">


</div>
</body>
</html>
