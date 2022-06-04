<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/notification.css">

    <link rel="stylesheet" href="../Public/css/Dashboard.css">
    <!-- <script src="../Public/javascript/dashboard.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- <script src="../Public/javascript/dashboard.js"></script> -->
    <script src="../Public/Javascript/login1.js"></script>

    <title>Statistical Analyze Board</title>
</head>

<body style="background-image: none; background-color: rgba(236, 242, 240, 0.624);">
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
                <li id="special_1"><a href="../villager/viewSpecialNotice?lang=1">SpecialNotice </a></li>
                <div class="dropdown-1">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                        <a href="?lang=1&report=2">English</a>
                        <a href="?lang=2&report=2">සිංහල</a>
                        <a href="?lang=3&report=2">தமிழ்</a>
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

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000000px;  height:100000000px"><br> -->

                <form action="../villager/viewNotification?lang=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="right" style=" font-weight: 600%;  font-weight: 602;margin-left: 23%;  ">&nbsp&nbsp
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
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } elseif ($this->notification > 0) {  ?>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000000px;  height:100000000px"><br> -->

                <form action="../villager/viewNotification?lang=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="right" style=" font-weight: 600%;  font-weight: 602;margin-left: 23%;  ">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?> <?php }
        } ?>
    <div class="header-name">
        <h>இலங்கையில் மொத்தம் </h>
        <h style="float:right"><?php echo date("d/m/Y") ?></h>
    </div>
    <!-- <div class="header-name"><h><pre  style="font-size: larger;font-style: normal; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Total in Sri Lanka                                                                                                                                                               LastModified 30/09/2021</pre></h> </div> -->

    <div class="main-update-col-1">
        <div class="last-week">
        கடந்த வாரம் <div class="last-week-number">
                <h1 data-target=" " class="count"><?php echo $this->lastWeekData ?></h1>
                <!-- <p> சம்பவங்கள் </p> -->
            </div>
        </div>
        <div class="last-Month">
        கடந்த மாதம் <div class="last-month-number">
                <h1 data-target="  " class="count"><?php echo $this->lastMonthData ?></h1>
                <!-- <p> சம்பவங்கள்</p> -->
            </div>
        </div>
        <div class="last-hour">
            <p>கடந்த</p>
            <h2>24 மணி</h2>
            <div class="last-hour-number">
                <h1 data-target="<?php echo $this->last24HoursData ?>" class="count"><?php echo $this->last24HoursData ?> </h1>
                <p>சம்பவங்கள்</p>
            </div>
            <h1></h1>
        </div>
    </div>
    <div class="main-update-col-2">
        <div class="linechartmain">
            <!-- <h3>Report Incidents Polonnaruwa </h3> -->
            <div class="mychartmain">
                <canvas id="myChartmain"></canvas>
                <script>
                    let myChartmain = document.getElementById("myChartmain").getContext('2d');
                    let dataMain = [<?php echo $this->lastMonthWildElephantArrival ?>, <?php echo $this->lastMonthWildAnimalArrival ?>, <?php echo $this->lastMonthElephantFence ?>, <?php echo $this->lastMonthcropDamages ?>, <?php echo $this->lastMonthOthers ?>];
                </script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->
            </div>
        </div>
        <div class="detail">
         கால அளவு s  <br>
         கடைசி மாற்றம் <?php echo date("d/m/Y") ?>
        </div>
        <div class="date">
            <h2>இன்று</h2>
            <h3>
                <?php date_default_timezone_set('Asia/Kolkata');
                echo date('d F, Y') ?>
            </h3>
            <h2>
            நேரம்
            </h2>
            <h3>
                <?php date_default_timezone_set('Asia/Kolkata');
                echo date('G:i:s'); ?>
            </h3>

        </div>
        <!-- <h>Today</h> -->
    </div>
    <div class="district-name">
        <h2>Polonnaruwa மாவட்டம்</h2>
    </div>
    <div class="district-report">
        <div class="users-1">
         அதிகாரிகள்    <h1 data-target="20" class="count">0</h1>
        </div>
        <div class="users-2">
        கிராம அலுவலர்லு <h1 data-target="<?php echo $this->gramaNiladhari ?>" class="count"><?php echo $this->gramaNiladhari ?></h1>
        </div>
        <div class="users-3">
        மருத்துவர்கள் <h1 data-target="10" class="count">0</h1>
        </div>
        <div class="users-4">
        கிராமவாசிகள் <h1 data-target="<?php echo $this->villager ?>" class="count"><?php echo $this->villager ?></h1>
        </div>

        <div class="report-1">
        யானை வருகை <h1 data-target="<?php echo $this->lastMonthWildElephantArrivalDistrict ?>" class="count"><?php echo $this->lastMonthWildElephantArrivalDistrict ?></h1>
        </div>
        <div class="report-2">
        விலங்குகள் ஆபத்து <h1 data-target="<?php echo $this->lastMonthWildAnimalDangerDistrict ?>" class="count"><?php echo $this->lastMonthWildAnimalDangerDistrict ?></h1>
        </div>
        <div class="report-3">
        விலங்குகள் வருகை <h1 data-target="<?php echo $this->lastMonthWildAnimalArrivalDistrict ?>" class="count"><?php echo $this->lastMonthWildAnimalArrivalDistrict ?></h1>
        </div>
        <div class="report-4">
        பயிர் சேதங்கள் <h1 data-target="<?php echo $this->lastMonthcropDamagesDistrict ?>" class="count"><?php echo $this->lastMonthcropDamagesDistrict ?></h1>
        </div>
        <div class="report-5">
        காட்டில் சட்டவிரோத   <h1 data-target="<?php echo $this->lastMonthIllegalThingDistrict ?>" class="count"><?php echo $this->lastMonthIllegalThingDistrict ?></h1>
        </div>

        <div class="report-6">
        யானை வேலி உடைப்பு <h1 data-target="<?php echo $this->lastMonthElephantFenceDistrict ?>" class="count"><?php echo $this->lastMonthElephantFenceDistrict ?></h1>
        </div>
        <div class="update-col">
            <?php echo $this->districtName ?> மாவட்ட சம்பவங்கள் சதவீதம்  <h1 data-target=" " class="count"><?php echo $this->districtIncidentPercentage . "%" ?></h1>
        </div>
    </div>


    <div class="main-update-col-3">
        <div class="last-week-1">
        கடந்த வாரம் <div class="last-week-number-1">
                <h1 data-target="<?php echo $this->lastWeekincidentdistrict ?>" class="count"><?php echo $this->lastWeekincidentdistrict ?></h1>
                <p> சம்பவங்கள் </p>
            </div>
        </div>
        <div class="last-Month-1">
        கடந்த மாதம் <div class="last-month-number-1">
                <h1 data-target="<?php echo $this->lastMonthincidentdistrict ?>" class="count"><?php echo $this->lastMonthincidentdistrict ?></h1>
                <p> சம்பவங்கள்</p>
            </div>
        </div>
        <div class="last-hour-1">
            <p>கடந்த</p>
            <h2>24 மணி</h2>
            <div class="last-hour-number-1">
                <h1 data-target="<?php echo $this->lastDayincidentdistrict ?>" class="count"><?php echo $this->lastDayincidentdistrict ?></h1>
                <p>சம்பவங்கள்</p>
            </div>
            <h1></h1>
        </div>
    </div>
    <div class="map">
        <div class="header-map">
        சம்பவங்கள் அறிக்கை பகுதிகள்
        </div>
        <div id="map-area">

        </div>
    </div>

    </div>
    <div class="province-report">
        <div class="linechart">
            <h3>சம்பவங்கள் <?php echo $this->districtName ?> </h3>
            <div class="mychart">
                <canvas id="myChart"></canvas>
                <script>
                    let myChart1 = document.getElementById("myChart").getContext('2d');
                    let data1 = [<?php echo intval($this->lastMonthWildElephantArrivalDistrict) ?>, <?php echo intval($this->lastMonthWildAnimalArrivalDistrict) ?>, <?php echo intval($this->lastMonthElephantFenceDistrict) ?>, <?php echo intval($this->lastMonthcropDamagesDistrict) ?>, <?php echo intval($this->lastMonthIllegalThingDistrict) + intval($this->lastMonthWildAnimalDangerDistrict) ?>];
                </script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->
            </div>
        </div>
        <div class="chart2">
            <h3>சம்பவங்களின் மாகாண அறிக்கைகள் </h3>
            <div class="mychart">
                <canvas id="myChart1"></canvas>
                <script>
                    let myChart2 = document.getElementById("myChart1").getContext('2d');
                    let data2 = [<?php echo intval($this->CentralProvinceIncident) ?>, <?php echo intval($this->NorthernProvinceIncident) ?>, <?php echo intval($this->SouthernProvinceIncident) ?>, <?php echo intval($this->WesternProvinceIncident) ?>, <?php echo intval($this->NorthWesternProvinceIncident) ?>, <?php echo intval($this->UvaProvinceIncident) ?>, <?php echo intval($this->NorthCentralProvinceIncident) ?>, <?php echo intval($this->UvaProvinceIncident) ?>, <?php echo intval($this->SabaragamuwaProvinceIncident) ?>];
                </script>
            </div>
        </div>
    </div>
    </div>
    <div class="time-update">
        <h3>கடந்த மணிநேர அறிக்கையில் புதுப்பிக்கவும்</h3>
        <div class="chart3">
            <div class="mychart-1">
                <canvas id="myChart2"></canvas>
                <script>
                    let myChart3 = document.getElementById("myChart2").getContext('2d');
                    let data3 = [<?php echo intval($this->Incident12AMCount) ?>, <?php echo intval($this->Incident01AMCount) ?>, <?php echo intval($this->Incident02AMCount) ?>, <?php echo intval($this->Incident03AMCount) ?>, <?php echo intval($this->Incident04AMCount) ?>, <?php echo intval($this->Incident05AMCount) ?>, <?php echo intval($this->Incident06AMCount) ?>, <?php echo intval($this->Incident07AMCount) ?>, <?php echo intval($this->Incident08AMCount) ?>, <?php echo intval($this->Incident09AMCount) ?>, <?php echo intval($this->Incident10AMCount) ?>, <?php echo intval($this->Incident11AMCount) ?>, <?php echo intval($this->Incident12PMCount) ?>, <?php echo intval($this->Incident01PMCount) ?>, <?php echo intval($this->Incident02PMCount) ?>, <?php echo intval($this->Incident03PMCount) ?>, <?php echo intval($this->Incident04PMCount) ?>, <?php echo intval($this->Incident05PMCount) ?>, <?php echo intval($this->Incident06PMCount) ?>, <?php echo intval($this->Incident07PMCount) ?>, <?php echo intval($this->Incident08PMCount) ?>, <?php echo intval($this->Incident09PMCount) ?>, <?php echo intval($this->Incident10PMCount) ?>, <?php echo intval($this->Incident11PMCount) ?>];
                </script>>
                <!-- <script src="../Javascript/dashboard.js"></script> -->

            </div>
        </div>
    </div>
    <div class="monthly-update">
        <?php $year = date("Y") ?>
        <h3>வருடத்தில் புதுப்பிக்கவும் <?php echo " " . $year . " " ?> மாதம் அறிக்கையிடப்பட்ட சம்பவம்</h3>
        <div class="chart4">
            <div class="mychart-1">
                <canvas id="myChart3"></canvas>
                <script>
                    let myChart4 = document.getElementById("myChart3").getContext('2d');
                    let data4 = [<?php echo intval($this->IncidentJanCount) ?>, <?php echo intval($this->IncidentFebCount) ?>, <?php echo intval($this->IncidentMarchCount) ?>, <?php echo intval($this->IncidentAprilCount) ?>, <?php echo intval($this->IncidentMayCount) ?>, <?php echo intval($this->IncidentJuneCount) ?>, <?php echo intval($this->IncidentJulyCount) ?>, <?php echo intval($this->IncidentAugCount) ?>, <?php echo intval($this->IncidentSepCount) ?>, <?php echo intval($this->IncidentOctCount) ?>, <?php echo intval($this->IncidentNovCount) ?>, <?php echo intval($this->IncidentDecCount) ?>];
                </script>

                <script src="../Public/javascript/dashboardTamil.js"></script>

            </div>
        </div>

    </div>


    <div>

    </div>
    <script>
 

 function initMap() {
const map = new google.maps.Map(document.getElementById("map-area"), {
zoom: 12,//100
center: { lat: 6.795740, lng: 79.93823242 },
});

         var image1 = {
           url: '../Public/images/report-1.png',
           scaledSize: new google.maps.Size(60, 60),
         };
         var image2 = {
           url: '../Public/images/report-2.png',
           scaledSize: new google.maps.Size(60, 60),
         }; var image3 = {
           url: '../Public/images/report-3.png',
           scaledSize: new google.maps.Size(60, 60),
         }; var image4 = {
           url: '../Public/images/report-4.png',
           scaledSize: new google.maps.Size(60, 60),
         }; var image5 = {
           url: '../Public/images/report-5.png',
           scaledSize: new google.maps.Size(60, 60),
         }; var image6 = {
           url: '../Public/images/report-6.png',
           scaledSize: new google.maps.Size(60, 60),
         };
<?php

    foreach ($this->map as $row)
     {
         if($row['reportType']=='Elephants are in The Village'){  
         $lat = $row['lat'];
         $lon = $row['lon'];
         $type = 'image1';
         echo ("addMarker($lat, $lon,$type);\n");              
         }elseif($row['reportType']=='Other Wild Animals are in The Village'){
             $lat = $row['lat'];
             $lon = $row['lon'];
             $type = 'image2';
             echo ("addMarker($lat, $lon,$type);\n");              
          }elseif($row['reportType']=='Breakdown of Elephant Fences'){
             $lat = $row['lat'];
             $lon = $row['lon'];
             $type = 'image3';
             echo ("addMarker($lat, $lon,$type);\n");              
          }elseif($row['reportType']='Crop Damages'){
             $lat = $row['lat'];
             $lon = $row['lon'];
             $type = 'image4';
             echo ("addMarker($lat, $lon,$type);\n");              
          }elseif($row['reportType']=='Illegal Happing'){
             $lat = $row['lat'];
             $lon = $row['lon'];
             $type = 'image5';  //1000
             echo ("addMarker($lat, $lon,$type);\n");              
          }else{
             $lat = $row['lat'];
             $lon = $row['lon'];
             $type = 'image6';  //1000
             echo ("addMarker($lat, $lon,$type );\n");              
   
          }          
              
     }
   ?>
function addMarker(lat, lng,type) {
 const otherMarker = new google.maps.Marker({
position: { lat: lat, lng:lng },
map,
title: type,
icon : type,
}); 
         
      
}

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMap "></script>

</body>

</html>