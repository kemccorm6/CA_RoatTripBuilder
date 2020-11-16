
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

$usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

$userresults = $mysql-> query($usersql);
$currentrow = $userresults->fetch_assoc();


$sql = "DELETE FROM city_table WHERE cityID=". $_REQUEST['id'];

$results = $mysql->query($sql);



//echo $sql;
?>
<html>
<head>
    <title>Delete City</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css"
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .circleimage {
            width:150px;
            height:150px;
            border: black 1px solid;
            border-radius: 100px;
            float: left;
            margin: 20px;
        }

        .adminbox{
            width:800px;
            height: 200px;
            margin: auto;
        }
        .bigbox{
            width:800px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
        }
        .adminacc {
            width: 800px;
            margin:auto;
            margin-top: 50px;
            margin-bottom: 100px;
        }
        .tabs {
            width: 800px;
            height: 100px;
            overflow: hidden;
        }
        .editloc a {
            width: 200px;
            display: block;
            height: 100px;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FEE7B9;
            margin-left: 35px;
            float: left;
            text-decoration: none;
            box-shadow: 2px -1px 4px dimgrey;
            z-index: -10px;

        }

        input {

            padding: 10px;
        }

        h2 {
            margin: auto;
            text-align: center;
            padding: 15px;
            font-size: 24pt;
        }
    </style>
</head>
<body>
<?php include "../newheader.php" ?>

<div class="container">
    <div class="adminacc">
        <div class="adminbox">
            <div ><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"] ?>"</div>
            <br>
            <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
            Admin
        </div>
        <br>
        <div class="tabs">
            <div class="editloc" id="editloc" > <a href="adminmainCITY.php">BACK</a></div>
        </div>

        <div class="bigbox">


<?php if ($_REQUEST["id"] != "yes") {
    // display confirmation form
    ?>
    <form action="">
        <input type="hidden" name="recordid"
               value="<?php echo $_REQUEST["recordid"] ?>">
        <input type="hidden" name="confirm" value="yes">
        <input type="submit" value="Confirm Deletion">
    </form>


    <?php
} else {

}

if($_REQUEST["confirm"] == "yes"){
    echo "Congrats! Your City has been deleted!";
    echo "<br>";
//    echo "<a href='adminmainCITY.php'>Back</a>";

}
?>
        </div></div></div>
</body>
</html>

