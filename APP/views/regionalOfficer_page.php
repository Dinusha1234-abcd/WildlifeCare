<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    
     <script src="../Public/Javascript/admin.js"></script>
     <!-- <script src="../Public/Javascript/notice.js"></script> -->
     <link rel="stylesheet" href="../Public/css/regionalOfficer_page.css">
     
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="../Public/css/noticeAlert.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
    <title>Document</title>
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
                <li id="home" class="nav-menu-item"><a href="../">Home</a></li>
                <li id="add" class="nav-menu-item"><a href="../admin/dashboard">Dashboard</a></li>
                
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
    <h1 id="actor">REGIONAL OFFICER</h1>
    <input type="checkbox" id="check" >
    <label for="check" id="side-but"><i class="fas fa-bars" id="side-btn"></i></label>
    

    <div class="sidebar">
      <label for="check"><i class="fas fa-times" id="cancel"></i></label>
      <h1>Wildlife Care</h1>
      <ul>
        <li><a href="../regionalOfficer/viewUser"><i class="fas fa-users"></i>Users</a></li>
        <li><a href="../regionalOfficer/placeNotice"><i class="fas fa-bell"></i>Notice</a></li>
        
      </ul>


      
    </div>
    <div id="notice-box">
    </div>
          
    
  
            
           
            
        </div>


         <div class="container2">
           <div class="radios">

            <label class="radio-but" data-radio="active">

              <input type="radio" name="cases" class="radio-input" checked >
              <span class="radio-mark" id="act">
                Active Cases
              </span>
              
            </label>

            <label class="radio-but" data-radio="success">

              <input type="radio" name="cases" class="radio-input" >
              <span class="radio-mark" id="suc">
                Success Cases
              </span>
              
            </label>

            <label class="radio-but" data-radio="unsuccess">

              <input type="radio" name="cases" class="radio-input" >
              <span class="radio-mark" id="unsuc">
                Unsuccess Cases
              </span>
              
            </label>

             
           </div>

           <script type="text/javascript">

            $(document).ready(function(){
              $(".container2-inci .radio-content").hide();
              $(".container2-inci .radio-content:first-child").show();

              $(".radio-but").click(function(){

                var cur_case=$(this).attr("data-radio");
                $(".container2-inci .radio-content").hide();
                $("."+cur_case).show();

              });

            });
             
           </script>
             
              
             

             <div class="container2-inci">
                <div class="radio-content active">

                  <div class="inci" id="ele-1-box">
                   <div class="ele-1-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-1">
                    <h2 class="counter num" id="front-num1" ><?php echo ($data["activeCases"])["numOfActiveElephantsVillage"];?></h2>
                    <h2 id="ele-1-para">Elephants Attack</h2>
                    
                     
                   </div>

                   <div class="ele-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveElephantsVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=active&incident=elephantAttack'">View</button>
                    
                    
                     
                   </div>
                    


                        
                 </div>
                 <div class="inci" id="ani-1-box">
                    <div class="ani-1-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-1">
                    <h2 class="counter" id="front-num2" ><?php echo ($data["activeCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <h2 id="ani-1-para">Animals in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=active&incident=animalsVillage'">View</button>

                   
                    </div>
                        
                 </div>
                 <div class="inci" id="dan-1-box">
                  <div class="dan-1-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-1">
                    <h2 class="counter" id="front-num3" ><?php echo ($data["activeCases"])["numOfActiveAnimalIsDanger"];?></h2>
                    <h2 id="dan-1-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveAnimalIsDanger"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=active&incident=animalDanger'">View</button>

                   
                    </div>
                    
                        
                 </div>
                 <div class="inci" id="ill-1-box">


                  <div class="ill-1-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-1">
                    <h2 class="counter" id="front-num4" ><?php echo ($data["activeCases"])["numOfActiveIllegal"];?></h2>
                    <h2 id="ill-1-para">Illegal Things</h2>
                    
                    
                     
                   </div>

                   <div class="ill-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveIllegal"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=active&incident=illegal'">View</button>

                   
                    </div>




                    
                        
                 </div>
                 <div class="inci" id="crop-1-box">


                  <div class="crop-1-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-1">
                    <h2 class="counter" id="front-num5" ><?php echo ($data["activeCases"])["numOfActiveCropDamage"];?></h2>
                    <h2 id="crop-1-para">Crop Damages</h2>
                    
                    
                     
                   </div>

                   <div class="crop-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveCropDamage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=active&incident=cropDamage'">View</button>

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-1-box">


                  <div class="fen-1-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-1">
                    <h2 class="counter" id="front-num6" ><?php echo ($data["activeCases"])["numOfActiveBreakdownFence"];?></h2>
                    <h2 id="fen-1-para">Fence Damages</h2>
                   
                    
                     
                   </div>

                   <div class="fen-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveBreakdownFence"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=active&incident=fenceDamage'">View</button>

                   
                    </div>
                   
                        
                 </div>
                 <div id="active-map"></div>

                 <script type="text/javascript">

                     function initMapActive(){
                      var locationActive={lat:7.94033813 , lng:81.01879883};
                      var mapActive = new google.maps.Map(document.getElementById("active-map"),
                         {
                          zoom:10,
                          center:locationActive,
                          
                         }

                        );

                      var activeLocationArray=<?php echo json_encode(($data["activeMapLocation"]));?>;

                     

                      for(let i=0;i<activeLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(activeLocationArray[i])["reporttype"];
                          switch(type){
                            case "Crop Damages":{
                              icon={
                                       url:"../Public/images/cropDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Other Wild Animals are in The Village":{
                              icon={
                                       url:"../Public/images/animalDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Breakdown of Elephant Fences":{
                              icon={
                                       url:"../Public/images/fenceDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Wild Animal is in Danger":{
                              icon={
                                       url:"../Public/images/dangerDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Elephants are in The Village":{
                              icon={
                                       url:"../Public/images/elephantDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Illegal Happing":{
                              icon={
                                       url:"../Public/images/illegalDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                          }
                          var lati=parseFloat((activeLocationArray[i])["lat"]);
                          var long=parseFloat((activeLocationArray[i])["lon"]);
                          var label=((activeLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(activeLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerActive= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapActive,
                          icon:icon,
                          label:label,
                          

                        }


                          );

                        
                        


                        


                      }

                      


                    }
                   

                 </script>
                   

                

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapActive"  async></script>

              

                
             </div>
                 

             <div class="radio-content success">


                 <div class="inci" id="ele-2-box">
                   <div class="ele-2-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-2">
                    <h2 class="counter" id="front-num1" ><?php echo ($data["successCases"])["numOfActiveElephantsVillage"];?></h2>
                    <h2 id="ele-2-para">Elephants Attack</h2>
                    
                   
                     
                   </div>

                   <div class="ele-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveElephantsVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=success&incident=elephantAttack'">View</button>
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-2-box">
                    <div class="ani-2-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-2">
                    <h2 class="counter" id="front-num2" ><?php echo ($data["successCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <h2 id="ani-2-para">Animals in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=success&incident=animalsVillage'">View</button>

                   
                    </div>
                        
                 </div>

                 <div class="inci" id="dan-2-box">
                  <div class="dan-2-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-2">
                    <h2 class="counter" id="front-num3" ><?php echo ($data["successCases"])["numOfActiveAnimalIsDanger"];?></h2>
                    <h2 id="dan-2-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveAnimalIsDanger"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=success&incident=animalDanger'">View</button>

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-2-box">


                  <div class="ill-2-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-2">
                    <h2 class="counter" id="front-num4" ><?php echo ($data["successCases"])["numOfActiveIllegal"];?></h2>
                    <h2 id="ill-2-para">Illegal Things</h2>
                    
                    
                     
                   </div>

                   <div class="ill-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveIllegal"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=success&incident=illegal'">View</button>

                   
                    </div>




                    
                        
                 </div>


                 <div class="inci" id="crop-2-box">


                  <div class="crop-2-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-2">
                    <h2 class="counter" id="front-num5" ><?php echo ($data["successCases"])["numOfActiveCropDamage"];?></h2>
                    <h2 id="crop-2-para">Crop Damages</h2>
                    
                   
                     
                   </div>

                   <div class="crop-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveCropDamage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=success&incident=cropDamage'">View</button>

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-2-box">


                  <div class="fen-2-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-2">
                    <h2 class="counter" id="front-num6" ><?php echo ($data["successCases"])["numOfActiveBreakdownFence"];?></h2>
                    <h2 id="fen-2-para">Fence Damages</h2>
                    
                    
                     
                   </div>

                   <div class="fen-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveBreakdownFence"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=success&incident=fenceDamage'">View</button>

                   
                    </div>
                   
                        
                 </div>


                 <div id="success-map"></div>

                 <script type="text/javascript">

                     function initMapSuccess(){
                      var locationSuccess={lat:7.94033813 , lng:81.01879883};
                      var mapSuccess = new google.maps.Map(document.getElementById("success-map"),
                         {
                          zoom:8,
                          center:locationSuccess,
                          
                         }

                        );

                      var successLocationArray=<?php echo json_encode(($data["successMapLocation"]));?>;

                    

                      for(let i=0;i<successLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(successLocationArray[i])["reporttype"];
                          switch(type){
                            case "Crop Damages":{
                              icon={
                                       url:"../Public/images/cropDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Other Wild Animals are in The Village":{
                              icon={
                                       url:"../Public/images/animalDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Breakdown of Elephant Fences":{
                              icon={
                                       url:"../Public/images/fenceDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Wild Animal is in Danger":{
                              icon={
                                       url:"../Public/images/dangerDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Elephants are in The Village":{
                              icon={
                                       url:"../Public/images/elephantDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Illegal Happing":{
                              icon={
                                       url:"../Public/images/illegalDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                          }
                          var lati=parseFloat((successLocationArray[i])["lat"]);
                          var long=parseFloat((successLocationArray[i])["lon"]);
                          var label=((successLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(successLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerSuccess= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapSuccess,
                          icon:icon,
                          label:label

                        }


                          );

                        // var infoActiveOptions={
                        //   content:markerContent,
                        //   position:{lat:lati,lng:long}
                        // };

                        // var infoWindowActive=new google.maps.infoWindow(infoActiveOptions);

                        // var infoActiveOpenOptions={
                        //   map:mapActive
                        // };

                        // infoWindowActive.open(infoActiveOpenOptions);

                        // mapActive.addListener("center_changed", () => {
                        //                             // 3 seconds after the center of the map has changed, pan back to the
                        //                             // marker.
                        //     window.setTimeout(() => {
                        //       mapActive.panTo(markerActive.getPosition());
                        //     }, 3000);
                        //   });
                        //   markerActive.addListener("click", () => {
                        //     mapActive.setZoom(12);
                        //     mapActive.setCenter(markerActive.getPosition());
                        //   });

                        


                        


                      }

                      

                      


                    }
                   

                 </script>

                 <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapSuccess" async></script>




                



                

             </div>

             <div class="radio-content unsuccess">
                
                 <div class="inci" id="ele-3-box">
                   <div class="ele-3-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-3">
                    <h2 class="counter" id="front-num1" ><?php echo ($data["unSuccessCases"])["numOfActiveElephantsVillage"];?></h2>
                    <h2 id="ele-3-para">Elephants Attack</h2>
                    
                    
                     
                   </div>

                   <div class="ele-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveElephantsVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=unsuccess&incident=elephantAttack'">View</button>
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-3-box">
                    <div class="ani-3-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-3">
                    <h2 class="counter" id="front-num2" ><?php echo ($data["unSuccessCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <h2 id="ani-3-para">Animals in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=unsuccess&incident=animalsVillage'">View</button>

                   
                    </div>
                        
                 </div>

                 <div class="inci" id="dan-3-box">
                  <div class="dan-3-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-3">
                    <h2 class="counter" id="front-num3" ><?php echo ($data["unSuccessCases"])["numOfActiveAnimalIsDanger"];?></h2>
                    <h2 id="dan-3-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveAnimalIsDanger"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=unsuccess&incident=animalDanger'">View</button>

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-3-box">


                  <div class="ill-3-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-3">
                    <h2 class="counter" id="front-num4" ><?php echo ($data["unSuccessCases"])["numOfActiveIllegal"];?></h2>
                    <h2 id="ill-3-para">Illegal Things</h2>
                    
                    
                     
                   </div>

                   <div class="ill-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveIllegal"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=unsuccess&incident=illegal'">View</button>

                   
                    </div>




                    
                        
                 </div>


                 <div class="inci" id="crop-3-box">


                  <div class="crop-3-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-3">
                    <h2 class="counter" id="front-num5" ><?php echo ($data["unSuccessCases"])["numOfActiveCropDamage"];?></h2>
                    <h2 id="crop-3-para">Crop Damages</h2>
                    
                    
                     
                   </div>

                   <div class="crop-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveCropDamage"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=unsuccess&incident=cropDamage'">View</button>

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-3-box">


                  <div class="fen-3-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-3">
                    <h2 class="counter" id="front-num6" ><?php echo ($data["unSuccessCases"])["numOfActiveBreakdownFence"];?></h2>
                    <h2 id="fen-3-para">Fence Damages</h2>
                    
                    
                     
                   </div>

                   <div class="fen-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveBreakdownFence"];?></h2>
                    <button class="ele-button" onclick="location.href='../regionalOfficer/viewReportedIncidents?status=unsuccess&incident=fenceDamage'">View</button>

                   
                    </div>
                   
                        
                 </div>

                 <div id="unsuccess-map"></div>

                 <script type="text/javascript">

                     function initMapUnsuccess(){
                      var locationUnsuccess={lat:7.94033813 , lng:81.01879883};
                      var mapUnsuccess = new google.maps.Map(document.getElementById("unsuccess-map"),
                         {
                          zoom:8,
                          center:locationUnsuccess,
                          
                         }

                        );

                      var unsuccessLocationArray=<?php echo json_encode(($data["unsuccessMapLocation"]));?>;

                     

                      for(let i=0;i<unsuccessLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(unsuccessLocationArray[i])["reporttype"];
                          switch(type){
                            case "Crop Damages":{
                              icon={
                                       url:"../Public/images/cropDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Other Wild Animals are in The Village":{
                              icon={
                                       url:"../Public/images/animalDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Breakdown of Elephant Fences":{
                              icon={
                                       url:"../Public/images/fenceDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Wild Animal is in Danger":{
                              icon={
                                       url:"../Public/images/dangerDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Elephants are in The Village":{
                              icon={
                                       url:"../Public/images/elephantDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                            case "Illegal Happing":{
                              icon={
                                       url:"../Public/images/illegalDash.png",
                                       scaledSize: new google.maps.Size(50,50)
                                    };
                            };
                            break;
                          }
                          var lati=parseFloat((unsuccessLocationArray[i])["lat"]);
                          var long=parseFloat((unsuccessLocationArray[i])["lon"]);
                          var label=((unsuccessLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(unsuccessLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerUnsuccess= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapUnsuccess,
                          icon:icon,
                          label:label

                        }


                          );

                        // var infoActiveOptions={
                        //   content:markerContent,
                        //   position:{lat:lati,lng:long}
                        // };

                        // var infoWindowActive=new google.maps.infoWindow(infoActiveOptions);

                        // var infoActiveOpenOptions={
                        //   map:mapActive
                        // };

                        // infoWindowActive.open(infoActiveOpenOptions);

                        // mapActive.addListener("center_changed", () => {
                        //                             // 3 seconds after the center of the map has changed, pan back to the
                        //                             // marker.
                        //     window.setTimeout(() => {
                        //       mapActive.panTo(markerActive.getPosition());
                        //     }, 3000);
                        //   });
                        //   markerActive.addListener("click", () => {
                        //     mapActive.setZoom(12);
                        //     mapActive.setCenter(markerActive.getPosition());
                        //   });

                        


                        


                      }

                      


                    }
                   

                 </script>

                 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapUnsuccess"></script>




             </div>

                 

             
             
        </div>


            

       

   


    <div class="container3">

      <div class="chart1">
        <canvas id="doughnut-chart"></canvas>
        <h3>Status Chart</h3>

        
      </div>

      <script >
           let status=document.getElementById("doughnut-chart").getContext("2d");
           let active=<?php echo json_encode(($data["noOfActive"]));?>;
           let success=<?php echo json_encode(($data["noOfSuccess"]));?>;
           let unsuccess=<?php echo json_encode(($data["noOfUnsuccess"]));?>;
           let statusLabels=["Success","Pending","Unsuccess"];
           let statusData=[success,active,unsuccess];
           let statusColor=["green","#7FFFD4","red"];
           let statusChart=new Chart(status, {
                type:"doughnut",
                data:{
                       labels:statusLabels,
                       datasets:[{
                       data:statusData,
                       backgroundColor:statusColor
                       }]
                       },
                options:{
                    title:{
                    text:"Status Chart",
                   display:true
                     }
                     }
      

                   });
                 </script>


            <div class="chart2">

              <canvas id="bar-chart"></canvas>
              <h3>Incident Chart</h3>
              
            </div>

            <script >
              let bar=document.getElementById("bar-chart").getContext("2d");
              let barLabels=["Elephants in Villages","Wild Animal is in Danger","Crop Damages","Illegal Things","Other Wild Animals in Villages","Damage Fences"];
              var noOfElephantVillage=<?php echo json_encode(($data["noOfCases"])["numOfActiveElephantsVillage"]);?>;
              var noOfAnimalDanger=<?php echo json_encode(($data["noOfCases"])["numOfActiveAnimalIsDanger"]);?>;
              var noOfCropDamage=<?php echo json_encode(($data["noOfCases"])["numOfActiveCropDamage"]);?>;
              var noOfIllegal=<?php echo json_encode(($data["noOfCases"])["numOfActiveIllegal"]);?>;
              var noOfOtherAnimal=<?php echo json_encode(($data["noOfCases"])["numOfActiveAnimalInVillage"]);?>;
              var noOfDamageFence=<?php echo json_encode(($data["noOfCases"])["numOfActiveBreakdownFence"]);?>;
              let barData=[noOfElephantVillage,noOfAnimalDanger,noOfCropDamage,noOfIllegal,noOfOtherAnimal,noOfDamageFence];
              let barColor=["#34EC36","#2A5C2B","#90EAAD","#0A451D","#669F38","#74EC2E"];
              let barChart=new Chart(bar, {
                    type:"bar",
                    data:{
                        labels:barLabels,
                        datasets:[{
                        label: 'Incident Chart',
                        data:barData,
                        backgroundColor:barColor
                          }]
                       },
                    options:{
                    title:{
                        text:"Incident Chart",
                        display:true
                          }
                          }
      
 
                         });
                 </script>


            <div class="chart3">

              <canvas id="line-chart"></canvas>
              <h3>Incident Report With Time</h3>
              
            </div>


            <script >
              let line=document.getElementById("line-chart").getContext("2d");
              let lineLabels=["12-3","3-6","6-9","9-12","12-15","15-18","18-21","21-00"];
              var noOf12_3=<?php echo json_encode(($data["times"])["12_3"]);?>;
              var noOf3_6=<?php echo json_encode(($data["times"])["3_6"]);?>;
              var noOf6_9=<?php echo json_encode(($data["times"])["6_9"]);?>;
              var noOf9_12=<?php echo json_encode(($data["times"])["9_12"]);?>;
              var noOf12_15=<?php echo json_encode(($data["times"])["12_15"]);?>;
              var noOf15_18=<?php echo json_encode(($data["times"])["15_18"]);?>;
              var noOf18_21=<?php echo json_encode(($data["times"])["18_21"]);?>;
              var noOf21_00=<?php echo json_encode(($data["times"])["21_00"]);?>;
              let lineData=[noOf12_3,noOf3_6,noOf6_9,noOf9_12,noOf12_15,noOf15_18,noOf18_21,noOf21_00];
              let lineChart=new Chart(line, {
                    type:"line",
                    data:{
                        labels:lineLabels,
                        datasets:[{
                        label: 'Incident Report With Time',
                        data:lineData,
                        borderColor:'#90EAAD'
                          }]
                       },
                    options:{
                    title:{
                        text:"Incident Report With Time",
                        display:true
                          }
                          }
      
 
                         });
                 </script>
       
        
 
    </div>
        
 
        

    </div>


    <div class="container4">
        <h1>Summary About Users and Reported Incidents</h1>

        <ul>
            <li>
                <div class="allUsers">
                    <h2>All Users</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Type</th>
                                <th>Number of Users</th>
                            </tr>
                            
                        </thead>
                        <tr>
                            <td>Regional Officers</td>
                            <td class="counter">2</td>
                        </tr>
                        <tr>
                            <td>Wildlife Officers</td>
                            <td class="counter">1</td>
                        </tr>
                        <tr>
                            <td>Villagers</td>
                            <td class="counter">3</td>
                        </tr>
                        <tr>
                            <td>Grama Niladhari</td>
                            <td class="counter">5</td>
                        </tr>
                        <tr>
                            <td>Veterinarian</td>
                            <td class="counter">10</td>
                        </tr>
                        

                        <tbody>
                            
                        </tbody>
                    </table>


                    
                </div>
            </li>
            <li>
                <div class="activeUsers">
                    <h2>Details About Incidents</h2>

                     <table class="table">
                        <thead>
                            
                            
                        </thead>
                        <tr>
                            <td>Total Reported Incidents</td>
                            <td class="counter"><?php echo ($data["detailsAboutIncidents"])["totalIncident"]?></td>
                        </tr>
                        <tr>
                            <td>Percentage of Success</td>
                            <td class="counter"><?php echo (((($data["detailsAboutIncidents"])["totalSuccessIncident"])/(($data["detailsAboutIncidents"])["totalIncident"]))*100)?></td>
                        </tr>
                        <tr>
                            <td>Percentage of Unuccess</td>
                            <td class="counter"><?php echo (((($data["detailsAboutIncidents"])["totalUnsuccessIncident"])/(($data["detailsAboutIncidents"])["totalIncident"]))*100)?></td>
                        </tr>
                        <tr>
                            <td>Percentage of Active</td>
                            <td class="counter"><?php echo (((($data["detailsAboutIncidents"])["totalActiveIncident"])/(($data["detailsAboutIncidents"])["totalIncident"]))*100)?></td>
                        </tr>
                        <tr>
                            <td>Total Accepted Incidents</td>
                            <td class="counter"><?php echo ($data["detailsAboutIncidents"])["totalAccpted"]?></td>
                        </tr>
                         <tr>
                            <td>Percentage of Accepted and Success</td>
                            <td class="counter"><?php echo (((($data["detailsAboutIncidents"])["acceptedSuccess"])/(($data["detailsAboutIncidents"])["totalAccpted"]))*100)?></td>
                        </tr>
                        <tr>
                            <td>Percentage of Accepted and Unsuccess</td>
                            <td class="counter"><?php echo (((($data["detailsAboutIncidents"])["acceptedUnsuccess"])/(($data["detailsAboutIncidents"])["totalAccpted"]))*100)?></td>
                        </tr>
                        <tr>
                            <td>Percentage of Accepted and Active</td>
                            <td class="counter"><?php echo (((($data["detailsAboutIncidents"])["acceptedActive"])/(($data["detailsAboutIncidents"])["totalAccpted"]))*100)?></td>
                        </tr>
                       
                        

                        <tbody>
                            
                        </tbody>
                    </table>
                    
                </div>
            </li>
            

        </ul>
        


    </div>



</body>

<script >
                   
                   
                   $(document).ready(function(){
                    $(".counter").counterUp({
                      delay:100,
                      time:3000
                    })
                   })
                   function count(){
                    $(".counter").counterUp({
                      delay:100,
                      time:3000
                    })
                   }

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
</html>


