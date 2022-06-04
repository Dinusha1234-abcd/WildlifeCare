<?php

class admin_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}



	//check email is already in the db
	public function checkMail($mail)
	{

		$stmt = "SELECT * FROM user where email='$mail'";
		$row = $this->db->runQuery($stmt);

		if (empty($row))
			return false;
		else
			return true;
	}
	//check mobile number is already in the db
	public function checkMobile($mobile)
	{

		$stmt = "SELECT * FROM user where mobileNo='$mobile'";
		$row = $this->db->runQuery($stmt);

		if (empty($row))
			return false;
		else
			return true;
	}
	//check NIC is already in the db
	public function checkNIC($nic)
	{

		$stmt = "SELECT * FROM user where NIC='$nic'";
		$row = $this->db->runQuery($stmt);

		if (empty($row))
			return false;
		else
			return true;
	}

	//add grama niladhari to system database
	public function gnAdd($data)
	{

		$nic = $data["nic"];
		$fname = $data["fName"];
		$lname = $data["lName"];
		$mob = $data["mob"];
		$dob = $data["dob"];
		$address = $data["address"];
		$userType = "Grama Niladhari";
		$email = $data["email"];
		$gender = $data["gender"];
		$province = $data["province"];
		$district = $data["district"];
		$gnd = $data["gnd"];
		$gic = $data["gic"];
		$hashPassword = password_hash($data["password"], PASSWORD_DEFAULT); //store encrypted password in the database 

		$lastNoticeID = (($this->db->runQuery("SELECT MAX(noticeID) AS max FROM notice "))[0])["max"];
		$stmt1 = "INSERT INTO user VALUES('$nic','$fname','$lname','$mob','$dob','$address','$userType','$email','$gender','$lastNoticeID')";
		$gnd_code = (($this->db->runQuery("SELECT GND_Code FROM gn_division WHERE name='$gnd' AND district_name='$district'"))[0])["GND_Code"];

		$stmt2 = "INSERT INTO grama_niladhari VALUES('$nic','$gic','$gnd_code')";
		$stmt3 = "INSERT INTO login VALUES('$nic','$hashPassword')";
		$stmt4 = "UPDATE village SET grama_niladhari_NIC='$nic' WHERE GND_Code='$gnd_code'";
		$stmt5 = "UPDATE lives SET gramaniladhari_NIC='$nic' WHERE GND_Code='$gnd_code'";
		$stmt6 = "UPDATE grama_niladhari SET NIC='$nic',GID='$gic' WHERE GND='$gnd_code'";
		$stmt7 = "INSERT INTO alert VALUES('$nic','newreg','$gnd_code')";


		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
		$this->db->runQuery($stmt4);
		$this->db->runQuery($stmt6);
		$this->db->runQuery($stmt7);
	}

	//add wildlife officer to database
	public function woAdd($data)
	{

		$nic = $data["nic"];
		$fname = $data["fName"];
		$lname = $data["lName"];
		$mob = $data["mob"];
		$dob = $data["dob"];
		$address = $data["address"];
		$userType = "Wildlife Officer";
		$email = $data["email"];
		$gender = $data["gender"];
		$wid = $data["wid"];
		$officeNum = $data["officeNum"];
		$hashPassword = password_hash($data["password"], PASSWORD_DEFAULT);

		$lastNoticeID = (($this->db->runQuery("SELECT MAX(noticeID) AS max FROM notice "))[0])["max"];
		$stmt1 = "INSERT INTO user VALUES('$nic','$fname','$lname','$mob','$dob','$address','$userType','$email','$gender','$lastNoticeID')";
		$stmt2 = "INSERT INTO wildlife_officer VALUES('$nic','$wid','$officeNum')";
		$stmt3 = "INSERT INTO login VALUES('$nic','$hashPassword')";
		$stmt4 = "INSERT INTO wildlifeofficernotification VALUES('$nic','notView')";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
		$this->db->runQuery($stmt4);
	}

	//add regional officer to database
	public function roAdd($data)
	{

		$nic = $data["nic"];
		$fname = $data["fName"];
		$lname = $data["lName"];
		$mob = $data["mob"];
		$dob = $data["dob"];
		$address = $data["address"];
		$userType = "regional Officer";
		$email = $data["email"];
		$gender = $data["gender"];
		$rid = $data["rid"];
		$officeNum = $data["officeNum"];
		$hashPassword = password_hash($data["password"], PASSWORD_DEFAULT);

		$lastNoticeID = (($this->db->runQuery("SELECT MAX(noticeID) AS max FROM notice "))[0])["max"];
		$stmt1 = "INSERT INTO user VALUES('$nic','$fname','$lname','$mob','$dob','$address','$userType','$email','$gender','$lastNoticeID')";
		$stmt2 = "INSERT INTO regional_officer VALUES('$nic','$rid','$officeNum')";
		$stmt3 = "INSERT INTO login VALUES('$nic','$hashPassword')";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
	}

	//add veterinarian to database
	public function vetAdd($data)
	{

		$nic = $data["nic"];
		$fname = $data["fName"];
		$lname = $data["lName"];
		$mob = $data["mob"];
		$dob = $data["dob"];
		$address = $data["address"];
		$userType = "veterinarian";
		$email = $data["email"];
		$gender = $data["gender"];
		$vid = $data["vid"];
		$officeNum = $data["officeNum"];
		$hashPassword = password_hash($data["password"], PASSWORD_DEFAULT);

		$lastNoticeID = (($this->db->runQuery("SELECT MAX(noticeID) AS max FROM notice "))[0])["max"];
		$stmt1 = "INSERT INTO user VALUES('$nic','$fname','$lname','$mob','$dob','$address','$userType','$email','$gender','$lastNoticeID')";
		$stmt2 = "INSERT INTO veterinarian VALUES('$nic','$vid','$officeNum')";
		$stmt3 = "INSERT INTO login VALUES('$nic','$hashPassword')";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
	}

	//add villager to database
	public function vilAdd($data)
	{

		$nic = $data["nic"];
		$fname = $data["fName"];
		$lname = $data["lName"];
		$mob = $data["mob"];
		$dob = $data["dob"];
		$address = $data["address"];
		$userType = "villager";
		$email = $data["email"];
		$gender = $data["gender"];
		$village = $data["village"];
		$province = $data["province"];
		$district = $data["district"];
		$gnd = $data["gnd"];
		$hashPassword = password_hash($data["password"], PASSWORD_DEFAULT);

		$lastNoticeID = (($this->db->runQuery("SELECT MAX(noticeID) AS max FROM notice "))[0])["max"];
		$stmt1 = "INSERT INTO user VALUES('$nic','$fname','$lname','$mob','$dob','$address','$userType','$email','$gender','$lastNoticeID')";
		$stmt2 = "INSERT INTO villager VALUES('$nic')";
		$stmt3 = "INSERT INTO login VALUES('$nic','$hashPassword')";
		$gnd_code = (($this->db->runQuery("SELECT GND_Code FROM gn_division WHERE name='$gnd' AND district_name='$district'"))[0])["GND_Code"];
		$gramaniladhari_NIC = (($this->db->runQuery("SELECT NIC  FROM grama_niladhari WHERE GND='$gnd_code'"))[0])["NIC"];
		// $village_code = (($this->db->runQuery("SELECT village_code FROM village WHERE GND_Code='$gnd_code'"))[0])["village_code"];
		$village_code = (($this->db->runQuery("SELECT village.village_code FROM village,gn_division,district,province WHERE province.Name='$province' AND district.Name='$district' AND gn_division.name='$gnd' AND village.name='$village'"))[0])["village_code"];
		$stmt4 = "INSERT INTO lives VALUES('$nic','$gramaniladhari_NIC','$village_code','$province','$district')";
		$stmt5 = "INSERT INTO villager_registration VALUES('$nic','accept')";
		$stmt6 = "INSERT INTO alert VALUES('$nic','newreg','$gnd_code')";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
		$this->db->runQuery($stmt4);
		$this->db->runQuery($stmt5);
		$this->db->runQuery($stmt6);
	}

	//select all user details and return to controller
	public function getUser()
	{
		//sql query for select villager details
		$stmt1 = "SELECT user.NIC,user.Fname,user.Lname,user.BOD,user.mobileNo,user.Address,village.name,gn_division.name AS 'gnd_name',district.Name AS 'district_name',province.Name FROM user,lives,village,gn_division,district,province WHERE user.jobType='villager' AND user.NIC=lives.villager_NIC AND lives.village_code=village.village_code AND village.GND_Code=gn_division.GND_Code AND gn_division.district_name=district.Name AND district.province_name=province.Name";


		//sql query for select regional officer details
		$stmt2 = "SELECT DISTINCT user.NIC,regional_officer.RID,user.Fname,user.Lname,user.BOD,user.mobileNo,regional_officer.officeNo,district.Name AS 'district_name',province.Name FROM                                                                           user,regional_officer,regional_wildlife_office,village,gn_division,district,province WHERE user.jobType='regional officer' AND  user.NIC=regional_officer.NIC  AND regional_officer.officeNo=regional_wildlife_office.officeNo AND regional_wildlife_office.officeNo=village.officeNo AND village.GND_Code=gn_division.GND_Code AND gn_division.district_name=district.Name AND district.province_name=province.Name GROUP BY(NIC)";

		//sql query for select wildlife officer details
		$stmt3 = "SELECT DISTINCT user.NIC,wildlife_officer.WID,user.Fname,user.Lname,user.BOD,user.mobileNo,wildlife_officer.officeNo,district.Name AS 'district_name',province.Name FROM                                                                           user,wildlife_officer,regional_wildlife_office,village,gn_division,district,province WHERE user.jobType='wildlife officer' AND  user.NIC=wildlife_officer.NIC  AND wildlife_officer.officeNo=regional_wildlife_office.officeNo AND regional_wildlife_office.officeNo=village.officeNo AND village.GND_Code=gn_division.GND_Code AND gn_division.district_name=district.Name AND district.province_name=province.Name GROUP BY(NIC)";

		//sql query for select veterinarian details
		$stmt4 = "SELECT DISTINCT user.NIC,veterinarian.VID,user.Fname,user.Lname,user.BOD,user.mobileNo,veterinarian.officeNo,district.Name AS 'district_name',province.Name FROM                                                                           user,veterinarian,regional_wildlife_office,village,gn_division,district,province WHERE user.jobType='veterinarian' AND  user.NIC=veterinarian.NIC  AND veterinarian.officeNo=regional_wildlife_office.officeNo AND regional_wildlife_office.officeNo=village.officeNo AND village.GND_Code=gn_division.GND_Code AND gn_division.district_name=district.Name AND district.province_name=province.Name";

		//sql query for select grama niladhari details
		$stmt5 = "SELECT user.NIC,grama_niladhari.GID,user.Fname,user.Lname,user.BOD,user.mobileNo,user.Address,gn_division.name AS 'gnd_name',district.Name AS 'district_name',province.Name FROM user,grama_niladhari,gn_division,district,province WHERE user.jobType='grama niladhari' AND user.NIC=grama_niladhari.NIC AND grama_niladhari.GND=gn_division.GND_Code AND gn_division.district_name=district.Name AND district.province_name=province.Name";

		$noOfVillagers = (($this->db->runQuery("SELECT COUNT(*) AS noOfVillagers FROM user WHERE jobType='villager'"))[0])['noOfVillagers'];
		$noOfWildlifers = (($this->db->runQuery("SELECT COUNT(*) AS noOfWildlifers FROM user WHERE jobType='wildlife officer'"))[0])['noOfWildlifers'];
		$noOfRegionals = (($this->db->runQuery("SELECT COUNT(*) AS noOfRegionals FROM user WHERE jobType='regional officer'"))[0])['noOfRegionals'];
		$noOfVeterinarians = (($this->db->runQuery("SELECT COUNT(*) AS noOfVeterinarians FROM user WHERE jobType='veterinarian'"))[0])['noOfVeterinarians'];
		$noOfGramaNiladhari = (($this->db->runQuery("SELECT COUNT(*) AS noOfGramaNiladhari FROM user WHERE jobType='grama niladhari'"))[0])['noOfGramaNiladhari'];


		//run sql queries and assign data to the variables
		$rows1 = $this->db->runQuery($stmt1);
		$rows2 = $this->db->runQuery($stmt2);
		$rows3 = $this->db->runQuery($stmt3);
		$rows4 = $this->db->runQuery($stmt4);
		$rows5 = $this->db->runQuery($stmt5);

		//all data get into associative array and retrun to the controller
		$allUsers = [
			"villager" => $rows1,
			"regional officer" => $rows2,
			"wildlife officer" => $rows3,
			"veterinarian" => $rows4,
			"grama niladhari" => $rows5,
			"noOfVillagers" => $noOfVillagers,
			"noOfWildlifers" => $noOfWildlifers,
			"noOfRegionals" => $noOfRegionals,
			"noOfVeterinarians" => $noOfVeterinarians,
			"noOfGramaNiladhari" => $noOfGramaNiladhari




		];
		return $allUsers;
	}


	//return details of provinces
	public function getProvince()
	{
		$stmt = "SELECT * FROM Province";
		return $this->db->runQuery($stmt);
	}
	//return office No of offices
	public function getOfficeNum()
	{
		$stmt = "SELECT officeNo FROM regional_wildlife_office";
		return $this->db->runQuery($stmt);
	}
	//return  details of districts in particular province
	public function getDistrict($provinceName)
	{
		$stmt = "SELECT * FROM district WHERE province_name='$provinceName'";
		return $this->db->runQuery($stmt);
	}
	//return  details of GN division in particular district
	public function getGN($districtName)
	{
		$stmt = "SELECT * FROM gn_division WHERE district_name='$districtName'";
		return $this->db->runQuery($stmt);
	}

	//return  details of villages in particular GN division
	public function getVillage($gnName)
	{
		$gnd_code = (($this->db->runQuery("SELECT GND_Code FROM gn_division WHERE name='$gnName'"))[0])["GND_Code"];
		$stmt = "SELECT * FROM village WHERE GND_Code='$gnd_code'";
		return $this->db->runQuery($stmt);
	}

	public function getVillagerData($nic)
	{

		$data = [

			"userDetails" => (($this->db->runQuery("SELECT * FROM user WHERE NIC='$nic'"))[0]),
			"reportedIncidentDetails" => (($this->db->runQuery("SELECT * FROM reported_incident WHERE villager_NIC='$nic'")))

		];


		return $data;
	}

	public function getGramaNiladhariData($nic)
	{
		$data = [

			"userDetails" => (($this->db->runQuery("SELECT * FROM user WHERE NIC='$nic'"))[0]),
			"reportedIncidentDetails" => (($this->db->runQuery("SELECT * FROM reported_incident WHERE gramaniladhari_NIC='$nic'")))

		];


		return $data;
	}

	public function getWildlifeOfficerData($nic)
	{
		$data = [

			"userDetails" => (($this->db->runQuery("SELECT * FROM user WHERE NIC='$nic'"))[0]),
			"reportedIncidentDetails" => (($this->db->runQuery("SELECT DISTINCT * FROM reported_incident WHERE incidentID IN(SELECT incidentID FROM work WHERE wildlife_NIC='$nic') "))),
			"noOfTotalAccepted" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM work WHERE wildlife_NIC='$nic'"))[0])["total"],
			"noOfSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS success FROM work where wildlife_NIC='$nic' AND incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='success') "))[0])['success'],
			"noOfUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS unsuccess FROM work where wildlife_NIC='$nic' AND incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='unsuccess') "))[0])['unsuccess'],
			"status" => (($this->db->runQuery("SELECT COUNT(*) AS pending FROM work where wildlife_NIC='$nic' AND incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='pending') "))[0])['pending']

		];


		return $data;
	}

	public function getVeterinarianData($nic)
	{
		$data = [

			"userDetails" => (($this->db->runQuery("SELECT * FROM user WHERE NIC='$nic'"))[0]),
			"reportedIncidentDetails" => (($this->db->runQuery("SELECT DISTINCT * FROM reported_incident WHERE incidentID IN(SELECT incidentID FROM work WHERE vet_NIC='$nic') "))),
			"noOfTotalAccepted" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM work WHERE vet_NIC='$nic'"))[0])["total"],
			"noOfSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS success FROM work where vet_NIC='$nic' AND incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='success') "))[0])['success'],
			"noOfUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS unsuccess FROM work where vet_NIC='$nic' AND incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='unsuccess') "))[0])['unsuccess'],
			"status" => (($this->db->runQuery("SELECT COUNT(*) AS pending FROM work where vet_NIC='$nic' AND incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='pending') "))[0])['pending']

		];


		return $data;
	}

	public function getRegionalOfficerData($nic)
	{
		$data = [

			"userDetails" => (($this->db->runQuery("SELECT * FROM user WHERE NIC='$nic'"))[0])


		];


		return $data;
	}

	public function deleteVillager($NIC)
	{
		$stmt1 = "DELETE FROM user WHERE NIC='$NIC'";
		$stmt2 = "DELETE FROM villager WHERE NIC='$NIC'";
		$stmt3 = "DELETE FROM lives WHERE villager_NIC='$NIC'";
		$stmt4 = "DELETE FROM login WHERE userName='$NIC'";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
		$this->db->runQuery($stmt4);
	}

	public function deleteRegionalOfficer($NIC)
	{

		$stmt1 = "DELETE FROM user WHERE NIC='$NIC'";
		$stmt2 = "DELETE FROM login WHERE userName='$NIC'";
		$stmt3 = "DELETE FROM regional_officer WHERE NIC='$NIC'";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
	}

	public function deleteWildlifeOfficer($NIC)
	{

		$stmt1 = "DELETE FROM user WHERE NIC='$NIC'";
		$stmt2 = "DELETE FROM login WHERE userName='$NIC'";
		$stmt3 = "DELETE FROM wildlife_officer WHERE NIC='$NIC'";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
	}

	public function deleteVeterinarian($NIC)
	{


		$stmt1 = "DELETE FROM user WHERE NIC='$NIC'";
		$stmt2 = "DELETE FROM login WHERE userName='$NIC'";
		$stmt3 = "DELETE FROM veterinarian WHERE NIC='$NIC'";

		$this->db->runQuery($stmt1);
		$this->db->runQuery($stmt2);
		$this->db->runQuery($stmt3);
	}


	public function placeNotice($data)
	{

		$date = $data["date"];
		$subject = $data["subject"];
		$description = $data["description"];
		$village = $data["village"];
		$gnDivision = $data["gnDivision"];
		$district = $data["district"];
		$province = $data["province"];
		$jobType = $data["jobType"];
		$time = $data["time"];



		$stmt1 = "INSERT INTO notice (date,description,province,district,gn_division,village,time,jobType) VALUES('$date','$description','$province','$district','$gnDivision','$village','$time','$jobType')";
		$this->db->runQuery($stmt1);

		$village_code = (($this->db->runQuery("SELECT village.village_code FROM village,gn_division,district,province WHERE province.Name='$province' AND district.Name='$district' AND gn_division.name='$gnDivision' AND village.name='$village'"))[0])["village_code"];

		$officeNo = (($this->db->runQuery("SELECT officeNo FROM village WHERE village_code='$village_code'"))[0])["officeNo"];

		$stmt2 = "INSERT INTO notice_has_wildlifeoffice_village VALUES('$village_code',last_insert_id(),'$officeNo','$jobType')";
		$this->db->runQuery($stmt2);
	}

	//this method get related data to the dashboard and pass those data
	public function getDataDashboard()
	{
		//get  number of active cases of reported incident categories
		$activeCases = (($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfActiveCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfActiveAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfActiveBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfActiveAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfActiveIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfActiveElephantsVillage FROM reported_incident WHERE incidentStatus='pending'"))[0]);
		//get  number of success cases of reported incident categories
		$successCases = (($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfActiveCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfActiveAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfActiveBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfActiveAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfActiveIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfActiveElephantsVillage FROM reported_incident WHERE incidentStatus='success'"))[0]);
		//get  number of unsuccess cases of reported incident categories
		$unSuccessCases = (($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfActiveCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfActiveAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfActiveBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfActiveAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfActiveIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfActiveElephantsVillage FROM reported_incident WHERE incidentStatus='unsuccess'"))[0]);

		//get number of all active cases district by district
		$numOfActiveCasesByDistrict = [
			"hambanthota" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveHamb FROM reported_incident WHERE incidentStatus='pending' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveHamb"],

			"polonnaruwa" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActivePolo FROM reported_incident WHERE incidentStatus='pending' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActivePolo"],

			"anuradhapura" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveAnu FROM reported_incident WHERE incidentStatus='pending' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveAnu"],
			"ampara" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveAmpara FROM reported_incident WHERE incidentStatus='pending' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveAmpara"]
		];



		//get number of all success cases district by district
		$numOfSuccessCasesByDistrict = [
			"hambanthota" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveHamb FROM reported_incident WHERE incidentStatus='success' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveHamb"],

			"polonnaruwa" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActivePolo FROM reported_incident WHERE incidentStatus='success' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActivePolo"],

			"anuradhapura" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveAnu FROM reported_incident WHERE incidentStatus='success' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveAnu"],
			"ampara" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveAmpara FROM reported_incident WHERE incidentStatus='success' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveAmpara"]
		];

		//get number of all unsuccess cases district by district
		$numOfUnSuccessCasesByDistrict = [
			"hambanthota" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveHamb FROM reported_incident WHERE incidentStatus='unsuccess' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveHamb"],

			"polonnaruwa" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActivePolo FROM reported_incident WHERE incidentStatus='unsuccess' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActivePolo"],

			"anuradhapura" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveAnu FROM reported_incident WHERE incidentStatus='unsuccess' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveAnu"],
			"ampara" => (($this->db->runQuery("SELECT COUNT(*) AS numOfActiveAmpara FROM reported_incident WHERE incidentStatus='unsuccess' AND village_code IN (SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND gn_division.GND_Code=village.GND_Code )"))[0])["numOfActiveAmpara"]
		];


		//total number of active cases in district by categories
		$totalCasesReportedByDistrict = [

			"hambanthotaActive" => ($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfHambanthotaCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfHambanthotaAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfHambanthotaBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfHambanthotaAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfHambanthotaIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfHambanthotaElephantsVillage FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'"))[0],


			"noOfHambanthotaActive" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfHambanthotaActive' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'  "))[0])['noOfHambanthotaActive'],

			"noOfHambanthotaSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfHambanthotaSuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='success'  "))[0])['noOfHambanthotaSuccess'],

			"noOfHambanthotaUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfHambanthotaUnsuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='unsuccess'  "))[0])['noOfHambanthotaUnsuccess'],

			"polonnaruwaActive" => ($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfPolonnaruwaCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfPolonnaruwaAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfPolonnaruwaBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfPolonnaruwaAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfPolonnaruwaIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfPolonnaruwaElephantsVillage FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'"))[0],

			"noOfPolonnaruwaActive" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfPolonnaruwaActive' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'  "))[0])['noOfPolonnaruwaActive'],

			"noOfPolonnaruwaSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfPolonnaruwaSuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='success'  "))[0])['noOfPolonnaruwaSuccess'],

			"noOfPolonnaruwaUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfPolonnaruwaUnsuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='unsuccess'  "))[0])['noOfPolonnaruwaUnsuccess'],

			"anuradhapuraActive" => ($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfAnuradhapuraCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfAnuradhapuraAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfAnuradhapuraBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfAnuradhapuraAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfAnuradhapuraIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfAnuradhapuraElephantsVillage FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'"))[0],

			"noOfAnuradhapuraActive" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfAnuradhapuraActive' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'  "))[0])['noOfAnuradhapuraActive'],

			"noOfAnuradhapuraSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfAnuradhapuraSuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='success'  "))[0])['noOfAnuradhapuraSuccess'],

			"noOfAnuradhapuraUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfAnuradhapuraUnsuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='unsuccess'  "))[0])['noOfAnuradhapuraUnsuccess'],

			"amparaActive" => ($this->db->runQuery("SELECT COUNT(CASE WHEN reporttype='Crop Damages' THEN 1 END) AS numOfAmparaCropDamage,COUNT(CASE WHEN reporttype='Other Wild Animals are in The Village' THEN 1 END) AS numOfAmparaAnimalInVillage,COUNT(CASE WHEN reporttype='Breakdown of Elephant Fences' THEN 1 END) AS numOfAmparaBreakdownFence,COUNT(CASE WHEN reporttype='Wild Animal is in Danger' THEN 1 END) AS numOfAmparaAnimalIsDanger,COUNT(CASE WHEN reporttype='Illegal Happing' THEN 1 END) AS numOfAmparaIllegal,COUNT(CASE WHEN reporttype='Elephants are in The Village' THEN 1 END) AS numOfAmparaElephantsVillage FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'"))[0],

			"noOfAmparaActive" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfAmparaActive' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'  "))[0])['noOfAmparaActive'],

			"noOfAmparaSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfAmparaSuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='success'  "))[0])['noOfAmparaSuccess'],

			"noOfAmparaUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS 'noOfAmparaUnsuccess' FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='unsuccess'  "))[0])['noOfAmparaUnsuccess']


		];


		//elephant attack active cases details
		$elephantActiveDetails = ($this->db->runQuery("SELECT reported_incident.incidentID AS incidentID,reported_incident.villager_NIC AS reporter_NIC,village.name AS village,reported_incident.officeNo AS officeNo,reported_incident.date AS date FROM village,reported_incident WHERE reported_incident.reporttype='Elephants are in The Village' AND reported_incident.incidentStatus='pending' AND reported_incident.village_code=village.village_code"));
		//crop damages active cases details
		$cropActiveDetails = ($this->db->runQuery("SELECT reported_incident.incidentID AS incidentID,reported_incident.villager_NIC AS reporter_NIC,village.name AS village,reported_incident.officeNo AS officeNo,reported_incident.date AS date FROM village,reported_incident WHERE reported_incident.reporttype='Crop Damages' AND reported_incident.incidentStatus='pending' AND reported_incident.village_code=village.village_code"));
		//wild animal is in danger cases details
		$dangerActiveDetails = ($this->db->runQuery("SELECT reported_incident.incidentID AS incidentID,reported_incident.villager_NIC AS reporter_NIC,village.name AS village,reported_incident.officeNo AS officeNo,reported_incident.date AS date FROM village,reported_incident WHERE reported_incident.reporttype='Wild Animal is in Danger' AND reported_incident.incidentStatus='pending' AND reported_incident.village_code=village.village_code"));
		//elephant fence damage active cases details
		$fenceActiveDetails = ($this->db->runQuery("SELECT reported_incident.incidentID AS incidentID,reported_incident.villager_NIC AS reporter_NIC,village.name AS village,reported_incident.officeNo AS officeNo,reported_incident.date AS date FROM village,reported_incident WHERE reported_incident.reporttype='Breakdown of Elephant Fences' AND reported_incident.incidentStatus='pending' AND reported_incident.village_code=village.village_code"));
		//other wild animals come in to village active cases details
		$otherActiveDetails = ($this->db->runQuery("SELECT reported_incident.incidentID AS incidentID,reported_incident.villager_NIC AS reporter_NIC,village.name AS village,reported_incident.officeNo AS officeNo,reported_incident.date AS date FROM village,reported_incident WHERE reported_incident.reporttype='Other Wild Animals are in The Village' AND reported_incident.incidentStatus='pending' AND reported_incident.village_code=village.village_code"));
		//illegal activities active cases details
		$illegalActiveDetails = ($this->db->runQuery("SELECT reported_incident.incidentID AS incidentID,reported_incident.villager_NIC AS reporter_NIC,village.name AS village,reported_incident.officeNo AS officeNo,reported_incident.date AS date FROM village,reported_incident WHERE reported_incident.reporttype='Illegal Happing' AND reported_incident.incidentStatus='pending' AND reported_incident.village_code=village.village_code"));
		//number of incidents
		$detailsAboutIncidents = [
			"totalIncident" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM reported_incident"))[0])['total'],
			"totalSuccessIncident" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM reported_incident WHERE incidentStatus='success'"))[0])['total'],
			"totalActiveIncident" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM reported_incident WHERE incidentStatus='pending'"))[0])['total'],
			"totalUnsuccessIncident" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM reported_incident WHERE incidentStatus='unsuccess'"))[0])['total'],
			"totalAccpted" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM work"))[0])['total'],
			"acceptedActive" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM work WHERE incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='pending')"))[0])['total'],
			"acceptedSuccess" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM work WHERE incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='success')"))[0])['total'],
			"acceptedUnsuccess" => (($this->db->runQuery("SELECT COUNT(*) AS total FROM work WHERE incidentID IN(SELECT incidentID FROM reported_incident WHERE incidentStatus='unsuccess')"))[0])['total'],


		];


		$activeMapLocation = ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE incidentStatus='pending'"));
		$successMapLocation = ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE incidentStatus='success'"));
		$unsuccessMapLocation = ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE incidentStatus='unsuccess'"));

		$districtActiveLocation = [

			"hambanthota" => ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='hambanthota' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'")),
			"polonnaruwa" => ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='polonnaruwa' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'")),
			"anuradhapura" => ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='anuradhapura' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'")),
			"ampara" => ($this->db->runQuery("SELECT incidentID,lat,lon,reporttype,villager_NIC,description FROM reported_incident WHERE village_code IN(SELECT village.village_code FROM village,gn_division WHERE gn_division.district_name='ampara' AND village.GND_Code=gn_division.GND_Code) AND incidentStatus='pending'"))


		];

		$noOfVillagers = (($this->db->runQuery("SELECT COUNT(*) AS noOfVillagers FROM user WHERE jobType='villager'"))[0])['noOfVillagers'];
		$noOfWildlifers = (($this->db->runQuery("SELECT COUNT(*) AS noOfWildlifers FROM user WHERE jobType='wildlife officer'"))[0])['noOfWildlifers'];
		$noOfRegionals = (($this->db->runQuery("SELECT COUNT(*) AS noOfRegionals FROM user WHERE jobType='regional officer'"))[0])['noOfRegionals'];
		$noOfVeterinarians = (($this->db->runQuery("SELECT COUNT(*) AS noOfVeterinarians FROM user WHERE jobType='veterinarian'"))[0])['noOfVeterinarians'];
		$noOfGramaNiladhari = (($this->db->runQuery("SELECT COUNT(*) AS noOfGramaNiladhari FROM user WHERE jobType='grama niladhari'"))[0])['noOfGramaNiladhari'];


		//all selected data pass to the controller
		$data = [

			"activeCases" => $activeCases,
			"successCases" => $successCases,
			"unSuccessCases" => $unSuccessCases,
			"numOfActiveCasesByDistrict" => $numOfActiveCasesByDistrict,
			"numOfSuccessCasesByDistrict" => $numOfSuccessCasesByDistrict,
			"numOfUnSuccessCasesByDistrict" => $numOfUnSuccessCasesByDistrict,
			"totalCasesReportedByDistrict" => $totalCasesReportedByDistrict,
			"activeMapLocation" => $activeMapLocation,
			"successMapLocation" => $successMapLocation,
			"unsuccessMapLocation" => $unsuccessMapLocation,
			"districtActiveLocation" => $districtActiveLocation,
			"elephantActiveDetails" => $elephantActiveDetails,
			"cropActiveDetails" => $cropActiveDetails,
			"dangerActiveDetails" => $dangerActiveDetails,
			"fenceActiveDetails" => $fenceActiveDetails,
			"otherActiveDetails" => $otherActiveDetails,
			"illegalActiveDetails" => $illegalActiveDetails,
			"detailsAboutIncidents" => $detailsAboutIncidents,
			"noOfVillagers" => $noOfVillagers,
			"noOfWildlifers" => $noOfWildlifers,
			"noOfRegionals" => $noOfRegionals,
			"noOfVeterinarians" => $noOfVeterinarians,
			"noOfGramaNiladhari" => $noOfGramaNiladhari













		];

		return $data;
	}

	public function getPhoneNumbersForNotice($village, $gnDivision, $district, $province, $jobType)
	{

		$village_code = (($this->db->runQuery("SELECT village.village_code FROM village,gn_division,district,province WHERE province.Name='$province' AND district.Name='$district' AND gn_division.name='$gnDivision' AND village.name='$village'"))[0])["village_code"];

		$officeNo = (($this->db->runQuery("SELECT officeNo FROM village WHERE village_code='$village_code'"))[0])["officeNo"];

		switch ($jobType) {
			case "villager":
				return ($this->db->runQuery("SELECT DISTINCT user.mobileNo AS mobile FROM lives,user WHERE lives.village_code='$village_code' AND lives.villager_NIC=user.NIC  "));
				break;
			case "gramaNiladhari":
				return ($this->db->runQuery("SELECT DISTINCT user.mobileNo AS mobile FROM lives,user WHERE lives.village_code='$village_code' AND lives.gramaniladhari_NIC=user.NIC "));
				break;
			case "wildlifeOfficer":
				return ($this->db->runQuery("SELECT DISTINCT user.mobileNo AS mobile FROM wildlife_officer,user WHERE wildlife_officer.officeNo='$officeNo' AND wildlife_officer.NIC=user.NIC"));
				break;
			case "wildlifeOfficer":
				return ($this->db->runQuery("SELECT DISTINCT user.mobileNo AS mobile FROM wildlife_officer,user WHERE wildlife_officer.officeNo='$officeNo' AND wildlife_officer.NIC=user.NIC"));
				break;
			case "regionalOfficer":
				return ($this->db->runQuery("SELECT DISTINCT user.mobileNo AS mobile FROM regional_officer,user WHERE regional_officer.officeNo='$officeNo' AND regional_officer.NIC=user.NIC"));
				break;
			case "veterinarian":
				return ($this->db->runQuery("SELECT DISTINCT user.mobileNo AS mobile FROM veterinarian,user WHERE veterinarian.officeNo='$officeNo' AND veterinarian.NIC=user.NIC"));
				break;
		}
	}


	public function activeElephantAttack()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='pending' AND reported_incident.reporttype='Elephants are in The Village'");
	}
	public function successElephantAttack()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='success' AND reported_incident.reporttype='Elephants are in The Village'");
	}
	public function unsuccessElephantAttack()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='unsuccess' AND reported_incident.reporttype='Elephants are in The Village'");
	}



	public function activeAnimalsInVillage()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='pending' AND reported_incident.reporttype='Other Wild Animals are in The Village'");
	}
	public function successAnimalsInVillage()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='success' AND reported_incident.reporttype='Other Wild Animals are in The Village'");
	}
	public function unsuccessAnimalsInVillage()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='unsuccess' AND reported_incident.reporttype='Other Wild Animals are in The Village'");
	}


	public function activeAnimalIsInDanger()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='pending' AND reported_incident.reporttype='Wild Animal is in Danger'");
	}
	public function successAnimalIsInDanger()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='success' AND reported_incident.reporttype='Wild Animal is in Danger'");
	}
	public function unsuccessAnimalIsInDanger()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='unsuccess' AND reported_incident.reporttype='Wild Animal is in Danger'");
	}



	public function activeIllegalActivities()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='pending' AND reported_incident.reporttype='Illegal Happing'");
	}

	public function successIllegalActivities()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='success' AND reported_incident.reporttype='Illegal Happing'");
	}
	public function unsuccessIllegalActivities()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='unsuccess' AND reported_incident.reporttype='Illegal Happing'");
	}

	public function activeCropDamages()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='pending' AND reported_incident.reporttype='Crop Damages'");
	}
	public function successCropDamages()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='success' AND reported_incident.reporttype='Crop Damages'");
	}
	public function unsuccessCropDamages()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='unsuccess' AND reported_incident.reporttype='Crop Damages'");
	}

	public function activeFenceDamages()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='pending' AND reported_incident.reporttype='Breakdown of Elephant Fences'");
	}
	public function successFenceDamages()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='success' AND reported_incident.reporttype='Breakdown of Elephant Fences'");
	}
	public function unsuccessFenceDamages()
	{
		return $this->db->runQuery("SELECT DISTINCT reported_incident.incidentID AS incidentID,village.name AS village,reported_incident.villager_NIC AS NIC,user.Fname AS name,reported_incident.date AS date,reported_incident.time_in AS time,reported_incident.incidentStatus AS status,reported_incident.lat AS lat,reported_incident.lon AS lon FROM reported_incident,user,village WHERE user.NIC=reported_incident.villager_NIC AND village.village_code=reported_incident.village_code AND reported_incident.incidentStatus='unsuccess' AND reported_incident.reporttype='Breakdown of Elephant Fences'");
	}

	public function getDetails($nic)
	{
		$adminNIC = (($this->db->runQuery("SELECT NIC FROM user WHERE jobType='admin'"))[0])["NIC"];
		if ($nic == $adminNIC) {
			return ($this->db->runQuery("SELECT * FROM user where NIC='$nic'"))[0];
		}
	}

	public function getCurrentPassword($nic)
	{
		return (($this->db->runQuery("SELECT userPassword FROM login WHERE userName='$nic'"))[0])["userPassword"];
	}

	public function changeAdminPassword($newPassword, $nic)
	{
		$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
		$this->db->runQuery("UPDATE login SET userPassword='$hashedPassword' WHERE userName='$nic' ");
	}

	public function getVillagerDataToEdit($nic)
	{
		return ($this->db->runQuery("SELECT * FROM user WHERE NIC='$nic'"))[0];
	}

	// public function editVillager($data)
	// {   $nic = $data["nic"];
	// 	$fname = $data["fName"];
	// 	$lname = $data["lName"];
	// 	$mob = $data["mob"];
	// 	$dob = $data["dob"];
	// 	$address = $data["address"];
	// 	$userType="villager";
	// 	$oldNIC=$data["oldNIC"];
	// 	$email = $data["email"];
	// 	$gender = $data["gender"];


	//  $this->db->runQuery("DELETE FROM user WHERE NIC='$oldNIC'");
	//   $lastNoticeID=(($this->db->runQuery("SELECT MAX(noticeID) AS max FROM notice "))[0])["max"];
	//  $this->db->runQuery("INSERT INTO user VALUES('$nic','$fname','$lname','$mob','$dob','$address','$userType','$email','$gender','$lastNoticeID')");
	//  header("location :../admin/editVillager?success=success");

	// }

	public function getIncidentDetailsForMap($id)
	{
	$details=($this->db->runQuery("SELECT * FROM reported_incident WHERE incidentID='$id'"))[0];
   
  
	$content="<div id='info'><h1>".$details["date"]." ".$details["time_in"]."</h1><p>".$details["description"]."</p><h3>".$details["incidentStatus"]."</h3></div>";
	return $content;
	}



}
