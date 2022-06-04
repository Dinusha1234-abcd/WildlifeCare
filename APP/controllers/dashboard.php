<?php 
 class dashboard extends controller{
   
    function index(){
        if(isset($_GET['lang'])){
            //assign the value
              $type = $_GET['lang'];
        }    
          //get the incident report data from model 
             $lastWeek = $this->model->lastWeek();
             $lastMonth = $this->model->lastMonth();
             $last24Hours = $this->model->last24Hours();
             $countWildElephantArrival = $this->model->countWildElephantArrival();
             $countWildAnimalArrival = $this->model->countWildAnimalArrival();
             $countElephantFence = $this->model->countElephantFence();
             $countcropDamages = $this->model->countcropDamages();
             $countOthers = $this->model->countOthers();
             $villagerDistrict = $this->model->getVillagerDistrict($_SESSION['NIC']);
             $GramaniladhariDistrict = $this->model->getGramaniladariDistrict($_SESSION['NIC']);
             if($_SESSION["jobtype"]=='villager'){ 
               foreach($villagerDistrict as $row) {
                 $dataDistrict = $row['district'];
               }
              }elseif($_SESSION["jobtype"]=='Grama Niladhari') {
                foreach($GramaniladhariDistrict as $row) {
                    $dataDistrict = $row['district_name'];
               } 
             }
             $this->view->districtName = $dataDistrict;
             $countGramaniladahari = $this->model->countGramaniladhari( $dataDistrict );
             $countVillager = $this->model->countVillagers( $dataDistrict ); 
             $countWildElephantArrivalDistrict = $this->model->countWildElephantArrivalDistrict($dataDistrict);
             $countcropDamagesDistrict = $this->model->countcropDamagesDistrict($dataDistrict);
             $countIllegalThingDistrict = $this->model->countIllegalThingDistrict($dataDistrict);
             $countElephantFenceDistrict = $this->model->countElephantFenceDistrict($dataDistrict);
             $countWildAnimalDangerDistrict = $this->model->countWildAnimalDangerDistrict($dataDistrict);
             $countWildAnimalArrivalDistrict = $this->model->countWildAnimalArrivalDistrict($dataDistrict);
             $countWeekincidentdistrict = $this->model->countWeekincidentdistrict($dataDistrict);
             $countMonthincidentdistrict = $this->model->countMonthincidentdistrict($dataDistrict); 
             $countDayincidentdistrict = $this->model->countDayincidentdistrict($dataDistrict); 
             $countCentralProvinceIncident = $this->model->countCentralProvinceIncident();
             $countNorthernProvinceIncident = $this->model->countNorthernProvinceIncident(); 
             $countSouthernProvinceIncident = $this->model->countSouthernProvinceIncident(); 
             $countWesternProvinceIncident = $this->model->countWesternProvinceIncident(); 
             $countNorthWesternProvinceIncident = $this->model->countNorthWesternProvinceIncident(); 
             $countUvaProvinceIncident = $this->model->countUvaProvinceIncident(); 
             $countSabaragamuwaProvinceIncident = $this->model->countSabaragamuwaProvinceIncident(); 
             $countNorthCentralProvinceIncident = $this->model->countNorthCentralProvinceIncident(); 
             $countIncident12AM = $this->model->countIncident12AM($dataDistrict);
             $countIncident01AM = $this->model->countIncident01AM($dataDistrict);
             $countIncident02AM = $this->model->countIncident02AM($dataDistrict);
             $countIncident03AM = $this->model->countIncident03AM($dataDistrict);
             $countIncident04AM = $this->model->countIncident04AM($dataDistrict);
             $countIncident05AM = $this->model->countIncident05AM($dataDistrict);
             $countIncident06AM = $this->model->countIncident06AM($dataDistrict);
             $countIncident07AM = $this->model->countIncident07AM($dataDistrict);
             $countIncident08AM = $this->model->countIncident08AM($dataDistrict);
             $countIncident09AM = $this->model->countIncident09AM($dataDistrict);
             $countIncident10AM = $this->model->countIncident10AM($dataDistrict);
             $countIncident11AM = $this->model->countIncident11AM($dataDistrict);
             $countIncident12PM = $this->model->countIncident12PM($dataDistrict);
             $countIncident01PM = $this->model->countIncident01PM($dataDistrict);
             $countIncident02PM = $this->model->countIncident02PM($dataDistrict);
             $countIncident03PM = $this->model->countIncident03PM($dataDistrict);
             $countIncident04PM = $this->model->countIncident04PM($dataDistrict);
             $countIncident05PM = $this->model->countIncident05PM($dataDistrict);
             $countIncident06PM = $this->model->countIncident06PM($dataDistrict);
             $countIncident07PM = $this->model->countIncident07PM($dataDistrict);
             $countIncident08PM = $this->model->countIncident08PM($dataDistrict);
             $countIncident09PM = $this->model->countIncident09PM($dataDistrict);
             $countIncident10PM = $this->model->countIncident10PM($dataDistrict);
             $countIncident11PM = $this->model->countIncident11PM($dataDistrict);
             $countIncidentJan = $this->model->countIncidentJan($dataDistrict);
             $countIncidentFeb = $this->model->countIncidentFeb($dataDistrict);
             $countIncidentMarch = $this->model->countIncidentMarch($dataDistrict);
             $countIncidentApril  = $this->model->countIncidentApril($dataDistrict);
             $countIncidentMay = $this->model->countIncidentMay($dataDistrict);
             $countIncidentJune = $this->model->countIncidentJune($dataDistrict);
             $countIncidentJuly = $this->model->countIncidentJuly($dataDistrict);
             $countIncidentAug = $this->model->countIncidentAug($dataDistrict);
             $countIncidentSep = $this->model->countIncidentSep($dataDistrict);
             $countIncidentOct = $this->model->countIncidentOct($dataDistrict);
             $countIncidentNov = $this->model->countIncidentNov($dataDistrict);
             $countIncidentDec  = $this->model->countIncidentDec($dataDistrict);



             
            foreach($lastWeek as $row) {
               $dataLastWeek = $row['lastWeek'];
            } 
            $this->view->lastWeekData = $dataLastWeek;
            foreach($lastMonth as $row) {
                $dataLastMonth = $row['lastMonth'];
            } 
            $this->view->lastMonthData = $dataLastMonth;
            foreach($last24Hours as $row) {
                $dataLast24Hours = $row['last24Hours'];
            } 
            $this->view->last24HoursData = $dataLast24Hours;
            foreach($countWildElephantArrival as $row) {
                $datacountWildElephantArrival = $row['countWildElephantArrival'];
            } 
            $this->view->lastMonthWildElephantArrival = $datacountWildElephantArrival;
            foreach($countWildAnimalArrival as $row) {
                $datacountWildAnimalArrival = $row['countWildAnimalArrival'];
            } 
            $this->view->lastMonthWildAnimalArrival = $datacountWildAnimalArrival;
            foreach($countElephantFence as $row) {
                $datacountElephantFence = $row['countElephantFence'];
            } 
            $this->view->lastMonthElephantFence = $datacountElephantFence;
            foreach($countcropDamages as $row) {
                $datacountcropDamages = $row['countcropDamages'];
            } 
            $this->view->lastMonthcropDamages = $datacountcropDamages;
            foreach($countOthers as $row) {
                $datacountOthers = $row['countOthers'];
            } 
            $this->view->lastMonthOthers = $datacountOthers;
            foreach($countGramaniladahari as $row) {
                  $datacountGramaniladahari = $row['gramaNiladhari'];
            } 
              $this->view->gramaNiladhari =  $datacountGramaniladahari;
            foreach($countVillager as $row) {
                $datacountVillager = $row['villager'];
            } 
            $this->view->villager =  $datacountVillager;
            foreach($countWildElephantArrivalDistrict as $row) {
                $datacountWildElephantArrivalDistrict = $row['WildElephantArrivalDistrict'];
            } 
            $this->view->lastMonthWildElephantArrivalDistrict =  $datacountWildElephantArrivalDistrict;
            foreach($countcropDamagesDistrict as $row) {
                $datacountcropDamagesDistrict  = $row['cropDamagesDistrict'];
            } 
            $this->view->lastMonthcropDamagesDistrict =  $datacountcropDamagesDistrict;
            foreach($countIllegalThingDistrict as $row) {
                $datacountIllegalThingDistrict  = $row['IllegalThing'];
            } 
            $this->view->lastMonthIllegalThingDistrict =  $datacountIllegalThingDistrict;
            foreach($countElephantFenceDistrict as $row) {
                $datacountElephantFenceDistrict  = $row['ElephantFence'];
            } 
            $this->view->lastMonthElephantFenceDistrict =  $datacountElephantFenceDistrict;
            foreach($countWildAnimalDangerDistrict as $row) {
                $datacountWildAnimalDangerDistrict  = $row['WildAnimalDanger'];
            } 
            $this->view->lastMonthWildAnimalDangerDistrict =  $datacountWildAnimalDangerDistrict;
            foreach($countWildAnimalArrivalDistrict as $row) {
                $datacountWildAnimalArrivalDistrict  = $row['WildAnimalArrival'];
            } 
            $this->view->lastMonthWildAnimalArrivalDistrict =  $datacountWildAnimalArrivalDistrict;
            foreach($countWeekincidentdistrict as $row) {
                $datacountWeekincidentdistrict  = $row['incidentDistrictWeekly'];
            } 
            $this->view->lastWeekincidentdistrict =  $datacountWeekincidentdistrict;
            foreach($countMonthincidentdistrict as $row) {
                $datacountMonthincidentdistrict  = $row['incidentDistrictMontly'];
            } 
            $this->view->lastMonthincidentdistrict =  $datacountMonthincidentdistrict;
            foreach($countDayincidentdistrict as $row) {
                $datacountDayincidentdistrict  = $row['incidentDistrictDaily'];
            } 
            $this->view->lastDayincidentdistrict =  $datacountDayincidentdistrict;
            $datacountDayincidentdistrictINT = intval( $datacountMonthincidentdistrict );
            $dataMonthINT = intval( $dataLastMonth );
            $this->view->districtIncidentPercentage =  (int)(( $datacountDayincidentdistrictINT/$dataMonthINT )*100)  ;
            foreach($countCentralProvinceIncident as $row) {
                $datacountCentralProvinceIncident  = $row['Central'];
            } 
            $this->view->CentralProvinceIncident =  $datacountCentralProvinceIncident;
            foreach($countSouthernProvinceIncident as $row) {
                $datacountSouthernProvinceIncident  = $row['Southern'];
            } 
            $this->view->SouthernProvinceIncident =  $datacountSouthernProvinceIncident;
            foreach($countNorthernProvinceIncident as $row) {
                $datacountNorthernProvinceIncident  = $row['Northern'];
            } 
            $this->view->NorthernProvinceIncident =  $datacountNorthernProvinceIncident;
            foreach($countWesternProvinceIncident as $row) {
                $datacountWesternProvinceIncident  = $row['Western'];
            } 
            $this->view->WesternProvinceIncident =  $datacountWesternProvinceIncident;
            foreach($countNorthWesternProvinceIncident as $row) {
                $datacountNorthWesternProvinceIncident  = $row['NorthWestern'];
            } 
            $this->view->NorthWesternProvinceIncident =  $datacountNorthWesternProvinceIncident;
            foreach($countNorthCentralProvinceIncident as $row) {
                $datacountNorthCentralProvinceIncident  = $row['NorthCentral'];
            } 
            $this->view->NorthCentralProvinceIncident =  $datacountNorthCentralProvinceIncident;
            foreach($countUvaProvinceIncident as $row) {
                $datacountUvaProvinceIncident  = $row['Uva'];
            } 
            $this->view->UvaProvinceIncident =  $datacountUvaProvinceIncident;
            foreach($countSabaragamuwaProvinceIncident as $row) {
                $datacountSabaragamuwaProvinceIncident  = $row['Sabaragamuwa'];
            } 
            $this->view->SabaragamuwaProvinceIncident =  $datacountSabaragamuwaProvinceIncident;
            foreach($countIncident12AM as $row) {
                $datacountIncident12AM  = $row['12AM'];
            } 
            $this->view->Incident12AMCount =  $datacountIncident12AM;
            foreach($countIncident01AM as $row) {
                $datacountIncident01AM  = $row['01AM'];
            } 
            $this->view->Incident01AMCount =  $datacountIncident01AM;
            foreach($countIncident02AM as $row) {
                $datacountIncident02AM  = $row['02AM'];
            } 
            $this->view->Incident02AMCount =  $datacountIncident02AM;
            foreach($countIncident03AM as $row) {
                $datacountIncident03AM  = $row['03AM'];
            } 
            $this->view->Incident03AMCount =  $datacountIncident03AM;
            foreach($countIncident04AM as $row) {
                $datacountIncident04AM  = $row['04AM'];
            } 
            $this->view->Incident04AMCount =  $datacountIncident04AM;
            foreach($countIncident05AM as $row) {
                $datacountIncident05AM  = $row['05AM'];
            } 
            $this->view->Incident05AMCount =  $datacountIncident05AM;
            foreach($countIncident06AM as $row) {
                $datacountIncident06AM  = $row['06AM'];
            } 
            $this->view->Incident06AMCount =  $datacountIncident06AM;
            foreach($countIncident07AM as $row) {
                $datacountIncident07AM  = $row['07AM'];
            } 
            $this->view->Incident07AMCount =  $datacountIncident07AM;
            foreach($countIncident08AM as $row) {
                $datacountIncident08AM  = $row['08AM'];
            } 
            $this->view->Incident08AMCount =  $datacountIncident08AM;
            foreach($countIncident09AM as $row) {
                $datacountIncident09AM  = $row['09AM'];
            } 
            $this->view->Incident09AMCount =  $datacountIncident09AM;
            foreach($countIncident10AM as $row) {
                $datacountIncident10AM  = $row['10AM'];
            } 
            $this->view->Incident10AMCount =  $datacountIncident10AM;
            foreach($countIncident11AM as $row) {
                $datacountIncident11AM  = $row['11AM'];
            } 
            $this->view->Incident11AMCount =  $datacountIncident11AM;
            foreach($countIncident12PM as $row) {
                $datacountIncident12PM  = $row['12PM'];
            } 
            $this->view->Incident12PMCount =  $datacountIncident12PM;
            foreach($countIncident01PM as $row) {
                $datacountIncident01PM  = $row['01PM'];
            } 
            $this->view->Incident01PMCount =  $datacountIncident01PM;
            foreach($countIncident02PM as $row) {
                $datacountIncident02PM  = $row['02PM'];
            } 
            $this->view->Incident02PMCount =  $datacountIncident02PM;
            
            foreach($countIncident03PM as $row) {
                $datacountIncident03PM  = $row['03PM'];
            } 
            $this->view->Incident03PMCount =  $datacountIncident03PM;
            foreach($countIncident04PM as $row) {
                $datacountIncident04PM  = $row['04PM'];
            } 
            $this->view->Incident04PMCount =  $datacountIncident04PM;
            foreach($countIncident05PM as $row) {
                $datacountIncident05PM  = $row['05PM'];
            } 
            $this->view->Incident05PMCount =  $datacountIncident05PM;
            foreach($countIncident06PM as $row) {
                $datacountIncident06PM  = $row['06PM'];
            } 
            $this->view->Incident06PMCount =  $datacountIncident06PM;
            foreach($countIncident07PM as $row) {
                $datacountIncident07PM  = $row['07PM'];
            } 
            $this->view->Incident07PMCount =  $datacountIncident07PM;
            foreach($countIncident08PM as $row) {
                $datacountIncident08PM  = $row['08PM'];
            } 
            $this->view->Incident08PMCount =  $datacountIncident08PM;
            foreach($countIncident09PM as $row) {
                $datacountIncident09PM  = $row['09PM'];
            } 
            $this->view->Incident09PMCount =  $datacountIncident09PM;
            foreach($countIncident10PM as $row) {
                $datacountIncident10PM  = $row['10PM'];
            } 
            $this->view->Incident10PMCount =  $datacountIncident10PM;
            foreach($countIncident11PM as $row) {
                $datacountIncident11PM  = $row['11PM']; 
            } 
            $this->view->Incident11PMCount =  $datacountIncident11PM; 
            foreach($countIncidentJan as $row) {
                $datacountIncidentJan  = $row['Jan'];
            } 
            $this->view->IncidentJanCount =  $datacountIncidentJan;
            foreach($countIncidentFeb as $row) {
                $datacountIncidentFeb  = $row['Feb'];
            } 
            $this->view->IncidentFebCount =  $datacountIncidentFeb;
            
            foreach($countIncidentMarch as $row) {
                $datacountIncidentMarch  = $row['March'];
            } 
            $this->view->IncidentMarchCount =  $datacountIncidentMarch;
            
            foreach($countIncidentApril as $row) {
                $datacountIncidentApril  = $row['April'];
            } 
            $this->view->IncidentAprilCount =  $datacountIncidentApril;
            
            foreach($countIncidentMay as $row) {
                $datacountIncidentMay  = $row['May'];
            } 
            $this->view->IncidentMayCount =  $datacountIncidentMay;
            
            foreach($countIncidentJune as $row) {
                $datacountIncidentJune  = $row['June'];
            } 
            $this->view->IncidentJuneCount =  $datacountIncidentJune;
            
            foreach($countIncidentJuly as $row) {
                $datacountIncidentJuly  = $row['July'];
            } 
            $this->view->IncidentJulyCount =  $datacountIncidentJuly;
            
            foreach($countIncidentAug as $row) {
                $datacountIncidentAug  = $row['Aug'];
            } 
            $this->view->IncidentAugCount =  $datacountIncidentAug;
            
            foreach($countIncidentSep as $row) {
                $datacountIncidentSep  = $row['Sep'];
            } 
            $this->view->IncidentSepCount =  $datacountIncidentSep;
           
            foreach($countIncidentOct as $row) {
                $datacountIncidentOct  = $row['Oct'];
            } 
            $this->view->IncidentOctCount =  $datacountIncidentOct;
            foreach($countIncidentNov as $row) {
                $datacountIncidentNov  = $row['Nov'];
            } 
            $this->view->IncidentNovCount =  $datacountIncidentNov;
            
            foreach($countIncidentDec as $row) {
                $datacountIncidentDec  = $row['Dece'];
            } 
            $this->view->IncidentDecCount =  $datacountIncidentDec;
            $this->view->map = $this->model->getlocation($dataDistrict);
             
             switch($_SESSION["jobtype"]){
                case "villager":
                    //check status 
                    $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
                    $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
                 
                    switch($type){
                   case 1: 
                   $this->view->render('dashboardVillager');
                   if (isset($_POST['submitAlert'])) {
                       $this->model->setAlerStatus($_SESSION['NIC']); 
                    }
                   break;
                   case 2 :
                   $this->view->render('dashboardVillagerSinhala');  
                   break;  
                   case 3:
                   $this->view->render('dashboardVillagerTamil') ;   
                   break;
                }
                break;
                
                case 'Grama Niladhari':
                    $this->view->status = $this->checkAlerStatus($_SESSION['NIC']);
                    $this->view->notification = $this->checkNotificationStatus($_SESSION['NIC']);
                     switch($type){
                         case 1: 
                          $this->view->render('dashboardGramaniladhari');
                          if (isset($_POST['submitAlert'])) {
                            $this->model->setAlerStatus($_SESSION['NIC']); 
                         }
                        break;
                        case 2 :
                        $this->view->render('dashboardGramaniladhari');  
                        break;  
                        case 3:
                        $this->view->render('dashboardGramaniladhari') ;   
                        break;
                    }
                    break;    
                    
        
    } 
}
//check alert status
    public function checkAlerStatus($NIC){
       
        $statusReview  = $this->model->getAlerStatus($NIC);  
        foreach($statusReview as $row){ 
          $status = $row['alertstatus'];
        }  
        return $status;
   }
   //check notification
   public function checkNotificationStatus($NIC){
       
    $statusReview  = $this->model->getNotificationStatus($NIC);  
    foreach($statusReview as $row){ 
      $numberofnotification = $row['numberofnotification'];
    }  
    return $numberofnotification;
  }
} 
 ?>