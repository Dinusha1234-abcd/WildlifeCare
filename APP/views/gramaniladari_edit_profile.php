<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficer_header.css">
    <link rel="stylesheet" href="../Public/css/gramaniladari_edit_profile.css">
    <script src="../Public/Javascript/login.js"></script>
    <!-- <script src="../Public/Javascript/viewReport.js"></script> -->
    <script src="../Public/javascript/wildlifeofficer.js"></script>
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
                <li id="home"><a href="../">HOME</a></li>
                <li id="dashboard"><a href="../wildlifeofficer/viewDashboard">DASHBOARD</a></li>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_3()" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../gramaniladari/viewProfile">View Profile</a>
                        <a href="">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

    </header>
    <!-- <div class="nav_edit">
      <div class="links_to_pages">
        <ul>
          <li>BACK</li>
          <li>SPECIAL NOTICES</li>
          <li>DASHBOARD</li>
        </ul>
      </div>
    </div> -->

    <body>
        <div class="contanier_2">
            <div>
                <?php if (isset($data[0]['message'])) {
                    echo $data[0]['message'];
                }

                ?>
            </div>
            <div class="contanier_2-1">
                <div class="view_profile">
                    <h3><a href="../gramaniladari/viewProfile">Profile</a></h3>
                </div>
                <div class="edit_profile">
                    <h3><a href="#">Edit Profile</a></h3>
                </div>
            </div>
            <form method="POST" action="../gramaniladari/updateProfile">

                <div class="row">
                    <div class="col_1">First Name</div>
                    <div class="col_2"><input type="text" class="text" id="fname" name="fname" required value="<?php echo $data[0]["Fname"] ?>" /><img src="../Public/images/edit.png" class="edit_icon"></div>
                </div>
                <div class="row">
                    <div class="col_1">Last Name</div>
                    <div class="col_2"><input type="text" class="text" id="lname" name="lname" required value="<?php echo $data[0]["Lname"] ?>" /><img src="../Public/images/edit.png" class="edit_icon"></div>
                </div>
                <!-- <div class="row">
        <div class="col_1">NIC</div>
        <div class="col_2">99v</div>
      </div> -->
                <!-- <div class="row">
        <div class="col_1">Gender</div>
        <div class="col_2">
            <input type="radio" id="male" name="gender" value="Male" required <?php
                                                                                if ($data[0]['gender'] == 'M') { ?>
             checked
           <?php } ?> 
            />
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female"  
            <?php
            if ($data[0]['gender'] == 'F') { ?>
             checked
           <?php } ?> 
             />
            <label for="female">Female</label></div>
      </div> -->
                <div class="row">
                    <div class="col_1">Date of Birth</div>
                    <div class="col_2">
                        <input class="text" type="date" id="dob" name="dob" required value="<?php echo $data[0]['BOD'] ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col_1">Home Address</div>
                    <div class="col_2"><textarea class="text" id="address" name="address" rows="2" required><?php echo $data[0]["Address"]  ?>
        </textarea><img src="../Public/images/edit.png" class="edit_icon"></div>
                </div>
                <div class="row">
                    <div class="col_1">Telephone Number</div>
                    <div class="col_2">
                        <input class="text" type="text" id="mobileNo" name="mobileNo" value="<?php echo $data[0]["mobileNo"] ?>" required />
                        <img src="../Public/images/edit.png" class="edit_icon">
                    </div>
                </div>
                <div class="row">
                    <div class="col_1">Email</div>
                    <div class="col_2">
                        <input class="text" type="email" id="email" name="email" value="<?php echo $data[0]['email'] ?>" />
                        <img src="../Public/images/edit.png" class="edit_icon">
                    </div>
                </div>
                <div class="row">
                    <div class="col_1">Office Address</div>
                    <div class="col_2"><input class="text" type="text" id="off_add" name="office_address" value="<?php echo $data[1]['address'] ?>" required /><img src="../Public/images/edit.png" class="edit_icon"></div>
                </div>

                <div class="row">
                    <div class="cancel_button">

                        <input name="cancel" type="submit" onclick="" value="CANCEL" />
                    </div>

                    <div class="save_button">

                        <input name="save" type="submit" onclick="" value="SAVE" />
                    </div>


                </div>

                <div class="last">

                </div>

            </form>

        </div>
        </div>
    </body>

</html>