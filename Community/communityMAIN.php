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
}
?>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP0XNFSS02"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HP0XNFSS02');
    </script>
    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .outercontainer {
            width: 80vw;
            margin: auto;
            display: block;
            font-family: 'Poppins', sans-serif;
        }
        .communitytitle {
            background-color: #FFFFFF;
            height: 40px;
            width: 20vw;
            border-radius: 15px;
           padding: 10px;
            font-size: 20pt;
            color: #D14A0A;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            text-align: center;
        }
        .flex {
            display: flex;
            flex-wrap: nowrap;
            overflow: auto;
        }
        .flex-item {
            flex: 0 0 auto;
        }
        .scrollcontainer {
            width: 81vw;
            height: 350px;

        }

        .item {
            border: .25px solid #B85B14;
background-color: #FFFFFF;
            border-radius: 20px;
            width: 250px;
            margin: 10px;
            overflow: auto;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .sharedtrips {
            background-color: darkkhaki;
            padding: 10px 0px 15px 10px;
            border-radius: 20px;
            width: 81vw;
            box-shadow: -3px 6px 6px rgba(0, 0, 0, 0.4);

        }
#sharedtripstitle {
    font-size: 18pt;
    margin-left: 10px;
    padding: 10px;
    color: #FFFFFF;

}
        .prodimgtile {
            width: 80%;
            border-radius: 10px;
            height: 175px;
            margin: auto;
            margin-top: 15px;
            background-color: #6E8B55;
        }
        #prodimgtile1 {
            /*background-image: url("../UserProfile/fpbg.png");*/
            background-size: 110%;
            background-position: center;
            background-repeat: no-repeat;
        }
        #prodimgtile2 {
            background-image: url("../UserProfile/fpbg.png");
            background-size: 110%;
            background-position: top;
            background-repeat: no-repeat;
        }
        #prodimgtile3 {
            background-image: url("../UserProfile/fpbg.png");
            background-size: 110%;
            background-position: bottom;
            background-repeat: no-repeat;
        }
        #prodimgtile4 {
            background-image: url("../UserProfile/fpbg.png");
            background-size: 110%;
            background-position: center bottom;
            background-repeat: no-repeat;
        }
        #prodimgtile5 {
            background-image: url("../UserProfile/fpbg.png");
            background-size: 110%;
            background-position: center bottom;
            background-repeat: no-repeat;
        }
        #roadtripinfo {
            margin-top: 10px;

            width: 250px;
        }
        #triptitle {
            font-size: 16pt;
            text-align: center;
        }
        #tripnotes {
            font-size: 12pt;
            margin-left: 10px;
            overflow-wrap: break-word;
            hyphens: auto;
        }
        hr {
            width: 220px;
        }
        #lilidpic{
            width:50px;
            height:50px;
            border: black 1px solid;
            border-radius: 100px;
        }



    </style>
</head>
<body>
<?php include "../newheader.php" ?>


<div class="outercontainer">
    <div class="communitytitle">
        Community Trips
    </div>
<br><br>
     <div class="sharedtrips">
         <div id="sharedtripstitle">Community Shared Trips</div>
         <div class="scrollcontainer flex">

             <!-- open community shared trip item -->

             <?php

             $cq = "SELECT * FROM OneImagePerTrip2";
             $rcq = $mysql->query($cq);

             while($crcq = $rcq->fetch_assoc()){



             ?>
             <div class="item flex-item">
                 <div ><img class="prodimgtile" id="prodimgtile1" src="<?php echo$crcq["imageurl"]; ?>"></div>
                 <div id="roadtripinfo">
                     <a href="../UserProfile/COMMUNITY_RD.php?tripid=<?php echo $crcq["savedtripID"]; ?>&userID=<?php echo $crcq["userID"]; ?>">
                     <div> <img id="lilidpic" src="<?php echo $crcq["User_Profile_Picture"]; ?>"><?php echo $crcq["User_Real_Name"]; ?></div>
                     </a>
                     <div id="triptitle"> <?php echo $crcq["trip_name"]; ?> </div><hr>
                     <div id="tripnotes"> <?php echo $crcq["trip_description"]; ?> </div>
                 </div>
             </div>
             <?php
             }
             ?>

             <!-- close community shared trip item -->

             <!-- open community shared trip item -->
<!--             <div class="item flex-item">-->
<!--                 <div class="prodimgtile" id="prodimgtile2"></div>-->
<!--                 <div id="roadtripinfo">-->
<!--                     <div id="triptitle"> Forest Mountain Trip </div><hr>-->
<!--                     <div id="tripnotes"> Trip ideas for the Fall. I love these trip ideas wow </div>-->
<!--                 </div>-->
<!--             </div> -->
             <!-- close community shared trip item -->

             <!-- open community shared trip item -->
<!--             <div class="item flex-item">-->
<!--                 <div class="prodimgtile" id="prodimgtile3"></div>-->
<!--                 <div id="roadtripinfo">-->
<!--                     <div id="triptitle"> Forest Mountain Trip </div><hr>-->
<!--                     <div id="tripnotes"> Trip ideas for the Fall. I love these trip ideas wow </div>-->
<!--                 </div>-->
<!--             </div> -->

             <!-- close community shared trip item -->

             <!-- open community shared trip item -->
<!--             <div class="item flex-item">-->
<!--                 <div class="prodimgtile" id="prodimgtile4"></div>-->
<!--                 <div id="roadtripinfo">-->
<!--                     <div id="triptitle"> Forest Mountain Trip </div><hr>-->
<!--                     <div id="tripnotes"> Trip ideas for the Fall. I love these trip ideas wow </div>-->
<!--                 </div>-->
<!--             </div> -->

             <!-- close community shared trip item -->

             <!-- open community shared trip item -->
<!--             <div class="item flex-item">-->
<!--                 <div class="prodimgtile" id="prodimgtile5"></div>-->
<!--                 <div id="roadtripinfo">-->
<!--                     <div id="triptitle"> Forest Mountain Trip </div><hr>-->
<!--                     <div id="tripnotes"> Trip ideas for the Fall. I love these trip ideas wow </div>-->
<!--                 </div>-->
<!--             </div>  close community shared trip item


         </div> <!-- close scroll container --><br>
</div> <!-- close shared trips -->

    <!-- start new shared trip section --><br><br>
<!--   -->



</div> <!-- close outer container -->
</body>
</html>
