<?php

class Search extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->model_images_form = new Models_Db_Images_Form;
		
	}	
	
	
	function index(){
		
		$this->_data->images = $this->model_images_form->get_all_images();
		
		$this->_data->body = "body/search/view";
		
		$this->_data->nav_selected = "nav_image_search";
		
		$this->load->view('index', $this->_data);	  
	}

	
}