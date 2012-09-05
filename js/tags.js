_.extend(core, {
			
			  init_tags:function(){
			  	
			  this.setTagsProperties();
				
				this.bindClickToChooseColor();
				
				this.bindClickToChooseArticle();	
				
				this.getAllTags();			
				
			}

			,setTagsProperties:function(){
	 			
	 			this.tags = [];
	 			
	 			this.all_tags = {};
	 			
	 			this.numberOfColors = 0;
	 			
			}
			
			,getAllTags:function(){
				
						var that = this;
				
						$.getJSON( 
						
								window.base_url  + 'tags',
				
								{ },
						
								function(data) {

									$.each(data, function(key, val) {
										
										that.all_tags[key] = [];
										
										$.each(val, function(key2, val2) {
											
													$.each(val2, function(key3, val3) {
														
															if( key3 === 'tag_id'){
																
																that.all_tags[key].push(val3);
																
															};
													});
													
										});
										
									});
									
								}
						);	
						
						
			}
			
			,getTypeOfAndCustomTagsButtonsBasedOnTheArticleTag: function(tag_id, callback ){

				var	 that = this
						,tag_id
						,tag_name
						,tags_type_name
						,tag_box = ''
						,boxed_tag = {};
						

				$.getJSON( 
				
						window.base_url  + 'tags/getJsonTagsWhereParentTagId',
		
						{'parent_tag_id': tag_id },
				
						function(data) {
							
							that.boxed_tags = data;

							if( data.length === 0){
								
									that.clear_tags_from_category('custom');		
									that.clear_tags_from_category('typeOf');	
								
							};
							
							
							
							$.each(data, function(key, val) {
								
								
								$.each(val, function(key2, val2) {
									
									
											$.each(val2, function(key3, val3) {
												
													if( key3 === 'tag_id'){
														
														tag_id = val3;
														
														
													};
													
													if( key3 === 'tag_name'){
														
														tag_name= val3;
														
													};
													
													if( key3 === 'tags_type_name'){
														
														tags_type_name = val3;
														
													};
													
													
											});
											
											
											tag_box +="\
												<div  class='box fl' tag_id='" + tag_id  + "'  >" + tag_name + "</div>\
											";
											
											
								});
								
								
								
								$('.' + tags_type_name + ' .box_wrapper').html(tag_box);
								tag_box = '';
								
								
							});
							
							

							
						}
				).complete(function() { 
					callback();
				});	
															
															
			}							
			
			,clearAllTags: function(){
				
							this.clear_tags_from_category('articles');		
							this.clear_tags_from_category('custom');		
							this.clear_tags_from_category('typeOf');		
							this.clear_tags_from_category('color');
			}
			
			,clear_tags_from_category:function( category ){
				
				var that = this;
				
				if( category === 'color'){
					$('.tags.container .colors .box').empty().data('checked', false);
					this.numberOfColors = 0;
				}else{
					$('.tags.container .' + category + ' .box').data('checked', false).css({background:'white'});
				};
	
				$.each(this.all_tags[category], function(key, tag_id) {
				
					var idx = that.tags.indexOf( tag_id );
					
					if( idx != -1){
						
						that.tags.splice(idx, 1);
						
					};
				
				});	
				
			}							
							
			,bindClickToChooseColor: function(){
				
					var that = this;
				
					$('.tags.container .colors .box').live('click', function(event) {
						
						if( $(this).data('checked') === true ){
							var idx = that.tags.indexOf($(this).attr('tag_id'));
							that.tags.splice(idx, 1);
							$(this).data('checked', false ).html('');
							that.numberOfColors--;
						}else{
							that.tags.push($(this).attr('tag_id')); 
							$(this).data('checked', true ).html('&#10003');
							that.numberOfColors++;
						};
						
						
						if( that.hasOwnProperty('getProducts')){
							
							that.getProducts();
							
						};
						
						
					});	
				
			}
			
			,bindClickToChooseArticle:function(){
				
				var  that = this;
						
				$('.tags.container .articles .box').bind('click', function(event) {
					
					that.article_tag_id = $(this).attr('tag_id');
					
					$('#mode').html('Update').data('mode', 0);
					
					core.mode = 0;
					
					$('.typeOf .box_wrapper, .custom .box_wrapper').empty();
					
					if( $(this).data('checked') === true ){
						
						var idx = that.tags.indexOf($(this).attr('tag_id'));
						that.tags.splice(idx, 1);
						$(this).data('checked', false ).css({background:'white'});
						
					}else{
				
						$('.articles .box').data('checked', false ).css({background:'white'});
						
						that.clear_tags_from_category('articles');
						that.clear_tags_from_category('custom');		
						that.clear_tags_from_category('typeOf');																			
						
						if( $(this).data('checked') === true ){
							
							$(this).data('checked', false ).css({background:'white'});
							
						}else{
							
							that.tags.push($(this).attr('tag_id'));

							$(this).data('checked', true ).css({background:'yellow'});
							
						};
						
						that.getTypeOfAndCustomTagsButtonsBasedOnTheArticleTag($(this).attr('tag_id'),
						
							function(){

								console.log($('.tags_row.typeOf .box_wrapper').css('height', 'auto').height());
								console.log($('.tags_row.custom .box_wrapper').css('height', 'auto').height());
								
								$('.tags_row.typeOf .box_wrapper').hide();
								$('.tags_row.custom .box_wrapper').hide();

								$('.tags_row.typeOf .box_wrapper')
									.css({'top':(-1 * $('.tags_row.typeOf .box_wrapper').css('height', 'auto').height())+'px'})
									.show()
									.animate({'top':'0px'}, 600, function(){
										
											$('.tags_row.custom .box_wrapper')
												.css({'top':(-1 * $('.tags_row.custom .box_wrapper').css('height', 'auto').height())+'px'})
												.show()
												.animate({'top':'0px'}, 600);
																				
									});									
								
								core.bind_typeOf_click();
								core.bindClickToCustomTags();	
							}
						
						);
							
						
					};
					

					
					if( that.hasOwnProperty('getProducts')){
						
						that.getProducts();
						
					};										

				
				});	
				

							
			}
			
			,bind_typeOf_click: function(){
				
						var that = this;
				
						$('.tags.container .typeOf .box').unbind('click');
						$('.tags.container .typeOf .box').bind('click', function(event) {
							
							if( $(this).data('checked') === true ){
								
//											console.log($(this).html()+ ' clicking off') ;
								
										var idx = that.tags.indexOf($(this).attr('tag_id'));
										that.tags.splice(idx, 1);
										$(this).data('checked', false ).css({background:'white'});
										
								
							}else{
								
//											console.log($(this).html() + ' clicking on');
								
										$('.typeOf .box').data('checked', false ).css({background:'white'});
										
										that.clear_tags_from_category('typeOf');		
										
										if( $(this).data('checked') === true ){
											
											$(this).data('checked', false ).css({background:'white'});
											
										}else{
											
											that.tags.push($(this).attr('tag_id'));
				
											$(this).data('checked', true ).css({background:'yellow'});
											
										};
										
								
							};
							
							
							
							if( that.hasOwnProperty('getProducts')){
								
								that.getProducts();
								
							};										
							
						});	
			}							
			
			,bindClickToCustomTags: function(){
				
					var that = this;
							

					$('.tags.container .custom .box').unbind('click');
					$('.tags.container .custom .box').bind('click', function(event) {
						
						
						if( $(this).data('checked') === true ){

							
							var idx = that.tags.indexOf($(this).attr('tag_id'));
							
							that.tags.splice(idx, 1);
							
							$(this).data('checked', false ).css({background:'white'});
							
						}else{
							

							that.tags.push($(this).attr('tag_id'));

							$(this).data('checked', true ).css({background:'yellow'});
							
						};
						
						if( that.hasOwnProperty('getProducts')){
							
							that.getProducts();
							
						};										
						
					});	

				
			}
			

		
});

core.init_tags();
