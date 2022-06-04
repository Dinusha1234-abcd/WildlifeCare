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
                <li id="homeTamil"><a href="../?lang=3">முகப்பு பக்கம்</a></li>
                <li id="userPageTamil"><a href="../veterinarian/?lang=3"> &nbsp;பயனர் பக்கம் </a></li>
                <li id="incidentsTamil"><a href="../veterinarian/viewIncidents?lang=3"> &emsp; சம்பவங்கள்</a></li>
                <li id="notificationsTamil"><a href="../veterinarian/viewNotification?lang=3">அறிவிப்புகள்</a></li>
                <li id="dashboardTamil"><a href="../veterinarian/viewDashboard?lang=3">தரவு பலகை</a></li>
                <li>
                    <div class="dropdown-1" style="  padding-left:  300px ">
                        <button class="dropbtn-1">மொழி</button>
                        <div class="dropdown-content-1">
                            <?php
                            $count = 0;
                            echo "
                                <a href='?lang=1&index=" . $count . "'>English</a>
                                <a href='?lang=2&index=" . $count .  "'>සිංහල</a>
                                <a href='?lang=3&index=" . $count . "'>தமிழ்</a> "
                            ?>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../veterinarian/viewProfile?lang=3">பயனர் சுயவிவரம்</a>
                        <a href="../user/logout?lang=3">வெளியேறு</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container_3">
        <div class="row1" id="back">

            <div class="subcontainer_3-1">
                <h3 id="table-name">அறிக்கை விவரங்கள்</h3>
            </div>
            <div class="subcontainer_3-2">

                <div class="report_catagory">
                    <Form action="../veterinarian/filterUsingReportCatagory" method="POST">
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
                        <input type="text" class="searchTerm" placeholder="அறிக்கை எண்ணை இங்கே தேடுங்கள்" id="myInput" onkeyup="myFunction()" />
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search">search</i>

                        </button>
                    </div>
                </div>
            </div>



            <div class="subcontainer_3-3" style="overflow-x: auto">
                <table id="myTable">
                    <tr class="firstRow">
                        <th>அறிவிக்கப்பட்ட தேதி</th>
                        <th>அறிக்கை எண்</th>
                        <th>வனவிலங்கு அதிகாரி</th>

                        <th>அறிக்கை வகை</th>
                        <th>இடம்</th>
                        <th>நடவடிக்கை</th>
                        <td></td>
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
                            $stat = "<form method='POST' action='../veterinarian/trigerRequest?lang=3'><input type='text' style='display:none' name='acc' value=" . $row['incidentID'] . "><button class='buttonAccept' id='acceptId' value='ACCEPT' name='accept'/>ACCEPT</button></form>";
                        } else {
                            if ($yes == 1) {
                                $stat = "<form method='POST' action='../veterinarian/trigerRequest?lang=3'><input type='text' style='display:none'  name='can' value=" . $row['incidentID'] . "><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel'/>CANCEL</button></form>";
                            } else {
                                $stat = "<form method='POST' action='../veterinarian/trigerRequest?lang=3'><input type='text' style='display:none'  name='can' value=" . $row['incidentID'] . "><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel' disabled />CANCEL</button></form>";
                            }
                        }


                        echo "<tr>
            <td>" . $row['date'] . "</td>
            <td>" . $row['incidentID'] . "</td>

            <td>" . $d . "</td>
            <td>" . $row['reporttype'] . "</td>
            <td>" . $row['Place'] . "</td>
            <td>" . $stat . "</td>
            <td><button type='submit' class='viewButton' id='view' onclick='' >
                 <a href='../veterinarian/viewIncidentDetails?name=" . $d . "&lang=3&index=" . $row['incidentID'] . "'>VIEW</a>
                </button></td>
        </tr>";
                        $count += 1;
                    }
                    ?>









                </table>
            </div>
            <div class="subcontainer_3-1">



            </div>

        </div>


</body>

</html>