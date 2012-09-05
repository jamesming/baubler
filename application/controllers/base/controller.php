<?php
class Base_Controller extends CI_Controller 
{

	protected $_data;
	
	function __construct() {
		
		parent::__construct();
		
		
			echo "hello.";
		
			$this->model_products_model = new Models_Db_Products_Model;				
			$this->model_products_tags_model = new Models_Db_Products_Tags_Model;				
		
			$this->_data = new stdClass;
			
			$this->_data->title = "Baubler";
			$this->_data->company_name = "Baubler LLC";
			$this->_data->GA_account = "UA-XXXXX-X";

			$this->_data->header = "header/header";
			$this->_data->nav = "nav/nav";
			$this->_data->tags_container = "body/tags/view";
			$this->_data->company = "footer/company";			
			$this->_data->footer = "footer/footer";
			
			$this->models_tags_model = new Models_Db_Tags_Model;
			$this->_data->tags = $this->models_tags_model->get_all_tags();				

	}
	
	
	function testing(){
		
		echo '<pre>';print_r(  $this->_data->tags  );echo '</pre>';  exit;
		
		
	}
	
	
		function create_table(){
			
			$table = $this->input->get('table');
			
			$this->model_products_model = new Models_Db_Products_Form;
			
			$this->model_products_model->create_generic_table($table); 
			
			
			$fields_array = array(/*
			                      'name' => array(
			                                               'type' => 'varchar(255)'
			                                    ),
			                                    
			                                    
			                      'product_id' => array(
			                                               'type' => 'int(11)'
			                                    ),*/
			                      'numberOfColors' => array(
			                                               'type' => 'int(11)'
			                                    )			                                    
			                                    
			                                    /*,
			                      'county' => array(
			                                               'type' => 'varchar(255)'
			                                    ),
			                      'city' => array(
			                                               'type' => 'varchar(255)'
			                                    ),
			                      'state' => array(
			                                               'type' => 'varchar(255)'
			                                    )*/
			              ); 
			              
			echo '<pre>';print_r(  $fields_array   );echo '</pre>';   
			$this->model_products_model->add_column_to_table_if_not_exist(
				$table, 
				$fields_array
			);
	   
	
	}
}