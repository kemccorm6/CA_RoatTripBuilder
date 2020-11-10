
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


$sql = "DELETE FROM type_table WHERE typeID=". $_REQUEST['id'];

$results = $mysql->query($sql);



echo $sql;
?>
<html>
<head>
    <title>Delete type</title>
    <style></style>
</head>
<body>

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
    echo "Congrats! Your Type has been deleted!";
    echo "<br>";
    echo "<a href='adminmainTYPE.php'>Back</a>";

}
?>

</body>
</html>
