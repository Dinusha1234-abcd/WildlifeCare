<?php
include "user.php";
class gramaniladari extends user
{
  function __construct()
  {
    parent::__construct();
  }
 //index function to load wildlifeofficer default page
 public function index()
 {
  $this->view->render('gramaniladari');
}
     function viewNotification()
    {
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      }
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

      $this->view->notificationData =  $this->model->getNotification($_SESSION['NIC']); 
   
      switch ($lang) {
        case 1:
          //display villagerReportView1     
          if (isset($_GET['notification'])) {
            $this->model->setNotificationStatus($_SESSION['NIC']); 
             }    
          $this->view->render('gramaniladariNotification');
          break;
        case 2:
          if (isset($_GET['notification'])) {
            $this->model->setNotificationStatus($_SESSION['NIC']); 
             }    
          //display villagerReportView2
          $this->view->render('gramaniladariNotificationsinhala');
          break;
        case 3:
          if (isset($_GET['notification'])) {
            $this->model->setNotificationStatus($_SESSION['NIC']); 
             }    
       
          //display villagerReportView3    
          $this->view->render('gramaniladariNotificationtamil');
          break;
        default:
          //display Error message
          header('Location: ../user/error');
      }
    }
    public function viewCropDamages()
    {
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      }
       
      $this->view->dataAll  = $this->model->getData();
      //get the number of rows reports in assocaiative array
      $rows =  $this->model->getReportrows($_SESSION['NIC']);
      //assign value to $%noOfrows
      foreach($rows as $row) {
        $noOfrows  = $row['total_rows'];
     }
       //each page get the rows
      $rowsPer = 10;
      //Get the page number 
      $pageNumber = $_GET['page'];
      //view the page number view in report
      $start =  ($pageNumber - 1) * $rowsPer;
      //call the getdataPending function in incident_model class  
      $this->view->data1 = $this->model->getdataLimit($start, $rowsPer);
      //get the lastpage number
      $lastpage = ceil($noOfrows / $rowsPer);
      //pass the value
      $this->view->lastpage = $lastpage;
       $this->view->cropDamagesReview = $this->model->getCropDamagesReview($_SESSION['NIC']);
       if (isset($_GET['status'])) {
        //assign the value
        $status = $_GET['status'];
      } 
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

       switch ($status){
         case 'success':  
       switch ($lang) {
        case 1:
          //display villagerReportView1     
          $this->view->render('gramaniladariCropDamages');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 2:
          //display villagerReportView2
          $this->view->render('gramaniladariCropDamagesSinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 3:
          //display villagerReportView3    
          $this->view->render('gramaniladariCropDamagesTamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        default:
          //display Error message
          header('Location: ../user/error');
       } break;
       case 'pending':
        switch ($lang) {
          case 1:
            //display villagerReportView1     
            $this->view->render('gramaniladariCropDamagesPending');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
          case 2:
            //display villagerReportView2
            $this->view->render('gramaniladariCropDamagesPendingSinhala');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
          case 3:
            //display villagerReportView3    
            $this->view->render('gramaniladariCropDamagesPendingTamil');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
          default:
            //display Error message
            header('Location: ../user/error');
         }
        }
    }
    public function viewCropDamagesIncident(){
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      } 
      if (isset($_GET['status'])) {
        //assign the value
        $status = $_GET['lang'];
      } 
      $this->view->dataReport  = $this->model->getreport($_GET['reportNo']);
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

      switch ($lang) {
        case 1:
          
          //display villagerReportView1     
          $this->view->render('cropDamagesView');
          if(isset($_POST['Confirm'])){
            $this->model->updateStatusSucessful($_GET['reportNo'],$_POST['discription']);
          }
          if(isset($_POST['UnConfirm'])){
            $this->model->updateStatusUnSucessful($_GET['reportNo'],$_POST['discription']);
          }
          break;
        case 2:
          //display villagerReportView2
          $this->view->render('cropDamagesViewSinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 3:
          //display villagerReportView3    
          $this->view->render('cropDamagesViewTamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        default:
          //display Error message
          header('Location: ../user/error');
      }
    }
    public function viewCropDamagesIncidentUpdate(){
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      } 
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

      $this->view->dataReport  = $this->model->getreport($_GET['reportNo']);
      switch ($lang) {
        case 1:
          
          //display villagerReportView1     
          $this->view->render('cropDamagesViewUpdating');
          if(isset($_POST['Confirm'])){
            $this->model->updateStatusSucessful($_GET['reportNo'],$_POST['discription']);
          }
          if(isset($_POST['UnConfirm'])){
            $this->model->updateStatusUnSucessful($_GET['reportNo'],$_POST['discription']);
            
          }
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 2:
          //display villagerReportView2
          $this->view->render('cropDamagesViewSinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 3:
          //display villagerReportView3    
          $this->view->render('cropDamagesViewTamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        default:
          //display Error message
          header('Location: ../user/error');
      }
    }
    public function viewVillager()
    {
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      }
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

      $this->view->dataAll  = $this->model->getData();
      //get the number of rows reports in assocaiative array
      $rows =  $this->model->getVillgerRows($_SESSION['NIC']);
      //assign value to $%noOfrows
      foreach($rows as $row) {
        $noOfrows  = $row['total_rows'];
     }
       //each page get the rows
      $rowsPer = 10;
      //Get the page number 
      $pageNumber = $_GET['page'];
      //view the page number view in report
      $start =  ($pageNumber - 1) * $rowsPer;
      //call the getdataPending function in incident_model class  
      $this->view->data1 = $this->model->getVillgerdataLimit($_SESSION['NIC'],$start, $rowsPer);
      //get the lastpage number
      $lastpage = ceil($noOfrows / $rowsPer);
      //pass the value
          $this->view->lastpage = $lastpage;
       $this->view->cropDamagesReview = $this->model->getVillgerReview($_SESSION['NIC']);
   //   print_r($this->model->getVillgerReview($_SESSION['NIC']));
       if (isset($_GET['status'])) {
        //assign the value
        $status = $_GET['status'];
      } 
       switch ($status){
         case 'accept':  
       switch ($lang) {
        case 1:
          //display villagerReportView1     
          $this->view->render('gramaniladariAcceptVillager');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 2:
          //display villagerReportView2
          $this->view->render('gramaniladariAcceptVillagerSinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        case 3:
          //display villagerReportView3    
          $this->view->render('gramaniladariAcceptVillagerTamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
        default:
          //display Error message
          header('Location: ../user/error');
       } break;
       case 'pending':
        switch ($lang) {
          case 1:
            //display villagerReportView1     
            $this->view->render('gramaniladariPendingVillager');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
          case 2:
            //display villagerReportView2
            $this->view->render('gramaniladariPendingVillagerSinhala');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
          case 3:
            //display villagerReportView3    
            $this->view->render('gramaniladariPendingVillagerTamil');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
          default:
            //display Error message
            header('Location: ../user/error');
         }
        }
    }

    public function viewVillagerProfile(){
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      } 
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

     
      $this->view->villagerData = $this->model->getVillger($_SESSION['NIC'],$_GET['NIC']);

      
      switch ($_GET['status']) {
        case 'pending':
        switch ($lang) {
           case 1:
           //display villagerReportView1     
          $this->view->render('registerVillagerViewUpdating');
          if(isset($_POST['Confirm'])){
            $this->model->updateStatusSucessfulRegister($_GET['NIC'] );
          }
          if(isset($_POST['UnConfirm'])){
            $this->model->updateStatusUnSucessfulRegister($_GET['NIC'] );
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
          }
          break;
          case 2:
          //display villagerReportView2
          $this->view->render('registerVillagerSinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
          case 3:
          //display villagerReportView3    
          $this->view->render('registerVillagerTamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']);
          }
       
          break;
          default:
          //display Error message
          header('Location: ../user/error');
      }break;
      case 'accept':
      switch ($lang) {
        case 1:
        //display villagerReportView1     
       $this->view->render('registerVillager');
       if (isset($_POST['submitAlert'])) {
        $this->model->setAlerStatus($_SESSION['NIC']);
      }
   
       break;
       case 2:
       //display villagerReportView2
       $this->view->render('registerVillagerSinhala');
       if (isset($_POST['submitAlert'])) {
        $this->model->setAlerStatus($_SESSION['NIC']);
      }
   
       break;
       case 3:
       //display villagerReportView3    
       $this->view->render('registerVillagerTamil');
       if (isset($_POST['submitAlert'])) {
        $this->model->setAlerStatus($_SESSION['NIC']);
      }
   
       break;
       default:
       //display Error message
       header('Location: ../user/error');
   }
     
    }
  }
  function viewProfile(){
    //session_start();  
      if(isset($_GET['lang'])){
          //assign the value
          $lang = $_GET['lang'];
      }
      $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
      $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

      switch($lang){
          case 1 :
     
          //display villagerReportView1     
          $getName = $this->model->getName($_SESSION['NIC']);
          $getGramanildhariIncident = $this->model->getGramanildhariIncident($_SESSION['NIC']);
          $getGramanildhariWildElephantArrivalIncident = $this->model->getGramanildhariWildElephantArrivalIncident($_SESSION['NIC']);
          $getGramanildhariWildAnimalsDangerIncident = $this->model->getGramanildhariWildAnimalsDangerIncident($_SESSION['NIC']);
          $getGramanildhariCropDamagesIncident = $this->model->getGramanildhariCropDamagesIncident($_SESSION['NIC']);
          $getGramanildhariIncidentacceptwildlifeOfficer = $this->model->getGramanildhariIncidentacceptwildlifeOfficer($_SESSION['NIC']);
          $getGramanildhariIncidentacceptGramaseweka = $this->model->getGramanildhariIncidentacceptGramaseweka($_SESSION['NIC']);
          $getlastincident = $this->model->getlastincident($_SESSION['NIC']);
          foreach($getName as $row) {
              $datagetFName  = $row['Fname'];
              $datagetLName  = $row['Lname'];

          }
          $this->view->fName = $datagetFName;
          $this->view->lName = $datagetLName;

          foreach($getGramanildhariIncident as $row) {
              $datagetVillagerIncident  = $row['villagerIncident'];
          } 
          foreach($getGramanildhariWildElephantArrivalIncident as $row) {
              $datagetVillagerWildElephantArrivalIncident  = $row['villagerIncidentWildElephantArrival'];
          } 
          $this->view->getVillagerWildElephantArrivalIncident = (int)(intval($datagetVillagerWildElephantArrivalIncident)/intval($datagetVillagerIncident)*100);   
          foreach($getGramanildhariWildAnimalsDangerIncident as $row) {
              $datagetVillagerWildAnimalsDangerIncident  = $row['villagerIncidentWildAnimalsDanger'];
          }
          $this->view->getGramanildhariWildAnimalsDangerIncident = (int)(intval($datagetVillagerWildAnimalsDangerIncident)/intval($datagetVillagerIncident)*100);   
          foreach($getGramanildhariCropDamagesIncident as $row) {
              $datagetVillagerCropDamagesIncident  = $row['villagerIncidentCropDamages'];
          }
          $this->view->getGramanildhariCropDamagesIncident = (int)(intval($datagetVillagerCropDamagesIncident)/intval($datagetVillagerIncident)*100);   
          $this->view->getGramanildhariOthersIncident = (int)((intval($datagetVillagerIncident)-(intval($datagetVillagerCropDamagesIncident)+intval($datagetVillagerWildAnimalsDangerIncident)+intval($datagetVillagerWildElephantArrivalIncident)))/intval($datagetVillagerIncident)*100);   
          foreach($getGramanildhariIncidentacceptwildlifeOfficer as $row) {
              $datagetGramanildhariIncidentacceptwildlifeOfficer  = $row['acceptwildlifeOfficer'];
          }
          $this->view->getGramanilghariIncidentacceptwildlifeOfficer = $datagetGramanildhariIncidentacceptwildlifeOfficer;                        
          // foreach($getGramanildhariIncidentacceptGramaseweka as $row) {
          //     $datagetVillagerIncidentacceptGramaseweka  = $row['acceptGramaseweka'];
          // }
          // $this->view->getVillagerIncidentacceptGramaseweka = $datagetVillagerIncidentacceptGramaseweka;                        
          // $this->view->getVillagerIncidentpending =   intval($datagetVillagerIncident) - (intval($datagetVillagerIncidentacceptwildlifeOfficer)+intval($datagetVillagerIncidentacceptGramaseweka));
            foreach($getlastincident as $row) {
              $datagetlastincidentdate  = $row['date'];
              $datagetlastincidentid  = $row['incidentID'];
              $datagetlastincidentstatus  = $row['status'];
          }
          $this->view->datagetlastincidentdate = $datagetlastincidentdate;
          $this->view->datagetlastincidentid =  $datagetlastincidentid ;
          $this->view->datagetlastincidentstatus = $datagetlastincidentstatus;
          $getPassword = $this->model->getHashPassword($_SESSION['NIC']);
       //   $hashpassword = $getPassword['userPassword'];
          $this->view->render('villagerProfile');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']); 
            }

          // print_r($getVillagerIncident);
           break;
          case 2 :
          //display villagerReportView2
          $this->view->render('villagerProfilesinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']); 
            }

          break;
          case 3 :
          //display villagerReportView3    
          $this->view->render('villagerProfiletamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']); 
            }

          break;
           default:
          //display Error message
          header('Location: ../user/error');  
      }
   }  
     public function  editProfile()
    {
     // session_start();
      $this->view->userData = $this->model->profileData($_SESSION['NIC']);
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      }
      $province = $this->model->getProvince($_SESSION['NIC']);   
      foreach ($province as $row){
         $villagerProvince =  $row['province'];  
      }
      $this->view->province = $villagerProvince; 
      $district = $this->model->getDistrict($_SESSION['NIC']);   
      foreach ($district as $row){
         $villagerDistrict =  $row['district'];  
      }
      $this->view->district = $villagerDistrict; 
      $GramaniladhariDivision = $this->model->getGramaniladhariDivision($_SESSION['NIC']);   
      foreach ($GramaniladhariDivision as $row){
        $villagerGramaniladhariDivision =  $row['name'];  
     }
     $this->view->GramaniladhariDivision = $villagerGramaniladhariDivision; 
     $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
    $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
    $getPassword = $this->model->getHashPassword($_SESSION['NIC']);
    foreach( $getPassword as $row){ 
    $hashpassword = $row["userPassword"];
    }
   // echo $hashpassword;
   $this->view->hashpassword = $hashpassword ;
     switch ($lang) { 
        case 1:
              
          $this->view->render('gramanildharieditProfile'); 
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']); 
            }
            if (isset($_POST['submit'])) {
             // $this->model->updateprofile($_SESSION['NIC'],$_POST['fname'],$_POST['lname'],$_POST['dob'],$_POST['address'],$_POST['province'] );
              if (password_verify(trim($_POST["oldPassword"]),  $hashpassword  )) {
                  $this->model->updateprofile($_SESSION['NIC'],$_POST['fname'],$_POST['lname'],$_POST['dob'],$_POST['address'],$_POST['newPassword'] );
              }
            }

          break;
        case 2:
           $this->view->render('gramanildharieditProfileSinhala');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']); 
            }

          break;
        case 3:
          //display special Notice     
  
          $this->view->render('gramanildharieditProfileTamil');
          if (isset($_POST['submitAlert'])) {
            $this->model->setAlerStatus($_SESSION['NIC']); 
            }

          break;
      }
      // $this->view->render('editProfile');
    }
    public function viewSpecialNotice()
    {
      //session_start(); 
      if (isset($_GET['lang'])) {
        //assign the value
        $lang = $_GET['lang'];
      }
     $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
     $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
     $this->view->notices = $this->model->getNotice($_SESSION['NIC']);
     switch ($lang) {
        case 1:
          //display special Notice     
          $this->view->render('specialNotice');
          if (isset($_POST['submitAlert'])) {
           $this->model->setAlerStatus($_SESSION['NIC']); 
           }

          break;
        case 2:
          //display special Notice     
  
          $this->view->render('specialNoticesinhala');
          if (isset($_POST['submitAlert'])) {
           $this->model->setAlerStatus($_SESSION['NIC']); 
           }

          break;
        case 3:
          //display special Notice     
  
          $this->view->render('specialNoticetamil');
          if (isset($_POST['submitAlert'])) {
           $this->model->setAlerStatus($_SESSION['NIC']); 
           }

          break;
      }
    }
 
}