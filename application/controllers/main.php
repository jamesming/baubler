<?php

class Main extends Controllers_Controller {
	
	public function index() {
		
		$this->_data->body = "body/main/view";
		$this->load->view('index', $this->_data);	
	}

}