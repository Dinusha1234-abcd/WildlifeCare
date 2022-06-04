<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../Public/css/header.css">
     <link rel="stylesheet" href="../Public/css/Dashboard.css">
     <link rel="stylesheet" href="../Public/css/noticeAlert.css">
     <!-- <script src="../Public/javascript/dashboard.js"></script> -->
     <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
     <!-- <script src="../Public/javascript/dashboard.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="../Public/css/noticeAlert.css">
     <title>Statistical Analyze Board</title>
</head>
<body style="background-image: none; background-color: rgba(236, 242, 240, 0.624);">


    <header id="main">
        <img src="../Public/images/icon.png" alt="icon" id="icon">
        <nav id="navbar" class="mybar">
            <div href="javascript:void(0);" class="icon" onclick="myFunction_1(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <ul>
            <li id="home_2"><a href="../">Home</a></li>
                <li id="dashboard_1"  ><a href="../regionalOfficer/dashboard" >Dashboard</a></li>
                <li id="report_2"><a href="../regionalOfficer/viewUser">User</a></li>
                <li id="special_1"><a href="../regionalOfficer/placeNotice">SpecialNotice </a></li> 
                <div class="dropdown-1">
                    <button class="dropbtn-1">Language</button>
                    <div class="dropdown-content-1">
                    <a href="?lang=1&report=2">English</a>
                        <a href="?lang=2&report=2">සිංහල</a> 
                        <a href="?lang=3&report=2">தமிழ்</a>
                    </div>
                  </div>
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../regionalOfficer/viewProfile">View Profile</a>
                        <a href="logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>  

    
    <div class="header-name"><h >Total in Sri Lanka </h><h style="float:right">LastModified 30/09/2021</h></div>
    <!-- <div class="header-name"><h><pre  style="font-size: larger;font-style: normal; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Total in Sri Lanka                                                                                                                                                               LastModified 30/09/2021</pre></h> </div> -->
     <div id="notice-box">

       
        

        

    </div>
    <div class="main-update-col-1">
        <div class="last-week">
            Last Week  <div class="last-week-number"><h1 data-target="10"  class="count">0</h1><p> incidents </p></div>
        </div>
        <div class="last-Month">
            Last Month  <div class="last-month-number"><h1  data-target="10"  class="count">0</h1><p> incidents</p></div>
        </div>
        <div class="last-hour">
            <p>Last</p> <h2>24 hours</h2><div class="last-hour-number"><h1  data-target="10"  class="count">0 </h1><p>Incidents</p></div> <h1></h1>   
        </div>
    </div>
    <div class="main-update-col-2">
        <div class="linechartmain">
            <!-- <h3>Report Incidents Polonnaruwa </h3> -->
            <div class="mychartmain">
            <canvas id="myChartmain"   ></canvas>
            <script>let myChartmain = document.getElementById("myChartmain").getContext('2d');</script>
            <!-- <script src="../Javascript/dashboard.js"></script> -->
            </div> 
        </div>
        <div class="detail">
            Time Duration -3 Month <br>
            Last Modification 02/09/2021
        </div>
        <div class="date">
            <h2>Today</h2>   
            <h3>
                <?php   date_default_timezone_set('Asia/Kolkata');  echo date('d F, Y')?>  
            </h3>
            <h2>
                Time
            </h2> 
            <h3>
              <?php   date_default_timezone_set('Asia/Kolkata');  echo date('G:i:s'); ?>  
            </h3>
           
        </div>
        <!-- <h>Today</h> -->
    </div>
    <div class="district-name">
        <h2>Polonnaruwa District</h2>
    </div>
    <div class="district-report">
         <div class="users-1"> 
            Wildlife Officers <h1  data-target="20"  class="count">0</h1>
         </div>
         <div class="users-2">
           Grama Niladharis <h1  data-target="23"  class="count">0</h1>
         </div>
         <div class="users-3">
          Veterinarians <h1  data-target="10"  class="count">0</h1>
         </div>
         <div class="users-4">
            Villagers <h1  data-target="10"  class="count">0</h1>
         </div>
         <!-- <div class="report-type">
             <div for="" class="name">Wild Elephants Arrival <h1  data-target="90"  class="count">0</h1>  </div>  
             <div for="" class="name">Wild Animals Arrival <h1  data-target="80"  class="count">0</h1> </div>  
             <div for="" class="name">Elephants fence <h1  data-target="60"  class="count">0</h1>    </div> 
             <div for="" class="name">Crop Damages <h1  data-target="30"  class="count">0</h1> </div> 
             <div for="" class="name">Other  <h1  data-target="50"  class="count">0</h1></div><br>
         </div>
         <div class="user-type">
             <div for="" class="name">Regional Wildlife Officer <h1  data-target="10"  class="count">0</h1></div> 
             <div for="" class="name">Wildlife Officers <h1  data-target="30"  class="count">0</h1></div> 
             <div for="" class="name">Gramaniladari <h1  data-target="50"  class="count">0</h1></div> 
             <div for="" class="name">Vertinarian <h1  data-target="10"  class="count">0 </h1> </div> 
             <div for=""class="name">Vilager <h1  data-target="160"  class="count">0</h1></div>
         </div> -->
         <div class="report-1">
            Wild Elephants Arrival  <h1  data-target="20"  class="count">0</h1>
         </div>
         <div class="report-2">
            Elephants fence  <h1  data-target="20"  class="count">0</h1>
        </div>
        <div class="report-3">
            Wild Animals Arrival  <h1  data-target="20"  class="count">0</h1>
        </div>
        <div class="report-4">
            Crop Damages  <h1  data-target="20"  class="count">0</h1>
        </div>
        <div class="report-5">
            Illegal Thing happening in the Forest<h1  data-target="20"  class="count">0</h1>
        </div>
        
         <div class="report-6">
            Breakdown of Elephant Fence <h1  data-target="16"  class="count">0</h1>
         </div>
            <div class="update-col">
            Polonnaruwa District Incidents report Percentage<h1  data-target="90"  class="count">0 </h1><h2>%</h2>
            </div> 
         </div>
         
         
    <div class="main-update-col-3">
        <div class="last-week-1">
            Last Week  <div class="last-week-number-1"><h1  data-target="11"  class="count" >0</h1><p> incidents </p></div>
        </div>
        <div class="last-Month-1">
            Last Month  <div class="last-month-number-1"><h1  data-target="20"  class="count" >0</h1><p> incidents</p></div>
        </div>
        <div class="last-hour-1">
            <p>Last</p> <h2>24 hours</h2><div class="last-hour-number-1"><h1 data-target="12"  class="count">0</h1><p>Incidents</p></div> <h1></h1>   
        </div>
    </div>
     <div class="map">
         <div class="header-map">
             Incidents Report Areas
         </div>
         <div class="map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126452.02111388237!2d80.94313801331407!3d7.934107447297657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb44ba3b16ce27%3A0xc34997a2b3032b7c!2sPolonnaruwa!5e0!3m2!1sen!2slk!4v1633098856489!5m2!1sen!2slk" width="100%" height="510" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy"></iframe>
         </div>
     </div>
     <div class="province-report">
         <div class="linechart">
             <h3>Report Incidents Polonnaruwa </h3>
             <div class="mychart">
             <canvas id="myChart"   ></canvas>
             <script>let myChart1 = document.getElementById("myChart").getContext('2d');</script>
             <!-- <script src="../Javascript/dashboard.js"></script> -->
             </div> 
         </div>
         <div class="chart2">
             <h3>Province  of Incidents  Reports </h3>
             <div class="mychart">
                <canvas id="myChart1"   ></canvas>
                <script>let myChart2 = document.getElementById("myChart1").getContext('2d');</script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->
                </div> 
            </div>
         </div>
     </div>
     <div class="time-update">
         <h3>Update In last-hour Report</h3>
         <div class="chart3">
             <div class="mychart-1">
                <canvas id="myChart2"   ></canvas>
                <script>let myChart3 = document.getElementById("myChart2").getContext('2d');</script>
                <!-- <script src="../Javascript/dashboard.js"></script> -->
               
             </div>
         </div>
     </div>
     <div class="monthly-update">
        <h3>Update In last-Month Report</h3>
        <div class="chart4">
            <div class="mychart-1">
               <canvas id="myChart3"   ></canvas>
               <script>let myChart4 = document.getElementById("myChart3").getContext('2d');</script>
                
               <script src="../Public/javascript/dashboard.js"></script>
              
            </div>
        </div>
 
     </div>

     
    <div>
    
    </div>

    
    <script>

        const counters = document.querySelectorAll(".count");
        const speed = 10;

        counters.forEach((counter) => {
    const updateCount = () => {
    const target = parseInt(+counter.getAttribute("data-target"));
    const count = parseInt(+counter.innerText);
    const increment = Math.trunc(target / speed);
    console.log(increment);

    if (count < target) {
      counter.innerText = count + increment;
      setTimeout(updateCount, 1);
    } else {
      count.innerText = target;
    }
  };
  updateCount();
});


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
    
    
    $.post("../regionalOfficer/endNotice",{noticeId:x},function(data,status){
           
          
        
        
    });


  }


    </script>
</body>
</html> 