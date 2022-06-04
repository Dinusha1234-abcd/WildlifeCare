<!DOCTYPE html>
<html lang="en">

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
    <header id="main" style="z-index: 1;">
        <img src="../Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul>
                <li id="home"><a href="../?lang=1">HOME</a></li>
                <li id="userPage"><a href="../wildlifeofficer/?lang=1">USER PAGE</a></li>
                <li id="incidents"><a href="../wildlifeofficer/viewIncidents?lang=1">INCIDENTS</a></li>
                <li id="notifications"><a href="../wildlifeofficer/viewNotification?lang=1">NOTICE</a></li>
                <li id="dashboard"><a href="../wildlifeofficer/viewDashboard?lang=1">DASHBOARD</a></li>
                <li>
                    <div class="dropdown-1" style="  padding-left:  300px ">
                        <button class="dropbtn-1">Language</button>
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
                        <a href="../wildlifeofficer/viewProfile?lang=1">View Profile</a>
                        <a href="../user/logout?lang=1">Logout</a>
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
                <img src="../Public/images/bell1.png" id="right" style=" font-weight: 600%;  font-weight: 602;margin-left: 23%;  ">&nbsp&nbsp
                <h3>You have new reported incident &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="View" name="submitAlert" id="submit">
                </h3>
            </form>
        </div> <?php  }
                ?>

    <!-- <div class="header-name"><h><pre  style="font-size: larger;font-style: normal; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Total in Sri Lanka                                                                                                                                                               LastModified 30/09/2021</pre></h> </div> -->
    <div class="first">
        Time Duration -3 Month<br>
        <?php


        echo "Today - " . date("d/m/Y") ?><br>

    </div>
    <div class="main-update-col-1">
        <div class="last-week">
            Last Week <div class="last-week-number">
                <h1 data-target="<?php echo $data['lastWeekData']  ?>" class="count"> <?php echo $data['lastWeekData']  ?></h1>
                <p> incidents </p>
            </div>
        </div>
        <div class="last-Month">
            Last Month
            <div class="last-month-number">
                <h1 data-target="<?php echo $data['lastMonthData']; ?>" class="count"><?php echo $data['lastMonthData']; ?></h1>
                <p> incidents</p>
            </div>
        </div>
        <div class="last-hour">
            <p>Last</p>
            <h2>24 hours</h2>
            <div class="last-hour-number">
                <h1 data-target="<?php echo $data['last24HoursData'] ?>" class="count"><?php echo $data['last24HoursData']  ?> </h1>
                <p>Incidents</p>
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
            Time Duration -1 Month <br>
            Last Modification <?php echo date("d/m/Y") ?>
        </div>
        <div class="date">
            <h2>Today</h2>
            <h3>
                <?php date_default_timezone_set('Asia/Kolkata');
                echo date('d F, Y') ?>
            </h3>
            <h2>
                Time
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
            Wildlife Officers <h1 data-target="<?php echo $data['wildlifeOfficer'] ?>" class="count"><?php echo $data['wildlifeOfficer'] ?></h1>
        </div>
        <div class="users-2">
            Grama Niladharis <h1 data-target="<?php echo $data['gramaNiladhari'] ?>" class="count"><?php
                                                                                                    echo $data['gramaNiladhari'] ?></h1>
        </div>
        <div class="users-3">
            Veterinarians <h1 data-target="<?php


                                            echo $data['veterinarian'] ?>" class="count"><?php


                                                                                            echo $data['veterinarian'] ?></h1>
        </div>
        <div class="users-4">
            Villagers <h1 data-target="<?php echo $data['villager'] ?>" class="count"><?php echo $data['villager'] ?></h1>
        </div>
        <div class="report-1">
            Wild Elephants Arrival <h1 data-target="<?php echo $data['lastMonthWildElephantArrivalDistrict']  ?>" class="count"><?php echo $data['lastMonthWildElephantArrivalDistrict']  ?></h1>
        </div>
        <div class="report-2">
            Wild Animals Danger <h1 data-target="<?php echo $data['lastMonthWildAnimalDangerDistrict'] ?>" class="count"><?php echo $data['lastMonthWildAnimalDangerDistrict'] ?></h1>
        </div>
        <div class="report-3">
            Wild Animals Arrival <h1 data-target="<?php echo $data['villager'] ?>" class="count"><?php echo $data['lastMonthWildAnimalArrivalDistrict']  ?></h1>
        </div>
        <div class="report-4">
            Crop Damages <h1 data-target="<?php echo $data['lastMonthcropDamagesDistrict']  ?>" class="count"><?php echo $data['lastMonthcropDamagesDistrict']  ?></h1>
        </div>
        <div class="report-5">
            Illegal Thing happening in the Forest<h1 data-target="<?php echo $data['lastMonthIllegalThingDistrict']  ?>" class="count"><?php echo $data['lastMonthIllegalThingDistrict'] ?></h1>
        </div>

        <div class="report-6">
            Breakdown of Elephant Fence <h1 data-target="<?php echo $data['lastMonthElephantFenceDistrict'] ?>" class="count"><?php echo $data['lastMonthElephantFenceDistrict']  ?></h1>
        </div>
        <div class="update-col">
            <?php echo $data['districtName'] ?> District Incidents report Percentage<h1 data-target="<?php echo $data['districtIncidentPercentage'] . "%" ?> " class="count"><?php echo $data['districtIncidentPercentage'] . "%" ?></h1>
        </div>
    </div>


    <div class="main-update-col-3">
        <div class="last-week-1">
            Last Week <div class="last-week-number-1">
                <h1 data-target="<?php echo $data['lastWeekData']  ?>" class="count"><?php echo $data['lastWeekData']  ?></h1>
                <p> incidents </p>
            </div>
        </div>
        <div class="last-Month-1">
            Last Month <div class="last-month-number-1">
                <h1 data-target="<?php echo $data['lastMonthData'] ?>" class="count"><?php echo $data['lastMonthData'] ?></h1>
                <p> incidents</p>
            </div>
        </div>
        <div class="last-hour-1">
            <p>Last</p>
            <h2>24 hours</h2>
            <div class="last-hour-number-1">
                <h1 data-target="<?php echo $data['last24HoursData'] ?>" class="count"><?php echo $data['last24HoursData'] ?></h1>
                <p>Incidents</p>
            </div>
            <h1></h1>
        </div>
    </div>
    <div class="map">
        <div class="header-map">
            Incidents Report Areas
        </div>
        <div class="map-area">
            <div id="map" style="width: 100%; height:100%; border-radius: 5px;"></div>

        </div>
    </div>
    <div class="province-report">
        <div class="linechart">
            <h3>Report Incidents </h3>
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
        <h3>Update In last-hour Report</h3>
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
        <h3>Update In last-Month Report</h3>
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