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
  <link rel="stylesheet" href="../Public/css/wildlifeofficerEditProfile.css">
  <script src="../Public/Javascript/login.js"></script>
  <!-- <script src="../Public/Javascript/viewReport.js"></script> -->
  <script src="../Public/javascript/wildlifeofficer.js"></script>
  <link rel="stylesheet" href="../Public/css/notification.css" type="text/css">

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
        <li id="home"><a href="../?lang=1">HOME</a></li>
        <li id="userPage"><a href="../wildlifeofficer/?lang=1">USER PAGE</a></li>
        <li id="incidents"><a href="../wildlifeofficer/viewIncidents?lang=1">INCIDENTS</a></li>
        <li id="notifications"><a href="../wildlifeofficer/viewNotification?lang=1">NOTICE</a></li>
        <li id="dashboard"><a href="../wildlifeofficer/viewDashboard?lang=1">DASHBOARD</a></li>
        <li>
          <div class="dropdown-1" style="  padding-left:  300px ">
            <button class="dropbtn-1">Language</button>
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
            <a href="../wildlifeofficer/viewProfile?lang=1">View Profile</a>
            <a href="../user/logout?lang=1">Logout</a>
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
        <h3>You have new reported incident &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="submit" value="View" name="submitAlert" id="submit">
        </h3>
      </form>
    </div>
  <?php  }
  ?>

  <body>

    <?php

    if (isset($_POST['save'])) {
    ?>

      <div id="message1" style="padding: 10px; background-color:aliceblue">


        <h2><img src="../Public/images/success-mesaage.png" style="width:25px;  height:25px">Your Profile Details Updated Sucessfully </h2><a href="../wildlifeofficer/viewProfile?lang=1" class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">View Profile</a>
      </div>
    <?php

    }

    ?>
    <div id="note">
      <b> </b>
    </div>
    <div id="message" style="display: none;">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <h id="errorMessage"></h>
    </div>

    <div class="contanier_2">


      <div>

        <?php if (isset($data[0]['message'])) {
          // echo $data[0]['message'];
        }

        ?>
      </div>

      <div class="contanier_2-1">



        <div class="view_profile">
          <h3><a href="../wildlifeofficer/viewProfile?lang=1">Profile</a></h3>
        </div>
        <div class="edit_profile">
          <h3><a href="#">Edit Profile</a></h3>
        </div>
      </div>


      <form action="../wildlifeofficer/updateProfile?lang=1" method="POST" id="req_form">

        <div class="row firstName">
          <div class="col_1">First Name</div>
          <div class="col_2"><input type="text" class="text" id="fname" name="fname" required value="<?php echo $data[0]["Fname"] ?>" /><img src="../Public/images/edit.png" class="edit_icon"></div>

        </div>
        <div class="row lastName">
          <div class="col_1">Last Name</div>
          <div class="col_2"><input type="text" class="text" id="lname" name="lname" required value="<?php echo $data[0]["Lname"] ?>" /><img src="../Public/images/edit.png" class="edit_icon"></div>
        </div>

        <div class="row birthday">

        </div>
        <div class="row address">
          <div class="col_1">Home Address</div>
          <div class="col_2"><textarea class="text" id="address" name="address" rows="2" required><?php echo $data[0]["Address"]  ?>
</textarea><img src="../Public/images/edit.png" class="edit_icon"></div>
        </div>
        <div class="row mobNum">
          <div class="col_1">Telephone Number</div>
          <div class="col_2">
            <input class="text" type="text" id="mobileNo" name="mobileNo" value="<?php echo "0" . ($data[0]["mobileNo"]) ?>" required />
            <img src="../Public/images/edit.png" class="edit_icon">
          </div>
        </div>
        <div class="row email">
          <div class="col_1">Email</div>
          <div class="col_2">
            <input class="text" type="email" id="email" name="email" value="<?php echo $data[0]['email'] ?>" />
            <img src="../Public/images/edit.png" class="edit_icon">
          </div>
        </div>
        <div class="row address1">
          <div class="col_1">Office Address</div>
          <div class="col_2"><input class="text" type="text" id="off_add" name="office_address" value="<?php echo $data[1]['address'] ?>" required /><img src="../Public/images/edit.png" class="edit_icon"></div>
        </div>

        <div class="row">
          <div class="cancel_button">

            <input name="cancel" type="submit" onclick="" value="CANCEL" />
          </div>

          <div class="save_button">

            <input name="save" type="submit" onclick="return submitRequestForm()" value="SAVE" />
          </div>


        </div>

        <div class="last">

        </div>

      </form>




    </div>
    <script src="../Public/javascript/updateUser.js"></script>
  </body>

</html>