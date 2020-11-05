
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
          href = "account.css" />
    <style>
    .createacc {
        width: 500px;
        height: 500px;
        background-color: #F06A00;
        margin: auto;
        margin-top: 100px;
    }
    </style>
</head>
<body>




<div class="topheader">
    <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/myalogo1.jpeg" id="logo">

    <div class="login">
        <a style="text-decoration:none; color:white" href="login.html">Login</a>
    </div>
</div>
<hr>
<div class="sides">
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
        Create an Account
        <br>
        Have an Account? <a href="CA_RoadTripLOGIN.php">Log In</a>

        <form action="">
            Username: <br>
            <input type="text" name="username" placeholder="Type Username"><br>
            Password: <br>
            <input type="text" name="password" placeholder="Type Password"><br>
            Email:<br>
            <input type="text" name="email" placeholder="Type Email"><br>
            <input type="submit" value="Log In">
        </form>
</div>

    </div> <!-- close container-->
</body>
</html>
</body>
</html>