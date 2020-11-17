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

if(!empty ($_SESSION["start"])) {
    $usersql = "SELECT * FROM user_data_table WHERE userID = " . $_SESSION["UserId"];
//echo $usersql;

    $userresults = $mysql->query($usersql);
    $currentrow = $userresults->fetch_assoc();
}else{
    header("Location: ../Login/CA_RoadTripLOGIN.php");
}
?>
<html>
<head>
    <!-- Stepper CSS -->
    <link href="css/addons-pro/steppers.css" rel="stylesheet">
    <!-- Stepper CSS - minified-->
    <link href="css/addons-pro/steppers.min.css" rel="stylesheet">

    <!-- Stepper JavaScript -->
    <script type="text/javascript" src="js/addons-pro/steppers.js"></script>
    <!-- Stepper JavaScript - minified -->
    <script type="text/javascript" src="js/addons-pro/steppers.min.js"></script>
    <title>User Profile</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .bigbox{
            width:1000px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;
            margin-bottom: 100px;
        }
        #tabs {
            overflow: hidden;
            width: 1000px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin: auto;
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
            background-image: linear-gradient(to bottom, #fff, #ddd);
            padding: .7em 3.5em;
            float: left;
            text-decoration: none;
            color: #444;
            text-shadow: 0 1px 0 rgba(255,255,255,.8);
            border-radius: 5px 0 0 0;
            box-shadow: 0 2px 2px rgba(0,0,0,.4);
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
            background-image: linear-gradient(to bottom, #fff, #ddd);
            box-shadow: 2px 2px 2px rgba(0,0,0,.4);
            transform: skew(10deg);
            border-radius: 0 5px 0 0;
        }

        #tabs #current a,
        #tabs #current a::after {
            background: #fff;
            z-index: 3;
        }

        .triptitle {
            font-size: 20pt;
            background-color: white;
            text-align: center;
            width: 850px;
            margin: auto;
            padding: 10px;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            border-radius: 15px;
        }
        .banner {
            width: 900px;
            margin: auto;
            display: block;
            padding-top: 20px;
        }
        .banner1 {
            width: 33%;
            height: 200px;
        }
        img {
            object-fit: cover;
        }
.description {
    width: 850px;
    background-color: #FFFFFF;
    margin: auto;
    height: 70px;
    padding: 10px;
    padding-left: 15px;
    margin-top: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
}
#editdescriptione {
    margin-bottom: 10px;
}

        #stepcircle{
            width:75px;
            height:75px;
            border-radius: 150px;
            float: right;
            background-color: #FFFFFF;
            border: 1px solid white;
            text-align: center;
            line-height: 60pt;
            color: black;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            top: 25%;
            left: 0%;
        }
        #stopinfo {
            background-color: #FFFFFF;
            padding: 15px;
            display: block;
            height: 150px;
            width: 700px;
            margin-top: 10px;
            border-radius: 20px;
            float: right;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }
        #stopinfo :hover{
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }
#locationpicture {
    /*background-image: url("mountain.jpg");*/
    width: 130px;
    height: 130px;
  float: left;
   background-size: 100%;
}
#locationname {
    float: left;
    width: 200px;
    font-size: 16pt;
    margin-top: 5px;
    margin-left: 30px;
}
#typesrow {
    width: 500px;
    margin-left: 20px;
    float: left;
}
.types{
    float: left;
    background-color: gray;
    width: px;
    margin: 10px;
    padding-left: 5px;
    padding-right: 5px;
    text-align: center;
    height: 30px;
    border-radius: 5px;
    line-height: 23pt;
    font-size: 10pt;
}
#notes {
    width: 500px;
    font-size: 10pt;
    float: left;
 margin-left: 30px;
}
.teststeps {

    width: 900px;
    margin: auto;
    margin-top: 30px;

}


        </style>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#stopinfo").click(function (){
            // window.location.href="locationdetails.php";
            // return false;
        });
        $("#tab12").click(function (){
            window.location.href="userprofile.php";
            return false;
        });


        $('#tabs a').click(function(e) {
            e.preventDefault();
            if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
                return;
            }
            else{
                $("#content").find("[id^='tab']").hide(); // Hide all content
                $("#tabs li").attr("id",""); //Reset id's
                $(this).parent().attr("id","current"); // Activate this
                $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
            }
        });
    });
</script>
<body>
<?php include "../newheader.php" ?>

<div class="container">

<?php
    $rts = "SELECT * FROM saved_trips_table WHERE userID=" . $_SESSION["UserId"] . " AND savedtripID = " . $_REQUEST["tripid"];
    $tripresults = $mysql->query($rts);

    $tripcr = $tripresults->fetch_assoc();


?>
        <ul id="tabs">
            <li><a href="userprofile.php" name="tab1" id="tab12" style="width: 90px; text-align: center; padding: .7em 1.5em;">MY TRIPS</a></li>
        </ul>

    <div class="bigbox"> 
        <hr><br>

            <form action="Title_MM.php">
                <input type="hidden" name="tripid" value="<?php echo $_REQUEST["tripid"]; ?>">
                <div  class="triptitle"><span id="roadtripname" ><?php echo $tripcr["trip_name"]; ?></span>
                <input type="button" value="Edit" id="editname">
                <input type="submit" value="Confirm" id="confirmname">
            </form>
            <script>
                document.getElementById("confirmname").style.display = "none";
                document.getElementById("editname").addEventListener("click", function(){
                        document.getElementById("roadtripname").innerHTML = "<input type='text' name='newtitletext' placeholder='<?php echo $tripcr["trip_name"]; ?>'>"
                        document.getElementById("confirmname").style.display = "block";
                        document.getElementById("editname").style.display = "none";
                });
            </script>
        </div> <!-- close edit name -->


