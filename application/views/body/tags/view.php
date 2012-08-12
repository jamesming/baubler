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
								<?php foreach( $tag_array  as  $key => $tag):?>
								
										<div  class='box fl' tag_id='<?php  echo  $tag['tag_id'];   ?>'  >
											<?php echo $tag['tag_name'];    ?>
										</div>						
								
								<?php endforeach; ?>
							</div>
					</div>			
				<?php } ?>					
				
				<?php if( $key === 'custom' ){?>
					<div class="control-group custom non_color">
							<label class="control-label">Choose Custom</label>
							<div  class='box_wrapper controls' >
								<?php foreach( $tag_array  as  $key => $tag):?>
								
										<div  class='box fl' tag_id='<?php  echo  $tag['tag_id'];   ?>'  >
											<?php echo $tag['tag_name'];    ?>
										</div>						
								
								<?php endforeach; ?>
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
								
								this.bindClickToChooseMultipleChoicesNonColorTags();	
								
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
								
									var that = this
											,categories = [
																			 'articles'
																			,'typeOf'
																		];
											
											$.each(categories, function(key, category) {
											
														$('.tags.container .' + category + ' .box').click(function(event) {
															
															$('.' + category + ' .box').data('checked', false ).css({background:'white'});
															
															that.clear_noncolor_in_chosen_tags(category);		
															
															if( $(this).data('checked') === true ){
																
																$(this).data('checked', false ).css({background:'white'});
																
															}else{
																
																that.tags.push($(this).attr('tag_id'));
									
																$(this).data('checked', true ).css({background:'yellow'});
																
															};
															
															if( that.hasOwnProperty('getProducts')){
																
																that.getProducts();
																
															};										
															
														});	
											
											});	
								
								
				
								
								
							}
							
							,bindClickToChooseMultipleChoicesNonColorTags: function(){
								
									var that = this
											,categories = [
																			'custom'
																		];
											
											$.each(categories, function(key, category) {
											
														$('.tags.container .' + category + ' .box').click(function(event) {
															
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
											
											});	
								
							}
							
							,clear_tags:function(){
								this.tags = []; 
								$('.tags.container .colors .box').empty().data('checked', false);
								$('.tags.container .non_color .box').data('checked', false).css({background:'white'});
								this.numberOfColors = 0;
							}
							
							
							,clear_noncolor_in_chosen_tags:function( category ){
								
											var that = this;
								
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