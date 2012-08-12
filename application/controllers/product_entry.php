<?php

class Product_entry extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->model_uploads_products = new Models_Uploads_Products;
		
		$this->maxCropWidth = '900';
		$this->maxCropHeight = '700';
		
	}	
	

	public function index() {
		
		$this->_data->body = "body/product_entry/view";
		
		$this->_data->nav_selected = "nav_product_entry";		
		
		$this->load->view('index', $this->_data);	
	}



	public function insert(){
		
		$post_array = $this->input->post();
		
		$table = 'products';
		
		$numberOfColors = $post_array['numberOfColors'];
		
		unset($post_array['numberOfColors']);
		
		$this->model_products_form->create_generic_table($table);
		
		$this->model_products_form->create_fields_with_post($table, $post_array);
		
		$tags = $post_array['tags'];
		
		unset($post_array['tags']);	
		
		$product_id = $this->model_products_form->insert_table($table, $post_array);
		
		$this->model_products_form->insert_products_tags( 
			$product_id
			,$tags = $tags
			,$numberOfColors = $numberOfColors
		);
		
		$this->makeSomeCopyOfUrl( $post_array, $product_id );
		
	}
	
	public function update(){
		
		$post_array = $this->input->post();
		
		$table = 'products';		
		
		$product_id = $post_array['product_id'];
		
		unset($post_array['product_id']);
		
		$this->model_products_form->insert_products_tags( 
			$product_id
			,$tags = $post_array['tags']
			,$numberOfColors = $post_array['numberOfColors']
		);
		
		unset($post_array['tags']);	 
		unset($post_array['numberOfColors']);	 
		
		echo $this->model_products_form->update_table_where( 
			$table, 
			$where_array = array(
				'id' => $product_id
			), 
			$set_what_array = $post_array
		);

//		$this->makeSomeCopyOfUrl( $post_array, $product_id );
	}
	
	public function makeSomeCopyOfUrl( $post_array, $pk ){
		
			$url = $post_array['url'];
			
			$info = getimagesize($url);  
			
      $width_of_file = $info[0];  
      $height_of_file = $info[1];
      
			$this->model_products_form->update_table_where( 
						$table = 'products', 
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
				'folder' => 'products'
				,'product_id' => $pk
			);
		
			$this->model_uploads_products->cloneFromRemoteURL(
				 $url
				,$product_id = $pk
				,$callItFormat = 'raw'
				,$path_array
			);
			
			
			
			if( $width_of_file > $this->maxCropWidth || $height_of_file > $this->maxCropHeight){

				$this->model_uploads_products->cloneAndResizeImage(
						 $url
						,$product_id = $pk
						,$callItFormat = 'crop_ready'
						,$target_width = $this->maxCropWidth
						,$target_height = $this->maxCropHeight
						,$path_array
				);
				
				$cropfile = 'crop_ready.jpg';		
				
			}else{
				
				$cropfile = 'raw.jpg';
				
			};
			
			$this->model_uploads_products->cloneAndResizeImage(
					 $url
					,$product_id = $pk
					,$callItFormat = 'image'
					,$target_width = 270
					,$target_height = 300
					,$path_array
			);
			
			$dir_path = 'uploads/products/' . $pk . '/';
			
			$this->model_uploads_products->automaticallyGenerateThumb( 
				 $dir_path
				,$image_file = $cropfile
			);
		
	}
	
	public function getJsonAllProducts(){
		
		echo json_encode($this->model_products_form->get_all_products());
		
	}

	public function getJsonProductsWherePkIs(){
		
		$product_id  = $this->input->get('id');
		
		$tags =  $this->model_products_form->get_all_tags_for_product_id( $product_id );
		
		$product = $this->model_products_form->get_products_where(
			$product_id 
		);

		
		$product_info['product'] = $product;
		$product_info['tags'] = $tags;
		
		
		echo json_encode( $product_info );
		
	}
	
	public function jcrop(){
		
		$post_array = $this->input->post();
		
		$table = $post_array['table'];
		
		unset($post_array['table']);		
		
		$pk = $post_array['product_id'];
		
		unset($post_array['product_id']);		
		
		$dir_path = 'uploads/products/' . $pk . '/';

		$this->model_uploads_products->createThumb(
			$dir_path, 
			$post_array, 
			$product_file =  $post_array['cropfile'] . '.jpg'
		);

	}
	
	
}