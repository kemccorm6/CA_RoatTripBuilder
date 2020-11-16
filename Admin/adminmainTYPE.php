
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
?>

<html>
<head>
    <title> Main Type</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .circleimage{
            width:150px;
            height:150px;
            border: black 1px solid;
            border-radius: 100px;
            float: left;
            margin: 20px;
        }
        .adminbox{

            width:800px;
            height: 200px;
            margin: auto;


        }
        .bigbox{
            width:800px;
            padding: 15px;
            margin:auto;
            background-color: #FFD688;
            box-shadow: 3px 3px 6px dimgrey;

        }
        .locationdiv{
            width:350px;
            padding: 10px;
        }
        .editdelete{
            width: 100px;
            padding: 10px;
        }
        .locationandedit{
            border: 1px solid black;
            border-left: none;
            border-right: none;
            width: 70%;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        .adminacc {
            width: 800px;
            margin:auto;

            margin-bottom: 100px;
        }
        .tabs {
            width: 800px;
            height: 100px;
            margin-top: 50px;
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
        }
        .edittyp a {
            width: 200px;
            height: 100px;
            display: block;
            text-align: center;
            line-height: 80pt;
            font-size: 18pt;
            background-color: #FFD688;
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
        .editloc :hover {
            background-color: #FFD688;
        }
        .editcit :hover {
            background-color: #FFD688;
        }
        .edittyp:hover + .editloc a{
            color: #85A867;
            background-color: black;
        }

        a {
            text-decoration: none;
            text-decoration-color: black;
        }
        .newtype {
            width: 200px;
            background-color: #85A867;
            height: 40px;
            text-align: center;
            font-size: 14pt;
            margin-top: 25px;
            line-height: 30pt;
            border-radius: 15px;
            float: left;
            margin-left: 30px;
            box-shadow: 2px 1px 4px dimgrey;
        }
        .searchbox {
            width: 400px;
            float: right;
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
        <div class="adminacc">
        <div class="adminbox">
            <div ><img class="circleimage" src="<?php echo $currentrow["User_Profile_Picture"] ?>"</div>
            <br>
            <h1><?php echo $currentrow["User_Real_Name"]; ?></h1>

            Admin
        </div>
        <br><Br>
            <div class="tabs">
                <div class="editloc" id="editloc" ><a href="adminmainLOCATION.php" style="text-decoration:none">Edit Locations</a></div>
                <div class="edittyp" id="edittyp" ><a href="adminmainTYPE.php" style="text-decoration:none">Edit Type</a></div>
                <div class="editcit"> <a href="adminmainCITY.php" >Edit City</a></div>
            </div>

            <div class="bigbox">

            <hr>

                <div class="newtype"> <a href="addtype.php">+ Add New Type</a> </div>
            <br>
                <div class="searchbox">
            <form action="">
                <input type="text" id="searchbox" name="typesearch" placeholder="Search Types">
                <input type="submit" id="go" value="Go">
            </form>
                </div>

            <?php
            $sql = "SELECT * FROM type_table WHERE type LIKE '%" . $_REQUEST["typesearch"]. "%'";

            $results =$mysql->query($sql);

            if(!$results){
                echo "Your SQL " . $sql . "<br>";
                echo "SQL Error " . $mysql-> error . "<br>";
                exit();
            }

            $startp = 1;

            if(!empty($_REQUEST["startp"])){
                $startp = $_REQUEST["startp"];
            }

            $limit = 10;
            $end = $startp + $limit - 1;
            if ($results->num_rows < $end ) {
                $displayend = $results->num_rows;
            } else {
                $displayend = $end;
            }


            echo "<br><br><br>";
            echo "There are " . $results->num_rows . " results. Displaying " . $startp . " - " . $displayend . ". ";
            echo "<br><br>";


            $counter = $startp;

            $results->data_seek($startp-1);

            while($currentrow2 = $results->fetch_assoc()){


                ?>
                <div class="locationandedit">

                    <div class="locationdiv"><?php echo $counter . ") " . $currentrow2["type"] ?></div>
                    <div class="editdelete"><a href="edittype.php?id=<?php echo $currentrow2["typeID"]; ?>">Edit</a> | <a href="deletetype.php?id=<?php echo $currentrow2["typeID"]; ?>">Delete</a></div>
                </div>

                <?php
                $counter++;

                if($counter > $end){
                    break;
                }
            }

            $formdata = "";
            $formdata .= "typesearch=" . $_REQUEST["typesearch"];
            $formdata .= "&startp=" . ($startp+$limit);
            //            echo "<hr>" . $formdata . "<hr>";

            if($startp > $limit){
                echo "<a href='adminmainTYPE.php?" . $formdata . "&startp=" . ($startp - $limit) ."'>Prev</a>";
            }

            echo " | ";

            if($results->num_rows >= $startp + $limit){
                echo "<a href='adminmainTYPE.php?" . $formdata . "&startp=" . ($startp + $limit) ."'>Next</a>";
            }
            ?>

        </div>

        </div>
    </div> <!-- close container-->
</body>
</html>
</body>
</html>


