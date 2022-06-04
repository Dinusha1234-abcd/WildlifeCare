<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/wildlifeofficer_header.css">
    <link rel="stylesheet" href="../Public/css/gramaniladari_view_cropdamage_indetail.css">
    <script src="../Public/Javascript/login.js"></script>
    <script src="../Public/Javascript/viewReport.js"></script>
    <script src="../Public/Javascript/wildlifeofficer.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script> -->
    <title>View Incident Details</title>
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
                        <a href="">View Profile</a>
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

            <div class="contanier_2-1">

            </div>


            <div class="row_first">
                <div class="col_1_first">
                    <div class="row_in_firstrow">
                        <div class="col_1_first"><img src="../Public/images/user_icon4-01.png" class="image"></div>
                        <div class="col_2_first"> User_ID : W001</div>
                    </div>
                </div>
                <div class="col_2_first">Name : S.Disanayaka </div>

            </div>
            <div class="row">
                <div class="col_1">cropdamage in the village</div>
                <div class="col_2">Report_Number</div>
                <div class="col_2">Status</div>
            </div>
            <div class="map" id="map">


            </div>

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnodzrfhq7KjgE_XJjwTA4oFIgAe8nQNk&callback=loadMap">
            </script>

            <div class="row1">

                <a href="../gramaniladari/viewIncidents">BACK</a>

            </div>


            <div class="last">

            </div>

            </form>

        </div>
        </div>
    </body>

</html>