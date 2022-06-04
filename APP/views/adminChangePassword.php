<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/adminHeader.css">
  <link rel="stylesheet" href="../Public/css/adminChangePassword.css">
  <script src="../Public/Javascript/login.js"></script>
  <!-- <script src="../Public/Javascript/viewReport.js"></script> -->
  <script src="../Public/javascript/admin.js"></script>

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

      <ul class="nav-menu">
        <!-- <li><h6>BACK</h6></li>
            <li><h6>DASHBOARD</h6></li>
            <li><h6>SPECIAL NOTICES</h6></li> -->
        <li id="home" class="nav-menu-item"><a href="../">Home</a></li>
        <li id="dashboard" class="nav-menu-item"><a href="../admin/dashboard">Dashboard</a></li>
        
          </div>
        </li>
        <li class="dropdown">
          <span class="dot"> <img onclick="myFunction_3()" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
          <div id="myDropdown" class="dropdown-content">
            <a href="../admin/viewProfile">View Profile</a>
            <a href="../user/logout">Logout</a>
          </div>
        </li>
      </ul>
    </nav>

  </header>

  <body>

    

    <div class="contanier_2">



      <div class="contanier_2-1">



        <div class="view_profile">
          <h3><a href="../admin/viewProfile?lang=1">Profile</a></h3>
        </div>
        <div class="edit_profile">
          <h3><a href="#">Change Password</a></h3>
        </div>
      </div>


      <form action="../admin/changePassword" method="POST" id="req_form">

        <table>
          <tr>
            <td>Current Password</td>
            <td><input type="Password" name="currentPassword"></td>
          </tr>
          <tr>
            <td>New Password</td>
            <td><input type="Password" name="newPassword"></td>
          </tr>
          <tr>
            <td>Confirm Password</td>
            <td><input type="Password" name="confirmPassword"></td>
          </tr>
          <tr><td><input type="submit" name="submitPass"></td></tr>
        </table>

      </form>




    </div>
    
  </body>

</html>