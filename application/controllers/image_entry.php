<?php

class Image_entry extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->model_images_form = new Models_Db_Images_Form;
		$this->model_uploads_images = new Models_Uploads_Images;
		
	}	
	
	public function index() {
		
		$this->_data->images = $this->model_images_form->get_all_images();
		
		$this->_data->body = "body/image_entry/view";
		
		$this->load->view('index', $this->_data);	
	}


	public function insert(){
		
		$post_array = $this->input->post();
		
		$table = $post_array['table'];
		
		unset($post_array['table']);		
		
		$this->model_images_form->create_generic_table($table);
		
		$this->model_images_form->create_fields_with_post($table, $post_array);
		
		$this->model_images_form->insert_table($table, $post_array);
		
	}
	
	public function update(){
		
		$post_array = $this->input->post();
		
		$table = $post_array['table'];
		
		unset($post_array['table']);		
		
		$pk = $post_array['image_id'];
		
		unset($post_array['image_id']);
		
		echo $this->model_images_form->update_table_where( 
			$table, 
			$where_array = array(
				'id' => $pk
			), 
			$set_what_array = $post_array
		);
		
	}
	
	
	public function getJsonAllImages(){
		
		echo json_encode($this->model_images_form->get_all_images());
		
	}

	public function getJsonImagesWherePkIs(){
		
		echo json_encode($this->model_images_form->get_images_where(
			$pk  = $this->input->get('id')
		));
		
	}
}