
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: "Village";
            src: url(http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Village-wLn3.ttf) format("truetype");
        }
        body {
            margin: 0 !important;
            padding: 0 !important;
            background-image: url("../tiresmirror.gif");

            background-repeat: repeat;
            background-position: top center;

            background-size: 2000px 2500px ; */
        }

        .header {
            height: 200px;
        }

.mainstripe {
    position: absolute;
    width: 100%;
    height: 203px;
    left: 0px;
    background-size: 100% 50%;
    background-position: center center;
    background-repeat: no-repeat;
   background-image: url("mainstripe.png");
}
.brand {
    width: 250px;
    display: block;
    margin: auto;
    height: 130px;
    margin-top: 25px;
    background: linear-gradient(180deg, #76945C 1.91%, #52683E 100%);
    border: 1px solid #52683E;
    box-shadow: 6px 6px 6px rgba(0, 0, 0, 0.25);
    border-radius: 22px;
}
.brand:hover {
    width: 260px;
    height: 140px;
    animation: ease-in-out;
}
.navitemleft {
    width: 20%;
    float: right;
    font-size: 16pt;
    padding: 10px;
    text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
    background: #FFFFFF;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    font-family: "Poppins";
    text-align: center;
    line-height: 20px;
    margin-left: 20px;
    font-style: normal;
    font-weight: normal;
    color: #37472A;
}
.navitemleft:hover {
    background-color: #FFAC00;
    color: #FFFFFF;
}
        .navitemright:hover {
            background-color: #FFAC00;
            color: #FFFFFF;
        }
.navitemright {
    width: 20%;
    float: left;
    font-size: 16pt;
    padding: 10px;
    text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
    background: #FFFFFF;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    font-family: "Poppins";
    text-align: center;
    line-height: 20px;
    margin-top: 20px;
    margin-left: 20px;
    font-style: normal;
    font-weight: normal;
    color: #37472A;
}
li {
    display: inline;
}
a {
    text-decoration: none; !
color: black;!
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.leftnav {
    width: 40%;
    margin-top: 80px;
    position: absolute;
}
.rightnav {
    width: 40%;
    margin-left: 58%;
    top: 55px;
    height: 80px;
    position: absolute;
}
.loginbutton {
    width: 120px;
    height: 60px;
    margin-top: 10px;
    background: linear-gradient(180deg, #FFCC17 5.73%, #FFAC00 100%);
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 22px;
    float: right;
    font-family: Yanone Kaffeesatz;
    font-style: normal;
    font-weight: normal;
    font-size: 36px;
    color: #FFFFFF;
line-height: 40pt;
    text-align: center;
}
.loginbutton:hover {
    background: #FFFFFF;
    color: #FFAC00;
}
        .logged:hover {
            background: #FFFFFF;
            color: #FFAC00;
        }
.logged {
    text-align: center;
    font-size: 12pt;
    line-height: 0pt;
}
@media screen and (orientation:landscape) and (min-width:900px) and (max-width:1520px){
    .navitemright {
        width: 25%;
        line-height: 25px;
        font-size: 14pt;
    }
    .rightnav {
        top: 55px;
        height: 80px;
        margin-left: 60%;
        width: 37%;
    }
    .leftnav {
        margin-top: 75px;
        width: 37%;

    }
    .navitemleft {
        width: 25%;
        line-height: 25px;
        font-size: 14pt;
    }
}
@media screen  and (min-width:0px) and (max-width:1000px){
    .navitemright {
        width: 25%;
        line-height: 25px;
        font-size: 10pt;
        overflow-wrap: normal;
    }
    .rightnav {
        top: 75px;
        margin-left: 65%;
    }
    .leftnav {
        margin-top: 75px;
        width: 35%;
    }
    .navitemleft {
        width: 25%;
        line-height: 20px;
        font-size: 8pt;
    }

}
    </style>
</head>
<body>

<div class="header">
    <div class="mainstripe">
<div class="leftnav">
<ul>
    <li><a href="../Community/communityMAIN.php" class="navitemleft">COMMUNITY</a></li>
    <li><a href="../MakeTrip/maketripMAIN.php" class="navitemleft">MAKE A TRIP</a></li>

</ul>
</div>

        <a class="brand" href="../frontpage/frontpageV2.php">
            <img src="myalogo1.png" style="width: 200px; margin: auto; display: block"></a>

        <div class="rightnav">
            <ul>
                <li><a href="../Mission/missionMAIN.php" class="navitemright">OUR MISSION</a></li>
                <li><a href="../Team/teamMAIN.php" class="navitemright">OUR TEAM</a></li>
                <?php
                if(!empty($_SESSION["start"])){

                    echo "<li><a class='loginbutton' href='../UserProfile/userprofile.php?id=". $_SESSION["UserId"] ."'>";
                    echo "PROFILE <div class='logged'><br><br> Hi " . $currentrow["User_Real_Name"] . "! </div></a></li>";
                    echo "";
                }else{
                    echo " <li><a class='loginbutton' href='../Login/CA_RoadTripLOGIN.php'>LOG IN</a></li>";
                }
                ?>
            </ul>
        </div>

    </div>
</div>

</body>
</html>

