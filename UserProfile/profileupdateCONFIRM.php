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

</head>
<body>

<br><br>
<?php
echo "You have successfully updated your profile!";

}

?>

<br><br>


<a href="userprofile.php?id=<?php echo $_SESSION["UserId"] ?>">Go Back to Profile Page</a>

</body>
</html>


