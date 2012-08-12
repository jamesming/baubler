<?php

class Models_Db_Tags_Model extends Database {
	
		public function get_all_tags(){
			
					return $this->getTheTagsInsider($where_array = array());

		}	
		
		
		
		public function getTagsWhereParentTagId($parent_tag_id ){
			
					return $this->getTheTagsInsider($where_array = array('tags.parent_tag_id' => $parent_tag_id));
			
		}
		
		
		private function getTheTagsInsider($where_array){
			
				$join_array = array(
												'tags' => 'tags.tags_type_id = tags_types.id'
												);	
														
					
					$_tags_types =  $this->select_from_table_left_join( 
								 $table = 'tags_types' 
								,$select_what = '
										tags_types.id as tags_type_id
									, tags_types.name as tags_type_name
									, tags.id as tag_id
									, tags.parent_tag_id as parent_tag_id
									, tags.name as tag_name '
								,$where_array
								,$use_order = TRUE
								,$order_field = 'tags_types.id'
								,$order_direction = 'asc'
								,$limit = -1
								,$use_join = TRUE
								, $join_array
								);
								
					if( empty($_tags_types) ){
						return array();
					};
					
					
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
										$tag['parent_tag_id'] = $_tags_type['parent_tag_id'];
										$tag['tags_type_name'] = $_tags_type['tags_type_name'];										
										
										
										$bag[] = $tag;
										 
										$tags[$tags_types_names[$i]] = $bag;									
									
								};
								

								
							}
							unset($tag, $bag);
					}
			return $tags;
		}
		
}

