<?php

class Models_Db_Products_Form extends Database {
	
		public function get_all_tags(){
			
					$join_array = array(
												'tags' => 'tags.tags_type_id = tags_types.id'
												);	
														
					
					$_tags_types =  $this->select_from_table_left_join( 
								 $table = 'tags_types' 
								,$select_what = '
										tags_types.id as tags_type_id
									, tags_types.name as tags_type_name
									, tags.id as tag_id
									, tags.name as tag_name '
								,$where_array = array()
								,$use_order = TRUE
								,$order_field = 'tags_types.name'
								,$order_direction = 'asc'
								,$limit = -1
								,$use_join = TRUE
								, $join_array
								);
								
								
					$_tags_types = $this->object_to_array($_tags_types);
					
					
					$tags_types_ids = array();
					$tags_types_names = array();
					
					// get unique elements in nested array.
					foreach ( $_tags_types  as $_tags_type){
						if (!in_array($_tags_type['tags_type_id'], $tags_types_ids)){
							 array_push($tags_types_ids, $_tags_type['tags_type_id']);
							 array_push($tags_types_names, $_tags_type['tags_type_name']);
						};
					}
					
					$length_tags_types_ids = count($tags_types_ids);
					
					for($i=0 ; $i < $length_tags_types_ids; $i++){
						
							foreach( $_tags_types  as $_tags_type){
								
								if(    $tags_types_ids[$i] == $_tags_type['tags_type_id']
										&& !empty($_tags_type['tag_id'])
										){
									
										$tag['tag_id'] = $_tags_type['tag_id'];
										$tag['tag_name'] = $_tags_type['tag_name'];
										$tag['tags_type_id'] = $_tags_type['tags_type_id'];
										
										
										$bag[] = $tag;
										 
										$tags[$tags_types_names[$i]] = $bag;									
									
								};
								

								
							}
							unset($tag, $bag);
					}
					
								
					return $tags;


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
		
		public function get_all_products_from_tags_beta($tags){

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
								,$where_in_array = array()
								,$whereFieldIsSame = array(
									 'field' => 'tag_id'
									,'ids' => $tags
								)
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
		
		
		public function get_distinct_products_where_string_tags_are( $tags ){
			
			$query = "SELECT DISTINCT product_id\n"
	    . "FROM `products_tags` where tag_id in (" . $tags . ")\n"
	    . "group by product_id\n"
	    . "having count(*) = " . count( explode(',', $tags) )  .  "\n"
	    . "ORDER BY tag_id";
				
				
			return $this->select_from_query($query);
			
		}
		
		
}


/* 
SELECT DISTINCT product_id, tag_id FROM  products_tags  where tag_id in (1, 7 ) group by product_id having count(*) = 2  ORDER BY tag_id
*/