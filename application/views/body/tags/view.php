<style>
.tags.container{
	padding-left:5px;
	margin-bottom:20px;
}
.tags.container .colors .box{
	width:30px;
	height:30px;
	margin-right:5px;
	border:1px dotted gray;
	cursor:pointer;
	text-align:center;
	box-sizing:border-box;
	padding:4px;
	font-weight:bold;
}

 .tags.container .articles .box
,.tags.container .typeOf .box
,.tags.container .custom .box
{
	width:130px;
	height:30px;
	margin-right:5px;
	margin-bottom:5px;
	border:1px dotted gray;
	cursor:pointer;
	text-align:center;
	box-sizing:border-box;
	padding:4px;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
}
</style>
<div   class=' tags container' >
	<form  class="form-horizontal" >
		<fieldset>
		
		
		<?php  foreach( $tags  as  $key => $tag_array): ?>
		
				<?php if( $key === 'articles' ){?>
					<div class="control-group articles non_color">
							<label class="control-label">Choose Article</label>
							<div  class='box_wrapper controls' >
								<?php foreach( $tag_array  as  $key => $tag):?>
								
										<div  class='box fl' tag_id='<?php  echo  $tag['tag_id'];   ?>'  >
											<?php echo $tag['tag_name'];    ?>
										</div>						
								
								<?php endforeach; ?>
							</div>
					</div>			
				<?php } ?>	
				
				<?php if( $key === 'color' ){?>
					<div class="control-group colors">
							<label class="control-label">Choose Color</label>
							<div  class='box_wrapper controls' >
								<?php foreach( $tag_array  as  $key => $tag):?>
								
										<div  class='box fl' tag_id='<?php  echo  $tag['tag_id'];   ?>'  style='background:<?php  echo  $tag['tag_name'];   ?>'  >
											&nbsp;
										</div>						
								
								<?php endforeach; ?>
							</div>
					</div>			
				<?php } ?>
				
				<?php if( $key === 'typeOf' ){?>
					<div class="control-group typeOf non_color">
							<label class="control-label">Choose Type</label>
							<div  class='box_wrapper controls' >
							</div>
					</div>			
				<?php } ?>					
				
				<?php if( $key === 'custom' ){?>
					<div class="control-group custom non_color">
							<label class="control-label">Choose Custom</label>
							<div  class='box_wrapper controls' >
							</div>
					</div>			
				<?php } ?>	
	
		<?php endforeach; ?>
		
		
	</fieldset>
</form>
</div>

<script type="text/javascript" language="Javascript">


$(document).ready(function() {
						
				_.extend(core, {
							
							  init_tags:function(){
							  	
							  this.setTagsProperties();
								
								this.bindClickToChooseColor();
								
								this.bindClickToChooseOneChoiceNonColorTags();	
								
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
													
//													console.log(JSON.stringify(that.all_tags));
													
												}
										);	
										
										
							}
											
							,bindClickToChooseColor: function(){
								
									var that = this;
								
									$('.tags.container .colors .box').click(function(event) {
										
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
							
							,bindClickToChooseOneChoiceNonColorTags:function(){
								
									var  that = this
											,callback_bind_typeOf_click = function(){
												
														$('.tags.container .typeOf .box').unbind('click');
														$('.tags.container .typeOf .box').bind('click', function(event) {
															
															if( $(this).data('checked') === true ){
																
																		console.log($(this).html()+ ' clicking off') ;
																
																		var idx = that.tags.indexOf($(this).attr('tag_id'));
																		that.tags.splice(idx, 1);
																		$(this).data('checked', false ).css({background:'white'});
																		
																
															}else{
																
																		console.log($(this).html() + ' clicking on');
																
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
											};
											
											$('.tags.container .articles .box').bind('click', function(event) {
																
																if( $(this).data('checked') === true ){
																	
																			var idx = that.tags.indexOf($(this).attr('tag_id'));
																			that.tags.splice(idx, 1);
																			$(this).data('checked', false ).css({background:'white'});
																			
																			that.clear_tags_from_category('color');
																			that.clear_tags_from_category('custom');		
																			that.clear_tags_from_category('typeOf');	
																				
																	
																}else{
																	
																			$('.articles .box').data('checked', false ).css({background:'white'});
																			
																					
																			that.clearAllTags();
																			
																			if( $(this).data('checked') === true ){
																				
																				$(this).data('checked', false ).css({background:'white'});
																				
																			}else{
																				
																				that.tags.push($(this).attr('tag_id'));
													
																				$(this).data('checked', true ).css({background:'yellow'});
																				
																			};
																			
//																			$('.tags.container .colors .box').empty().data('checked', false);
//																			$('.tags.container .typeOf .box, .tags.container .custom .box').data('checked', false);
																			that.getTypeOfAndCustomTagsForChosenArticle($(this), callback_bind_typeOf_click);
																				
																	
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
							
							
							,getTypeOfAndCustomTagsForChosenArticle: function($this, callback){

																			var	 that = this
																					,tag_id
																					,tag_name
																					,tags_type_name
																					,tag_box = '';

																			$.getJSON( 
																			
																					window.base_url  + 'tags/getJsonTagsWhereParentTagId',
																	
																					{'parent_tag_id': $this.attr('tag_id') },
																			
																					function(data) {
													
																						if( data.length === 0){
																							
																								that.clear_tags_from_category('color');
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
																													
																													tags_type_name=val3;
																													
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
																				core.bindClickToCustomTags();	
																				
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
											
//											console.log('within ' + category + ': '+ JSON.stringify(this.all_tags[category]));
											
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
						
				});
				
				core.init_tags();
});
		

</script>