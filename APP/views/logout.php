<?php
if (!isset($_SESSION['nic'])) {
  header("Location:../");
}  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
      <!-- style css -->
      
      <!-- Responsive-->
      <link rel="stylesheet" href="../Public/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>
<body >


<div class="body">
   
<div class="login">
      <div class="container">
        <div class="wrapper">
        
          <header>Confirm</header>
      
        <hr>
        <div><p style="color: whitesmoke;">You are already logged in as <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?>, you need to log out before logging in as different user.</p></div>
        <br><hr>      
        <div class="row">
  <div class="col-sm"><a href="logout"><button type="button" class="btn btn-primary">Log out</button></a></div>
  
  <div class="col-sm"><a href="../Login/cancelLogout"><button type="button" class="btn btn-light">Cancel</button></a></div>
</div>
            
            
                
  
          
          
        </div>
         
        </div>
        <script src="../Public/js/signup.js"></script>
        <script src="../Public/js/jquery.min.js"></script>
        <script src="../Public/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
        <script src="../Public/js/owl.carousel.min.js"></script>
        <script src="../Public/js/custom.js"></script>
        
     </div>
</div>
</body>
</html>