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
		
		$pk = $this->model_images_form->insert_table($table, $post_array);
		
		$this->makeSomeCopyOfUrl( $post_array, $pk );
		
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
		
		$this->makeSomeCopyOfUrl( $post_array, $pk );
		
	}
	
	public function makeSomeCopyOfUrl( $post_array, $pk ){
		
			$path_array = array(
				'folder' => 'images'
				,'image_id' => $pk
			);
		
			$this->model_uploads_images->cloneFromRemoteURL(
				 $url = $post_array['url']
				,$image_id = $pk
				,$callItFormat = 'raw'
				,$path_array
			);
			
			$this->model_uploads_images->cloneAndResizeImage(
					 $url =  $post_array['url']
					,$image_id = $pk
					,$callItFormat = 'image'
					,$target_width = 270
					,$target_height = 300
					,$path_array
			);
			
			$dir_path = 'uploads/images/' . $pk . '/';
			
			$this->model_uploads_images->automaticallyGenerateThumb( 
				 $dir_path
				,$image_file = 'raw.jpg'
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
	
	public function jcrop(){
		
		$post_array = $this->input->post();
		
		$table = $post_array['table'];
		
		unset($post_array['table']);		
		
		$pk = $post_array['image_id'];
		
		unset($post_array['image_id']);		
		
		$dir_path = 'uploads/images/' . $pk . '/';

		$this->model_uploads_images->createThumb(
			$dir_path, 
			$post_array, 
			$image_file = 'raw.jpg'
		);

	}
	
	
}