<html>
<head>
    <style>
        .container {
            max-width: 960px;
            margin: auto;
            font-family: sans-serif;
            line-height: 1.5;
        }

        h2 {
            color: yellow;
        }

        .flex-grid {
            color: white;
            display: flex;
            margin: auto -1rem 1rem;
        }

        .col {
            background-color: black;
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            padding: 1rem;
        }

        .sidebar {
            flex: 1;
        }

        .main {
            flex: 3;
        }
        hr {
            margin: 0;
        }
        .menuitem {

            height: 20px;


            text-align: right;
            line-height: 50px;
        }
        .menuitem1 {

            color: black;
            background-color: #6E8B55;

            text-align: left;
            line-height: 50px;
            text-decoration: none;
            text-decoration-color: black;
            text-decoration-line: none;

        }
        #single:hover {
            background-color: #FFAC00;
            width: 200px;
            height: 50px;
            font-weight: bold;

            border-radius: 10px;
        }
        #icon {
            margin: 10px;

            width: 25px;
            fill: white;
        }
    </style>
</head>
<body>

<div id="left" class="column">
    <div class="top-left">
        <img src="myalogo1.png" id="logo">
    </div>
    <div class="bottom">
    </div>

<div id="right" class="column">
    <div class="top-right">hi</div>
    <div class="bottom">hi</div>
</div>

<div class="container">
    <h1>A Simple Flexbox Layout for Sidebar + Main Content Area</h1>
    <div class="flex-grid">
        <aside class="col sidebar">

                <div class="menuitem">

                    <a href="login"></a>
                </div>
                <hr>
                <div class="menuitem1">
                    <div id="single">
                        <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/user.svg" id="icon"/>
                        <a style="text-decoration:none; color:white" href="http://webdev.iyaclasses.com/~eglover/CA_RoatTripBuilder/Login/CA_RoadTripLOGIN.php">User Login&nbsp;</a></div>
                    <hr>
                    <div id="single">
                        <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/team.svg" id="icon"/>
                        <a style="text-decoration:none; color:white" href="login">Admin Login</a></div>
                </div>
                <hr>
                <div class="menuitem">

                    <a href="login"></a>
                </div>
                <hr>
                <div class="menuitem1">
                    <div id="single">
                        <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/suitcases.svg" id="icon"/>
                        <a style="text-decoration:none; color:white" href="login">Make a Trip</a></div>
                    <hr>
                    <div id="single">
                        <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/conversation.svg" id="icon"/>
                        <a style="text-decoration:none; color:white" href="login">Discover Community</a></div>
                </div>
                <hr>
                <div class="menuitem">
                    <a href="login"></a>
                </div>
                <hr>
                <div class="menuitem1">
                    <div id="single">
                        <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/target.svg" id="icon"/>
                        <a style="text-decoration:none; color:white" href="login">Our Mission</a></div>
                    <hr>
                    <div id="single">
                        <img src="http://webdev.iyaclasses.com/~kemccorm/CA%20Raod%20Trip/support.svg" id="icon"/>
                        <a style="text-decoration:none; color:white" href="login">Our Team</a></div>
                </div>
                <hr>
                <div class="menuitem">
                    <a href="login"></a>
                </div><hr>
            </div>
    </div>

        </aside>
        <section class="col main">
            <h2>The Main Content Area</h2>
            <p>In CSS, it has a flex property of 3, meaning it takes up 3 units (whatever that might be) of the available space.<p>
            <p>This means, in total we have 4 units of space (1 + 3 = 4) which then renders the sidebar at 25% and the main content area as 75%</p>
        </section>
    </div>
</div>


</body>
</html>
