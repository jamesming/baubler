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
	
	private function tryProductTillWorks( $cropSize ){
		
		$product = array_shift($this->products);
		
		$file = 'uploads/products/'.$product['id'].'/'.$cropSize.'.jpg';
		
		if( file_exists( $file ) ){
			
			return $product;
			
		}else{
			
//			$product = array_shift($this->products);
//			
//			return $product;
			
			echo $product['id']."<br />";
			
		};
		
	}
	
	public function get_products_in_order( ){
		
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
		
		exit;

		foreach( scandir('uploads/products/'.$product['id']) as $file){
			
			echo rand(1, 4)."<br />";
			
			if( $file == '220x180.jpg'){$_220x180[] = $product['id'];};
			if( $file == '220x380.jpg'){$_220x380[] = $product['id'];};
			if( $file == '356x180.jpg'){$_356x180[] = $product['id'];};
			if( $file == '456x380.jpg'){$_456x380[] = $product['id'];};
			
		}		
		echo '<pre>';print_r(  $_220x180  );echo '</pre>';  
		echo '<pre>';print_r(  $_220x380  );echo '</pre>';  
		echo '<pre>';print_r(  $_356x180  );echo '</pre>';  
		echo '<pre>';print_r(  $_456x380  );echo '</pre>';  
		
		exit;
		
		foreach( $this->_order  as  $arrangements){
			foreach( $arrangements  as  $arrangement){
				$order[] = $arrangement;
			}
		}
		
		
		do {
			
			$cropSize = array_shift($order);
			
			$product = $this->tryProductTillWorks( $cropSize );
			
			$file = 'uploads/products/'.$product['id'].'/'.$cropSize.'.jpg';
			
			echo "<img src=' "  .base_url() . $file." '>"."<br />";
			
			
		} while ( count( $this->products ) > 0);
		
		
		
		echo '<pre>';print_r(  $order  );echo '</pre>';  exit;
		
		
		
		foreach( $this->_order  as  $arrangements){
			
			foreach( $arrangements  as  $arrangement){
				
				$product = array_shift($products);
				
				$file = 'uploads/products/'.$product['id'].'/'.$arrangement.'.jpg';
				
				if ( ! file_exists( $file )) {
					
					echo $file . " : NO"."<br />";
					
					$skipped[] = $product['id'];
					
				}else{
					echo $file . " : YES"."<br />";
					echo "<img src=' "  .base_url() . $file." '>"."<br />";
				};
				
			}
			
		}
		
		echo '<pre>';print_r(  $skipped  );echo '</pre>';  exit;
		
		exit;
	
	}	
		
}

