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
    <title>Admin Main</title>
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
        .bigbox{
            width:500px;
            border: black 1px solid;
            margin:auto;
        }
        .locationdiv{
            width:350px;


        }
        .editdelete{
            width: 100px;


        }
        .locationandedit{

            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
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
<br><Br>
<div class="bigbox">
    <a href="adminmainLOCATION.php">Edit Locations</a> | <a href="adminmainTYPE.php">Edit Type</a> | <a href="adminmainCITY.php">Edit City</a>
    <hr>
    <a href="addlocation.php">Add New Type</a>
    <br><br>
    <form action="">
        <input type="text" name="typesearch" placeholder="Search Types">
        <input type="submit" value="Go">
    </form>

    <?php
    $sql = "SELECT * FROM type_table WHERE type LIKE '%" . $_REQUEST["typesearch"]. "%'";

    $results =$mysql->query($sql);

    if(!$results){
        echo "Your SQL " . $sql . "<br>";
        echo "SQL Error " . $mysql-> error . "<br>";
        exit();
    }

    while($currentrow = $results->fetch_assoc()){


        ?>
        <div class="locationandedit">

            <div class="locationdiv"><?php echo $currentrow["type"] ?></div>
            <div class="editdelete"><a href="editlocation.php">Edit</a> | <a href="deletelocation.php">Delete</a></div>
        </div>

        <?php
    }
    ?>

</div>


</body>
</html>

