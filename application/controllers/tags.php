<?php

class Tags extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();
		
	}	
	

	public function index() {
		
			echo json_encode(  $this->_data->tags  );
			
	}
	
	function test(){
		
		echo '<pre>';print_r(  $this->_data->tags    );echo '</pre>';  exit;
		
	}
	
}