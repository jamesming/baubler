<div   class=' tags container' >
	<form  class="form-horizontal" >

		<?php  foreach( $tags  as  $key => $tag_array): ?>
		
				<?php if( $key === 'articles' ){?>
					<div class="tags_row articles non_color">
							<div  class='box_wrapper' >
								<?php foreach( $tag_array  as  $key => $tag):?>
								
										<div  class='box fl' tag_id='<?php  echo  $tag['tag_id'];   ?>'  >
											<?php echo $tag['tag_name'];    ?>
										</div>						
								
								<?php endforeach; ?>
							</div>
					</div>			
				<?php } ?>	
				
				<?php if( $key === 'color' ){?>
					<div class="tags_row colors">
							<div  class='box_wrapper' >
								<?php foreach( $tag_array  as  $key => $tag):?>
								
										<div  class='box fl' tag_id='<?php  echo  $tag['tag_id'];   ?>'  style='background:<?php  echo  $tag['tag_name'];   ?>'  >
											&nbsp;
										</div>						
								
								<?php endforeach; ?>
							</div>
					</div>			
				<?php } ?>
				
				<?php if( $key === 'typeOf' ){?>
				
					<div class="tags_row typeOf non_color">
							<div  class='box_wrapper' >type Of
							</div>
					</div>			
				<?php } ?>					
				
				<?php if( $key === 'custom' ){?>
					<div class="tags_row custom non_color">
							<div  class='box_wrapper' >Colors
							</div>
					</div>			
				<?php } ?>	
	
		<?php endforeach; ?>

</form>
</div>
