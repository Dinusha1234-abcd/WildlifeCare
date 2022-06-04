<?php
class user_model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getData($villager_NIC)
    {
        return $this->db->runQuery("SELECT * from user INNER JOIN villager_registration ON user.villager_NIC = villager_registration.villager_NIC WHERE user.villager_NIC='$villager_NIC'");
    }

    function selectData($userName)
    {
        return $this->db->runQuery("SELECT * from user WHERE NIC= '$userName'");
    }

    public function login($username, $password)
    {

        //create associative array to store login details
        $loginData = [

            "Fname" => "",
            "Lname" => "",
            "NIC" => "",
            "jobtype" => "",
            "Error" => ""


        ];
        $stmt = "SELECT * FROM Login WHERE userName='$username'";
        $row = $this->db->runQuery($stmt);
        //everyone has unique username.
        if (!empty($row))
            $row = $row[0];
        if (!empty($row)) {
            $hashPassword = $row["userPassword"];
            //compare passwrd in db and passrwd given by user
            if (password_verify($password, $hashPassword)) {
                //if passwrd correct then store user details in array
                $stmt = "SELECT * FROM user WHERE NIC='$username'";
                $row = $this->db->runQuery($stmt)[0];
                $loginData["Fname"] = $row["Fname"];
                $loginData["Lname"] = $row["Lname"];
                $loginData["NIC"] = $row["NIC"];
                $loginData["jobtype"] = $row["jobType"];
           

                return $loginData;
            } else {
                //if passwrd wrong then store error and return
                $loginData["Error"] = "Wrong password!! Please try again..";
                return $loginData;
            }
        } else {
            //if there is no user in that user name then store error and return
            $loginData["Error"] = "Wrong username!! Please try again..";
            return $loginData;
        }
    }

    public function resetPasswordStore($userName, $selector, $token, $url, $expire)
    {

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        //get user email
        $email = (($this->db->runQuery("SELECT email FROM user WHERE NIC='$userName'"))[0])["email"];
        if (!empty($email)) {
            //insert reset passwrd details to table. if there is any old details then delete.
            $stmt1 = "DELETE FROM reset_password WHERE resetUserName='$userName'";
            $this->db->runQuery($stmt1);

            $stmt2 = "INSERT INTO reset_password (resetEmail,resetUserName,resetSelector,resetToken,resetExpire) VALUES('$email','$userName','$selector','$hashedToken','$expire') ";
            $this->db->runQuery($stmt2);

            return $email;
        }
    }

    public function resetPassword($nic, $password, $selector, $validator)
    {

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $row = ($this->db->runQuery("SELECT * FROM reset_password WHERE resetUserName='$nic'"))[0];
        if (!empty($row)) {
            $validatorBin = hex2bin($validator); //validator convert to binary
            if (password_verify($validatorBin, $row["resetToken"])) { //check validator is same as store in db

                $this->db->runQuery("UPDATE login SET userPassword='$hashPassword' WHERE userName='$nic'");
                return true; //return true after update user passwrd

            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function emergencyReport($id, $noOfelephant, $placeStatus, $photo, $place, $latitude, $longitude)
    {
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s");
        $date = date("Y-m-d");
        $villagers = $this->db->runQuery("SELECT   villager_NIC AS villagerNIC FROM lives  WHERE  	gramaniladhari_NIC= (SELECT 	gramaniladhari_NIC FROM lives WHERE villager_NIC= '$id') ");
        $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC= '$id' ), (SELECT `NIC` FROM `villager` WHERE NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Elephants are in The Village' )");
        $this->db->runQuery("INSERT INTO `elephants_in_village`(`incidentID`, `In Your Registered Village`, `no_of_elephants`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),'$placeStatus','$noOfelephant')");
          $GND = $this->db->runQuery("SELECT GND FROM grama_niladhari WHERE NIC = (SELECT 	gramaniladhari_NIC FROM lives WHERE villager_NIC= '$id')  ");
         foreach ($GND as $row) {
              $GNDcode = $row['GND'];
          }
          foreach ($villagers as $row) {

              $villagerNIC =  $row['villagerNIC'];
            
              $this->db->runQuery("UPDATE `alert` SET  `alertstatus`='notview'    WHERE GND= '$GNDcode' and NIC='$villagerNIC' ");
              $this->db->runQuery("UPDATE `alert` SET  `alertstatus`='view'    WHERE NIC= '$id' ");
          }
          if($_SESSION['jobtype']=='villager'){
            $districtVillage = $this->db->runQuery("SELECT district FROM lives WHERE villager_NIC='$id'");
          foreach ($districtVillage as $row){
             $district = $row['district'];
           }}else{
              
              $districtGramanildhari = $this->db->runQuery("SELECT district_name FROM gn_division WHERE GND_Code=(SELECT GND FROM grama_niladhari WHERE NIC='$id' )");
              foreach ($districtGramanildhari as $row){
                  $district = $row['district_name'];
               }}
          $this->db->runQuery("UPDATE `wildlifeofficernotification` INNER JOIN wildlife_officer ON wildlifeofficernotification.id=wildlife_officer.NIC INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo =wildlife_officer.officeNo SET wildlifeofficernotification.status='notview' WHERE  regional_wildlife_office.address='$district' ");   
          $this->db->runQuery("INSERT INTO `ratings`(`id`, `stars`, `comments`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),' ',' ')");    
    
      }
    public function getAlerStatus($NIC)
    {
        return $this->db->runQuery("SELECT `alertstatus` FROM `alert` WHERE NIC= '$NIC'");
    }

    public function getNotificationStatus($NIC)
    {
        return $this->db->runQuery("SELECT COUNT(*) AS numberofnotification FROM `notification` WHERE NIC= '$NIC' and`status`='notview'");
    }
    // >>>>>>> 342e2a17a5e07fda17b8620411c3cf0766b43c49
    public function setAlerStatus($NIC)
    {
        $this->db->runQuery("UPDATE `alert` SET  `alertstatus`='view'    WHERE NIC= '$NIC'");
    }
    public function  selectRegStatus($NIC)
    {
        return $this->db->runQuery("SELECT `registrationStatus` FROM `villager_registration` WHERE Villager_NIC= '$NIC'");
    }
    public function getEmail($NIC)
    {
        return $this->db->runQuery("SELECT email FROM user WHERE NIC = '$NIC' ");
    }
    public function getEmails($NIC)
    {
        // $gramanildhariDivision  =  $this->db->runQuery("SELECT ");
        return $this->db->runQuery("SELECT   user.email AS email FROM user INNER JOIN lives  ON user.NIC=lives.villager_NIC  INNER JOIN grama_niladhari ON lives.gramaniladhari_NIC=grama_niladhari.NIC  WHERE lives.gramaniladhari_NIC=(SELECT gramaniladhari_NIC FROM lives WHERE villager_NIC='$NIC') ");
    }
    public function getNumbers($NIC)
    {
        // $gramanildhariDivision  =  $this->db->runQuery("SELECT ");
        return $this->db->runQuery("SELECT   user.mobileNo AS numbers FROM user INNER JOIN lives  ON user.NIC=lives.villager_NIC  INNER JOIN grama_niladhari ON lives.gramaniladhari_NIC=grama_niladhari.NIC  WHERE lives.gramaniladhari_NIC=(SELECT gramaniladhari_NIC FROM lives WHERE villager_NIC='$NIC') ");
    }
    public function getwildlifeOfficerNotificationStatus($NIC)
    {
        return $this->db->runQuery("SELECT `status` AS notificationStatus FROM `wildlifeofficernotification` WHERE id='$NIC'");
    }

    public function getNotice($NIC){
        return $this->db->runQuery("SELECT * FROM notice WHERE district=(SELECT district_name  FROM gn_division INNER JOIN grama_niladhari ON gn_division.GND_Code = grama_niladhari.GND WHERE `NIC`='$NIC') ORDER BY noticeID DESC LIMiT 10");
    } 

    // public function setAlerStatus($NIC)
    // {
    //     $this->db->runQuery("UPDATE `alert` SET  `alertstatus`='view'    WHERE NIC= '$NIC'");
    // }

}
