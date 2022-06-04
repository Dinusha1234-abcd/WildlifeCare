<?php 

class incident_model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function insertReport1($id, $noOfelephant, $placeStatus,$photo,$place , $latitude,$longitude){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s"); 
        $date = date("Y-m-d"); 
        $data = $this->db->runQuery("SELECT  `village_code`,`officeNo` FROM `village` WHERE grama_niladhari_NIC= '$id'" );
        foreach( $data as $row){
            $villagerCode = $row['village_code'];
            $officeNo = $row['officeNo'];  
        }
         if($_SESSION['jobtype']=='villager'){ 
              $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC= '$id' ), (SELECT `NIC` FROM `villager` WHERE NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Elephants are in The Village' )"); 
        }else{
             $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '', '$id' ,'$id' , '$villagerCode' ,$officeNo,  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Elephants are in The Village' )"); 
        } 
        $this->db->runQuery("INSERT INTO `elephants_in_village`(`incidentID`, `In Your Registered Village`, `no_of_elephants`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),'$placeStatus','$noOfelephant')");
        if($_SESSION['jobtype']=='villager'){
          $districtVillage = $this->db->runQuery("SELECT district FROM lives WHERE villager_NIC='$id'");
        foreach ($districtVillage as $row){
           $district = $row['district'];
        }}else{
            
            $districtGramanildhari = $this->db->runQuery("SELECT district_name FROM gn_division WHERE GND_Code=(SELECT GND FROM grama_niladhari WHERE NIC='$id' )");
            foreach ($districtGramanildhari as $row){
                $district = $row['district_name'];
             }
        }
        
