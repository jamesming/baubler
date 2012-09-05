<?php

class Tags extends Base_Controller {
	
	function __construct() {
		
		parent::__construct();
		

		
	}	
	

	public function index() {
		
		
			echo json_encode(  $this->_data->tags  );
			
	}
	
	function getJsonTagsWhereParentTagId(){
		
		$parent_tag_id = $this->input->get('parent_tag_id');
		
			
		echo json_encode($this->models_tags_model->getTagsWhereParentTagId($parent_tag_id ) );
			
		
	}
	
	
	function test(){
		
		$parent_tag_id = $this->input->get('parent_tag_id');
		
		echo '<pre>';print_r(  $this->models_tags_model->getTagsWhereParentTagId($parent_tag_id )   );echo '</pre>';  exit;
		
	}
	
}