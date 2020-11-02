
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

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
?>
Search:
<form action="CAresults.php">
    Search a Location:
        <select name="locationsearch">
            <option value="ALL">SELECT LOCATION</option>
            <option value="ALL">--------------</option>

            <?php

            $sql = "SELECT * FROM location_table".
                " WHERE locationname != '' AND locationname != ' '";

            $results = $mysql->query($sql);

            while($currentrow = $results->fetch_assoc()){
                echo "<option>" . $currentrow["locationname"] . "</option>";
            }
            ?>

        </select>
    <br>
    Search a City:

        <select name="citysearch">
            <option value="ALL">SELECT CITY</option>
            <option value="ALL">--------------</option>

            <?php

            $sql = "SELECT * FROM city_table".
                " WHERE city != '' AND city != ' '";

            $results = $mysql->query($sql);

            while($currentrow = $results->fetch_assoc()){
                echo "<option>" . $currentrow["city"] . "</option>";
            }
            ?>

        </select>
    <br>
    Search a Type:

        <select name="typesearch">
            <option value="ALL">SELECT TYPE</option>
            <option value="ALL">--------------</option>

            <?php

            $sql = "SELECT * FROM type_table".
                " WHERE type != '' AND type != ' '";

            $results = $mysql->query($sql);

            while($currentrow = $results->fetch_assoc()){
                echo "<option>" . $currentrow["type"] . "</option>";
            }
            ?>

        </select>
    <br>
    <input type="submit" name="submit" value="Search">
</form>
