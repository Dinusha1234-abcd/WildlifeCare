<?php

require 'user.php';
//import a file for sending sms(twilio)
require '././includes/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



use Twilio\Rest\Client;

if (session_status() === PHP_SESSION_NONE) {
	session_start();
	session_regenerate_id();
}

class admin extends user
{


	private $adminId;

	function __construct()
	{
		parent::__construct();
	}


	private function sendAdminMail($password, $email)
	{

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
		$message .= "<p>Your password is" . $password . "(<b>We are highly recommend you to reset password when you are login to the WildlifeCare at first time for security purpose.</b>) and username is your National Identity Card number. For login you can use below link.<br>";
		$message .= "<a href='localhost/wildlifecare'>Login</a></p>";


		$addMail->Body = $message;
		$to = $email;
		$addMail->addAddress($email);
		$send = $addMail->Send();
	}

	public function addUser()
	{

		$province = $this->model->getProvince();
		$office = $this->model->getOfficeNum();


		//names of provinces and numbers of offices get to assiciative array for dynmaic drop downs
		$dropDownData = [
			"province" => $province,
			"office" => $office
		];

		if (isset($_POST["provinceName"])) {


			$district = $this->model->getDistrict($_POST["provinceName"]);

			foreach ($district as $row) //provide district names for dynamic drop donws using ajax 
				echo "<option value=" . $row["Name"] . ">" . $row["Name"] . "</option>";
		}


		if (isset($_POST["districtName"])) {
			$gnDivision = $this->model->getGN($_POST["districtName"]);

			foreach ($gnDivision as $row) //provide GN division names for dynamic drop donws using ajax 
				echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
		}

		if (isset($_POST["gnName"])) {
			$village = $this->model->getVillage($_POST["gnName"]);


			foreach ($village as $row) //provide village names for dynamic drop donws using ajax 
				echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
		}






		$this->view->render("admin_register", $dropDownData);




		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$userType = $_POST["submit"]; //get user type of the form
			$data = [

				"fName" => trim($_POST["fname"]),
				"lName" => trim($_POST["lname"]),
				"nic" => trim($_POST["nic"]),
				"gender" => trim($_POST["gender"]),
				"dob" => trim($_POST["dob"]),
				"address" => trim($_POST["address"]),
				"mob" => trim($_POST["mobile"]),
				"email" => trim($_POST["email"]),
				"password" => trim($_POST["password"]),
				"Error" => ""

			];

			if (!empty($userType)) {

				//checking e mail already exists
				if ($this->model->checkMail($data["email"]))
					$data["Error"] = "E mail is already taken";
				else { //checking mobile number already exists
					if ($this->model->checkMobile($data["mob"]))
						$data["Error"] = "Mobile number is already taken";
					else {  //checking NIC already exists
						if ($this->model->checkNIC($data["nic"]))
							$data["Error"] = "NIC is already taken";
					}
				}













				if (empty($data["Error"])) //if there is no any errors then add users
				{
					$success = "Successfully Added";
					switch ($userType) { //based on the user type adding users to the system database
						case "grama niladhari": {
								$specificData = [ //data specific for grama niladhari
									"province" => trim($_POST["province"]),
									"district" => trim($_POST["district"]),
									"gnd" => trim($_POST["gnd"]),
									"gic" => trim($_POST["gic"])

								];

								$allData = array_merge($data, $specificData);
								$this->model->gnAdd($allData); //add grama niladhari's data to the database
								$this->sendAdminMail($data["password"], $data["email"]); //send e mail to added user
								echo "<script>location.href='../admin/addUser?error=" . $data["Error"] . "&success=" . $success . "';</script>"; //redirect to user adding page of admin
							}
							break;

						case "wildlife officer": {
								$specificData = [ //data specific for wildlife Officer
									"wid" => trim($_POST["wid"]),
									"officeNum" => trim($_POST["ofn"])

								];

								$allData = array_merge($data, $specificData);
								$this->model->woAdd($allData); //add wildlife officer's data to the database
								$this->sendAdminMail($data["password"], $data["email"]);
								echo "<script>location.href='../admin/addUser?error=" . $data["Error"] . "&success=" . $success . "';</script>";
							}

							break;

						case "veterinarian": {
								$specificData = [ //data specific for veterinarian
									"vid" => trim($_POST["vid"]),
									"officeNum" => trim($_POST["ofn"])


								];

								$allData = array_merge($data, $specificData);
								$this->model->vetAdd($allData); //add veterinarian's data to the database
								$this->sendAdminMail($data["password"], $data["email"]);
								echo "<script>location.href='../admin/addUser?error=" . $data["Error"] . "&success=" . $success . "';</script>";
							}


							break;

						case "villager": {

								$specificData = [
									"province" => trim($_POST["province"]),
									"district" => trim($_POST["district"]),
									"gnd" => trim($_POST["gnd"]),
									"village" => trim($_POST["village"])
								];

								$allData = array_merge($data, $specificData);
								$this->model->vilAdd($allData); //add villagers data to the database
								$this->sendAdminMail($data["password"], $data["email"]);
								echo "<script>location.href='../admin/addUser?error=" . $data["Error"] . "&success=" . $success . "';</script>";
							}

							break;

						case "regional officer": {

								$specificData = [
									"rid" => trim($_POST["rid"]),
									"officeNum" => trim($_POST["ofn"])

								];

								$allData = array_merge($data, $specificData);
								$this->model->roAdd($allData); //add regional officer to database
								$this->sendAdminMail($data["password"], $data["email"]);
								echo "<script>location.href='../admin/addUser?error=" . $data["Error"] . "&success=" . $success . "';</script>";
							}
					}
				} else {


					echo "<script>location.href='../admin/addUser?error=" . $data["Error"] . "&success=';</script>";
				}
			}
		}
	}


	public function viewUser()
	{



		//get users details
		$data = $this->model->getUser();
		//render admins's view user page and pass relevant data
		$this->view->render("user_view", $data);
	}


	public function dashboard()
	{
		//get data related to dashboard
		$data = $this->model->getDataDashboard();
		//redirect to dashboard and pass the data
		$this->view->render('admin_page', $data);
	}

	public function placeNotice()
	{



		$province = $this->model->getProvince();
		$this->view->render('adminNotice', $province);

		if (isset($_POST["provinceName"])) {


			$district = $this->model->getDistrict($_POST["provinceName"]);

			foreach ($district as $row)
				echo "<option value=" . $row["Name"] . ">" . $row["Name"] . "</option>";
		}


		if (isset($_POST["districtName"])) {
			$gnDivision = $this->model->getGN($_POST["districtName"]);

			foreach ($gnDivision as $row)
				echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
		}


		if (isset($_POST["gnName"])) {
			$village = $this->model->getVillage($_POST["gnName"]);


			foreach ($village as $row)
				echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST["submit"])) {


				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				date_default_timezone_set('Asia/Colombo');


				$data = [
					"subject" => trim($_POST["subject"]),
					"description" => trim($_POST["description"]),
					"village" => trim($_POST["village"]),
					"gnDivision" => trim($_POST["gnd"]),
					"district" => trim($_POST["district"]),
					"province" => trim($_POST["province"]),
					"jobType" => trim($_POST["jobType"]),
					"date" => date("y/m/d"),
					"time" => date("H:i:s")
				];











				$this->model->placeNotice($data);

				$phoneArray = $this->model->getPhoneNumbersForNotice($data["village"], $data["gnDivision"], $data["district"], $data["province"], $data["jobType"]);
				$sid = "ACef8fe9b30c6de390f180eb11a6ccb5ae";
				$authToken = "214a24ae9ccc9226817976bbfc4a8095";

				for ($x = 0; $x < count($phoneArray); $x++) {
					$client = new Twilio\Rest\Client($sid, $authToken);

					$message = $client->messages->create(
						"+94" . strval(($phoneArray[$x])["mobile"]),
						array(
							'from' => "+17628008525",
							'body' => $data["description"]
						)



					);
				}
			}
		}
	}

	public function viewUserProfile()
	{

		$NIC = $_GET["id"];
		$userType = $_GET["type"];


		switch ($userType) {
			case "villager":
				$this->view->render('adminViewVillagerProfile', $this->model->getVillagerData($NIC));
				break;
			case "gramaNiladhari":
				$this->view->render('adminViewGramaNiladhariProfile', $this->model->getGramaNiladhariData($NIC));
				break;
			case "wildlifeOfficer":
				$this->view->render('adminViewWildlifeOfficerProfile', $this->model->getWildlifeOfficerData($NIC));
				break;
			case "regionalOfficer":
				$this->view->render('adminViewRegionalOfficerProfile', $this->model->getRegionalOfficerData($NIC));
				break;
			case "veterinarian":
				$this->view->render('adminViewVeterinarianProfile', $this->model->getVeterinarianData($NIC));
				break;
		}
	}

	public function deleteUser()
	{
		$NIC = $_GET["id"];
		$userType = $_GET["type"];

		switch ($userType) {
			case "villager": {
					$this->model->deleteVillager($NIC);
					echo "<script>
    			location.href='../admin/viewUser?nic=" . $NIC . "&job=" . $userType . "';
    			
    			</script>";
				}
				break;
			case "regional-officer": {
					$this->model->deleteRegionalOfficer($NIC);
					echo "<script>
    			location.href='../admin/viewUser?nic=" . $NIC . "&job=" . $userType . "';
    			
    			</script>";
				}

				break;
			case "wildlife-officer": {
					$this->model->deleteWildlifeOfficer($NIC);
					echo "<script>
    			location.href='../admin/viewUser?nic=" . $NIC . "&job=" . $userType . "';
    			
    			</script>";
				}
				break;
			case "veterinarian": {
					$this->model->deleteVeterinarian($NIC);
					echo "<script>
    			location.href='../admin/viewUser?nic=" . $NIC . "&job=" . $userType . "';
    			
    			</script>";
				}
				break;
		}
	}

	public function viewReportedIncidents()
	{
		$status = $_GET["status"];
		$incident = $_GET["incident"];
		$data = array();
		switch ($incident) {
			case 'elephantAttack': {
					switch ($status) {
						case 'active': {
								$data = $this->model->activeElephantAttack();
							}

							break;
						case 'success':
							$data = $this->model->successElephantAttack();

							break;
						case 'unsuccess':
							$data = $this->model->unsuccessElephantAttack();

							break;
					}
				}

				break;
			case 'animalsVillage': {
					switch ($status) {
						case 'active':
							$data = $this->model->activeAnimalsInVillage();

							break;
						case 'success':
							$data = $this->model->successAnimalsInVillage();

							break;
						case 'unsuccess':
							$data = $this->model->unsuccessAnimalsInVillage();

							break;
					}
				}

				break;
			case 'animalDanger': {
					switch ($status) {
						case 'active':
							$data = $this->model->activeAnimalIsInDanger();

							break;
						case 'success':
							$data = $this->model->successAnimalIsInDanger();

							break;
						case 'unsuccess':
							$data = $this->model->unsuccessAnimalIsInDanger();

							break;
					}
				}


				break;
			case 'illegal': {
					switch ($status) {
						case 'active':
							$data = $this->model->activeIllegalActivities();

							break;
						case 'success':
							$data = $this->model->successIllegalActivities();

							break;
						case 'unsuccess':
							$data = $this->model->unsuccessIllegalActivities();

							break;
					}
				}

				break;
			case 'cropDamage': {
					switch ($status) {
						case 'active':
							$data = $this->model->activeCropDamages();

							break;
						case 'success':
							$data = $this->model->successCropDamages();

							break;
						case 'unsuccess':
							$data = $this->model->unsuccessCropDamages();

							break;
					}
				}

				break;
			case 'fenceDamage': {
					switch ($status) {
						case 'active':
							$data = $this->model->activeFenceDamages();

							break;
						case 'success':
							$data = $this->model->successFenceDamages();


							break;
						case 'unsuccess':
							$data = $this->model->unsuccessFenceDamages();


							break;
					}
				}

				break;
		}

		$this->view->render("adminReportedIncident", $data);
	}

	public function viewProfile()
	{
		$details = $this->model->getDetails($_SESSION["NIC"]);
		$this->view->render('adminViewProfile', $details);
	}

	public function changePassword()
	{
		$this->view->render("adminChangePassword");
		if (isset($_POST["submitPass"])) {
			$currentPassword = $_POST["currentPassword"];
			$newPassword = $_POST["newPassword"];
			$confirmPassword = $_POST["confirmPassword"];

			if ($confirmPassword == $newPassword) {
				$adminCurrentPassword = $this->model->getCurrentPassword($_SESSION["NIC"]);
				if (password_verify($currentPassword, $adminCurrentPassword)) {
					$this->model->changeAdminPassword($newPassword, $_SESSION["NIC"]);
					header("Location: ../admin/viewProfile?change=success");
				} else
					header("Location: ../admin/viewProfile?change=wrong");
			} else
				header("Location: ../admin/viewProfile?change=notconfirm");
		}
	}




	// public function editVillager()
	// {
	//   if(isset($_GET["NIC"]))
	//     $NIC=$_GET["NIC"];
	//   $userData=$this->model->getVillagerDataToEdit($NIC);
	//   $this->view->render('adminEditVillager',$userData);
	//   if(isset($_POST["submit"]))
	//   {
	//     $data=[
	//       "oldNIC"=>$NIC,
	//      "fName"=>trim($_POST["fname"]),
	//       "lName"=>trim($_POST["lname"]),
	//       "nic"=>trim($_POST["nic"]),
	//       "gender"=>trim($_POST["gender"]),
	//       "dob"=>trim($_POST["dob"]),
	//       "address"=>trim($_POST["address"]),
	//       "mob"=>trim($_POST["mobile"]),
	//       "email"=>trim($_POST["email"])



	//     ];

	//     $this->model->editVillager($data);



	//   }


	// }

	public function showMap()
  {  $ID=$_GET["id"];
     $details=$this->model->getIncidentDetailsForMap($ID);
    $data=[
      "lat"=>$_GET["lat"],
      "lon"=>$_GET["lon"],
      "content"=>$details];


    $this->view->render("adminIndiMap",$data);
   
  }


}
