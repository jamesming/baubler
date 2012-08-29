<?php

class Search extends Controllers_Controller {
	
	function __construct() {
		
		parent::__construct();

		
	}	
	
	
	function index(){
		
		$this->_data->products = $this->model_products_model->get_all_products();
		
		$this->_data->body = "body/search/view";
		
		$this->_data->nav_selected = "nav_product_search";
		
		$this->load->view('index', $this->_data);	  
	}




	function getJsonProducts(){
		
		$tags = $this->input->get('tags');
		$numberOfColors = $this->input->get('numberOfColors');
		
		if( !empty($tags)){
			
			echo json_encode($this->model_products_tags_model->get_distinct_products_where_string_tags_are($tags, $numberOfColors ) );
			
		}else{
			
			echo json_encode($this->model_products_tags_model->get_all_products_tags() );
		};
		
		
	}
	
	function test2(){
		
		
		echo '<pre>';print_r( $this->model_products_model->get_all_products_tags()   );echo '</pre>';  exit;
		
	}
	
	
	function test(){
		
		$tags = $this->input->get('tags');
		$numberOfColors = $this->input->get('numberOfColors');
		
		echo '<pre>';print_r(  $this->model_products_tags_model->get_distinct_products_where_string_tags_are($tags, $numberOfColors)  );echo '</pre>';  exit;
		
		
	}
	
	
	function testing(){?>
		
	<style>
		body{
		background-color:F6F4F5;	
		}
		#main{
			width: 940px;
			margin: 0 auto;
			/*background:url(http://cgt256.files.wordpress.com/2011/03/layout_grid.gif) no-repeat;*/
			min-height: 640px;
			position: relative;
		}
		ul#theContainer{
		}
		ul#theContainer li{
			list-style: none;
			float:left;
			box-shadow: 0 1px 3px rgba(34,25,25,0.4);
			-moz-box-shadow: 0 1px 2px rgba(34,25,25,0.4);
			-webkit-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
			border:6px solid white;
			box-sizing:border-box;			
		}	
	</style>
	<div  id='main' >
		<ul  id='theContainer' >
		</ul>		
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="<?php  echo base_url()   ?>js/libs/masonry/jquery.masonry.min.js"></script>
	<script src="<?php  echo base_url()   ?>js/test.js"></script>

		
		
	<?php     	
	}
	
	
}