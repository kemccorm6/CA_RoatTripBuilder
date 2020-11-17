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
    <script src="../select2-4.1.0-beta.1/dist/js/select2.min.js">
        $(document).ready(function() {
            $(`.js-example-basic-single`).select2();
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP0XNFSS02"></script>
    <script src="../granim.js-2.0.0/dist/granim.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HP0XNFSS02');
    </script>
    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="../select2-4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .container {
            width: 80vw;
            margin: auto;
            font-family: 'Poppins', sans-serif;
        }

        body {

            background-image: url("tiretracks.png");
            /*background: linear-gradient(to bottom, #f1f0c9, #ecf2d6);*/
            background-size: 2250px 1250px ;
        }
        .makeatrip {
            width: 80%;
            margin: auto;
            z-index: 10;
            /*position: fixed;*/
            top: 200px;
            box-shadow: 1px 1px 6px black;
            background: linear-gradient(196deg, #fcec41, #d84848, #fea738, #fe6a38);
            background-size: 800% 800%;
            -moz-animation: AnimationName 28s ease infinite;
            animation: AnimationName 28s ease infinite;
            color: white;
            border-radius: 15px;
            height: 370px;
            left: 300px;
            padding: 15px;
            padding-bottom: 30px;
            text-align: center;
            font-size: 18pt;
            margin-top: 30px;
        }

        @-moz-keyframes AnimationName {
            0%{background-position:50% 0%}
            50%{background-position:51% 100%}
            100%{background-position:50% 0%}
        }
        @keyframes AnimationName {
            0%{background-position:50% 0%}
            50%{background-position:51% 100%}
            100%{background-position:50% 0%}
        }
        .js-example-basic-single  {
            height: 60px;
            width: 80%;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
            border-radius: 10px;
            border: 1px solid black;
            font-family: 'Poppins';
            font-size: 20pt;
            letter-spacing: 6px;
            color: #85A867;
            margin: auto;
            padding: 10px;
        }
        .input {
            margin: auto;
            width: 100%;
            clear: both;
            text-align: right;
        }
        option, #shorter {
            width: 100px;
        }
        .label {
            float: left;
            margin-left: 20px;
            margin-top: 10px;
        }
        #submit {
            width:20% !important;
            height: 40px;
            font-size: 16pt;
            border-radius: 15px;
            margin:0 auto !important;
            display:block !important;
            float:none !important;
            background-color: rgba(129, 164, 101, 1.0);
            color: #FFFFFF;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.19);
        }
        form {
            margin: auto;
        }

        .title1 {
            font-size: 40pt;
         font-family: "Village";
          letter-spacing: 3px;
              transform: scale(1.75, .95);
            margin: auto;
            width: 80%;
            height: 70px;
            line-height: 70px;
            border-radius: 10px;
            /*  background-color: white; */
            color: white;
        }
        h6 {
            width: 500px;
            margin: auto;
            margin-bottom: 5px;
        }


    </style>
</head>
<body>
<?php include "../newheader.php" ?>

<div class="container">


    <div class="makeatrip">

        <div class="title1">make a trip</div>
        <h6>Start your adventure by choosing your start and end city</h6>
        <br>
        <form action="CALCULATINGTrip.php">
            <div class="input">
            <div class="label">Start City:</div>

                <select class="js-example-basic-single" name="citysearchstart"  >
                    <?php
                        $citysearchsql = "SELECT * FROM city_table ORDER BY city ASC";

                        $cityresults = $mysql->query($citysearchsql);

                        while($citycurrentrow = $cityresults-> fetch_assoc()){
                        echo "<option  value= '" . $citycurrentrow["cityID"] . "'>" . $citycurrentrow["city"] . "</option>";
                    }
                    ?>


                </select>
            </div>
<br>
            <div class="input">
                <div class="label">End City:</div>
                <select name="citysearchend" class="js-example-basic-single">
                    <?php
                    $citysearchsql2 = "SELECT * FROM city_table ORDER BY city ASC";

                    $cityresults2 = $mysql->query($citysearchsql2);

                    while($citycurrentrow2 = $cityresults2-> fetch_assoc()){
                        echo "<option value= '" . $citycurrentrow2["cityID"] . "'>" . $citycurrentrow2["city"] . "</option>";
                    }
                    ?>

                </select>
            </div><br>


                <input type="submit" id="submit" value="Make Trip" />

        </form>


                    </div>

                </di>
</div>

</div


</div>
</body>
</html>
