<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/adminHeader.css">
  <link rel="stylesheet" href="../Public/css/adminViewProfile.css">
  <script src="../Public/Javascript/login.js"></script>
  <!-- <script src="../Public/Javascript/viewReport.js"></script> -->
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

            <ul class="nav-menu">
                <li id="home" class="nav-menu-item"><a href="../">Home</a></li>
                <li id="dashboard" class="nav-menu-item"><a href="../">Dashboard</a></li>
                
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

  

  <body>
    <div class="contanier_2">

      <?php if(isset($_GET["change"])){if($_GET["change"]=="success")$message="Successfully Change"; else if($_GET["change"]=="wrong")$message="Wrong Password"; else if($_GET["change"]=="notconfirm") $message="Wrong Confirm Password";
       echo "<h2 id='msg'>".$message."</h2>";
    }?>

      <div class="contanier_2-1">
        <div class="view_profile">
          <h3><a href="#">Profile</a></h3>
        </div>
        <div class="edit_profile">
          <h3><a href="../admin/changePassword">Change Password</a></h3>
        </div>
      </div>
      <div>

        <img src="../Public/images/user_icon4-01.png" class="image">
        <div class="row1"><?php echo $data["Fname"] . " " . $data["Lname"] ?></div>
      </div>
      <div class="row">
        <div class="col_1">First Name</div>
        <div class="col_2"><?php echo $data["Fname"] ?></div>
      </div>
      <div class="row">
        <div class="col_1">Last Name</div>
        <div class="col_2"><?php echo $data["Lname"] ?></div>
      </div>
      <div class="row">
        <div class="col_1">NIC</div>
        <div class="col_2"><?php echo $data["NIC"] ?></div>
      </div>
      <div class="row">
        <div class="col_1">Gender</div>
        <div class="col_2"><?php
                            if ($data['gender'] == 'F') {
                              echo "Female";
                            } else {
                              echo "Male";
                            }
                            ?></div>
      </div>
      <div class="row">
        <div class="col_1">Date of Birth</div>
        <div class="col_2"><?php echo $data["BOD"] ?></div>
      </div>
      <div class="row">
        <div class="col_1">Home Address</div>
        <div class="col_2"><?php echo $data["Address"]  ?></div>
      </div>
      <div class="row">
        <div class="col_1">Email</div>
        <div class="col_2"><?php echo $data["email"] ?></div>
      </div>
      
      <div class="row">
        <div class="col_1">Telephone Number</div>
        <div class="col_2"><?php echo "0".$data["mobileNo"] ?></div>
      </div>
      <div class="row1">

        <!-- <a href="../wildlifeofficer/?lang=1">BACK</a> -->

      </div>



      <div class="last">

      </div>
      <!-- <div>
   <?php
    print_r($data);
    ?>
 </div>
     -->
      </form>

    </div>
    </div>
  </body>

</html>