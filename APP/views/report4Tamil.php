<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">

    <link rel="stylesheet" href="../Public/css/report_4.css">
    <script src="../Public/javascript/report-4.js"></script>

    <script src="../Public/javascript/login1.js"></script>
    <title>பயிர் சேதங்கள்</title>
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
                 <li id="dashboard_1"><a href="../user/viewpage?lang=3">முதன்மை </a></li>
                 <li id="report_2"  ><a href="../incident/index?lang=3">சம்பவம் குறித்  </a></li>
                 <li id="special_1"><a href="../villager/viewSpecialNotice?lang=3">கவனிக்கவு </a></li>
                 <div class="dropdown-1" style="  padding-left:  300px ">
                     <button class="dropbtn-1">மொழி</button>
                     <div class="dropdown-content-1">
                         <a href="../incident/index?lang=1">English</a>
                         <a href="../incident/index?lang=2">සිංහල</a>
                         <a href="../incident/index?lang=3">தமிழ்</a>
                     </div>
                 </div>
                 <li class="dropdown">
                     <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                     <div id="myDropdown" class="dropdown-content">
                         <a href="../villager/editprofile?lang=3">சுயவிவரம்</a>
                         <a href="../user/logout">Logout</a>
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

                <form action="../villager/viewNotification?lang=3&notification=true" method="post" style="display: inline-block;">
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
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
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
                <form action="?lang=3&report=1" method="post" style="display: inline-block;">
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
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
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

                <form action="../villager/viewNotification?lang=3&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3 style="font-size: 15px;">உங்களிடம் புதிய அறிவிப்பு உள்ளது (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
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
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
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
    <div class="container1-1">
        <div class="header">
            <b>பயிர் சேதங்கள்</b>
        </div>

        <div id="message" style="display: none;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <h id="errorMessage"></h>
        </diV>
        <form class="form-report" action="" method="post">
            <div class="form-rp">
                <label><b>விலங்கு சேதம் :</b></label>
                <select class="text" name="animal" id="animal">
                <option value=""> இங்கே தேர்வு செய்யவும்</option>
                <option value="Alligator">முதலை சிங்கம் </option>
                <option value="Antelope">மான் விலங்கு</option>
                <option value="Baboon">பபூன்</option>
                <option value="Bear">தாங்க</option>
                <option value="Bee">தேனீ</option>
                <option value="Camel">ஒட்டகம்</option>
                <option value="Deer">மான்</option>
                <option value="Dolphin">டால்பின்</option>
                <option value="Elephant">யானை</option>
                <option value="Fox">நரி</option>
                <option value="Giraffe">ஒட்டகச்சிவிங்கி</option>
                <option value="Goat">வெள்ளாடு</option>
                <option value="Hamster">வெள்ளெலி</option>
                <option value="Heron">ஹெரான்</option>
                <option value="Human">மனிதன்</option>
                <option value="Kangaroo">கங்காரு</option>
                <option value="Leopard">சிறுத்தை</option>
                <option value="Lion">சிங்கம்</option>
                <option value="Monkey">குரங்கு</option>
                <option value="Pig">பன்றி</option>
                <option value="Rabbit">முயல்</option>
                <option value="Snake">பாம்பு</option>
                <option value="Tiger">புலி</option>
                <option value="Wolf">ஓநாய்</option>
                <option value="Other">மற்றவை</option>
                </select><br><br>
                <lable for="place"><b>இடப் பெயர் :<b></lable>
                <input type="text" name="place" class="text" id="place"><br><br>
                <label for="Cultivated Crop"><b>பயிரிடப்பட்ட  : </b></label>
                <input type="text" name="cultivatedCrop" id="cCrop"> <br><br>
                <label for="Culktivatedland"><b>பயிரி  விரிவாக் : </b></label>
                <input type="text" name="cultivatedLand" id="eCrop"> <br><br>
                <label for="Damagedland"><b>சேதமடைந்த நிலம்: </b></label>
                <input type="text" name="damageLand" id="eLand"> <br><br>

                <!-- <textarea class="text" id="discription" name="latitude" rows="2"></textarea> -->
                <div class="photo">
                    <label for="addPhoto"><b>புகைப்படம் சேர்க்க : </b></label>
                    <input type="file" name="Photo" id="file" class="file">
                </div><br> <br>
                <label for="status"><b>இருப்பிடத்தைக் கண்கா : </b></label>
                <button onclick="return getLocation()" id="track">கிளிக்</button>
            </div>
            <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;"></textarea>
            <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;"></textarea>


            <div class="report">
                <input type="submit" value="அறிக்கை" name="Submit" onclick="return validation()">
            </div>
        </form>
    </div>
    <?php $latitude  = "<script>document.write(lat)</script>";
    $longitude = "<script>document.write(long)</script>"; ?>
    <!-- <a href="./" class="back">Back</a> -->
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
            y.innerHTML = long;
        }
    </script>
</body>

</html>