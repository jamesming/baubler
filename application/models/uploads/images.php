<?php

class Models_Uploads_Images extends Models_Uploads {
		

		public function createThumb($dir_path, $post_array, $image_file){
			
			$full_path = $dir_path . $image_file;
			
			$this->crop_and_name_it(
				$new_name = 'thumb.jpg', 
				$full_path, 
				$dir_path, 
				$width = $post_array['w'],
				$height = $post_array['h'],
				$x_axis = $post_array['x'],
				$y_axis = $post_array['y']
			);
				
			$this->resize_this(
				$full_path = $dir_path . 'thumb.jpg' 
				,$width  = 100
				,$height  = 100
			);
			
			
		}
	
		public function automaticallyGenerateThumb( $dir_path, $image_file ){
			
			$full_path = $dir_path . $image_file;
			
			$this->crop_and_name_it(
				$new_name = 'thumb.jpg', 
				$full_path, 
				$dir_path, 
				$width = 100,
				$height = 100,
				$x_axis = 0,
				$y_axis = 0
			);
				
			$this->resize_this(
				$full_path = $dir_path . 'thumb.jpg' 
				,$width  = 100
				,$height  = 100
			);
			
			
		}
    
}