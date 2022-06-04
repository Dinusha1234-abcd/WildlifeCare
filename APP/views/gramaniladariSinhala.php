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
            <li id="home_2"><a href="../?lang=2">මුල් පිටුව</a></li>
                <li id="dashboard_1" style=" background-color: rgb(168, 175, 168); color:black;"  ><a href="../user/viewpage?lang=2"  >මුල් පුවරුව</a></li>
                <li id="report_2" style="   padding-right:20px ; right:345px  "><a href="../incident/index?lang=2"> වර්තා කිරීම</a></li>
                <li id="special_1"><a href="../user/viewSpecialNotice?lang=2">විශේෂ දැන්වීම</a></li> 
                    
                <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">භාෂාව</button>
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
                    <h3>වනජීවී අලි ඔබගේ ලියාපදිංචි ගම්මානයට පැමිණේ &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>
     
        <div id="notificationmessage">

            <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->
       
                <form action="../gramaniladari/viewNotification?lang=2&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="right">&nbsp&nbsp
                    <h3>ඔබට නව දැනුම්දීමක් ඇත (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
            <h3>ඔබගේ සිදුවීම වාර්තා කිරීම සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                <h3>වනජීවී අලි ඔබගේ ලියාපදිංචි ගම්මානයට පැමිණේ &nbsp&nbsp
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
            <h3>ඔබගේ සිදුවීම වාර්තා කිරීම සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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

            <form action="../gramaniladari/viewNotification?lang=2&notification=true" method="post" style="display: inline-block;">
                <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                <h3>ඔබට නව දැනුම්දීමක් ඇත (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="නරඹන්න " name="submitAlert" id="submit">
                </h3>
            </form>
        </div>
        <?php if (isset($_POST['Submit'])) {
?>

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>ඔබගේ සිදුවීම වාර්තා කිරීම සාර්ථකයි   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                <h3>ඔබගේ සිදුවීම වාර්තා කිරීම සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
            <button onclick="return getLocation()" class="login-btn"style=" border-radius: 10px; padding: 10px 10px; background-color:grey;  color: white;">ස්ථානය ක්ලික් කරන්න</button><br>
            <h1>ඔබගේ හදිසි සිදුවීම් වාර්තාව තහවුරු කරන්න </h1>
            <form action="?lang=2" method="post"> 
            <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;" ></textarea>
            <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;" ></textarea>
            <input type="submit" value="තහවුරු " name="Submit"   onclick="return validation()">

   
             <a href="../user/viewpage?lang=2" id="close" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">අවලංගු</a>    </div>
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
                     <a href="../gramaniladari/viewCropDamages?lang=2&&page=1&status=pending">
            <button class="work">
            <h1>මගේ සේවා ස්ථානය</h1>
                <div class="line"><img src="../Public/images/envlop.png"></div>

            </button>

        </a>
        <a href="../user/viewpage?lang=2&&status=1">
            <button class="report" >
                <h1> හදිසි වාර්තාව </h1>
                <div class="line"><img src="../Public/images/emergency.png"></div>

            </button>
        </a>
        <a href="../gramaniladari/viewNotification?lang=2&notification=true">
            <button class="specialNotice">
                <div class="notification"><span class="dot-1"><img src="../Public/images/bell.png" alt="1" srcset=" "></span>
                </div>
                <h1>දැනුම්දීම් </h1>
                <div class="line"><img src="../Public/images/notifi.png"></div>
            </button>
        </a>
        <a href="../dashboard/index?lang=2">
            <button class="dashboard">
                <h1>සංඛ්යානමය</br> විශ්ලේෂණ මණ්ඩලය<div class="line"><img src="../Public/images/dashIcon.png"></div>
                </h1>
            </button>
        </a>
        <a href="../incident/viewReport?type=1&page=1&lang=2">
            <button class="view"  >
                <h1>වාර්තා කළ බලන්න<div class="line"><img src="../Public/images/list.png"></div>
                </h1>
            </button>
        </a>
    </div>
        
</body>

</html>