<?php

class Wildlifeofficer_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	//get data of users according to the username
	function selectData($userName)
	{
		$details = $this->db->runQuery("SELECT * from user WHERE NIC= '$userName'");
		$office_no = $this->db->runQuery("SELECT officeNo from wildlife_officer WHERE NIC= '$userName'");
		$no = $office_no[0]['officeNo'];
		$details[1] = $this->db->runQuery("SELECT address from regional_wildlife_office WHERE officeNo= '$no' ")[0]; //get district

		return $details;
	}

	//get data of reported incident according to users district
	function selectIncidentData()
	{
		$nic = $_SESSION['NIC'];
		$data3 = $this->db->runQuery("SELECT * FROM reported_incident order by date desc");
		$data1 = $this->db->runQuery("SELECT reported_incident.incidentID,reported_incident.date,reported_incident.Place,reported_incident.reporttype,reported_incident.status,reported_incident.vetStatus,reported_incident.incidentStatus,reported_incident.sendToVetStatus,reported_incident.officeNo,reported_incident.description,user.Fname,user.Lname,user.NIC FROM reported_incident LEFT OUTER JOIN work ON reported_incident.incidentID= work.incidentID LEFT OUTER JOIN user ON user.NIC=work.wildlife_NIC  WHERE reported_incident.officeNo=(SELECT wildlife_officer.officeNo FROM wildlife_officer WHERE wildlife_officer.NIC='$nic') order by date desc");
		$data2 = $this->db->runQuery("SELECT reported_incident.incidentID,reported_incident.date,reported_incident.Place,reported_incident.reporttype,reported_incident.status,reported_incident.vetStatus,reported_incident.incidentStatus,reported_incident.sendToVetStatus,reported_incident.officeNo,reported_incident.description,user.Fname,user.Lname,user.NIC FROM reported_incident LEFT OUTER JOIN work ON reported_incident.incidentID= work.incidentID LEFT OUTER JOIN user ON user.NIC=work.vet_NIC WHERE reported_incident.officeNo=(SELECT wildlife_officer.officeNo FROM wildlife_officer WHERE wildlife_officer.NIC='$nic') order by date desc");

		return [$data1, $data2, $data3];
	}
	//get the full details about one reported incident 
	public function selectIncidentDataEx($id)
	{
		$data3 = $this->db->runQuery("SELECT * FROM reported_incident LEFT OUTER JOIN  user ON user.NIC=reported_incident.gramaniladari_NIC where reported_incident.incidentID='$id'");
		$data4 = $this->db->runQuery("SELECT * FROM reported_incident LEFT OUTER JOIN  user ON user.NIC=reported_incident.villager_NIC where reported_incident.incidentID='$id' ");
		$data1 = $this->db->runQuery("SELECT reported_incident.incidentID,reported_incident.lat,reported_incident.lon,reported_incident.date,reported_incident.Place,reported_incident.reporttype,reported_incident.status,reported_incident.vetStatus,reported_incident.incidentStatus,reported_incident.sendToVetStatus,reported_incident.officeNo,reported_incident.description,user.Fname,user.Lname,user.NIC FROM reported_incident LEFT OUTER JOIN work ON reported_incident.incidentID= work.incidentID LEFT OUTER JOIN user ON user.NIC=work.wildlife_NIC where reported_incident.incidentID='$id' ");
		$data2 = $this->db->runQuery("SELECT reported_incident.incidentID,reported_incident.date,reported_incident.Place,reported_incident.reporttype,reported_incident.status,reported_incident.vetStatus,reported_incident.incidentStatus,reported_incident.sendToVetStatus,reported_incident.officeNo,reported_incident.description,user.Fname,user.Lname,user.NIC FROM reported_incident LEFT OUTER JOIN work ON reported_incident.incidentID= work.incidentID LEFT OUTER JOIN user ON user.NIC=work.vet_NIC where reported_incident.incidentID='$id'");
		return [$data1, $data2, $data3, $data4];
	}
	//get the district of wildlife officer
	public function selectDistrictWildifeOfficer($nic)
	{
		return $this->db->runQuery("SELECT regional_wildlife_office.address from wildlife_officer left outer join regional_wildlife_office on wildlife_officer.officeNo=regional_wildlife_office.officeNo where wildlife_officer.NIC='$nic'");
	}
	//update the user profile
	function updateData($userName, $data)
	{

		$fname = $data["fName"];
		$lname = $data["lName"];

		$address = $data["address"];
		$mob = $data["mob"];
		$email = $data["email"];
		$office_address = $data["office_address"];
		$office_no = $this->db->runQuery("SELECT officeNo from regional_wildlife_office WHERE address= '$office_address'")[0]['officeNo'];

		$stmt1 = "UPDATE user SET  Fname='$fname', Lname='$lname', mobileNo='$mob',Address='$address',email='$email' WHERE NIC= '$userName'";
		$stmt2 = "UPDATE wildlife_officer SET officeNo='$office_no' WHERE NIC='$userName'";


		$result[0] = $this->db->runQuery($stmt1);

		$result[1] = $this->db->runQuery($stmt2);

		return $result;
	}
	//update the wildlife officer status of a incident
	public function incidentStatUpdate($state, $ID, $nic)
	{
		if ($state == 'success') {

			$stmt2 = "UPDATE reported_incident SET status='$state' WHERE incidentID='$ID'; INSERT INTO work (wildlife_NIC,incidentID) VALUES('$nic','$ID')";
		} else {
			$stmt2 = "UPDATE reported_incident SET status='$state' WHERE incidentID='$ID'; DELETE from  work  WHERE incidentID='$ID' ";
		}


		$result1 = $this->db->runQuery($stmt2);

		return $result1;
	}
	//send incident data to the veterinarian
	public function sendToVetData($ID)
	{
		$stmt2 = "UPDATE reported_incident SET sendToVetStatus='visible' WHERE incidentID='$ID'";
		$result = $this->db->runQuery($stmt2);
		return $result;
	}
	//select last 8 notice data
	function selectNotificationsData()
	{
		$details = $this->db->runQuery("SELECT * from notice WHERE jobType='wildlifeOfficer' order by date,time desc LIMIT 8");;
		return $details;
	}
	//select all notices data
	function selectAllNotificationsData()
	{
		$details = $this->db->runQuery("SELECT * from notice WHERE jobType='wildlifeOfficer' order by date,time desc");

		return $details;
	}
	//update the final status of a incident
	function setIncidentStatus($ID, $state)
	{
		$stmt1 = "UPDATE reported_incident SET incidentStatus='$state' WHERE incidentID= '$ID'";
		$result = $this->db->runQuery($stmt1);
		return $result;
	}
	//update notifications when they are viewd 
	function updateNotification($NIC)
	{
		$this->db->runQuery("UPDATE wildlifeofficernotification SET `status`='view' WHERE id='$NIC'");
	}
	//get notification status data wethaer they are viewd or not
	public function getwildlifeOfficerNotificationStatus($NIC)
	{
		return $this->db->runQuery("SELECT `status` AS notificationStatus FROM `wildlifeofficernotification` WHERE id='$NIC'");
	}






	//get location details of the incidents
	public function selectLocation($district)
	{
		return $this->db->runQuery("SELECT reported_incident.lat,reported_incident.lon,reported_incident.Place,reported_incident.reporttype  FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now()))");
	}
	//get wildlife officer district
	public function getWildLifeDistrict($nic)
	{
		return $this->db->runQuery("SELECT regional_wildlife_office.address as district_name from wildlife_officer left outer join regional_wildlife_office on wildlife_officer.officeNo=regional_wildlife_office.officeNo where wildlife_officer.NIC='$nic'");
	}
	//get lastweek incidents count
	public function lastWeek()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS lastWeek FROM reported_incident  WHERE `date`  between date_sub(now(),INTERVAL 7 DAY ) and now()");
	}
	//get lastmonth incidents count
	public function lastMonth()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS lastMonth FROM reported_incident  WHERE `date`  between date_sub(now(),INTERVAL 1 MONTH) and now() ");
	}
	//get last24 hours incidents count
	public function last24Hours()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS last24Hours FROM reported_incident  WHERE `date`  between date_sub(now(),INTERVAL 1 DAY ) and now(); ");
	}
	//count of wild elephant arrivals
	public function countWildElephantArrival()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS countWildElephantArrival FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Wild Elephant are in The Village')");
	}
	//count of wild animal arrivals
	public function countWildAnimalArrival()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS countWildAnimalArrival FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Other Wild Animals are in The Village')");
	}
	//count of elephant fence damages
	public function countElephantFence()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS countElephantFence FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Breakdown of Elephant Fence')");
	}
	//count of crop damages
	public function countcropDamages()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS countcropDamages   FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Crop Damages')");
	}
	//count of other incidents
	public function countOthers()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		return $this->db->runQuery("SELECT COUNT(incidentID) AS countOthers FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&(( `reporttype`='Illegal Thing happening the Forest')||( `reporttype`='Wild Animal is in Danger'))");
	}
	//count of wildlife officers in the specific district
	public function countWildlifeOfficer($district)
	{
		return $this->db->runQuery("SELECT COUNT(wildlife_officer.NIC) AS wildlifeOfficer FROM wildlife_officer INNER JOIN regional_wildlife_office ON wildlife_officer.officeNo = regional_wildlife_office.officeNo WHERE regional_wildlife_office.address= '$district';");
	}
	//count of Gramaniladhari in the specific district
	public function countGramaniladhari($district)
	{
		return $this->db->runQuery("SELECT COUNT(grama_niladhari.NIC) AS gramaNiladhari  FROM grama_niladhari INNER JOIN gn_division ON grama_niladhari.GND = gn_division.GND_Code WHERE  gn_division.district_name= '$district'  ");
	}
	//count of Veterinarian in the specific district
	public function countVeterinarian($district)
	{

		return $this->db->runQuery("SELECT COUNT(veterinarian.NIC) AS veterinarian  FROM veterinarian INNER JOIN regional_wildlife_office ON veterinarian.officeNo = regional_wildlife_office.officeNo WHERE  regional_wildlife_office.address= '$district' ");
	}
	//count of registered villagers in the specific district
	public function countVillagers($district)
	{
		return $this->db->runQuery("SELECT COUNT(villager_NIC) AS villager  FROM lives WHERE   district= '$district'");
	}

	//count of each incidents according to the specific district
	public function countWildElephantArrivalDistrict($district)
	{

		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS WildElephantArrivalDistrict FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now())&&( reported_incident.reporttype ='Elephants are in The Village'));
		");
	}
	public function countcropDamagesDistrict($district)
	{
		return $this->db->runQuery("
		
		SELECT COUNT(reported_incident.incidentID) AS cropDamagesDistrict FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now())&&( reported_incident.reporttype ='Crop Damages'))
