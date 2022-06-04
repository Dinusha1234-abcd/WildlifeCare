<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/report1Update.css">
  <link rel="stylesheet" href="../Public/css/header.css">
  <link rel="stylesheet" href="../Public/css/alert.css">
  <link rel="stylesheet" href="../Public/css/notification.css">
  <link rel="stylesheet" href="../Public/css/popupNotification.css">

  <script src="../Public/Javascript/1.js"></script>
  <title>වාර්තා පිටුව</title>
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
      <li id="home_2"><a href="../?lang=2">මුල් පිටුව</a></li>
                <li id="dashboard_1"   ><a href="../user/viewpage?lang=2" >මුල් පුවරුව</a></li>
                <li id="report_2" style="   padding-right:20px ; right:345px ;  " ><a href="../incident/index?lang=2"> වර්තා කිරීම</a></li>
                <li id="special_1"><a href="../villager/viewSpecialNotice?lang=2" >විශේෂ දැන්වීම</a></li> 
               <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">භාෂාව</button>
                    <div class="dropdown-content-1">
                        <a href="../incident/index?lang=1">English</a>
                        <a href="../incident/index?lang=2">සිංහල</a> 
                        <a href="../incident/index?lang=3">தமிழ்</a>
                    </div>
                  </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                         <a href="../villager/editprofile?lang=2">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
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
       
                <form action="../villager/viewNotification?lang=1" method="post" style="display: inline-block;">
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

            <form action="?lang=1&report=1" method="post" style="display: inline-block;">
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
  <?php ?>
  <div id="myview" class="view-1">
    <div class="subcontainer_3-5">
      <div class="subcontainer_3-6">

        <?php
        foreach ($this->dataReport as $row) {
          $place = $row['Place'];
          $image = $row['image'];
          $lat =  $row['lat'];
          $long = $row['lon'];
        }
        foreach ($this->dataReport1 as $row) {
          $noOfelephants = $row['no_of_elephants'];
        }
        ?>
        <h3 style="color: white;"> <b>වල් අලි ඉන්නේ ගමේ <br><br>වාර්තා අංකය:<?php echo "  " . $_GET['reportNo']; ?> </b></h3>
      </div>
      <?php if(isset($_GET['image'])) { ?>
            <?php if(!empty($image) ) { ?> 
            <div class="image">
                <a href="../incident/updateReport?lang=<?php echo $_GET['lang'] ?>&&reportNo=<?php echo $_GET['reportNo'] ?>&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>"><img src="../Public/images/close.png" id="viewcls"></a>
                
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" />
            </div> <?php }else{  ?>
                <div class="imageerror">
                <img src="../Public/images/errorimage.png" id="errorimage"> 
                
                <a href="../incident/updateReport?lang=<?php echo $_GET['lang'] ?>&&reportNo=<?php echo $_GET['reportNo'] ?>&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>"><img src="../Public/images/close.png" id="viewcls"></a>
                
                <p> සිද්ධි වාර්තාව ඉදිරිපත් කරන විට පින්තූරක් දමා නැත </p>
                </div>
                <?php } }?>
  
       
      <div id="map" style="top: 10px; width :600px">
      </div>
      <div id="detail">
        <form class=" " action=" " method="post">
          <table class="table">
            <tr class="header-table" style="text-align: left;">
              <th>අලි කීයක් ද</th>
              <td><input type="number" name="noOfelephant" id="number" value="<?php echo $noOfelephants ?>"> </td>
            </tr>
            <tr class="header-table" style="text-align: left;">
              <th>ස්ථානයේ නම</th>
              <td><input type="text" name="place" id="place" class="text" value="<?php echo $place ?>"> </td>
            </tr>

            <tr class="header-table" style="text-align: left;">
              <th>ඡායාරූපය එක් කරන්න </th>
              <td> <input type="file" name="Photo" id="file" class="file" value="<?php $image ?>"></td>
            </tr>
            <tr class="header-table" style="text-align: left;">
              <th>Track The location </th>
              <td> <button onclick="return getLocation()" id="track">ක්ලික් කරන්න</button>
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
                y.innerHTML = long;
              }

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
                  url: '../Public/images/report-1.png',
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
        <form action="../incident/viewReport?lang=1&&reportNo=44&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>" method="POST">

          <input type="submit" value="යාවත්කාලීන " name="Submit" onclick="return validation()">
      </div>

      </form>

      <a id="back" href="../incident/viewReport?type=3&page=1&lang=2&page=<?php echo $_GET['page'] ?> " style="color: white;">ආපසු</a>
    </div>
  </div>
</body>

</html>