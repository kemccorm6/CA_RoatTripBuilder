
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
          href = "../account.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        .createacc {
            width: 50%;
            height: 500px;
            background-color: #F06A00;
            margin: auto;
            margin-top: 100px;
            margin-left: 30%;
            border-radius: 15px;
            text-align: center;
            color: white;
            padding: 50px;

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
        input[id^="email"]::placeholder {
            background-image: url("https://img.icons8.com/windows/32/F09B32/lock-2.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
    </style>
</head>
<body>
<div class="topheader">
    <img src="myalogo1.png" id="logo">

    <div class="login">
        <a style="text-decoration:none; color:white" href="login.html">Login</a>
    </div>
</div>
<hr>
    <div class="menu" style="border-right:1px solid #000;height:3500px">
        <div class="menuitem">

            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/user.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">User Login&nbsp;</a></div>
            <hr>
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/team.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Admin Login</a></div>
        </div>
        <hr>
        <div class="menuitem">

            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/suitcases.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Make a Trip</a></div>
            <hr>
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/conversation.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Discover Community</a></div>
        </div>
        <hr>
        <div class="menuitem">
            <a href="login"></a>
        </div>
        <hr>
        <div class="menuitem1">
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/target.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Our Mission</a></div>
            <hr>
            <div id="single">
                <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/support.svg" id="icon"/>
                <a style="text-decoration:none; color:white" href="login">Our Team</a></div>
        </div>
        <hr>
        <div class="menuitem">
            <a href="login"></a>
        </div><hr>
    </div>
    <div class="container">
        <div class="createacc">
         <div id="title1">Create an Account</div>
        <br>
        Have an Account? <a href="CA_RoadTripLOGIN.php">Log In</a>
            <br><br>
            <form action="../UserProfile/userprofile.php">


            Username: <br>
            <input id="username" type="text" name="username" placeholder=" &nbsp; &nbsp;  username"><br>
            Password: <br>
            <input id="password" type="text" name="password" placeholder=" &nbsp; &nbsp;  password"><br>
            Email:<br>
            <input id="email" type="text" name="email" placeholder=" &nbsp; &nbsp; email"><br>
            <br><br>
                <input id="submit" type="submit" value="Join Now">
            </form>


    </div> <!-- close container-->
</body>
</html>
</body>
</html>