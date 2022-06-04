<?php

require "././includes/PHPMailer.php";
require "././includes/SMTP.php";
require "././includes/Exception.php";
require '././includes/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;

class user extends Controller
{

  private $_firstName;
  private $_lastName;
  private $_address;
  private $_gender;
  private $_userNic;
  private $_userEmail;
  private $_userMobileNumber;
  private $_userDateofBirth;


  public function index()
  {


    if (session_status() === PHP_SESSION_NONE) {
      session_start();
      session_regenerate_id();
    }
    //If user logged in before and not log out then can redirect to pages without provide passwrd
    if (!empty($_SESSION["NIC"])) {
      $jobType = $_SESSION["jobtype"];
      if (isset($_GET["lang"])) {
        //give user pages based on the selected language

        if ($_GET["lang"] == "1") {
          switch ($jobType) {

            case "villager":

              $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);
              foreach ($registrationStatus as $row) {
                $regStatus  = $row['registrationStatus'];
              }
              if ($regStatus == 'accept') {
                //get the data in Database  
                $this->view->data = $this->model->selectData($_POST["username"]);
                //echo $this->data;  
                // render the villager page  
                $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
                $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
            
                $this->view->render('villagersPage');

                 if (isset($_POST['submitAlert'])) {
                  $this->model->setAlerStatus($_SESSION['NIC']);
                }
              } else if ($regStatus == 'pending') {
                $this->view->data = $this->model->selectData($_POST["username"]);
                $this->view->render('villagersPagenotAcceptVillager');
              } else {
                header('Location: ../user/index');
              }

              break;
            case "Wildlife Officer":
              // $this->view->notificationStatus = $this->checkNotificationStatus($_SESSION['NIC']);
              $notification = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);

              foreach ($notification  as $row) {
                $notificationStatus =  $row['notificationStatus'];
              }
              $this->view->notificationStatus = $notificationStatus;
              $this->view->render('wildlifeofficer');
              break;
            case "admin":
              header("Location:../admin/dashboard");
              break;
            case "regional Officer":
              header("Location:../regionalOfficer/dashboard");
              break;
            case "veterinarian":
              $this->view->render('veterinarian');
          }
        } elseif ($_GET["lang"] == "2") {

          switch ($jobType) {

            case "villager":
              //get the data in Database  
              $this->view->data = $this->model->selectData($_POST["username"]);
              //echo $this->data;  
              // render the villager page  
              $this->view->render('villagersPagesinhala');
              break;
            case "Wildlife Officer":
              $notification = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);

              foreach ($notification  as $row) {
                $notificationStatus =  $row['notificationStatus'];
              }
              $this->view->notificationStatus = $notificationStatus;
              $this->view->render('wildlifeofficerSinhala');
              break;
            case "admin":
              header("Location:../admin/dashboard");
              break;
            case "regional Officer":
              header("Location:../regionalOfficer/dashboard");
              break;
            case "veterinarian":
              $this->view->render('veterinarianSinhala');
          }
        } else {

          switch ($jobType) {

            case "villager":
              //get the data in Database  

              $this->view->data = $this->model->selectData($_POST["username"]);

              $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
              // echo "aa".$this->checkNotificationStatus($_SESSION['NIC']);
              $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

              $this->view->data = $this->model->selectData($_POST["username"]);

              //echo $this->data;  
              // render the villager page  
              $this->view->render('villagersPagetamil');
              break;
            case "Wildlife Officer":
              $notification = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);

              foreach ($notification  as $row) {
                $notificationStatus =  $row['notificationStatus'];
              }
              $this->view->notificationStatus = $notificationStatus;
              $this->view->render('wildlifeofficerTamil');
              break;
            case "admin":
              header("Location:../admin/dashboard");
              break;
            case "regional Officer":
              header("Location:../regionalOfficer/dashboard");
              break;

            case "veterinarian":
              $this->view->render('veterinarianTamil');
              break;
          }
        }
      } else {

        //if not selected language then gives defulat language pages

        switch ($jobType) {

          case "villager":
            $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);

            foreach ($registrationStatus as $row) {
              $regStatus  = $row['registrationStatus'];
            }
            if ($regStatus == 'accept') {
              //get the data in Database  
              $this->view->data = $this->model->selectData($_SESSION['NIC']);
               $this->view->render('villagersPage');
              if (isset($_POST['submitAlert'])) {
                $this->model->setAlerStatus($_SESSION['NIC']);
              }
              if (isset($_GET['notification'])) {
                $this->model->setNotificationStatus($_SESSION['NIC']);
              }
              $getEmail = $this->model->getEmail($_SESSION['NIC']);
              foreach ($getEmail as $row) {
                $email = $row['email'];
              }
              $getGNDVillagersEmails = $this->model->getEmails($_SESSION['NIC']);
              if (isset($_POST['Submit'])) {
                $this->model->emergencyReport($_SESSION['NIC'], '', '', '', '', $_POST['latitude'], $_POST['longitude']);
                foreach ($getGNDVillagersEmails as $row) {
                  $emails = $row['email'];
                }
                $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
              }
            } else if ($regStatus == 'pending') {
              $this->view->data = $this->model->selectData($_SESSION['NIC']);
              $this->view->render('villagersPagenotAcceptVillager');
            } else {
              header('Location: ../user/index');
            }
            break;
          case "admin":
            header("Location:../admin/dashboard");
            break;
          case "regional Officer":
            header("Location:../regionalOfficer/dashboard");
            break;
          case "veterinarian":
            $this->view->render('veterinarian');
        }
      }
    }


    //If user not logged in then redirect to login page

    else {

      if (isset($_GET["lang"])) {

        if ($_GET["lang"] == "2")
          $this->view->render('loginSinhala');
        elseif ($_GET["lang"] == "1")
          $this->view->render('login');
        elseif ($_GET["lang"] == "3")
          $this->view->render('loginTamil');
      } else
        $this->view->render('login');
    }
  }



  public function login()
  {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); //all string variables sanitize at once.

      //create associative array and store username and passwrd gave by user.
      $data = [
        "username" => trim($_POST["username"]),
        "password" => trim($_POST["password"])
      ];

      if (!empty($data["username"]) && !empty($data["password"])) {

        $loginUser = $this->model->login($data["username"], $data["password"]);
        if (empty($loginUser["Error"])) {
          //if there is no any error then user can login
          if (session_status() === PHP_SESSION_NONE) {
            session_start();
          }
          $_SESSION["NIC"] = $loginUser["NIC"];
          $_SESSION["Fname"] = $loginUser["Fname"];
          $_SESSION["Lname"] = $loginUser["Lname"];
          $_SESSION["jobtype"] = $loginUser["jobtype"];
          // $_SESSION["Fname"] = $loginUser["Fname"];
          // $_SESSION["Lname"] = $loginUser["Lname"];


          if (isset($_GET["lang"])) {
            //give user pages based on the selected language

            if ($_GET["lang"] == "1") {
              switch ($loginUser["jobtype"]) {

                case "villager":
                  $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);
      
                  foreach ($registrationStatus as $row) {
                    $regStatus  = $row['registrationStatus'];
                  }
                  if ($regStatus == 'accept') {
                    //get the data in Database  
                    $this->view->data = $this->model->selectData($_SESSION['NIC']);
                    $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
                    $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
                     $this->view->render('villagersPage');
                    if (isset($_POST['submitAlert'])) {
                      $this->model->setAlerStatus($_SESSION['NIC']);
                    }
                    if (isset($_GET['notification'])) {
                      $this->model->setNotificationStatus($_SESSION['NIC']);
                    }
                    $getEmail = $this->model->getEmail($_SESSION['NIC']);
                    foreach ($getEmail as $row) {
                      $email = $row['email'];
                    }
                    $getGNDVillagersEmails = $this->model->getEmails($_SESSION['NIC']);
                    if (isset($_POST['Submit'])) {
                      $this->model->emergencyReport($_SESSION['NIC'], '', '', '', '', $_POST['latitude'], $_POST['longitude']);
                      foreach ($getGNDVillagersEmails as $row) {
                        $emails = $row['email'];
                         $this->sendEmail($emails, "Emergency Incident Report", "Please go to Safe place in Your are arrival Wild Elephant ");
                         $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
      
                      }
                      $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
                    }
                  } else if ($regStatus == 'pending') {
                    $this->view->data = $this->model->selectData($_SESSION['NIC']);
                    $this->view->render('villagersPagenotAcceptVillager');
                  } else {
                    header('Location: ../user/index');
                  }
                  break;
                      case "Wildlife Officer":
                  $notification = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);

                  foreach ($notification  as $row) {
                    $notificationStatus =  $row['notificationStatus'];
                  }
                  $this->view->notificationStatus = $notificationStatus;

                  //   $this->view->notificationStatus = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);
                  $this->view->render('wildlifeofficer');
                  break;
                case "admin":
                  header("Location:../admin/dashboard");
                  break;
                case "regional Officer":
                  header("Location:../regionalOfficer/dashboard");
                  break;
                case "veterinarian":
                  $this->view->render('veterinarian');
                  break;
                case 'Grama Niladhari':
                    // session_start();
                    $_userNic = $_SESSION["NIC"];
                    $this->view->data = $this->model->selectData($_userNic);
                    $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
                    $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
        
                    $this->view->render('gramaniladari');
                    if (isset($_POST['submitAlert'])) {
                      $this->model->setAlerStatus($_SESSION['NIC']);
                    }
                  break;
               
              }
            } elseif ($_GET["lang"] == "2") {

              switch ($loginUser["jobtype"]) {

                case "villager":
                  $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);
      
                  foreach ($registrationStatus as $row) {
                    $regStatus  = $row['registrationStatus'];
                  }
                  if ($regStatus == 'accept') {
                    //get the data in Database  
                    $this->view->data = $this->model->selectData($_SESSION['NIC']);
                     $this->view->render('villagersPage');
                    if (isset($_POST['submitAlert'])) {
                      $this->model->setAlerStatus($_SESSION['NIC']);
                    }
                    if (isset($_GET['notification'])) {
                      $this->model->setNotificationStatus($_SESSION['NIC']);
                    }
                    $getEmail = $this->model->getEmail($_SESSION['NIC']);
                    foreach ($getEmail as $row) {
                      $email = $row['email'];
                    }
                    $getGNDVillagersEmails = $this->model->getEmails($_SESSION['NIC']);
                    if (isset($_POST['Submit'])) {
                      $this->model->emergencyReport($_SESSION['NIC'], '', '', '', '', $_POST['latitude'], $_POST['longitude']);
                      foreach ($getGNDVillagersEmails as $row) {
                        $emails = $row['email'];
                          $this->sendEmail($emails, "Emergency Incident Report", "Please go to Safe place in Your are arrival Wild Elephant ");
                          $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
      
                      }
                      $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
                    }
                  } else if ($regStatus == 'pending') {
                    $this->view->data = $this->model->selectData($_SESSION['NIC']);
                    $this->view->render('villagersPagenotAcceptVillager');
                  } else {
                    header('Location: ../user/index');
                  }
                  break;
                        break;  case "admin":
                  header("Location:../admin/dashboard");
                  break;
                case "regional Officer":
                  header("Location:../regionalOfficer/dashboard");
                  break;
                case "veterinarian":
                  $this->view->render('veterinarianSinhala');
                  break;
              }
            } else {

              switch ($loginUser["jobtype"]) {

                case "villager":
                  $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);
      
                  foreach ($registrationStatus as $row) {
                    $regStatus  = $row['registrationStatus'];
                  }
                  if ($regStatus == 'accept') {
                    //get the data in Database  
                    $this->view->data = $this->model->selectData($_SESSION['NIC']);
                     $this->view->render('villagersPage');
                    if (isset($_POST['submitAlert'])) {
                      $this->model->setAlerStatus($_SESSION['NIC']);
                    }
                    if (isset($_GET['notification'])) {
                      $this->model->setNotificationStatus($_SESSION['NIC']);
                    }
                    $getEmail = $this->model->getEmail($_SESSION['NIC']);
                    foreach ($getEmail as $row) {
                      $email = $row['email'];
                    }
                    $getGNDVillagersEmails = $this->model->getEmails($_SESSION['NIC']);
                    if (isset($_POST['Submit'])) {
                      $this->model->emergencyReport($_SESSION['NIC'], '', '', '', '', $_POST['latitude'], $_POST['longitude']);
                      foreach ($getGNDVillagersEmails as $row) {
                        $emails = $row['email'];
                           $this->sendEmail($emails, "Emergency Incident Report", "Please go to Safe place in Your are arrival Wild Elephant ");
                          $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
      
                      }
                      $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
                    }
                  } else if ($regStatus == 'pending') {
                    $this->view->data = $this->model->selectData($_SESSION['NIC']);
                    $this->view->render('villagersPagenotAcceptVillager');
                  } else {
                    header('Location: ../user/index');
                  }
                  break;
      
                case "Wildlife Officer":
                  $notification = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);

                  foreach ($notification  as $row) {
                    $notificationStatus =  $row['notificationStatus'];
                  }
                  $this->view->notificationStatus = $notificationStatus;
                  $this->view->render('wildlifeofficerTamil');
                  break;
                case "admin":
                  header("Location:../admin/dashboard");
                  break;
                case "regional Officer":
                  header("Location:../regionalOfficer/dashboard");
                  break;

                case "veterinarian":
                  $this->view->render('veterinarianTamil');
                  break;
              }
            }
          } else {

            //if not selected language then gives defulat language pages

            switch ($loginUser["jobtype"]) {

              case "villager":
                $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);
    
                foreach ($registrationStatus as $row) {
                  $regStatus  = $row['registrationStatus'];
                }
                if ($regStatus == 'accept') {
                  //get the data in Database  
                  $this->view->data = $this->model->selectData($_SESSION['NIC']);
                   $this->view->render('villagersPage');
                  if (isset($_POST['submitAlert'])) {
                    $this->model->setAlerStatus($_SESSION['NIC']);
                  }
                  if (isset($_GET['notification'])) {
                    $this->model->setNotificationStatus($_SESSION['NIC']);
                  }
                  $getEmail = $this->model->getEmail($_SESSION['NIC']);
                  foreach ($getEmail as $row) {
                    $email = $row['email'];
                  }
                  $getGNDVillagersEmails = $this->model->getEmails($_SESSION['NIC']);
                  $getGNDVillagersMobile = $this->model->getNumbers($_SESSION['NIC']);
                   if (isset($_POST['Submit'])) {
                    $this->model->emergencyReport($_SESSION['NIC'], '', '', '', '', $_POST['latitude'], $_POST['longitude']);
                    foreach ($getGNDVillagersEmails as $row) {
                       $emails = $row['email'];
                       $this->sendEmail($emails, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
    
                    }
                    foreach ($getGNDVillagersMobile as $row) {
                      $numbers = $row['numbers'];
                      $this->sendSMS($numbers);
   
                   }
                    $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
                    $this->sendSMS($numbers);
                  }
                } else if ($regStatus == 'pending') {
                  $this->view->data = $this->model->selectData($_SESSION['NIC']);
                  $this->view->render('villagersPagenotAcceptVillager');
                } else {
                  header('Location: ../user/index');
                }
                break;
     case "Wildlife Officer":
              case "Wildlife Officer":
                $notification = $this->model->getwildlifeOfficerNotificationStatus($_SESSION['NIC']);

                foreach ($notification  as $row) {
                  $notificationStatus =  $row['notificationStatus'];
                }
                $this->view->notificationStatus = $notificationStatus;
                $this->view->render('wildlifeofficer');
                break;
              case "admin":
                header("Location:../admin/dashboard");
                break;
              case "regional Officer":
                header("Location:../regionalOfficer/dashboard");
                break;
              case "veterinarian":
                $this->view->render('veterinarian');
            }
          }
        } else {
          //if there is a error then not redirect
          $this->view->render('login', $loginUser["Error"]);
        }
      }
    }
  }








  public function logout()
  { //session destroy when user logout

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
      session_regenerate_id();
    }
    unset($_SESSION["NIC"]);
    unset($_SESSION["jobtype"]);
    unset($_SESSION["Fname"]);
    unset($_SESSION["Lname"]);
    session_destroy();
    if (isset($_GET["lang"])) {

      if ($_GET["lang"] == "2")
        $this->view->render('loginSinhala');
      elseif ($_GET["lang"] == "1")
        $this->view->render('login');
      elseif ($_GET["lang"] == "3")
        $this->view->render('loginTamil');
    } else
      $this->view->render('login');
  }
  public function checkAlerStatus($NIC)
  {

    $statusReview  = $this->model->getAlerStatus($NIC);
    foreach ($statusReview as $row) {
      $status = $row['alertstatus'];
    }
    return $status;
  }
  //notification function for wildlifeofficer
  public function checkwildlifeOfficerNotification($NIC)
  {
    $statusReview  = $this->model->getwildlifeOfficerNotificationStatus($NIC);
    foreach ($statusReview as $row) {
      $notificationStatus = $row['status'];
    }
    return $notificationStatus;
  }
  public function checkNotificationStatus($NIC)
  {

    $statusReview  = $this->model->getNotificationStatus($NIC);
    foreach ($statusReview as $row) {
      $numberofnotification = $row['numberofnotification'];
    }
    return $numberofnotification;
  }
  public function viewpage()
  {

    if (isset($_GET['lang'])) {
      //assign the value
      $lang = $_GET['lang'];
    }
    if (isset($_GET['send'])) {
      //assign the value
      $this->model->selectData($_SESSION['NIC']);
    }
    $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
    $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);

    switch ($lang) {
      case 1:
        switch ($_SESSION["jobtype"]) {
          case "villager":
            $registrationStatus = $this->model->selectRegStatus($_SESSION['NIC']);

            foreach ($registrationStatus as $row) {
              $regStatus  = $row['registrationStatus'];
            }
            if ($regStatus == 'accept') {
              //get the data in Database  
              $this->view->data = $this->model->selectData($_SESSION['NIC']);
               $this->view->render('villagersPage');
              if (isset($_POST['submitAlert'])) {
                $this->model->setAlerStatus($_SESSION['NIC']);
              }
              if (isset($_GET['notification'])) {
                $this->model->setNotificationStatus($_SESSION['NIC']);
              }
              $getEmail = $this->model->getEmail($_SESSION['NIC']);
              foreach ($getEmail as $row) {
                $email = $row['email'];
              }
              $getGNDVillagersEmails = $this->model->getEmails($_SESSION['NIC']);
              $getGNDVillagersMobile = $this->model->getNumbers($_SESSION['NIC']);
              //print_r($getGNDVillagersMobile);
              if (isset($_POST['Submit'])) {
                $this->model->emergencyReport($_SESSION['NIC'], '', '', '', '', $_POST['latitude'], $_POST['longitude']);
                foreach ($getGNDVillagersEmails as $row) {
                  $emails = $row['email'];
                  $this->sendEmail($emails, "Emergency Incident Report", "Please go to Safe place in Your are arrival Wild Elephant ");
                  $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");

                }
                $this->sendEmail($email, "Emergency Incident Report Sumbit Sucessful", "Wildlife Officer Accept Your incident Report Soon has Possible and Please go to Safe place wil");
                foreach ($getGNDVillagersMobile as $row) {
                  $numbers = $row['numbers'];
                  $this->sendSMS($numbers);

               }
              }
            } else if ($regStatus == 'pending') {
              $this->view->data = $this->model->selectData($_SESSION['NIC']);
              $this->view->render('villagersPagenotAcceptVillager');
            } else {
              header('Location: ../user/index');
            }
            break;

          case 'Grama Niladhari':
            // session_start();
            $_userNic = $_SESSION["NIC"];
            $this->view->data = $this->model->selectData($_userNic);
            $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
            $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);

            $this->view->render('gramaniladari');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
            break;
        }
        break;
      case 2:
        switch ($_SESSION["jobtype"]) {
          case 'villager':
            // session_start();
            $_userNic = $_SESSION["NIC"];
            $this->view->data = $this->model->selectData($_userNic);

            $this->view->render('villagersPagesinhala');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         

            break;
          case 'Grama Niladhari':
            // session_start();
            $_userNic = $_SESSION["NIC"];
            $this->view->data = $this->model->selectData($_userNic);
            $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
            $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);

            $this->view->render('gramaniladariSinhala');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
            break;
        }break;
      case 3:
        switch ($_SESSION["jobtype"]) {
          case 'villager':
            // session_start();
            $_userNic = $_SESSION["NIC"];
            $this->view->data = $this->model->selectData($_userNic);

            $this->view->render('villagersPagetamil');
            if (isset($_POST['submitAlert'])) {
              $this->model->setAlerStatus($_SESSION['NIC']);
            }
         
        }
        break;
    }
  }


  public function resetPasswordRequest()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["sendEmail"])) {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $userName = trim($_POST["userName"]);



        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $url = "localhost/wildlifecare/user/resetPassword?selector=" . $selector . "&validator=" . bin2hex($token) . "&name=" . $userName;
        $expire = date("U") + 1800;
        $email = $this->model->resetPasswordStore($userName, $selector, $token, $url, $expire);
        if (!empty($email)) {

          $mail = new PHPMailer(true);
          $mail->isSMTP();
          $mail->Host = "smtp.gmail.com";
          $mail->SMTPAuth = "true";
          $mail->SMTPSecure = "tls";
          $mail->Port = "25";
          $mail->Username = "wildlifecareproject@gmail.com";
          $mail->Password = "Wildlife123";
          $subject = "Reset Your Password for Wildlife care";
          $mail->Subject = $subject;
          $mail->setFrom("wildlifecareproject@gmail.com");
          $mail->isHTML(true);
          $message = "<p>We recieved a password reset request. The link to reset your password here below. If you not request please ignore this email</p>";
          $message .= "<p>Here is your password reset link: <br>";
          $message .= "<a href=\"" . $url . "\">" . $url . "</a></p>";


          $mail->Body = $message;
          $to = $email;
          $mail->addAddress($email);
          $haha = $mail->Send();







          // $headers="From: wildlifecare <wildlifecare@gmail.com>\r\n";
          // $headers.="Reply-to: wildlifecare@gmail.com\r\n";
          // $headers.="Content-type: text/html\r\n";



          header("Location: ../user/index?reset=success");
        } else {
          header("Location: ../user/index?reset=emailError");
        }
      } else {
        header("Location: ../user/index");
      }
    } else {
      header("Location: ../user/index");
    }
  }


  public function resetPassword()
  {
    $this->view->render("resetPassword");
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];
    $userName = $_GET["name"];



    if (empty($selector) || empty($validator)) {
      header("Location: ../user/index?resetSuc=error");
    } else {
      if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST["submit"])) {
            $pwd = $_POST["newPassword"];
            $conPwd = $_POST["confirmPassword"];
            if ($pwd === $conPwd) {


              if ($this->model->resetPassword($userName, $pwd, $selector, $validator)) {
                header("Location: ../user/index?resetSuc=success");
              } else
                header("Location: ../user/index?resetSuc=fail");
            } else {
              header("Location: ../user/resetPassword?selector=" . $selector . "&validator=" . $validator . "&resetSuc=conpwd");
            }
          }
        }
      } else {
        header("Location: ../user/index?resetSuc=error");
      }
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
    switch ($lang) {
      case 1:
        //display special Notice     
        $this->view->render('editProfile');
        break;
      case 2:
        //display special Notice     

        $this->view->render('editProfilesinhala');
        break;
      case 3:
        //display special Notice     

        $this->view->render('editProfiletamil');
        break;
    }
    // $this->view->render('editProfile');
  }
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
 
public function sendSMS($numbers){
  
   
  $sid ="ACef8fe9b30c6de390f180eb11a6ccb5ae";
  $authToken="214a24ae9ccc9226817976bbfc4a8095";
  
   $client=new  Client($sid,$authToken);
                 
   $message=$client->messages->create(
   "+94770610851"  ,
   array(
        'from' => "+17628008525",
        'body' =>  "Emergancy Alert" 
   )  
                   
   );                
  
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

    
}
    } 
  }