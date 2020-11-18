

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

$sql= "SELECT * FROM LocationCityTypeView WHERE locationID =" . $_REQUEST['id'];

$results = $mysql-> query($sql);

$currentrow2 = $results->fetch_assoc();

$usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

$userresults = $mysql-> query($usersql);
$currentrow = $userresults->fetch_assoc();

?>
<html>
<head>
    <title>Edit Location</title>
<!--    <title>Location Add</title>-->
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .addform{
            width:700px;
            margin:auto
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

        @-webkit-keyframes AnimationName {
            0%{background-position:0% 83%}
            50%{background-position:100% 18%}
            100%{background-position:0% 83%}
        }
        @-o-keyframes AnimationName {
            0%{background-position:0% 83%}
            50%{background-position:100% 18%}
            100%{background-position:0% 83%}
        }
        @keyframes AnimationName {
            0%{background-position:0% 83%}
            50%{background-position:100% 18%}
            100%{background-position:0% 83%}
        }

        .bigbox{
            width:1000px;
            padding: 15px;
            margin:auto;
            height: 1000px;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            margin-bottom: 100px;
        }

        .editprofile a {
            text-decoration: none!;
            color: black;
        }

        #tabs {
            overflow: hidden;
            width: 1000px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin: auto;
        }
        #makey a{
            background-color: #85A867;
        }

        #tabs li {
            float: left;
            margin: 0 .5em 0 0;
        }
        #tabs li {
            float: left;
            margin: 0 .5em 0 0;
        }

        #tabs a {
            position: relative;
            background: #ddd;
            background-color: #FFD788;
            padding: .7em 3.5em;
            font-family: Poppins;
            float: left;
            text-decoration: none;
            color: #444;
            text-shadow: 0 1px 0 rgba(255,255,255,.8);
            border-radius: 5px 0 0 0;
            box-shadow: 0 2px 2px rgba(0,0,0,.4);
            color: black;
        }

        #tabs a:hover,
        #tabs a:hover::after,
        #tabs a:focus,
        #tabs a:focus::after {
            background: #fff;
        }

        #tabs a:focus {
            outline: 0;
        }

        #tabs a::after {
            content:'';
            position:absolute;
            z-index: 1;
            top: 0;
            right: -.5em;
            bottom: 0;
            width: 1em;
            background: #ddd;
            background-color: #FFD788;
            box-shadow: 2px 2px 2px rgba(0,0,0,.4);
            transform: skew(10deg);
            border-radius: 0 5px 0 0;
        }

        #tabs #current a,
        #tabs #current a::after {
            background-image: linear-gradient(to bottom, #FFD788, #E9C37C);
            z-index: 3;
        }
        #content {

            padding: 2em;
            height: auto;
            position: relative;
            z-index: 2;
            border-radius: 0 5px 5px 5px;
            box-shadow: 0 -2px 3px -2px rgba(0, 0, 0, .5);
            font-family: 'Poppins', sans-serif;
        }


        h3 {
            text-align: center;
            font-size: 20pt;
            padding: 0;
            margin: 0;
        }
        h1 {
            font-family: Poppins;

            text-align: left;

            font-size: 30pt;
            margin-bottom: 0;
        }

        input #adminpage {
            background-color: #FFFFFF;
        }
        .fancy span {
            display: inline-block;
            position: relative;
        }
        .fancy span:before,
        .fancy span:after {
            content: "";
            position: absolute;
            height: 5px;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            top: 0;
            width: 300px;
        }
        .fancy span:before {
            right: 100%;
            margin-right: 15px;
        }
        .fancy span:after {
            left: 100%;
            margin-left: 15px;
        }

        .edittyp a {
            width: 200px;
            height: 100px;
            display: block;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FEE7B9;
            float: left;
            margin-left: 20px;
            margin-bottom: 0px;
            text-decoration: none;

            box-shadow: 2px -1px 4px dimgrey;
        }
        .editcit a {
            width: 200px;
            height: 100px;
            display: block;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FEE7B9;
            float: left;
            margin-left: 20px;
            margin-bottom: 0px;
            text-decoration: none;
            box-shadow: 2px -1px 4px dimgrey;
        }

        .editcit :hover {
            background-color: #FFD688;
        }
        .edittyp :hover {
            background-color: #FFD688;

            width: 200px;
            height: 100px;
        }
        .edittyp:hover + .editloc a{
            color: #85A867;
            background-color: black;
        }

        a {
            text-decoration: none;
            text-decoration-color: black;
        }

        input[id="searchbox"] {
            width: 300px;
            height: 40px;
            font-size: 14pt;
            border-radius: 15px;
            color: #FFAC00;
        }
        input[id="go"] {
            width: 50px;
            height: 40px;
            margin-left: 10px;
            font-size: 14pt;
            background-color: #F06A00;
            border-radius: 15px;
        }
    </style>
