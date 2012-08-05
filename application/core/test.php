<?php

class Test {
	
	public function __construct() {
		echo "test"."<br />";;
	}	
	
	public function test() {
		
	}
	
	public static function test2() {
			echo "<script>
				console.log('php: coming from Test::test2 from core/test.php');
			</script>";
	}	

}