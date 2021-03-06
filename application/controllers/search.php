<?php

class Search extends Base_Controller {
	
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
	
	
	function getJsonProductsInOrder(){
		
		echo $this->model_products_model->get_products_in_order();		
		
	}

	
	function testing(){?>
	<!doctype html>
	<head>
	<style>
		body{
		background-color:#F6F4F5;	
		}
		#main{
			margin: 0 auto;
			/*background:url(http://cgt256.files.wordpress.com/2011/03/layout_grid.gif) no-repeat;*/
			min-height: 840px;
			position: relative;
		}
		#main ul{
			width:100%;
			margin:0px 0px 0px 0px;
		}
		#main ul li{
			list-style: none;
			float:left;
			box-shadow: 0 1px 3px rgba(34,25,25,0.4);
			-moz-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
			-webkit-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
			padding:0px 0px 0px 0px;	
		}
		#main ul li img{
			border:5px solid white;
			margin:0px 0px 0px 0px;	
		};
	</style>
	</head>
	<body>
	<div  id='main' >
	</div>
	</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="<?php  echo base_url()   ?>js/libs/masonry/jquery.masonry.min.js"></script>
	<script src="<?php  echo base_url()   ?>js/test.js?v=<?php  echo rand(234234)   ?>"></script>

		
		
	<?php     	
	}
	
	
}