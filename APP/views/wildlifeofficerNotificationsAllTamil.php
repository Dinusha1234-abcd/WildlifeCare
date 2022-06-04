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
    <script src="../Public/javascript/admin.js"></script>
    <script src="../Public/Javascript/login.js"></script>
    <link rel="stylesheet" href="../Public/css/notification.css">

    <title>Notice</title>
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
    <div class="container-1">
        <h1>அறிவிப்புகள்</h1>
        <?php foreach ($data as $row) {
            echo "<div class='container-2'><h2>"
                . $row['district'] . "-" . $row['gn_division'] . "-" . $row['village'] .
                "</h2>
                <h3 style='float:right'>தேதி:" . $row['date'] . "நேரம்:" . $row['time'] . "</h3>
                <div class='container-sub-1'>
                <p> Alert! <br>
                <p>" . $row['description'] . "</p>
                <br>
                </p>
            </div>
                </div>";
        } ?>
        <div class="container-3">
            <a href="../wildlifeofficer/viewNotification?lang=3">குறைவாக பார்க்க</a>
        </div>
    </div>
</body>

</html>