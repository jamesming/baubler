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
		
//			console.log('numberOfColors: ' + JSON.stringify(this.numberOfColors));
//			console.log('post_array: ' + JSON.stringify(this.tags));
		
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

