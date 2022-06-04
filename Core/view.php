<?php

class view{

	    public $data;

		function __construct(){ 
		}
	    //Create the render function when load the view page 
		function render($viewName,$data=""){
			//check the if file is already have
			if(file_exists('App/views/'.$viewName.'.php'))
			   require 'App/views/'.$viewName.'.php';
		}

	
} 