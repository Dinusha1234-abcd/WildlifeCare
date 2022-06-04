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
    <link rel="stylesheet" href="../Public/css/wildlifeofficerViewProfile.css">
    <link rel="stylesheet" href="../Public/css/notification.css" type="text/css">
    <script src="../Public/Javascript/login.js"></script>
    <!-- <script src="../Public/Javascript/viewReport.js"></script> -->
    <script src="../Public/javascript/wildlifeofficer.js"></script>
    <script src="../Public/javascript/admin.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script> -->
    <title>User Profile</title>
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

                <li id="homeSinhala"><a href="../?lang=2">මුල් පිටුව</a></li>
                <li id="userPageSinhala"><a href="../wildlifeofficer/?lang=2"> &nbsp; පරිශීලක පිටුව </a></li>
                <li id="incidentsSinhala"><a href="../wildlifeofficer/viewIncidents?lang=2"> &emsp; වාර්තා වූ සිදුවීම්</a></li>
                <li id="notificationsSinhala"><a href="../wildlifeofficer/viewNotification?lang=2">දැනුම්දීම්</a></li>
                <li id="dashboardSinhala"><a href="../wildlifeofficer/viewDashboard?lang=2">දත්ත පුවරුව</a></li>
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
                        <a href="../wildlifeofficer/viewProfile?lang=2">පරිශීලක පැතිකඩ</a>
                        <a href="../user/logout?lang=2">ඉවත් වීම</a>
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
                <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                <h3>ඔබට වාර්තාවූ නව සිදුවීමක් ඇත &nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="View" name="submitAlert" id="submit">
                </h3>
            </form>
        </div>
    <?php  }
    ?>

    </div>

    <body>
        <div class="contanier_2">
            <div class="row1">
                <?php if (isset($data[0]['message'])) {
                    echo $data[0]['message'];
                    unset($data[0]['message']);
                }


                ?>
            </div>

            <div class="contanier_2-1">
                <div class="view_profile">
                    <h3><a href="#">පරිශීලක පැතිකඩ</a></h3>
                </div>
                <div class="edit_profile">
                    <h3><a href="../wildlifeofficer/editProfile?lang=2">පරිශීලක පැතිකඩ යාවත්කාලීන කිරීම</a></h3>
                </div>
            </div>
            <div>

                <img src="../Public/images/user_icon4-01.png" class="image">
                <div class="row1"><?php echo $data[0]["Fname"] . " " . $data[0]["Lname"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">මුල් නම</div>
                <div class="col_2"><?php echo $data[0]["Fname"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">අවසන් නම</div>
                <div class="col_2"><?php echo $data[0]["Lname"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">ජාතික හැඳුනුම්පත</div>
                <div class="col_2"><?php echo $data[0]["NIC"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">ස්ත්රී පුරුෂ භාවය</div>
                <div class="col_2"><?php
                                    if ($data[0]['gender'] == 'F') {
                                        echo "Female";
                                    } else {
                                        echo "Male";
                                    }
                                    ?></div>
            </div>
            <div class="row">
                <div class="col_1">උපන්දිනය</div>
                <div class="col_2"><?php echo $data[0]["BOD"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">නිවසේ ලිපිනය</div>
                <div class="col_2"><?php echo $data[0]["Address"]  ?></div>
            </div>
            <div class="row">
                <div class="col_1">විද්‍යුත් තැපෑල</div>
                <div class="col_2"><?php echo $data[0]["email"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">කාර්යාල ලිපිනය</div>
                <div class="col_2"><?php echo $data[1]["address"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">දුරකථන අංකය</div>
                <div class="col_2"><?php echo $data[0]["mobileNo"] ?></div>
            </div>




            <div class="last">

            </div>

            </form>

        </div>
        </div>
    </body>

</html>