<!--    ONE IMAGE FOR LOCATION-->
    <div class="banner">
    <?php
    $imagebannersql = "SELECT t.locationID, ig.imageurl FROM trip_points_table t , OneImageForLocation ig
where t.locationID = ig.locationID
and tripID = " . $_REQUEST['tripid'] ."
order by t.waypointorder
limit 3
";
    $imageResults = $mysql->query($imagebannersql);
    $imgcounter=1;
    while($ICR = $imageResults->fetch_assoc()){
    ?>
            <img class="banner1" id="image<?php $imgcounter; ?>" src="<?php echo $ICR["imageurl"]; ?>">
<!--            <img class="banner2" id="image2" src="--><?php //$ICR["imageurl"]; ?><!--">-->
<!--            <img class="banner3" id="image3" src="--><?php //$ICR["imageurl"]; ?><!--">-->
    <?php
        $imgcounter++;
    }
    ?>
    </div> <!-- close image -->

        <div class="description">
            <form action="Desc_MM.php">
                <input type="hidden" name="tripid" value="<?php echo $_REQUEST["tripid"]; ?>">
                <p id="descriptionwords"> <?php echo $tripcr["trip_description"]; ?></p>
                <input type="button" value="Edit" id="editdescriptione">
                <input type="submit" value="Confirm" id="confirmdescription">
            </form>
            <script>
                document.getElementById("confirmdescription").style.display = "none";

                document.getElementById("editdescriptione").addEventListener("click", function(){

                    document.getElementById("descriptionwords").innerHTML = "<input type='text' name='newdesctext' placeholder='<?php echo $tripcr["trip_description"]; ?>'>"
                    document.getElementById("confirmdescription").style.display = "block";
                    document.getElementById("editdescriptione").style.display = "none";
                });
            </script>
        </div> <!-- close description -->

        <div class="teststeps">
            <table style="width:100%">

                <tr>
                    <th>Stop #</th>
                    <th>Location Details</th>
                </tr>

                <tr>
                    <td> <div id="stepcircle">Start</div></td>

                    <td>
                        <div id="stopinfo" style="height: 60px;">
                            <?php
                            $cityse = "SELECT * FROM StartEndCities WHERE savedtripID = ". $_REQUEST["tripid"] ." AND userID =" . $_SESSION["UserId"];
                            $cer = $mysql->query($cityse);
                            $cecr = $cer->fetch_assoc();
                            ?>

                            <div id="locationname"><?php echo $cecr["citySTART"]; ?></div>
                            <div id="typesrow">
                            </div><br>
                            <div id="notes">Start city</div>
                        </div>
                        <?php
                        $namedescsql = "SELECT UserLocDetails.*, OneImageForLocation.imageurl FROM UserLocDetails, OneImageForLocation WHERE 
                                    UserLocDetails.locationID = OneImageForLocation.locationID AND tripID = ". $_REQUEST["tripid"] . " AND userID = " . $_SESSION["UserId"] . " ORDER BY waypointorder";
                        //echo $namedescsql;
                        $resultpage = $mysql->query($namedescsql);
                        while($tripRow = $resultpage->fetch_assoc()) {
                        echo '';
                        echo '';
                        //                        echo $tripRow["waypointorder"] + 1;
                        //                        echo $tripRow["locationname"];
                        //                        echo "<br>";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><div id="stepcircle"><?php echo $tripRow["waypointorder"] + 1; ?></div></td>

                    <td>
                        <div id="stopinfo">
                            <a href="../MakeTrip/MakeTripLocationDetail.php?id=<?php echo $tripRow["locationID"]; ?>"><div><img id="locationpicture" src="<?php echo $tripRow["imageurl"]; ?>"></div></a>
                            <div id="locationname"><?php echo $tripRow["locationname"]; ?></div>
                            <div id="typesrow">

                                <?php
                                    $tripRow["petfriendly"];
                                    if($tripRow["petfriendly"] == 1){
                                        echo '<div class="types" id="type1">Pet Friendly</div>';
                                    }

                                ?>



                                    <?php
                                        $tripRow["wifi"];
                                        if($tripRow["wifi"] == 1){
                                            echo '<div class="types" id="type2">Wifi</div>';
                                        }

                                    ?>

                                <div class="types" id="type3"><?php echo $tripRow["typename"] ?></div>
                            </div><br>
                            <div id="notes">
                                <?php echo $tripRow["location_description"] ?>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>

                    <td>
                        <div id="stepcircle">End</div>
                    </td>

                    <td>
                        <div style="height: 60px;" id="stopinfo">
                            <div id="locationname"><?php echo $cecr["cityEND"]; ?></div>
                            <div id="typesrow"></div><br>
                            <div id="notes">End city</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div><!-- Close Big Box -->
</div> <!-- Close Container -->

</body>