</head>

<body>
<?php include "../newheader.php" ?>

<div class="container">
    <div id="tabs">
        <ul id="tabs">
            <li> <a href="combinedadmnin.php">BACK</a></li>
        </ul>
    </div>

    <div class="bigbox"><hr><br>
        <div id="content">
        <div class="addform">
           <h2>Edit Location</h2>
            <br><br>
            <form action="editlocationCONFIRM.php ">
                <input type="hidden" name="id" value="<?php echo $currentrow2["locationID"] ?>">
                <div class="titlesubmit">
                <div class="titlediv">Edit Location Name:</div>  <input name="editlocationname" type="text" value="<?php echo $currentrow2["locationname"]?>">
                </div>
    <br>
                <div class="titlesubmit">
                <div class="titlediv">Edit Address:</div>  <input name="editaddress" type="text" value="<?php echo $currentrow2["address"]?>">
                </div> <br>

                <div class="titlesubmit">
                <div class="titlediv">Edit City:</div>
                    <select name="editlocationcity">
                    <option value="<?php echo $currentrow2["city"] ?>"> <?php echo $currentrow2["city_name"] ?> </option>
                    <option>_________</option>

                    <?php
                    $citysql= "SELECT * FROM city_table";

                    $cityresults = $mysql-> query($citysql);

                    while($citycurrentrow = $cityresults->fetch_assoc()){
                        echo "<option value='". $citycurrentrow["cityID"] ."'>" . $citycurrentrow["city"] . "</option>";
                    }
                    ?>
                </select>
                </div> <br>

                <div class="titlesubmit"> <div class="titlediv">Edit Type:</div>
                    <select name="editlocationtype">
                    <option value="<?php echo $currentrow2["type"] ?>"> <?php echo $currentrow2["type_name"] ?> </option>
                    <option>_________</option>

                    <?php
                    $typesql= "SELECT * FROM type_table";

                    $typeresults = $mysql-> query($typesql);

                    while($tcurrentrow = $typeresults->fetch_assoc()){
                        echo "<option value='". $tcurrentrow["typeID"] ."'>" . $tcurrentrow["type"] . "</option>";
                    }
                    ?>
                </select>
                </div><br>

                <div class="titlesubmit">
                <div class="titlediv"> Edit Pet Friendliness:</div>
                <select name="editpetfriend">
                    <option value="<?php echo $currentrow2["petfriendly"] ?>">
                        <?php
                        if($currentrow2["petfriendly"] == 1){
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
                </div><br>

                <div class="titlesubmit">
              <div class="titlediv">Edit Latitude:</div>   <input name="editlatitude" type="text" value="<?php echo $currentrow2["latitude"]?>">
                </div> <br>

                <div class="titlesubmit">
                <div class="titlediv"> Edit Longitude:</div> <input name="editlongitude" type="text" value="<?php echo $currentrow2["longitude"]?>">
                </div><br>

                <div class="titlesubmit">
                <div class="titlediv">Edit Wifi Availability:</div>
                    <select name="editwifi">
                    <option value="<?php echo $currentrow2["wifi"] ?>">
                        <?php
                        if($currentrow2["wifi"] == 1){
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
                <br></div>

                <div class="titlesubmit">
               <div class="titlediv"> Edit Star Review:</div> <input name="editstar" type="text" value="<?php echo $currentrow2["star_review"] ?>">
                <br></div>

                <input type="submit" id="submit" value="Edit Location">
            </form>

        </div>
        </div>


            </div>
        </div>
</body>
</html>



