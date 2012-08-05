<form  id='image_asset_form' class="form-horizontal" method="post" accept-charset="utf-8">
  <fieldset>
    <legend>Remote Image 	Asset</legend>
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


<script type="text/javascript" language="Javascript">
	$(document).ready(function() {

		core.loadScript('jcrop', window.base_url  + 'js/libs/plugins/jcrop/jcrop.min.js', function(){}); 
		core.processCallbackQueue();		
		_.extend(core, {
			
			 start:function(){
			 	
			 		var that = this;
			 	
			 		$('#image_asset_form button').click(function(event) {

						var post_array = {};    
						
						$('#image_asset_form input[type=text]').each(function(event) {
									post_array[$(this).attr('name')]= $(this).val();
						});
						
						post_array.table = 'users';
						
						console.log(JSON.stringify(post_array));
						
						that.target.style.display='block';					
						that.spinner.spin(that.target);	
						
						
						$.post( window.base_url  + "index.php/image_entry/update",
								post_array,
								function(data) {
									console.log(data);
									setTimeout(function(){
										that.target.style.display='none';					
										that.spinner.stop();											
									}, 1000);
									
								}
						);		

			 		});	
				
			}

		});
			
		core.start()			
		
	});
</script>