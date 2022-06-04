<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Public/javascript/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Public/css/home.css">
    
     
    <title>Home page</title>
</head>

<body> 
    <div>
    <header id="main">
        <img src="Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul class="nav-menu">
                 <!-- <li id="lan"></li> -->
                <li id="home"><a href="">Home</a></li>
                <li id="report"><a href="incident/index?lang=1">Report Incidents</a></li>
                <li id="register"><a href="villager/register?lang=1">Register</a></li>
                <li id="login"><a id=login_text href="user/index">Login</a></li>
                
                <li class="dropdown">
                    <button onmouseover="myFunction_2()" class="dropbtn">Language <i class="down"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="../wildlifecare?lang=1">English</a>
                      <a href="../wildlifecare?lang=2">සිංහල</a>
                      <a href="../wildlifecare?lang=3">தமிழ்</a>
                    </div>
                </li>
            </ul>
       </nav>
    </header>

    </div>

<div class="banner" id="banner">
      
        
        
        <!-- <img src="Public/images/wlimg2.png" class="imgs">
        <img src="Public/images/wlimg3.png" class="imgs">
        <img src="Public/images/wlimg4.png" class="imgs">
        <img src="Public/images/wlimg6.png" class="imgs">
        <img src="Public/images/wlimg8.png" class="imgs"> -->


       

        
        
        
           
        <button id="header">“The real wealth of the Nation lies in the resources of the earth - soil, water, forests, minerals, and wildlife.”</button>
        
            <button id="regButton" onclick="location.href='villager/register?lang=1'" >REGISTER</button>

            <video  width="100%" id="vid" preload="" autoplay="" muted="" loop="" >
              <source src="https://cdn.videvo.net/videvo_files/video/free/2019-11/large_watermarked/190301_1_25_03_preview.mp4" type="video/mp4">
            </video>

            
        
        
    </div>






   
   <!-- <script type="text/javascript">
    var imgs=document.querySelectorAll(".banner .imgs");
    
    var nextImgDelay=3000;
    var counter=0;

 imgs[counter].style.opacity=1;
 

setInterval(nextImage,nextImgDelay);


function nextImage(){

    imgs[counter].style.opacity=0;
   
    counter=(counter+1)%imgs.length;
    imgs[counter].style.opacity=1;
   


}

   </script> -->
<script type="text/javascript">
  
  document.getElementById("vid").play();

</script>



 



<div id="intro">
        <img src="Public/images/logo.png">
        
        <h1 >What is wildlife Care?</h1>
        <p>Wildlife Care is a web based and mobilebased system which facilitates to minimize the communication distance between  wildlifeofficials and the villagers who are living near to sanctuaries. Therefore it facilitated efficient and effective communication between villagers and wildlife officials. The main purpose of Wildlife Care is to protect the lives of animals, human lives and properties.
  </p>
        
    </div>

    <div id="feature">
       
        <div id="fr1">
            <ul>

               <li>
                    <div id="fr1-1">
                         
                         <img src="Public/images/reportinci.png">
                         <div id="fr1-1-side">
                          <i class="fas fa-republican"></i>
                            <h4>Report Incidents</h4>
                            
                         </div>
                         <div id="fr1-1-class">

                            <img src="Public/images/elephant1.jpg"  >
                         <h2>Report Incidents</h2>
                         <p>Wildlife Care have facilitated users to report incidents regarding wildlifes. Accordingly, it can allow users to inform those  informations  quickly.  </p>
                             
                         </div>


                    </div>
                </li>

                <li>

                    <div id="fr1-2">
                        <img src="Public/images/alertinci.png">
                        <div id="fr1-2-side">
                            <i class="fas fa-bell"></i>
                            <h4>Get Alerts</h4>

                            
                         </div>
                        
                        <div id="fr1-2-class">

                            <img src="Public/images/bell.jpg" >
                        <h2>Get Alerts</h2>
                        <p>Wildlife Care have facilitated to inform relevant villagers quickly  when reporting about  wild elephants coming  to villages. </p>
                             
                         </div>


                    </div>
                </li>

                <li>

                    <div id="fr1-3">
                        <img src="Public/images/vetinci.png">
                        <div id="fr1-3-side">
                          <i class="fas fa-laptop-medical"></i>
                            <h4>Veterinarian Support</h4>
                            
                         </div>


                        <div id="fr1-3-class">
                            <img src="Public/images/vet.jpg" >
                        <h2>Veterinarian Support</h2>
                        <p>Wildlife officials have facilities to alert veterinarians using Wildlife Care system as soon as a wild animal is in danger.  </p>
                             
                         </div>


                    </div>
                </li>
           </ul>
            

        </div> 

        <div id="fr2">
            <ul>

               <li>
                    <div id="fr2-1">
                        <img src="Public/images/mapinci.png">

                        <div id="fr2-1-side">
                          <i class="fas fa-map-signs"></i>
                            <h4>Maps</h4>
                            
                         </div>
                        
                        <div id="fr2-1-class">
                             <img src="Public/images/map.jpg"  >
                          
                         <h2>Maps</h2>
                         <p>The Wildlife Care  allows users to mark the location when reporting an incident.
                            The location of the reported incident can also view. </p>
                             
                         </div>
                         

                    </div>

                    
                </li>

                <li>

                    <div id="fr2-2">
                        <img src="Public/images/reginci.png">
                        <div id="fr2-2-side">
                          <i class="fas fa-phone"></i>
                            <h4>Register Without Smartphones</h4>
                            
                         </div>
                        
                        <div id="fr2-2-class">

                            <img src="Public/images/mobile.jpg" >
                        <h2>Register Without Smartphones</h2>
                        <p>Villagers who don't have smartphones but have mobile phones can register and  get alerts from this system.</p>
                             
                         </div>

                    </div>
                </li>

                <li>

                    <div id="fr2-3">
                        <img src="Public/images/dashinci.png">
                        <div id="fr2-3-side">
                          <i class="fas fa-chart-line"></i>
                            <h4>Analytical Dashboard</h4>
                            
                         </div>
                        
                        <div id="fr2-3-class">

                            <img src="Public/images/dash.jpg" >
                        <h2>Analytical Dashboard</h2>
                        <p>Wildlife Care Provides detailed dashboard for required analytical works. </p>
                             
                         </div>


                    </div>
                </li>
           </ul>
            

        </div>
         <div class="footer">

            <div class="conclusion">

                <div class="row">

                    <div class="footer-col">

                        
                        <ul>
                            <li><h4>Address</h4></li>
                            <li>No18</li>
                            <li>Kandy Road</li>
                            <li>Pilimathalawa</li>
                        </ul>
                        
                    </div>

                     <div class="footer-col">

                        
                        <ul><li><h4>Site Map</h4></li>
                            <li><a href="">Home</a></li>
                            <li><a href="villager/register?lang=1">Register</a></li>
                            <li><a href="user/index?lang=1">Login</a></li>
                            
                        </ul>
                        
                    </div>

                     <div class="footer-col">

                        <h4>Follow Us</h4>
                        <div class="social-links">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fas fa-phone"></i></a>
                            <a href=""><i class="fas fa-envelope"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            

                        </div>
                        
                    </div>
                    

                </div>
                

            </div>
    

         </div>





</body>
</html>