<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/report_4_update.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <script src="../Public/javascript/report-4.js"></script>

    <script src="../Public/javascript/login1.js"></script>
    <title>Crop Damages</title>
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
                        <a href="?lang=1&&reportNo=<?php echo $_GET['reportNo'] ?>">English</a>
                        <a href="?lang=2&&reportNo=<?php echo $_GET['reportNo'] ?>">සිංහල</a>
                        <a href="?lang=3&&reportNo=<?php echo $_GET['reportNo'] ?>">தமிழ்</a>
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
 if (isset($this->status)&&isset($this->notification)) {
    if($this->status  =="notview"){ 
?>

   <div id="messagealert"   >
      <form action="?lang=1&report=1" method="post" style="display: inline-block;"> 
         <img src="../Public/images/alertIcon.png" id="alert"> 
         <h3>Wildlife Elephants Come In to Your Registered Village  &nbsp&nbsp 
        <input type="submit" value="Ok" name="submitAlert"   id="submit1"></h3>
       </form>
   </div>
   <?php } ?>
   <div id="notificationmessage">
  
<!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->
   <?php  if($this->notification>0){ ?> 
    <form action="../villager/viewNotification?lang=1" method="post" style="display: inline-block;"> 
          <img src="../Public/images/bell1.png" id="bell"  >&nbsp&nbsp
          <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="submit" value="View" name="submitAlert"   id="submit"></h3>
          </form>
       </div>
   <?php } ?>
<?php

} else if(isset($this->status)){  
     if($this->status  =="notview"){ 
   ?>

       <div id="messagealert1"   >
          <form action="?lang=1&report=1" method="post" style="display: inline-block;"> 
             <img src="../Public/images/alertIcon.png" id="alert"> 
             <h3>Wildlife Elephants Come In to Your Registered Village  &nbsp&nbsp 
            <input type="submit" value="Ok" name="submitAlert"   id="submit1"></h3>
           </form>
       </div>
       <!-- <div id="notificationmessage"> -->
      <?php }}elseif(isset($this->notification)){  ?>
       <?php  if($this->notification>0){ ?> 
   <div id="notificationmessage">

       <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->
       
       <form action="?lang=1&report=1" method="post" style="display: inline-block;"> 
        <img src="../Public/images/bell1.png" id="bell"  >&nbsp&nbsp
        <h3>You have New Notification (900) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" value="View" name="submitAlert"   id="submit"></h3>
        </form>
        </div>
<?php }} ?>
    <div class="container1-1">
        <div class="header">
            <b>Crop Damages <br><br>Report Number :<?php echo "  " . $_GET['reportNo']; ?> </b>
        </div>
        <?php
        if (isset($_POST['Submit'])) {
        ?>

            <div class="message1Div">
                <div id="message1" style="padding: 10px; background-color:aliceblue">

                    <img src="../Public/images/success-mesaage.png" style="width:90px;  height:90px">
                    <h1>Your Report Incident Update Sucessfully</h1>
                    <p style="color: darkred;">
                        <!-- Import ! <br> -->
                        ☆ Please make sure when You Update the Incident Report Time and Data are automatically Updated
                    </p>
                    <a href="../incident/viewReport?type=4&page=2&lang=1"  class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">View Report</a>
            
                </div>
            </div>
        <?php

        }

        ?>
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
        <div id="message" style="display: none;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <h id="errorMessage"></h>
        </diV>
        <form class="form-report" action="" method="post">
            <div class="form-rp">
                <label><b>Which Animal caused to damage :</b></label>
                <select class="text" name="animal" id="animal">
                    <option value="<?php echo $animal ?>"><?php echo $animal ?></option>
                    <option value="Alligator">AlligatorLion </option>
                    <option value="Antelope">Antelope</option>
                    <option value="Baboon">Baboon</option>
                    <option value="Bear">Bear</option>
                    <option value="Bee">Bee</option>
                    <option value="Camel">Camel</option>
                    <option value="Deer">Deer</option>
                    <option value="Dolphin">Dolphin</option>
                    <option value="Elephant">Elephant</option>
                    <option value="Fox">Fox</option>
                    <option value="Giraffe">Giraffe</option>
                    <option value="Goat">Goat</option>
                    <option value="Hamster">Hamster</option>
                    <option value="Heron">Heron</option>
                    <option value="Human">Human</option>
                    <option value="Kangaroo">Kangaroo</option>
                    <option value="Leopard">Leopard</option>
                    <option value="Lion">Lion</option>
                    <option value="Monkey">Monkey</option>
                    <option value="Pig">Pig</option>
                    <option value="Rabbit">Rabbit</option>
                    <option value="Snake">Snake</option>
                    <option value="Tiger">Tiger</option>
                    <option value="Wolf">Wolf</option>
                    <option value="Other">Other</option>
                </select><br>
                <lable for="place"><b>Enter the Place name :<b></lable>
                <input type="text" name="place" class="text" id="place" value="<?php echo $place ?>"><br><br>
                <label for="Cultivated Crop"><b>Cultivated Crop : </b></label>
                <input type="text" name="cultivatedCrop" id="cCrop" value="<?php echo $cultivatedCrop ?>"> <br><br>
                <label for="Culktivatedland"><b>Extend Cultivated land: </b></label>
                <input type="text" name="cultivatedLand" id="eCrop" value="<?php echo $cultivatedlandExtent ?>"> <br><br>
                <label for="Damagedland"><b>Extend Damaged land: </b></label>
                <input type="text" name="damageLand" id="eLand" value="<?php echo $damagedlandExtent ?>"> <br><br>
           <div class="photo">
                    <label for="addPhoto"><b>Add Photo : </b></label>
                    <input type="file" name="Photo" class="file">
                </div>
            </div>
            <div class="location">
                <label class="label-1">Where is the location</label>
                <button onclick="return getLocation()">Click Me Track location</button>
            </div>
            <div class="map" id="">
                <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;"></textarea>
                <textarea class="text" id="lang" name="longitude" rows="2" style="display:none;"></textarea>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126452.02111388237!2d80.94313801331407!3d7.934107447297657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb44ba3b16ce27%3A0xc34997a2b3032b7c!2sPolonnaruwa!5e0!3m2!1sen!2slk!4v1633233322587!5m2!1sen!2slk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <!-- <p id="demo"></p> -->


            </div>
            <div class="report">
                <input type="submit" value="Report" onclick="return validation()" name="Submit">
            </div>
        </form>
        <!-- <a href="../incident/viewReport?type=3&page=1&lang=1" class="back">Back</a> -->
    </div>
    <?php $latitude  = "<script>document.write(lat)</script>";
    $longitude = "<script>document.write(long)</script>"; ?>
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
            x.innerHTML = long;
            y.innerHTML = lat;
        }
    </script>
</body>

</html>