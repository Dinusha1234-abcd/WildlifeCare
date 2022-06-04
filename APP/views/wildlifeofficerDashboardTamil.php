<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['NIC'])) {
    header("Location:http://localhost/WildlifeCare/user/index");
}
if (isset($_SESSION['jobtype'])) {
    if ($_SESSION['jobtype'] == 'Wildlife Officer') {
    } else {
    }
} else {
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css">
    <link rel="stylesheet" href="../Public/css/wildlifeofficerDashboard.css">
    <script src="../Public/Javascript/login.js"></script>
    <script src="../Public/javascript/admin.js"></script>
    <link rel="stylesheet" href="../Public/css/notification.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- <script src="../Javascript/dashboard.js"></script> -->
    <title>Dashboard</title>
    <script>
        function initMap() {
            var locations = <?php
                            $arr = [];
                            foreach ($data['dataLocation'] as $row) {
                                $arr[] = [$row['Place'], $row['lat'], $row['lon'], $row['reporttype']];
                            }

                            echo json_encode($arr);
                            ?>;



            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(
                    <?php if (!empty($data['dataLocation'][0])) {
                        echo $data['dataLocation'][0]['lat'];
                    } else {
                        echo  7.93965;
                    } ?>, <?php if (!empty($data['dataLocation'][0])) {
                                echo $data['dataLocation'][0]['lon'];
                            } else {
                                echo  81.00274;
                            } ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][3]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>
</head>

<body style="background-image: none; background-color: white;">
    <header id="main">
        <img src="../Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul>
                <li id="homeTamil"><a href="../?lang=3">முகப்பு பக்கம்</a></li>
                <li id="userPageSinhala"><a href="../wildlifeofficer/?lang=3"> &nbsp;பயனர் பக்கம் </a></li>
                <li id="incidentsTamil"><a href="../wildlifeofficer/viewIncidents?lang=3"> &emsp; சம்பவங்கள்</a></li>
                <li id="notificationsTamil"><a href="../wildlifeofficer/viewNotification?lang=3">அறிவிப்புகள்</a></li>
                <li id="dashboardTamil"><a href="../wildlifeofficer/viewDashboard?lang=3">தரவு பலகை</a></li>
                <li>
                    <div class="dropdown-1" style="  padding-left:  300px ">
                        <button class="dropbtn-1">மொழி</button>
                        <div class="dropdown-content-1">
                            <a href="?lang=1">English</a>
                            <a href="?lang=2">සිංහල</a>
                            <a href="?lang=3">தமிழ்</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../wildlifeofficer/viewProfile?lang=3">பயனர் சுயவிவரம்</a>
                        <a href="../user/logout?lang=3">வெளியேறு</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    if ($this->notificationStatus == "notView") {
    ?>
        <div id="notificationmessage">



            <form action="../wildlifeofficer/viewIncidents?lang=<?php echo $_GET['lang'] ?>&check=true" method="post" style="display: inline-block;">
                <img src="../Public/images/bell1.png" id="right" style=" font-weight: 600%;  font-weight: 602;margin-left: 10%;  ">&nbsp
                <h3>புதிதாக<br> அறிவிக்கப்பட்டசம்பவம் &nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="View" name="submitAlert" id="submit">
                </h3>
            </form>
        </div> <?php  }
                ?>
    <div class="first">
        காலம் -3 மாதம்<br>
        <?php


        echo "கடைசி மாற்றம் -  " . date("d/m/Y") ?><br>

    </div>
    <div class="main-update-col-1">
        <div class="last-week">
            கடந்த வாரம் <div class="last-week-number">
                <h1 data-target="<?php echo $data['lastWeekData']  ?>" class="count"> <?php echo $data['lastWeekData']  ?></h1>
                <p>சம்பவங்கள் </p>
            </div>
        </div>
        <div class="last-Month">
            கடந்த மாதம்
            <div class="last-month-number">
                <h1 data-target="<?php echo $data['lastMonthData']; ?>" class="count"><?php echo $data['lastMonthData']; ?></h1>
                <p>சம்பவங்கள்</p>
            </div>
        </div>
        <div class="last-hour">
            <p>கடந்த</p>
            <h2>24 மணி</h2>
            <div class="last-hour-number">
                <h1 data-target="<?php echo $data['last24HoursData'] ?>" class="count"><?php echo $data['last24HoursData']  ?> </h1>
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
                    let dataMain = [<?php echo $data['lastMonthWildElephantArrival'] ?>, <?php echo $data['lastMonthWildAnimalArrival']  ?>, <?php echo $data['lastMonthElephantFence']  ?>, <?php echo $data['lastMonthcropDamages'] ?>, <?php echo $data['lastMonthOthers']  ?>];
                </script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->
            </div>
        </div>
        <div class="detail">
            காலம் -1 மாதம் <br>
            கடைசி மாற்றம்<?php echo date("d/m/Y") ?>
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
        <h2>



            <?php echo $data['district'][0]['address'] ?> District</h2>
    </div>
    <div class="district-report">
        <div class="users-1">
            வனவிலங்கு அதிகாரிகள் <h1 data-target="<?php echo $data['wildlifeOfficer'] ?>" class="count"><?php echo $data['wildlifeOfficer'] ?></h1>
        </div>
        <div class="users-2">
            கிராம அலுவலர் <h1 data-target="<?php echo $data['gramaNiladhari'] ?>" class="count"><?php
                                                                                                echo $data['gramaNiladhari'] ?></h1>
        </div>
        <div class="users-3">
            கால்நடை மருத்துவர்கள் <h1 data-target="<?php


                                                    echo $data['veterinarian'] ?>" class="count"><?php


                                                                                                    echo $data['veterinarian'] ?></h1>
        </div>
        <div class="users-4">
            கிராம மக்கள்<h1 data-target="<?php echo $data['villager'] ?>" class="count"><?php echo $data['villager'] ?></h1>
        </div>
        <div class="report-1">
            காட்டு யானைகள் வருகை <h1 data-target="<?php echo $data['lastMonthWildElephantArrivalDistrict']  ?>" class="count"><?php echo $data['lastMonthWildElephantArrivalDistrict']  ?></h1>
        </div>
        <div class="report-2">
            யானைகள் வேலி <h1 data-target="<?php echo $data['lastMonthWildAnimalDangerDistrict'] ?>" class="count"><?php echo $data['lastMonthWildAnimalDangerDistrict'] ?></h1>
        </div>
        <div class="report-3">
            காட்டு விலங்குகள் வருகை Wild Animals Arrival <h1 data-target="<?php echo $data['villager'] ?>" class="count"><?php echo $data['lastMonthWildAnimalArrivalDistrict']  ?></h1>
        </div>
        <div class="report-4">
            பயிர் சேதங்கள் <h1 data-target="<?php echo $data['lastMonthcropDamagesDistrict']  ?>" class="count"><?php echo $data['lastMonthcropDamagesDistrict']  ?></h1>
        </div>
        <div class="report-5">
            காட்டில் நடக்கும் சட்டவிரோதமான விஷயங்கள்<h1 data-target="<?php echo $data['lastMonthIllegalThingDistrict']  ?>" class="count"><?php echo $data['lastMonthIllegalThingDistrict'] ?></h1>
        </div>

        <div class="report-6">
            பொலன்னறுவை மாவட்ட நிகழ்வுகள் சதவீதம் <h1 data-target="<?php echo $data['lastMonthElephantFenceDistrict'] ?>" class="count"><?php echo $data['lastMonthElephantFenceDistrict']  ?></h1>
        </div>
        <div class="update-col">
            <?php echo $data['districtName'] ?> District Incidents report Percentage<h1 data-target="<?php echo $data['districtIncidentPercentage'] . "%" ?> " class="count"><?php echo $data['districtIncidentPercentage'] . "%" ?></h1>
        </div>
    </div>


    <div class="main-update-col-3">
        <div class="last-week-1">
            கடந்த வாரம் <div class="last-week-number-1">
                <h1 data-target="<?php echo $data['lastWeekData']  ?>" class="count"><?php echo $data['lastWeekData']  ?></h1>
                <p> சம்பவங்கள் </p>
            </div>
        </div>
        <div class="last-Month-1">
            கடந்த மாதம் <div class="last-month-number-1">
                <h1 data-target="<?php echo $data['lastMonthData'] ?>" class="count"><?php echo $data['lastMonthData'] ?></h1>
                <p> சம்பவங்கள்</p>
            </div>
        </div>
        <div class="last-hour-1">
            <p> கடந்த</p>
            <h2>24 மணி நேரம்</h2>
            <div class="last-hour-number-1">
                <h1 data-target="<?php echo $data['last24HoursData'] ?>" class="count"><?php echo $data['last24HoursData'] ?></h1>
                <p>சம்பவங்கள்</p>
            </div>
            <h1></h1>
        </div>
    </div>
    <div class="map">
        <div class="header-map">
            சம்பவங்கள் அறிக்கை பகுதிகள்
        </div>
        <div class="map-area">
            <div id="map" style="width: 100%; height:100%; border-radius: 5px;"></div>

        </div>
    </div>
    <div class="province-report">
        <div class="linechart">
            <h3>நிகழ்வுகளைப் புகாரளிக்கவும் </h3>
            <div class="mychart1">
                <canvas id="myChart1"></canvas>
                <script>
                    let myChart1 = document.getElementById("myChart1").getContext('2d');
                    let data1 = [<?php echo intval($data['lastMonthWildElephantArrivalDistrict']) ?>, <?php echo intval($data['lastMonthWildAnimalArrivalDistrict']) ?>, <?php echo intval($data['lastMonthElephantFenceDistrict']) ?>, <?php echo intval($data['lastMonthcropDamagesDistrict']) ?>, <?php echo intval($data['lastMonthIllegalThingDistrict']) ?>, <?php echo intval($data['lastMonthWildAnimalDangerDistrict']) ?>]
                </script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->
            </div>
        </div>

    </div>
    </div>
    <div class="time-update">
        <h3> கடைசி மணிநேர அறிக்கையில் புதுப்பிக்கவும் </h3>
        <div class="chart3">
            <div class="mychart-1">
                <canvas id="myChart3"></canvas>
                <script>
                    let myChart3 = document.getElementById("myChart3").getContext('2d');
                    let data3 = [<?php echo intval($data['Incident12AMCount']) ?>, <?php echo intval($data['Incident01AMCount']) ?>, <?php echo intval($data['Incident02AMCount']) ?>, <?php echo intval($data['Incident03AMCount']) ?>, <?php echo intval($data['Incident04AMCount']) ?>, <?php echo intval($data['Incident05AMCount']) ?>, <?php echo intval($data['Incident06AMCount']) ?>, <?php echo intval($data['Incident07AMCount']) ?>, <?php echo intval($data['Incident08AMCount']) ?>, <?php echo intval($data['Incident09AMCount']) ?>, <?php echo intval($data['Incident10AMCount']) ?>, <?php echo intval($data['Incident11AMCount']) ?>, <?php echo intval($data['Incident12PMCount']) ?>, <?php echo intval($data['Incident01PMCount']) ?>, <?php echo intval($data['Incident02PMCount']) ?>, <?php echo intval($data['Incident03PMCount']) ?>, <?php echo intval($data['Incident04PMCount']) ?>, <?php echo intval($data['Incident05PMCount']) ?>, <?php echo intval($data['Incident06PMCount']) ?>, <?php echo intval($data['Incident07PMCount']) ?>, <?php echo intval($data['Incident08PMCount']) ?>, <?php echo intval($data['Incident09PMCount']) ?>, <?php echo intval($data['Incident10PMCount']) ?>, <?php echo intval($data['Incident11PMCount']) ?>];
                </script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->

            </div>
        </div>
    </div>
    <div class="monthly-update">
        <h3>கடந்த மாத அறிக்கையில் புதுப்பிக்கவும்</h3>
        <div class="chart4">
            <div class="mychart-1">
                <canvas id="myChart4"></canvas>
                <script>
                    let myChart4 = document.getElementById("myChart4").getContext('2d');

                    let data4 = [<?php echo intval($data['IncidentJanCount']) ?>, <?php echo intval($data['IncidentFebCount']) ?>, <?php echo intval($data['IncidentMarchCount']) ?>, <?php echo intval($data['IncidentAprilCount']) ?>, <?php echo intval($data['IncidentMayCount']) ?>, <?php echo intval($data['IncidentJuneCount']) ?>, <?php echo intval($data['IncidentJulyCount']) ?>, <?php echo intval($data['IncidentAugCount']) ?>, <?php echo intval($data['IncidentSepCount']) ?>, <?php echo intval($data['IncidentOctCount']) ?>, <?php echo intval($data['IncidentNovCount']) ?>, <?php echo intval($data['IncidentDecCount']) ?>];
                </script>



            </div>
        </div>

    </div>


    <div>

    </div>
    <script src="../Public/javascript/wildlifeofficer_dashboard.js"></script>
    <script>
        const counters = document.querySelectorAll(".count");
        const speed = 10;

        counters.forEach((counter) => {
            const updateCount = () => {
                const target = parseInt(+counter.getAttribute("data-target"));
                const count = parseInt(+counter.innerText);
                const increment = Math.trunc(target / speed);


                if (count < target) {
                    counter.innerText = count + increment;
                    setTimeout(updateCount, 1);
                } else {
                    count.innerText = target;
                }
            };
            updateCount();
        });
    </script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMap&v=weekly' async></script>
</body>

</html>