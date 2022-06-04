<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/user_view.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="../Public/css/noticeAlert.css">
    
    <script src="../Public/Javascript/admin.js"></script>
    <title>Users</title>
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
                
                <li id="dashboard" class="nav-menu-item"><a href="../regionalOfficer/dashboard">Dashboard</a></li>
                <li id="notice" class="nav-menu-item"><a href="../regionalOfficer/placeNotice">Notice</a></li>
                
                <li class="dropdown">
                    <span class="dot"> <img onclick="myFunction_2(this)" src="../Public/images/user_icon.png" id="user_icon" class="user_btn"></span>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="">View Profile</a>
                        <a href="../user/logout">Logout</a>
                    </div>
                </li>
                
            </ul>
        </nav>
    </header>
    <div id="notice-box">
    </div>

  
    <div class="container1">

        
         
               <input type="radio" name="type" id="villager" value="villager"   >
               <input type="radio" name="type" id="regional-officer" value="regional-officer"   >
               <input type="radio" name="type" id="wildlife-officer" value="wildlife-officer"  >
               <input type="radio" name="type" id="veterinarian" value="veterinarian"  >
               <input type="radio" name="type" id="grama-niladhari" value="grama-niladhari"  >

              
         

        <button id="add-user" onclick="location.href='addUser'">Add Users</button>
        <div class="select-user">
            <ul>
                <li><label for="villager" id="vil"><a>Villager</a></label></li>
                <li><label for="regional-officer" id="reg"><a>Regional Officer</a></label></li>
                <li><label for="wildlife-officer" id="wil"><a>Wildlife Officer</a></label></li>
                <li><label for="veterinarian" id="vet"><a>Veterinarian</a></label></li>
                <li><label for="grama-niladhari" id="gra"><a>Grama Niladhari</a></label></li>
            </ul>

           
        </div>

          
        
         
            
            
            
        

        <div class="villager">
            <form>
                <label for="vsearch">Search Villager</label>
                <input type="text"  id="vsearch" name="" placeholder="search villager by name">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <table>

                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birth Date</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Village</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Action</th>
                   </tr>
                </thead>

                <tbody>
                   
                   <?php $rows=$data["villager"]; foreach($rows as $row){echo "<tr><td>".$row["NIC"]."</td> <td>".$row["Fname"]."</td>
                       <td>".$row["Lname"]."</td>
                       <td>".$row["BOD"]."</td><td>".$row["mobileNo"]."</td>
                       <td>".$row["Address"]."</td>
                       <td>".$row["name"]."</td>
                       <td>".$row["gnd_name"]."</td>
                       <td>".$row["district_name"]."</td><td>".$row["Name"]."</td><td><ul>
                          <li><button><img src='../Public/images/edit.png'></button></li>
                          <li><button><img src='../Public/images/delete.png'></button></li>
                          <li><button><img src='../Public/images/view.png'></button></li>
                       </ul></td></tr>";} ?>


                   


                 
                </tbody>
            </table>
            
        </div>

         
        <div class="regional-officer">
            <form>
                <label for="rsearch">Search Regional Officer</label>
                <input type="text"  id="rsearch" name="" placeholder="search regional officer by name">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <table>

                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>RID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Mobile</th>
                        <th>Office Number</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Action</th>
                   </tr>
                </thead>

                <tbody>

                    <?php $rows=$data["regional officer"]; foreach($rows as $row){echo "<tr><td>".$row["NIC"]."</td> <td>".$row["RID"]."</td><td>".$row["Fname"]."</td>
                       <td>".$row["Lname"]."</td>
                       <td>".$row["BOD"]."</td><td>".$row["mobileNo"]."</td>
                       <td>".$row["officeNo"]."</td>
                       <td>".$row["district_name"]."</td><td>".$row["Name"]."</td><td><ul>
                          <li><button><img src='../Public/images/edit.png'></button></li>
                          <li><button><img src='../Public/images/delete.png'></button></li>
                          <li><button><img src='../Public/images/view.png'></button></li>
                       </ul></td></tr>";} ?>
                    
              
                </tbody>
            </table>
            
        </div>


        <div class="wildlife-officer">
            <form>
                <label for="wsearch">Search wildlife Officer</label>
                <input type="text"  id="wsearch" name="" placeholder="search wildlife officer by name">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>


            <table>

                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>WID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Mobile</th>
                        <th>Office Number</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Action</th>
                   </tr>
                </thead>

                <tbody>

                    <?php $rows=$data["wildlife officer"]; foreach($rows as $row){echo "<tr><td>".$row["NIC"]."</td> <td>".$row["WID"]."</td><td>".$row["Fname"]."</td>
                       <td>".$row["Lname"]."</td>
                       <td>".$row["BOD"]."</td><td>".$row["mobileNo"]."</td>
                       <td>".$row["officeNo"]."</td>
                       <td>".$row["district_name"]."</td><td>".$row["Name"]."</td><td><ul>
                          <li><button><img src='../Public/images/edit.png'></button></li>
                          <li><button><img src='../Public/images/delete.png'></button></li>
                          <li><button><img src='../Public/images/view.png'></button></li>
                       </ul></td></tr>";} ?>

                </tbody>
            </table>
            
        </div>


        <div class="veterinarian">
            <form>
                <label for="vetsearch">Search veterinarian</label>
                <input type="text"  id="vetsearch" name="" placeholder="search veterinarian by name">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <table>

                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>VID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Mobile</th>
                        <th>Office Number</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Action</th>
                   </tr>
                </thead>

                <tbody>

                    <?php $rows=$data["veterinarian"]; foreach($rows as $row){echo "<tr><td>".$row["NIC"]."</td> <td>".$row["VID"]."</td><td>".$row["Fname"]."</td>
                       <td>".$row["Lname"]."</td>
                       <td>".$row["BOD"]."</td><td>".$row["mobileNo"]."</td>
                       <td>".$row["officeNo"]."</td>
                       <td>".$row["district_name"]."</td><td>".$row["Name"]."</td><td><ul>
                          <li><button><img src='../Public/images/edit.png'></button></li>
                          <li><button><img src='../Public/images/delete.png'></button></li>
                          <li><button><img src='../Public/images/view.png'></button></li>
                       </ul></td></tr>";} ?>
                   
                </tbody>
            </table>
            
        </div>



        <div class="grama-niladhari">
            <form>
                <label for="rsearch">Search Grama Niladhari</label>
                <input type="text"  id="rsearch" name="" placeholder="search grama-niladhari by name">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <table>

                <thead>
                    <tr>
                        <th>ID Number</th>
                         <th>GID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birth Date</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Action</th>
                   </tr>
                </thead>

                 <?php $rows=$data["grama niladhari"]; foreach($rows as $row){echo "<tr><td>".$row["NIC"]."</td><td>".$row["GID"]."</td> <td>".$row["Fname"]."</td>
                       <td>".$row["Lname"]."</td>
                       <td>".$row["BOD"]."</td><td>".$row["mobileNo"]."</td>
                       <td>".$row["Address"]."</td>
                       <td>".$row["gnd_name"]."</td>
                       <td>".$row["district_name"]."</td><td>".$row["Name"]."</td><td><ul>
                          <li><button><img src='../Public/images/edit.png'></button></li>
                          <li><button><img src='../Public/images/delete.png'></button></li>
                          <li><button><img src='../Public/images/view.png'></button></li>
                       </ul></td></tr>";} ?>

                <tbody>
                    
                </tbody>
            </table>
            
        </div>
        
        
        

    </div>
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