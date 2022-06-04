<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/villagerPage.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
    <script src="../Public/Javascript/login1.js"></script>
    <title>முதன்மை பட்டியல்</title>
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
                <li id="home_2"><a href="../?lang=3">வீடு</a></li>
                <li id="dashboard_1" style=" background-color: rgb(168, 175, 168); color:black;"><a href="../user/viewpage?lang=3">முதன்மை </a></li>
                <li id="report_2"><a href="../incident/index?lang=3">சம்பவம் குறி </a></li>

                <li id="special_1"><a href="../villager/viewSpecialNotice?lang=3">கவனிக்கவு </a></li>


                <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">மொழி</button>
                    <div class="dropdown-content-1">
                        <a href="?lang=1">English</a>
                        <a href="?lang=2">සිංහල</a>
                        <a href="?lang=3">தமிழ்</a>
                    </div>
                </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../villager/editprofile?lang=3">சுயவிவரம்</a>
                        <a href="../user/logout">Logint</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    if (isset($this->status) && isset($this->notification)) {
        if ($this->status  == "view" && $this->notification > 0) {
    ?>

            <div id="messagealert">
                <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/alertIcon.png" id="alert">
                    <h3 style="font-size: 11px;">உங்கள் பதிவு செய்யப்பட்ட கிராமத்திற்கு வனவிலங்கு யானைகள் வருகின்றன &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3 style="font-size: 15px;">உங்களிடம் புதிய அறிவிப்பு உள்ளது (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                        <h3 style="font-size: 15px; margin-left:110px" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                    <h3 style="font-size: 11px;">உங்கள் பதிவு செய்யப்பட்ட கிராமத்திற்கு வனவிலங்கு யானைகள் வருகின்றன &nbsp&nbsp
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
                        <h3 style="font-size: 15px;" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } elseif ($this->notification > 0) {  ?>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3 style="font-size: 15px;">உங்களிடம் புதிய அறிவிப்பு உள்ளது (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3 style="font-size: 15px;" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                        <h3 style="font-size: 15px;" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?> <?php }
    }
        ?>
    <?php
    $result = $this->data;
    foreach ($result as $row) {
        $fname = $row['Fname'];
    } ?>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status']  == 1) {
    ?>

            <div id="message1" style="padding: 10px;  ">

                <img src="../Public/images/confirm.jpg" style="width:100px;  height:100px"><br>
                <button onclick="return getLocation()" class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:grey;  color: white; font-size:100px;font-size:10px;">இருப்பிடத்தைக் கண்காணிக்கவும்</button><br>
                <h1 style="font-size: 100px; font-size: 20px;">உங்கள் அவசர சம்பவ அறிக்கையை உறுதிப்படுத்தவும் </h1>
                <form action="?lang=3" method="post">
                    <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;"></textarea>
                    <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;"></textarea>
                    <input style="font-size: 100px; font-size: 8px; padding: 10px 20px; width: 15%" type="submit" value="உறுதிப்படுத்தவும்" name="Submit" onclick="return validation()">


                    <a href="../user/viewpage?lang=3" id="close" style=" border-radius: 10px; padding: 10px 100px;padding: 12px 20px; background-color:#056412; font-size: 8px; width: 15%" color: white;">ரத்து செய்</a>
            </div>
            </form>
    <?php

        }
    }

    ?>
    <script>
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
            console.log(lat);
        }
    </script>
    <div class="name">
        <span class="dot2"><img src="../Public/images/user_icon.png" id="user-icon2"></span><label id="name"><b><b>Hello <?php echo " " . $fname; ?></b> </b></label>
    </div>
    </form>
    <div class="main-view">
        <a href="../user/viewpage?lang=3&&status=1">
            <button class="report">
                <h1> அவசரம் </br> சம்பவ அறிக்கை</h1>
                <div class="line"><img src="../Public/images/emergency.png"></div>

            </button>
        </a>

        <a href="../villager/viewNotification?lang=3&notification=true">
            <button class="specialNotice">
                <div class="notification"><span class="dot-1"><img src="../Public/images/bell.png" alt="1" srcset=" "></span>
                </div>
                <h1>அறிவிப்புகள்</h1>
                <div class="line"><img src="../Public/images/notifi.png"></div>
            </button>
        </a>

        <a href="../dashboard/index?lang=3">
            <button class="dashboard">
                <h1>டாஷ்போர்டு <div class="line"><img src="../Public/images/dashIcon.png">
                    </div>
                </h1>
            </button>
        </a>
        <a href="../incident/viewReport?type=1&page=1&lang=3">
            <button class="view">
                <h1  style="font-size: 100px; font-size: 15px;">புகாரளிக்கப்பட்டதைப் பார்க்கவும்<div class=" line"><img src="../Public/images/list.png"></div>
                </h1>
            </button>
        </a>


    </div>
    <!-- <a class="View-Report" href="../incident/viewReport?type=1&page=1">
        <h2>View Reported Incidents</h2>
    </a> -->
</body>

</html>