<?php

class Models_Uploads {
		
		function __construct(){
		    
			$this->CI =& get_instance();
			
		}
		
		/**
		 * Delete a file or recursively delete a directory
		 *
		 * {@source }
		 * @package BackEnd
		 * @param string $directory_path Path to file or directory
		 */
		 
		function recursiveDelete($directory_path){
		    if(is_file($directory_path)){
		        return @unlink($directory_path);
		    }
		    elseif(is_dir($directory_path)){
		        $scan = glob(rtrim($directory_path,'/').'/*');
		        foreach($scan as $index=>$path){
		            $this->recursiveDelete($path);
		        }
		        return @rmdir($directory_path);
		    }
		
		}




	function cloneAndResizeImage(
		 $url
		,$pk
		,$callItFormat
		,$target_width
		,$target_height
		,$path_array
		) {  
	
	  $fp = fopen($url, 'rb') or die("Image '$url' not found!");  
	  $buf = '';  
	  
	  while(!feof($fp)){
	  	$buf .= fgets($fp, 4096); 
	  }
	  
	  $imageFromUrl = imagecreatefromstring($buf);  
	  
		$info = getimagesize($url);  
	      $width = $info[0];  
	      $height = $info[1];  
	      $mimetype = $info['mime'];
	      
		if( $width > $height){

				$target_height = $this->get_new_size_of (
											$what = 'height', 
											$target_width, 
											$width, 
											$height 
											);																

		}else{

				$target_width = $this->get_new_size_of (
											$what = 'width', 
											$target_height, 
											$width, 
											$height 
											);				

		};
	  
	  $clone = imagecreatetruecolor($target_width, $target_height);
	  
	  imagecopyresampled(
	  	$clone, 
	  	$imageFromUrl, 0, 0, 0, 0, 
	  	$target_width, 
	  	$target_height, 
	  	$width, 
	  	$height
	  ); 

		$path_to_file = $this->set_directory_for_upload ($path_array );

//	  header("Content-type: {$mimetype}");  // IF LINE IS ADDED AND $location is null, will send to browser
	  switch($mimetype) {  
	      case 'image/jpeg': imagejpeg($clone, $path_to_file . '/' . $callItFormat .'.jpg', 100); break;  
	      case 'image/png': imagepng($clone, $path_to_file . '/'. $callItFormat .'.png'); break;  
	      case 'image/gif': imagegif($clone, $path_to_file . '/'. $callItFormat .'.gif'); break;  
	  } 

		imagedestroy($clone);
		imagedestroy($imageFromUrl);	  
	}		
		
		
		
		
	/* 	cloneFromRemoteURL
	*
	*  
	*
	*/
	
	function cloneFromRemoteURL(
		 $url
		,$pk
		,$callItFormat
		,$path_array
	){
		
	  $fp = fopen($url, 'rb') or die("Image '$url' not found!");  
	  $buf = '';  
	  
	  while(!feof($fp)){
	  	$buf .= fgets($fp, 4096); 
	  }
	  
	  $imageFromUrl = imagecreatefromstring($buf);  
	  
		$info = getimagesize($url);  
	      $width = $info[0];  
	      $height = $info[1];  
	      $mimetype = $info['mime'];		
		
	  $clone = imagecreatetruecolor($width, $height);
	  
	  imagecopyresampled(
	  	$clone, 
	  	$imageFromUrl, 0, 0, 0, 0, 
	  	$width, 
	  	$height, 
	  	$width, 
	  	$height
	  ); 

		
		$path_to_file = $this->set_directory_for_upload ($path_array );


//	  header("Content-type: {$mimetype}");  // IF LINE IS ADDED AND $location is null, will send to browser
	  switch($mimetype) {  
	      case 'image/jpeg': imagejpeg($clone, $path_to_file . '/' . $callItFormat .'.jpg', 100); break;  
	      case 'image/png': imagepng($clone, $path_to_file . '/'. $callItFormat .'.png'); break;  
	      case 'image/gif': imagegif($clone, $path_to_file . '/'. $callItFormat .'.gif'); break;  
	  } 

		imagedestroy($clone);
		imagedestroy($imageFromUrl);	
		
	}
		
		
		/**
		 * Sets up directory structure for uploading image file
		 *
		 * {@source }
		 * @package BackEnd
		 * @uses Unit_test::test_tools_set_directory_for_upload()
		 * @param array $path_array
		 */
		 
