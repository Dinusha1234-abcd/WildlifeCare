
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/login.css">
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../Public/Javascript/login1.js"></script>
    <title>ඇතුල් වන්න</title>
</head>

<body onload="myFunction()" > 
    <div id="loader"></div>
    <header id="main">
        <img src="../Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul class="nav-menu">
                <li id="lan"></li>
                <li id="home" class="nav-menu-item"><a href="../?lang=2">ප්‍රදාන පිටුව</a></li>
                <li id="report" class="nav-menu-item"><a href="../user/index?lang=2">සිදුවීම් වාර්තා කරන්න</a></li>
                <li id="register" class="nav-menu-item"><a href="../villager/register?lang=2">ලියාපදිංචිය</a></li>
                <li id="login" class="nav-menu-item"><a id=login_text href="">ඇතුල් වන්න</a></li>
                <li class="dropdown">
                    <button onmouseover="myFunction_2()" class="dropbtn">භාශාව<i class="down"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="../user/index?lang=1">English</a>
                      <a href="../user/index?lang=2">සිංහල</a>
                      <a href="../user/index?lang=3">தமிழ்</a>
                    </div>
                </li>
            </ul>
    </header>
    </div> 

    




    <div class="error">
                 <?php if(!empty($data))  echo $data;?>
    </div>
    <div class="contanier">
        
        <div class="login-header">
            <h3>ඇතුල් වන්න</h3>
        </div>
        </br>
        <div>
          <?php

          if(isset($_GET["reset"])){
            if($_GET["reset"]=="success")
              echo "<p class=\"email-sent\" >Sent an email for reset password </p>";
            else if($_GET["reset"]=="emailError")
               echo "<p class=\"email-error\">Invalid user name. Please try again.. </p>";

          }

          ?>

          
        </div>
        <br>
        <div>
          <?php

          if(isset($_GET["resetSuc"])){
            if($_GET["resetSuc"]=="error"||$_GET["resetSuc"]=="fail")
              echo "<p class=\"email-error\">Something went wrong. Please try again.. </p>";
            else if($_GET["resetSuc"]=="success")
               echo "<p class=\"email-sent\">Password reset Successful. Now you can login </p>";

          }

          ?>

          
        </div>
        <br>
        <form action="login?lang=2" method="POST" class="login_form" name="form" onsubmit="return validated()">
            <div class="group">
                <label for="username">පරිශීලක නාමය</label><br>
                <input type="text" name="username"><br>
                <div id="username_error">කරුණාකර ඔබේ පරිශීලක නාමය පුරවන්න</div>
            </div>
            <br>
            <div class="group">
                <label for="password">මුරපදය</label><br>
                <input type="password" name="password"><br>
                <div id="pass_error">කරුණාකර ඔබේ මුරපදය පුරවන්න</div>
            </div>
            <br>
           
            <div class="group_link">
               <label for="show" class="link">ඔබේ මුරපදය අමතකද?</label>
            </div>
            <br>
            <div class="sumbit">
                <!-- <input name="submit" type="button" value="LOGIN"> -->
                <button type="submit">ඇතුල් වන්න</button>
            </div>
        </form>

         <script >
            var username=document.forms["form"]["username"];
            var pass=document.forms["form"]["password"];


           var username_error=document.getElementById("username_error");
           var pass_error=document.getElementById("pass_error");
           username.addEventListener('textInput', username_verify);
           pass.addEventListener('textInput', pass_verify);


           function validated(){
     
                 if(pass.value.length===0 && username.value.length===0){
                
                 pass_error.style.display="block";
          
                 username_error.style.display="block";
                 username.focus();
         
                 return false;
                 }
  

    

                 else if(pass.value.length===0){
        
                 pass_error.style.display="block";
                 pass.focus();
                 return false;
                 }
  
                else if(username.value.length===0){
                 
                username_error.style.display="block";
                username.focus();
                return false;
                }

     
                 }

           function username_verify(){
            if(username.value.length>0){
                return true;
            }
           }

            function pass_verify(){
            if(pass.value.length>0){
                return true;
            }
           }
        </script>

    </div>

    <input type="checkbox" id="show">


    <div class="resetPassword">
      <label for="show" class="close-btn fas fa-times"></label>
      <h1>Reset Password</h1>
          <form action="resetPasswordRequest" method="POST">
            <label class="reset-label">User Name</label>
            <br>
            <input type="text" name="userName" required class="reset-input">
            <br>
            
            <button type="submit" class="reset-button" name="sendEmail" >Send Email</button>
          </form>
          

        </div>


</body>

</html>