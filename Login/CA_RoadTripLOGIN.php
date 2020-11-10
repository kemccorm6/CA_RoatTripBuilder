

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
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .createacc {
            width: 50%;
            height: 500px;
            background-color: #F06A00;
            margin: auto;
            margin-top: 100px;
            border-radius: 15px;
            text-align: center;
            color: white;
            padding: 50px;
            background: -webkit-linear-gradient(to bottom, #F06A00, #823001);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #F06A00, #823001); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        #title1 {
            font-size: 24pt;
            margin: auto;
            width: 80%;
            height: 70px;
            line-height: 70px;
            border-radius: 10px;
            /*  background-color: white; */
            color: white;
        }
        input {
            height: 60px;
            width: 70%;
            font-size: 13pt;
            border-radius: 20px;
            line-height: 13pt;

        }
        #submit {
            width: 40%;
            border-radius: 10px;
            background-color: #85A867;
            color: white;
        }
        ::-webkit-input-placeholder { /* Edge */
            color: #6b6a6a;
        }

        :-ms-input-placeholder { /* Internet Explorer */
            color: #6b6a6a;
        }
        input[id^="username"]::placeholder {
            background-image: url("https://img.icons8.com/material-outlined/24/F09B32/user-male.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
        input[id^="password"]::placeholder {
            background-image: url("https://img.icons8.com/windows/32/F09B32/lock-2.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
        input[id^="checkedadmin"]::placeholder {
            background-image: url("https://img.icons8.com/windows/32/F09B32/lock-2.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
        #admincheck {
           width: 30px;
margin: auto;
            float: left;
        }
        label {

            padding:0px;
margin: auto;
           height: 50px;
            display:block;
            width: 170px;
            line-height: 45pt;
            text-align: center;
        }
        #checkedadmin {
            margin: auto;
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


    <div class="createacc" id="createacc2" style="height: 500px;">
        <div id="title1">Log In</div>
        <br>
        New here? <a href="CREATEACC_V2.php">Create an Account</a>
        <br><br>

        <form action="../UserProfile/userprofile.php">
            Username: <br>
            <input id="username" type="text" name="usernamel" placeholder=" &nbsp; &nbsp;  username"><br>
            Password: <br>
            <input id="password" type="text" name="passwordl" placeholder=" &nbsp; &nbsp;  password"><br><br>
            <label><input type="checkbox" name="admin" value="admin" id="admincheck" onclick="reveal()">Check if Admin</label>

            <input type="text" name="adminpassword" placeholder="&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; admin password" style="display:none" id="checkedadmin">
            <br><br><input id="submit" type="submit" value="Log In">

            <script>
                function reveal(){
                    var checkbox = document.getElementById("admincheck");
                    var text = document.getElementById("checkedadmin");
                    var boxheight = document.getElementById("createacc2");
                    if (checkbox.checked == true){
                        text.style.display = "block";
                        boxheight.style.height = "600px";
                    }else{
                        text.style.display = "none";
                        boxheight.style.height = "500px";

                    }
                }
            </script>
        </form>


    </div> <!-- close container-->
</body>
</html>
</body>
</html>