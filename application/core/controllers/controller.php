<?php
class Controllers_Controller extends CI_Controller 
{

	protected $_data;
	
	function __construct() {
		
		parent::__construct();		
		

			$this->_data = new stdClass;
			
			$this->_data->title = "Baubler";
			$this->_data->company_name = "Baubler LLC";
			$this->_data->GA_account = "UA-XXXXX-X";

			$this->_data->header = "header/header";
			$this->_data->nav = "nav/nav";
			$this->_data->company = "footer/company";			
			$this->_data->footer = "footer/footer";

	}
}