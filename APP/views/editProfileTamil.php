<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="../Public/css/notification.css">
    <link rel="stylesheet" href="../Public/css/alert.css">
  <link rel="stylesheet" href="../Public/css/villgereditProfile.css">
  <link rel="stylesheet" href="../Public/css/popupNotification.css">
  <script src="../Public/Javascript/login1.js"></script>
 <title>Edit Profile</title>
</head>
 <body></body>
<header id="main" style="Z-index :100;">
        <img src="../Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul>
                <li id="home_2"><a href="../">Home</a></li>
                <li id="dashboard_1"  ><a href="../user/viewpage?lang=1">Main Menu</a></li>
                <li id="report_2"><a a href="../incident/index?lang=1">Report Incidents</a></li>
               <li id="special_1"><a href="../villager/viewSpecialNotice?lang=1">SpecialNotice </a></li> 
 
                <div class="dropdown-1" style="  padding-left:  300px ">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                        <a href="?lang=1">English</a>
                        <a href="?lang=2">සිංහල</a>
                        <a href="?lang=3">தமிழ்</a>
                    </div>
                </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
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
        if ($this->status  == "notview"&&$this->notification > 0) {
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

            <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->
       
                <form action="../villager/viewNotification?lang=1" method="post" style="display: inline-block;">
                    <img src="../Public/images/bell1.png" id="right">&nbsp&nbsp
                    <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="View" name="submitAlert" id="submit">
                    </h3>
                </form>
        </div>
        <?php

if (isset($_POST['Submit'])) {
?>

    <div id="popupmessage"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div> 
 
    <?php }  ?>
    <?php

    } else if ($this->status  == "notview")  {
         
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

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div>  
<?php

}
 
