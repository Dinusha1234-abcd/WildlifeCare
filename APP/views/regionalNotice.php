<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="../Public/css/regionalNotice.css">
    <link rel="stylesheet" href="../Public/css/adminHeader.css">
     <script src="../Public/Javascript/admin.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    
    
    <title>Place Notice</title>
</head>
<body >
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
                <li id="dashboard" class="nav-menu-item"><a href="../">Dashboard</a></li>
                
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

    <div id="container1">
        <h1>Add Emergency Notice</h1>
        
    </div>
    <div id="notice-box">
    </div>

     <div id="container2">
        
       
       <form id="frm" method="POST" action="placeNotice">

        <table>
            <tr>
                <td>
                    <label for="subject" >Subject :</label>
                    
                </td>
                <td>
                    <input type="text" name="subject" id="subject" required>
                </td>
            </tr>

             <tr>
                <td>
                    <label for="description" id="lbl-description">Description :</label>
                    
                </td>
                <td>
                    <textarea rows="10" cols="10"  id="description" name="description" required></textarea>
                </td>
            </tr>


             

            <tr>
                <td>
                    <label for="village">Village :</label>
                    
                </td>
                <td>
                     <select id="village" name="village" required>
            
                     </select>

                </td>
            </tr>

            <tr>
                <td>
                    <label for="gn">GN Division :</label>
                    
                </td>
                <td>
                    <select id="gn" name="gnd" onchange ="selectVillage(this.value)" required>
            
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                     <label for="district">District :</label>
                    
                </td>
                <td>
                    <select id="district" name="district"  onchange ="selectGN(this.value)" required>
            
                   </select>
                </td>
            </tr>

             <tr>
                <td>
                    <label for="province">Province :</label>
                    
                </td>
                <td>
                    <select id="province" name="province" onchange ="selectDistrict(this.value)" required>
                        <?php $rows=$data; foreach($rows as $row){ echo "<option"?><?php echo " value=".$row["Name"]." >".$row["Name"]."</option>";}?> 
            
                    </select>
                </td>
            </tr>

             



            <tr>
                <td>
                    <label for="receiver">Receiver :</label>
                    
                </td>
                <td>
                     <select id="receiver" name="jobType">
                        
                        <option value="wildlifeOfficer">Wildlife Officers</option>
                        <option value="regionalOfficer">Regional Officers</option>
                        <option value="villager">Villagers</option>
                        <option value="gramaNiladhari">Grama Niladhari</option>
                        <option value="veterinarian">Grama Niladhari</option>

            
                     </select>

                </td>
            </tr>


        </table>
         
         
       
    
        
         
         <button type="submit" name="submit" id="submit">Submit</button>

           
       </form>
       <button   id="back" onclick="location.href='dashboard'" > Back </button>
      
       
       
     
       

        
    </div>

</body>

<script type="text/javascript">
    
    function selectDistrict(x){
                                

    $.post("../regionalOfficer/placeNotice",{provinceName:x},function(data,status){
          
        $("#district").html(data);


        
    });

  }


   function selectGN(x){
    
    
    $.post("../regionalOfficer/placeNotice",{districtName:x},function(data,status){
         
          $('#gn').html(data);

        
        
    });


  }


   function selectVillage(x){
    
    
    $.post("../regionalOfficer/placeNotice",{gnName:x},function(data,status){
           
          $('#village').html(data);
        
        
    });


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