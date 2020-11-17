

<?php
session_start();
session_destroy();
$_SESSION["start"] = "";

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

    <script src="http://code.jquery.com/jquery.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <style>

.container {
    width: 80vw;
    margin: auto;
    font-family: 'Poppins', sans-serif;
}
@font-face {
    font-family: "Village";
    src: url(http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Village-wLn3.ttf) format("truetype");
}

        .createacc {
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
        #title1 {
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
        input {
            height: 60px;
            width: 70%;
            font-size: 13pt;
            border-radius: 20px;
            line-height: 13pt;
            margin-bottom: 15px;
            margin-right: 20px;
        }
.input {
    margin: auto;
    width: 100%;
    clear: both;
    text-align: right;
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
        ::-webkit-input-placeholder { /* Edge */
            color: #6b6a6a;
        }

        :-ms-input-placeholder { /* Internet Explorer */
            color: #6b6a6a;
        }
        input[id^="username"]::placeholder {
            background-image: url("https://img.icons8.com/material-outlined/24/F09B32/user-male.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
        input[id^="password"]::placeholder {
            background-image: url("https://img.icons8.com/windows/32/F09B32/lock-2.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
        input[id^="checkedadmin"]::placeholder {
            background-image: url("https://img.icons8.com/windows/32/F09B32/lock-2.png");
            background-repeat: no-repeat;
            color: #F09B32;
        }
.label {
    float: left;
    margin-left: 20px;
    margin-top: 10px;
}
        label {

            padding:0px;
margin: auto;
           height: 50px;
            display:block;
            width: 170px;
            line-height: 45pt;
            text-align: center;
        }
        #checkedadmin {
            margin: auto;
        }
.createacc a:hover {
    font-size: 20pt;
}
#submit:hover {
    background-color: #6E8B55;
}
    </style>
</head>
<body>
<?php include"../newheader.php" ?>

<div class="container">

    <div class="createacc" id="createacc2" >
        <div id="title1">Log In</div>

        New here? <a href="CREATEACC_V2.php">Create an Account</a>
        <br><br>

        <form action="../UserProfile/userprofile.php">
            <div class="input">
         <div class="label"> Username:</div>
            <input id="username" type="text" name="usernamel" placeholder=" &nbsp; &nbsp;  username"><br>
            </div>
            <div class="input">
            <div class="label"> Password:</div>
            <input id="password" type="text" name="passwordl" placeholder=" &nbsp; &nbsp;  password"><br>
            </div>
<!--            <label><input type="checkbox" name="admin" value="admin" id="admincheck" onclick="reveal()">Check if Admin</label>-->

<!--            <input type="text" name="adminpassword" placeholder="&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; admin password" style="display:none" id="checkedadmin">-->
            <br><input id="submit" type="submit" value="Log In">

<!--            <script>-->
<!--                function reveal(){-->
<!--                    var checkbox = document.getElementById("admincheck");-->
<!--                    var text = document.getElementById("checkedadmin");-->
<!--                    var boxheight = document.getElementById("createacc2");-->
<!--                    if (checkbox.checked == true){-->
<!--                        text.style.display = "block";-->
<!--                        boxheight.style.height = "600px";-->
<!--                    }else{-->
<!--                        text.style.display = "none";-->
<!--                        boxheight.style.height = "500px";-->
<!---->
<!--                    }-->
<!--                }-->
<!---->
<!--            </script>-->

            <script>
                $("#submit").click(function(event){
                    if($("#username").val() == ''){
                        alert("Please fill out username.")
                        event.preventDefault();

                    }

                    if($("#password").val() == ''){
                        alert("Please fill out password.")
                        event.preventDefault();

                    }


                    // alert( $("#username").val() == '' );

                });
            </script>
        </form>


    </div> <!-- close container-->
</body>
</html>
</body>
</html>