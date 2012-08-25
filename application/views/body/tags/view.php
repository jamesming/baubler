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


	

</script>