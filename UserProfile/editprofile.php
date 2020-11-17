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

$sql = "SELECT * FROM user_data_table WHERE userID =" . $_REQUEST['id'];

$results = $mysql-> query($sql);

$currentrow = $results->fetch_assoc();
?>
<html>
<head>
    <title>Edit Profile</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .circleimage{
            width:250px;
            height:250px;
            border: black 1px solid;
            border-radius: 150px;
            float: left;
            margin: 20px;
            color: black;
        }
        .adminbox{
            width:800px;
            height: 300px;
            margin: auto;
            margin-top: 50px;
        }
        #profileinfo {
            float: left;
            width: 400px;
            margin-left: 50px;
        }
        #bio {
            overflow-wrap: normal;
            font-size: 16pt;
        }
        #editusername {
            height: 50px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
        }
        #update {
            width: 100px;
            height: 50px;
            background-color: #6E8B55;
            font-size: 16pt;
            color: #FFFFFF;
            border-radius: 15px;
        }
        #editdescription {
            height: 70px;
            width: 600px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
        }
        #profilelink {
            height: 70px;
            width: 600px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
        }

</style>
</head>








<body>
<?php include "../newheader.php" ?>


<div class="container">

        <div class="adminbox">
            <form action="profileupdateCONFIRM.php">
                <input type="hidden" name="id" value="<?php echo $currentrow["userID"] ?>">
                <div><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"]; ?>"</div>
                <br>
                <div id="profileinfo">
                <h1>Edit Name:</h1>
                    <input type="text" id="editusername" name="nusername" value="<?php echo $currentrow["User_Real_Name"]; ?>"
                <div id="bio">
                    <br>
                    <p>Edit Description:</p>
                    <input type="text" name="editdesc" id="editdescription" value="<?php echo $currentrow["User_Description"]; ?>" >
                    <br><br>
                    Copy profile picture link here:
                    <br>
                    <input type="text" name="profp" id="profilelink" value="<?php echo $currentrow["User_Profile_Picture"]; ?>">

                </div><!--close bio-->
                    <div class="editprofile">
                        <input type="submit" value="Update" id="update">
                    </div> <!--close edit profile-->
                </div><!--close profile info-->
            </div><!--close admin box-->
            </form>
</div>
</body>
</html>
