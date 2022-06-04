<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
   
    <link rel="stylesheet" href="../Public/css/adminHeader.css">
    <link rel="stylesheet" href="../Public/css/viewReportedIncident.css">
     <script src="../Public/Javascript/admin.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    
    
    <title>Reported Incidents</title>
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
                <li id="dashboard" class="nav-menu-item"><a href="../admin/dashboard">Dashboard</a></li>
                
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

    <div id="d1">
        <h1 id="title">Reported Incidents :<?php if(isset($_GET["incident"]))$category=$_GET["incident"];
                                            switch($category)
                                            {
                                                case 'elephantAttack':
                                                {
                                                    echo "Elephants in the Village";
         
            
                                                    }
          
                                                break;
                                                case 'animalsVillage':
                                                {  echo "Other Animals are in the Village";
                                                    }
          
                                                break;
                                                case 'animalDanger':
                                                { echo "Wild Animal is in Danger";
                                                    }

          
                                                break;
                                                case 'illegal':
                                                {  echo "Illegal Activities";
          
                                                    }
          
                                                break;
                                                case 'cropDamage':
                                                {  echo "Crop Damages";
          
                                                    }
          
                                                break;
                                                case 'fenceDamage':
                                                {  echo "Elephant Fence Damages";
          
                                                    }
          
                                                break;
                                            }



        ?></h1>

        <div id="tb">
            <table>
                <thead>
                    <th>Incident ID</th>
                    <th>Village</th>
                    <th>Reported NIC</th>
                    <th>Reporter Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Location</th>
                </thead>

                <tbody>
                  
                      <?php if(count($data)>0)foreach($data as $row) echo "<tr><td>".$row["incidentID"]."</td><td>".$row["village"]."</td><td>".$row["NIC"]."</td><td>".$row["name"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["status"]."</td><td><button id=\"map-button\" onclick=\"location.href='../admin/showMap?lat=".$row["lat"]."&lon=".$row["lon"]."&id=".$row["incidentID"]."'\"><img src='../Public/images/map.jpg'></button></td></tr>"; 
                      

                      ?>

                      

                    


                    
                </tbody>
            </table>
        </div>

        <button id="mybut" onclick="location.href='dashboard'">Back</button>
        
    </div>

    

    

</body>

