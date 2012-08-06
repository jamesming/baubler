<?php

class Models_Uploads {
		
		function __construct(){
		    
		
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
		
		/**
		 * resize_this
		 *
		 * {@source }
		 * @package BackEnd
		 * @param string $full_path
		 * @param string $width 
		 * @param string $height 
		 */
		 
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
		 * crop_and_name_it 
		 *
		 * {@source }
		 * @package BackEnd
		 * @param string $appended_suffix
		 * @param string $full_path 
		 * @param string $dir_path 
		 * @param string $width 
		 * @param string $height 
		 * @param string $x_axis 
		 * @param string $y_axis 
		 * @return string 
		 */
		 
		function crop_and_name_it($new_name = 'cropped.png', $full_path, $dir_path, $width = 300, $height = 300, $x_axis = 0, $y_axis = 0){
		
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
		 * clone_and_resize_append_name_of PNG image
		 *
		 * {@source }
		 * @package BackEnd
		 * @param string $appended_suffix
		 * @param string $full_path 
		 * @param string $width 
		 * @param string $height 
		 * @return string 
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
		 * {@source }
		 * @package BackEnd
		 * @param string $directory_path Path to file or directory
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
					mkdir($path, 0700);
				};
				
			}
		  
		  return $path;
		}


	function cloneAndResizeImage(
		 $url
		,$photo_id
		,$callItFormat
		,$target_width
		,$target_height
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

				$target_height = $this->tools->get_new_size_of (
											$what = 'height', 
											$target_width, 
											$width, 
											$height 
											);																

		}else{

				$target_width = $this->tools->get_new_size_of (
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

		
		$path_to_file = $this->createDirAndRetrievePath( $photo_id );

		

//	  header("Content-type: {$mimetype}");  // IF LINE IS ADDED AND $location is null, will send to browser
	  switch($mimetype) {  
	      case 'image/jpeg': imagejpeg($clone, $path_to_file . $callItFormat .'.jpg', 100); break;  
	      case 'image/png': imagepng($clone, $path_to_file . $callItFormat .'.png'); break;  
	      case 'image/gif': imagegif($clone, $path_to_file . $callItFormat .'.gif'); break;  
	  } 

		imagedestroy($clone);
		imagedestroy($imageFromUrl);	  
	}		
		
		
		
		
		
		
	function cloneFromRemoteURL(
		 $url
		,$photo_id
		,$callItFormat
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

		
		$path_to_file = $this->createDirAndRetrievePath( $photo_id );
		

//	  header("Content-type: {$mimetype}");  // IF LINE IS ADDED AND $location is null, will send to browser
	  switch($mimetype) {  
	      case 'image/jpeg': imagejpeg($clone, $path_to_file . $callItFormat .'.jpg', 100); break;  
	      case 'image/png': imagepng($clone, $path_to_file . $callItFormat .'.png'); break;  
	      case 'image/gif': imagegif($clone, $path_to_file . $callItFormat .'.gif'); break;  
	  } 

		imagedestroy($clone);
		imagedestroy($imageFromUrl);	
		
		
		
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
		
		
		/**
		 * Gets missing width or height based on original size and on new width or height
		 *
		 * {@source }
		 * @package BackEnd
		 * @param string $new_file_name
		 * @param string $orig_file_name
		 * @return bool
		 */
		 
		function copy_file( $orig_file_name, $new_file_name ){
		
			// TAKEN FROM http://stackoverflow.com/questions/226894/
			// how-do-you-copy-a-file-in-php-without-overwriting-an-existing-file
			//
			// The PHP copy function blindly copies over existing files.  We don't wish
			// this to happen, so we have to perform the copy a bit differently.  The
			// only safe way to ensure we don't overwrite an existing file is to call
			// fopen in create-only mode (mode 'x').  If it succeeds, the file did not
			// exist before, and we've successfully created it, meaning we own the
			// file.  After that, we can safely copy over our own file.
		
			if ($file = @fopen($new_file_name, 'x')) {
			    // We've successfully created a file, so it's ours.  We'll close
			    // our handle.
			    if (!@fclose($file)) {
			        // There was some problem with our file handle.
			        return false;
			    }
			
			    // Now we copy over the file we created.
			    if (!@copy($orig_file_name, $new_file_name)) {
			        // The copy failed, even though we own the file, so we'll clean
			        // up by itrying to remove the file and report failure.
			        unlink($new_file_name);
			        return false;
			    }
			
			    return true;
			}
		
		}
		
		
		
		/**
		 * rename_directories_in_right_order
		 *
		 * {@source }
		 * @package BackEnd
		 * @return bool
		 */
		 
		function rename_directories_in_right_order( $dir_path ){
		
				$results = scandir($dir_path);
				
				foreach ($results as $result) {
				    if ($result === '.' or $result === '..') continue;
				    if (is_dir($dir_path . '/' . $result)) {
				        $folders[]=$result;
				    }
				}
				
		
				foreach ($folders as $key => $folder) {
						
						rename($dir_path . '/' . $folder, $dir_path . '/'  . 'temp_' . ( $key + 1));
						
				}		
				
				foreach ($folders as $key => $folder) {
						
						rename($dir_path . '/'  . 'temp_' . ( $key + 1), $dir_path . '/'  .  ( $key + 1));
						
				}		
		
		}
		
		
    
}