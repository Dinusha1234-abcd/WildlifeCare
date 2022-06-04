<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/report_4Update.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/header.css">
    <script src="../Public/Javascript/1.js"></script>
    <title>அறிக்கை பக்கம்</title>
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

            <li id="home_2"><a href="../?lang=3">வீடு</a></li>
                <li id="dashboard_1" style=" color:black;"><a href="../user/viewpage?lang=3">முதன்மை </a></li>
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
    if ($this->status  == "notview" && $this->notification > 0) {
  ?>

      <div id="messagealert">
        <form action="?lang=3&report=1" method="post" style="display: inline-block;">
          <img src="../Public/images/alertIcon.png" id="alert">
          <h3>யானை உங்கள் கிராமத்திற்கு வரட்டும்   &nbsp&nbsp
            <input type="submit" value="Ok" name="submitAlert" id="submit1">
          </h3>
        </form>
      </div>

      <div id="notificationmessage">

        <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

        <form action="../villager/viewNotification?lang=3&notification=true" method="post" style="display: inline-block;">
          <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
          <h3>புதிய அறிவிப்புபுதிய  (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
            <h3>உங்கள் அறிக்கை நிகழ்வு புதுப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
          <h3>யானை உங்கள் கிராமத்திற்கு வரட்டும்  &nbsp&nbsp
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
            <h3>உங்கள் அறிக்கை நிகழ்வு புதுப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </h3>
          </form>

        </div>
      <?php

      }

      ?>
    <?php } elseif ($this->notification > 0) {  ?>

      <div id="notificationmessage">

        <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

        <form action="../villager/viewNotification?lang=3&notification=true" method="post" style="display: inline-block;">
          <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
          <h3>புதிய அறிவிப்புபுதிய  (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="submit" value="View" name="submitAlert" id="submit">
          </h3>
        </form>
      </div>
      <?php if (isset($_POST['Submit'])) {
      ?>

        <div id="popupmessagelast">
          <form action="?lang=3&report=1" method="post" style="display: inline-block;">
            <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
            <h3>உங்கள் அறிக்கை நிகழ்வு புதுப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
            <h3>உங்கள் அறிக்கை நிகழ்வு புதுப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </h3>
          </form>

        </div>
      <?php

      }

      ?> <?php }
    } ?>
    <?php ?>
    <div id="myview" class="view-1">
        <div class="subcontainer_3-5">
            <div class="subcontainer_3-6">

                <?php
                foreach ($this->dataReport as $row) {


                    $place = $row['Place'];
                    $image = $row['image'];
                    $description = $row['description'];
                }
                foreach ($this->dataReport4 as $row) {

                    $animal = $row['animal_cause_to_damage'];
                    $cultivatedCrop = $row['cultivated_crop'];
                    $cultivatedlandExtent = $row['cultivated_land_extent'];
                    $damagedlandExtent = $row['damaged_land_extent'];
                }

                ?>
                <h3 style="color: white;"> <b>பயிர் சேதங்கள் <br><br>அறிக்கை எண் :<?php echo "  " . $_GET['reportNo']; ?> </b></h3>
            </div>



            <div id="map" style="top: 10px; width :600px">
      </div>    <div id="detail">
                    <form class=" " action=""  method="post">
                        <table class="table">
                            <tr class="header-table" style="text-align: left;">
                                <th>விலங்கு</th>
                                <td> <select class="text-1" name="animal" id="animal">
                                        <option value="<?php echo $animal ?>"><?php echo $animal ?></option>
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
                                             </td>
                            </tr>
                            </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>இடம் </th>
                                <td><input type="text" name="place" id="place" class="text" value="<?php echo $place ?>"> </td>
                            </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>பயிரிடப்பட்டது</th>
                                <td><input type="text" name="cultivatedCrop" id="place" value="<?php echo $cultivatedCrop ?>"> </td>
                            </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>நிலத்தை நீட்டவும் </th>
                                <td><input type="text" name="cultivatedLand" id="place" value="<?php echo $cultivatedlandExtent ?>"> </td>
                            </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>சேதமடைந்த நிலம்</th>
                                <td><input type="text" name="damageLand" id="place" value="<?php echo $damagedlandExtent ?>"> </td>
                            </tr>

                            <tr class="header-table" style="text-align: left;">
                                <th>புகைப்படம் சேர்க்க </th>
                                <td> <input type="file" name="Photo" id="file" class="file" value="<?php $image ?>"></td>
                            </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>இருப்பிடத்தைக் கண்காணிக்கவும் </th>
                                <td> <button onclick="return getLocation()" id="track">கிளிக்</button>
                                </td>
                            </tr>
                            <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;"></textarea>
                            <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;"></textarea>

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
                                    y.innerHTML = long;  }
                            </script>

<script>
              var x = document.getElementById("lat");
              var y = document.getElementById("lang");
              var lat;
              var long;

              function initMap() {
                // The location of Uluru
                const uluru = {
                  lat: <?php echo $lat ?> ,
                  lng: <?php echo $long ?>
                };
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 13,
                  center: uluru,
                });
                var image = {
                  url: '../Public/images/report-4.png',
                  scaledSize: new google.maps.Size(60, 60),
                };
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                  position: uluru,
                  map: map,
                  draggable: true,
                  animation: google.maps.Animation.DROP,

                  icon: image
                });

              }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMap "></script>
         
                        </table>
                </div>
                <div id="message">
                    <form action="" method="POST">

                        <input type="submit" value="புதுப்பிக்கவும் " name="Submit" onclick="return validation()">
                </div>

                </form>

                <a id="back" href="../incident/viewReport?type=4&page=<?php echo $_GET['page'] ?>&lang=3" style="color: white;">திரும்</a>




            </div>


        </div>
    </div>
</body>

</html>