");
	}
	public function countIllegalThingDistrict($district)
	{
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS IllegalThing FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now())&&( reported_incident.reporttype ='Illegal Happening'));
	 ");
	}
	public function countElephantFenceDistrict($district)
	{
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS ElephantFence FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now())&&( reported_incident.reporttype ='Breakdown of Elephant Fences'))
		 ");
	}
	public function countWildAnimalDangerDistrict($district)
	{
		return $this->db->runQuery("
		
		SELECT COUNT(reported_incident.incidentID) AS WildAnimalDanger FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now())&&( reported_incident.reporttype ='Wild Animal is in Danger'));
");
	}
	public function countWildAnimalArrivalDistrict($district)
	{
		return $this->db->runQuery("
		
		SELECT COUNT(reported_incident.incidentID) AS WildAnimalArrival FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date between date_sub(now(),INTERVAL 3 MONTH) and now())&&( reported_incident.reporttype ='Other Wild Animals are in The Village'));
 ");
	}

	//count of all reported incidents in last 3 months

	public function countLast3MonthTotalIncident()
	{
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS totalincident FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE (reported_incident.date between date_sub(now(),INTERVAL 3 MONTH ) and now())
		");
	}
	//count of all reported incidents in last week
	public function countWeekincidentdistrict($district)
	{
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS incidentDistrictWeekly FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 7 DAY ) and now()))
		");
	}
	//count of all reported incidents in last month
	public function countMonthincidentdistrict($district)
	{
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS incidentDistrictMontly FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH ) and now()))
");
	}
	//count of all reported incidents in last 3 months according to the district
	public function countLast3Monthincidentdistrict($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS incidentDistrict3Monthly FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 3 MONTH ) and now()))");
	}

	//count of all incidents in last day
	public function countDayincidentdistrict($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS incidentDistrictDaily FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 DAY ) and now()))");
	}

	//count of incidents in each hour
	public function countIncident12AM($district)
	{
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS 12AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='23:00:00' && reported_incident.time_in <= '23:59:59' )");
	}
	public function countIncident01AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 01AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='00:00:00' && reported_incident.time_in <= '00:59:59' )");
	}
	public function countIncident02AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 02AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='01:00:00' && reported_incident.time_in <= '01:59:59' )");
	}
	public function countIncident03AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 03AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='02:00:00' && reported_incident.time_in <= '02:59:59' )");
	}
	public function countIncident04AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 04AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='03:00:00' && reported_incident.time_in <= '03:59:59' )");
	}
	public function countIncident05AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 05AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='04:00:00' && reported_incident.time_in <= '04:59:59' )");
	}
	public function countIncident06AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 06AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='05:00:00' && reported_incident.time_in <= '05:59:59' )");
	}
	public function countIncident07AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 07AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='06:00:00' && reported_incident.time_in <= '06:59:59' )");
	}
	public function countIncident08AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 08AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='07:00:00' && reported_incident.time_in <= '07:59:59' )");
	}
	public function countIncident09AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 09AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='08:00:00' && reported_incident.time_in <= '08:59:59' )");
	}
	public function countIncident10AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 10AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='09:00:00' && reported_incident.time_in <= '09:59:59' )");
	}
	public function countIncident11AM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 11AM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='10:00:00' && reported_incident.time_in <= '10:59:59' )");
	}
	public function countIncident12PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 12PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='11:00:00' && reported_incident.time_in <= '11:59:59' )");
	}
	public function countIncident01PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 01PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='12:00:00' && reported_incident.time_in <= '12:59:59' )");
	}
	public function countIncident02PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 02PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='13:00:00' && reported_incident.time_in <= '13:59:59' )");
	}
	public function countIncident03PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 03PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='14:00:00' && reported_incident.time_in <= '14:59:59' )");
	}
	public function countIncident04PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 04PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='15:00:00' && reported_incident.time_in <= '15:59:59' )");
	}
	public function countIncident05PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 05PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='16:00:00' && reported_incident.time_in <= '16:59:59' )");
	}
	public function countIncident06PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 06PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='17:00:00' && reported_incident.time_in <= '17:59:59' )");
	}
	public function countIncident07PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 07PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='18:00:00' && reported_incident.time_in <= '18:59:59' )");
	}
	public function countIncident08PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 08PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='19:00:00' && reported_incident.time_in <= '19:59:59' )");
	}
	public function countIncident09PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 09PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='20:00:00' && reported_incident.time_in <= '20:59:59' )");
	}
	public function countIncident10PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 10PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='21:00:00' && reported_incident.time_in <= '21:59:59' )");
	}
	public function countIncident11PM($district)
	{
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS 11PM FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ( (regional_wildlife_office.address= '$district')&&(reported_incident.date between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in >='22:00:00' && reported_incident.time_in <= '22:59:59' )");
	}







	//count of incidents in each month

	public function countIncidentJan($district)
	{
		$date = date("Y");
		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS Jan FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-01-01' and reported_incident.date<='$date-01-31'))
	");
	}
	public function countIncidentFeb($district)
	{

		$date = date("Y");

		return $this->db->runQuery("
		SELECT COUNT(reported_incident.incidentID) AS Feb FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-02-01' and reported_incident.date<='$date-02-29'))
	");
	}
	public function countIncidentMarch($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS March FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-03-01' and reported_incident.date<='$date-03-31'))");
	}
	public function countIncidentApril($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS April FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-04-01' and reported_incident.date<='$date-04-30'))");
	}
	public function countIncidentMay($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS May FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-05-01' and reported_incident.date<='$date-05-31'))");
	}
	public function countIncidentJune($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS June FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-06-01' and reported_incident.date<='$date-06-30'))");
	}
	public function countIncidentJuly($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS July FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-07-01' and reported_incident.date<='$date-07-31'))");
	}
	public function countIncidentAug($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS Aug FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-08-01' and reported_incident.date<='$date-08-31'))");
	}
	public function countIncidentSep($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS Sep FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-09-01' and reported_incident.date<='$date-09-30'))");
	}
	public function countIncidentOct($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS Oct FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-10-01' and reported_incident.date<='$date-10-31'))");
	}
	public function countIncidentNov($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS Nov FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-11-01' and reported_incident.date<='$date-11-30'))");
	}
	public function countIncidentDec($district)
	{
		$date = date("Y");
		return $this->db->runQuery("SELECT COUNT(reported_incident.incidentID) AS Dece FROM reported_incident INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo = reported_incident.officeNo WHERE ((regional_wildlife_office.address= '$district')&&( reported_incident.date>='$date-12-01' and reported_incident.date<='$date-12-31'))");
	}

	public function getLastNoticeId($NIC)
	{
		$lastNoticeId = (($this->db->runQuery("SELECT lastNoticeId FROM user WHERE NIC='$NIC'"))[0])["lastNoticeId"];
		return $lastNoticeId;
	}

	public function getUserOfficeNumber($NIC)
	{
		$officeNum = (($this->db->runQuery("SELECT officeNo FROM wildlife_officer WHERE NIC='$NIC'"))[0])["officeNo"];
		return $officeNum;
	}

	public function getNewNoticeDetails($officeNum, $lastNoticeId)
	{

		$newNoticeId = $this->db->runQuery("SELECT * FROM notice_has_wildlifeoffice_village WHERE officeNo='$officeNum' AND noticeID>'$lastNoticeId' AND jobType='wildlifeOfficer'");

		if (!empty($newNoticeId)) {
			$latestNoticeId = ($newNoticeId[0])["noticeID"];

			$detialsOfNotice = ($this->db->runQuery("SELECT * FROM notice WHERE noticeID='$latestNoticeId'"))[0];

			return $detialsOfNotice;
		} else
			return "No";
	}

	public function updateNotice($noticeId, $nic)
	{
		$this->db->runQuery("UPDATE user SET lastNoticeId='$noticeId' WHERE NIC='$nic'");
	}
}