         $this->db->runQuery("UPDATE `wildlifeofficernotification` INNER JOIN wildlife_officer ON wildlifeofficernotification.id=wildlife_officer.NIC INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo =wildlife_officer.officeNo SET wildlifeofficernotification.status='notview' WHERE  regional_wildlife_office.address='$district' ");   
         $this->db->runQuery("INSERT INTO `ratings`(`id`, `stars`, `comments`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),' ',' ')");    
    }
    function insertReport2($id,$animalType,$noOfanimal, $description,$photo,$place,$latitude,$longitude){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $data = $this->db->runQuery("SELECT  `village_code`,`officeNo` FROM `village` WHERE grama_niladhari_NIC= '$id'" );
        foreach( $data as $row){
            $villagerCode = $row['village_code'];
            $officeNo = $row['officeNo'];  
        }
        if($_SESSION['jobtype']=='villager'){ 
         $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC= '$id' ), (SELECT `NIC` FROM `villager` WHERE NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending','$description','$place', '$latitude','$longitude','Other Wild Animals are in The Village')"); 
        }else{
            $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '', '$id' ,'$id' , '$villagerCode' ,$officeNo,  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Other Wild Animals are in The Village' )"); 
        }      
            $this->db->runQuery("INSERT INTO `other_animals_in_village`(`incidentID`, `animal`, `no_of_animals`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),'$animalType','$noOfanimal')");
         
            if($_SESSION['jobtype']=='villager'){
                $districtVillage = $this->db->runQuery("SELECT district FROM lives WHERE villager_NIC='$id'");
              foreach ($districtVillage as $row){
                 $district = $row['district'];
              }}else{
                  
                  $districtGramanildhari = $this->db->runQuery("SELECT district_name FROM gn_division WHERE GND_Code=(SELECT GND FROM grama_niladhari WHERE NIC='$id' )");
                  foreach ($districtGramanildhari as $row){
                      $district = $row['district_name'];
                   }
              } $this->db->runQuery("UPDATE `wildlifeofficernotification` INNER JOIN wildlife_officer ON wildlifeofficernotification.id=wildlife_officer.NIC INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo =wildlife_officer.officeNo SET wildlifeofficernotification.status='notview' WHERE  regional_wildlife_office.address='$district' ");   
              $this->db->runQuery("INSERT INTO `ratings`(`id`, `stars`, `comments`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),' ',' ')");    

        }

    function insertReport3($id,$photo,$place,$latitude,$longitude){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $data = $this->db->runQuery("SELECT  `village_code`,`officeNo` FROM `village` WHERE grama_niladhari_NIC= '$id'" );
        foreach( $data as $row){
            $villagerCode = $row['village_code'];
            $officeNo = $row['officeNo'];  
        }
        if($_SESSION['jobtype']=='villager'){ 
            $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC='$id' ), (SELECT `NIC` FROM `villager` WHERE NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending',' ','$place',' $latitude','$longitude','Breakdown of Elephant Fences')"); 
        }else{
            $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '', '$id' ,'$id' , '$villagerCode' ,$officeNo,  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Breakdown of Elephant Fences' )");  
        }
        if($_SESSION['jobtype']=='villager'){
            $districtVillage = $this->db->runQuery("SELECT district FROM lives WHERE villager_NIC='$id'");
          foreach ($districtVillage as $row){
             $district = $row['district'];
          }}else{
              
              $districtGramanildhari = $this->db->runQuery("SELECT district_name FROM gn_division WHERE GND_Code=(SELECT GND FROM grama_niladhari WHERE NIC='$id' )");
              foreach ($districtGramanildhari as $row){
                  $district = $row['district_name'];
               }
          } 
          $this->db->runQuery("UPDATE `wildlifeofficernotification` INNER JOIN wildlife_officer ON wildlifeofficernotification.id=wildlife_officer.NIC INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo =wildlife_officer.officeNo SET wildlifeofficernotification.status='notview' WHERE  regional_wildlife_office.address='$district' ");   
          $this->db->runQuery("INSERT INTO `ratings`(`id`, `stars`, `comments`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),' ',' ')");    

    }
    function insertReport4($id,$animalType,$cultivatedCrop,$cultivatedLand,$photo,$place,$damageLand,$latitude,$longitude){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s");
        $date = date("Y-m-d");
        $data = $this->db->runQuery("SELECT  `village_code`,`officeNo` FROM `village` WHERE grama_niladhari_NIC= '$id'" );
   
        if($_SESSION['jobtype']=='villager'){ 
            $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC= '$id' ), (SELECT `NIC` FROM `villager` WHERE NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending',' ','$place',' $latitude','$longitude','Crop Damages')"); 
        } 
            $this->db->runQuery("INSERT INTO `crop_damage`(`incidentID`, `animal_cause_to_damage`, `cultivated_crop`, `cultivated_land_extent`, `damaged_land_extent`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),'$animalType','$cultivatedCrop','$cultivatedLand','$damageLand')");

        }
    function insertReport5($id,$animal,$noOfanimals,$support,$discription,$photo,$place,$latitude,$longitude){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $data = $this->db->runQuery("SELECT  `village_code`,`officeNo` FROM `village` WHERE grama_niladhari_NIC= '$id'" );
        foreach( $data as $row){
            $villagerCode = $row['village_code'];
            $officeNo = $row['officeNo'];  
        }
        if($_SESSION['jobtype']=='villager'){ 
             $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC= '$id' ), (SELECT `NIC` FROM `villager` WHERE  NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending', '$discription','$place','$latitude','$longitude','Wild Animal is in Danger')"); 
        }else{
            $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '', '$id' ,'$id' , '$villagerCode' ,$officeNo,  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Wild Animal is in Danger' )");  
        }      
             $this->db->runQuery("INSERT INTO `animal_is_in_danger`(`incidentID`, `animal`, `no_of_animals`, `vet_support`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),'$animal','$noOfanimals ','$support')") ;
             if($_SESSION['jobtype']=='villager'){
                $districtVillage = $this->db->runQuery("SELECT district FROM lives WHERE villager_NIC='$id'");
              foreach ($districtVillage as $row){
                 $district = $row['district'];
              }}else{
                  
                  $districtGramanildhari = $this->db->runQuery("SELECT district_name FROM gn_division WHERE GND_Code=(SELECT GND FROM grama_niladhari WHERE NIC='$id' )");
                  foreach ($districtGramanildhari as $row){
                      $district = $row['district_name'];
                   }
              }
         $this->db->runQuery("INSERT INTO `ratings`(`id`, `stars`, `comments`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),' ',' ')");    
         $this->db->runQuery("UPDATE `wildlifeofficernotification` INNER JOIN wildlife_officer ON wildlifeofficernotification.id=wildlife_officer.NIC INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo =wildlife_officer.officeNo SET wildlifeofficernotification.status='notview' WHERE  regional_wildlife_office.address='$district' ");   
}
    function insertReport6($id,$photo,$place,$latitude,$longitude){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("h:i:sa");
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $data = $this->db->runQuery("SELECT  `village_code`,`officeNo` FROM `village` WHERE grama_niladhari_NIC= '$id'" );
        foreach( $data as $row){
            $villagerCode = $row['village_code'];
            $officeNo = $row['officeNo'];  
        }
        if($_SESSION['jobtype']=='villager'){ 
          $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`, `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '',(SELECT  `gramaniladhari_NIC` FROM `lives` WHERE villager_NIC= '$id' ), (SELECT `NIC` FROM `villager` WHERE NIC= '$id'), (SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' ),(SELECT  `officeNo` FROM `village` WHERE village_code=(SELECT  `village_code` FROM `lives` WHERE villager_NIC= '$id' )),  '$time', '$date', '$photo','pending',' ','$place', '$latitude','$longitude','Illegal Happing')"); 
        }else{
            $this->db->runQuery("INSERT INTO `reported_incident`(`incidentID`,`gramaniladari_NIC`,`villager_NIC`,  `village_code`, `officeNo`,`time_in`, `date`, `image`, `status`, `description`,`Place`, `lat`, `lon`,`reporttype`) VALUES ( '', '$id' ,'$id' , '$villagerCode' ,$officeNo,  '$time', '$date', '$photo','pending','','$place',' $latitude','$longitude','Illegal Happing' )");  

        }
          $this->db->runQuery("INSERT INTO `illegal_things`(`incidentID`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ))");
          if($_SESSION['jobtype']=='villager'){
            $districtVillage = $this->db->runQuery("SELECT district FROM lives WHERE villager_NIC='$id'");
          foreach ($districtVillage as $row){
             $district = $row['district'];
          }}else{
              
              $districtGramanildhari = $this->db->runQuery("SELECT district_name FROM gn_division WHERE GND_Code=(SELECT GND FROM grama_niladhari WHERE NIC='$id' )");
              foreach ($districtGramanildhari as $row){
                  $district = $row['district_name'];
               }
          } 
         $this->db->runQuery("INSERT INTO `ratings`(`id`, `stars`, `comments`) VALUES ((SELECT  `incidentID` FROM `reported_incident` WHERE   time_in='$time' ),' ',' ')");    
         $this->db->runQuery("UPDATE `wildlifeofficernotification` INNER JOIN wildlife_officer ON wildlifeofficernotification.id=wildlife_officer.NIC INNER JOIN regional_wildlife_office ON regional_wildlife_office.officeNo =wildlife_officer.officeNo SET wildlifeofficernotification.status='notview' WHERE  regional_wildlife_office.address='$district' ");   
}
    function getdatalimit($start,$rowsPer){
      //  return $this->db->runQuery("SELECT * FROM `reported_incident`   LIMIT {$start} , {$rowsPer}  ");
        return $this->db->runQuery("SELECT * FROM `reported_incident`    WHERE  reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now() ORDER BY  incidentID DESC LIMIT {$start} , {$rowsPer}");

    }
    function getReportrows(){
    //    return $this->db->numberofrows("SELECT count(*) as total_rows FROM `reported_incident` ");
        return $this->db->numberofrows("SELECT count(*) as total_rows FROM `reported_incident` WHERE ( reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ");
    }
    function getData(){
  //      return $this->db->runQuery("SELECT * FROM   `reported_incident`");
        return $this->db->runQuery("SELECT * FROM   `reported_incident` WHERE ( reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ORDER BY  incidentID DESC ");
        
    }
     function getDataPending($VillagerID){
        return $this->db->runQuery("SELECT * FROM   `reported_incident` WHERE (villager_NIC='$VillagerID' && reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ORDER BY  incidentID DESC");
           
    }
    function getdatalimitPending($VillagerID,$start,$rowsPer){
        return $this->db->runQuery("SELECT * FROM `reported_incident`   WHERE (villager_NIC='$VillagerID' && reported_incident.status='pending' and reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()  ) ORDER BY  incidentID DESC  LIMIT {$start} , {$rowsPer}  ");

    }
    function getReportrowsPending($VillagerID){
        return $this->db->numberofrows("SELECT count(*) as total_rows FROM `reported_incident` WHERE (villager_NIC='$VillagerID'&& reported_incident.status='pending' and reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ");
    }
    function getDatAccept($VillagerID){
        return $this->db->runQuery("SELECT reported_incident.*,ratings.*,work.* FROM   `reported_incident` INNER JOIN ratings ON reported_incident.incidentID = ratings.Id  INNER JOIN work ON work.incidentID = reported_incident.incidentID WHERE (reported_incident.villager_NIC='$VillagerID' and reported_incident.status='success' && reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ");
           
    }
    function getAccept($NIC){
         
         return $this->db->runQuery("SELECT reported_incident.*,work.*,ratings.* FROM  `reported_incident`INNER JOIN ratings ON reported_incident.incidentID = ratings.Id INNER JOIN work ON reported_incident.incidentID = work.incidentID WHERE reported_incident.villager_NIC='$NIC' and  reported_incident.status='success'");
    }
    function getdatalimitAccept($VillagerID,$start,$rowsPer){
        return $this->db->runQuery("SELECT reported_incident.*,ratings.*,work.*  FROM `reported_incident` INNER JOIN ratings ON reported_incident.incidentID = ratings.Id INNER JOIN work ON work.incidentID = reported_incident.incidentID WHERE (reported_incident.villager_NIC='$VillagerID' and reported_incident.status='success' && reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()  ) ORDER BY  reported_incident.incidentID DESC  LIMIT {$start} , {$rowsPer}  ");

    }
    function getReportrowsAccept($incidentID){
        return $this->db->numberofrows("SELECT count( reported_incident.incidentID ) as total_rows FROM `reported_incident` INNER JOIN ratings ON reported_incident.incidentID = ratings.Id     WHERE (incidentID='$incidentID'&& reported_incident.date between date_sub(now(),INTERVAL 1 MONTH) and now()) ");
    }
    function getReport($incidentID){
        return $this->db->runQuery("SELECT * FROM   `reported_incident` WHERE incidentID='$incidentID' ");
    }
    
    function getReport1($incidentID){
        return $this->db->runQuery("SELECT * FROM   `elephants_in_village` WHERE incidentID='$incidentID' ");
    }
    function updateReport1($villagerNic,$noOfelephant,$place,$latitude,$longitude,$incidentID){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time', `date`='$date',`lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID=$incidentID) ") ;
        $this->db->runQuery("UPDATE `elephants_in_village` SET no_of_elephants =$noOfelephant WHERE incidentID=$incidentID");
    }
    function getReport2($incidentID){
        return $this->db->runQuery("SELECT * FROM   `other_animals_in_village` WHERE incidentID='$incidentID' ");
    }
    function updateReport2($villagerNic,$animalType,$place,$latitude,$longitude,$incidentID){
        date_default_timezone_set('Asia/Kolkata');
        $time = date("H:i:s");
        $date = date("Y-m-d"); 
        $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time', `date`='$date', `lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID= $incidentID ) ") ;
        $this->db->runQuery("UPDATE `other_animals_in_village` SET  `animal`='$animalType' WHERE incidentID= $incidentID ");
    }
    function getReport3($incidentID){
        return $this->db->runQuery("SELECT * FROM   `breakdown_fence` WHERE incidentID='$incidentID' ");
    }

    function updateReport3($villagerNic,$place,$latitude,$longitude,$incidentID){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time', `date`='$date',`lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID='$incidentID') ") ;
        // $this->db->runQuery("UPDATE `elephant_fence` SET    WHERE incidentID= $incidentID ");
    }
    function getReport4($incidentID){
        return $this->db->runQuery("SELECT * FROM   `crop_damage` WHERE incidentID='$incidentID' ");
    }
    function updateReport4($villagerNic,$animalType,$cultivatedCrop,$cultivatedLand,$damageLand,$place,$latitude,$longitude,$incidentID){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time', `date`='$date',`lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID=$incidentID) ") ;
        $this->db->runQuery("UPDATE `crop_damage` SET  `animal_cause_to_damage`='$animalType'  , `cultivated_crop`=$cultivatedCrop , `cultivated_land_extent`=$cultivatedLand , `damaged_land_extent`=$damageLand WHERE incidentID=$incidentID");
    }
    function getReport5($incidentID){
        return $this->db->runQuery("SELECT * FROM `animal_is_in_danger` WHERE incidentID='$incidentID' ");
    }
    function updateReport5($villagerNic,$noOfanimals,$animalType,$support ,$place,$latitude,$longitude,$incidentID){
        date_default_timezone_set('Asia/Kolkata');
        $time = date("H:i:s");
        $date = date("Y-m-d"); 
        $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time', `date`='$date' , `lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID=$incidentID) ") ;
        $this->db->runQuery("UPDATE `animal_is_in_danger` SET no_of_animals='$noOfanimals' ,`animal`='$animalType', vet_support='$support' WHERE incidentID=$incidentID");
   }
   function getReport6($incidentID){
    return $this->db->runQuery("SELECT * FROM `illegal_things` WHERE incidentID='$incidentID' ");
   }
   function updateReport6($villagerNic,$place,$latitude,$longitude,$incidentID){
    date_default_timezone_set('Asia/Kolkata');
    $time =  date("H:i:s");
    $date = date("Y-m-d"); 
    $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time', `date`='$date',`lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID=$incidentID) ") ;
 
    }
   function removeReport($reportNo){
        $this->db->runQuery("DELETE FROM `reported_incident` WHERE incidentID=$reportNo");
    }
    function getCropDamagesReview($villagerId,$start,$rowsPer){
        return $this->db->runQuery("SELECT * FROM `reported_incident` INNER JOIN  `crop_damage` ON reported_incident.incidentID = crop_damage.incidentID  WHERE reported_incident.Villager_NIC='$villagerId' and reported_incident.status !='pending'ORDER BY  reported_incident.incidentID DESC  LIMIT {$start} , {$rowsPer}   ");
    }
    function getCropDamages($VillagerID){
        return $this->db->numberofrows("SELECT count(*) AS total_rows FROM `reported_incident` INNER JOIN  `crop_damage` ON reported_incident.incidentID = crop_damage.incidentID  WHERE reported_incident.Villager_NIC='$VillagerID' and reported_incident.status !='pending' ");
    }
    function updateReportUnsuccess($villagerNic,$animalType,$cultivatedCrop,$cultivatedLand,$damageLand,$place,$latitude,$longitude,$incidentID){
        date_default_timezone_set('Asia/Kolkata');
        $time =  date("H:i:s");
        $date = date("Y-m-d"); 
        $this->db->runQuery("UPDATE `reported_incident` SET  Place ='$place',`time_in`='$time',`status`='pending',`date`='$date',`lat`='$latitude',`lon`='$longitude' WHERE  (villager_NIC = '$villagerNic'AND incidentID=$incidentID) ") ;
        $this->db->runQuery("UPDATE `crop_damage` SET  `animal_cause_to_damage`='$animalType'  , `cultivated_crop`=$cultivatedCrop , `cultivated_land_extent`=$cultivatedLand , `damaged_land_extent`=$damageLand WHERE incidentID=$incidentID");
    }
    public function getAlerStatus($NIC){
        return $this->db->runQuery("SELECT `alertstatus` FROM `alert` WHERE NIC= '$NIC'");
    }
    public function setAlerStatus($NIC){
        $this->db->runQuery("UPDATE `alert` SET  `alertstatus`='view'    WHERE NIC= '$NIC'");
        
    } 
    public function updaterating($incidentId,$stars,$comments){
        $this->db->runQuery("UPDATE `ratings` SET  `stars`=$stars, `comments`='$comments'   WHERE 	Id= $incidentId");
   }
   public function  selectRegStatus($NIC) {
    return $this->db->runQuery("SELECT `registrationStatus` FROM `villager_registration` WHERE Villager_NIC= '$NIC'");
}
public function getNotificationStatus($NIC){
    return $this->db->runQuery("SELECT COUNT(*) AS numberofnotification FROM `notification` WHERE NIC= '$NIC' and`status`='notview'");
}
public function addNotification($NIC,$subject,$description){
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d"); 
    return $this->db->runQuery("INSERT INTO `notification`(`no`, `NIC`, `subject`, `description`, `status`, `date`) VALUES ('','$NIC','$subject','$description','notview',$date)");
}
public function getEmail($NIC){
    return $this->db->runQuery("SELECT email FROM user WHERE NIC = '$NIC' ");
}
}
  
?>