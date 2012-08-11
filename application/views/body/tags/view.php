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

.tags.container .articles .box{
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
		
				<?php if( $key === 'article' ){?>
					<div class="control-group articles">
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
								
								this.bindClickToChooseArticle();	
								
								this.getAllTags();			
								
								
							}
			
							,setTagsProperties:function(){
					 			
					 			this.tags = [];
					 			
					 			this.all_tags = {};
					 			
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
										}else{
											that.tags.push($(this).attr('tag_id')); 
											$(this).data('checked', true ).html('&#10003');
										};
										
										
										if( that.hasOwnProperty('getProducts')){
											
											that.getProducts();
											
										};
										
										
									});	
								
							}
							
							,bindClickToChooseArticle:function(){
								
									var that = this;
								
									$('.tags.container .articles .box').click(function(event) {
										
										$('.articles .box').data('checked', false ).css({background:'white'});
										
										that.clear_articles_in_chosen_tags();		
										
										if( $(this).data('checked') === true ){
											
											$(this).data('checked', false ).css({background:'white'});
											
										}else{
											
											that.tags.push($(this).attr('tag_id'));
				
											$(this).data('checked', true ).css({background:'yellow'});
											
										};
										
										
									});					
								
								
							}
							
							,clear_tags:function(){
								this.tags = []; $('.tags.container .colors .box').empty().data('checked', false);
							}
							
							
							,clear_articles_in_chosen_tags:function(){
								
											var that = this;
								
											$.each(this.all_tags['article'], function(key, tag_id) {
											
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