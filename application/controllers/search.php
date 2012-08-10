<?php

class Search extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();

		
	}	
	
	
	function index(){

		
		$this->_data->products = $this->model_products_form->get_all_products();
		
		$this->_data->body = "body/search/view";
		
		$this->_data->nav_selected = "nav_product_search";
		
		$this->load->view('index', $this->_data);	  
	}

	
}