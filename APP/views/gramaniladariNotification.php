<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Public/css/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/Notice1.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
   <link rel="stylesheet" href="../Public/css/notification.css">
 
    <script src="../Public/Javascript/login1.js"></script>

    <title>Notification</title>
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
            <li id="home_2"><a href="../">Home</a></li>
                <li id="dashboard_1"   ><a href="../user/viewpage?lang=1" >Main Menu</a></li>
                <li id="report_2"  ><a href="../incident/index?lang=1">Report Incidents</a></li>
                <li id="special_1"><a href="../user/viewSpecialNotice?lang=1">SpecialNotice </a></li> 
                   <div class="dropdown-1">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                    <a href="?lang=1">English</a>
                        <a href="?lang=2">සිංහල</a> 
                        <a href="?lang=3">தமிழ்</a>
                    </div>
                  </div> 
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="../gramaniladari/editprofile?lang=1">View Profile</a> 
                    <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    if (isset($this->status) && isset($this->notification)) {
        if ($this->status  == "notview"&&$this->notification > 0) {
    ?>

            <div id="messagealert">
                <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/alertIcon.png" id="alert">
                    <h3>Wildlife Elephants Come In to Your Registered Village &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>
       <?php
    
    }
     
    ?> <?php } 
    ?>
    <div class="container-1">
        <h1>Notification</h1>
        <div class="container-2">  
            <?php foreach ($this->notificationData as $row) {
                            if ( $row['status'] !='pending' ) { ?>
                                <div class="container-2">
                                <h2>
                                 <?php echo $row['subject'] ?>   
                                </h2>
                                <h3 style="float:right"> </h3>
                                <div class="container-sub-1">
                                    <p>
                                        Dear Villager , <br>
                                       <?php echo  $row['description'] ?>
                                    </p>
                                </div>
                            </div>     
    <?php }} ?>
                        </div>
</body>
</html>