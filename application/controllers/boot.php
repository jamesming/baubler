<?php

class Boot extends Base_Controller {
	
	public function index() {
		$this->_data->body = "body/boot/view";
		$this->load->view('index', $this->_data);	
	}

}