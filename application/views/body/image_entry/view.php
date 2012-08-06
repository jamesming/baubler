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
        <label class="control-label">Edit Mode</label>
        <div class="controls">
          <label class="radio">
            <input type="radio" name="editmode" id="insertmode" value="insert" checked>
            Insert
          </label>
          <label class="radio">
            <input type="radio" name="editmode" id="editmode" value="edit">
            Update
          </label>
        </div>
      </div>
	  	
	  	
	  	
	    <div class="control-group">
	      <label class="control-label" for="input01">URL</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge"  id="url" name="url" placeholder="http:flickr.com/image.jpg">
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
	cursor:pointer;
}
</style>
<script type="text/javascript" language="Javascript">
	$(document).ready(function() {

		core.loadScript('jcrop', window.base_url  + 'js/libs/plugins/jcrop/jcrop.min.js', function(){}); 
		core.processCallbackQueue();		
		_.extend(core, {
			
			 mode:'insert'
			 
			,image_id: undefined
			
			,start:function(){
			 		
			 		$('input[type=radio]').click(function(){
					    return false;
					});
			 		
					this.getImagesThumbs();
					
					this.clickToUpdate();
			 		
			 		var that = this;
			 	
			 		$('#image_asset_form button').click(function(event) {

						var  post_array = {}
								,fieldsValid = true;    
						
						$('#image_asset_form input[type=text]').each(function(event) {
									if( $(this).val() == ''){
										fieldsValid = false;
									};
									post_array[$(this).attr('name')]= $(this).val();
						});
						
						post_array.table = 'images';
						
						if( that.mode == 'update'){
							
							post_array.image_id = that.image_id;
							
						};
						
						if( !fieldsValid){
							alert('Fields must not be blank');
							return;
						};
						
						that.target.style.display='block';					
						that.spinner.spin(that.target);	
						
						$.post( window.base_url  + "image_entry/" + that.mode,
								post_array,
								function(data) {
									setTimeout(function(){
										
										console.log(data);
										
										$('#image_asset_form input[type=text]').val('');
										
										that.target.style.display='none';					
										that.spinner.stop();
										that.getImagesThumbs();
										that.mode = 'insert';
										$('#insertmode').attr('checked', true);																			
									}, 100);
									
								}
						);		

			 		});	
				
			}
			
			,clickToUpdate:function(){
				
					var that = this;
				
					$('#images_row a').live('click', function(event) {
						
						var image_id = $(this).attr('image_id');
											
						$.getJSON( window.base_url  + "image_entry/getJsonImagesWherePkIs?id=" + image_id,
						
								function(data) {
									
									that.mode = 'update';
									
									$.each(data, function(key, val) {
										
										$.each(val, function(key2, val2) {
											
												if($('#' + key2).length != 0){
													
													$('#' + key2).val(val2);
													
													$('a[image_id=' + image_id + '] img').attr('src', val2);
													
												};
												
												if( key2 == 'id'){												
													
													that.image_id = val2;
													
												};
												
										});
										
									});
									
									$('#editmode').attr('checked', true);
								}
						);		
											
					});	
				
			}
			
			,getImagesThumbs:function(){
				
					$.getJSON(window.base_url  + 'image_entry/getJsonAllImages', function(data) {
						
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
			

		});
			
		core.start()			
		
	});
</script>