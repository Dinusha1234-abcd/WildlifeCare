<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Public/javascript/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Public/css/home.css">
    
     
    <title>ප්‍රදාන පිටුව</title>
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
                 
                <li id="home"><a href="">ප්‍රදාන පිටුව</a></li>
                <li id="report"><a href="incident/index?lang=2">සිදුවීම් වාර්තා කරන්න</a></li>
                <li id="register"><a href="villager/register?lang=2">ලියාපදිංචිය</a></li>
                <li id="login"><a id=login_text href="user/index?lang=2">ඇතුල් වන්න</a></li>
                
                <li class="dropdown">
                    <button onmouseover="myFunction_2()" class="dropbtn">භාශාව <i class="down"></i></button>
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
        <img src="Public/images/wlimg8.png" class="imgs">
 -->

       

        
        
        
            
        <button id="header">“ජාතියක සැබෑ ධනය පවතින්නේ පොලොව, පස, ජලය, වනාන්තර, ඛණිජ, සහ වනජීවී සම්පත් වලය.”</button>
        <form action="villager/register">
            <button id="regButton" >ලියාපදිංචිය</button>
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
        
        <h1 >Wildlife Care යනු කුමක්ද?</h1>
        <p>Wildlife Care යනු වෙබ් සහ මොබයිල් පදනම් කරගත් පද්ධතියක් වන අතර මෙය මගින් වනජීවි නිළදාරීන් හා ගම්මුන් අතර පවතින දුරස්ත භාවය අඩු කිරීමට සමත් වේ.එම නිසා Wildlife Care මගින් ඵලදායී සහ කාර්යක්ශම සන්නිවේදනයක් ඇති කරයි. මෙහි ප්‍රධාන අරමුණ වනුයේ මිනිසුන්ගෙ, වනසතුන්ගේ ජීවිත මෙන්ම දෙපළද යම් කිසි අකාරයකින් ආරක්ශා කර ගැනීමයි.
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
                            <h4>හදිසි සිදුවීම් වාර්තා කිරීම</h4>
                            
                         </div>
                         <div id="fr1-1-class">

                            <img src="Public/images/elephant.png"  >
                         <h2>හදිසි සිදුවීම් වාර්තා කිරීම</h2>
                         <p>වන සතුන් සම්බන්ධ සිදුවීම් වාර්තා කිරීමට Wildlife Care පරිශීලකයින්ට පහසුකම් සලසා ඇත.එම තොරතුරු ඉක්මනින් පරිශීලකයින්ට දැනුම් දීමට හැකියි.  </p>
                             
                         </div>


                    </div>
                </li>

                <li>

                    <div id="fr1-2">
                        <img src="Public/images/alertinci.png">
                        <div id="fr1-2-side">
                            <i class="fas fa-bell"></i>
                            <h4>අනතුරු ඇගවීම් ලබා ගන්න.</h4>

                            
                         </div>
                        
                        <div id="fr1-2-class">

                            <img src="Public/images/bell.png" >
                        <h2>අනතුරු ඇගවීම් ලබා ගන්න.</h2>
                        <p>වන අලි ගම්වලට පැමිණෙන බව වාර්තා වන විට අදාළ ගම්වාසීන්ට කඩිනමින් දැනුම් දීමට Wildlife Care පහසුකම් සලසා ඇත. </p>
                             
                         </div>


                    </div>
                </li>

                <li>

                    <div id="fr1-3">
                        <img src="Public/images/vetinci.png">
                        <div id="fr1-3-side">
                          <i class="fas fa-laptop-medical"></i>
                            <h4>පශු වෛද්ය සහාය</h4>
                            
                         </div>


                        <div id="fr1-3-class">
                            <img src="Public/images/vet.png" >
                        <h2>පශු වෛද්ය සහාය</h2>
                        <p>වන සතෙකු අනතුරට පත් වූ විගස Wildlife Care භාවිතා කර පශු වෛද්‍යවරුන් දැනුවත් කිරීමට වනජීවී නිලධාරීන්ට පහසුකම් ඇත. </p>
                             
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
                            <h4>සිතියම්</h4>
                            
                         </div>
                        
                        <div id="fr2-1-class">
                             <img src="Public/images/map.png"  >
                          
                         <h2>සිතියම්</h2>
                         <p>සිද්ධියක් වාර්තා කිරීමේදී පරිශීලකයින්ට ස්ථානය සලකුණු කිරීමට Wildlife Care ඉඩ සලසයි.
වාර්තා වූ සිද්ධියේ ස්ථානය ද බැලීමට හැකිය.</p>
                             
                         </div>
                         

                    </div>

                    
                </li>

                <li>

                    <div id="fr2-2">
                        <img src="Public/images/reginci.png">
                        <div id="fr2-2-side">
                          <i class="fas fa-phone"></i>
                            <h4>ස්මාර්ට් ජංගම දුරකථන නොමැතිව ලියාපදිංචි වන්න</h4>
                            
                         </div>
                        
                        <div id="fr2-2-class">

                            <img src="Public/images/mobile.png" >
                        <h2>ස්මාර්ට් ජංගම දුරකථන නොමැතිව ලියාපදිංචි වන්න</h2>
                        <p>ස්මාර්ට් ජංගම දුරකථන නොමැති නමුත් ජංගම දුරකථන ඇති ගමේ අයට මෙම පද්ධතියෙන් ලියාපදිංචි වී අනතුරු ඇඟවීම් ලබා ගත හැකිය.
 </p>
                             
                         </div>

                    </div>
                </li>

                <li>

                    <div id="fr2-3">
                        <img src="Public/images/dashinci.png">
                        <div id="fr2-3-side">
                          <i class="fas fa-chart-line"></i>
                            <h4>විශ්ලේෂණ උපකරණ පුවරුව</h4>
                            
                         </div>
                        
                        <div id="fr2-3-class">

                            <img src="Public/images/dash.png" >
                        <h2>විශ්ලේෂණ උපකරණ පුවරුව</h2>
                        <p>Wildlife Care විශ්ලේෂණ කටයුතු සඳහා සවිස්තර උපකරණ පුවරුවක් සපයයි.</p>
                             
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
                            <li><h4>ලිපිනය</h4></li>
                            <li>No18</li>
                            <li>Kandy Road</li>
                            <li>Pilimathalawa</li>
                        </ul>
                        
                    </div>

                     <div class="footer-col">

                        
                        <ul><li><h4>මෙනුව</h4></li>
                            <li><a href="">ප්‍රදාන පිටුව</a></li>
                            <li><a href="villager/register?lang=2">ලියාපදිංචිය</a></li>
                            <li><a href="user/index?lang=2">ඇතුල් වන්න</a></li>
                            
                        </ul>
                        
                    </div>

                     <div class="footer-col">

                        <h4>අප හා සම්බන්ධ වන්න</h4>
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