<?php

class Models_Db_Products_Form extends Database {
	
		public function get_all_tags(){
			
			return $this->select_from_table( 
				$table = 'tags', 
				$select_what = '*', 
				$where_array = array()
			);
		}	
		

		public function get_all_tags_for_product_id( $product_id ){
			
			return $this->select_from_table( 
				$table = 'products_tags', 
				$select_what = '*', 
				$where_array = array(
					'product_id' => $product_id
				)
			);
		}


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
		
		public function insert_products_tags( $product_id, $tags ){

			$table = 'products_tags';			
			
			echo $this->delete_from_table(
				 $table
				,$where_array = array(
						'product_id' => $product_id
				)
			);

			foreach( $tags  as  $tag_id ){
				
				$what_array  = array(
								 'product_id' => $product_id
								,'tag_id' => $tag_id
							);
				
				$this->insert_table(
					 $table
					,$what_array
				);
				
			};
			
		}
		
}