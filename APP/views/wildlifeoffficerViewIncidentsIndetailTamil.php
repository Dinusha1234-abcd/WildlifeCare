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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/wildlifeofficerHeader.css">
  <link rel="stylesheet" href="../Public/css/wildlifeoffficerViewIncidentsIndetail.css">
  <script src="../Public/Javascript/login.js"></script>
  <script src="../Public/Javascript/viewReport.js"></script>
  <script src="../Public/Javascript/wildlifeofficer.js"></script>
  <script src="../Public/javascript/admin.js"></script>
  <link rel="stylesheet" href="../Public/css/notification.css">
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script> -->
  <title>View Incident Details</title>
  <script>
    function mapLocation() {
      var directionsDisplay;
      var directionsService = new google.maps.DirectionsService(); //make a object of directionsService
      var map;

      function initialize() { //show the incident location on the map
        directionsDisplay = new google.maps.DirectionsRenderer(); //make a object of directionsRenderer
        var city = new google.maps.LatLng(<?php echo $data[0][0]['lat'] ?>, <?php echo $data[0][0]['lon'] ?>); //make a object of LatLng by passing reported city data
        var mapOptions = {
          zoom: 15,
          center: city
        }; //set how to display

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); //make a object of Map and set where to display map
        //make a marker for city
        var marker = new google.maps.Marker({
          label: {
            color: "black",
            text: "<?php echo $data[0][0]['reporttype'] ?>"
          },

          position: city,
          map: map,
          dragble: true
        });
        directionsDisplay.setMap(map); //display the map
        google.maps.event.addDomListener(document.getElementById('Btn'), 'click', calcRoute); //when click the submit button(after store the location data) call the calcroute function
      }

      function calcRoute() {
        //get the lat lon data that store in the form
        const form = document.getElementById('myForm');
        const lat = form.elements['lat'];
        const lon = form.elements['ln'];

        // getting the element's value store it as lattitude and lontitude
        let lattitude = lat.value;
        let lontitude = lon.value;

        var start = new google.maps.LatLng(lattitude, lontitude);

        var end = new google.maps.LatLng(<?php echo $data[0][0]['lat'] ?>, <?php echo $data[0][0]['lon'] ?>);
        //make a marker for current location
        var startMarker = new google.maps.Marker({
          label: {
            color: "black",
            text: "Current Location"
          },
          position: start,
          map: map,
          dragble: true


        });



        //if current zoom size is not match, change the mapview it according to the locations to see clearly
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);
        var request = {
          origin: start,
          destination: end,
          travelMode: google.maps.TravelMode.DRIVING
        };
        //set the path between 2 locations
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response); //show route
            directionsDisplay.setMap(map); //show map
          } else {
            alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
          }
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize); //call initialize function when loading the map
    }
  </script>
  <script>
    var x = document.getElementById("demo ");

    function getLocation() { //when click the location track button it calls this function

      if (navigator.geolocation) { //to track location use api key with service geolocation

        navigator.geolocation.watchPosition(showPosition); //here showlocation is a callback function. it is in the below
      } else {

        x.innerHTML = "Geolocation is not supported by this browser. ";
      }
    }

    function showPosition(position) {

      let lat = position.coords.latitude; //pass current locations lat and lon that track by the watchposition method
      let lng = position.coords.longitude;
      const form = document.getElementById('myForm'); //access the hidden form in the below
      const lt = form.elements['lat']; //access form feild by its ids and crete references
      const lon = form.elements['ln'];
      const btn = form.elements['Btn'];

      lt.value = lat; //store tracked data in the references(put data to the form)
      lon.value = lng;
      btn.click(); //submit the form





    }
  </script>

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
        <li id="homeTamil"><a href="../?lang=3">????????????????????? ??????????????????</a></li>
        <li id="userPageTamil"><a href="../wildlifeofficer/?lang=3"> ??????????????? ?????????????????? </a></li>
        <li id="incidentsTamil"><a href="../wildlifeofficer/viewIncidents?lang=3"> ??????????????????????????????</a></li>
        <li id="notificationsTamil"><a href="../wildlifeofficer/viewNotification?lang=3">????????????????????????????????????</a></li>
        <li id="dashboardTamil"><a href="../wildlifeofficer/viewDashboard?lang=3">???????????? ????????????</a></li>
        <li>
          <div class="dropdown-1" style="  padding-left:  300px ">
            <button class="dropbtn-1">????????????</button>
            <div class="dropdown-content-1">
              <?php
              echo "
                <a href='?lang=1&index=" . $_GET['index'] . "&name=" . $_GET['name'] . "'>English</a>
                <a href='?lang=2&index=" . $_GET['index'] . "&name=" . $_GET['name'] .  "'>???????????????</a>
                <a href='?lang=3&index=" . $_GET['index'] . "&name=" . $_GET['name'] .  "'>???????????????</a> "
              ?>

            </div>
          </div>
        </li>
        <li class="dropdown">
          <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
          <div id="myDropdown" class="dropdown-content">
            <a href="../wildlifeofficer/viewProfile?lang=3">??????????????? ???????????????????????????</a>
            <a href="../user/logout?lang=3">????????????????????????</a>

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
        <img src="../Public/images/bell1.png" id="right" style=" font-weight: 600%;  font-weight: 602;margin-left: 10%;  ">&nbsp
        <h3>?????????????????????<br> ??????????????????????????????????????????????????????????????? &nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="submit" value="View" name="submitAlert" id="submit">
        </h3>
      </form>
    </div> <?php  }
            ?>
  </div>



  <div class="contanier_2">
    <div class="contanier_2-1">
      <?php if (isset($_POST['send'])) { ?>
        <div id="message1" style="padding: 10px; background-color:aliceblue">
          <h1>Your message sent to the veterinarian Sucessfully</h1>
          <a href="../wildlifeofficer/viewIncidents?lang=1" class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">OK</a>
        </div>
      <?php } ?>
    </div>
    <table>
      <tr class="firstRow">

        <th><?php echo $data[0][0]['reporttype']  ?></th>
        <th></th>
      </tr>
      <tr>
        <td>?????????????????????????????????????????? ????????????</td>
        <td><?php echo $data[0][0]['date']  ?></td>
      </tr>
      <tr>
        <td>????????????????????? ?????????</td>
        <td><?php echo $data[0][0]['incidentID']  ?></td>
      </tr>
      <tr>
        <td>???????????????????????????????????????????????? ????????????????????????????????? ??????????????? </td>
        <td> <?php
              if ($data[2][0]['gramaniladari_NIC'] != NULL) {
                echo $data[2][0]['Fname'] . " " . $data[2][0]['Lname'];
              } else {
                echo $data[3][0]['Fname'] . " " . $data[3][0]['Lname'];
              }
              ?></td>
      </tr>
      <tr>
        <td>?????????????????????????????????????????????????????? ??????????????????????????? ?????????????????????</td>
        <td><?php echo $_GET['name'] ?></td>
      </tr>
      <tr>
        <td>????????????</td>
        <td><?php echo $data[0][0]['Place']  ?><input type="button" class='buttonAccept' id="submitBtn" onclick="getLocation()" value="???????????????????????? ?????????, ???????????? ???????????????????????? ?????????????????????????????????????????? ??????????????????????????????????????????" /></td>
      </tr>


      <tr>
        <td>??????????????????????????? ????????????????????? ??????????????????????????????????????? ?????????????????????????</td>
        <td><?php
            if ($data[0][0]['sendToVetStatus'] == 'notvisible') {
              if ($data[0][0]['status'] == 'pending') {
                echo "??????????????????????????????????????? ???????????? ???????????? ?????????????????? ?????????????????????????????????";
              } else {
                echo "<form method='POST' action='../wildlifeofficer/sendToVet?id={$data[0][0]['incidentID']}&lang=1' >

                <div class='save_button'>
                  <input name='send' class='buttonAccept' type='submit' onclick='' value='SEND' />
                </div>
        
              </form>";
              }
            } else {
              echo "????????????????????? ??????????????????????????????????????????";
            }
            ?></td>
      </tr>
      <tr>
        <td>???????????????????????????????????? ????????????????????? ??????????????????????????????</td>
        <td><?php
            if ($data[1][0]['vetStatus'] == 'success') {
              echo $data[1][0]['Fname'] . " " . $data[1][0]['Lname'];
            } ?></td>
      </tr>



    </table>

    <div class="row_last">
      <div class="col__last"><?php
                              if ($data[0][0]['status'] == 'pending') {
                                $stat = "<form method='POST' action='../wildlifeofficer/trigerRequest'><input type='text' style='display:none' name='acc' value=" . $data[0][0]['incidentID'] . "><button class='buttonAccept' id='acceptId' value='ACCEPT' name='accept'/>ACCEPT</button></form>";
                              } else {
                                $stat = "<form method='POST' action='../wildlifeofficer/trigerRequest'><input type='text' style='display:none'  name='can' value=" . $data[0][0]['incidentID'] . "><button class='buttonCancel' id='cancelId' value='CANCEl' name='cancel'/>CANCEL</button></form>";
                              }
                              ?>
      </div>





      <form id="myForm">


        <input type='text' name='lat' id='lat' style="display: none;">
        <input type='text ' name='ln' id='ln' style="display: none;">
        <input type="button" id="Btn" value="route" style="display: none; " />



      </form>

    </div>
    <div class="map" id="map-canvas" style="height: 400px;">

    </div>
    <div class="last">

    </div>
  </div>
  <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=mapLocation&v=weekly' async></script>


</body>

</html>