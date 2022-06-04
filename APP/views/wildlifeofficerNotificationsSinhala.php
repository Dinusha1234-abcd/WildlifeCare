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
    <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficerNotifications.css">
    <link rel="stylesheet" href="../Public/css/notification.css" type="text/css">
    <script src="../Public/Javascript/login.js"></script>
    <script src="../Public/javascript/admin.js"></script>
    <title>Notifications</title>
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
                <li id="incidentsSinhala"><a href="../wildlifeofficer/viewIncidents?lang=2"> &emsp;වාර්තා වූ සිදුවීම්</a></li>
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
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
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
    <div class="container-1">
        <h1>දැනුම්දීම්</h1>
        <?php foreach ($data as $row) {
            echo "<div class='container-2'><h2>"
                . $row['district'] . "-" . $row['gn_division'] . "-" . $row['village'] .
                "</h2>
                <h3 style='float:right'>Date:" . $row['date'] . "Time:" . $row['time'] . "</h3>
                <div class='container-sub-1'>
                <p> Alert! <br>
                <p>" . $row['description'] . "</p>
                <br>
                </p>
            </div>
                </div>";
        } ?>
        <div class="container-3">
            <a href="../wildlifeofficer/viewNotificationAll?lang=2">සියල්ල බලන්න</a>
        </div>
    </div>
</body>

</html>