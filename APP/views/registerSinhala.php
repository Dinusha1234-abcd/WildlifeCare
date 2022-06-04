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
    <script src="../Public/javascript/villagerRegister.js"></script>
    <title>ලියාපදිංචි කිරීමේ පෝරමය</title>
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
                <li id="home"><a href="">මුල් පිටුව</a></li>
                <li id="report"><a href="../incident/index?lang=1">සිදුවීම් වාර්තා කරන්න</a></li>
                <li id="register"><a href="../villager/register?lang=1">ලියාපදිංචි කරන්න</a></li>
                <li id="login"><a id=login_text href="user/index?lang=1">ඇතුල් වන්න</a></li>
                
              <li class="dropdown">
                  <button onclick="myFunction_2()" class="dropbtn">භාෂාව <i class="down"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="?lang=1">English</a>
                    <a href="?lang=2">සිංහල</a>
                    <a href="?lang=3">தமிழ்</a>
                  </div>
              </li>
          </ul>
  </header>
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
           <h1>ඔබගේ ජාතික හැඳුනුම්පත දැනටමත් ලියාපදිංචි වී ඇත </h1>
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
           <h1>ලියාපදිංචි වනජීවී සත්කාර කළමනාකරණ පද්ධතියට ස්තූතියි</h1> 
           <a href="../user/index?lang=1"  class="login-btn" style=" border-radius: 10px; padding: 10px 10px; background-color:#056412;  color: white;">login</a>
           </div>
       <?php } }  ?>
 
  <div class="contanier2">
    <div class="register_header">
          <h3>ලියාපදිංචි කිරීමේ පෝරමය</h3>
    
      </div>
  

    <form class="form2" action=""   method="post">
   	
     <table id="form1">
      <tr>
        <td >
          <label for="fname">මුල් නම</label>
        </td>
      </tr>
      <tr><td ><input type="text" class="text" id="fname" name="fname" placeholder="ඔබේ මුල් නම ටයිප් කරන්න" /></td></tr>
      <tr>
        <td>
          <label for="lname">අවසන් නම</label>
        </td>
      </tr>
      <tr>
        <td><input type="text" class="text" id="lname" name="lname" placeholder="ඔබගේ අවසාන නම ටයිප් කරන්න"/></td>
      </tr>
      <tr>
        <td><label for="gender">ස්ත්රී පුරුෂ භාවය</label></td>
        </tr>
        
        <tr>
        
        <td>
          <input type="radio" id="male" name="gender" value="M"/>
          <label for="male">පිරිමි</label>
          <input type="radio" id="female " name="gender" value="F" />
          <label for="female">ගැහැණු</label><br />
        </td>
      
      </tr>
   
      <tr>
        <td>
          <label for="dob">උපන්දිනය</label>
        </td>
        <tr>
          <td>
          <input class="text" type="date" id="dob" name="dob"/>
      </td>
      </tr>
      
      </tr>
      <tr>
        <td>
          <label for="address">ලිපිනය</label>
        </td>
      </tr>
      <tr>
        <td>
          <textarea class="text" id="address" name="address" rows="2" > ඔබේ ලිපිනය මෙහි ටයිප් කරන්න
              </textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="province">පළාත</label>
        </td>
        
        </tr>
        <tr>

        <td>
          <select class="text" name="province" id="province">
            <option value="">මෙතැනින් තෝරන්න</option>
            <option value="central province">මධ්‍යම පළාත</option>
            <option value="eastern province">නැගෙනහිර පළාත</option>
            <option value="northern province">උතුරු පළාත</option>
            <option value="southern  province">දකුණු පළාත</option>
            <option value="western province">බස්නාහිර පළාත</option>
            <option value="north western province">
            වයඹ පළාත
            </option>
            <option value="north central province">
            උතුරු මැද පළාත
            </option>
            <option value="uva province">ඌව පළාත</option>
            <option value="sabaragamuwa province">
            සබරගමුව පළාත
            </option>
          </select>
        </td>
        <tr>
        <td>
          <label for="district">දිසා</label>
        </td>
      </tr>
       
        <tr>
        <td>
          <select class="text" name="district" id="district">
            <option value="">  මෙතැනින් තෝරන්න</option>
            <option value="Gampaha">ගම්පහ දිස්ත්‍රික්කය</option>
            <option value="Colombo">කොළඹ</option>
            <option value="Kalutara">කළුතර</option>
            <option value="Anuradhapura">අනුරාධපුර දිස්ත්‍රික්කය</option>
            <option value="Polonnaruwa">පොළොන්නරුව</option>
            <option value="Jaffna">යාපනය</option>
            <option value="Kilinochchi">කිලිනොච්චි</option>
            <option value="Mannar">මන්නාරම</option>
            <option value="Mullaitivu">මුලතිව් දිස්ත්රික්කය</option>
            <option value="Vavuniya">වවුනියාව</option>
            <option value="Puttalam">පුත්තලම</option>
            <option value="Kurunegala">කුරුණෑගල</option>
            <option value="Matale">මාතලේ</option>
            <option value="Kandy">මහනුවර</option>
            <option value="Nuwara Eliya">නුවරඑළිය දිස්ත්‍රික්කය</option>
            <option value="Kegalle">කෑගල්ල</option>
            <option value="Ratnapura">රත්නපුරය</option>
            <option value="Trincomalee">ත්රිකුණාමලය</option>
            <option value="Batticaloa">මඩකලපුව</option>
            <option value="Ampara">අම්පාර</option>
            <option value="Badulla">බදුල්ල</option>
            <option value="Monaragala">මොනරාගල</option>
            <option value="Hambantota">හම්බන්තොට</option>
            <option value="Matara">මාතර</option>
            <option value="Galle">ගාල්ල</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <label  for="gndivision">ග්‍රාම නිලධාරී වසම</label>
        </td>
      </tr>
      <tr>
        <td><select class="text" name="gndivision" id="gndivision">
          <option value="" >මෙතැනින් තෝරන්න</option>
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
        <td><input class="text" type="text" id="nic" name="nic" placeholder="ඔබේ ජාතික හැඳුනුම්පත ටයිප් කරන්න" /></td>
      </tr>
      <tr>
        <td>
          <label for="email">විද්යුත් තැපෑල</label>
        </td>
      </tr>
      <tr>
        <td><input class="text" type="email" id="email" name="email" placeholder="ඔබගේ විද්‍යුත් තැපෑල ටයිප් කරන්න" /></td>
      </tr>
      <tr>
        <td>
          <label for="email">දුරකථන අංකය</label>
        </td>
      </tr>
      <tr>
        <td><input class="text" type="tp" id="tp" name="tp" placeholder="ඔබගේ දුරකථන අංකය ටයිප් කරන්න" /></td>
      </tr>
      <tr>
        <td>
          <label for="password">රහස් පදය</label>
        </td>
      </tr>
        <td><input class="text" type="password" id="password" name="password" placeholder="ඔබගේ පැතිකඩ සඳහා මුරපදයක් ටයිප් කරන්න"/></td>
      </tr>
      <tr>
      <tr>
        <td>
          <label for="cpassword">මුරපදය තහවුරු කරන්න</label>
        </td>
      </tr>
      <tr>
        <td><input class="text" type="password" id="cpassword" name="cpassword" placeholder="මුරපදය නැවත ලියන්න" /></td>
      </tr>
      <tr>
        <td></td>
      </tr>
       </table>
       
        <div class="sumbit2">
          <input
            type="submit" name="submit" onclick="return validation()"
            value="Register"/>
   </div>
   <div class="last">
         
   </div>

    </form>
</div>
</div>  
  </body>
</html>