		function set_directory_for_upload ($path_array ){
			
			$path = 'uploads';
			
			foreach( $path_array as $directory ){
			
				$path .= '/' . $directory;
				
				if( is_dir($path) == FALSE){		
					mkdir($path, 0755);
				};
				
			}
		  
		  return $path;
		}
		

		/**
		 * crop_and_name_it 
		 *
		 */
		 
		function crop_and_name_it(
						  $new_name = 'cropped.png'
						, $full_path
						, $dir_path
						, $width = 300
						, $height = 300
						, $x_axis = 0
						, $y_axis = 0
						){
		
							$config['image_library'] = 'gd2';
							$config['source_image']	= $full_path;
							$config['new_image'] = $dir_path . $new_name;
							$config['thumb_marker']	= '';
							$config['maintain_ratio'] = FALSE;
							$config['width']	= $width;
							$config['height']	= $height;
							$config['x_axis'] = $x_axis;
							$config['y_axis'] = $y_axis;
							
							
							$this->CI->image_lib->initialize($config); 
							$this->CI->image_lib->crop();
					
							$this->CI->image_lib->clear();
							
							return $new_name;
							
		}	
		/**
		 * Gets missing width or height based on original size and on new width or height
		 *
		 * {@source }
		 * @package BackEnd
		 * @param string $what
		 * @param int $based_on_new
		 * @param int $orig_width
		 * @param int $orig_height
		 * @return int $whats_missing
		 */
		 
		function get_new_size_of ($what = 'width', $based_on_new, $orig_width, $orig_height ){
		
			if( $what == 'width'){
				
					$ratio = $orig_width / $orig_height;			
					
					$whats_missing = $based_on_new * $ratio;		
					
			}elseif( $what == 'height'){
		
					$whats_missing = $based_on_new / ($orig_width / $orig_height);		
					
					
			};
		
			return round($whats_missing);
		
		}
		
		function resize_this($full_path, $width, $height){
			
							$config['image_library'] = 'gd2';
							$config['source_image']	= $full_path;
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = TRUE;
							$config['width']	= $width;
							$config['height']	= $height;
							
							$this->CI->image_lib->initialize($config); 
							
							$this->CI->image_lib->resize();
					
							$this->CI->image_lib->clear();
		 
		}	
		
		/**
		 * clone_and_resize_append_name_of PNG image
		 *
		 */
		 
		function clone_and_resize_append_name_of($appended_suffix, $full_path, $width, $height){
			
							$config['image_library'] = 'gd2';
							$config['source_image']	= $full_path;
							$config['create_thumb'] = TRUE;
							$config['maintain_ratio'] = TRUE;
							$config['width']	= $width;
							$config['height']	= $height;
							
							$config['thumb_marker']	= $appended_suffix;
							
							$this->CI->image_lib->initialize($config); 
							
							$this->CI->image_lib->resize();
					
							$this->CI->image_lib->clear();
							
		}
		
		
		
		/**
		 * Rotates a file according to direction passed
		 *
		 */
		 
		function rotate($full_path, $rotation){
			
		
					$config['image_library'] = 'gd2';
					$config['source_image']	= $full_path;
					
					if( $rotation == 'right'){
						$config['rotation_angle'] = '270';
					}else{
						$config['rotation_angle'] = '90';
					};
					
					$this->CI->image_lib->initialize($config);
					$this->CI->image_lib->rotate();
					$this->CI->image_lib->clear();
		
		}  
		
		
		
}