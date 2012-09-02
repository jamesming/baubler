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
			$order_direction = 'asc'
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
	

	protected function tryUntilCropSizeFound( $cropSize ){
		
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
		
		do {
			foreach( $this->_order  as  $arrangements){
				
				foreach( $arrangements  as  $cropSize){
					
					$product = $this->tryUntilCropSizeFound( $cropSize );
					
	//				$order_arranged[] = array(
	//					 'cropSize' => $cropSize
	//					,'product_id' => $product['id']
	//				);
					
					$order_arranged[] = $product['id'];
					
				}
				
			}			
		} while ( count($this->products) > 0 );		


		
		return json_encode($order_arranged);
		//echo '<pre>';print_r( $order_arranged  );echo '</pre>';  exit;
		
	}	
	

}

