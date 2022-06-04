<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/report_2Update.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
    <link rel="stylesheet" href="../Public/css/popupNotification.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/header.css">
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
                <li id="report_2"><a href="../incident/index?lang=1">Report Incidents</a></li>
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
    <?php
    if (isset($this->status) && isset($this->notification)) {
        if ($this->status  == "notview" && $this->notification > 0) {
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

                <!-- <img src="../Public/images/alertIcon.png" style="width:100000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php

            if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessage">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>

            <?php }  ?>
        <?php

        } else if ($this->status  == "notview") {

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

                <div id="popupmessagelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?>
        <?php } elseif ($this->notification > 0) {  ?>

            <div id="notificationmessage">

                <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

                <form action="../villager/viewNotification?lang=1&notification=true" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
            </div>
            <?php if (isset($_POST['Submit'])) {
            ?>

                <div id="popupmessagelast">
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                    <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                        <img src="../Public/images/success-mesaage.png" id="alert">&nbsp&nbsp
                        <h3>Your Report Incident Update Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </h3>
                    </form>

                </div>
            <?php

            }

            ?> <?php }
        } ?>
    <?php ?>
    <div id="myview" class="view-1">
        <div class="subcontainer_3-5">
            <div class="subcontainer_3-6">

                <?php

                foreach ($this->dataReport as $row) {


                    $place = $row['Place'];
                    $image = $row['image'];
                    $description = $row['description'];
                    $lat =  $row['lat'];
                    $long = $row['lon'];
                         
                }
                foreach ($this->dataReport2 as $row) {

                    $noOfanimals = $row['no_of_animals'];
                    $animal = $row['animal'];
                }

                ?>
                <h3 style="color: white;"> <b>Other Wild Animals are in The Village<br><br>Report Number :<?php echo "  " . $_GET['reportNo']; ?> </b></h3>
            </div>
            <?php if(isset($_GET['image'])) { ?>
            <?php if(!empty($image) ) { ?> 
            <div class="image">
                <a href="../incident/updateReport?lang=<?php echo $_GET['lang'] ?>&&reportNo=<?php echo $_GET['reportNo'] ?>&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>"><img src="../Public/images/close.png" id="viewcls"></a>
                
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" />
            </div> <?php }else{  ?>
                <div class="imageerror">
                <img src="../Public/images/errorimage.png" id="errorimage"> 
                
                <a href="../incident/updateReport?lang=<?php echo $_GET['lang'] ?>&&reportNo=<?php echo $_GET['reportNo'] ?>&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>"><img src="../Public/images/close.png" id="viewcls"></a>
                
                <p>There haven't Upload Image When Incident Report Submit</p>
                </div>
                <?php } }?>
                <div id="map" style="top: 10px; width :600px"> </div>
                 <div id="detail">
                    <form class=" " action=" " method="post">
                        <table class="table">
                            <tr class="header-table" style="text-align: left;">
                                <th>Select Animal </th>
                                <td> <select class="text-1" name="animal" id="animal">
                                        <option value="<?php echo $animal ?>"><?php echo $animal ?></option>
                                        <option value="Alligator">AlligatorLion </option>
                                        <option value="Antelope">Antelope</option>
                                        <option value="Baboon">Baboon</option>
                                        <option value="Bear">Bear</option>
                                        <option value="Bee">Bee</option>
                                        <option value="Camel">Camel</option>
                                        <option value="Deer">Deer</option>
                                        <option value="Dolphin">Dolphin</option>
                                        <option value="Elephant">Elephant</option>
                                        <option value="Fox">Fox</option>
                                        <option value="Giraffe">Giraffe</option>
                                        <option value="Goat">Goat</option>
                                        <option value="Hamster">Hamster</option>
                                        <option value="Heron">Heron</option>
                                        <option value="Human">Human</option>
                                        <option value="Kangaroo">Kangaroo</option>
                                        <option value="Leopard">Leopard</option>
                                        <option value="Lion">Lion</option>
                                        <option value="Monkey">Monkey</option>
                                        <option value="Pig">Pig</option>
                                        <option value="Rabbit">Rabbit</option>
                                        <option value="Snake">Snake</option>
                                        <option value="Tiger">Tiger</option>
                                        <option value="Wolf">Wolf</option>
                                        <option value="Other">Other</option>
                                </td>
                            </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>Name of the Place </th>
                                <td><input type="text" name="place" id="place" class="text" value="<?php echo $place ?>"> </td>
                            </tr>

                            <tr class="header-table" style="text-align: left;">
                                <th>Add Photo </th>
                                <td>  
                                    <input type="file" name="Photo" id="file" class="file" value="<?php $image ?>"> 
                                     <a  href="../incident/updateReport?image=true&lang=<?php echo $_GET['lang'] ?>&&reportNo=<?php echo $_GET['reportNo'] ?>&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>" style="color: black;" >Show image</a>
                                     </td>
                                </tr>
                            <tr class="header-table" style="text-align: left;">
                                <th>Track The location </th>
                                <td> <button onclick="return getLocation()" id="track">Click Me</button>
                                </td>
                            </tr>
                            <textarea class="text" id="lat" name="latitude" rows="2" style="display: none;"></textarea>
                            <textarea class="text" id="lang" name="longitude" rows="2" style="display: none;"></textarea>

                            <script>
              var x = document.getElementById("lat");
              var y = document.getElementById("lang");
              var lat;
              var long;

              function getLocation() {
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(showPosition);
                  return false;
                } else {
                  x.innerHTML = "Geolocation is not supported by this browser.";
                  y.innerHTML = "Geolocation is not supported by this browser.";
                }
              }

              function showPosition(position) {
                lat = position.coords.latitude;
                long = position.coords.longitude;
                x.innerHTML = lat;
                y.innerHTML = long;
              }

              function initMap() {
                // The location of Uluru
                const uluru = {
                  lat: <?php echo $lat ?>,
                  lng: <?php echo $long ?>
                };
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 13,
                  center: uluru,
                });
                var image = {
                  url: '../Public/images/report-2.png',
                  scaledSize: new google.maps.Size(60, 60),
                };
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                  position: uluru,
                  map: map,
                  draggable: true,
                  animation: google.maps.Animation.DROP,

                  icon: image
                });

              }
            </script>
         
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMap "></script>         
                        </table>
                </div>
                <div id="message">
                    <form action="../incident/viewReport?lang=1&page=<?php echo $_GET['page'] ?>&type=<?php echo $_GET['type'] ?>" method="POST">

                        <input type="submit" value="Update " name="Submit" onclick="return validation()">
                </div>

                </form>

                <a id="back" href="../incident/viewReport?type=3&page=<?php echo $_GET['page'] ?>&lang=1" style="color: white;">Back</a>




            </div>


        </div>
    </div>
</body>

</html>