<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css" />
    <link rel="stylesheet" href="../Public/css/veterinarianViewIncidents.css" />

    <script src="../Public/Javascript/viewReport.js"></script>
    <script src="../Public/javascript/login.js"></script>
    <script src="../Public/javascript/wildlifeofficer.js"></script>
    <script src="../Public/javascript/admin.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script> -->
    <title>Report View</title>
</head>

<body>
    <header id="main">
        <img src="../Public/images/icon.png" alt="icon" id="icon" />
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul>
                <li id="home"><a href="../?lang=1">HOME</a></li>
                <li id="userPage"><a href="../veterinarian/?lang=1">USER PAGE</a></li>
                <li id="incidents"><a href="../veterinarian/viewIncidents?lang=1">INCIDENTS</a></li>
                <li id="notifications"><a href="../veterinarian/viewNotification?lang=1">NOTICE</a></li>
                <li id="dashboard"><a href="../veterinarian/viewDashboard?lang=1">DASHBOARD</a></li>
                <li>
                    <div class="dropdown-1" style="  padding-left:  300px ">
                        <button class="dropbtn-1">Language</button>
                        <div class="dropdown-content-1">
                            <?php
                            $count = 0;
                            echo "
                                <a href='?lang=1 '>English</a>
                                <a href='?lang=2 '>සිංහල</a>
                                <a href='?lang=3 '>தமிழ்</a> "
                            ?>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../veterinarian/viewProfile?lang=1">View Profile</a>
                        <a href="../user/logout?lang=1">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>



    <div class="container_3">
        <div class="row1" id="back">

            <div class="subcontainer_3-1">
                <h3 id="table-name">View Report Details</h3>
            </div>
            <div class="subcontainer_3-2">

                <div class="report_catagory">
                    <Form action="../veterinarian/filterUsingReportCatagory?lang=1" method="POST">
                        <select name="report_catagory" id="filter" onchange="filterFunction()">
                            <option class="group-1">Select The Report Catogary</option>

                            <option class="group-1">1.Elephants are in The Village</option>
                            <option class="group-2">
                                2.Other Wild Animals are in The Village
                            </option>
                            <option class="group-3">3.Breakdown of Elephant Fences</option>
                            <option class="group-3">4.Wild Animal is in Danger</option>
                            <option class="group-3">5.Crop Damages</option>
                            <option class="group-3">6.Illegal Things Happening</option>
                        </select>
                    </Form>
                </div>




                <div class="wrap">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="Search date here" id="myInput" onkeyup="myFunction()" />
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search">search</i>

                        </button>
                    </div>
                </div>
            </div>



            <div class="subcontainer_3-3" style="overflow-x: auto">
                <table id="myTable">
                    <tr class="firstRow">
                        <th>Reported Date</th>
                        <th>Report Number</th>
                        <th>Accepted Wildlifeofficer</th>

                        <th>Report Type</th>
                        <th>Place</th>
                        <th>Action</th>
                        <th></th>

                    </tr>

                    <?php


                    foreach ($data[0] as $row) {
                        $d = "";
                        $yes = 0;
                        foreach ($data[1] as $r) {
                            if ($r['incidentID'] == $row['incidentID']) {

                                if ($r['NIC'] == $_SESSION['NIC']) {

                                    $yes = 1;
                                }
                            }
                        }



                        $d = $row['Fname'] . " " . $row['Lname'];



                        if ($row['vetStatus'] == 'pending') {
                            $stat = "<a href='../veterinarian/trigerRequest?lang=1&stat=accept&incidentId={$row['incidentID']}'><button class='buttonAccept' id='acceptId' value='ACCEPT' name='accept'/>ACCEPT</button></a>";
                        } else {
                            if ($yes == 1) {
                                $stat = "<a href='../veterinarian/trigerRequest?lang=1&stat=cancel&incidentId={$row['incidentID']}'><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel'/>CANCEL</button></a>";
                            } else {
                                $stat = "<a href='../veterinarian/trigerRequest&lang=1?stat=cancel&incidentId={$row['incidentID']}'><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel' disabled />CANCEL</button></a>";
                            }
                        }


                        echo "<tr>
                                <td>" . $row['date'] . "</td>
                                <td>" . $row['incidentID'] . "</td>
  
                                <td>" . $d . "</td>
                                <td>" . $row['reporttype'] . "</td>
                                <td>" . $row['Place'] . "</td>
                                <td>" . $stat . "</td>
                                <td><a href='../veterinarian/viewIncidentDetails?name=" . $d . "&lang=1&index=" . $row['incidentID'] ."&acc={$yes}". "'><button type='submit' class='viewButton' id='view' onclick='' >
                                     VIEW
                                    </button></a></td>
                            </tr>";
                        $count += 1;
                    }
                    ?>









                </table>
            </div>
            <div class="subcontainer_3-1">



            </div>

        </div>
        <!-- <div></div> -->

</body>

</html>