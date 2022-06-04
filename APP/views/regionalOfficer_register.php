
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/regionalOfficer_register.css">
    <link rel="stylesheet" href="../Public/css/adminHeader.css">
    <script src="../Public/Javascript/regionalOfficer.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="../Public/css/noticeAlert.css">
    <title>User Registration</title>
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
                <li id="home" class="nav-menu-item"><a href="">Home</a></li>
                <li id="dashboard" class="nav-menu-item"><a href="../regionalOfficer/dashboard">Dashboard</a></li>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../regionalOfficer/viewProfile">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div id="notice-box">
    </div>

  
    <div class="container">

        <div class="registrationHeader">
            <ul>
                <li><h3>ADD USER</h3></li>
                <li><button id="profile" onclick="location.href='../regionalOfficer/viewUser'">Back</button></li>
                <form>
    
</form>
                
            </ul>
         
    
        </div>

         <div class="userType">
            <label for="userSelect">Select User type</label>
            <select  class="text" id="userSelect" name="userSelect" onchange ="selectForm(this.value)" required  >
                 <option value="c">Choose here</option>
                <option value="gnform">Grama Niladhari</option>
                <option value="woform">Wildlife Officer</option>
                <option value="vetform">Veterinarian</option>
                <option value="vilform">Villager</option>
                
                
            </select>
           
             
      

            
            
            
            
        </div>

        <div id="notification">
            <?php  
              if(!empty($_GET["error"]))
                echo "<div id=\"errordiv\"><img src=\"../Public/images/error-icon.png\" alt=\"icon\" class=\"icon\"><br><h2 id=\"error\"> Unsuccessfull!!".$_GET["error"]."</h2></div>";
              else if(!empty($_GET["success"]))
                echo "<div id=\"successdiv\"><img src=\"../Public/images/success.png\" alt=\"icon\" class=\"icon\"><br><h2 id=\"success\">".$_GET["success"]."</h2></div>";
            ?>
              
        </div>

       

       
        <div class="container2">


            <form  name="gnForm" class="gnform" method="POST" action="../regionalOfficer/addUser?error=&success=" onsubmit="return nicPasswordValidate('gramaNiladhari')">
                <table>

                    <tr>
                        <td>
                            <label for="gic">GIC Number</label>
                        </td>
                        <td>
                            <input type="text" name="gic" id="gic" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                        </td>
                        <td>
                            <input type="text" name="fname" id="fname" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="lname">Last Name</label>
                        </td>
                        <td>
                            <input type="text" name="lname" id="lname" required>
                           

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="nic">NIC</label>
                            
                        </td>
                        <td>
                            <input type="text" name="nic" id="gn-nic-input" required>
                            <label class="id-error" id="gn-NIC">Please Enter NIC Right Format</label>
                             

                        </td>
                        
                    </tr>

                    <tr>
                        <td><label for="gender">Gender</label></td>
        
                        <td>
                            <input type="radio" id="male" name="gender" value="M"/>
                            <label for="male">Male</label>
                            <input type="radio" id="female " name="gender" value="F" />
                            <label for="female">Female</label><br />
                        </td>
      
                    </tr>

                    <tr>
                        <td>
                            <label for="dob">Date of Birth</label>
                        </td>
                        <td>
                            <input type="Date" name="dob" id="dob" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address">Address</label>
                        </td>
                        <td>
                            <input type="text" name="address" id="address" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="gndgrama">Work GN Division</label>
                        </td>
                        <td>
                            <select  name="gnd" id="gndgrama" required>
                                     
                         
                            </select>
                        </td>
                    </tr>




                    <tr>
                           <td>
                                 <label for="districtgrama"> Work District</label>
                           </td>
                           <td>
                                <select class="text" name="district" id="districtgrama"  onchange ="selectGN1(this.value)" required>
                                     
                         
                               </select>
                           </td>
               </tr>
                    
                    <tr>
                          <td><label for="province">Work Province</label></td>

                          <td>
                               <select class="text" name="province" id="province"   onchange ="selectDistrict1(this.value)"  required>
                                  <option>Select Province</option>
                                   <?php $rows=$data["province"]; foreach($rows as $row){ echo "<option"?><?php echo " value=".$row["Name"]." >".$row["Name"]."</option>";}?> 
                               </select>

                            
                           </td>
                    </tr>

                    

               

                    <tr>
                        <td>
                            <label for="mobile">Mobile number</label>
                        </td>
                        <td>
                            <input type="text" name="mobile" id="mobile" required>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label for="email">E mail</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password">Tempory Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" required>

                            <label class="error-password" id="gn-pass">Password must conation more than 7 characters and atleast one lowercase, one upprecase, one digit and one special character(@#$%^&*....)</label>
                        </td>
                    </tr>




                </table>
                <button onclick="location.href='../regionalOfficer/addUser'" >back</button>
                
                    <button type="submit" name="submit" value="grama niladhari">Submit</button>
                
                 





            </form>


             <form name="vetForm" class="vetform" method="POST" action="../regionalOfficer/addUser?error=&success=" onsubmit="return nicPasswordValidate('veterinarian')">
                <table>

                    <tr>
                        <td>
                            <label for="nic">NIC</label>
                        </td>
                        <td>
                            <input type="text" name="nic" id="nic" required>
                            <label class="id-error" id="vet-NIC">Please Enter NIC Right Format</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="vid">VID Number</label>
                        </td>
                        <td>
                            <input type="text" name="vid" id="vid" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                        </td>
                        <td>
                            <input type="text" name="fname" id="fname" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="lname">Last Name</label>
                        </td>
                        <td>
                            <input type="text" name="lname" id="lname" required>
                        </td>
                    </tr>

                    

                    <tr>
                        <td><label for="gender">Gender</label></td>
        
                        <td>
                            <input type="radio" id="male" name="gender" value="M"/>
                            <label for="male">Male</label>
                            <input type="radio" id="female " name="gender" value="F" />
                            <label for="female">Female</label><br />
                        </td>
      
                    </tr>

                    <tr>
                        <td>
                            <label for="dob">Date of Birth</label>
                        </td>
                        <td>
                            <input type="Date" name="dob" id="dob" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address">Address</label>
                        </td>
                        <td>
                            <input type="text" name="address" id="address" required>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label for="ofn">Office Number</label>
                        </td>
                        <td>
                            <select class="text" name="ofn" id="ofn" required>
                                <option>Select Office Number</option>
                                <?php $rows=$data["office"]; foreach($rows as $row){ echo "<option"?><?php echo " value=".$row["officeNo"]." >".$row["officeNo"]."</option>";}?> 
                            </select>
                        </td>
                    </tr>
                    
                    

                    <tr>
                        <td>
                            <label for="mobile">Mobile number</label>
                        </td>
                        <td>
                            <input type="text" name="mobile" id="mobile" required>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label for="email">E mail</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password">Tempory Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" required>
                            <label class="error-password" id="vet-pass">Password must conation more than 7 characters and atleast one lowercase, one upprecase, one digit and one special character(@#$%^&*....)</label>
                        </td>
                    </tr>




                </table>
                <button onclick="location.href='../regionalOfficer/addUser'">back</button>
                <button type="submit" name="submit" value="veterinarian">Submit</button>
                





            </form>


             <form name="vilForm" class="vilform"  method="POST" action="../regionalOfficer/addUser" onsubmit="return nicPasswordValidate('villager')">
                <table>
                    

                    <tr>
                        <td>
                            <label for="nic">NIC</label>
                        </td>
                        <td>
                            <input type="text" name="nic" id="nic" required>
                            <label class="id-error" id="vil-NIC">Please Enter NIC Right Format</label>
                        </td>
                        

                        
                    </tr>

                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                        </td>
                        <td>
                            <input type="text" name="fname" id="fname" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="lname">Last Name</label>
                        </td>
                        <td>
                            <input type="text" name="lname" id="lname" required>
                        </td>
                    </tr>

                    
                    <tr>
                        <td><label for="gender">Gender</label></td>
        
                        <td>
                            <input type="radio" id="male" name="gender" value="M"/>
                            <label for="male">Male</label>
                            <input type="radio" id="female " name="gender" value="F" />
                            <label for="female">Female</label><br />
                        </td>
      
                    </tr>

                    <tr>
                        <td>
                            <label for="dob">Date of Birth</label>
                        </td>
                        <td>
                            <input type="Date" name="dob" id="dob" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address">Address</label>
                        </td>
                        <td>
                            <input type="text" name="address" id="address" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="villagevil">Village</label>
                        </td>
                        <td>
                            <select class="text" name="village" id="villagevil"    required>
                            <option value="Kotapola">Kotapola</option>
                                  
                               </select>
                        </td>
                    </tr>



                    <tr>
                        <td>
                            <label for="gndvil">GN Division</label>

                        </td>

                        <td>
                            <select  name="gnd" id="gndvi" onchange ="selectVil(this.value)" required>
                                     
                         <option value="Kotapola">Kotapola</option>
                            </select>
                            
                        </td>
                        
                             


                        
                    </tr>

                    <tr>

                        <td>
                                 <label for="districtvil">District</label>
                           </td>
                         <td>
                                <select class="text" name="district" id="districtvil"  onchange ="selectGN(this.value)" required>
                                     
                         
                               </select>
                           </td>


                        
                    </tr>
                    
                    <tr>
                       
                            <td><label for="province">Province</label></td>

                          <td>
                               <select class="text" name="province" id="province"   onchange ="selectDistrict(this.value)"  required>
                                  <option>Select Province</option>
                                   <?php $rows=$data["province"]; foreach($rows as $row){ echo "<option"?><?php echo " value=".$row["Name"]." >".$row["Name"]."</option>";}?> 
                                    </select>

                            
                           </td>

                          
                          
                    </tr>


                

                    <tr>
                        <td>
                            <label for="mobile">Mobile number</label>
                        </td>
                        <td>
                            <input type="text" name="mobile" id="mobile" required>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label for="email">E mail</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password">Tempory Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" required>
                            <label class="error-password" id="vil-pass">Password must conation more than 7 characters and atleast one lowercase, one upprecase, one digit and one special character(@#$%^&*..)</label>
                        </td>
                    </tr>




                </table>

                <button onclick="location.href='../regionalOfficer/addUser'">back</button>
                <button type="submit" name="submit" value="villager">Submit</button>
                

                



            </form>

             <form name="wilForm" class="woform"  method="POST" action="../regionalOfficer/addUser?error=&success=" onsubmit="return nicPasswordValidate('wildlifeOfficer')">
                <table>

                    <tr>
                        <td>
                            <label for="nic">NIC</label>
                        </td>
                        <td>
                            <input type="text" name="nic" id="nic" required>
                            <label class="id-error" id="wil-NIC">Please Enter NIC Right Format</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="wid">WID</label>
                        </td>
                        <td>
                            <input type="text" name="wid" id="wid" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                        </td>
                        <td>
                            <input type="text" name="fname" id="fname" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="lname">Last Name</label>
                        </td>
                        <td>
                            <input type="text" name="lname" id="lname" required>
                        </td>
                    </tr>

                    

                    
                    <tr>
                        <td><label for="gender">Gender</label></td>
        
                        <td>
                            <input type="radio" id="male" name="gender" value="M"/>
                            <label for="male">Male</label>
                            <input type="radio" id="female " name="gender" value="F" />
                            <label for="female">Female</label><br />
                        </td>
      
                    </tr>

                    <tr>
                        <td>
                            <label for="dob">Date of Birth</label>
                        </td>
                        <td>
                            <input type="Date" name="dob" id="dob" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address">Address</label>
                        </td>
                        <td>
                            <input type="text" name="address" id="address" required>
                        </td>
                    </tr>
                    
                    
                   


               <tr>
                        <td>
                            <label for="ofn">Office Number</label>
                        </td>
                        <td>
                            

                            <select class="text" name="ofn" id="ofn" required>
                                <option>Select Office Number</option>
                                <?php $rows=$data["office"]; foreach($rows as $row){ echo "<option"?><?php echo " value=".$row["officeNo"]." >".$row["officeNo"]."</option>";}?> 
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="mobile">Mobile number</label>
                        </td>
                        <td>
                            <input type="text" name="mobile" id="mobile" required>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label for="email">E mail</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password">Tempory Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" required>
                            <label class="error-password" id="wil-pass">Password must conation more than 7 characters and atleast one lowercase, one upprecase, one digit and one special character(@#$%^&*..)</label>
                        </td>
                    </tr>




                </table>
                

               <button onclick="location.href='../regionalOfficer/addUser'">back</button>
               <button type="submit"  name="submit" value="wildlife officer">Submit</button>



            </form>



            
            
            

        </div>


        


    </div>

       <script >



      


        function selectDistrict(x){
                                

    $.post("../regionalOfficer/addUser",{provinceName:x},function(data,status){
          
        $("#districtvil").html(data);


        
    });

  }

  function selectDistrict1(x){
                                

    $.post("../regionalOfficer/addUser",{provinceName:x},function(data,status){
          
        $("#districtgrama").html(data);


        
    });

  }

  function selectGN(x){
    
    
    $.post("../regionalOfficer/addUser",{districtName:x},function(data,status){
         
          $('#gndvi').html(data);
        
        
    });


  }

  function selectGN1(x){
    
    
    $.post("../regionalOfficer/addUser",{districtName:x},function(data,status){
         
          $('#gndgrama').html(data);
        
        
    });


  }

  function selectVil(x){
    
    
    $.post("../regionalOfficer/addUser",{gnName:x},function(data,status){
           
          $('#villagevil').html(data);
        
        
    });


  }

  <?php if(isset($_GET["error"]) || isset($_GET["success"])){?>

  $(document).ready(function(){
    $("#notification").delay(5000).fadeOut();
  })

  <?php } ?>

  <?php if(empty($_GET["error"]) && empty($_GET["success"])){?>

  $(document).ready(function(){
    $("#notification").hide();
  })

  <?php } ?>

   


   function nicPasswordValidate(x){
    switch(x){
        case "gramaNiladhari":{
            var NIC=document.forms["gnForm"]["nic"].value;
            var errorElement=document.getElementById("gn-NIC");
            var password=document.forms["gnForm"]["password"].value;
            var passwordErrorElement=document.getElementById("gn-pass");
        }
        break;
        case "veterinarian":{
            var NIC=document.forms["vetForm"]["nic"].value;
            var errorElement=document.getElementById("vet-NIC");
            var password=document.forms["vetForm"]["password"].value;
            var passwordErrorElement=document.getElementById("vet-pass");
        }
        break;
        case "wildlifeOfficer":{
            var NIC=document.forms["wilForm"]["nic"].value;
            var errorElement=document.getElementById("wil-NIC");
            var password=document.forms["wilForm"]["password"].value;
            var passwordErrorElement=document.getElementById("wil-pass");
        }
        break;
        
        case "villager":{
            var NIC=document.forms["vilForm"]["nic"].value;
            var errorElement=document.getElementById("vil-NIC");
            var password=document.forms["vilForm"]["password"].value;
            var passwordErrorElement=document.getElementById("vil-pass");
        }
        break;
    }
    
    

    if(NIC.length==10)
    {
        if(NIC.charAt(9)=='V' || NIC.charAt(9)=='X')
        {
            if(password.length<8)
             { 
                alert(password);
                passwordErrorElement.style.display="block";
                return false;


             }
             else if(password.search(/[a-z]/)==-1|| password.search(/[A-Z]/)==-1 || password.search(/[0-9]/)==-1 || password.search(/[@#$%^&*!.,+]/)==-1 )
             { 
                passwordErrorElement.style.display="block";
                return false;

             }
             else
                return true;

            
        }

        else{
            errorElement.style.display="block";
            return false;
            

        }

            
    }

    else if(NIC.length==12)
    {
        if((NIC.search(/[a-z]/)==-1)&&(NIC.search(/[A-Z]/)==-1)&&(NIC.search(/[!@#\$%\^\&*.+]/)==-1))
        {
            if(password.length<8)
             { 
                passwordErrorElement.style.display="block";
                return false;


             }
             else if(password.search(/[a-z]/)==-1|| password.search(/[A-Z]/)==-1 || password.search(/[0-9]/)==-1 || password.search(/[@#$%^&*!.,+]/)==-1 )
             { 
                passwordErrorElement.style.display="block";
                return false;

             }
             else
                return true;
        }


            
        else{
            errorElement.style.display="block";
            return false;
            

        }
    }
    else{  
            errorElement.style.display="block";
            return false;
            

        }


   }

</script>

<script >
    $(document).ready(function(){

    setInterval(function(){
        loadNotice();
    },3000);



    function loadNotice(){

        $.ajax({
            url:"../regionalOfficer/getNotice",
            method:"POST",
            success:function(data){
                $("#notice-box").html(data);


            }
        })

          
 

    }

    
});


function endNotice(x){
    
    
    $.post("endNotice",{noticeId:x},function(data,status){
           
          
        
        
    });


  }
  </script>

</body>