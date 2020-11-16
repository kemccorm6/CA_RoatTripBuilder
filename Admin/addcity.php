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


?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>City Add</title>


       <link rel = "stylesheet"
       type = "text/css"
       href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">

<style>
    .circleimage{
        width:150px;
        height:150px;
        border: black 1px solid;
        border-radius: 100px;
        float: left;
        margin: 20px;
    }
        .adminbox{
            width:500px;
            height: 200px;
            margin: auto;
        }
        .addform{
            width:700px;

            margin:auto
        }
        .bigbox{
            width:800px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            text-align: center;
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
        .titlediv{
            width:250px;
            padding: 10px;
        }
        input {

            padding: 10px;
        }
        .titlesubmit{
            border: 1px solid black;
            border-left: none;
            border-right: none;
            width: 70%;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        h2 {
            margin: auto;
            text-align: center;
            padding: 15px;
            font-size: 24pt;
        }
        #submit {
            width: 40%;
            border-radius: 10px;
            background-color: #85A867;
            color: white;
            margin: auto;
            text-align: center;
        }
        .submit {
            margin: auto;
        }
    </style>
</head>
<body>
<?php include "../newheader.php" ?>

<div class="container">
    <div class="adminacc">
        <div class="adminbox">
            <div ><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"] ?>"</div>
            ><h1><?php echo $currentrow["User_Real_Name"]; ?></h1>
            Admin
        </div>
        <br>

        <div class="tabs">
            <div class="editloc" id="editloc" > <a href="adminmainCITY.php">BACK</a></div>
        </div>

        <div class="bigbox">
<div class="addform">
   <h2>Add a New City</h2>
    <br><br>
    <form action="addcityCONFIRM.php">
        <div class="titlesubmit">
       <div class="titlediv">City:</div> <input type="text" placeholder="Type New City" name="newcity">
        </div>
        <br><br>
       <div class="submit"><input type="submit" id="submit" value="Add New City">
       </div>
    </form>
</div></div>

</div>
</body>
</html>
