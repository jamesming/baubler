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
