<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "././Library/PHPMailer.php";
require "././Library/SMTP.php";
require "././Library/Exception.php";


class incident extends Controller
{

    private $_incidentId;
    private $_incidentCategory;
    private $_incidentDate;
    private $_incidentLocation;
    private $_incidentDescription;
    function __construct()
    {
        parent::__construct();
    }
    //create the index function for loading default incident file
    function index()
    {
        //Get the session variable 
        // session_start();
        //Check the is session varible already have in session 
        $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);
        foreach ($registrationStatus as $row) {
            $regStatus  = $row['registrationStatus'];
        }
        if (!isset($_SESSION['NIC'])) {

            header('Location: ../user/index');
        } else {
            //if have load report paged

            if (isset($_GET['lang'])) {
                //assign the value
                $type = $_GET['lang'];
            }
            $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
            $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
            switch ($_SESSION["jobtype"]) {

                case 'villager':
                    if ($regStatus != 'pending') {
                        switch ($type) {

                            case 1:
                                //English type     
                                $this->view->render('report');
                                if (isset($_POST['submitAlert'])) {
                                    $this->model->setAlerStatus($_SESSION['NIC']);
                                }
                                break;
                            case 2:
                                //Sinhala type
                                $this->view->render('reportSinhala');
                                if (isset($_POST['submitAlert'])) {
                                    $this->model->setAlerStatus($_SESSION['NIC']);
                                }
                                break;
                            case 3:
                                //Tamil Type    
                                $this->view->render('reportTamil');
                                if (isset($_POST['submitAlert'])) {
                                    $this->model->setAlerStatus($_SESSION['NIC']);
                                }
                                break;
                        }
                    }
                    break;
                case 'Grama Niladhari':

                    switch ($type) {
                        case 1:
                            //English type     
                            $this->view->render('gramaniladhariReport');
                            break;
                        case 2:
                            //Sinhala type
                            $this->view->render('gramanildhariReportSinhala');
                            break;
                        case 3:
                            //Tamil Type    
                            $this->view->render('gramanildhariReportTamil');
                            break;
                    }
            }
        }
    }
    public function checkAlerStatus($NIC)
    {

        $statusReview  = $this->model->getAlerStatus($NIC);
        foreach ($statusReview as $row) {
            $status = $row['alertstatus'];
        }
        return $status;
    }
    public function checkNotificationStatus($NIC)
    {

        $statusReview  = $this->model->getNotificationStatus($NIC);
        foreach ($statusReview as $row) {
            $numberofnotification = $row['numberofnotification'];
        }
        return $numberofnotification;
    }

    //Create the setIncident function for load incident report type
    public function sendEmail($email, $sub, $headline)
    {

        $name =  $_SESSION['Fname'];
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth =  true;
        $mail->Username = 'wildlifecareproject@gmail.com';
        $mail->Password = 'Wildlife123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $subject = $sub;
        $mail->Subject = $subject;
        $mail->setFrom('wildlifecareproject@gmail.com', 'WildlifeCare');
        $mail->isHTML(true);
        $message = "<h1> $headline  </h1>";

        $message = " <p> Dear $name </p><br>
                     <p> $headline  </p><br>
                     <p> Thank You </p>
                     <p> 
                        Address :<br>
                        No18<br>
                        Kandy Road<br>
                        Pilimathalawa <br>
                        Contact More Information<br>
                        <a>wildlifecareproject@gmail.com<a>  
                        <p>";
        $mail->Body = $message;
        $mail->addAddress($email);
        if (!$mail->Send()) {
            // echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        } else {
            // echo 'Message has been sent';
        }
    }
    public function setIncident()
    {
        //if check when router path enter if user already or not
        // session_start();
        //if not goto the login page
        if (!isset($_SESSION['NIC'])) {

            //routing the login page
            header('Location: ../user/index');
        } else {

            //if user already log then pass report page   
            // get value in report
            $value = $_GET['report'];
            //switch in the incident report type page
            if (isset($_GET['lang'])) {
                //assign the value
                $type = $_GET['lang'];
            }
            $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
            $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
            $getEmail = $this->model->getEmail($_SESSION['NIC']);
            foreach ($getEmail as $row) {
                $email = $row['email'];
            }
            switch ($type) {
                case 1:
                switch ( $value) {
                case "1" : $this->view->render('report1');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                }
                //user submit the form 
                if(isset($_POST['Submit'])){
                    //call insertReport function in incident_model class 
                    $this->model->insertReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['Reg'], $_POST['Photo'],$_POST['place'], $_POST['latitude'],$_POST['longitude'] );
                    $this->sendEmail($email,"Wild Elephant are in The Village Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                    $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                }  
                break;
                case "2" : $this->view->render('report2');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form 100
                 if(isset($_POST['Submit'])){
                     //call insertReport function in incident_model class 100
                     $this->model->insertReport2($_SESSION['NIC'],$_POST['animal'],$_POST['noOfanimals'],$_POST['discription'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude']);
                     $this->sendEmail($email,"Other Wild Animals are in The Village Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                     $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                    }  
                break;
    
                case "3" : $this->view->render('report3');   
                 if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form
                  if(isset($_POST['Submit'])){ 
                      //call insertReport function in incident_model class
                      $this->model->insertReport3($_SESSION['NIC'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude'] );
                      $this->sendEmail($email,"Breakdown of Elephant Fence Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                 
                    }
                break;
                case "4" : $this->view->render('report4');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form
                  if(isset($_POST['Submit'])){
                      //call insertReport function in incident_model class
                      $this->model->insertReport4($_SESSION['NIC'],$_POST['animal'],$_POST['cultivatedCrop'],$_POST['cultivatedLand'] ,$_POST['Photo'],$_POST['place'],$_POST['damageLand'],$_POST['latitude'],$_POST['longitude']);
                      $this->sendEmail($email,"Crop Damages Incident Report is Submit Successfully","Gramanildhari Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                   
                    }
                break;
                case "5" : $this->view->render('report5'); 
                    if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                  if(isset($_POST['Submit'])){
                      //call insertReport function in incident_model class
                      $this->model->insertReport5($_SESSION['NIC'],$_POST['animal'],$_POST['noOfanimals'],$_POST['support'],$_POST['discription'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude']);
                      $this->sendEmail($email,"Wild Animal is Danger Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
           
                    }
                break;
                case "6" : $this->view->render('report6');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form
                  if(isset($_POST['Submit'])){
                      //call insertReport function in incident_model class
                      $this->model->insertReport6($_SESSION['NIC'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude']);
                      $this->sendEmail($email,"Illegal Thing Happening in the Forest Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
             
                    }
                break;
                }          
            break;
            case 2 :
            //Sinhala type
           
            switch ($value) {

                case "1" : $this->view->render('report1sinhala');
                //user submit the form 
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form 
                if(isset($_POST['Submit'])){
                    //call insertReport function in incident_model class 
                    $this->model->insertReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['Reg'], $_POST['Photo'],$_POST['place'], $_POST['latitude'],$_POST['longitude'] );
                    $this->sendEmail($email,"Wild Elephant are in The Village Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                    $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                }  
               break;
                case "2":
                    $this->view->render('report2sinhala');
                 //user submit the form 
                 if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form 
                 if(isset($_POST['Submit'])){
                     //call insertReport function in incident_model class
                     $this->model->insertReport2($_SESSION['NIC'],$_POST['animal'],$_POST['noOfanimals'],$_POST['discription'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude']);
                     $this->sendEmail($email,"Other Wild Animals are in The Village Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                     $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                    }  
                   break;
    
                case "3" : $this->view->render('report3sinhala');
                //user submit the form
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form
                  if(isset($_POST['Submit'])){ 
                      //call insertReport function in incident_model class
                      $this->model->insertReport3($_SESSION['NIC'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude'] );
                      $this->sendEmail($email,"Breakdown of Elephant Fence Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                 
                    }
             break;
                case "4" : $this->view->render('report4sinhala');
                //user submit the form
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                //user submit the form
                  if(isset($_POST['Submit'])){
                      //call insertReport function in incident_model class
                      $this->model->insertReport4($_SESSION['NIC'],$_POST['animal'],$_POST['cultivatedCrop'],$_POST['cultivatedLand'] ,$_POST['Photo'],$_POST['place'],$_POST['damageLand'],$_POST['latitude'],$_POST['longitude']);
                      $this->sendEmail($email,"Crop Damages Incident Report is Submit Successfully","Gramanildhari Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
                   
                    }
                break;
                case "5" : $this->view->render('report5sinhala');
                //user submit the form
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                  if(isset($_POST['Submit'])){
                      //call insertReport function in incident_model class
                      $this->model->insertReport5($_SESSION['NIC'],$_POST['animal'],$_POST['noOfanimals'],$_POST['support'],$_POST['discription'],$_POST['Photo'],$_POST['place'],$_POST['latitude'],$_POST['longitude']);
                      $this->sendEmail($email,"Wild Animal is Danger Incident Report is Submit Successfully","Wildlife Officer Accept Your incident Report Soon has Possible" );
                      $this->model->addNotification($_SESSION['NIC'],"Wild Elephant are in The Village","Report Submit Sucessfully");  
           
                    }
             break;
                case "6" : $this->view->render('report6sinhala');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                    break;
                case 2:
                    //Sinhala type

                    switch ($value) {

                        case "1":
                            $this->view->render('report1sinhala');
                            //user submit the form 
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form 
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class 
                                $this->model->insertReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['Reg'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Wild Elephant are in The Village Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "2":
                            $this->view->render('report2sinhala');
                            //user submit the form 
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form 
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport2($_SESSION['NIC'], $_POST['animal'], $_POST['noOfanimals'], $_POST['discription'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Other Wild Animals are in The Village Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;

                        case "3":
                            $this->view->render('report3sinhala');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport3($_SESSION['NIC'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Breakdown of Elephant Fence Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "4":
                            $this->view->render('report4sinhala');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport4($_SESSION['NIC'], $_POST['animal'], $_POST['cultivatedCrop'], $_POST['cultivatedLand'], $_POST['Photo'], $_POST['place'], $_POST['damageLand'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Crop Damages Incident Report is Submit Successfully", "Gramanildhari Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "5":
                            $this->view->render('report5sinhala');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport5($_SESSION['NIC'], $_POST['animal'], $_POST['noOfanimals'], $_POST['support'], $_POST['discription'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Wild Animal is Danger Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "6":
                            $this->view->render('report6sinhala');
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport6($_SESSION['NIC'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Illegal Thing Happening in the Forest Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                    }
                    break;
                case 3:
                    //Tamil Type    
                    switch ($value) {
                        case "1":
                            $this->view->render('report1tamil');
                            //user submit the form 
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form 
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class 
                                $this->model->insertReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['Reg'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Wild Elephant are in The Village Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "2":
                            $this->view->render('report2tamil');
                            //user submit the form 
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form 
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport2($_SESSION['NIC'], $_POST['animal'], $_POST['noOfanimals'], $_POST['discription'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Other Wild Animals are in The Village Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;

                        case "3":
                            $this->view->render('report3tamil');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport3($_SESSION['NIC'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Breakdown of Elephant Fence Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "4":
                            $this->view->render('report4tamil');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport4($_SESSION['NIC'], $_POST['animal'], $_POST['cultivatedCrop'], $_POST['cultivatedLand'], $_POST['Photo'], $_POST['place'], $_POST['damageLand'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Crop Damages Incident Report is Submit Successfully", "Gramanildhari Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "5":
                            $this->view->render('report5tamil');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport5($_SESSION['NIC'], $_POST['animal'], $_POST['noOfanimals'], $_POST['support'], $_POST['discription'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Wild Animal is Danger Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;
                        case "6":
                            $this->view->render('report6tamil');
                            //user submit the form
                            if (isset($_POST['submitAlert'])) {
                                $this->model->setAlerStatus($_SESSION['NIC']);
                            }
                            //user submit the form
                            if (isset($_POST['Submit'])) {
                                //call insertReport function in incident_model class
                                $this->model->insertReport6($_SESSION['NIC'], $_POST['Photo'], $_POST['place'], $_POST['latitude'], $_POST['longitude']);
                                $this->sendEmail($email, "Illegal Thing Happening in the Forest Incident Report is Submit Successfully", "Wildlife Officer Accept Your incident Report Soon has Possible");
                                $this->model->addNotification($_SESSION['NIC'], "Wild Elephant are in The Village", "Report Submit Sucessfully");
                            }
                            break;

                        default:
                            header('Location: ../user/error');
                            break;
                    }
            }
        }
    }
}

    //Create the viewReport function for villager user ViewTable  
    public function viewReport()
    {
        $this->view->dataAll  = $this->model->getData();
        //get the number of rows reports in assocaiative array
        $rows =  $this->model->getReportrows();
        //assign value to $%noOfrows
        $noOfrows =  $rows['total_rows'];
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
        //if check the already have type
        if (isset($_GET['type'])) {
            //assign the value
            $type = $_GET['type'];
        }
        if (isset($_GET['lang'])) {
            //assign the value
            $lang = $_GET['lang'];
        }

        $this->view->dataAllPending  = $this->model->getDataPending($_SESSION['NIC']);
        $rowsPending =  $this->model->getReportrowsPending($_SESSION['NIC']);

        $noOfrowsPending =  $rowsPending['total_rows'];
        $accept = $this->model->getDatAccept($_SESSION['NIC']);
        //view the page number view in report
        $start =  ($pageNumber - 1) * $rowsPer;
        //call the getdataPending function in incident_model class  
        $this->view->data2 = $this->model->getdataLimitPending($_SESSION['NIC'], $start, $rowsPer);
        //get the lastpage number
        $lastpagePending = ceil($noOfrowsPending / $rowsPer);
        //pass the value
        $this->view->lastpagePending = $lastpagePending;
        $rowsAccept =  $this->model->getReportrowsAccept($_SESSION['NIC']);
        
        $noOfrowsAccept =  $rowsAccept['total_rows'];

        //view the page number view in report
        $start =  ($pageNumber - 1) * $rowsPer;
        //call the getdataPending function in incident_model class  
        $this->view->data3 = $this->model->getdataLimitAccept($_SESSION['NIC'], $start, $rowsPer);
        //get the lastpage number
        $lastpageAccept = ceil($noOfrowsAccept / $rowsPer);
        //pass the value
        $this->view->lastpageAccept = $lastpageAccept;
        $CropDamages = $this->model->getCropDamages($_SESSION['NIC']);
        $noOfrowsCropDamages = $CropDamages['total_rows'];
        $start =  ($pageNumber - 1) * $rowsPer;
        $this->view->cropDamagesReview = $this->model->getCropDamagesReview($_SESSION['NIC'], $start, $rowsPer);
        $CropDamagesReviewlastpage = ceil($noOfrowsCropDamages / $rowsPer);
        $this->view->CropDamagesReviewlastpage =  $CropDamagesReviewlastpage;
        $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
        $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);


        switch ($lang) {
            case 1:
                switch ($type) {
                    case 1:
                        //display villagerReportView1     
                        $this->view->render('villagerReportView1');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        break;
                    case 2:
                        //display villagerReportView2
                      //  print_r($accept);
                        $this->view->render('villagerReportView2');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['submitrating'])) {
                            $this->model->updaterating($_GET['reportNo'], $_POST['stars'], $_POST['comments']);
                        }

                        break;
                    case 3:
                        //display villagerReportView3    
                        $this->view->render('villagerReportView3');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_GET['rmStatus'])) {
                            $this->model->removeReport($_GET['reportNo']);
                        }
                        break;
                    case 4:
                        //display villagerReportView2
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        $this->view->render('villagerReportView4');
                        break;
                }
                break;
            case 2:
                switch ($type) {
                    case 1:
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        //display villagerReportView1     
                        $this->view->render('villagerReportView1sinhala');
                        break;
                    case 2:
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        //display villagerReportView2
                        $this->view->render('villagerReportView2sinhala');
                        break;
                    case 3:
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        //display villagerReportView3    
                        $this->view->render('villagerReportView3sinhala');
                        break;
                    case 4:
                        //display villagerReportView2
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        $this->view->render('villagerReportView4Sinhala');
                        break;
                }
                break;
            case 3:
                switch ($type) {
                    case 1:
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        //display villagerReportView1     
                        $this->view->render('villagerReportView1tamil');
                        break;
                    case 2:
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        //display villagerReportView2
                        $this->view->render('villagerReportView2tamil');
                        break;
                    case 3:
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        //display villagerReportView3    
                        $this->view->render('villagerReportView3tamil');
                        break;
                    case 4:
                        //display villagerReportView2
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        $this->view->render('villagerReportView4Tamil');
                        break;
                }
                break;
        }
    }


    function viewReportpage()
    {
        // session_start();

        // $this->view->dataAll  = $this->model->getDatareport( );
        if (isset($_GET['reportNo'])) {
            $reportNo = $_GET['reportNo'];
            $this->view->dataReport  = $this->model->getreport($reportNo);
        } else {
            header("../user/error");
        }
        if (isset($_GET['lang'])) {
            //assign the value
            $lang = $_GET['lang'];
        }
        $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
        $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

        switch ($lang) {
            case 1:
                //display villagerReportView1     
                $this->view->render('reportpage');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']);
                }
                break;
            case 2:
                //display villagerReportView2
                $this->view->render('reportpagesinhala');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']);
                }
                break;
            case 3:
                //display villagerReportView3    
                $this->view->render('reportpagetamil');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']);
                }
                break;
        }
    }


    function updateReport()
    {

        if (isset($_GET['reportNo'])) {
            $reportNo = $_GET['reportNo'];
            $this->view->dataReport  = $this->model->getreport($reportNo);
        } else {
            header("../user/error");
        }
        if (isset($_GET['lang'])) {
            // session_start();
            $data  = $this->model->getreport($reportNo);
            if (isset($_GET['lang'])) {
                //assign the value
                $lang = $_GET['lang'];
            }

            foreach ($data  as $row) {
                $reporttype = $row['reporttype'];
                $latitude = $row['lat'];
                $longitude = $row['lon'];
            }
        }

        $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
        $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

        switch ($lang) {
            case 1:
                switch ($reporttype) {
                    case 'Elephants are in The Village':
                        //display villagerReportView1     
                        $this->view->dataReport1  = $this->model->getReport1($reportNo);
                        $this->view->render('report1Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case  'Other Wild Animals are in The Village':
                        //display villagerReportView1     
                        $this->view->dataReport2  = $this->model->getReport2($reportNo);
                        $this->view->render('report2Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 

                            $this->model->updateReport2($_SESSION['NIC'], $_POST['animal'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Breakdown of Elephant Fences':
                        $this->view->dataReport3  = $this->model->getReport3($reportNo);
                        $this->view->render('report3Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class

                            $this->model->updateReport3($_SESSION['NIC'],  $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }

                        break;
                    case 'Crop Damages':
                        //display Update Crop Damages      
                        $this->view->dataReport4  = $this->model->getReport4($reportNo);
                        $this->view->render('report4Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport4($_SESSION['NIC'], $_POST['animal'], $_POST['cultivatedCrop'], $_POST['cultivatedLand'], $_POST['damageLand'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Wild Animal is in Danger':
                        $this->view->dataReport5  = $this->model->getReport5($reportNo);
                        $this->view->render('report5Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport5($_SESSION['NIC'], $_POST['noOfanimals'], $_POST['animal'], $_POST['support'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Illegal Happing':
                        $this->view->dataReport6  = $this->model->getReport6($reportNo);
                        $this->view->render('report6Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport6($_SESSION['NIC'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                }
                break;
            case 2:
                //display villagerReportView2
                switch ($reporttype) {
                    case 'Elephants are in The Village':
                        //display villagerReportView1     
                        $this->view->dataReport1  = $this->model->getReport1($reportNo);
                        $this->view->render('report1Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case  'Other Wild Animals are in The Village':
                        //display villagerReportView1     
                        $this->view->dataReport2  = $this->model->getReport2($reportNo);
                        $this->view->render('report2Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 

                            $this->model->updateReport2($_SESSION['NIC'], $_POST['animal'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Breakdown of Elephant Fences':
                        $this->view->dataReport3  = $this->model->getReport3($reportNo);
                        $this->view->render('report3Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class

                            $this->model->updateReport3($_SESSION['NIC'],  $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }

                        break;
                    case 'Crop Damages':
                        //display Update Crop Damages      
                        $this->view->dataReport4  = $this->model->getReport4($reportNo);
                        $this->view->render('report4Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport4($_SESSION['NIC'], $_POST['animal'], $_POST['cultivatedCrop'], $_POST['cultivatedLand'], $_POST['damageLand'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Wild Animal is in Danger':
                        $this->view->dataReport5  = $this->model->getReport5($reportNo);
                        $this->view->render('report5Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport5($_SESSION['NIC'], $_POST['noOfanimals'], $_POST['animal'], $_POST['support'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Illegal Happing':
                        $this->view->dataReport6  = $this->model->getReport6($reportNo);
                        $this->view->render('report6Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport6($_SESSION['NIC'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                }
                break;
            case 3:
                //display villagerReportView3    
                switch ($reporttype) {
                    case 'Elephants are in The Village':
                        //display villagerReportView1     
                        $this->view->dataReport1  = $this->model->getReport1($reportNo);
                        $this->view->render('report1Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport1($_SESSION['NIC'], $_POST['noOfelephant'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case  'Other Wild Animals are in The Village':
                        //display villagerReportView1     
                        $this->view->dataReport2  = $this->model->getReport2($reportNo);
                        $this->view->render('report2Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 

                            $this->model->updateReport2($_SESSION['NIC'], $_POST['animal'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Breakdown of Elephant Fences':
                        $this->view->dataReport3  = $this->model->getReport3($reportNo);
                        $this->view->render('report3Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class

                            $this->model->updateReport3($_SESSION['NIC'],  $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }

                        break;
                    case 'Crop Damages':
                        //display Update Crop Damages      
                        $this->view->dataReport4  = $this->model->getReport4($reportNo);
                        $this->view->render('report4Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport4($_SESSION['NIC'], $_POST['animal'], $_POST['cultivatedCrop'], $_POST['cultivatedLand'], $_POST['damageLand'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Wild Animal is in Danger':
                        $this->view->dataReport5  = $this->model->getReport5($reportNo);
                        $this->view->render('report5Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport5($_SESSION['NIC'], $_POST['noOfanimals'], $_POST['animal'], $_POST['support'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                    case 'Illegal Happing':
                        $this->view->dataReport6  = $this->model->getReport6($reportNo);
                        $this->view->render('report6Update');
                        if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']);
                        }
                        if (isset($_POST['Submit'])) {
                            //call insertReport function in incident_model class 
                            $this->model->updateReport6($_SESSION['NIC'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
                        }
                        break;
                }
                break;
        }
    }
    //unsucessCropDamages function call
    public function unsuccessCropDamages()
    {
        if (isset($_GET['lang'])) {
            //assign the value
            $lang = $_GET['lang'];
        }

        if (isset($_GET['reportNo'])) {
            $reportNo = $_GET['reportNo'];
            $this->view->dataReport  = $this->model->getreport($reportNo);
        } else {
            header("../user/error");
        }
        session_start();
        $this->view->dataReport4  = $this->model->getReport4($reportNo);
        if (isset($_POST['Submit'])) {
            //call insertReport function in incident_model class 
            $this->model->updateReportUnsuccess($_SESSION['NIC'], $_POST['animal'], $_POST['cultivatedCrop'], $_POST['cultivatedLand'], $_POST['damageLand'], $_POST['place'], $_POST['latitude'], $_POST['longitude'], $reportNo);
        }
        $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
        $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

        switch ($lang) {
            case 1:

                //display villagerReportView1     
                $this->view->render('updateCropDamagesUnsccess');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']);
                }
                break;
            case 2:
                //display villagerReportView2
                $this->view->render('updateCropDamagesUnsccessSinhala');
                if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']);
                }
                break;
            case 3:
                //display villagerReportView3    
                $this->view->render('updateCropDamagesUnsccessTamil');
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
