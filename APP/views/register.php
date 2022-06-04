<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
  <link rel="stylesheet" href="../Public/css/header.css">
  <link rel="stylesheet" href="Public/css/home.css">
  <link rel="stylesheet" href="../Public/css/villagerRegiste.css">
  <script src="../Public/javascript/login2.js"></script>
  <script src="../Public/javascript/villagerRegister1.js"></script>
  <title>Registration Form</title>
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

        <ul class="nav-menu">
          <!-- <li id="lan"></li> -->
      
          <li id="home" style="padding: 15px 25px"><a href="../">Home</a></li>
          <li id="report" style="padding: 15px 30px"><a href="../incident/index?lang=1">Report Incidents</a></li>
          <li id="register" style="padding: 15px 40px; background-color:rgba(255, 255, 255, 0.36); "><a href="../villager/register?lang=1">Register</a></li>
          <li id="login" style="padding: 15px 30px"> <a id=login_text href="../user/index?lang=1">Login</a></li>

          <li class="dropdown">
            <button onclick="myFunction_2()" class="dropbtn">Language <i class="down"></i></button>
            <div id="myDropdown" class="dropdown-content">
              <a href="?lang=1">English</a>
              <a href="?lang=2">සිංහල</a>
              <a href="?lang=3">தமிழ்</a>
            </div>
          </li>
        </ul>
  </header>
  <h id="errorMessage"></h>
  <div id="message" style="display: none;">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <!-- <h id="errorMessage"></h> -->
  </div>


  <?php
  $division = $this->division;
  //  print_r($division);
  ?>
  <?php
  $result = $this->data;
  //  print_r($result);
  //  print_r($this->division);
  $status = false;
  if (isset($_POST['submit'])) {
    foreach ($result as $row) {
      if ($_POST['nic'] ==   $row['NIC']) {
        $status = true;
  ?>

        <div id="message1" style="padding: 10px; background-color:aliceblue">
          <!-- <h1>Wildlife Care</h1></br></br> -->
          <img src="../Public/images/error-icon.png" style="width:90px;  height:90px">
          <h1>Your National ID Card is already Register </h1>
          <!-- <h>Your Incident Report Submit Sucessfully</h> -->

          <a href="../user/index?lang=1" class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">login</a>
        </div>
  <?php


      }
    }
  } ?>
  <?php
  if (isset($_POST['submit'])) {

    if ($status ==  false) {
  ?>
      <div id="message1" style="padding: 10px; background-color:aliceblue">

        <img src="../Public/images/success-mesaage.png" style="width:90px;  height:90px">
        <h1>Thank You Registration Wildlife Care Management system</h1>
        <a href="../user/index?lang=1" class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">login</a>
      </div>
  <?php }
  }  ?>

  <div class="contanier2">
    <div class="register_header">
      <h3>Registration</h3>

    </div>


    <form class="form2" action="" method="post">

      <table id="form1">
        <tr>
          <td>
            <label for="fname">First Name</label>
          </td>
        </tr>
        <tr>
          <td><input type="text" class="text" id="fname" name="fname" placeholder="  Type your first name" /></td>
        </tr>
        <tr>
          <td>
            <label for="lname">Last Name</label>
          </td>
        </tr>
        <tr>
          <td><input type="text" class="text" id="lname" name="lname" placeholder="  Type your last name" /></td>
        </tr>
        <!-- <tr>
          <td><label for="gender">Gender</label></td>
        </tr>

        <tr>

          <td>
            <input type="radio" id="male" name="gender" value="M" />
            <label for="male">Male</label>
            <input type="radio" id="female " name="gender" value="F" />
            <label for="female">Female</label><br />
          </td>

        </tr> -->

        <!-- <tr>
          <td>
            <label for="dob">Date of Birth</label>
          </td>
        <tr>
          <td>
            <input class="text" type="date" id="dob" name="dob" />
          </td>
        </tr> -->

        </tr>
        <tr>
          <td>
            <label for="address">Address</label>
          </td>
        </tr>
        <tr>
          <td>
            <textarea class="text" id="address" name="address" rows="2">  Type here your address
              </textarea>
          </td>
        </tr>

        <tr>
          <td><label for="province">Province</label> </td>
        </tr>
        <tr>
          <td>
            <script>
              function populateDistrict(s1, s2) {
                var s1 = document.getElementById(s1);
                var s2 = document.getElementById(s2);

                s2.innerHTML = "";
                if (s1.value == "Central") {
                  var optionArray = [  "Kandy|Kandy", "Matale|Matale", "Nuwara Eliya|Nuwara Eliya"]
                } else if (s1.value == "Eastern") {
                  var optionArray = [  "Ampara|Ampara", "Batticaloa|Batticaloa", "Trincomalee|Trincomalee"]
                } else if (s1.value == "Northern") {
                  var optionArray = [  "Jaffna|Jaffna", "Kilinochchi|Kilinochchi", "Mannar|Mannar", "Mullaitivu|Mullaitivu"]
                } else if (s1.value == "Southern") {
                  var optionArray = [  "Galle|Galle", "Matara|Matara", "Hambantota|Hambantota"]
                } else if (s1.value == "NorthWestern") {
                  var optionArray = [ "Kurunegala|Kurunegala", "Puttalam|Puttalam"]
                } else if (s1.value == "Western") {
                  var optionArray = [ "Colombo|Colombo", "Gampaha|Gampaha","Kalutha ra|Kaluthara"]
                } else if (s1.value == "NorthCentral") {
                  var optionArray = [ "Anuradhapura|Anuradhapura", "Polonnaruwa|Polonnaruwa"]
                } else if (s1.value == "Uva") {
                  var optionArray = [   "Badulla|Badulla", "Moneragala|Moneragala"]
                } else if (s1.value == "Sabaragamuwa") {
                  var optionArray = [ "Ratnapura|Ratnapura", "Kegalle|Kegalle"]
                } else {
                  var optionArray = ["|Choose here"]
                }

                for (var option in optionArray) {
                  var pair = optionArray[option].split("|");
                  var newOption = document.createElement("option");
                  newOption.value = pair[0];
                  newOption.innerHTML = pair[1];
                  s2.options.add(newOption);
                }
              }
        
               
            </script>
            <select class="text" name="province" id="province" onclick="populateDistrict(this.id,'district')">
              <option value=""> Choose here</option>
              <option value="Central">Central Province</option>
              <option value="Eastern">Eastern Province</option>
              <option value="Northern">Northern Province</option>
              <option value="Southern">Southern Province</option>
              <option value="Western">Western Province</option>
              <option value="NorthWestern"> North Western Province </option>
              <option value="NorthCentral"> North Central Province </option>
              <option value="Uva">Uva Province</option>
              <option value="Sabaragamuwa"> Sabaragamuwa Province </option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="district">District</label> </td>
        </tr>
        <tr>
          <td>    <script>
              function populateGnd(s1, s2) {
                var s1 = document.getElementById(s1);
                var s2 = document.getElementById(s2);

                s2.innerHTML = "";   
                if (s1.value == "Kandy") {
                  var optionArray = ["Akurana|Akurana","Pathadumbara|Pathadumbara","Panvila|Panvila"]
                } else if (s1.value == "Matale") {
                  var optionArray = ["Yatawatta|Yatawatta","Galwela|Galwela","Dambulla|Dambulla","Naula|Naula","Pallepola|Pallepola"] 
                } else if (s1.value == "Nuwara Eliya") {
                  var optionArray = ["Kothmale","Walapane","Nuwara Eliya","Ambagamuwa"]
                } else if (s1.value == "Ampara") {
                  var optionArray = ["Dehiattakandiya|Dehiattakandiya"|"Hanguranketha|Hanguranketha","Padiyathalawa|Padiyathalawa","Mahaoya|Mahaoya","Uhana|Uhana"]
                } else if (s1.value == "Batticaloa") {
                  var optionArray = ["Koralai Pattu North|Koralai Pattu North","Manmunai North|Manmunai North","Manmunai West|Manmunai West","Porativu Pattu|Porativu Pattu","Eravur Town|Eravur Town"]
                } else if (s1.value == "Trincomalee") {
                  var optionArray = ["Padavi Sri Pura|Padavi Sri Pura","Kuchchaveli|Kuchchaveli","Gomarankadawala|Gomarankadawala","Morawewa|Morawewa","Kantale|Kantale"]
                } else if (s1.value == "Jaffna") {
                  var optionArray = []
                } else if (s1.value == "Kilinochchi") {
                  var optionArray = []
                } else if (s1.value == "Mannar") {
                  var optionArray = []
                } else if (s1.value == "Mullaitivu") {
                  var optionArray = []
                } else if (s1.value == "Galle") {
                  var optionArray = ["Benthota|Benthota","Balapitiya|Balapitiya","Elpitiya|Elpitiya","Niyagamuwa|Niyagamuwa","Niyagamuwa|Niyagamuwa","Thawalama|Thawalama"]
                } else if (s1.value == "Matara") {
                  var optionArray = ["Deniyaya|Deniyaya","Pitabeddara|Pitabeddara","Kotapola|Kotapola","Pasgoda|Pasgoda","Mulatiyana|Mulatiyana","Athuraliya|Athuraliya"]
                } else if (s1.value == "Hambantota") {
                  var optionArray = ["Thissamaharama|Thissamaharama", "Sooriyawewa|Sooriyawewa", "Lunugamwehera|Lunugamwehera", "Hambanthota|Hambanthota", "Weeraketiya|Weeraketiya", "Angunukolapelassa|Angunukolapelassa", "Katuwana|Katuwana", "Hingurakgoda|Hingurakgoda","Sooriyawewa|Sooriyawewa","Thissamaharama|Thissamaharama","hambanthota|hambanthota","Weeraketiya|Weeraketiya"]
                } else if (s1.value == "Kurunegala") {
                  var optionArray = ["Giribawa|Giribawa","Galgamuwa|Galgamuwa","Ehetuwewa|Ehetuwewa","Kotavehera|Kotavehera","Nikaweratiya|Nikaweratiya"]
                } else if (s1.value == "Puttalam") {
                  var optionArray = ["Kalpitiya|Kalpitiya","Vanathavilluwa|Vanathavilluwa","Karuwalagaswewa|Karuwalagaswewa","Puttalam|Puttalam","Pallama|Pallama"]
                } else if (s1.value == "Colombo") {
                  var optionArray = ["Colombo|Colombo","Kolonnawa|Kolonnawa","Kaduwela|Kaduwela","Homagama|Homagama","Hanwella|Hanwella"]
                } else if (s1.value == "Gampaha") {
                  var optionArray = [ "Negambo|Negambo","Katana|Katana","Divulapitiya|Divulapitiya","Mirigama|Mirigama","Miniwangoda|Miniwangoda" ]
                } else if (s1.value == "Kaluthara") {
                  var optionArray = ["Panadura|Panadura","Bandaragama|Bandaragama","Horana|Horana","Ingiriya|Ingiriya","Kalutara|Kalutara","Madurawela|Madurawela"  ]
                } else if (s1.value == "Anuradhapura") {
                  var optionArray = ["Padaviya|Padaviya", "Galenbindunuwawa|Galenbindunuwawa", "Kekirawa|Kekirawa", "Kabethigollawa|Kabethigollawa", "Medawachchiya|Medawachchiya", "Kahatagasdigiliya|Kahatagasdigiliya", "Horowpathana|Horowpathana","Rambewa|Rambewa"] 
                } else if (s1.value == "Polonnaruwa") {
                  var optionArray = ["Elahera|Elahera", "Dimbulagala|Dimbulagala", "Welikanda|Welikanda", "Thamankaduwa|Thamankaduwa", "Hingurakgoda|Hingurakgoda", "Medirigiriya|Medirigiriya", "Lankapura|Lankapura"]
                } else if (s1.value == "Badulla") {
                  var optionArray = []
                } else if (s1.value == "Moneragala") {
                  var optionArray = []
                } else if (s1.value == "Kegalle") {
                  var optionArray = []
                } else if (s1.value == "Ratnapura") {
                  var optionArray = []
                } else {
                  var optionArray = ["|Choose here"]
                }

                for (var option in optionArray) {
                  var pair = optionArray[option].split("|");
                  var newOption = document.createElement("option");
                  newOption.value = pair[0];
                  newOption.innerHTML = pair[1];
                  s2.options.add(newOption);
                }
              }  </script>
            <select class="text" name="district" id="district" onclick="populateGnd(this.id,'gndivision')">
              <option value=""> Choose here</option>

            </select>
          </td>
        </tr>

        <tr>
          <td><label for="gndivision">Gramaniladari Division</label> </td>
        </tr>
        <tr>
          <td><select class="text" name="gndivision" id="gndivision" onclick="populateVillager(this.id,'villager')" >
              <option value="">Choose here</option>
              <!-- <?php
              //Get list data of gramaseweka name
              foreach ($division  as $row) { ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
              <?php } ?> -->
        </tr>
        <tr>
          <td><label for="district">Villager Name</label> </td>
        </tr>
        <tr>
          <td>    <script>
              function populateVillager(s1, s2) {
                var s1 = document.getElementById(s1);
                var s2 = document.getElementById(s2);

                s2.innerHTML = "";   
                if (s1.value == "Thumpane") {
                  var optionArray = ["Meegahahena south|Meegahahena south"]
                } else if (s1.value == "Panvila") {
                  var optionArray = ["Watakele|Watakele" ] 
                } else if (s1.value == "Benthota") {
                  var optionArray = ["Kammala|Kammala","Bodimaluwa|Bodimaluwa"]
                } else if (s1.value == "Balapitiya") {
                  var optionArray = ["Katuvila|Katuvila","Mahapitiya|Mahapitiya"]
                } else if (s1.value == "Elpitiya") {
                  var optionArray = ["Delpona|Delpona","Dikhena|Dikhena"]
                } else if (s1.value == "Niyagamuwa") {
                  var optionArray = ["Hattaka|Hattaka","Pitigala|Pitigala"]
                } else if (s1.value == "Thawalama") {
                  var optionArray = ["Kudagalpola|Kudagalpola","Batahena|Batahena"]
                } else if (s1.value == "Panvila") {
                  var optionArray = ["Mahapathana|Mahapathana"]
                } else if (s1.value == "Pitabeddara") {
                  var optionArray = ["Galbada|Galbada","Weliva|Weliva"]
                } else if (s1.value == "Kotapola") {
                  var optionArray = ["Mederipitiya|Mederipitiya","Kiriweldola|Kiriweldola"]
                } else if (s1.value == "Pasgoda") {
                  var optionArray = ["Pathawita|Pathawita","Wijayagama|Wijayagama"]
                } else if (s1.value == "Mulatiyana") {
                  var optionArray = ["Gammadda|Gammadda","Mulatiyana|Mulatiyana"]
                } else if (s1.value == "Athuraliya") {
                  var optionArray = ["Urumuththa|Urumuththa","Kehelwala|Kehelwala"]
                } else if (s1.value == "Galwela") {
                  var optionArray = ["Wetakoluwewa|Wetakoluwewa"]
                } else if (s1.value == "Sooriyawewa") {
                  var optionArray = ["Mahagalwewa|Mahagalwewa","Ranmuduwewa|Ranmuduwewa"]
                } else if (s1.value == "Lunugamvehera") {
                  var optionArray = ["seenimunna|seenimunna","Padavigama|Padavigama"]
                } else if (s1.value == "Thissamaharama") {
                  var optionArray = [ "Tissamaharama|Tissamaharama","Medawelena|Medawelena"]
                } else if (s1.value == "hambanthota") {
                  var optionArray = ["Tammennawa|Tammennawa","Katanwewa|Katanwewa"  ]
                } else if (s1.value == "Weeraketiya") {
                  var optionArray = ["Mulanyaya|Mulanyaya","Kandamaditta|Kandamaditta"] 
                } else if (s1.value == "Athuraliya") {
                  var optionArray = ["Ibbankatuwawa|Ibbankatuwawa" ]
                } else if (s1.value == "Colombo") {
                  var optionArray = ["Modara|Modara","Mahawatta|Mahawatta"]
                } else if (s1.value == "Kolonnawa") {
                  var optionArray = ["Wadulla|Wadulla","Sedawatta|Sedawatta"]
                } else if (s1.value == "Kaduwela") {
                  var optionArray = ["Welivita|Welivita","Hewagama|Hewagama"]
                } else if (s1.value == "Homagama") {
                  var optionArray = ["Jalthara|Jalthara","Henpita|Henpita","Kuadagama|Kuadagama","Manakada|Manakada"]
                } else if (s1.value == "Dambulla") {
                  var optionArray = ["Pindurangala|Pindurangala","Thalkote|Thalkote" ]
                } else if (s1.value == "Negambo") {
                  var optionArray = ["Kattuwa|Kattuwa","Kammalthura|Kammalthura"]
                } else if (s1.value == "Katana") {
                  var optionArray = ["Muruthana|Muruthana","Manaveriya|Manaveriya"]
                } else if (s1.value == "Divulapitiya") {
                  var optionArray = ["Andimulla|Andimulla","Ambalayaya|Ambalayaya"]
                } else if (s1.value == "Mirigama") {
                  var optionArray = ["Nalla|Nalla","Giriullagama|Giriullagama"]
                } else if (s1.value == "Miniwangoda") {
                  var optionArray = ["Galkanda|Galkanda","Watinapaha|Watinapaha"]
                } else if (s1.value == "Panadura") {
                  var optionArray = ["Paratta|Paratta","Diggala|Diggala"]
                } else if (s1.value == "Bandaragama") {
                  var optionArray = ["Newdawa|Newdawa","Senapura|Senapura","Halapitiya|Halapitiya","Wellmilla|Wellmilla","Arakavila|Arakavila","Kandanapitiya|Kandanapitiya"]
                } else if (s1.value == "Madurawela") {
                  var optionArray = ["Werawatta|Werawatta","Walpita|Walpita"]
                } else if (s1.value == "Naula") {
                  var optionArray = ["Ussanttawa|Ussanttawa","Haduwa|Haduwa"]
                } else if (s1.value == "Pallepola") {
                  var optionArray = ["Janakagama|Janakagama","Demada oya|Demada oya"]
                } else if (s1.value == "Thumpane") {
                  var optionArray = ["Meegahahena|Meegahahena","Galabawa|Galabawa"]
                } else if (s1.value == "Kothmale") {
                  var optionArray = ["Polwathura|Polwathura","Pahalakoraka oya|Pahalakoraka oya"]
                } else if (s1.value == "Hanguranketha") {
                  var optionArray = ["Ambewela|Ambewela","Welikada|Welikada"]
                } else if (s1.value == "Walapane") {
                  var optionArray = ["Serasunthanna|Serasunthanna","Hagasulla|Hagasulla"]
                } else if (s1.value == "Nuwara Eliya") {
                  var optionArray = ["Bogahawatta|Bogahawatta","Watagoda|Watagoda"]
                } else if (s1.value == "Ambagamuwa") {
                  var optionArray = ["Pitawala|Pitawala","Kalugala|Kalugala"]
                } else if (s1.value == "Koralai Pattu North") {
                  var optionArray = ["Kayankerni|Kayankerni","Mankerni center|Mankerni center"]
                }
                else if (s1.value == "Manmunai North") {
                  var optionArray = ["Navaladi|Navaladi","Amirthakali|Amirthakali"]
                }else if (s1.value == "Manmunai West") {
                  var optionArray = ["Nawatkadu|Nawatkadu","Nediyamadu|Nediyamadu"]
                }else if (s1.value == "Porativu Pattu") {
                  var optionArray = ["Selwapuram|Selwapuram","Kanthipuram|Kanthipuram"]
                }else if (s1.value == "Poojapitiya") {
                  var optionArray = ["Ihalamulla|Ihalamulla","Dehiwatta|Dehiwatta"]
                }else if (s1.value == "Eravur Town") {
                  var optionArray = ["Eravur 02B|Eravur 02B"]
                }else if (s1.value == "Poojapitiya") {
                  var optionArray = ["Eravur 02c|Eravur 02c"]
                }else if (s1.value == "Dehiattakandiya") {
                  var optionArray = ["Kadirapura|Kadirapura","Rideella|Rideella","Serankada|Serankada","Unapana|Unapana"]
                }else if (s1.value == "Mahaoya") {
                  var optionArray = ["Bogamuyaya|Bogamuyaya","Thempitiya|Thempitiya"]
                }else if (s1.value == "Uhana") {
                  var optionArray = ["Nawagiriyaya|Nawagiriyaya","Piyangala|Piyangala"]
                }else if (s1.value == "Padavi Sri Pura") {
                  var optionArray = ["Sewa Janapada|Sewa Janapada","Gamunupura|Gamunupura"]
                }else if (s1.value == "Kuchchaveli") {
                  var optionArray = ["Polmoddai G-3|Polmoddai G-3","Polmoddai H-2|Polmoddai H-2"]
                }else if (s1.value == "Morawewa") {
                  var optionArray = ["Morawewa North|Morawewa North","Morawewa South|Morawewa South"]
                }else if (s1.value == "Gomarankadawala") {
                  var optionArray = ["Galkadawala|Galkadawala","Kalyanipura|Kalyanipura"]
                }else if (s1.value == "Kantale") {
                  var optionArray = ["Bathiyagama|Bathiyagama","Kuchchaveli|Kuchchaveli"]
                }else if (s1.value == "Akurana") {
                  var optionArray = ["Walahena|Walahena","Alawathugoda|Alawathugoda"]
                }else if (s1.value == "Padaviya") {
                  var optionArray = ["Buddagala|Buddagala","Ambayapura|Ambayapura"]
                }else if (s1.value == "Kabithigollewa") {
                  var optionArray = ["Kurulugama|Kurulugama","Galwewa|Galwewa"]
                }else if (s1.value == "Medawachchiya") {
                  var optionArray = ["Prabodhagama|Prabodhagama","Paranahalmillewa|Paranahalmillewa"]
                }else if (s1.value == "Rambewa") {
                  var optionArray = ["Siyambalagaswewa|Siyambalagaswewa","Horawpathana|Horawpathana"]
                } else if (s1.value == "Galenbindunuwewa") {
                  var optionArray = ["Katharanpura|Katharanpura","Dutuwewa|Dutuwewa"]
                } else if (s1.value == "Hingurakgoda") {
                  var optionArray = ["Sinhagama|Sinhagama","Sinhagama|Galoya"]
                } else if (s1.value == "Medirigiriya") {
                  var optionArray = ["Jayathugama|Jayathugama","Ekamuthugama|Ekamuthugama"]
                } else if (s1.value == "Lankapura") {
                  var optionArray = ["Jayabima|Jayabima","Jayapura|Jayapura"]
                } else if (s1.value == "Welikanda") {
                  var optionArray = ["Sinhapura|Sinhapura","Kandakaduwa|Kandakaduwa"]
                } else if (s1.value == "Thamankaduwa") {
                  var optionArray = ["Vijayabahu pura|Vijayabahu pura","Sewagama|Sewagama"]
                } else if (s1.value == "Medirigiriya") {
                  var optionArray = ["Jayathugama|Jayathugama","Ekamuthugama|Ekamuthugama"]
                } else if (s1.value == "Pathadumbara") {
                  var optionArray = ["Yatawara|Yatawara","Doragamuwa|Doragamuwa"]
                } else if (s1.value == "Giribawa") {
                  var optionArray = ["Jayanathipura|Jayanathipura","Sandagala|Sandagala"]
                } else if (s1.value == "Galgamuwa") {
                  var optionArray = ["Walagambapura|Walagambapura","Medagama|Medagama"]
                } else if (s1.value == "Giribawa") {
                  var optionArray = ["Jayanathipura|Jayanathipura","Sandagala|Sandagala"]
                } else if (s1.value == "Ehetuwewa") {
                  var optionArray = ["Bongama|Bongama","Andarawewa|Andarawewa"]
                } else if (s1.value == "Kotavehera") {
                  var optionArray = ["Kumbukwewa|Kumbukwewa","Digannawa|Digannawa"]
                } else if (s1.value == "Nikaweratiya") {
                  var optionArray = ["Thubulla|Thubulla","Waduressa|Waduressa"]
                } else if (s1.value == "Kalpitiya") {
                  var optionArray = ["Anawasala|Anawasala","Palliyawatta|Palliyawatta"]
                } else if (s1.value == "Vanathavilluwa") {
                  var optionArray = ["Pukkulama|Pukkulama","Ralmaduwa|Ralmaduwa"]
                } else if (s1.value == "Karuwalagaswewa") {
                  var optionArray = ["Saliyawewa C|Saliyawewa C","Saliyawewa B|Saliyawewa B"]
                } else if (s1.value == "Puttalam") {
                  var optionArray = ["Mullipuram|Mullipuram","Nelumwewa|Nelumwewa"]
                } else if (s1.value == "Pallama") {
                  var optionArray = ["Nagawila|Nagawila","Siyambalagaswewa|Siyambalagaswewa"]
                } else {
                  var optionArray = ["|Choose here"]
                }

                for (var option in optionArray) {
                  var pair = optionArray[option].split("|");
                  var newOption = document.createElement("option");
                  newOption.value = pair[0];
                  newOption.innerHTML = pair[1];
                  s2.options.add(newOption);
                }
              }  </script>
            <select class="text" name="village" id="villager"  >
              <option value=""> Choose here</option>

            </select>
          </td>
        </tr>

        <tr>
          <td><label for="nic">NIC</label> </td>
        </tr>
        <tr>
          <td><input class="text" type="text" id="nic" name="nic" placeholder="  Type your NIC" /></td>
        </tr>
        <tr>
          <td><label for="email">Email</label> </td>
        </tr>
        <tr>
          <td><input class="text" type="email" id="email" name="email" placeholder="  Type your email" /></td>
        </tr>
        <tr>
          <td><label for="email">Telephone Number</label> </td>
        </tr>
        <tr>
          <td><input class="text" type="tp" id="tp" name="tp" placeholder="  Type your telephone number" /></td>
        </tr>
        <tr>
          <td><label for="password">Password</label> </td>
        <tr>
          <td><input type="password" class="text" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="  Enter Your  password" required>
            <div id="message_1">
              <p>
                <h id="letter1" class="invalid">A <b>lowercase</b> letter </h>
                <h id="capital" class="invalid">A <b>capital (uppercase)</b> letter</h>
                <h id="number" class="invalid">A <b>number</b></h>
                <h id="length" class="invalid">Minimum <b>8 characters</b></h>
              </p>
            </div>
          </td>
        </tr>
        <td><label for="password">Retype Password</label> </td>
        <tr>
          <td><input class="text" type="password" id="cpassword" name="cpassword" placeholder="  Retype the password" /></td>
        </tr>
        <div id="message_2">
          <h id="letter">Password and Confirm Password are Not Match</h>
        </div>
        <tr>
          <td></td>
        </tr>
      </table>
      <div class="sumbit2">
        <input type="submit" name="submit" onclick="return validation( )" value="Register" />
      </div>
      <div class="last">
      </div>
    </form>
      </div>
  </div>


  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter1");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var confirmpsw = document.getElementById("cpassword");

    // Villager clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message_1").style.display = "block";
    }

    //Villager clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message_1").style.display = "none";
    }
 
    //Villager starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>
</body>

</html>