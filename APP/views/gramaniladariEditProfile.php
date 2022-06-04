<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/villgereditProfile.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
   <link rel="stylesheet" href="../Public/css/notification.css">
 <script src="../Public/Javascript/login1.js"></script>
    <!-- <script src="../Public/Javascript/viewReport.js"></script> -->

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script> -->
    <title>Edit Profile</title>
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
                <li id="dashboard_1"><a href="../user/viewpage?lang=1">Main Menu</a></li>
                <li id="report_2"><a href="../incident/index?lang=1">Report Incidents</a></li>
                <li id="special_1"><a href="../user/viewSpecialNotice?lang=1">SpecialNotice </a></li>
                <div class="dropdown-1">
                    <button class="dropbtn-1" style="margin-top:  -50px;">Language</button>
                    <div class="dropdown-content-1">
                        <a href="?lang=1&report=1">English</a>
                        <a href="?lang=2&report=1">සිංහල</a>
                        <a href="?lang=3&report=1">தமிழ்</a>
                    </div>
                </div>
                <span class="dot" style="margin-right:10px;  margin-top:  10px;"> <img onclick="myFunction_3()" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                <div id="myDropdown" class="dropdown-content">
                    <a href="../gramaniladari/editprofile">View Profile</a>
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
     
        <div id="notificationmessage">

            <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->
       
                <form action="../gramaniladari/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="right">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
        </div>
        <?php

if (isset($_POST['Submit'])) {
?>

    <div id="popupmessage"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div> 
 
    <?php }  ?>
    <?php

    } else if ($this->status  == "notview")  {
         
    ?>

        <div id="messagealert1">
            <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                <img src="../Public/images/alertIcon.png" id="alert">
                <h3>Wildlife Elephants Come In to Your Registered Village &nbsp&nbsp
                    <input type="submit" value="Ok" name="submitAlert" id="submit1">
                </h3>
            </form>
        </div>
        <?php

if (isset($_POST['Submit'])) {
?>

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div>  
<?php

}
 
?>
    <?php }
        
     elseif ($this->notification > 0) {  ?>
 
        <div id="notificationmessage">

            <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

            <form action="../gramaniladari/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="View" name="submitAlert" id="submit">
                </h3>
            </form>
        </div>
        <?php if (isset($_POST['Submit'])) {
?>

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div>  
<?php

}
 
?>
<?php }else{
    
   ?>        <?php if (isset($_POST['Submit'])) {
    ?>
    
        <div id="popupmessagefirst"  >
            <form action="?lang=1&report=1" method="post" style="display: inline-block;">
            <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
                <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 </h3>
            </form>
     
        </div>  
    <?php
    
    }
     
    ?> <?php }}
    ?>
    <body>
        <div class="contanier_2">
            <div>
                <?php $result = $this->userData;
                foreach ($result as $row) {
                    $fname = $row['Fname'];
                    $lname = $row['Lname'];
                    $birthDay = $row['BOD'];
                    $address =  $row['Address'];
                    $mobileNumber =  $row['mobileNo'];
                    $email = $row['email'];
                } ?>

            </div>
            <div class="contanier_2-1">
                <div class="view_profile">
                    <h3 style="color: white; "><a href="../villager/viewProfile?lang=1">Profile</a></h3>
                </div>
                <div class="edit_profile">
                    <h3><a style="color: white;" href="#">Edit Profile</a></h3>
                </div>
            </div>
            <br>
            <form class="form2" action="" method="post">

                <table id="form1">
                    <tr>
                        <th>
                            <label for="fname" style="font-weight: 100;">First Name</label>
                        </th>
                        <th>
                            <input type="text" class="text" id="fname" name="fname" value="<?php echo $fname ?>" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="lname" style="font-weight: 100;">Last Name</label>
                        </th>
                        <th>
                            <input type="text" class="text" id="lname" name="lname" value="<?php echo $lname ?>" />
                        </th>
                    </tr>


                    <tr>
                        <th>
                            <label for="dob" style="font-weight: 100;">Date of Birth</label>
                        </th>

                        <th>
                            <input class="text" type="date" id="dob" name="dob" value="<?php echo   $birthDay ?>" />
                        </th>
                    </tr>


                    <tr>
                        <th>
                            <label for="address" style="font-weight: 100;">Address</label>
                        </th>
                        <th>
                            <p class="text" id="address" name="address" rows="2"><?php echo   $address ?></p>
                        </th>
                    </tr>


                    <tr>
                        <th>
                            <label for="province" style="font-weight: 100;">Province</label>
                        </th>
                        <th>
                          <p class="text" id="province" ><?php echo $this->province . "Province"; ?></p>
                         </th>
                    </tr>
                    
                    <tr>
                        <th>
                            <label for="district" style="font-weight: 100;">District</label>
                        </th>
                        <th>
                           
                                <p class="text" id="district" ><?php echo $this->district ?></p>
                          
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="gndivision" style="font-weight: 100;">Gramaniladari Division</label>
                        </th>
                        <th> 
                                <p class="text" name="gndivision" id="district"><?php echo $this->GramaniladhariDivision ?></p>
        
                            </select>
                        </th>
                    </tr>

                    <tr>
                        <th>
                            <label for="email" style="font-weight: 100;">Email</label>
                        </th>

                        <th><input class="text" type="email" id="email" name="email" value="<?php echo   $email ?>" /></th>
                    </tr>
                    <tr>
                        <th>
                            <label for="email" style="font-weight: 100;">Telephone Number</label>
                        </th>
                        <th><input class="text" type="tp" id="tp" name="tp" value="0<?php echo   $mobileNumber ?>" /></th>
                    </tr>

                    <tr>
                        <th>
                            <label for="password" style="font-weight: 100;">Old Password</label>
                        <th><input class="text" type="password" id="password" name="oldPassword" placeholder="Type a Old password" /></th>
                    </tr>
                    <?php
                    // check the sumbit status
                    if (isset($_POST['submit'])) {

                        if (password_verify(trim($_POST["oldPassword"]), $this->hashPassword)) {
                    ?>

                            <div id="message1" style="padding: 10px; background-color:aliceblue; margin-left:25px">
                                <img src="../Public/images/error-icon.png" style="width:90px;  height:90px">
                                <h1>Your Old Password is Wrong Please Try Again</h1>
                                <a href="../user/index?lang=1" class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">login</a>
                            </div>
                    <?php }
                    }
                    ?>
                    <tr>
                        <th>
                            <label for="password" style="font-weight: 100;">New Password</label>
                        <th><input class="text" type="password" id="password" name=" " placeholder="Type New password for your profile" /></th>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            <label for="cpassword" style="font-weight: 100;">Confirm Password</label>
                        </th>
                        <th><input class="text" type="password" id="cpassword" name=" " placeholder="Reype the password" /></th>
                    </tr>
                </table>
                <div class="sumbit2">
                    <input type="submit" name="submit" onclick="return validation()" value="Update" />
                </div>
        </div>
        </form>
        </div>
        </div>
    </body>

</html>