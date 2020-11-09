

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

$sql= "SELECT * FROM LocationCityTypeView WHERE locationID =" . $_REQUEST['id'];

$results = $mysql-> query($sql);

$currentrow = $results->fetch_assoc();

?>
<html>
<head>
    <title>Edit Location</title>
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
<a href="adminmainLOCATION.php">BACK</a>
<div class="addform">
    Edit Location
    <br><br>
    <form action="EditConfirmationPages/editlocationCONFIRM.php ">
        <input type="hidden" name="id" value="<?php echo $currentrow["locationID"] ?>">

            Edit Location Name: <input name="editlocationname" type="text" value="<?php echo $currentrow["locationname"]?>">
            <br>
            Edit Address: <input name="editaddress" type="text" value="<?php echo $currentrow["address"]?>">
            <br>
            Edit City:

                <select name="editlocationcity">
                    <option value="<?php echo $currentrow["city"] ?>"> <?php echo $currentrow["city_name"] ?> </option>
                    <option>_________</option>

                    <?php
                    $citysql= "SELECT * FROM city_table";

                    $cityresults = $mysql-> query($citysql);

                    while($citycurrentrow = $cityresults->fetch_assoc()){
                        echo "<option value='". $citycurrentrow["cityID"] ."'>" . $citycurrentrow["city"] . "</option>";
                    }


                    ?>

                </select>
        <br>
            Edit Type:
                <select name="editlocationtype">
                    <option value="<?php echo $currentrow["type"] ?>"> <?php echo $currentrow["type_name"] ?> </option>
                    <option>_________</option>

                    <?php
                    $typesql= "SELECT * FROM type_table";

                    $typeresults = $mysql-> query($typesql);

                    while($tcurrentrow = $typeresults->fetch_assoc()){
                        echo "<option value='". $tcurrentrow["typeID"] ."'>" . $tcurrentrow["type"] . "</option>";
                    }


                    ?>

                </select>
        <br>
            Edit Pet Friendliness:
                <select name="editpetfriend">
                    <option value="<?php echo $currentrow["petfriendly"] ?>">
                        <?php
                            if($currentrow["petfriendly"] == 1){
                                echo "Yes";
                            }else{
                                echo "No";
                            }
                        ?>

                    </option>
                    <option>_______</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    <option value="NULL">N/A</option>
                </select>
            <br>
            Edit Latitude: <input name="editlatitude" type="text" value="<?php echo $currentrow["latitude"]?>">
        <br>
        Edit Longitude: <input name="editlongitude" type="text" value="<?php echo $currentrow["longitude"]?>">
        <br>
        Edit Wifi Availability:
        <select name="editwifi">
            <option value="<?php echo $currentrow["wifi"] ?>">
                <?php
                if($currentrow["wifi"] == 1){
                    echo "Yes";
                }else{
                    echo "No";
                }
                ?>

            </option>
            <option>_______</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
            <option value="NULL">N/A</option>
        </select>
        <br>
        Edit Star Review: <input name="editstar" type="text" value="<?php echo $currentrow["star_review"] ?>">
        <br>

        <input type="submit" value="Edit Location">
    </form>

</div>
</body>
</html>



