<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/reportViewpage.css">
    <script src="../Public/Javascript/login.js"></script>
    <script src="../Public/Javascript/viewReport.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <title>Report View</title>
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
                <li id="dashboard_1"   ><a href="../user/viewpage?user=villager" >Dashboard</a></li>
                <li id="report_2"><a href="">Incidents Report</a></li>
                <li id="special_1"><a href="">SpecialNotice </a></li> 
                <div class="dropdown-1">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                        <a href="">English</a>
                        <a href="">සිංහල</a>
                        <a href="">தமிழ்</a>
                    </div>
                  </div>
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
    </div>

    <div class="container_3">
        <div class="subcontainer_3-1">
            <h3 id="table-name">
                View Report Table
            </h3>
        </div>
        <div class="navigatereport">
             
                <a href="?type=1&page=1" class="allreport">All Report View</a>
            
             
                <a href="?type=2&page=1" class="myreportaccept" style=" background-color: rgb(168, 175, 168);" >My Report Accept</a>
             
                 <a href="?type=3&page=1" class="myreportpending" >My Report Pending</a>
          </div>
          <div class="subcontainer_3-3">
            <!-- <div class="search-container"> -->
                <form action="" class="search-container" method="POST" >
                    <lable id="text-search-bar">Report Number</lable>
                    <input type="text" placeholder="Search" name="incidentId">
                    <input type="submit" value="Search" class="search-btn" name="submit"> 
                </form> 

            <?php if(isset($_POST['submit'])) {   ?>
                <?php $data = $this->data1 ?>
            <table class="table">
                <tr class="header-table">
                <th>Date</th>
                    <th>Report Number</th>
                    <th>WID</th>
                    <th>Wilflife Officer Name</th>
                    
                    <th>Place</th>
                    <th>Time</th>
                    <th>Report Type</th>
                    <th>Action</th>
                </tr>
                <tr><?php session_start();
                      $villagerNic = $_SESSION['NIC'];
                  ?>
                    <?php foreach($data as $row){ 
                        if(($row['villager_NIC']==$villagerNic) && ($row['status'] == 'success') &&  $row['incidentID']== $_POST['incidentId']) {?>
                    <td id="date"><?php echo $row['date']; ?> </td>
                    <td id="incidentID"><?php echo $row['incidentID'] ?></td>
                    <td id="Place"><?php echo "11111"?></td>
                    <td id="time_in"> <?php echo "Namal Silva" ?></td>
                    <td id="Place"><?php echo $row['Place'] ?></td>
                    <td id="time_in"> <?php echo $row['time_in'] ?></td>
                    <td id="reporttype"><?php echo $row['reporttype'] ?></td> 
                   <!-- // $userArray = array('John Doe', 'john@example.com'); -->
                   <script>
                      var incidentID = document.getElementById('incidentID') 
                       //console.log(document.getElementById('incidentID') )
                      </script>
                  <td id="view"><a    ><img src="../Public/images/edit.png" class="view" style="width: 20px; height:20px" ></a> 
                  <a    ><img src="../Public/images/remove.png" class="view" style="width: 20px; height:20px; padding-left:2px" ></a>
                    <a onclick="openView()" href="aaa"><img src="../Public/images/view.png" style="padding-top:3px" class="view" ></a></td>
                    
                </tr>
                <?php } }?>

            </table> 
                <?php } else{   ?>
           <?php $data = $this->data1 ?>
            <table class="table">
                <tr class="header-table">
                    <th>Date</th>
                    <th>Report Number</th>
                    <th> WID</th>
                    <th>Wilflife Officer Name</th>
                    
                    <th>Place</th>
                    <th>Time</th>
                    <th>Report Type</th>
                    <th>Action</th>
                </tr>
                <tr><?php session_start();
                      $villagerNic = $_SESSION['NIC'];
                  ?>
                  
                    <?php foreach($data as $row){ 
                        if(($row['villager_NIC']==$villagerNic) && ($row['status'] == 'success') ) {?>
                    <td id="date"><?php echo $row['date']; ?> </td>
                    <td id="incidentID"><?php echo $row['incidentID'] ?></td>
                    <td id="Place"><?php echo "11111"?></td>
                    <td id="time_in"> <?php echo "Namal Silva" ?></td>
                    <td id="Place"><?php echo $row['Place'] ?></td>
                    <td id="time_in"> <?php echo $row['time_in'] ?></td>
                    <td id="reporttype"><?php echo $row['reporttype'] ?></td> 
                   <!-- // $userArray = array('John Doe', 'john@example.com'); -->
                   <script>
                      var incidentID = document.getElementById('incidentID') 
                       //console.log(document.getElementById('incidentID') )
                      </script>
                  <td id="view"><a    ><img src="../Public/images/edit.png" class="view" style="width: 20px; height:20px" ></a> 
                  <a    ><img src="../Public/images/remove.png" class="view" style="width: 20px; height:20px; padding-left:2px" ></a>
                    <a onclick="openView()" href="aaa"><img src="../Public/images/view.png" style="padding-top:3px" class="view" ></a></td>
                    
                </tr>
                <?php } }?>

            </table>
             <?php } ?>
        </div>
      
    <!-- </div> -->
  <div class="subcontainer_3-4">
            <li id="previous"><a href="?type=1&page=1">Previous</a>
            <li id="last"><a href="?type=1&page=<?php echo $this->lastpage ?>">last</a></li>
        </div>
         
    </div>
    <div id="myview" class="view-1">
        <span onclick="closeView()" class="close">&times;</span>
        <div class="subcontainer_3-5">
            <div class="subcontainer_3-6">
                <h3>View Report  Number  0001</h3>
            </div></br>
            <table>
                <tr>
                    <th>Date</th>
                    <th>2021/08/03</th>
                </tr>
                <tr>
                    <th>Accept Wilflife Ofiicer Number</th>
                    <th>000000000V</th>
                </tr>
                <tr>
                    <th>Accept Wilflife Ofiicer Name</th>
                    <th> J D K Silva</th>
                </tr>
                <tr>
                    <th>Report Type</th>
                    <th>Crop Damages</th>
                </tr>
                
            </table>
            <div id="map">
                
            </div>
            
        </div>
    </div>
</body>

</html>