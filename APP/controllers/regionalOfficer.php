<?php

require 'user.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(session_status()===PHP_SESSION_NONE)
    {
      session_start();
      session_regenerate_id();

    }

class regionalOfficer extends user{


	private $RID;

	function __construct(){
        parent::__construct();

    }

    private function sendMail($password,$email){

            $addMail = new PHPMailer(true);
            $addMail->isSMTP();
            $addMail->Host = "smtp.gmail.com";
            $addMail->SMTPAuth = "true";
            $addMail->SMTPSecure = "tls";
            $addMail->Port = "25";
            $addMail->Username = "wildlifecareproject@gmail.com";
            $addMail->Password = "Wildlife123";
            $subject = "Welcome to WildlifeCare";
            $addMail->Subject = $subject;
            $addMail->setFrom("wildlifecareproject@gmail.com");
            $addMail->isHTML(true);
            $message = "<p>We added you to the WildlifeCare. Now you can login into the WildlifeCare and Can get services provieded by WildlifeCare.</p>";
            $message .= "<p>Your password is".$password."(<b>We are highly recommend you to reset password when you are login to the WildlifeCare at first time for security purpose.</b>) and username is your National Identity Card number. For login you can use below link.<br>";
            $message .= "<a href='localhost/wildlifecare'>Login</a></p>";


            $addMail->Body = $message;
            $to = $email;
            $addMail->addAddress($email);
            $send = $addMail->Send();
            
    }

	public function addUser()
	{
		 $province=$this->model->getProvince();
        $office=$this->model->getOfficeNum();
        
       //names of provinces and numbers of offices get to assiciative array for dynmaic drop downs
        $dropDownData=[
            "province"=>$province,
            "office"=>$office
        ];

        if(isset($_POST["provinceName"])){


               $district=$this->model->getDistrict($_POST["provinceName"]);

               foreach($district as $row)//provide district names for dynamic drop donws using ajax 
                  echo "<option value=".$row["Name"].">".$row["Name"]."</option>";
   
        }


        if(isset($_POST["districtName"])){
                    $gnDivision=$this->model->getGN($_POST["districtName"]);
                     
                     foreach($gnDivision as $row)//provide GN division names for dynamic drop donws using ajax 
                          echo "<option value=".$row["name"].">".$row["name"]."</option>";

                }

        if(isset($_POST["gnName"])){
                     $village=$this->model->getVillage($_POST["gnName"]);

                     
                      foreach($village as $row)//provide village names for dynamic drop donws using ajax 
                           echo "<option value=".$row["name"].">".$row["name"]."</option>";

                }
        

        
        //********this should be correct******
        if(!empty($_SESSION["NIC"]) and $_SESSION["jobtype"]=="regional Officer"){
            
                 $this->view->render("regionalOfficer_register",$dropDownData);
             
            }
        else{
            header("Location: ../user/index");
        }
            


            if($_SERVER["REQUEST_METHOD"]=="POST"){

                  $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           
                  $userType=$_POST["submit"];//get user type of the form
                  $data=[
                
                        "fName"=>trim($_POST["fname"]),
                        "lName"=>trim($_POST["lname"]),
                        "nic"=>trim($_POST["nic"]),
                        "gender"=>trim($_POST["gender"]),
                        "dob"=>trim($_POST["dob"]),
                        "address"=>trim($_POST["address"]),
                        "mob"=>trim($_POST["mobile"]),
                        "email"=>trim($_POST["email"]),
                        "password"=>trim($_POST["password"]),
                        "Error"=>""

                       ];

                  if(!empty($userType))
                  {

                //checking e mail already exists
                  if($this->model->checkMail($data["email"]))
                            $data["Error"]="E mail is already taken";
                      else{//checking mobile number already exists
                             if($this->model->checkMobile($data["mob"]))
                                 $data["Error"]="Mobile number is already taken";
                              else{  //checking NIC already exists
                                      if($this->model->checkNIC($data["nic"]))
                                        $data["Error"]="NIC is already taken";
                   }
                 }

                      

                    

                


             
                        
            
            

                 if(empty($data["Error"]))//if there is no any errors then add users
                 {     
                      $success="Successfully Added";
                      switch($userType){//based on the user type adding users to the system database
                            case "grama niladhari":{
                                  $specificData=[//data specific for grama niladhari
                                       "province"=>trim($_POST["province"]),
                                 "district"=>trim($_POST["district"]),
                                 "gnd"=>trim($_POST["gnd"]),
                                       "gic"=>trim($_POST["gic"])

                                                ];
                         
                                  $allData=array_merge($data,$specificData);
                                  $this->model->gnAdd($allData);//add grama niladhari's data to the database
                                  $this->sendMail($data["password"],$data["email"]);//send e mail to added user
                                  echo"<script>location.href='../regionalOfficer/addUser?error=".$data["Error"]."&success=".$success."';</script>";//redirect to user adding page of regionalOfficer
                                                 }
                            break;

                            case "wildlife officer":{
                                  $specificData=[//data specific for wildlife Officer
                                        "wid"=>trim($_POST["wid"]),
                                        "officeNum"=>trim($_POST["ofn"])

                                               ];

                                  $allData=array_merge($data,$specificData);
                                  $this->model->woAdd($allData);//add wildlife officer's data to the database
                                  $this->sendMail($data["password"],$data["email"]);
                                  echo"<script>location.href='../regionalOfficer/addUser?error=".$data["Error"]."&success=".$success."';</script>";
                        
                                                   }

                            break;

                           case "veterinarian":{
                                  $specificData=[//data specific for veterinarian
                                       "vid"=>trim($_POST["vid"]),
                                       "officeNum"=>trim($_POST["ofn"])
                            

                                                ];

                                  $allData=array_merge($data,$specificData);
                                  $this->model->vetAdd($allData);//add veterinarian's data to the database
                                  $this->sendMail($data["password"],$data["email"]);
                                  echo"<script>location.href='../regionalOfficer/addUser?error=".$data["Error"]."&success=".$success."';</script>";
                        
                                              }


                          break;

                          case "villager":{

                                $specificData=[
                                       "province"=>trim($_POST["province"]),
                                 "district"=>trim($_POST["district"]),
                                 "gnd"=>trim($_POST["gnd"]),
                                       "village"=>trim($_POST["village"])
                                              ];
                        
                                $allData=array_merge($data,$specificData);
                                $this->model->vilAdd($allData);//add villagers data to the database
                                $this->sendMail($data["password"],$data["email"]);
                                echo"<script>location.href='../regionalOfficer/addUser?error=".$data["Error"]."&success=".$success."';</script>";
                        
                                         }

                          



                }

                 


            }

            else
            {   
              
              
                echo"<script>location.href='../regionalOfficer/addUser?error=".$data["Error"]."&success=';</script>";
               

            }

            }
            
            
        }
     }




