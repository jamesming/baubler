<?php

class Models_Db_Products_Tags_Model extends Database {
	
		public function insert_products_tags( $product_id, $tags, $numberOfColors ){

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
								,'numberOfColors' => $numberOfColors
							);
				
				$this->insert_table(
					 $table
					,$what_array
				);
				
			};
			
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
		
		
		public function get_all_products_tags(){
			
			return $this->object_to_array($this->select_from_table( 
				$table = 'products_tags'
				,$select_what = 'product_id'
				,$where_array = array()
				,$use_order = TRUE
				,$order_field = 'created'
				,$order_direction = 'asc'
				,$limit = -1
				,$use_join = FALSE
				,$join_array = array()
				,$group_by_array = array('product_id')
			));
		}
		
		public function get_distinct_products_where_string_tags_are( $tags, $numberOfColors ){
			
			$query = 
			
			  "SELECT DISTINCT product_id "
			
	    . "FROM `products_tags` " 
	    
	    . " where tag_id in (" . $tags . ")"
	    
	    . ( $numberOfColors == 0  ?  '':    " and numberOfColors = " . $numberOfColors ) 
	    
	    . " group by product_id "
	    
	    . " having count(*) = " . count( explode(',', $tags) )  
	    
	    . " ORDER BY tag_id";
				
				
			return $this->select_from_query($query);
			
		}
		
		
}

/* 

		
		public function get_all_products_from_tags($tags){

					$where_array = array();
			
					$join_array = array(
												 'products' => 'products.id = products_tags.product_id'
												,'tags' => 'tags.id = products_tags.tag_id'
												);	
					
					return  $this->select_from_table_left_join( 
								 $table = 'products_tags' 
								,$select_what = '
												 products.id as product_id
												,products.url as product_url
												,products_tags.tag_id as products_tags_tag_id
												,tags.name as tags_name
											'
								,$where_array 
								,$use_order = TRUE
								,$order_field = 'products.id'
								,$order_direction = 'asc'
								,$limit = -1
								,$use_join = TRUE
								,$join_array 
								,$group_by_array = array('product_id')
								,$or_where_array = array()
								,$where_in_array = array(
									 'field' => 'tag_id'
									,'ids' => $tags
								)
							);
								

			
		}
		


SELECT DISTINCT product_id, tag_id FROM  products_tags  where tag_id in (1, 7 ) group by product_id having count(*) = 2  ORDER BY tag_id

*/

