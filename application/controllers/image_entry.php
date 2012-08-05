<?php

class Image_entry extends Controllers_Controller {
	
	public function index() {
		
		$model_images_form = new Models_Db_Images_Form;
		$model_images_form->mytest();
		
		$model_uploads_images = new Models_Uploads_Images;
		$model_uploads_images->mytest();		
		
		
		$this->_data->body = "body/image_entry/view";
		$this->load->view('index', $this->_data);	
	}


	public function update(){
		
		$post_array = $this->input->post();
		
		$table = $post_array['table'];
		
		unset($post_array['table']);
		
		echo '<pre>';print_r( $post_array  );echo '</pre>';  exit;
		
	}

}