     public function viewUser(){

		// if(!empty($_SESSION["NIC"]) and $_SESSION["jobtype"]=="regional Officer"){
            $district=$this->model->getRegionalDistrict($_SESSION["NIC"]);
            $data=$this->model->getUser($district);
			      $this->view->render("regionalOfficer_userView",$data);
             
	                // }
	    // else{
	    // 	header("Location: ../user/index");
	    // }
	    	

	}


	public function dashboard(){
        
        //get data related to dashboard
    
      $district=$this->model->getRegionalDistrict($_SESSION["NIC"]);
      $data=$this->model->getDataDashboard($district);
        //redirect to dashboard and pass the data

        $this->view->render('regionalOfficer_page',$data);
    }



	

    public function placeNotice(){

      

       $province=$this->model->getProvince();
       $this->view->render('regionalNotice',$province);

       if(isset($_POST["provinceName"])){


             $district=$this->model->getDistrict($_POST["provinceName"]);

             foreach($district as $row)
                echo "<option value=".$row["Name"].">".$row["Name"]."</option>";

        }


        if(isset($_POST["districtName"])){
                $gnDivision=$this->model->getGN($_POST["districtName"]);
                     
                 foreach($gnDivision as $row)
                        echo "<option value=".$row["name"].">".$row["name"]."</option>";

              }


        if(isset($_POST["gnName"])){
                 $village=$this->model->getVillage($_POST["gnName"]);

                     
                  foreach($village as $row)
                         echo "<option value=".$row["name"].">".$row["name"]."</option>";

        }

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          if(isset($_POST["submit"])){


            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            date_default_timezone_set('Asia/Colombo');
            

            $data=[
              "subject"=>trim($_POST["subject"]),
              "description"=>trim($_POST["description"]),
              "village"=>trim($_POST["village"]),
              "gnDivision"=>trim($_POST["gnd"]),
              "district"=>trim($_POST["district"]),
              "province"=>trim($_POST["province"]),
              "jobType"=>trim($_POST["jobType"]),
              "date"=>date("y/m/d"),
              "time"=>date("H:i:s")
            ];


            

              
            
            
            



            $this->model->placeNotice($data);

            $phoneArray=$this->model->getPhoneNumbersForNotice($data["village"],$data["gnDivision"],$data["district"],$data["province"],$data["jobType"]);
            $sid="ACef8fe9b30c6de390f180eb11a6ccb5ae";
            $authToken="45c39c156a16821f9d628bddc683071a";

            for($x=0;$x<count($phoneArray);$x++)
            {
              $client=new Twilio\Rest\Client($sid,$authToken);
              
              $message=$client->messages->create(
                "+94".strval(($phoneArray[$x])["mobile"]),
                array(
                                'from' => "+15158085104",
                                'body' => $data["description"]
                               )
                
                

              );

              

            }


        

          }
        }



    }


    public function getNotice(){
    	$NIC=$_SESSION["NIC"];

    	$lastNoticeID=$this->model->getLastNoticeId($NIC);
    	$officeNum=$this->model->getUserOfficeNumber($NIC);
    	$newNoticeDetails=$this->model->getNewNoticeDetails($officeNum,$lastNoticeID);

    	if($newNoticeDetails!="No"){

    		$noticeHtml="

    	<div id=\"new-notice\">

           <img src=\"../Public/images/notice.jpg\">
    	   <h1>Date:".$newNoticeDetails["date"]."&emsp;Time:".$newNoticeDetails["time"]."</h1>
    	   <p>".$newNoticeDetails["description"]."</p>
    	   <audio id=\"audio\" autoplay loop  controls src=\"http://www.raypinson.com/ringtones/CarAlarm.mp3\"></audio>
    	   <button id=\"ok-btn\" value=\"".$newNoticeDetails["noticeID"]."\" onclick=\"endNotice(this.value)\">Okay</button>


    	</div>




    	";

    	echo $noticeHtml;

    	}

    	




    }


    public function endNotice(){

    	$noticeId=$_POST["noticeId"];
      

      $url=$_GET['url'];
      $url  = rtrim($url,'/');
      $url  = filter_var($url,FILTER_SANITIZE_URL);
      $url = explode('/',$url);

    	$this->model->updateNotice($noticeId,$_SESSION["NIC"]);
    	
      header("Location: ../regionalOfficer/".$url[0]);

    }

    public function deleteUser(){
    	$NIC=$_GET["id"];
    	$userType=$_GET["type"];

    	switch($userType){
    		case "villager": 
    		{
    			$this->model->deleteVillager($NIC);
    			echo "<script>
    			location.href='../regionalOfficer/viewUser?nic=".$NIC."&job=".$userType."';
    			
    			</script>";

            }
    		break;
    		
    		case "wildlife-officer":
    		{
    			$this->model->deleteWildlifeOfficer($NIC);
    			echo "<script>
    			location.href='../regionalOfficer/viewUser?nic=".$NIC."&job=".$userType."';
    			
    			</script>";
    		} 
    		break;
    		case "veterinarian":
    		{
    			$this->model->deleteVeterinarian($NIC);
    			echo "<script>
    			location.href='../regionalOfficer/viewUser?nic=".$NIC."&job=".$userType."';
    			
    			</script>";
    		} 
    		break;
    	}

    	
    }


  public function viewUserProfile(){

    	$NIC=$_GET["id"];
    	$userType=$_GET["type"];
    	

    	switch($userType){
    		case "villager":$this->view->render('regionalViewVillagerProfile',$this->model->getVillagerData($NIC)) ;
    		break;
    		case "gramaNiladhari": $this->view->render('regionalViewGramaNiladhariProfile',$this->model->getGramaNiladhariData($NIC));
    		break;
    		case "wildlifeOfficer": $this->view->render('regionalViewWildlifeOfficerProfile',$this->model->getWildlifeOfficerData($NIC));
    		break;
    		case "veterinarian": $this->view->render('regionalViewVeterinarianProfile',$this->model->getVeterinarianData($NIC));
            break;
    	}
    	
    }

   public function viewReportedIncidents()
    {
      $status=$_GET["status"];
      $incident=$_GET["incident"];
      $data=Array();
      $district=$this->model->getRegionalDistrict($_SESSION["NIC"]);
      switch ($incident) {
        case 'elephantAttack':
        {
          switch ($status) {
            case 'active':{
              $data=$this->model->activeElephantAttack($district);
            }
              
              break;
            case 'success':$data=$this->model->successElephantAttack($district);
              
              break;
            case 'unsuccess':$data=$this->model->unsuccessElephantAttack($district);
              
              break;
            
            
          }
        }
          
          break;
        case 'animalsVillage':
        {
          switch ($status) {
            case 'active': $data=$this->model->activeAnimalsInVillage($district);
              
              break;
            case 'success':$data=$this->model->successAnimalsInVillage($district);
              
              break;
            case 'unsuccess':$data=$this->model->unsuccessAnimalsInVillage($district);
              
              break;
            
            
          }
        }
          
          break;
        case 'animalDanger':
        {
          switch ($status) {
            case 'active':$data=$this->model->activeAnimalIsInDanger($district);
              
              break;
            case 'success':$data=$this->model->successAnimalIsInDanger($district);
              
              break;
            case 'unsuccess':$data=$this->model->unsuccessAnimalIsInDanger($district);
              
              break;
            
            
          }
        }

          
          break;
        case 'illegal':
        {
          switch ($status) {
            case 'active':$data=$this->model->activeIllegalActivities($district);
              
              break;
            case 'success':$data=$this->model->successIllegalActivities($district);
              
              break;
            case 'unsuccess':$data=$this->model->unsuccessIllegalActivities($district);
              
              break;
            
            
          }
        }
          
          break;
        case 'cropDamage':
        {
          switch ($status) {
            case 'active':$data=$this->model->activeCropDamages($district);
              
              break;
            case 'success':$data=$this->model->successCropDamages($district);
              
              break;
            case 'unsuccess':$data=$this->model->unsuccessCropDamages($district);
              
              break;
            
            
          }
        }
          
          break;
        case 'fenceDamage':
        {
          switch ($status) {
            case 'active':$data=$this->model->activeFenceDamages($district);
              
              break;
            case 'success':$data=$this->model->successFenceDamages($district);
              
              
              break;
            case 'unsuccess':$data=$this->model->unsuccessFenceDamages($district);
              
              
              break;
            
            
          }
        }
          
          break;
        
        
      }
      
      $this->view->render("regionalReportedIncident",$data);
    }

  public function viewProfile()
  {
    $details=$this->model->getDetails($_SESSION["NIC"]);
    $this->view->render('regionalViewProfile',$details);

  }

  public function changePassword()
  {
    $this->view->render("regionalChangePassword");
    if(isset($_POST["submitPass"]))
    { $currentPassword=$_POST["currentPassword"];
      $newPassword=$_POST["newPassword"];
      $confirmPassword=$_POST["confirmPassword"];

      if($confirmPassword==$newPassword)
      {
        $regionalCurrentPassword=$this->model->getCurrentPassword($_SESSION["NIC"]);
        if(password_verify($currentPassword, $regionalCurrentPassword))
        {
          $this->model->changeAdminPassword($newPassword,$_SESSION["NIC"]);
          header("Location: ../regionalOfficer/viewProfile?change=success");
        }
        else
        header("Location: ../regionalOfficer/viewProfile?change=wrong");

      }
      else
      header("Location: ../regionalOfficer/viewProfile?change=notconfirm");
      

    }
    


  }

  public function showMap()
  {
    $data=[
      "lat"=>$_GET["lat"],
      "lon"=>$_GET["lon"]];


    $this->view->render("adminIndiMap",$data);
    
  }


  

}