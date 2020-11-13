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
.loginimage {
    width: 130px;
    margin: auto;
  display: block;
    margin-top: 10px;
}
.loginarea {
    float: right;
    width: 25%;

    height: 150px;
}

        </style>
</head>
<script>
    $(document).ready(function() {

        $(".loginimage").click(function (){
            window.location.href="Login/CA_RoadTripLOGIN.php";
            return false;
        });
        $("#tab12").click(function (){
            window.location.href="userprofile.php";
            return false;
        });


        $('#tabs a').click(function(e) {
            e.preventDefault();
            if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
                return;
            }
            else{
                $("#content").find("[id^='tab']").hide(); // Hide all content
                $("#tabs li").attr("id",""); //Reset id's
                $(this).parent().attr("id","current"); // Activate this
                $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
            }
        });
    });
</script>
<body>
<div class="topheader">
    <a href=" ../frontpage/frontpageV2.php">
        <img src="myalogo1.png" id="logo"></a>
    <div class="navbar">


        <div class="navitem"><br><br><a href=" ../MakeTrip/maketripMAIN.php">MAKE A TRIP</a> </div>
        <div class="navitem"><br><br><a href=" ../Community/communityMAIN.php">COMMUNITY</a> </div>
        <div class="navitem"><br><br><a href=" ../Mission/missionMAIN.php">OUR MISSION</a> </div>
        <div class="navitem"><br><br><a href=" ../Team/teamMAIN.php">OUR TEAM</a> </div>
    </div>
        <?php
        if(!empty($_SESSION["start"])){
            echo "<div class='profile'><a href='../UserProfile/userprofile.php?id=". $_SESSION["UserId"] ."'>";
            echo "<img class='profileimage' src='../myprofile_button-07.png'></a></div>";
            echo "<div id='logged'><br><br> Hi " . $currentrow["User_Real_Name"] . "! </div>";
        }else{
            echo "<div class='loginarea'><br><br><a href='../Login/CA_RoadTripLOGIN.php'><img class='loginimage' src='login_button-07.png'></a> </div>";

        }

        ?>




</div>
<!--hr><-->
<br>

<div class="container">


</div>
</body>
</html>
