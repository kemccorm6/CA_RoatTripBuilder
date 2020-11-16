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
    <link rel = "stylesheet"
          href = "../master2.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        .infotile {
            position: relative;
            background: -webkit-linear-gradient(to bottom, #f6c157, #f9d793);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #f9d793, #f6c157); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
            font-family: museo, serif;
            /* font-weight: 100 / 300 / 500 / 700 / 900; */
            font-style: normal;
            text-align: center;
            font-size: 18pt;
            z-index: 0;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            font-size: 36pt;
            padding-top: 40px;

        }

        #it1 {
            width: 736px;
            margin: auto;
            margin-top: 30px;
            color: black;
        }

        .mainimage{
            position: absolute;
            top: 160px;
            left: 208px;
            width: 320px;
            height: 320px;
            /* background-color: black; */
            margin-left: auto;
            margin-right: auto;
            background-image: url("kia.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100%;
            box-shadow: 0 10px 10px 0 rgba(0,0,0, 0.29);
        }

        .previousimage{
            position: absolute;
            top: 240px;
            left: 16px;
            width: 160px;
            height: 160px;
            /* background-color: black; */
            background-image: url(kyla.JPG);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100%;

        }

        .nextimage{
            position: absolute;
            top: 240px;
            right: 16px;
            width: 160px;
            height: 160px;
            /* background-color: black; */
            background-image: url("dolce.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .name{
            /* font-family: titling-gothic-fb, sans-serif; */
            font-weight: 600;
            font-size: 26pt;
            padding-top: 8px;

        }

        .capt{
            /* font-family: 'Courier New', Courier, monospace; */
            font-size: 14pt;
            padding-top: 20px;
            padding-bottom: 20px;
            text-align: center;
            width: 500px;
            margin: auto;
         font-weight: lighter;

        }

        .arrows{
            height: 40px;
            position: absolute;

        }

        .arrows:hover{
            height: 45px;
        }

        .switcher {
            background-color: RGBA(255,255,255,.50);

            width: 480px;
            height: 60px;
            margin: auto;
            margin-top: 420px;
            position: relative;
            border-radius: 30px;
        }

        #left{
            left: 0px;
            top: 10px;
        }

        #right{
            right: 0px;
            top: 10px;
        }



    </style>
</head>
<body>
<?php include "../newheader.php" ?>


<div class="container">

    <div class="infotile" id="it1">
        <h1>Meet the Team</h1>
        <div class="gallery">
            <div class="mainimage"></div>
            <div class="previousimage"></div>
            <div class="nextimage"></div>
            <div class="switcher">
                <img src="leftarrow.png" alt="leftarrow" class="arrows" id="left">
                <div class="name">
                    Kia
                </div>
                <img src="rightarrow.png" alt="rightarrow" class="arrows" id="right">
            </div>
            <div class="capt">
                Position: Project Manager & Web Developer <br>
            </div>
        </div>
        <!-- <button class="button" id="swap">Change Image</button> -->
    </div> <!-- close container-->

</div> <!-- close container-->

<script>
    var i = 1;
    let images = ["kia.jpg","mya.jpeg","dolce.jpeg","kyla.JPG"];
    let names = ["Kia", "Mya", "Eliza", "Kyla"];
    let capt = ["Position: Project Manager & Web Developer <br><br>", "Position: Graphic Design/Brand Consultant <br><br> Based in Los Angeles, Mya helps cultivate the look and feel of California Dreamin' with his graphic design and illustrations. He thoroughly enjoys traveling with friends and family and always can't wait for his next adventure: it brings his imagination so much material! ", "Position: UX/UI & Web Developer <br><br> Eliza Glover is a web developer and manages our site's visual components. She has spent the past 5 years going on various adventures in Europe and is always itching to find new ones wherever she is.","Position: Database Manager <br><br> When she’s not trying to create the perfect road trip playlist, Kyla Wyllie is managing the database functionality of the site, and searching for new locations to add have you California Dreamin’. She currently spends most of her time between Los Angeles and San Diego, but has big dreams of future travel."]
    function swapnext(){
        // alert(i+" to "+(i+1));
        i++;
        if(i< images.length){
            document.querySelector(".mainimage").style.backgroundImage = "url(" + images[i] + ")";
            document.querySelector(".name").innerHTML = names[i];
            document.querySelector(".capt").innerHTML = capt[i];
            document.querySelector(".previousimage").style.backgroundImage = "url(" + images[i-1] + ")";
            if(i == images.length-1){
                document.querySelector(".nextimage").style.backgroundImage = "url(" + images[0] + ")";
            } else {
                document.querySelector(".nextimage").style.backgroundImage = "url(" + images[i+1] + ")";
            }
        } else if (i==images.length){
            document.querySelector(".mainimage").style.backgroundImage = "url(" + images[0] + ")";
            document.querySelector(".name").innerHTML = names[0];
            document.querySelector(".capt").innerHTML = capt[0];
            document.querySelector(".previousimage").style.backgroundImage = "url(" + images[i-1] + ")";
            document.querySelector(".nextimage").style.backgroundImage = "url(" + images[1] + ")";
            i=0;
        }
    }



    function swapprev(){
        // alert(i+" to "+(i+1));
        i--;
        if(i> 0){
            document.querySelector(".mainimage").style.backgroundImage = "url(" + images[i] + ")";
            document.querySelector(".name").innerHTML = names[i];
            document.querySelector(".capt").innerHTML = capt[i];
            document.querySelector(".previousimage").style.backgroundImage = "url(" + images[i-1] + ")";
            if(i == images.length-1){
                document.querySelector(".nextimage").style.backgroundImage = "url(" + images[0] + ")";
            } else {
                document.querySelector(".nextimage").style.backgroundImage = "url(" + images[i+1] + ")";
            }
        } else if (i==0){
            // alert("end")
            document.querySelector(".mainimage").style.backgroundImage = "url(" + images[0] + ")";
            document.querySelector(".name").innerHTML = names[0];
            document.querySelector(".capt").innerHTML = capt[0];
            document.querySelector(".previousimage").style.backgroundImage = "url(" + images[images.length-1] + ")";
            document.querySelector(".nextimage").style.backgroundImage = "url(" + images[i+1] + ")";
            i=images.length;
        }
    }



    document.querySelector("#right").addEventListener("click", function(){
        swapnext();
    });
    document.querySelector("#left").addEventListener("click", function(){
        swapprev();
    });
</script>
</body>

<script src="http://www.iyawebdev.com/jquery.js"> </script>






</div>
</body>
</html>
