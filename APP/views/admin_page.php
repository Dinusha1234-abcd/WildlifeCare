<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    
     <script src="../Public/Javascript/admin.js"></script>
     <link rel="stylesheet" href="../Public/css/admin_page.css">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" ></script>

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
                        <a href="../admin/viewProfile">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <h1 id="actor">ADMINISTRATOR</h1>
    <input type="checkbox" id="check" >
    <label for="check" id="side-but"><i class="fas fa-bars" id="side-btn"></i></label>
    

    <div class="sidebar">
      <label for="check"><i class="fas fa-times" id="cancel"></i></label>
      <h1>Wildlife Care</h1>
      <ul>
        <li><a href="../admin/viewUser"><i class="fas fa-users"></i>Users</a></li>
        <li><a href="../admin/placeNotice"><i class="fas fa-bell"></i>Notice</a></li>
        
      </ul>


      
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=active&incident=elephantAttack'">View</button>
                    
                    
                     
                   </div>
                    


                        
                 </div>
                 <div class="inci" id="ani-1-box">
                    <div class="ani-1-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-1">
                    <h2 class="counter" id="front-num2" ><?php echo ($data["activeCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <h2 id="ani-1-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=active&incident=animalsVillage'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=active&incident=animalDanger'">View</button>

                   
                    </div>
                    
                        
                 </div>
                 <div class="inci" id="ill-1-box">


                  <div class="ill-1-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-1">
                    <h2 class="counter" id="front-num4" ><?php echo ($data["activeCases"])["numOfActiveIllegal"];?></h2>
                    <h2 id="ill-1-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-1-box-back">
                    <h2 class="counter"><?php echo ($data["activeCases"])["numOfActiveIllegal"];?></h2>
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=active&incident=illegal'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=active&incident=cropDamage'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=active&incident=fenceDamage'">View</button>

                   
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
                   

                

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapActive"  async></script>

              

                 <div class="active-dis-chart">
                    <canvas id="active-dis"></canvas>
                    <h3>Active Cases By districts</h3>
                     
                 </div>


                 <script >
                  
                     let activeDis=document.getElementById("active-dis").getContext("2d");
    let activeDisLabels=["polonnaruwa","anuradhapura","ampara","hambanthota"];
    var activePolonnaruwa=<?php echo json_encode(($data["numOfActiveCasesByDistrict"])["polonnaruwa"]);?>;
    var activeAnuradhapura=<?php echo json_encode(($data["numOfActiveCasesByDistrict"])["anuradhapura"]);?>;
    var activeHambanthota=<?php echo json_encode(($data["numOfActiveCasesByDistrict"])["hambanthota"]);?>;
    var activeAmpara=<?php echo json_encode(($data["numOfActiveCasesByDistrict"])["ampara"]);?>;
    let activeDisData=[activePolonnaruwa,activeAnuradhapura,activeAmpara,activeHambanthota];
     let activeDisColor=["#6495ED","#7FFFD4","#8A2BE2","#A52A2A"];
     
    let activeDisChart=new Chart(activeDis, {
      type:"bar",
      data:{
        labels:activeDisLabels,
        datasets:[{
          data:activeDisData,
          backgroundColor:activeDisColor
        }]
      },
      options:{
        title:{
          text:"Active Cases By districts",
          display:true
        },
        legend:{
        display:false
      }
      }
      

    });
                 </script>

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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=success&incident=elephantAttack'">View</button>
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-2-box">
                    <div class="ani-2-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-2">
                    <h2 class="counter" id="front-num2" ><?php echo ($data["successCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <h2 id="ani-2-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=success&incident=animalsVillage'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=success&incident=animalDanger'">View</button>

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-2-box">


                  <div class="ill-2-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-2">
                    <h2 class="counter" id="front-num4" ><?php echo ($data["successCases"])["numOfActiveIllegal"];?></h2>
                    <h2 id="ill-2-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-2-box-back">
                    <h2 class="counter"><?php echo ($data["successCases"])["numOfActiveIllegal"];?></h2>
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=success&incident=illegal'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=success&incident=cropDamage'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=success&incident=fenceDamage'">View</button>

                   
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




                



                 <div class="success-dis-chart">
                    <canvas id="success-dis"></canvas>
                    <h3>Success Cases By districts</h3>
                     
                 </div>

                 <script >
                     let successDis=document.getElementById("success-dis").getContext("2d");
    let successDisLabels=["polonnaruwa","anuradhapura","ampara","hambanthota"];
    var successPolonnaruwa=<?php echo json_encode(($data["numOfSuccessCasesByDistrict"])["polonnaruwa"]);?>;
    var successAnuradhapura=<?php echo json_encode(($data["numOfSuccessCasesByDistrict"])["anuradhapura"]);?>;
    var successHambanthota=<?php echo json_encode(($data["numOfSuccessCasesByDistrict"])["hambanthota"]);?>;
    var successAmpara=<?php echo json_encode(($data["numOfSuccessCasesByDistrict"])["ampara"]);?>;
    let successDisData=[successPolonnaruwa,successAnuradhapura,successAmpara,successHambanthota];
     let successDisColor=["#6495ED","#7FFFD4","#8A2BE2","#A52A2A"];
    let successDisChart=new Chart(successDis, {
      type:"bar",
      data:{
        labels:successDisLabels,
        datasets:[{
          data:successDisData,
          backgroundColor:successDisColor
        }]
      },
      options:{
        title:{
          text:"Success Cases By districts",
          display:true
        },
        legend:{
        display:false
      }
      }
      

    });
                 </script>

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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=unsuccess&incident=elephantAttack'">View</button>
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-3-box">
                    <div class="ani-3-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-3">
                    <h2 class="counter" id="front-num2" ><?php echo ($data["unSuccessCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <h2 id="ani-3-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveAnimalInVillage"];?></h2>
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=unsuccess&incident=animalsVillage'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=unsuccess&incident=animalDanger'">View</button>

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-3-box">


                  <div class="ill-3-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-3">
                    <h2 class="counter" id="front-num4" ><?php echo ($data["unSuccessCases"])["numOfActiveIllegal"];?></h2>
                    <h2 id="ill-3-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-3-box-back">
                    <h2 class="counter"><?php echo ($data["unSuccessCases"])["numOfActiveIllegal"];?></h2>
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=unsuccess&incident=illegal'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=unsuccess&incident=cropDamage'">View</button>

                   
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
                    <button class="ele-button" onclick="location.href='../admin/viewReportedIncidents?status=unsuccess&incident=fenceDamage'">View</button>

                   
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



                 <div class="unsuccess-dis-chart">
                    <canvas id="unsuccess-dis"></canvas>
                    <h3>Active Cases By districts</h3>
                     
                 </div>

                 <script >
                     let unsuccessDis=document.getElementById("unsuccess-dis").getContext("2d");
    let unsuccessDisLabels=["polonnaruwa","anuradhapura","ampara","hambanthota"];
    var unsuccessPolonnaruwa=<?php echo json_encode(($data["numOfUnSuccessCasesByDistrict"])["polonnaruwa"]);?>;
    var unsuccessAnuradhapura=<?php echo json_encode(($data["numOfUnSuccessCasesByDistrict"])["anuradhapura"]);?>;
    var unsuccessHambanthota=<?php echo json_encode(($data["numOfUnSuccessCasesByDistrict"])["hambanthota"]);?>;
    var unsuccessAmpara=<?php echo json_encode(($data["numOfUnSuccessCasesByDistrict"])["ampara"]);?>;
    let unsuccessDisData=[unsuccessPolonnaruwa,unsuccessAnuradhapura,unsuccessAmpara,unsuccessHambanthota];
     let unsuccessDisColor=["#6495ED","#7FFFD4","#8A2BE2","#A52A2A"];
    let unsuccessDisChart=new Chart(unsuccessDis, {
      type:"bar",
      data:{
        labels:unsuccessDisLabels,
        datasets:[{
          data:unsuccessDisData,
          backgroundColor:unsuccessDisColor
        }]
      },
      options:{
        title:{
          text:"Unsuccess Cases By districts",
          display:true
        },
        legend:{
        display:false
      }
      }
      

    });
                 </script>

             </div>

                 

             
             
        </div>


            

       

   


    <div class="container3">
       
           <select  id="selectDis" name="selectDis" onchange ="selectDis(this.value);count()">
               <option value="polonnaruwa">Polonnaruwa</option>
               <option value="anuradhapura">Anuradhapura</option>
               <option value="ampara">Ampara</option>
               <option value="hambanthota">Hambanthota</option>
           </select>

           <div class="container3-dis">
             <div class="polonnaruwa">



                 <div class="inci" id="ele-4-box">
                   <div class="ele-4-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-4">
                    <h2 class="counter" id="front-num1" ><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaElephantsVillage"];?></h2>
                    <h2 id="ele-4-para">Elephants Attack</h2>
                    
                    
                     
                   </div>

                   <div class="ele-4-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaElephantsVillage"];?></h2>
                    
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-4-box">
                    <div class="ani-4-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-4">
                    <h2 class="counter" id="front-num2" ><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaAnimalInVillage"];?></h2>
                    <h2 id="ani-4-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-4-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaAnimalInVillage"];?></h2>
                    

                   
                    </div>
                        
                 </div>

                 <div class="inci" id="dan-4-box">
                  <div class="dan-4-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-4">
                    <h2 class="counter" id="front-num3" ><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaAnimalIsDanger"];?></h2>
                    <h2 id="dan-4-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-4-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaAnimalIsDanger"];?></h2>
                    

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-4-box">


                  <div class="ill-4-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-4">
                    <h2 class="counter" id="front-num4" ><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaIllegal"];?></h2>
                    <h2 id="ill-4-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-4-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaIllegal"];?></h2>
                    

                   
                    </div>




                    
                        
                 </div>


                 <div class="inci" id="crop-4-box">


                  <div class="crop-4-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-4">
                    <h2 class="counter" id="front-num5" ><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaCropDamage"];?></h2>
                    <h2 id="crop-4-para">Crop Damages</h2>
                    
                    
                     
                   </div>

                   <div class="crop-4-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaCropDamage"];?></h2>
                    

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-4-box">


                  <div class="fen-4-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-4">
                    <h2 class="counter" id="front-num6" ><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaBreakdownFence"];?></h2>
                    <h2 id="fen-4-para">Fence Damages</h2>
                    
                    
                     
                   </div>

                   <div class="fen-4-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["polonnaruwaActive"])["numOfPolonnaruwaBreakdownFence"];?></h2>
                    

                   
                    </div>
                   
                        
                 </div>
                


                  <div id="map-polonnaruwa"> </div>
                  <h3 class="map-dis-header">Polonnaruwa Active Cases In Map</h3>

                  <script type="text/javascript">

                     function initMapPolonnaruwa(){
                      var locationPolonnaruwa={lat:7.932860 , lng:81.008080};
                      var mapPolonnaruwa = new google.maps.Map(document.getElementById("map-polonnaruwa"),
                         {
                          zoom:10,
                          center:locationPolonnaruwa,
                          
                         }

                        );

                      var polonnaruwaLocationArray=<?php echo json_encode(($data["districtActiveLocation"])["polonnaruwa"]);?>;

                     

                      for(let i=0;i<polonnaruwaLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(polonnaruwaLocationArray[i])["reporttype"];
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
                          var lati=parseFloat((polonnaruwaLocationArray[i])["lat"]);
                          var long=parseFloat((polonnaruwaLocationArray[i])["lon"]);
                          var label=((polonnaruwaLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(polonnaruwaLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerPolonnaruwa= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapPolonnaruwa,
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

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapPolonnaruwa"  async></script>


             <div class="polonnaruwa-status-chart">
                    <canvas id="polonnaruwa-status"></canvas>
                    <h3>Reported Incident Status</h3>

                     
                 </div>

                 <script >
                     let polonnaruwaStatus=document.getElementById("polonnaruwa-status").getContext("2d");
                     let noOfPolonnaruwaActive=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfPolonnaruwaActive"]);?>;
                     let noOfPolonnaruwaSuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfPolonnaruwaSuccess"]);?>;
                     let noOfPolonnaruwaUnsuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfPolonnaruwaUnsuccess"]);?>;
    let polonnaruwaStatusLabels=["Success","Pending","Unsuccess"];
    let polonnaruwaStatusData=[noOfPolonnaruwaSuccess,noOfPolonnaruwaActive,noOfPolonnaruwaUnsuccess];
     let polonnaruwaStatusColor=["green","#7FFFD4","red"];
    let polonnaruwaStatusChart=new Chart(polonnaruwaStatus, {
      type:"doughnut",
      data:{
        labels:polonnaruwaStatusLabels,
        datasets:[{
          data:polonnaruwaStatusData,
          backgroundColor:polonnaruwaStatusColor
        }]
      },
      options:{
        title:{
          text:"Last polonnaruwa incident status",
          display:true
        }
      }
      

    });
                 </script>

        <!-- <h3 class="map-dis-header">Polonnaruwa Active Cases In Map</h3> -->
         </div>


             <div class="anuradhapura">

                <div class="inci" id="ele-5-box">
                   <div class="ele-5-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-5">
                     <h2 class="counter" id="front-num1" ><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraElephantsVillage"];?></h2>
                    <h2 id="ele-5-para">Elephants Attack</h2>
                    
                   
                     
                   </div>

                   <div class="ele-5-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraElephantsVillage"];?></h2>
                    
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-5-box">
                    <div class="ani-5-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-5">
                    <h2 class="counter" id="front-num2" ><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraAnimalInVillage"];?></h2>
                    <h2 id="ani-5-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-5-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraAnimalInVillage"];?></h2>
                    

                   
                    </div>
                        
                 </div>

                 <div class="inci" id="dan-5-box">
                  <div class="dan-5-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-5">
                    <h2 class="counter" id="front-num3" ><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraAnimalIsDanger"];?></h2>
                    <h2 id="dan-5-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-5-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraAnimalIsDanger"];?></h2>
                    

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-5-box">


                  <div class="ill-5-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-5">
                    <h2 class="counter" id="front-num4" ><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraIllegal"];?></h2>
                    <h2 id="ill-5-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-5-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraIllegal"];?></h2>
                    

                   
                    </div>




                    
                        
                 </div>


                 <div class="inci" id="crop-5-box">


                  <div class="crop-5-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-5">
                    <h2 class="counter" id="front-num5" ><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraCropDamage"];?></h2>
                    <h2 id="crop-5-para">Crop Damages</h2>
                    
                    
                     
                   </div>

                   <div class="crop-5-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraCropDamage"];?></h2>
                    

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-5-box">


                  <div class="fen-5-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-5">
                    <h2 class="counter" id="front-num6" ><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraBreakdownFence"];?></h2>
                    <h2 id="fen-5-para">Fence Damages</h2>
                    
                    
                     
                   </div>

                   <div class="fen-5-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["anuradhapuraActive"])["numOfAnuradhapuraBreakdownFence"];?></h2>
                    

                   
                    </div>
                   
                        
                 </div>

                 
                 
                 

                 <div id="map-anuradhapura"></div>
                 <h3 class="map-dis-header">Anuradhapura Active Cases In Map</h3>


                  <script type="text/javascript">

                     function initMapAnuradhapura(){
                      var locationAnuradhapura={lat:8.312190 , lng:80.418716};
                      var mapAnuradhapura = new google.maps.Map(document.getElementById("map-anuradhapura"),
                         {
                          zoom:10,
                          center:locationAnuradhapura,
                          
                         }

                        );

                      var anuradhapuraLocationArray=<?php echo json_encode(($data["districtActiveLocation"])["anuradhapura"]);?>;

                     

                      for(let i=0;i<anuradhapuraLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(anuradhapuraLocationArray[i])["reporttype"];
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
                          var lati=parseFloat((anuradhapuraLocationArray[i])["lat"]);
                          var long=parseFloat((anuradhapuraLocationArray[i])["lon"]);
                          var label=((anuradhapuraLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(anuradhapuraLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerAnuradhapura= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapAnuradhapura,
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

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapAnuradhapura"  async></script>

             <div class="anuradhapura-status-chart">
                    <canvas id="anuradhapura-status"></canvas>
                    <h3>Reported Incident Status</h3>

                     
                 </div>

                 <script >
                     let anuradhapuraStatus=document.getElementById("anuradhapura-status").getContext("2d");
                      let noOfAnuradhapuraActive=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfAnuradhapuraActive"]);?>;
                     let noOfAnuradhapuraSuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfAnuradhapuraSuccess"]);?>;
                     let noOfAnuradhapuraUnsuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfAnuradhapuraUnsuccess"]);?>;
    let anuradhapuraStatusLabels=["Success","Pending","Unsuccess"];
    let anuradhapuraStatusData=[noOfAnuradhapuraSuccess,noOfAnuradhapuraActive,noOfAnuradhapuraUnsuccess];
     let anuradhapuraStatusColor=["green","#7FFFD4","red"];
    let anuradhapuraStatusChart=new Chart(anuradhapuraStatus, {
      type:"doughnut",
      data:{
        labels:anuradhapuraStatusLabels,
        datasets:[{
          data:anuradhapuraStatusData,
          backgroundColor:anuradhapuraStatusColor
        }]
      },
      options:{
        title:{
          text:"Last anuradhapura incident status",
          display:true
        }
      }
      

    });
                 </script>

          
         </div>
               
               <div class="ampara">

                 <div class="inci" id="ele-6-box">
                   <div class="ele-6-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-6">
                    <h2 class="counter" id="front-num1" ><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaElephantsVillage"];?></h2>
                    <h2 id="ele-6-para">Elephants Attack</h2>
                    
                    
                     
                   </div>

                   <div class="ele-6-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaElephantsVillage"];?></h2>
                    
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-6-box">
                    <div class="ani-6-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-6">
                    <h2 class="counter" id="front-num2" ><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaAnimalInVillage"];?></h2>
                    <h2 id="ani-6-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-6-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaAnimalInVillage"];?></h2>
                    

                   
                    </div>
                        
                 </div>

                 <div class="inci" id="dan-6-box">
                  <div class="dan-6-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-6">
                    <h2 class="counter" id="front-num3" ><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaAnimalIsDanger"];?></h2>
                    <h2 id="dan-6-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-6-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaAnimalIsDanger"];?></h2>
                    

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-6-box">


                  <div class="ill-6-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-6">
                    <h2 class="counter" id="front-num4" ><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaIllegal"];?></h2>
                    <h2 id="ill-6-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-6-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaIllegal"];?></h2>
                    

                   
                    </div>




                    
                        
                 </div>


                 <div class="inci" id="crop-6-box">


                  <div class="crop-6-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-6">
                    <h2 class="counter" id="front-num5" ><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaCropDamage"];?></h2>
                    <h2 id="crop-6-para">Crop Damages</h2>
                    
                    
                     
                   </div>

                   <div class="crop-6-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaCropDamage"];?></h2>
                    

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-6-box">


                  <div class="fen-6-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-6">
                    <h2 class="counter" id="front-num6" ><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaBreakdownFence"];?></h2>
                    <h2 id="fen-6-para">Fence Damages</h2>
                    
                    
                     
                   </div>

                   <div class="fen-6-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["amparaActive"])["numOfAmparaBreakdownFence"];?></h2>
                    

                   
                    </div>
                   
                        
                 </div>

                
                 
                 
                 
                   <div id="map-ampara"></div>
                   <h3 class="map-dis-header">Ampara Active Cases In Map</h3>

                   <script type="text/javascript">

                     function initMapAmpara(){
                      var locationAmpara={lat:7.3018 , lng:81.6747};
                      var mapAmpara = new google.maps.Map(document.getElementById("map-ampara"),
                         {
                          zoom:10,
                          center:locationAmpara,
                          
                         }

                        );

                      var amparaLocationArray=<?php echo json_encode(($data["districtActiveLocation"])["ampara"]);?>;

                     

                      for(let i=0;i<amparaLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(amparaLocationArray[i])["reporttype"];
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
                          var lati=parseFloat((amparaLocationArray[i])["lat"]);
                          var long=parseFloat((amparaLocationArray[i])["lon"]);
                          var label=((amparaLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(amparaLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerAmpara= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapAmpara,
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

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapAmpara"  async></script>



             <div class="ampara-status-chart">
                    <canvas id="ampara-status"></canvas>
                    <h3>Reported Incident Status</h3>

                     
                 </div>

                 <script >
                     let amparaStatus=document.getElementById("ampara-status").getContext("2d");
                      let noOfAmparaActive=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfAmparaActive"]);?>;
                     let noOfAmparaSuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfAmparaSuccess"]);?>;
                     let noOfAmparaUnsuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfAmparaUnsuccess"]);?>;
    let amparaStatusLabels=["Success","Pending","Unsuccess"];
    let amparaStatusData=[noOfAmparaSuccess,noOfAmparaActive,noOfAmparaUnsuccess];
     let amparaStatusColor=["green","#7FFFD4","red"];
    let amparaStatusChart=new Chart(amparaStatus, {
      type:"doughnut",
      data:{
        labels:amparaStatusLabels,
        datasets:[{
          data:amparaStatusData,
          backgroundColor:amparaStatusColor
        }]
      },
      options:{
        title:{
          text:"Last ampara incident status",
          display:true
        }
      }
      

    });
                 </script>
                 
         </div>
               

               <div class="hambanthota">

                <div class="inci" id="ele-7-box">
                   <div class="ele-7-box-front" class="front">
                    <img src="../Public/images/ele.png" id="ele-7">
                    <h2 class="counter" id="front-num1" ><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaElephantsVillage"];?></h2>
                    <h2 id="ele-7-para">Elephants Attack</h2>
                    
                    
                     
                   </div>

                   <div class="ele-7-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaElephantsVillage"];?></h2>
                    
                    
                    
                     
                   </div>
                    


                        
                 </div>

                 <div class="inci" id="ani-7-box">
                    <div class="ani-7-box-front" class="front">
                    <img src="../Public/images/ani1.png" id="ani-7">
                    <h2 class="counter" id="front-num2" ><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaAnimalInVillage"];?></h2>
                    <h2 id="ani-7-para">Animals are in Village</h2>
                    
                    
                     
                   </div>

                   <div class="ani-7-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaAnimalInVillage"];?></h2>
                    

                   
                    </div>
                        
                 </div>

                 <div class="inci" id="dan-7-box">
                  <div class="dan-7-box-front" class="front">
                    <img src="../Public/images/dan1.png" id="dan-7">
                    <h2 class="counter" id="front-num3" ><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaAnimalIsDanger"];?></h2>
                    <h2 id="dan-7-para">Animal is in Danger</h2>
                    
                    
                     
                   </div>

                   <div class="dan-7-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaAnimalIsDanger"];?></h2>
                    

                   
                    </div>
                    
                        
                 </div>

                 <div class="inci" id="ill-7-box">


                  <div class="ill-7-box-front" class="front">
                    <img src="../Public/images/ill1.png" id="ill-7">
                    <h2 class="counter" id="front-num4" ><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaIllegal"];?></h2>
                    <h2 id="ill-7-para">Illegal Activities</h2>
                    
                    
                     
                   </div>

                   <div class="ill-7-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaIllegal"];?></h2>
                    

                   
                    </div>




                    
                        
                 </div>


                 <div class="inci" id="crop-7-box">


                  <div class="crop-7-box-front" class="front">
                    <img src="../Public/images/crop1.png" id="crop-7">
                    <h2 class="counter" id="front-num5" ><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaCropDamage"];?></h2>
                    <h2 id="crop-7-para">Crop Damages</h2>
                    
                    
                     
                   </div>

                   <div class="crop-7-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaCropDamage"];?></h2>
                    

                   
                    </div>

                        
                 </div>
                 <div class="inci" id="fen-7-box">


                  <div class="fen-7-box-front" class="front">
                    <img src="../Public/images/fen1.png" id="fen-7">
                    <h2 class="counter" id="front-num6" ><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaBreakdownFence"];?></h2>
                    <h2 id="fen-7-para">Fence Damages</h2>
                    
                    
                     
                   </div>

                   <div class="fen-7-box-back">
                    <h2 class="counter"><?php echo (($data["totalCasesReportedByDistrict"])["hambanthotaActive"])["numOfHambanthotaBreakdownFence"];?></h2>
                    

                   
                    </div>
                   
                        
                 </div>

                 
                 
                 
                 
                   <div id="map-hambanthota"></div>
                   <h3 class="map-dis-header">Hambanthota Active Cases In Map</h3>

                   <script type="text/javascript">

                     function initMapHambanthota(){
                      var locationHambanthota={lat:6.1429 , lng:81.1212};
                      var mapHambanthota = new google.maps.Map(document.getElementById("map-hambanthota"),
                         {
                          zoom:10,
                          center:locationHambanthota,
                          
                         }

                        );

                      var hambanthotaLocationArray=<?php echo json_encode(($data["districtActiveLocation"])["hambanthota"]);?>;

                     

                      for(let i=0;i<hambanthotaLocationArray.length;i++)
                      {    
                           var icon="";

                          var type=(hambanthotaLocationArray[i])["reporttype"];
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
                          var lati=parseFloat((hambanthotaLocationArray[i])["lat"]);
                          var long=parseFloat((hambanthotaLocationArray[i])["lon"]);
                          var label=((hambanthotaLocationArray[i])["reporttype"]);
                          var markerContent="<h1>Incident ID:"+(hambanthotaLocationArray[i])["incidentID"]+"</h1>";
                          
                        var markerHambanthota= new google.maps.Marker({

                          position:{lat:lati,lng:long},
                          map:mapHambanthota,
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

                 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6bqTtd9axLl6pZb3eeSkRgRfXVjW1zkQ&callback=initMapHambanthota"  async></script>

             <div class="hambanthota-status-chart">
                    <canvas id="hambanthota-status"></canvas>
                    <h3>Reported Incident Status</h3>

                     
                 </div>

                 <script >
                     let hambanthotaStatus=document.getElementById("hambanthota-status").getContext("2d");
                     let noOfHambanthotaActive=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfHambanthotaActive"]);?>;
                     let noOfHambanthotaSuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfHambanthotaSuccess"]);?>;
                     let noOfHambanthotaUnsuccess=<?php echo json_encode(($data["totalCasesReportedByDistrict"])["noOfHambanthotaUnsuccess"]);?>;
    let hambanthotaStatusLabels=["Success","Pending","Unsuccess"];
    let hambanthotaStatusData=[noOfHambanthotaSuccess,noOfHambanthotaActive,noOfHambanthotaUnsuccess];
     let hambanthotaStatusColor=["green","#7FFFD4","red"];
    let hambanthotaStatusChart=new Chart(hambanthotaStatus, {
      type:"doughnut",
      data:{
        labels:hambanthotaStatusLabels,
        datasets:[{
          data:hambanthotaStatusData,
          backgroundColor:hambanthotaStatusColor
        }]
      },
      options:{
        title:{
          text:"Last hambanthota incident status",
          display:true
        }
      }
      

    });
                 </script>

                 

         </div>
               
               
          
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
                            <td class="counter"><?php echo $data["noOfRegionals"];?></td>
                        </tr>
                        <tr>
                            <td>Wildlife Officers</td>
                            <td class="counter"><?php echo $data["noOfWildlifers"];?></td>
                        </tr>
                        <tr>
                            <td>Villagers</td>
                            <td class="counter"><?php echo $data["noOfVillagers"];?></td>
                        </tr>
                        <tr>
                            <td>Grama Niladhari</td>
                            <td class="counter"><?php echo $data["noOfGramaNiladhari"];?></td>
                        </tr>
                        <tr>
                            <td>Veterinarian</td>
                            <td class="counter"><?php echo $data["noOfVeterinarians"];?></td>
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
                 </script>
</html>


