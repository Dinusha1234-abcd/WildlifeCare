<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficer_header.css">
    <link rel="stylesheet" href="../Public/css/gramaniladari_view_profile.css">
    <script src="../Public/Javascript/login.js"></script>
    <!-- <script src="../Public/Javascript/viewReport.js"></script> -->
    <script src="../Public/javascript/wildlifeofficer.js"></script>
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

            <ul>
                <!-- <li><h6>BACK</h6></li>
            <li><h6>DASHBOARD</h6></li>
            <li><h6>SPECIAL NOTICES</h6></li> -->
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
    <!-- <nav class="links_to_pages">
      <ul>
        <li>BACK</li>
        <li>SPECIAL NOTICES</li>
        <li>DASHBOARD</li>
      </ul>
    </nav> -->

    </div>

    <body>
        <div class="contanier_2">
            <div class="row1">
                <?php if (isset($data[0]['message'])) {
                    echo $data[0]['message'];
                    unset($data[0]['message']);
                }


                ?>
            </div>

            <div class="contanier_2-1">
                <div class="view_profile">
                    <h3><a href="#">Profile</a></h3>
                </div>
                <div class="edit_profile">
                    <h3><a href="../gramaniladari/editProfile">Edit Profile</a></h3>
                </div>
            </div>
            <div>

                <img src="../Public/images/user_icon4-01.png" class="image">
                <div class="row1"><?php echo $data[0]["Fname"] . " " . $data[0]["Lname"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">First Name</div>
                <div class="col_2"><?php echo $data[0]["Fname"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">Last Name</div>
                <div class="col_2"><?php echo $data[0]["Lname"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">NIC</div>
                <div class="col_2"><?php echo $data[0]["NIC"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">Gender</div>
                <div class="col_2"><?php
                                    if ($data[0]['gender'] == 'F') {
                                        echo "Female";
                                    } else {
                                        echo "Male";
                                    }
                                    ?></div>
            </div>
            <div class="row">
                <div class="col_1">Date of Birth</div>
                <div class="col_2"><?php echo $data[0]["BOD"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">Home Address</div>
                <div class="col_2"><?php echo $data[0]["Address"]  ?></div>
            </div>
            <div class="row">
                <div class="col_1">Email</div>
                <div class="col_2"><?php echo $data[0]["email"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">Office Address</div>
                <div class="col_2"><?php echo $data[1]["address"] ?></div>
            </div>
            <div class="row">
                <div class="col_1">Telephone Number</div>
                <div class="col_2"><?php echo $data[0]["mobileNo"] ?></div>
            </div>
            <div class="row1">

                <a href="../gramaniladari/">BACK</a>

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