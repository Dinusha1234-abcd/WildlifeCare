<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="../Public/css/adminIndiMap.css">
    <link rel="stylesheet" href="../Public/css/adminHeader.css">
     <script src="../Public/Javascript/admin.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    
    
    <title>Map</title>
</head>
<body >
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
                <li id="dashboard" class="nav-menu-item"><a href="../admin/Dashboard">Dashboard</a></li>
                
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../admin/viewProfile">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>


    <div id='map-content'>

    <div id='indiMap'></div>

                          
    </div>

    <script type="text/javascript">

                     function indiMap(){
                        var lati=<?php echo json_encode(($data["lat"]));?>;
                        var loni=<?php echo json_encode(($data["lon"]));?>;
                        var lati=parseFloat(lati);
                        var loni=parseFloat(loni);
                        var details=<?php echo json_encode(($data["content"]));?>;
                    
                      var locationActive={lat:lati , lng:loni};
                      var mapActive = new google.maps.Map(document.getElementById("indiMap"),
                         {
                          zoom:15,
                          center:locationActive,
                          
                         }

                        );

                      
                      const infowindow = new google.maps.InfoWindow({
                         content: details,
                            });
                     

                     
                          
                        var markerActive= new google.maps.Marker({

                          position:{lat:lati,lng:loni},
                          map:mapActive,
                          
                          

                        }


                          );


                        markerActive.addListener("click", () => {
                                  infowindow.open({
                                    anchor: markerActive,
                                         mapActive,
                                shouldFocus: false,
                                });
                                    });

                        
                        


                        


                      

                      


                    }
                   

                 </script>
                   

                

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=indiMap"  async></script>
                 <button id="back" onclick="location.href='../admin/dashboard'">Back</button>
</body>
</html>