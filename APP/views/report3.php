<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/report3.css">
    <script src="../Public/javascript/login1.js"></script>
    <script src="../Public/javascript/report3.js"></script>

    <title>Breakdown of Elephants Fences</title>
</head>

<body>

    <header id="main">
        <img src="../Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul>
                <li id="home_2"><a href="../">Home</a></li>
                <li id="dashboard_1"><a href="../user/viewpage?lang=1">Main Menu</a></li>
                <li id="report_2"><a href="../incident/index?lang=1">Report Incidents</a></li>
                <li id="special_1"><a href="../user/viewSpecialNotice?lang=1">SpecialNotice </a></li>
                <div class="dropdown-1">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                        <a href="?lang=1&report=3">English</a>
                        <a href="?lang=2&report=3">සිංහල</a>
                        <a href="?lang=3&report=3">தமிழ்</a>
                    </div>
                </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../villager/editprofile?lang=1">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    if (isset($this->status) && isset($this->notification)) {
        if ($this->status  == "notview" && $this->notification > 0) {
    ?>

            <div id="messagealert">
                <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/alertIcon.png" id="alert">
                    <h3>Wildlife Elephants Come In to Your Registered Village &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:10000000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessage">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>

            <?php }  ?>
        <?php

        } else if ($this->status  == "notview") {

        ?>

            <div id="messagealert1">
                <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/alertIcon.png" id="alert">
                    <h3>Wildlife Elephants Come In to Your Registered Village &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } elseif ($this->notification > 0) {  ?>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } else {

        ?> <?php if (isset($_POST['Submit'])) {
        ?>

                <div id="popupmessagefirst">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?> <?php }
    }
        ?>
    <div id="message" style="display: none;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <h id="errorMessage"></h>
    </div>
    <div class="container1-1">
        <div class="header">
            <b>Breakdown of Elephant Fence</b>
        </div>
        <form class="form-report" action="" method="post">
            <div class="form-rp">
                <lable for="place"><b>Enter the Place name <b></lable>
                <input type="text" name="place" class="text" id="place"><br><br>
                <div class="photo">
                    <label for="addPhoto"><b>Add Photo : </b></label>
                    <input type="file" name="Photo" id="file" class="file">
                </div><br> <br>
                <label for="status"><b>Track The location : </b></label>
                <button onclick="return getLocation()" id="track">Click Me</button>
            </div>
            <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;"></textarea>
            <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;"></textarea>


            <div class="report">
                <input type="submit" value="Report" name="Submit" onclick="return validation()">
            </div>
        </form>
    </div>
    <?php $latitude  = "<script>document.write(lat)</script>";
    $longitude = "<script>document.write(long)</script>"; ?>
    <!-- <a  class="back">Back</a> -->
    <script>
        var x = document.getElementById("lat");
        var y = document.getElementById("lang");
        var lat;
        var long;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                return false;
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
                y.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;
            x.innerHTML = lat;
            y.innerHTML = long;}
    </script>
</body>

</html>