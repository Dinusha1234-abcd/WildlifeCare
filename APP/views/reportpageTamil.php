<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/reportViewpage.css">
    <link rel="stylesheet" href="../Public/css/header.css">
    <script src="../Public/Javascript/login1.js"></script>
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

            <ul>
            <li id="home_2" style="right:750px"  ><a href="../?lang=3" >முகப்பு பக்கம்</a></li>
                <li id="dashboard_1" style="right:600px"  ><a href="../user/viewpage?lang=3" >டாஷ்போர்டு</a></li>
                <li id="report_2" style=" background-color: rgb(168, 175, 168); right:380px" ><a  href="">சம்பவங்கள் அறிக்கை</a></li>
                <li id="special_1"style="right:210px"  ><a href="../user/viewSpecialNotice?lang=3">சிறப்பு அறிவிப்பு</a></li> 
                <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">மொழி</button>
                    <div class="dropdown-content-1">
                        <a href="../incident/index?lang=1">English</a>
                        <a href="../incident/index?lang=2">සිංහල</a> 
                        <a href="../incident/index?lang=3">தமிழ்</a>
                    </div>
                  </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_3(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="../villager/editprofile?lang=3">சுயவிவரம் காண</a> 
                    <a href="../user/logout">வெளியேறு</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php ?>
                   <div id="myview" class="view-1"   >
                  <!-- <span onclick="closeView()" class="close">&times;</span> -->
                 <div class="subcontainer_3-5">
                  <div class="subcontainer_3-6">
                  <h3 style="color: white;">மற்ற இடங்களில் அறிக்கை நிகழ்வுகளைப் பார்க்கவும்</h3>
               
                
                <?php
                      foreach ( $this->dataReport as $row){
                            $date = $row['date'];
                            $time = $row['time_in'];
                            $place = $row['Place'];
                            $reportType = $row['reporttype'];
                } ?>

                        } ?>

                 </div> 
                 
                 <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126452.02111388237!2d80.94313801331407!3d7.934107447297657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb44ba3b16ce27%3A0xc34997a2b3032b7c!2sPolonnaruwa!5e0!3m2!1sen!2slk!4v1633233322587!5m2!1sen!2slk" width="50%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>     -->
                  
                    <div id="map" style="top: 10px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126452.02111388237!2d80.94313801331407!3d7.934107447297657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb44ba3b16ce27%3A0xc34997a2b3032b7c!2sPolonnaruwa!5e0!3m2!1sen!2slk!4v1633233322587!5m2!1sen!2slk" width="50%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    
                    <div id="detail">
                    <h><b>தேதி : <?php echo $date ?> </b></h></br><br> 
                    <h><b>நேரம் : <?php echo $time ?></b> </h><br></br> 
                    <h><b>இடம் : <?php echo $place ?></b> </h><br></br> 
                    <h><b>அறிக்கை வகை : <?php echo $reportType ?></b> </h>
                    <a id="back" href="../incident/viewReport?type=1&page=1&lang=1" style="color: white;">மீண்டும்</a> 
 
                  </div>
             
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
                var image = { //100
                  url: '../Public/images/report-5.png',
                  scaledSize: new google.maps.Size(60, 60),
                };
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                  position: uluru,
                  map: map,
                  draggable: true,
                  animation: google.maps.Animation.DROP,

                   
                });

              }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOVujYe2-BPc5b66VsL0xVVUKoZHkb5yo&callback=initMap "></script>
    

                  <a href="" >Back</a>
                    </div>

              
                </div>
                   </div>
</body>                
</html>