<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['NIC'])) {
  header("Location:http://localhost/WildlifeCare/user/index");
}
if (isset($_SESSION['jobtype'])) {
  if ($_SESSION['jobtype'] == 'Wildlife Officer') {
  } else {
  }
} else {
}
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css" />
  <link rel="stylesheet" href="../Public/css/wildlifeofficerViewIncidents.css" />
  <link rel="stylesheet" href="../Public/css/notification.css" type="text/css">
  <script src="../Public/Javascript/login.js"></script>
  <script src="../Public/Javascript/viewReport.js"></script>
  <script src="../Public/javascript/wildlifeofficer.js"></script>
  <script src="../Public/javascript/admin.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script> -->
  <title>Report View</title>

</head>

<body>
  <header id="main">
    <img src="../Public/images/icon.png" alt="icon" id="icon" />
    <nav id="navbar" class="mybar">
      <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>

      <ul>

        <li id="homeSinhala"><a href="../?lang=2">මුල් පිටුව</a></li>
        <li id="userPageSinhala"><a href="../wildlifeofficer/?lang=2"> &nbsp; පරිශීලක පිටුව </a></li>
        <li id="incidentsSinhala"><a href="../wildlifeofficer/viewIncidents?lang=2"> &emsp; වාර්තා වූ සිදුවීම්</a></li>
        <li id="notificationsSinhala"><a href="../wildlifeofficer/viewNotification?lang=2">දැනුම්දීම්</a></li>
        <li id="dashboardSinhala"><a href="../wildlifeofficer/viewDashboard?lang=2">දත්ත පුවරුව</a></li>
        <li>
          <div class="dropdown-1" style="  padding-left:  300px ">
            <button class="dropbtn-1">භාෂාව</button>
            <div class="dropdown-content-1">
              <?php
              $count = 0;
              echo "
                                <a href='?lang=1&index=" . $count . "'>English</a>
                                <a href='?lang=2&index=" . $count .  "'>සිංහල</a>
                                <a href='?lang=3&index=" . $count . "'>தமிழ்</a> "
              ?>
            </div>
          </div>
        </li>
        <li class="dropdown">
          <span class="dot"> <img onclick="myFunction_3()" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
          <div id="myDropdown" class="dropdown-content">
            <a href="../wildlifeofficer/viewProfile?lang=2">පරිශීලක පැතිකඩ</a>
            <a href="../user/logout?lang=2">ඉවත් වීම</a>

          </div>
        </li>
      </ul>
    </nav>
  </header>

  <?php
  if ($this->notificationStatus == "notView") {
  ?>
    <div id="notificationmessage">


      <form action="../wildlifeofficer/viewIncidents?lang=<?php echo $_GET['lang'] ?>&check=true" method="post" style="display: inline-block;">
        <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
        <h3>ඔබට වාර්තාවූ නව සිදුවීමක් ඇත &nbsp&nbsp&nbsp&nbsp
          <input type="submit" value="View" name="submitAlert" id="submit">
        </h3>
      </form>
    </div>
  <?php  }
  ?>

  <div class="container_3">
    <div class="row1" id="back">

      <div class="subcontainer_3-1">
        <h3 id="table-name">වාර්තාවේ විස්තර බලන්න</h3>
      </div>
      <div class="subcontainer_3-2">

        <div class="report_catagory">
          <Form action="../wildlifeofficer/filterUsingReportCatagory?lang=2" method="POST">
            <select name="report_catagory" id="filter" onchange="filterFunctionSinhala()">
              <option class="group-1">වාර්තාව තෝරන්න</option>

              <option class="group-1">1.අලි ගම් වලට පැමිණ ඇත</option>
              <option class="group-2">
                2.අනෙකුත් වන සතුන් ගම් වලට පැමිණ ඇත
              </option>
              <option class="group-3">3.අලි වැට කැඩීම</option>
              <option class="group-3">4.වන සතුන්ට අනතුරක්</option>
              <option class="group-3">5.බෝග හානි</option>
              <option class="group-3">6.නීති විරෝධී දේ සිදුවෙමින් පවතී</option>
            </select>
          </Form>
        </div>




        <div class="wrap">
          <div class="search">
            <input type="text" class="searchTerm" placeholder="වාර්තා අංකය මෙතැනින් සොයන්න" id="myInput" onkeyup="myFunction()" />
            <button type="submit" class="searchButton">
              <i class="fa fa-search">සොයන්න</i>

            </button>
          </div>
        </div>
      </div>



      <div class="subcontainer_3-3" style="overflow-x: auto">
        <table id="myTable">
          <tr class="firstRow">
            <th>වාර්තා කළ දිනය</th>
            <th>වාර්තා අංකය</th>
            <th>වනජීවී නිලධාරියාගේ නම</th>

            <th>වාර්තා වර්ගය</th>
            <th>ස්ථානය</th>
            <th>ක්රියාව</th>
            <th></th>
            <th>සිදුවීම් තත්ත්වය</th>

          </tr>
          <?php

          //  $count = 0;

          foreach ($data[0] as $row) {



            $d = "";
            $yes = 0;



            if ($row['NIC'] == $_SESSION['NIC']) {

              $yes = 1;
            }


            $d = $row['Fname'] . " " . $row['Lname'];
            if ($row['status'] == 'pending') {

              $stat = "<form method='POST' action='../wildlifeofficer/trigerRequest?lang=2'><input type='text' style='display:none' name='acc' value=" . $row['incidentID'] . "><button class='buttonAccept' id='acceptId' value='ACCEPT' name='accept'/>ACCEPT</button></form>";
            } else {

              if ($yes == 1) {
                $stat = "<form method='POST' action='../wildlifeofficer/trigerRequest?lang=2'><input type='text' style='display:none'  name='can' value=" . $row['incidentID'] . "><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel'/>CANCEL</button></form>";
              } else {
                $stat = "<form method='POST' action='../wildlifeofficer/trigerRequest?lang=2'><input type='text' style='display:none'  name='can' value=" . $row['incidentID'] . "><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel' disabled />CANCEL</button></form>";
              }
            }


            if ($yes == 1) {
              echo "<tr>
            <td>" . $row['date'] . "</td>
            <td>" . $row['incidentID'] . "</td>
      
            <td>" . $d . "</td>
            <td>" . $row['reporttype'] . "</td>
            <td>" . $row['Place'] . "</td>
            <td>" . $stat . "</td>
            
            <td><button type='submit' class='viewButton' id='view' onclick='' >
              <a href='../wildlifeofficer/viewIncidentDetails?name=" . $d . "&lang=2&index=" . $row['incidentID'] . "'>VIEW</a>
            </button></td>
            
            <td><Form action='../wildlifeofficer/setIncidentStatus?lang=2&index=" . $row['incidentID'] . "' method='POST' name='incidentStatus'>
           
           
            <select name='incidentStatus' id='incidentStatus' onchange='location = this.value;'>
           

            <option class='group-1' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=Pending'>Pending</option>

            <option class='group-1' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=Success'>Success</option>
            <option class='group-2' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=UnSuccess'>
                Unscusses
              </option>
              <option class='group-2' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=UnSuccess' selected>
              {$row['incidentStatus']}
              </option>
            </select>
            
          </Form></td>
            
            </tr>
          ";
            } else {
              echo "<tr>
            <td>" . $row['date'] . "</td>
            <td>" . $row['incidentID'] . "</td>
      
            <td>" . $d . "</td>
            <td>" . $row['reporttype'] . "</td>
            <td>" . $row['Place'] . "</td>
            <td>" . $stat . "</td>
            
            <td><button type='submit' class='viewButton' id='view' onclick='' >
              <a href='../wildlifeofficer/viewIncidentDetails?name=" . $d . "&lang=2&index=" .  $row['incidentID'] . "'>VIEW</a>
            </button></td>
            
            <td><Form action='../wildlifeofficer/setIncidentStatus?lang=2&index=" .  $row['incidentID'] . "' method='POST' name='incidentStatus'>
           
           
            <select name='incidentStatus' id='incidentStatus' onchange='location = this.value;' disabled>
           

            <option class='group-1' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=Pending'>Pending</option>

            <option class='group-1' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=Success'>Success</option>
            <option class='group-2' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=UnSuccess'>
                Unscusses
              </option>
              <option class='group-2' value='../wildlifeofficer/setIncidentStatus?lang=2&index={$row['incidentID']}&status=UnSuccess' selected>
              {$row['incidentStatus']}
              </option>
            </select>
            
          </Form></td>
            
            </tr>
          ";
            }

            $count += 1;
          }


          ?>
        </table>

      </div>
      <div class="subcontainer_3-1">

      </div>
      <div></div>

    </div>
</body>

</html>