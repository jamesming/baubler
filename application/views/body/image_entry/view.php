<legend>Remote Image 	Asset</legend>

<div  id='images_row'   >
	<div></div>
</div>

<br />
<br />

<div  class='oh ' >
	<form  id='image_asset_form' class="form-horizontal" method="post" accept-charset="utf-8">
	  <fieldset>
	    <div class="control-group">
	      <label class="control-label" for="input01">URL</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" name="url" placeholder="http:flickr.com/image.jpg">
	        <p class="help-block">i.e.  http://www.flickr.com/image.jpg</p>
	        <button type="button" class="btn">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>	
</div>
<div  class='oh '>
	<img src="http://placehold.it/270x300">
</div>
<style>
#images_row{
	width:100%;
	height:125px;
	overflow-x:scroll;
	overflow-y:hidden;
	background:red;
}
#images_row div{
	width:2000px;
	height:125px;
}
#images_row div img{
	margin-right:15px;
	float:left;
}
</style>
<script type="text/javascript" language="Javascript">
	$(document).ready(function() {

		core.loadScript('jcrop', window.base_url  + 'js/libs/plugins/jcrop/jcrop.min.js', function(){}); 
		core.processCallbackQueue();		
		_.extend(core, {
			
			 start:function(){
			 		
					this.getImagesThumbs();
			 		
			 		var that = this;
			 	
			 		$('#image_asset_form button').click(function(event) {

						var post_array = {};    
						
						$('#image_asset_form input[type=text]').each(function(event) {
									post_array[$(this).attr('name')]= $(this).val();
						});
						
						post_array.table = 'images';
						
						that.target.style.display='block';					
						that.spinner.spin(that.target);	
						
						
						$.post( window.base_url  + "image_entry/update",
								post_array,
								function(data) {
									setTimeout(function(){
										that.target.style.display='none';					
										that.spinner.stop();
										that.getImagesThumbs()											
									}, 1000);
									
								}
						);		

			 		});	
				
			}
			
			
			,getImagesThumbs:function(){
				
					$.getJSON(window.base_url  + 'image_entry/getJsonImages', function(data) {
						
							// console.log(JSON.stringify(data));
							
							var i= data.length
							,imgs_ele = ''
							,widthOfRow = (i * 100);							
							
							$.each(data, function(key, val) {
								//console.log(val['id'] + ' ' + val['url']);
								imgs_ele += '<a image_id="' + val['id'] + '" ><img  title="'+ val['url'] +'" src="http://placehold.it/100x125"></a>';
							});
							
							$('#images_row div')
							.html(imgs_ele)
							.css({width:widthOfRow+'px'});							

					});
				
				
			}
			
			,makeImageRow:function(){
				
						var i= <?php echo sizeof($images)    ?>
						,imgs_ele = ''
						,widthOfRow = (i * 100);
						
						while (--i) {
							// imgs_ele += '<img src="http://placehold.it/100x125">';
						};
						
						$('#images_row div')
						//.html(imgs_ele)
						.css({width:widthOfRow+'px'});
			}

		});
			
		core.start()			
		
	});
</script>