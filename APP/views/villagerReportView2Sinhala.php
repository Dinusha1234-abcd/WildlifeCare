<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/reportView-page.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/reportViewPag.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">

    <link rel="stylesheet" href="../Public/css/ratings.css">
    <script src="../Public/Javascript/login1.js"></script>
    <script src="../Public/Javascript/viewReport.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <title>වාර්තාව බැලීම</title>
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
                <li id="dashboard_1"   ><a href="../user/viewpage?lang=2" >මුල් පුවරුව</a></li>
                <li id="report_2" style="   padding-right:20px ; right:345px  "><a href="../incident/index?lang=2"> වර්තා කිරීම</a></li>
                <li id="special_1"><a href="../villager/viewSpecialNotice?lang=2">විශේෂ දැන්වීම</a></li> 
                   <div class="dropdown-1" style="  padding-left:  300px ">
                    <button style="margin-top:  -50px;" class="dropbtn-1" >භාෂාව</button>
                    <div class="dropdown-content-1" >
                        <a href="?type=1&page=1&lang=1">English</a>
                        <a href="?type=1&page=1&lang=2">සිංහල</a> 
                        <a href="?type=1&page=1&lang=3">தமிழ்</a>  
                    </div>
                  </div> 
                    <span class="dot" style="position:inherit; margin-right:10px;  margin-top:  10px;"> <img onclick="myFunction_3()" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="../user/editprofile?lang=1">View Profile</a>
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
                    <h3>වනජීවී අලි ඔබගේ ලියාපදිංචි ගම්මානයට පැමිණේ &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3>ඔබට නව දැනුම්දීමක් ඇත (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_GET['status'])) {
            ?>

                <div id="popupmessagerate">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/thankyou.png" id="alert">
                        <h3>ශ්‍රේණිගත කිරීම්, අදහස් සහ යෝජනා සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                    <h3>වනජීවී අලි ඔබගේ ලියාපදිංචි ගම්මානයට පැමිණේ &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_GET['status'])) {
            ?>

                <div id="popupmessageratelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/thankyou.png" id="alert">
                        <h3> ශ්‍රේණිගත කිරීම්, අදහස් සහ යෝජනා සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } elseif ($this->notification > 0) {  ?>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">
                    <h3>ඔබට නව දැනුම්දීමක් ඇත (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_GET['status'])) {
            ?>

                <div id="popupmessageratelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/thankyou.png" id="alert">
                        <h3>ශ්‍රේණිගත කිරීම්, අදහස් සහ යෝජනා සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } else {

        ?> <?php if (isset($_GET['status'])) {
        ?>

                <div id="popupmessageratefirst">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/thankyou.png" id="alert">&nbsp&nbsp
                        <h3> ශ්‍රේණිගත කිරීම්, අදහස් සහ යෝජනා සාර්ථකයි &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?> <?php }
    } ?>
    <?php
    if (isset($_GET['ratingstatus'])) {
        if ($_GET['ratingstatus'] == 1) {
            foreach ($this->data3 as $row) {
                if (($row['status'] == 'success') && $row['reporttype'] != 'Crop Damages' && $_GET['reportNo'] == $row['incidentID']) {
    ?>
                    ?>

                    <div id="rating" style="padding: 10px;  ">
                        <h2><b>වැඩ පිළිබඳ ශ්‍රේණිගත කිරීම් සහ අදහස් </b> <a href="?type=2&lang=1&page=<?php echo $_GET['ratingstatus'] ?>&&reportNo=346&ratingstatus=0"><img src="../Public/images/close.png" class="viewcls"></a></h2>
                        <label>ශ්රේණිගත කිරීම</label><br><br>
                        <form action="?lang=1&report=1&page=<?php echo $_GET['page'] ?>&type=2&reportNo=<?php echo $_GET['reportNo'] ?>&status=1" method="post">
                            <div class="stars">
                                <input type="radio" name="stars" value="1" style="accent-color: green;" <?php if ($row['stars'] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                <label for="1star">☆</label>
                                <input type="radio" name="stars" value="2" style="accent-color: green;" <?php if ($row['stars'] == 100) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                <label for="2star">☆☆</label>
                                <input type="radio" name="stars" value="3" style="accent-color: green;" <?php if ($row['stars'] == 3) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                <label for="3star">☆☆☆</label>
                                <input type="radio" name="stars" value="4" style="accent-color: green;" <?php if ($row['stars'] == 4) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                <label for="4star">☆☆☆☆</label>
                                <input type="radio" name="stars" value="5" style="accent-color: green;" <?php if ($row['stars'] == 5) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                <label for="5star">☆☆☆☆☆</label>
                            </div><br>
                            <label for="comments">අදහස්</label><br><br>
                            <textarea class="text" rows="4" name="comments"> <?php echo $row['comments'] ?> </textarea><br>
                            <input type="submit" value="ඉදිරිපත් කරන්න" name="submitrating" id="submitbutton">
                        </form>

                    </div>
    <?php
                }
            }
        }
    }

    ?>
    </div>

    <div class="container_3">
        <div class="subcontainer_3-1">
            <h3 id="table-name">
            වාර්තාව බැලීම
            </h3>
        </div>
        <div class="navigatereport">
        <a href="?type=1&page=1&lang=2" id="allreport"   >වාර්තාව</a>
                <a href="?type=2&lang=2&page=1" id="myreportaccept" style=" background-color: rgb(168, 175, 168); color : black;" >සාර්ථක වාර්තාව</a>
                <a href="?type=3&page=1&lang=2" id="myreportpending" >වාර්තාව පොරොත්තුවෙන්</a>
                <a href="?type=4&page=1&lang=2" id="myreportpendingCrop" >වගා හානි වාර්තාව  </a>

        </div>
        <div class="subcontainer_3-3">
            <form action="?type=<?php echo $_GET['type'] ?>&lang=1&page=<?php echo $_GET['page'] ?>&action=1" class="search-container" method="POST">
                <lable id="text-search-bar">වාර්තා අංකය</lable>
                <input type="text" placeholder="සෙවීම" name="incidentId">
                <input type="submit" value="සෙවීම" class="search-btn" name="submit">
            </form>

            <?php if (isset($_POST['submit'])) {   ?>
                <?php $data = $this->data1 ?>
                <table class="table">
                    <tr class="header-table">
                        <th>දිනය</th>
                        <th>වාර්තා අංකය</th>
                        <th>WID</th>
                        <th>වනජීවී නිලධාරියාගේ නම</th>
                        <th>ස්ථානය</th>
                        <th>කාලය</th>
                        <th>වාර්තා වර්ගය</th>
                        <th>කටයුතු</th>
                    </tr>
                    <tr><?php
                        $villagerNic = $_SESSION['NIC'];
                        ?>
                        <?php foreach ($this->dataAll as $row) {
                            if (($row['status'] == 'success') &&  $row['incidentID'] == $_POST['incidentId']) { ?>
                                <td id="date"><?php echo $row['date']; ?> </td>
                                <td id="incidentID"><?php echo $row['incidentID'] ?></td>
                                <td id="Place"><?php echo "11111" ?></td>
                                <td id="time_in"> <?php echo "Namal Silva" ?></td>
                                <td id="Place"><?php echo $row['Place'] ?></td>
                                <td id="time_in"> <?php echo $row['time_in'] ?></td>
                                <td id="reporttype"><?php echo $row['reporttype'] ?></td>
                                <script>
                                    var incidentID = document.getElementById('incidentID')
                                </script>
                                <td id="view">
                                    <a href="../incident/viewReportpage?type=2&&lang=2&reportNo=<?php echo $row['incidentID'] ?>&page=<?php echo $_GET['page'] ?>"><img src="../Public/images/view.png" class="view"></a>
                                    <a href="../incident/viewReport?type=2&lang=2&page=1&&reportNo=<?php echo $row['incidentID'] ?>&ratingstatus=1"><img src="../Public/images/rating.png" class="view"></a>
                                </td>

                    </tr>
            <?php }
                        } ?>

                </table>
            <?php } else {   ?>
                <?php $data = $this->data1 ?>
                <table class="table">
                    <tr class="header-table">
                         <th>දිනය</th>
                        <th>වාර්තා අංකය</th>
                        <th>WID</th>
                        <th>වනජීවී නිලධාරියාගේ නම</th>
                        <th>ස්ථානය</th>
                        <th>කාලය</th>
                        <th>වාර්තා වර්ගය</th>
                        <th>කටයුතු</th>
                    </tr>
                    <tr>
                        <?php foreach ($this->data3 as $row) {
                            if (($row['status'] == 'success') && $row['reporttype'] != 'Crop Damages') { ?>
                                <td id="date"><?php echo $row['date']; ?> </td>
                                <td id="incidentID"><?php echo $row['incidentID'] ?></td>
                                <td id="Place"><?php echo "11111" ?></td>
                                <td id="time_in"> <?php echo "Namal Silva" ?></td>
                                <td id="Place"><?php echo $row['Place'] ?></td>
                                <td id="time_in"> <?php echo $row['time_in'] ?></td>
                                <td id="reporttype"><?php echo $row['reporttype'] ?></td>
                                <script>
                                    var incidentID = document.getElementById('incidentID')
                                </script>
                                <td id="view">
                                    <a href="../incident/viewReportpage?type=2&&lang=2&reportNo=<?php echo $row['incidentID'] ?>&page=<?php echo $_GET['page'] ?>"><img src="../Public/images/view.png" class="view"></a>
                                    <a href="../incident/viewReport?type=2&lang=1&page=2&&reportNo=<?php echo $row['incidentID'] ?>&ratingstatus=1"><img src="../Public/images/rating.png" class="view"></a>

                                </td>
                    </tr>
            <?php }
                        } ?>
                </table>
            <?php } ?>
        </div>
    </div>
    <?php if (!isset($_GET['action'])) { ?>
        <div class="subcontainer_3-4">
            <a id="first" href="?type=2&lang=2&page=1">පළමු</a>
            <?php if ($_GET['page'] <= 1) { ?>
                <a>කලින්</a>
            <?php } else { ?>
                <a id="previous" href="?type=2&lang=2&page=<?php echo $_GET['page'] - 1 ?>">කලින්</a> <?php } ?>
            <?php if ($_GET['page'] == $this->lastpage) { ?>
                <li id="next"><a>කලින්</a>
                <?php } else { ?>
                    <a id="next" href="?type=2&lang=2&page=<?php echo $_GET['page'] + 1 ?>">ඊළඟ</a> <?php } ?>
                <a id="last" href="?type=2&lang=2&page=<?php echo $this->lastpage ?>">Last</a>
                </li>
        </div>
    <?php } ?>
</body>

</html>