<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/adminHeader.css">
  <link rel="stylesheet" href="../Public/css/adminViewUserProfile.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="../Public/Javascript/login.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
            <a href="../wildlifeofficer/viewProfile">View Profile</a>
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

      

      
      <div>

        <img src="../Public/images/user_icon4-01.png" class="image">
        <div class="row1"><p><?php echo ($data["userDetails"])["NIC"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">First Name</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["Fname"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">Last Name</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["Lname"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">NIC</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["NIC"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">Gender</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["gender"]?></div>
      </div>
      <div class="row">
        <div class="col_1">Date of Birth</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["BOD"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">Home Address</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["Address"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">Email</div>
        <div class="col_2"><p><?php echo ($data["userDetails"])["email"]?></p></div>
      </div>
      <div class="row">
        <div class="col_1">Telephone Number</div>
        <div class="col_2"><p><?php echo "+94".($data["userDetails"])["mobileNo"]?></p></div>
      </div>
      



      <div class="incident">
        <h2>About Reported Incidents</h2>
        <input type="checkbox" id="check">
        <div class="profile-table">
          <label for="check"  class="cross fas fa-times"></label>
          <table >
            <thead>
               <tr>
                 <th>Report Type</th>
                 <th>Date</th>
                 <th>Time</th>
                 <th>Status</th>
                 <th>Description</th>
                 <th>Reporter NIC</th>
               </tr>
            </thead>
            <tbody>
              <?php $rows=$data["reportedIncidentDetails"]; foreach($rows as $row){
                echo "<tr><td>".$row["reporttype"]."</td><td>".$row["date"]."</td><td>".$row["time_In"]."</td><td>".$row["incidentStatus"]."</td><td>".$row["description"]."</td><td>".$row["villager_NIC"]."</td></tr>";
              }?>
            </tbody>
          </table>
          
        </div>
        <table id="total-num">
          <tr>
            <td width="40%"><label class="lbl-tbl">Total Number of Incident Accepted</label></td>
            <td width="40%" class="lbl-tbl"><?php echo count($data["reportedIncidentDetails"])?></td>
            <td width="20%"><label id="view-lbl" for="check">View</label></td>
          </tr>
          <tr>
            <td width="40%"><label class="lbl-tbl">Percentage of Accepted and Success</label></td>
            <td width="40%" class="lbl-tbl"><?php echo ((($data["noOfSuccess"])/($data["noOfTotalAccepted"]))*100)."%"?></td>
            
          </tr>
          <tr>
            <td width="40%"><label class="lbl-tbl">Percentage of Accepted and Unsuccess</label></td>
            <td width="40%" class="lbl-tbl"><?php echo ((($data["noOfUnsuccess"])/($data["noOfTotalAccepted"]))*100)."%"?></td>
            
          </tr>
          <tr>
            <td width="40%"><label class="lbl-tbl">Status</label></td>
            <td width="40%" class="lbl-tbl"><?php if($data["incidentStatus"])echo "Active";else echo "Not Accepted any Incident";?></td>
            
          </tr>
          
        </table>

        

                 

      </div>
      <div class="row1">

        <a href="../admin/viewUser"><button id="back">BACK</button></a>

      </div>
      
      </form>

    </div>
    </div>
  </body>

</html>