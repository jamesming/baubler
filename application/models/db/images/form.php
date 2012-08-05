<?php

class Models_Db_Images_Form extends Database {
		
		public function mytest() {
			
			$array = $this->select_from_table( 
			$table = 'images', 
			$select_what = '*', 
			$where_array = array()
			);
			
			echo "<script>
				console.log('php: Model_Images_Form::mytest()  from model/images/form.php');
			</script>";
		}	
        
    
}