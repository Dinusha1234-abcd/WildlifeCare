<?php
class gramaniladari_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function selectData($userName)
    {
        $details = $this->db->runQuery("SELECT * from user WHERE NIC= '$userName'");
        $office_no = $this->db->runQuery("SELECT officeNo from grama_niladari WHERE NIC= '$userName'");
        $no = $office_no[0]['officeNo'];
        $details[1] = $this->db->runQuery("SELECT address from regional_wildlife_office WHERE officeNo= '$no' ")[0]; //get district

        return $details;
    }    
    public function getName($id){
        return $this->db->runQuery("SELECT * FROM user WHERE user.NIC ='$id'");
    }
    function selectCropdamage()
    {
        $details = $this->db->runQuery("SELECT * from crop_damage");

        return $details;
    }    
    public function getGramanildhariIncident($id ){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS gramanildhariIncident FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( ( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&(lives.villager_NIC='$id'))  ");
     } 
   
    public function getGramanildhariWildElephantArrivalIncident($id ){
         
        return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS gramanildhariIncidentWildElephantArrival FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((  reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Wild Elephant are in The Village')&&(lives.Villager_NIC='$id'))  ");
     }
     public function getGramanildhariWildAnimalsDangerIncident($id ){
         
        return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS gramanildhariIncidentWildAnimalsDanger FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((  reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Wild Animal Danger')&&(lives.Villager_NIC='$id'))  ");
     }
     public function getGramanildhariCropDamagesIncident($id ){
         
        return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS gramanildhariIncidentCropDamages FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((  reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Crop Damages')&&(lives.Villager_NIC='$id'))  ");
     }
     public function getGramanildhariIncidentacceptwildlifeOfficer($id ){
        return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS acceptwildlifeOfficer FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( ( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&(lives.villager_NIC='$id')&&( reported_incident.reporttype !='Crop Damages')&&(reported_incident.status = 'accept') ) ");
    }
    function updateData($userName, $data)
    {

        $fname = $data["fName"];
        $lname = $data["lName"];
        $dob = $data["dob"];
        $address = $data["address"];
        $mob = $data["mob"];
        $email = $data["email"];
        $office_address = $data["office_address"];
        $office_no = $this->db->runQuery("SELECT officeNo from regional_wildlife_office WHERE address= '$office_address'")[0]['officeNo'];


    }

    public function getVillagerIncidentacceptGramaseweka($id ){
         
        return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS acceptGramaseweka FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((  reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Crop Damages')&&(reported_incident.status = 'accept')&&(lives.Villager_NIC='$id'))  ");
     }
     
     public function getlastincident($id){
         return  $this->db->runQuery( "SELECT * FROM reported_incident WHERE reported_incident.villager_NIC = '$id'  ORDER BY incidentID DESC LIMIT 1   ");
     }
     public function profileData($gramanildhariId){
        return $this->db->runQuery("SELECT * FROM `user` WHERE NIC ='$gramanildhariId' ");
     }
     
 
     public function getProvince($gramanildhariId){
        return $this->db->runQuery("SELECT province FROM lives WHERE gramaniladhari_NIC= '$gramanildhariId'");
    }
     public function getDistrict($gramanildhariId){
         return $this->db->runQuery("SELECT district FROM lives WHERE gramaniladhari_NIC= '$gramanildhariId'");
     }
     public function getGramaniladhariDivision($gramanildhariId){
        return $this->db->runQuery("SELECT  gn_division.name FROM gn_division INNER JOIN grama_niladhari ON gn_division.GND_Code = grama_niladhari.GND  WHERE grama_niladhari.NIC='$gramanildhariId' ");

    }
    public function getHashPassword($gramanildhariId){
        return $this->db->runQuery("SELECT userPassword FROM `login` WHERE userName= '$gramanildhariId'");
    }
    function getdatalimit($start,$rowsPer){
        return $this->db->runQuery("SELECT * FROM `reported_incident`    WHERE  reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now() LIMIT {$start} , {$rowsPer}");

    }
     function getReportrows($gramanildhariId){
         return $this->db->runQuery("SELECT count(reported_incident.incidentID) AS total_rows FROM `reported_incident` INNER JOIN  `crop_damage` ON reported_incident.incidentID = crop_damage.incidentID   WHERE (reported_incident.gramaniladari_NIC='$gramanildhariId')&& ( reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ");

     }
    function getData(){
        return $this->db->runQuery("SELECT * FROM   `reported_incident` WHERE ( reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ");
        
    }
    function getCropDamagesReview($gramanildhariId){
        return $this->db->runQuery("SELECT * FROM `reported_incident` INNER JOIN  `crop_damage` ON reported_incident.incidentID = crop_damage.incidentID  WHERE reported_incident.gramaniladari_NIC='$gramanildhariId' ");
    }
    public function getreport($incidentID){
        return $this->db->runQuery("SELECT * FROM `reported_incident` INNER JOIN  `crop_damage` ON reported_incident.incidentID = crop_damage.incidentID  WHERE reported_incident.incidentID='$incidentID' ");
   }
    public function updateStatusSucessful($incidentId,$description){
       $this->db->runQuery("UPDATE `reported_incident` SET  reported_incident.status ='success'  WHERE   incidentID = '$incidentId' ");
       $this->db->runQuery("UPDATE `crop_damage` SET  crop_damage.message ='$description'  WHERE  incidentID = '$incidentId' "); 
    } 
    public function updateStatusUnSucessful($incidentId,$description){
        $this->db->runQuery("UPDATE `reported_incident` SET  reported_incident.status ='unsuccess'  WHERE   incidentID = '$incidentId' ");
        $this->db->runQuery("UPDATE `crop_damage` SET  crop_damage.message ='$description'  WHERE  incidentID = '$incidentId' "); 
     } 
    public function getVillgerRows($gramanildhariId){
         return $this->db->runQuery("SELECT count(lives.Villager_NIC) AS total_rows FROM `lives` INNER JOIN  `villager_registration` ON villager_registration.Villager_NIC= lives.Villager_NIC WHERE lives.gramaniladhari_NIC='$gramanildhariId' ");
    }
    public function getVillgerdataLimit($gramanildhariId,$start,$rowsPer){
        return $this->db->runQuery("SELECT  *  FROM `lives` INNER JOIN  `villager_registration` ON villager_registration.Villager_NIC= lives.Villager_NIC WHERE lives.gramaniladhari_NIC='$gramanildhariId'  LIMIT {$start} , {$rowsPer}");
     }
     public function getVillgerReview($gramanildhariId){
        return $this->db->runQuery("SELECT * FROM user INNER JOIN  lives ON user.NIC= lives.Villager_NIC INNER JOIN `villager_registration` ON  lives.Villager_NIC=villager_registration.Villager_NIC  WHERE lives.gramaniladhari_NIC='$gramanildhariId' ");
   }
   function updateStatusSucessfulRegister($villager_NIC){
    $this->db->runQuery("UPDATE `villager_registration` SET  villager_registration.registrationStatus ='accept'  WHERE  villager_registration.Villager_NIC = '$villager_NIC' "); 
   }
   function updateStatusUnSucessfulRegister($villager_NIC){
    $this->db->runQuery("UPDATE `villager_registration` SET  villager_registration.registrationStatus ='notaccept'  WHERE  villager_registration.Villager_NIC = '$villager_NIC' "); 
    }
    public function getVillger($gramanildhariId,$villagerNic){
        return $this->db->runQuery("SELECT * FROM user INNER JOIN  lives ON user.NIC= lives.Villager_NIC INNER JOIN `villager_registration` ON  lives.Villager_NIC=villager_registration.Villager_NIC  WHERE lives.gramaniladhari_NIC='$gramanildhariId' and lives.Villager_NIC='$villagerNic' ");
   }
    public function getAlerStatus($NIC){
        return $this->db->runQuery("SELECT `alertstatus` FROM `alert` WHERE NIC= '$NIC'");
    }
    public function getNotificationStatus($NIC){
        return $this->db->runQuery("SELECT COUNT(*) AS numberofnotification FROM `notification` WHERE NIC= '$NIC' and`status`='notview'");
    }
    public function getNotification($NIC){
        return $this->db->runQuery("SELECT * FROM `notification` WHERE NIC= '$NIC' ORDER BY `no` DESC  LIMIT 10");
    }
    public function setNotificationStatus($NIC){
        $getnumbers = $this->db->runQuery("SELECT `no` AS numbers FROM `notification` WHERE NIC= '$NIC'");
        foreach  ($getnumbers AS $row){
             $number = $row['numbers'];
             $this->db->runQuery("UPDATE `notification` SET  `status`='view'  WHERE `no`= $number ");

        }
 
        
    }
    public function updateprofile($NIC,$fname,$lname,$dob,$address,$newPassword ){
        $this->db->runQuery("UPDATE `user` SET  `Fname`='$fname',`Lname`='$lname',`BOD`='$dob',`Address`='$address' WHERE `NIC`= '$NIC' ");
        $password = password_hash($newPassword,PASSWORD_DEFAULT);
        $this->db->runQuery("UPDATE `login` SET  `userPassword`= '$password'  WHERE `userName`= '$newPassword' ");
         
    }
    public function getNotice($NIC){
        return $this->db->runQuery("SELECT * FROM notice WHERE district=(SELECT district_name  FROM gn_division INNER JOIN grama_niladhari ON gn_division.GND_Code = grama_niladhari.GND WHERE `NIC`='$NIC') ORDER BY noticeID DESC LIMiT 10");
    } 
     
 }