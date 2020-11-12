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

$sql= "INSERT INTO type_table " .
    "(type)" .
    "VALUES" .
    "( " .
    " '" . $_REQUEST["newtype"] . "' ) ";

$results = $mysql->query($sql);

if(!$results){
    echo "Something went wrong check error: " . $mysql->error;
    exit();
}
?>

<html>
<head>
    <title>Add Type Confirmation</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">


</head>
<body>
<?php include "../masterHTML.php" ?>
<br><br>
Congratulations you added the <?php $_REQUEST['newtype'] ?> type!
<br>
<a href="addtype.php">Add Another Type</a>
<br>
<a href="adminmainTYPE.php">Go Back to Main Page</a>

</body>
</html>
