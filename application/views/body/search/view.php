<style>
.results.container {
  background: #FFF;
  padding: 5px;
  margin-bottom: 20px;
  border-radius: 5px;
  clear: both;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
}

.results.container .box {
  margin: 5px;
  padding: 5px;
  background: #D8D5D2;
  font-size: 11px;
  line-height: 1.4em;
  float: left;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
}



.results.container .box img{
  display: block;
  width: 100%;
}


.col1 { width: 80px; }
.col2 { width: 180px; }
.col3 { width: 280px; }
.col4 { width: 380px; }
.col5 { width: 480px; }

.col1 img { max-width: 80px; }
.col2 img { max-width: 180px; }
.col3 img { max-width: 280px; }
.col4 img { max-width: 380px; }
.col5 img { max-width: 480px; }
</style>


<?php $this->load->view($tags_container); ?>

<div class="results container">



</div> <!-- #container -->


<script type="text/javascript" language="Javascript">

	$(document).ready(function() {
		
		_.extend(core, {
			
			 init_search: function(){
			 	
			 			core.getProducts();
			 	
						var container = $('.results.container');			 	

				    container.imagesLoaded( function(){
				    	
					    container.masonry({
				        itemSelector : '.box'
				      });										    	
				    	
				    });		

				
			}
			,getProducts: function(){
				

							
								$.getJSON( window.base_url  + 'search/getJsonProducts',
								
										{
											 tags: this.tags.join(",")
											,numberOfColors: this.numberOfColors
										},
								
										function(data) {
											
											var  boxes = ''
													,id;										
		
											$.each(data, function(key, val) {
												
												$.each(val, function(key2, val2) {
														
														if( key2 === 'product_id'){
															
															product_id = val2;
															
															boxes += '\
														    <div class="box photo ">\
													      	<a href="#" title=""><img  src="' + window.base_url + 'uploads/products/' + product_id + '/image.jpg" alt="" /></a>\
													   		</div>\
															';
															
														};
														
														
												});
												
											});	
											
											
											$('.results.container').html(boxes);
											
											$('.photo').addClass('col2');
											
											var container = $('.results.container');


											//container.masonry( 'remove');
											
									    container.imagesLoaded( function(){
										    	
									    	container.masonry('reload');
									    	
									      
									    });					
									    
										}
								);							
							

				
				return;
					
						
			}
			
		});
		
//		core.loadCSS(window.base_url  + 'js/libs/masonry/jquery.masonry.min.js');
		core.loadScript('masonry', window.base_url  + 'js/libs/masonry/jquery.masonry.min.js', function(){
			
			core.init_search();	
			
		}); 
		
		core.processCallbackQueue();		
		
	});
	
	
</script>