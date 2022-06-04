<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
   <link rel="stylesheet" href="../Public/css/gramaniladari.css"> 
   <link rel="stylesheet" href="../Public/css/popupNotification.css">
   <link rel="stylesheet" href="../Public/css/notification.css">
   <link rel="stylesheet" href="../Public/css/gramaniladari.css"> 
  <script src="../Public/Javascript/login1.js"></script>
  <title>Gramanildhari Page</title>
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
                 <li id="dashboard_1" style=" background-color: rgb(168, 175, 168); color:black;"><a href="../user/viewpage?lang=1">Main Menu</a></li>
                <li id="report_2"><a a href="../incident/index?lang=1">Report Incidents</a></li>

                <li id="special_1"><a href="../user/viewSpecialNotice?lang=1">SpecialNotice </a></li>

          
                <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                        <a href="?lang=1">English</a>
                        <a href="?lang=2">සිංහල</a>
                        <a href="?lang=3">தமிழ்</a>
                    </div>
                </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../gramaniladari/editprofile?lang=1">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    if (isset($this->status) && isset($this->notification)) {
        if ($this->status  == "notview"&&$this->notification > 0) {
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

<!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

<form action="../gramaniladari/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" value="View" name="submitAlert" id="submit">
    </h3>
</form>
</div>
        <?php

if (isset($_POST['Submit'])) {
?>

    <div id="popupmessage"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div> 
 
    <?php }  ?>
    <?php

    } else if ($this->status  == "notview")  {
         
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

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div>  
<?php

}
 
?>
    <?php }
        
     elseif ($this->notification > 0) {  ?>
 
        <div id="notificationmessage">

            <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

            <form action="../gramaniladari/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="View" name="submitAlert" id="submit">
                </h3>
            </form>
        </div>
        <?php if (isset($_POST['Submit'])) {
?>

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div>  
<?php

}
 
?>
<?php }else{
    
   ?>        <?php if (isset($_POST['Submit'])) {
    ?>
    
        <div id="popupmessagefirst"  >
            <form action="?lang=1&report=1" method="post" style="display: inline-block;">
            <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
                <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 </h3>
            </form>
     
        </div>  
    <?php
    
    }
     
    ?> <?php }}
    ?>
    <?php  
    if (isset($_GET['status'])) {
         if($_GET['status']  ==1){ 
    ?>

        <div id="message1" style="padding: 10px;  ">

            <img src="../Public/images/confirm.jpg" style="width:100px;  height:100px"><br>
            <button onclick="return getLocation()" class="login-btn"style=" border-radius: 10px; padding: 10px 10px; background-color:grey;  color: white;">Click Me Track location</button><br>
            <h1>Confirm Your Emergency Incident Report </h1>
            <form action="?lang=1" method="post"> 
            <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;" ></textarea>
            <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;" ></textarea>
            <input type="submit" value="Confirm" name="Submit"   onclick="return validation()">

   
             <a href="../user/viewpage?lang=1" id="close" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">Cancel</a>    </div>
             </form>
    <?php

    }}

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

        <span class="dot2"><img src="../Public/images/user_icon.png" id="user-icon2"></span><b>
         <label>   <?php
                         echo $_SESSION["Fname"] . " " . $_SESSION["Lname"] ?>
                         </b></label>
                     </div>
                     <div class="main-view">
                     <a href="../gramaniladari/viewCropDamages?lang=1&&page=1&status=pending">
            <button class="work">
            <h1> My Workplace</h1>
                <div class="line"><img src="../Public/images/envlop.png"></div>

            </button>

        </a>
        <a href="../user/viewpage?lang=1&&status=1">
            <button class="report" >
                <h1> Emergency </br> Incident Report</h1>
                <div class="line"><img src="../Public/images/emergency.png"></div>

            </button>
        </a>
        <a href="../gramaniladari/viewNotification?lang=1&notification=true">
            <button class="specialNotice">
                <div class="notification"><span class="dot-1"><img src="../Public/images/bell.png" alt="1" srcset=" "></span>
                </div>
                <h1>Notifications</h1>
                <div class="line"><img src="../Public/images/notifi.png"></div>
            </button>
        </a>
        <a href="../dashboard/index?lang=1">
            <button class="dashboard">
                <h1>Dashboard<div class="line"><img src="../Public/images/dashIcon.png"></div>
                </h1>
            </button>
        </a>
        <a href="../incident/viewReport?type=1&page=1&lang=1">
            <button class="view"  >
                <h1>View Reported<div class="line"><img src="../Public/images/list.png"></div>
                </h1>
            </button>
        </a>
    </div>
        
</body>

</html>