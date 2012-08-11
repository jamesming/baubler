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




	function getJsonProducts(){
		
		$tags = $this->input->get('tags');
		
		if( !empty($tags)){
			
			echo json_encode($this->model_products_form->get_distinct_products_where_string_tags_are($tags) );
			
		};
		
		
	}
	
	
	
	
	function test(){
		
		$tags = $this->input->get('tags');
		
		echo '<pre>';print_r(  $this->model_products_form->get_distinct_products_where_string_tags_are($tags)  );echo '</pre>';  exit;
		
		
	}
	
	
	
}