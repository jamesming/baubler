<?php

class Image_entry extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->model_images_form = new Models_Db_Images_Form;
		$this->model_uploads_images = new Models_Uploads_Images;
		
		$this->maxCropWidth = '900';
		$this->maxCropHeight = '700';
		
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
		
			$url = $post_array['url'];
			
			$info = getimagesize($url);  
			
      $width_of_file = $info[0];  
      $height_of_file = $info[1];
      
			$this->model_images_form->update_table_where( 
						$table = 'images', 
						$where_array = array(
							'id' => $pk
						), 
						$set_what_array = 
							array(
								 'width' => $width_of_file
								,'height' => $height_of_file
								,'cropfile' => 
										(    $width_of_file  > $this->maxCropWidth 
											|| $height_of_file > $this->maxCropHeight ? 'crop_ready' : 'raw' ) 
							)
					);
      
			
			$path_array = array(
				'folder' => 'images'
				,'image_id' => $pk
			);
		
			$this->model_uploads_images->cloneFromRemoteURL(
				 $url
				,$image_id = $pk
				,$callItFormat = 'raw'
				,$path_array
			);
			
			if( $width_of_file > $this->maxCropWidth || $height_of_file > $this->maxCropHeight){

				$this->model_uploads_images->cloneAndResizeImage(
						 $url
						,$image_id = $pk
						,$callItFormat = 'crop_ready'
						,$target_width = $this->maxCropWidth
						,$target_height = $this->maxCropHeight
						,$path_array
				);			
				
			};
			
			$this->model_uploads_images->cloneAndResizeImage(
					 $url
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
		
		$results = $this->model_images_form->get_images_where(
			$pk  = $this->input->get('id')
		);
		
		$results = $this->model_images_form->object_to_array($results);
		
//		$foo = array(
//			'test' => 'test2'
//		);
		
		foreach( $results  as  $key => $result){
			
			$foo[$key] = $result;
			
		};
		
		
		echo json_encode( $foo );
		
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
			$image_file =  $post_array['cropfile'] . '.jpg'
		);

	}
	
	
}