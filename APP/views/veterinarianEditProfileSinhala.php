<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css">
    <link rel="stylesheet" href="../Public/css/veterinarianEditProfile.css">
    <link rel="stylesheet" href="../Public/css/wildlifeofficerEditProfile.css">
    <script src="../Public/javascript/login.js"></script>
    <script src="../Public/javascript/wildlifeofficer.js"></script>
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

            <ul>

                <li id="homeSinhala"><a href="../?lang=2">මුල් පිටුව</a></li>
                <li id="userPageSinhala"><a href="../veterinarian/?lang=2"> &nbsp; පරිශීලක පිටුව </a></li>
                <li id="incidentsSinhala"><a href="../veterinarian/viewIncidents?lang=2"> &emsp; වාර්තා වූ සිදුවීම්</a></li>
                <li id="notificationsSinhala"><a href="../veterinarian/viewNotification?lang=2">දැනුම්දීම්</a></li>
                <li id="dashboardSinhala"><a href="../veterinarian/viewDashboard?lang=2">දත්ත පුවරුව</a></li>
                <li>
                    <div class="dropdown-1" style="  padding-left:  300px ">
                        <button class="dropbtn-1">භාෂාව</button>
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
                        <a href="../veterinarian/viewProfile?lang=2">පරිශීලක පැතිකඩ</a>
                        <a href="../user/logout?lang=2">ඉවත් වීම</a>
                    </div>
                </li>
            </ul>
        </nav>

    </header>


    <body>


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
                }

                ?>
            </div>

            <div class="contanier_2-1">



                <div class="view_profile">
                    <h3><a href="../veterinarian/viewProfile?lang=2">පරිශීලක පැතිකඩ</a></h3>
                </div>
                <div class="edit_profile">
                    <h3><a href="#">පරිශීලක පැතිකඩ සංස්කරණය කරන්න</a></h3>
                </div>
            </div>


            <form action="../veterinarian/updateProfile?lang=2" method="POST" id="req_form">

                <div class="row firstName">
                    <div class="col_1">මුල් නම</div>
                    <div class="col_2"><input type="text" class="text" id="fname" name="fname" required value="<?php echo $data[0]["Fname"] ?>" /><img src="../Public/images/edit.png" class="edit_icon"></div>

                </div>
                <div class="row lastName">
                    <div class="col_1">අවසාන නම</div>
                    <div class="col_2"><input type="text" class="text" id="lname" name="lname" required value="<?php echo $data[0]["Lname"] ?>" /><img src="../Public/images/edit.png" class="edit_icon"></div>
                </div>

                <div class="row birthday">

                </div>
                <div class="row address">
                    <div class="col_1">නිවසේ ලිපිනය</div>
                    <div class="col_2"><textarea class="text" id="address" name="address" rows="2" required><?php echo $data[0]["Address"]  ?>
</textarea><img src="../Public/images/edit.png" class="edit_icon"></div>
                </div>
                <div class="row mobNum">
                    <div class="col_1">දුරකථන අංකය</div>
                    <div class="col_2">
                        <input class="text" type="text" id="mobileNo" name="mobileNo" value="<?php echo $data[0]["mobileNo"] ?>" required />
                        <img src="../Public/images/edit.png" class="edit_icon">
                    </div>
                </div>
                <div class="row email">
                    <div class="col_1">විද්යුත් තැපෑල</div>
                    <div class="col_2">
                        <input class="text" type="email" id="email" name="email" value="<?php echo $data[0]['email'] ?>" />
                        <img src="../Public/images/edit.png" class="edit_icon">
                    </div>
                </div>
                <div class="row address1">
                    <div class="col_1">කාර්යාල ලිපිනය</div>
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