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
	
	public function get_products_in_order(){
		
		$products = $this->object_to_array(	$this->get_all_products() );
		
		foreach( $products  as  $product ){
			
			echo $product['id']."<br />";
			
		}
		

		exit;

		
		
		echo '<pre>';print_r(  $order  );echo '</pre>';  exit;	
	
	}	
		
}

