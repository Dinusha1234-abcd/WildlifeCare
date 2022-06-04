<?php

class index extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	if(isset($_GET["lang"])){

    		if($_GET["lang"]=="2")
    			$this->view->render('indexSinhala');
    		elseif($_GET["lang"]=="1")
    			$this->view->render('index');
            elseif ($_GET["lang"]=="3")
                $this->view->render('indexTamil');

                
            


    	}
    	else
          $this->view->render('index');
    }
}



?>