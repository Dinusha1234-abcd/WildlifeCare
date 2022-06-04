<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Public/javascript/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Public/css/home.css">
    
     
    <title>மானிய பக்கம்</title>
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
                 
                <li id="home"><a href="">மானிய பக்கம்</a></li>
                <li id="report"><a href="incident/index?lang=3">நிகழ்வுகளைப் புகாரளிக்கவும்</a></li>
                <li id="register"><a href="villager/register?lang=3">பதிவு</a></li>
                <li id="login"><a id=login_text href="user/index?lang=3">உள்நுழைய</a></li>
                
                <li class="dropdown">
                    <button onmouseover="myFunction_2()" class="dropbtn">மொழி <i class="down"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="../wildlifecare?lang=1">English</a>
                      <a href="../wildlifecare?lang=2">සිංහල</a>
                      <a href="">தமிழ்</a>
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


       

        
        
        
            
        <button id="header">“ஒரு தேசத்தின் உண்மையான செல்வம் அதன் நிலம், மண், நீர், காடுகள், தாதுக்கள் மற்றும் வனவிலங்கு வளங்களில் உள்ளது.”</button>
        <form action="villager/register">
            <button id="regButton" >பதிவு</button>
        </form>
        <video  width="100%" id="vid" preload="" autoplay="" muted="" loop="" >
              <source src="https://cdn.videvo.net/videvo_files/video/free/2019-11/large_watermarked/190301_1_25_03_preview.mp4" type="video/mp4">
            </video>
        
    </div>





 



   
   <script type="text/javascript">
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

   </script>


 



<div id="intro">
        <img src="Public/images/logo.png">
        
        <h1 >Wildlife Care என்ன?</h1>
        <p>Wildlife Care இது ஒரு வலை மற்றும் மொபைல் அடிப்படையிலான அமைப்பாகும், இது வனவிலங்கு அதிகாரிகள் மற்றும் கிராமவாசிகளுக்கு இடையேயான தூரத்தைக் குறைக்கும்..எனவே Wildlife Care பயனுள்ள மற்றும் திறமையான தகவல்தொடர்புகளை வழங்குகிறது.
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
                            <h4>அவசர அறிக்கை</h4>
                            
                         </div>
                         <div id="fr1-1-class">

                            <img src="Public/images/elephant.png"  >
                         <h2>அவசர அறிக்கை</h2>
                         <p>வனவிலங்கு பராமரிப்பு பயனர்களுக்கு வனவிலங்கு தொடர்பான சம்பவங்களைப் புகாரளிக்க அனுமதிக்கிறது, இதனால் பயனர்களுக்கு விரைவாக அறிவிக்கப்படும்.  </p>
                             
                         </div>


                    </div>
                </li>

                <li>

                    <div id="fr1-2">
                        <img src="Public/images/alertinci.png">
                        <div id="fr1-2-side">
                            <i class="fas fa-bell"></i>
                            <h4>எச்சரிக்கைகளைப் பெறுங்கள்.</h4>

                            
                         </div>
                        
                        <div id="fr1-2-class">

                            <img src="Public/images/bell.png" >
                        <h2>எச்சரிக்கைகளைப் பெறுங்கள்.</h2>
                        <p>காட்டு யானைகள் கிராமங்களுக்கு வருவதாக தகவல் கிடைத்தவுடன் சம்பந்தப்பட்ட கிராம மக்களுக்கு தகவல் தெரிவிக்க வனவிலங்கு பராமரிப்பு வசதிகள் அமைக்கப்பட்டுள்ளன. </p>
                             
                         </div>


                    </div>
                </li>

                <li>

                    <div id="fr1-3">
                        <img src="Public/images/vetinci.png">
                        <div id="fr1-3-side">
                          <i class="fas fa-laptop-medical"></i>
                            <h4>கால்நடை உதவி</h4>
                            
                         </div>


                        <div id="fr1-3-class">
                            <img src="Public/images/vet.png" >
                        <h2>கால்நடை உதவி</h2>
                        <p>ஒரு விலங்கு ஆபத்தில் இருக்கும் போதே வனவிலங்கு பராமரிப்பைப் பயன்படுத்தி கால்நடை மருத்துவர்களை எச்சரிக்கும் வசதி வனவிலங்கு அதிகாரிகளிடம் உள்ளது.</p>
                             
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
                            <h4>வரைபடங்கள்</h4>
                            
                         </div>
                        
                        <div id="fr2-1-class">
                             <img src="Public/images/map.png"  >
                          
                         <h2>வரைபடங்கள்</h2>
                         <p>ஒரு நிகழ்வைப் புகாரளிக்கும் போது வனவிலங்கு பராமரிப்பு பயனர்களை இருப்பிடத்தைக் குறிக்க அனுமதிக்கிறது.
புகாரளிக்கப்பட்ட சம்பவத்தின் இருப்பிடத்தையும் நீங்கள் பார்க்கலாம்.</p>
                             
                         </div>
                         

                    </div>

                    
                </li>

                <li>

                    <div id="fr2-2">
                        <img src="Public/images/reginci.png">
                        <div id="fr2-2-side">
                          <i class="fas fa-phone"></i>
                            <h4>ஸ்மார்ட்போன் இல்லாமல் பதிவு செய்யவும்</h4>
                            
                         </div>
                        
                        <div id="fr2-2-class">

                            <img src="Public/images/mobile.png" >
                        <h2>ஸ்மார்ட்போன் இல்லாமல் பதிவு செய்யவும்</h2>
                        <p>ஸ்மார்ட் போன்கள் இல்லாத ஆனால் மொபைல் போன்கள் உள்ள கிராம மக்கள் இந்த அமைப்பில் பதிவு செய்து எச்சரிக்கைகளைப் பெறலாம்.
 </p>
                             
                         </div>

                    </div>
                </li>

                <li>

                    <div id="fr2-3">
                        <img src="Public/images/dashinci.png">
                        <div id="fr2-3-side">
                          <i class="fas fa-chart-line"></i>
                            <h4>பகுப்பாய்வு கருவி குழு</h4>
                            
                         </div>
                        
                        <div id="fr2-3-class">

                            <img src="Public/images/dash.png" >
                        <h2>பகுப்பாய்வு கருவி குழு</h2>
                        <p>Wildlife Care பகுப்பாய்வு பணிக்கு விரிவான டாஷ்போர்டை வழங்குகிறது.</p>
                             
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
                            <li><h4>முகவரி</h4></li>
                            <li>No18</li>
                            <li>Kandy Road</li>
                            <li>Pilimathalawa</li>
                        </ul>
                        
                    </div>

                     <div class="footer-col">

                        
                        <ul><li><h4>பட்டியல்</h4></li>
                            <li><a href="">மானிய பக்கம்</a></li>
                            <li><a href="villager/register?lang=3">பதிவு</a></li>
                            <li><a href="user/index?lang=3">உள்நுழைய</a></li>
                            
                        </ul>
                        
                    </div>

                     <div class="footer-col">

                        <h4>எங்களை தொடர்பு கொள்ள</h4>
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