<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Public/css/register.css">
    <link rel="stylesheet" href="../Public/css/header.css">
    <link rel="stylesheet" href="Public/css/home.css">

    <script src="../Public/javascript/login2.js"></script>
    <script src="../Public/javascript/villagerRegister1.js"></script>
    <title>பதிவு படிவம்</title>
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
                <li id="home"><a href="../">Home</a></li>
                <li id="report"><a href="../incident/index?lang=1">Report Incidents</a></li>
                <li id="register"><a href="../villager/register?lang=1">Register</a></li>
                <li id="login"><a id=login_text href="../user/index?lang=1">Login</a></li>
                
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
     if(isset($_POST['submit'])){
     foreach ($result as $row){
         if($_POST['nic'] ==   $row['NIC'] ){ 
           $status = true;
           ?>
            
            <div id="message1" style="padding: 10px; background-color:aliceblue">
           <!-- <h1>Wildlife Care</h1></br></br> -->
           <img src="../Public/images/error-icon.png" style="width:90px;  height:90px">
           <h1>உங்கள் தேசிய அடையாள அட்டை ஏற்கனவே பதிவு செய்யப்பட்டுள்ளது </h1>
           <!-- <h>Your Incident Report Submit Sucessfully</h> -->
           
           <a href="../user/index?lang=1"  class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">login</a>
           </div>
          <?php
          
     
     }}} ?>
     <?php  
     if(isset($_POST['submit'])){
      
        if($status ==  false){ 
     ?>
      <div id="message1" style="padding: 10px; background-color:aliceblue">
          
           <img src="../Public/images/success-mesaage.png" style="width:90px;  height:90px">
           <h1>நன்றி பதிவு வனவிலங்கு பராமரிப்பு மேலாண்மை அமைப்பு</h1> 
           <a href="../user/index?lang=1"  class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">login</a>
           </div>
       <?php } }  ?>
  <div class="contanier2">
    <div class="register_header">
          <h3>பதிவு</h3>
    
      </div>
  

    <form class="form2" action=""   method="post">
   	
     <table id="form1">
      <tr>
        <td >
          <label for="fname">முதல் பெயர்</label>
        </td>
      </tr>
      <tr><td ><input type="text" class="text" id="fname" name="fname" placeholder="உங்கள் முதல் பெயரை உள்ளிடவும்" /></td></tr>
      <tr>
        <td>
          <label for="lname">கடைசி பெயர்</label>
        </td>
      </tr>
      <tr>
        <td><input type="text" class="text" id="lname" name="lname" placeholder="உங்கள் கடைசி பெயரை உள்ளிடவும்"/></td>
      </tr>
      <tr>
        <td><label for="gender">பாலினம்</label></td>
        </tr>
        
        <tr>
        
        <td>
          <input type="radio" id="male" name="gender" value="M"/>
          <label for="male">ஆண்</label>
          <input type="radio" id="female " name="gender" value="F" />
          <label for="female">பெண்</label><br />
        </td>
      
      </tr>
   
      <tr>
        <td>
          <label for="dob">பிறந்த தேதி</label>
        </td>
        <tr>
          <td>
          <input class="text" type="date" id="dob" name="dob"/>
      </td>
      </tr>
      
      </tr>
      <tr>
        <td>
          <label for="address">முகவரி</label>
        </td>
      </tr>
      <tr>
        <td>
          <textarea class="text" id="address" name="address" rows="2" >  Type here your address
              </textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="province">மாகாணம்</label>
        </td>
        
        </tr>
        <tr>

        <td>
          <select class="text" name="province" id="province">
            <option value="">  Choose here</option>
            <option value="central province">Central Province</option>
            <option value="eastern province">Eastern Province</option>
            <option value="northern province">Northern Province</option>
            <option value="southern  province">Southern Province</option>
            <option value="western province">Western Province</option>
            <option value="north western province">
              North Western Province
            </option>
            <option value="north central province">
              North Central Province
            </option>
            <option value="uva province">Uva Province</option>
            <option value="sabaragamuwa province">
              Sabaragamuwa Province
            </option>
          </select>
        </td>
        <tr>
        <td>
          <label for="district">மாவட்டம்</label>
        </td>
      </tr>
       
        <tr>
        <td>
          <select class="text" name="district" id="district">
            <option value="">  Choose here</option>
            <option value="Gampaha">Gampaha District</option>
            <option value="Colombo">Colombo</option>
            <option value="Kalutara">Kalutara</option>
            <option value="Anuradhapura">Anuradhapura District</option>
            <option value="Polonnaruwa">Polonnaruwa</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kilinochchi">Kilinochchi</option>
            <option value="Mannar">Mannar</option>
            <option value="Mullaitivu">Mullaitivu District</option>
            <option value="Vavuniya">Vavuniya</option>
            <option value="Puttalam">Puttalam</option>
            <option value="Kurunegala">Kurunegala</option>
            <option value="Matale">Matale</option>
            <option value="Kandy">Kandy</option>
            <option value="Nuwara Eliya">Nuwara Eliya District</option>
            <option value="Kegalle">Kegalle</option>
            <option value="Ratnapura">Ratnapura</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Ampara">Ampara</option>
            <option value="Badulla">Badulla</option>
            <option value="Monaragala">Monaragala</option>
            <option value="Hambantota">Hambantota</option>
            <option value="Matara">Matara</option>
            <option value="Galle">Galle</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <label  for="gndivision">கிராம அலுவலர் பிரிவு</label>
        </td>
      </tr>
      <tr>
        <td><select class="text" name="gndivision" id="gndivision">
          <option value="" >Choose here</option>
          <?php
             
            foreach ($division  as $row){ ?>
            <option value="<?php echo $row['name'];?>" ><?php echo $row['name']; ?></option>       
          <?php } ?>  
      </tr>
      <tr>
        <td>
          <label for="nic">NIC</label>
        </td>
        </tr>
        <tr>
        <td><input class="text" type="text" id="nic" name="nic" placeholder="உங்கள் NIC ஐ தட்டச்சு செய்யவும்" /></td>
      </tr>
      <tr>
        <td>
          <label for="email">மின்னஞ்சல்</label>
        </td>
      </tr>
      <tr>
        <td><input class="text" type="email" id="email" name="email" placeholder="உங்கள் மின்னஞ்சலை தட்டச்சு செய்யவும்" /></td>
      </tr>
      <tr>
        <td>
          <label for="email">தொலைபேசி எண்</label>
        </td>
      </tr>
      <tr>
        <td><input class="text" type="tp" id="tp" name="tp" placeholder="உங்கள் தொலைபேசி எண்ணைத் தட்டச்சு செய்யவும்" /></td>
      </tr>
      <tr>
        <td>
          <label for="password">கடவுச்சொல்</label>
        </td>
      </tr>
        <td><input class="text" type="password" id="password" name="password" placeholder="உங்கள் சுயவிவரத்திற்கான கடவுச்சொல்லை உள்ளிடவும்"/></td>
      </tr>
      <tr>
      <tr>
        <td>
          <label for="cpassword">கடவுச்சொல்லை உறுதிப்படுத்தவும்</label>
        </td>
      </tr>
      <tr>
        <td><input class="text" type="password" id="cpassword" name="cpassword" placeholder="  Reype the password" /></td>
      </tr>
      <tr>
        <td></td>
      </tr>
       </table>
       
        <div class="sumbit2">
          <input
            type="submit" name="submit" onclick="return validation()"
            value="பதிவு"/>
   </div>
   <div class="last">
         
   </div>

    </form>
</div>
</div>  
  </body>
</html>
