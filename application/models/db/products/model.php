<?php

class Models_Db_Products_Model extends Database {
	
	protected $_order = array(
	
						 'first' => array(
						 		 '220x380'
						 		,'456x180'
						 		,'220x180'
						 		,'220x380'
						 		,'456x380'
						 		,'220x180'			
						)
						,'second' => array(
						 		 '220x380'
						 		,'456x380'
						 		,'220x180'
						 		,'220x180'
						 		,'220x180'
						 		,'456x180'
						 		,'220x180'		
						)
						,'third' => array(
						 		 '456x380' 			 		
						 		,'456x180'
						 		,'456x380'
						 		,'456x180' 		
						)	
						,'fourth' => array(
						 		 '220x380'
						 		,'220x180'
						 		,'220x180'
						 		,'220x180'
						 		,'456x380'
						 		,'220x380'
						 		,'220x180'	
						)	
						,'fifth' => array(
						 		 '220x180'
						 		,'220x380'
						 		,'220x180'
						 		,'220x180'
						 		,'220x180'	 			 			 			  
						 		,'456x380'
						 		,'456x180'	
						)																	
					);

	public function get_all_products(){
		
		return $this->select_from_table( 
			$table = 'products', 
			$select_what = '*', 
			$where_array = array(),
			$use_order = TRUE,
			$order_field = 'created',
			$order_direction = 'desc'
		);
	}
	
	public function get_products_where($product_id){
		
		return $this->select_from_table( 
			$table = 'products', 
			$select_what = '*', 
			$where_array = array(
				'id' => $product_id
			)
		);
		
	}
	

	protected function tryThis( $cropSize ){
		
		$idx = 0;
		
		foreach( $this->products  as  $product){
			
			$file = 'uploads/products/'.$product['id'].'/'.   $cropSize  .'.jpg';
			
			if ( file_exists( $file )) {
				
				array_splice($this->products, $idx, 1);
			
				return $product;
			
			};
			
			$idx++;			
			
		}
		
		
	}
	
	public function get_products_in_order( ){
		
		$this->products = $this->object_to_array(	$this->get_all_products() );		

		foreach( $this->_order  as  $arrangements){
			
			foreach( $arrangements  as  $cropSize){
				
				$product = $this->tryThis( $cropSize );
				
//				$order_arranged[] = array(
//					 'cropSize' => $cropSize
//					,'product_id' => $product['id']
//				);
				
				$order_arranged[] = $product['id'];
				
			}
			
		}
		
		
		return json_encode($order_arranged);
		//echo '<pre>';print_r( $order_arranged  );echo '</pre>';  exit;
		
	}	
	
	
	function testRandomCropSizes(){
		
		$cropSizes = array(
			  array(
			 	 'name' =>'220x180'
			 	,'products' => array()
			 )
			 ,array(
			 	 'name' =>'220x380'
			 	,'products' => array()
			 )
			 ,array(
			 	 'name' =>'356x180'
			 	,'products' => array()
			 )
			 ,array(
			 	 'name' =>'456x380'
			 	,'products' => array()
			 )			 
		);
		
		$this->products = $this->object_to_array(	$this->get_all_products() );
		
		
		foreach( $this->products  as  $product){
			
			do {
				
				$random_selected = rand(0, 3);
				
				$oneRandomCropSize = $cropSizes[$random_selected]['name'];
				
				$file = 'uploads/products/'.$product['id'].'/'. $oneRandomCropSize .'.jpg';				
				
			} while ( !file_exists( $file ) );
			
			
			$cropSizes[$random_selected]['products'][] = $product['id'];
			

		}
		
		echo '<pre>';print_r(  $cropSizes  );echo '</pre>';  exit;	
		
	}
		
}

