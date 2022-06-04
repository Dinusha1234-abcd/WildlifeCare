<?php

class dashboard_model extends model{
    
	function __construct()
	{
		parent::__construct();
	}
   //get district in villager
    public function getVillagerDistrict($villagerNic){
        return $this->db->runQuery("SELECT district FROM lives WHERE `villager_NIC`='$villagerNic'");
    }
    //get gramanildhari district
    public function getGramaniladariDistrict($gramaniladariNic){
      return $this->db->runQuery("SELECT district_name  FROM gn_division INNER JOIN grama_niladhari ON gn_division.GND_Code = grama_niladhari.GND WHERE `NIC`='$gramaniladariNic'");
  }
  //last week
    public function lastWeek(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS lastWeek FROM reported_incident  WHERE `date`  between date_sub(now(),INTERVAL 7 DAY ) and now(); ");
    } 
    //last month
    public function lastMonth(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS lastMonth FROM reported_incident  WHERE `date`  between date_sub(now(),INTERVAL 1 MONTH) and now(); ");
    } 
    //last 24 hours
    public function last24Hours(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS last24Hours FROM reported_incident  WHERE `date`  between date_sub(now(),INTERVAL 1 DAY ) and now(); ");
    } 
    // count Elphant arrival
    public function countWildElephantArrival(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS countWildElephantArrival FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Elephants are in The Village')");
     }
     //count wild animal arrival
     public function countWildAnimalArrival(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS countWildAnimalArrival FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Other Wild Animals are in The Village')");
     }
     //count elephant fence
     public function countElephantFence(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS countElephantFence FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Breakdown of Elephant Fences')");
     }
     //count crop damages
     public function countcropDamages(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS countcropDamages   FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&( `reporttype`='Crop Damages')");
     }
     // count other reports
     public function countOthers(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d"); 
        return $this->db->runQuery("SELECT COUNT(incidentID) AS countOthers FROM reported_incident  WHERE (`date`  between date_sub(now(),INTERVAL 1 MONTH) and now())&&(( `reporttype`='Illegal Happing')||( `reporttype`='Wild Animal is in Danger'))");
     }
     // count wild life officer
      public function countWildlifeOfficer($district){
         $this->db->runQuery( "SELECT COUNT(incidentID) AS wildlifeOfficer  FROM user INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE SELECT ");
      }
      //count gramanildhris
      public function countGramaniladhari($district){
         return $this->db->runQuery( "SELECT COUNT(grama_niladhari.NIC) AS gramaNiladhari  FROM grama_niladhari INNER JOIN gn_division ON grama_niladhari.GND = gn_division.GND_Code WHERE  gn_division.district_name= '$district'  ");
      }
      //count villagers 
      public function countVillagers($district){
         return $this->db->runQuery( "SELECT COUNT(villager_NIC) AS villager  FROM lives WHERE   district= '$district'  ");
      }
      //count wild elephant arrival in district
      public function countWildElephantArrivalDistrict($district){
         
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS WildElephantArrivalDistrict FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Elephants are in The Village'))  ");
      }
      //count crop damages in district
      public function countcropDamagesDistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS cropDamagesDistrict FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Crop Damages'))  ");
      }
      //count Illegal things in the district
      public function countIllegalThingDistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS IllegalThing FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Illegal Happing'))  ");
      }
      //count elephant fence in district
      public function countElephantFenceDistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS ElephantFence FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Breakdown of Elephant Fences'))  ");
      }
      //count wild animal danger
      public function countWildAnimalDangerDistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS WildAnimalDanger FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Wild Animal is in Danger'))  ");
      }
      //count wildanimal arrival district
      public function countWildAnimalArrivalDistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS WildAnimalArrival FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&&( reported_incident.reporttype ='Other Wild Animals are in The Village'))  ");
      }
      //count week incident
      public function countWeekincidentdistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS incidentDistrictWeekly FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 7 DAY ) and now()))");
      }
      public function countMonthincidentdistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS incidentDistrictMontly FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH ) and now()))");
      }
      //count day incident report
      public function countDayincidentdistrict($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS incidentDistrictDaily FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ((lives.district = '$district')&&( reported_incident.date   between date_sub(now(),INTERVAL 1 DAY ) and now()))");
      }
      //count province
      public function countCentralProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Central FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='Central' )  ");
      } 
      public function countNorthernProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Northern FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='Northern' )  ");
      } 
      public function countSouthernProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS  Southern FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='Southern' )  ");
      } 
      public function countWesternProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Western FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='Western' )  ");
      } 
      public function countNorthWesternProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS NorthWestern FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='NorthWestern' )  ");
      }
      public function countNorthCentralProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS NorthCentral FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='NorthCentral' )  ");
      } 
      public function countUvaProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Uva FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='Uva' )  ");
      } 
      public function countSabaragamuwaProvinceIncident(){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Sabaragamuwa FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (reported_incident.date   between date_sub(now(),INTERVAL 1 MONTH) and now())&& lives.province='Sabaragamuwa' )  ");
      } 
      public function countIncident12AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 12AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY ) and now())&& reported_incident.time_in>='23:01:00' and reported_incident.time_in<='00:00:00')");
      }
      //count time by time
      public function countIncident01AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 01AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='00:01:00' and reported_incident.time_in<='01:00:00')");
      }
      public function countIncident02AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 02AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='01:01:00' and reported_incident.time_in<='02:00:00') ");
      }
      public function countIncident03AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 03AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&&  reported_incident.time_in>='02:01:00' and reported_incident.time_in<='03:00:00')");
      }
      public function countIncident04AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 04AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='03:01:00' and reported_incident.time_in<='04:00:00') ");
      }
      public function countIncident05AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 05AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='04:01:00' and reported_incident.time_in<='05:00:00') ");
      }
      public function countIncident06AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 06AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='05:01:00' and reported_incident.time_in<='06:00:00')");
      }
      public function countIncident07AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 07AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='06:01:00' and reported_incident.time_in<='07:00:00') ");
      }
      public function countIncident08AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 08AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&&reported_incident.time_in>='07:01:00' and reported_incident.time_in<='08:00:00')");
      }
      public function countIncident09AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 09AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='08:01:00' and reported_incident.time_in<='09:00:00') ");
      }
      public function countIncident10AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 10AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='09:01:00' and reported_incident.time_in<='10:00:00')");
      } 
      public function countIncident11AM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 11AM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='10:01:00' and reported_incident.time_in<='11:00:00')");
      } 
      public function countIncident12PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 12PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='11:01:00' and reported_incident.time_in<='12:00:00') ");
      }
      public function countIncident01PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 01PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='12:01:00' and reported_incident.time_in<='13:00:00') ");
      }
      public function countIncident02PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 02PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='13:01:00' and reported_incident.time_in<='14:00:00') ");
      }
      public function countIncident03PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 03PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='14:01:00' and reported_incident.time_in<='15:00:00')");
      }
      public function countIncident04PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 04PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='15:01:00' and reported_incident.time_in<='16:00:00')");
      }
      public function countIncident05PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 05PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='16:01:00' and reported_incident.time_in<='17:00:00')");
      }
      public function countIncident06PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 06PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='17:01:00' and reported_incident.time_in<='18:00:00')");
      }
      public function countIncident07PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 07PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='18:01:00' and reported_incident.time_in<='19:00:00')");
      }
      public function countIncident08PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 08PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='19:01:00' and reported_incident.time_in<='20:00:00') ");
      }
      public function countIncident09PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 09PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='20:01:00' and reported_incident.time_in<='21:00:00')");
      }
      public function countIncident10PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 10PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='21:01:00' and reported_incident.time_in<='22:00:00')");
      }
      public function countIncident11PM($district){
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS 11PM FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date   between date_sub(now(),INTERVAL 1 DAY) and now())&& reported_incident.time_in>='22:01:00' and reported_incident.time_in<='23:00:00')");
      }
      //count monthly
       public function countIncidentJan($district){
        $date = date("Y");
          return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Jan FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-01-01' and reported_incident.date<='$date-01-31'))");
       }//100
      public function countIncidentFeb($district){ 
       $date = date("Y");
           return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Feb FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-02-01' and reported_incident.date<='$date-02-29'))");
      }
      public function countIncidentMarch($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS March FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-03-01' and reported_incident.date<='$date-03-31'))");
      }
      public function countIncidentApril($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS April FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-04-01' and reported_incident.date<='$date-04-30'))");
      }
      public function countIncidentMay($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS May FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-05-01' and reported_incident.date<='$date-05-31'))");
      }
      public function countIncidentJune($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS June FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-06-01' and reported_incident.date<='$date-06-30'))");
      }
      public function countIncidentJuly($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS July FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-07-01' and reported_incident.date<='$date-07-31'))");
      }
      public function countIncidentAug($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Aug FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-08-01' and reported_incident.date<='$date-08-31'))");
      }
      public function countIncidentSep($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Sep FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-09-01' and reported_incident.date<='$date-09-30'))");
      }public function countIncidentOct($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Oct FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-10-01' and reported_incident.date<='$date-10-31'))");
      }public function countIncidentNov($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Nov FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date-11-01' and reported_incident.date<='$date-11-30'))");
      }public function countIncidentDec($district){
         $date = date("Y");
         return $this->db->runQuery( "SELECT COUNT(reported_incident.incidentID) AS Dece  FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( (lives.district = '$district')&&(reported_incident.date>='$date.-12-01' and reported_incident.date<='$date.-12-31'))");
      }
      //get alert
      public function getAlerStatus($NIC){
         return $this->db->runQuery("SELECT `alertstatus` FROM `alert` WHERE NIC= '$NIC'");
     }
     //set alert status
     public function setAlerStatus($NIC){
         $this->db->runQuery("UPDATE `alert` SET  `alertstatus`='view'    WHERE NIC= '$NIC'");
         
     } 
     public function getNotificationStatus($NIC){
      return $this->db->runQuery("SELECT COUNT(*) AS numberofnotification FROM `notification` WHERE NIC= '$NIC' and`status`='notview'");
  }
    public function getlocation($district){
         return $this->db->runQuery("SELECT lat ,lon,reportType FROM reported_incident INNER JOIN lives ON reported_incident.villager_NIC = lives.villager_NIC WHERE ( lives.district = '$district'  )");
    }

   }

?>