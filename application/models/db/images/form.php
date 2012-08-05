<?php

class Models_Db_Images_Form extends Database {
		
		public function mytest() {
			
		echo "<script>
//				console.log('php: Models_Db_Images_Form::mytest()  from model/db/images/form.php');
			</script>";



		}
		
		public function get_all_images(){
			
			return $this->select_from_table( 
				$table = 'images', 
				$select_what = '*', 
				$where_array = array()
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