<?php

class Models_Db_Images_Form extends Database {
		
		
		public function get_all_images(){
			
			return $this->select_from_table( 
				$table = 'images', 
				$select_what = '*', 
				$where_array = array(),
				$use_order = TRUE,
				$order_field = 'created',
				$order_direction = 'desc'
			);
		}
		
		public function get_images_where($pk){
			
			return $this->select_from_table( 
				$table = 'images', 
				$select_what = '*', 
				$where_array = array(
					'id' => $pk
				)
			);
			
			
		}
		
}