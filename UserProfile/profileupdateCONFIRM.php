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

$sql = "UPDATE user_data_table
        SET 
        User_Real_Name = '" . $_REQUEST["nusername"] . "', " .
        "User_Description = '" . $_REQUEST["editdesc"] . "', " .
        "User_Profile_picture = '" . $_REQUEST["profp"] . "' " .
    "WHERE userID = " . $_REQUEST["id"];

//echo $sql;

$results = $mysql -> query($sql);

if(!$results){
    echo "Error " . $mysql-> error;
    echo "<br>SQL" . $sql;
}else{
?>

<html>
<head>
    <title>Profile Update Confirmation</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
<style>
    .confirmed {
        width: 800px;

        font-size: 25pt;
        margin: auto;
        height: 100px;
        padding: 100px;
        border-radius: 20px;
        background-color: #FFAC00;
        text-align: center;
    }
</style>

</head>
<body>
<?php include "../newheader.php" ?>

<br><br>
<div class="confirmed">
<?php
echo "You have successfully updated your profile!";

}

?>
<br><br>

<a style="text-decoration: underline" href="userprofile.php?id=<?php echo $_SESSION["UserId"] ?>">Go Back to Profile Page</a>
</div>

</body>
</html>


