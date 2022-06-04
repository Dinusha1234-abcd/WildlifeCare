<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../Public/css/reportPage.css">
     <link rel="stylesheet" href="../Public/css/header.css">
     <link rel="stylesheet" href="../Public/css/alert.css">
     <link rel="stylesheet" href="../Public/css/notification.css">

     <script src="../Public/Javascript/login1.js"></script>
     <title>Report Page</title>
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
                 <li id="home_2"><a href="../?lang=3">வீடு</a></li>
                 <li id="dashboard_1"><a href="../user/viewpage?lang=3">முதன்மை </a></li>
                 <li id="report_2" style=" background-color: rgb(168, 175, 168);"><a href="../incident/index?lang=3">சம்பவம் குறித்  </a></li>
                 <li id="special_1"><a href="../villager/viewSpecialNotice?lang=3">கவனிக்கவு </a></li>
                 <div class="dropdown-1" style="  padding-left:  300px ">
                     <button class="dropbtn-1">மொழி</button>
                     <div class="dropdown-content-1">
                         <a href="../incident/index?lang=1">English</a>
                         <a href="../incident/index?lang=2">සිංහල</a>
                         <a href="../incident/index?lang=3">தமிழ்</a>
                     </div>
                 </div>
                 <li class="dropdown">
                     <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                     <div id="myDropdown" class="dropdown-content">
                         <a href="../villager/editprofile?lang=3">சுயவிவரம்</a>
                         <a href="../user/logout">Logout</a>
                     </div>
                 </li>
             </ul>
         </nav>
     </header>
     <?php
    if (isset($this->status) && isset($this->notification)) {
        if ($this->status  == "view" && $this->notification > 0) {
    ?>

            <div id="messagealert">
                <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/alertIcon.png" id="alert">
                    <h3 style="font-size: 11px;">உங்கள் பதிவு செய்யப்பட்ட கிராமத்திற்கு வனவிலங்கு யானைகள் வருகின்றன &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=3&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3 style="font-size: 15px;">உங்களிடம் புதிய அறிவிப்பு உள்ளது (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessage">
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3 style="font-size: 15px; margin-left:110px" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>

            <?php }  ?>
        <?php

        } else if ($this->status  == "notview") {

        ?>

            <div id="messagealert1">
                <form action="?lang=3&report=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/alertIcon.png" id="alert">
                    <h3 style="font-size: 11px;">உங்கள் பதிவு செய்யப்பட்ட கிராமத்திற்கு வனவிலங்கு யானைகள் வருகின்றன &nbsp&nbsp
                        <input type="submit" value="Ok" name="submitAlert" id="submit1">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3 style="font-size: 15px;" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } elseif ($this->notification > 0) {  ?>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=3&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3 style="font-size: 15px;">உங்களிடம் புதிய அறிவிப்பு உள்ளது (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3 style="font-size: 15px;" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } else {

        ?> <?php if (isset($_POST['Submit'])) {
        ?>

                <div id="popupmessagefirst">
                    <form action="?lang=3&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3 style="font-size: 155px;font-size:15px" >உங்கள் அறிக்கை நிகழ்வு வெற்றிகரமாக சமர்ப்பிக்கப்பட்டது &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?> <?php }
    }
        ?>
     <div class="report-name" style="display:none">
         <h1>Report by Clicking on The Icon Below</h1>
     </div>

     <div class="container-1">

         <button class="report-1-1"><a index="rep" class="report-1" href="./setIncident?lang=3&report=1"> <span class="dot1"><img class="report2" src="../Public/images/report-1.png"></span></br>
                 <h1> யானைகள் கிராமத்தில் உள்ளன </h1>
             </a>
         </button>
         <button class="report-2-2" href=""><a index="rep" class="report-2" href="./setIncident?lang=3&report=2"><span class="dot2"><img class="report2" src="../Public/images/report-2.png"></span>
                 <h1>மற்ற காட்டு விலங்குகள் கிராமத்தில் உள்ளன</h1>
             </a>
         </button>
         <button class="report-3-3" href=""><a index="rep" class="report-3" href="./setIncident?lang=3&report=3"><span class="dot3"><img class="report3" src="../Public/images/report-3.png"></span>
                 <h1>யானை வேலிகள் உடைப்பு</h1>
             </a>
         </button>
     </div>

     <div class="container-2">
         <button class="report-4-4" href=""><a class="report-4" href="./setIncident?lang=3&report=4"><span class="dot4"><img class="report4" src="../Public/images/report-4.png"></span>
                 <h1> பயிர் சேதங்கள் </h1>
             </a>
         </button>
         <button class="report-5-5" href=""><a class="report-5" href="./setincident?lang=3&report=5"><span class="dot5"><img class="report5" src="../Public/images/report-5.png"></span>
                 <h1>காட்டு விலங்கு ஆபத்தில் உள்ளது</h1>
             </a>
         </button>
         <button class="report-6-6" href=""><a class="report-6" href="./setIncident?lang=3&report=6"><span class="dot5"><img class="report5" src="../Public/images/illegal.png"></span>
                 <h1>காட்டில் சட்டவிரோதமான செயல் நடக்கிறது</h1>
             </a>
         </button>
     </div>


 </body>

 </html>