

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

$sql= "SELECT * FROM city_table WHERE cityID =" . $_REQUEST['id'];

$results = $mysql-> query($sql);

$currentrow = $results->fetch_assoc();

?>
<html>
<head>
    <title>Edit City</title>
    <style>
        .circleimage{
            width:100px;
            height:100px;
            border: black 1px solid;
            border-radius: 100px;
        }
        .adminbox{
            border: solid red 1px;
            width:150px;
            margin-right:auto;
            margin-left:auto;
        }
        .addform{
            width:500px;
            border: solid 1px black;
            margin:auto
        }
    </style>
</head>
<body>
<div class="adminbox">
    <div class="circleimage">picture</div>
    <br>
    Jonny Appleseed
    <br>
    Admin
</div>
<br>
<a href="adminmainCITY.php">BACK</a>
<div class="addform">
    Edit City
    <br><br>
    <form action="EditConfirmationPages/editcityCONFIRM.php ">
        <input type="hidden" name="id" value="<?php echo $currentrow["cityID"] ?>">
        Edit City: <input type="text" value="<?php echo $currentrow["city"] ?>" name="editcity">

        <input type="submit" value="Edit City">
    </form>

</div>
</body>
</html>


