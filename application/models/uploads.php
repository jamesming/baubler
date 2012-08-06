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




	function cloneAndResizeImage(
		 $url
		,$pk
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

		
		$path_array = array(
			 'folder' => 'images'
			,'image_id' => $pk
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
		
	function cloneFromRemoteURL(
		 $url
		,$pk
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

		
		$path_array = array(
			 'folder' => 'images'
			,'image_id' => $pk
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
		
		
    
}