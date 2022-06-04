<?php
class Database extends PDO{


    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD)
    {
        //call the construct function in PDO 
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASSWORD);
    }
    //Create runquery function when call model  classes
    public function runquery($query){
        //prepare the query
        $stmt = $this->prepare($query);
        //excute the query 
        $stmt->execute();
        //return  the value 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);   
    }
    //Create runquery function when call model  classes  
    public function numberofrows($query){
        //prepare the query
        $stmt = $this->prepare($query); 
        //excute the query 
        $stmt->execute();
        //assign the $result variable and  return value 
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);   
        return reset($result);
         
    }
    public function runQery($query,$details){
        //prepare the query
        $stmt = $this->prepare($query);
        //excute the query 
        $stmt->execute($details);
        //return  the value 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);   
    }

}