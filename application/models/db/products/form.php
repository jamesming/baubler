<?php

class Models_Db_Products_Form extends Database {
		
		
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
		
		public function get_products_where($pk){
			
			return $this->select_from_table( 
				$table = 'products', 
				$select_what = '*', 
				$where_array = array(
					'id' => $pk
				)
			);
			
			
		}
		
}