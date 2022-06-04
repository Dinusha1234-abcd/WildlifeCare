<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/cropDamagesView.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
   <link rel="stylesheet" href="../Public/css/notification.css">
<script src="../Public/Javascript/1.js"></script>
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
                <li id="home_2"><a href="../">Home</a></li>
                <li id="dashboard_1"><a href="../user/viewpage?lang=1">Main Menu</a></li>
                <li id="report_2" style=" background-color: rgb(168, 175, 168);"><a href="">Report Incidents</a></li>
                <li id="special_1"><a href="../user/viewSpecialNotice?lang=1">SpecialNotice </a></li>
                <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                        <a href="../incident/index?lang=1">English</a>
                        <a href="../incident/index?lang=2">සිංහල</a>
                        <a href="../incident/index?lang=3">தமிழ்</a>
                    </div>
                </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_3(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../villager/editprofile?lang=1">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <?php ?>
    <div id="myview" class="view-1">
         <div class="subcontainer_3-5">
            <div class="subcontainer_3-6">

                <?php
                foreach ($this->dataReport as $row) {
                    $date = $row['date'];
                    $time = $row['time_in'];
                    $place = $row['Place'];
                    $reportType = $row['reporttype'];
                    $animalCauseToDamages =  $row['animal_cause_to_damage'];
                    $cultivatedCrop = $row['cultivated_crop'];
                    $damagedLandExtent = $row['damaged_land_extent'];
                    $message = $row['message'];
                } ?>
                <h3 style="color: white;">View Crop Damages Report No <?php echo $_GET['reportNo'] ?> </h3>
                </div>

                <?php 
      
      if(isset($_POST['Confirm'])){
      ?>
          <div class="message1Div">
          <div id="message1" style="padding: 10px; background-color:aliceblue">
         
           <img src="../Public/images/success-mesaage.png" style="width:90px;  height:90px">
           <h1>Your Confirm is Sucessfully</h1>
           <p style="color: darkred;">
               Crop Damages Report No  <?php echo $_GET['reportNo'] ?>
           </p>
           <a href="../gramaniladari/viewCropDamages?lang=1&&page=1&status=success"  class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">View Report</a>
           </div>
          </div>
         <?php
         
         }
    
    ?>
    <?php
       if(isset($_POST['UnConfirm'])){
      ?>
          <div class="message1Div">
          <div id="message1" style="padding: 10px; background-color:aliceblue">
         
           <img src="../Public/images/success-mesaage.png" style="width:90px;  height:90px">
           <h1>Your UnConfirm is Sucessfully</h1>
           <p style="color: darkred;">
               Crop Damages Report No  <?php echo $_GET['reportNo'] ?>
           </p>
           <a href="../gramaniladari/viewCropDamages?lang=1&&page=1"  class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">View Report</a>
           </div>
          </div>
         <?php
         
         }
    
    ?>

           

            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126452.02111388237!2d80.94313801331407!3d7.934107447297657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb44ba3b16ce27%3A0xc34997a2b3032b7c!2sPolonnaruwa!5e0!3m2!1sen!2slk!4v1633233322587!5m2!1sen!2slk" width="50%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>     -->

            <div id="map" style="top: 10px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126452.02111388237!2d80.94313801331407!3d7.934107447297657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb44ba3b16ce27%3A0xc34997a2b3032b7c!2sPolonnaruwa!5e0!3m2!1sen!2slk!4v1633233322587!5m2!1sen!2slk" width="50%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <div id="detail">

                    <table class="table">
                        <tr class="header-table" style="text-align: left;">
                            <th>Date </th>
                            <td><?php echo $date ?> </td>
                        </tr>
                        <tr class="header-table" style="text-align: left;">
                            <th>Time</th>
                            <td><?php echo $time ?> </td>
                        </tr>
                        <tr class="header-table" style="text-align: left;">
                            <th>Place </th>
                            <td> <?php echo $place ?> </td>
                        </tr>
                        <tr class="header-table" style="text-align: left;">
                            <th>Animal Type Cause To Damages </th>
                            <td><?php echo $animalCauseToDamages ?></td>
                        </tr>
                        <tr class="header-table" style="text-align: left;">
                            <th>Cultivated Crop </th>
                            <td> <?php echo $cultivatedCrop ?> </td>
                        </tr>
                        <tr class="header-table" style="text-align: left;">
                            <th>Damaged Land Extent </th>
                            <td>  <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" >'; ?> </td>
                        </tr>
                        <tr><td> <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" >'; ?>  </td>
                        </tr>
                    </table>
                </div> 
                <div id="message">
                    <form action="" method="POST">
                        <label for="status"><b>Message To Villager </b></label><br>
                        <textarea class="text" id="discription" name="discription" rows="2"><?php echo $message ?></textarea>
                        <div class="report">
                            <input type="submit" value="Confirm" name="Confirm"  >
                        </div>
                        <div class="report">
                            <input type="submit" value="UnConfirm" name="UnConfirm"  >
                        </div>
                    </form>

                    <a id="back" href="../gramaniladari/viewCropDamages?status=success&&lang=1&&page=1" style="color: white;">Back</a>




                </div>


            </div>
        </div>
</body>

</html>