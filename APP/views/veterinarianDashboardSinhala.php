<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css">
    <link rel="stylesheet" href="../Public/css/veterinarianDashboard.css">
    <script src="../Public/Javascript/login.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="../Public/javascript/admin.js"></script>
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

                <li id="homeSinhala"><a href="../?lang=2">මුල් පිටුව</a></li>
                <li id="userPageSinhala"><a href="../veterinarian/?lang=2"> &nbsp; පරිශීලක පිටුව </a></li>
                <li id="incidentsSinhala"><a href="../veterinarian/viewIncidents?lang=2"> &emsp; වාර්තා වූ සිදුවීම්</a></li>
                <li id="notificationsSinhala"><a href="../veterinarian/viewNotification?lang=2">දැනුම්දීම්</a></li>
                <li id="dashboardSinhala"><a href="../veterinarian/viewDashboard?lang=2">දත්ත පුවරුව</a></li>
                <li>
                    <div class="dropdown-1" style="  padding-left:  300px ">
                        <button class="dropbtn-1">භාෂාව</button>
                        <div class="dropdown-content-1">
                            <a href="?lang=1">English</a>
                            <a href="?lang=2">සිංහල</a>
                            <a href="?lang=3">தமிழ்</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_3()" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../veterinarian/viewProfile?lang=2">පරිශීලක පැතිකඩ</a>
                        <a href="../user/logout?lang=2">ඉවත් වීම</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="first">
        කාලය - මාස 3<br>
        <?php


        echo "අද - " . date("d/m/Y") ?><br>

    </div>
    <div class="main-update-col-1">
        <div class="last-week">
            ගිය සතිය <div class="last-week-number">
                <h1 data-target="<?php echo $data['lastWeekData']  ?>" class="count"> <?php echo $data['lastWeekData']  ?></h1>
                <p> සිදුවීම්</p>
            </div>
        </div>
        <div class="last-Month">
            පසුගිය මාසයේ
            <div class="last-month-number">
                <h1 data-target="<?php echo $data['lastMonthData']; ?>" class="count"><?php echo $data['lastMonthData']; ?></h1>
                <p>සිදුවීම්</p>
            </div>
        </div>
        <div class="last-hour">
            <p>පසුගිය</p>
            <h2>පැය 24</h2>
            <div class="last-hour-number">
                <h1 data-target="<?php echo $data['last24HoursData'] ?>" class="count"><?php echo $data['last24HoursData']  ?> </h1>
                <p>සිදුවීම්</p>
            </div>
            <h1></h1>
        </div>
    </div>
    <div class="main-update-col-2">
        <div class="linechartmain">

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
            කාලය - මාස 1 <br>
            අවසාන වෙනස් කිරීම <?php echo date("d/m/Y") ?>
        </div>
        <div class="date">
            <h2>අද</h2>
            <h3>
                <?php date_default_timezone_set('Asia/Kolkata');
                echo date('d F, Y') ?>
            </h3>
            <h2>
                වේලාව
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



            <?php echo $data['district'][0]['address'] ?> දිස්ත්රික්කය</h2>
    </div>
    <div class="district-report">
        <div class="users-1">
            වනජීවී නිලධාරීන් <h1 data-target="<?php echo $data['wildlifeOfficer'] ?>" class="count"><?php echo $data['wildlifeOfficer'] ?></h1>
        </div>
        <div class="users-2">
            ග්රාම නිලධාරී <h1 data-target="<?php echo $data['gramaNiladhari'] ?>" class="count"><?php
                                                                                                echo $data['gramaNiladhari'] ?></h1>
        </div>
        <div class="users-3">
            පශු වෛද්යවරුන් <h1 data-target="<?php


                                            echo $data['veterinarian'] ?>" class="count"><?php


                                                                                            echo $data['veterinarian'] ?></h1>
        </div>
        <div class="users-4">
            ගම්වැසියන් <h1 data-target="<?php echo $data['villager'] ?>" class="count"><?php echo $data['villager'] ?></h1>
        </div>
        <div class="report-1">
            වල් අලි පැමිණීම <h1 data-target="<?php echo $data['lastMonthWildElephantArrivalDistrict']  ?>" class="count"><?php echo $data['lastMonthWildElephantArrivalDistrict']  ?></h1>
        </div>
        <div class="report-2">
            වන සතුන්ගේ අනතුර <h1 data-target="<?php echo $data['lastMonthWildAnimalDangerDistrict'] ?>" class="count"><?php echo $data['lastMonthWildAnimalDangerDistrict'] ?></h1>
        </div>
        <div class="report-3">
            වන සතුන්ගේ පැමිණීම <h1 data-target="<?php echo $data['villager'] ?>" class="count"><?php echo $data['lastMonthWildAnimalArrivalDistrict']  ?></h1>
        </div>
        <div class="report-4">
            වගා හානි<h1 data-target="<?php echo $data['lastMonthcropDamagesDistrict']  ?>" class="count"><?php echo $data['lastMonthcropDamagesDistrict']  ?></h1>
        </div>
        <div class="report-5">
            Iවනාන්තරයේ සිදු වන නීති විරෝධී දේ<h1 data-target="<?php echo $data['lastMonthIllegalThingDistrict']  ?>" class="count"><?php echo $data['lastMonthIllegalThingDistrict'] ?></h1>
        </div>

        <div class="report-6">
            අලි වැට කැඩීම <h1 data-target="<?php echo $data['lastMonthElephantFenceDistrict'] ?>" class="count"><?php echo $data['lastMonthElephantFenceDistrict']  ?></h1>
        </div>
        <div class="update-col">
            <?php echo $data['districtName'] ?> දිස්ත්රික් සිදුවීම් වාර්තා ප්රතිශතය<h1 data-target="<?php echo $data['districtIncidentPercentage'] . "%" ?> " class="count"><?php echo $data['districtIncidentPercentage'] . "%" ?></h1>
        </div>
    </div>


    <div class="main-update-col-3">
        <div class="last-week-1">
            ගිය සතිය <div class="last-week-number-1">
                <h1 data-target="<?php echo $data['lastWeekData']  ?>" class="count"><?php echo $data['lastWeekData']  ?></h1>
                <p> සිදුවීම්</p>
            </div>
        </div>
        <div class="last-Month-1">
            පසුගිය මාසයේ <div class="last-month-number-1">
                <h1 data-target="<?php echo $data['lastMonthData'] ?>" class="count"><?php echo $data['lastMonthData'] ?></h1>
                <p> සිදුවීම්</p>
            </div>
        </div>
        <div class="last-hour-1">
            <p>පසුගිය</p>
            <h2>පැය 24</h2>
            <div class="last-hour-number-1">
                <h1 data-target="<?php echo $data['last24HoursData'] ?>" class="count"><?php echo $data['last24HoursData'] ?></h1>
                <p>සිදුවීම්</p>
            </div>
            <h1></h1>
        </div>
    </div>
    <div class="map">
        <div class="header-map">
            සිදුවීම් වාර්තා කරන ප්‍රදේශ
        </div>
        <div class="map-area">
            <div id="map" style="width: 100%; height:100%; border-radius: 5px;"></div>

        </div>
    </div>
    <div class="province-report">
        <div class="linechart">
            <h3>වාර්තා වූ සිදුවීම්</h3>
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
        <h3>පසුගිය පැය වාර්තාවේ යාවත්කාලීන</h3>
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
        <h3>පසුගිය මාසයේ වාර්තාවේ යාවත්කාලීන</h3>
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