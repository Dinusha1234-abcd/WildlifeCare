<?php

class model{
	function __construct(){
	  //Create the new object db in Database Class	
	  $this->db= new Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASSWORD);
	}
}

?>