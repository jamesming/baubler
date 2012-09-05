<?php
class ClassLoader {
	
	public static $caching 				= FALSE;
	
	protected static $_paths = array(
								 APPPATH
								,'application/core/'
								,'application/controllers/'
								,'application/models/'
						 );
																			 
	protected static $_files 			= array();
	protected static $_files_changed 	= FALSE;
	
	public static function auto_load($class) {
		

		// Transform the class name into a path
		$file = str_replace('_', '/', strtolower($class));

		if ($path = ClassLoader::find_file($file)) {
			
//			echo "<script>
//				console.log('php: " . $path . "');
//			</script>";
			
			// Load the class file
			require $path;

			// Class has been found
			return TRUE;
		}

		// Class is not in the filesystem
		return FALSE;
	}
	
	public static function find_file($file, $ext = NULL) {
		if ($ext === NULL) {
			// Use the default extension
			$ext = EXT;
		} elseif ($ext) {
			// Prefix the extension with a period
			$ext = ".{$ext}";
		} else {
			// Use no extension
			$ext = '';
		}

		// Create a partial path of the filename
		$path = $file.$ext;
		if (ClassLoader::$caching === TRUE AND isset(ClassLoader::$_files[$path])) {
			// This path has been cached
			return ClassLoader::$_files[$path];
		}

		// The file has not been found yet
		$found = FALSE;
		foreach (ClassLoader::$_paths as $dir) {
			
			if( $path =='db.php'){
				echo "<script>
					console.log('* php: " . $dir.$path . "');
				</script>";				
				
			};

			
			
			
			if (is_file($dir.$path)) {
				$found = $dir.$path;
				break;
			}
		}

		if (ClassLoader::$caching === TRUE) {
			// Add the path to the cache
			ClassLoader::$_files[$path] = $found;

			// Files have been changed
			ClassLoader::$_files_changed = TRUE;
		}
		
		return $found;
	}
}