?>
    <?php }
        
     elseif ($this->notification > 0) {  ?>
 
        <div id="notificationmessage">

            <!-- <img src="../Public/images/alertIcon.png" style="width:1000px;  height:100000px"><br> -->

            <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                <img src="../Public/images/bell1.png" id="bell">&nbsp&nbsp
                <h3>You have New Notification (<?php echo $this->notification ?>) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" value="View" name="submitAlert" id="submit">
                </h3>
            </form>
        </div>
        <?php if (isset($_POST['Submit'])) {
?>

    <div id="popupmessagelast"  >
        <form action="?lang=1&report=1" method="post" style="display: inline-block;">
        <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
            <h3>Your Report Incident Submit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             </h3>
        </form>
 
    </div>  
<?php

}
 
?>
<?php }else{
    
   ?>      <?php
         if (isset($_POST['submit'])) {
             // $this->model->updateprofile($_SESSION['NIC'],$_POST['fname'],$_POST['lname'],$_POST['dob'],$_POST['address'],$_POST['province'] );
              if (password_verify(trim($_POST["oldPassword"]),  $this->hashpassword  )) {
                 // $this->model->updateprofile($_SESSION['NIC'],$_POST['fname'],$_POST['lname'],$_POST['dob'],$_POST['address'],$_POST['newPassword'] );
                 ?> <div id="popupmessagefirst"  >
                  <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                  <img src="../Public/images/success-mesaage.png"  id="alert" >&nbsp&nbsp
                      <h3>Your Report Incident aaaaSubmit Sucessfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                       </h3>
                  </form>
           
              </div>  
               <?php }else{  ?>
                <div id="popupmessagefirst" style="Z-index :99; background-color: white;"  >
                  <form action="?lang=1&report=1" method="post" style="display: inline-block;">
                  <img src="../Public/images/error-icon.png"  id="alert" >&nbsp&nbsp
                      <h3>Your Old password is incorrect Please Try again &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                       </h3>
                  </form>
           
              </div> 
             <?php }  ?>
  

      
    <?php
    
    }
     
    ?> <?php }}
    ?>
    <div class="contanier_2">
      <div>
        <?php  $result = $this->userData;
          // print_r($result);
          foreach ( $result as $row){
              $fname = $row['Fname'];
              $lname = $row['Lname'];
              $birthDay = $row['BOD'];
              $address =  $row['Address'];
              $mobileNumber =  $row['mobileNo'];
              $email = $row['email'];
          } ?>

        <!-- ?> -->
        <?php $result = $this->userData;
        foreach ($result as $row) {
          $fname = $row['Fname'];
          $lname = $row['Lname'];
          $birthDay = $row['BOD'];
          $address =  $row['Address'];
          $mobileNumber =  $row['mobileNo'];
          $email = $row['email'];
        } ?>

      </div>
      <div class="contanier_2-1" >
        <div class="view_profile">
           <h3 style="color: white; "><a href="../villager/viewProfile?lang=1">පැතිකඩ</a></h3>
        </div>
        <div class="edit_profile">
          <h3><a style="color: white;" href="#">සංස්කරණය</a></h3>
        </div>
      </div>
 
      <form class="form2" action="" method="post">
          <p>உங்கள் சுயவிவர விவரங்களைப் புதுப்பிப்பதை உறுதிசெய்து கொள்ளவும், உங்கள் கடவுச்சொல்லை உள்ளிட வேண்டும்</p>
        <table id="form1">
          <tr>
            <th>
              <label for="fname" style="font-weight: 100;">முதல் பெயர்</label>
            </th>
            <th>
              <input type="text" class="text" id="fname" name="fname" value="<?php echo $fname ?>" />
            </th>
          </tr>
          <tr>
            <th>
              <label for="lname" style="font-weight: 100;">கடைசி பெயர்</label>
            </th>
            <th>
              <input type="text" class="text" id="lname" name="lname" value="<?php echo $lname ?>" />
            </th>
          </tr>


          <tr>
            <th>
              <label for="dob" style="font-weight: 100;">பிறந்த தேதி</label>
            </th>

            <th>
              <input class="text" type="date" id="dob" name="dob" value="<?php echo   $birthDay ?>" />
            </th>
          </tr>


          <tr>
            <th>
              <label for="address" style="font-weight: 100;">முகவரி </label>
            </th>
            <th>
              <textarea class="text" id="address" name="address" rows="2"><?php echo   $address ?></textarea>
              <p style="font-size: 12px;  color:red;">(உங்கள் முகவரியை மாற்ற முடியுமானால்   <?php echo $this->GramaniladhariDivision ?> கிராமநிலதாரி இடம் மட்டுமே)</p>
            </th>
          </tr>


          <tr>
            <th>
              <label for="province" style="font-weight: 100;">மாகாணம்</label>
            </th>
            <th>
              
              <p style="font-size: 15px;  font-wight:100"><?php echo $this->province . "Province"; ?></p>
            
            </th>
          </tr>
          <script>
            function populate(s1, s2) {
              var s1 = document.getElementById(s1);
              var s2 = document.getElementById(s2);

              s2.innerHTML = "";
              if (s1.value == "Central") {
                var optionArray = ["Kandy|Kandy", "Matale|Matale", "Nuwara Eliya|Nuwara Eliya"]
              } else if (s1.value == "Eastern") {
                var optionArray = ["Ampara|Ampara", "Batticaloa|Batticaloa", "Trincomalee|Trincomalee"]
              } else if (s1.value == "Northern") {
                var optionArray = ["Jaffna|Jaffna", "Kilinochchi|Kilinochchi", "Mannar|Mannar", "Mullaitivu|Mullaitivu"]
              } else if (s1.value == "Southern") {
                var optionArray = ["Galle|Galle", "Matara|Matara", "Hambantota|Hambantota"]
              } else if (s1.value == "NorthWestern") {
                var optionArray = ["Kurunegala|Kurunegala", "Puttalam|Puttalam"]
              } else if (s1.value == "NorthCentral") {
                var optionArray = ["Anuradhapura|Anuradhapura", "Polonnaruwa|Polonnaruwa"]
              } else if (s1.value == "Uva") {
                var optionArray = ["Badulla|Badulla", "Moneragala|Moneragala"]
              } else if (s1.value == "Sabaragamuwa") {
                var optionArray = ["Ratnapura|Ratnapura", "Kegalle|Kegalle"]
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
          <tr>
            <th>
              <label for="district" style="font-weight: 100;">மாவட்டம்</label>
            </th>
            <th>
                <p style="font-size: 15px;  font-wight:100"><?php echo $this->district ?></pl>

              </select>
            </th>
          </tr>
          <tr>
            <th>
              <label for="gndivision" style="font-weight: 100;">கிராம அலுவலர் பிரிவு</label>
            </th>
            <th> 

                
                  <p style="font-size: 15px;  font-wight:100"> <?php echo $this->GramaniladhariDivision ?> </p>
                
              </select>
            </th>
          </tr>

          <tr>
            <th>
              <label for="email" style="font-weight: 100;">மின்னஞ்சல்</label>
            </th>

            <th><input class="text" type="email" id="email" name="email" value="<?php echo   $email ?>" /></th>
          </tr>
          <tr>
            <th>
              <label for="email" style="font-weight: 100;">தொலைபேசி எண்</label>
            </th>
            <th><input class="text" type="tp" id="tp" name="tp" value="0<?php echo   $mobileNumber ?>" /></th>
          </tr>

          <tr>
            <th>
              <label for="password" style="font-weight: 100;">கடவுச்சொல்</label>
            <th><input class="text" type="password" id="password" name="oldPassword" placeholder="Type a Old password" /></th>
          </tr>
         </select>
              </th>
      </tr>
        
  
             <?php //if(isset($this->statusPassword)){
            //  echo 'name'.$this->statusPassword; //}?>
      </form>  
      
          <tr>
            <th>
              <label for="password" style="font-weight: 100;">புதிய கடவுச்சொல்</label>
            <th><input class="text" type="password" id="password" name="newPassword" placeholder="Type New password for your profile" /></th>
          </tr>
          <tr>
          <tr>
            <th>
              <label for="cpassword" style="font-weight: 100;">கடவுச்சொல்லை உறுதிப்படுத்தவும்</label>
            </th>
            <th><input class="text" type="password" id="cpassword" name=" " placeholder="Reype the password" /></th>
          </tr>
        </table>
        <div class="sumbit2">
          <input type="submit" name="submit" onclick="return validation()" value="Update" />
        </div>
    </div>
    </form>
    </div>
    </div>
  </body>
