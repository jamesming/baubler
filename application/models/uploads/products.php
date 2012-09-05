<?php

class Models_Uploads_Products extends Models_Uploads {
		

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
		
		
		
		public function createJPG_Image($dir_path, $post_array, $image_file, $whichCropSize){
			
			$full_path = $dir_path . $image_file;
			
			$this->crop_and_name_it(
				$new_name = $whichCropSize.'.jpg', 
				$full_path, 
				$dir_path, 
				$width = $post_array['w'],
				$height = $post_array['h'],
				$x_axis = $post_array['x'],
				$y_axis = $post_array['y']
			);
			
			$dimensions = array(
				 'thumb' => array(
						 'width' => 100
						,'height'=> 100
					)
				,'220x180' => array(
						 'width' => 220
						,'height'=> 180
					)
				,'220x380' => array(
						 'width' => 220
						,'height'=> 380
					)
				,'456x180' => array(
						 'width' => 456
						,'height'=> 180
					)
				,'456x380' => array(
						 'width' => 456
						,'height'=> 380
					)
			);
				
			$this->resize_this(
				$full_path = $dir_path . $whichCropSize.'.jpg' 
				,$width  = $dimensions[$whichCropSize]['width']
				,$height  = $dimensions[$whichCropSize]['height']
			);
			
			
		}
	
		public function automaticallyGenerateThumb( $dir_path, $image_file ){
			
			$full_path = $dir_path . $image_file;
			
			$this->crop_and_name_it(
				$new_name = 'thumb.jpg', 
				$full_path, 
				$dir_path, 
				$width = 300,
				$height = 300,
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