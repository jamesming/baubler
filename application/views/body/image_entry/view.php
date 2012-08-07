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
	<img  id='picture'  src="http://placehold.it/270x300">
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
#picture{
/*	width:270px;
	height:300px;*/
	border:1px dotted gray;
	cursor:pointer;
}
</style>
<script type="text/javascript" language="Javascript">

	$(document).ready(function() {
		
		_.extend(core, {
			
			 mode:'insert'
			 
			,image_id: undefined
			
			,start: function(){
				
			 		$('input[type=radio]').click(function(){
					    return false;
					});
					
					this.createJcropDiv();
			 		
					this.getImagesThumbs();
					
					this.bindClickToUpdate();
					
					this.bindClickToLaunchJcrop();
					
					this.bindSubmitButton();
				
			}
			
			,bindSubmitButton: function(){
				
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
										that.switchToInsertMode();
										
									}, 100);
									
								}
						);		

			 		});	
			}
			
			,bindClickToUpdate:function(){
				
					var that = this;
				
					$('#images_row a').live('click', function(event) {
						
						var image_id = $(this).attr('image_id');
											
						$.getJSON( window.base_url  + "image_entry/getJsonImagesWherePkIs?id=" + image_id,
						
								function(data) {
									
									that.switchToEditMode();
									
									$.each(data, function(key, val) {
										
										$.each(val, function(key2, val2) {
											
												if($('#' + key2).length != 0){
													
													$('#' + key2).val(val2);
													
													$('#picture').attr({
															 'src':window.base_url + 'uploads/images/' + image_id + '/image.jpg?v=' + that.getRandoms(1, 1, 10000)
														});
													
												};
												
												if( key2 == 'id'){												
													
													that.image_id = val2;
													
												};
												
										});
										
									});
									
								}
						);		
											
					});	
				
			}
			
			,getImagesThumbs:function(){
				
					this.imageLoadFailed = function(){
							var image = arguments[0];
							image.src = 'http://placehold.it/100x100';
					};				
					
					var that = this;
					
					$.getJSON(window.base_url  + 'image_entry/getJsonAllImages', function(data) {
						
							var i= data.length +1
							,imgs_ele = ''
							,widthOfRow = (i * 120) + 10
							,url;
							
							$.each(data, function(key, val) {
								
								url = window.base_url  + 'uploads/images/' + val['id'] + '/thumb.jpg?v=' + that.getRandoms(1, 1, 10000);
								
								imgs_ele += '<a image_id="' + val['id'] + '" ><img onerror="core.imageLoadFailed(this)" title="'+ val['url'] +'" src="' + url + '"></a>';
								
							});
							
							$('#images_row div')
							.html(imgs_ele)
							.css({width:widthOfRow+'px'});							

					});
				
			}
			
			,createJcropDiv: function(){
				
											var style = "\
											<style>\
													#jcropDiv{\
															border:1px solid gray;\
															position: fixed;\
															top: 8%;\
															left:5%;\
															right:5%;\
															bottom: 2%;\
															z-index: 0;\
															background-color: white;\
															padding:10px;\
															display:none;\
														  -webkit-border-radius: 5px;\
														     -moz-border-radius: 5px;\
														          border-radius: 5px;\
													}\
													#jcropDiv div{\
															float:left;\
													}\
													#jcropDiv div input{\
															float:right;\
													}\
											</style>\
											";
						
											this.createFixedDiv(
												 'jcropDiv'
												,style
											);
											
											this.jcropDiv = document.getElementById('jcropDiv');
											
											var insideContent = document.createElement('div');
											
											insideContent.innerHTML = "\
											<div><img id='jcropThis' src='' ></div>\
											<div><button   id='closeJcrop' type='button' class='btn'>Submit</button>\
											</div>\
											";
											
											this.jcropDiv.insertBefore(insideContent, this.jcropDiv.firstChild);
											
			}
			
			,bindClickToLaunchJcrop: function(){
				 
				 var that = this;
				 
				 $('#picture').click(function(event) {
				 	
				 			that.jcropDiv.style.display = 'block';
				 			
				 			delete that.coordinates;
				 			
							if( that.hasOwnProperty('jcrop_api')){
								that.jcrop_api.destroy();  // http://stackoverflow.com/questions/4466333/how-do-i-remove-jcrop
							};
				 			
							$('#jcropThis').parent().html("\
								<img  id='jcropThis' src=''  />\
							");
							
							var  jcropThis = document.getElementById('jcropThis');
							
							jcropThis.src = window.base_url + 'uploads/images/' + that.image_id + '/raw.jpg?v=' + that.getRandoms(1, 1, 10000);
				 			
							jcropThis.onload = function(){
								
											that.jcrop_api = $.Jcrop('#jcropThis', {
												
																					 onSelect:function(coordinates){
																					
																							that.coordinates = coordinates;

																					}
																					
																					,aspectRatio:  1 
																					
											});						

							};

				 });	
				 
				 $('#closeJcrop').click(function(event) {
				 	
				 			that.jcropDiv.style.display = 'none';
							
							if( typeof( that.coordinates  ) === "undefined"){
									return;
							};
							
							that.target.style.display='block';					
							that.spinner.spin(that.target);								
							
					 		that.coordinates.image_id = that.image_id;
					 		that.coordinates.table = 'images';							
				 			
							$.post( window.base_url  + "image_entry/jcrop",
									that.coordinates,
									function(data) {
										setTimeout(function(){
											
											var url = window.base_url  + 'uploads/images/' + that.image_id + '/thumb.jpg?v=' + that.getRandoms(1, 1, 10000);
											
											$('a[image_id=' + that.image_id + '] img').attr('src', url);
											
											that.target.style.display='none';					
											that.spinner.stop();
											
											that.switchToInsertMode();
											
										}, 100);
										
									}
							);		
				 			
				 			
				 });	
			}
			
			,switchToInsertMode: function(){
				
									this.mode = 'insert';
									
									$('#insertmode').attr('checked', true);																			
									
									$('#picture').attr('src', 'http://placehold.it/270x300');
			}
			
			,switchToEditMode: function(){
				
									this.mode = 'update';
									
									$('#editmode').attr('checked', true);
			}

		});
		
		core.loadCSS(window.base_url  + 'js/libs/plugins/jcrop/jquery.Jcrop.css');
		core.loadScript('jcrop', window.base_url  + 'js/libs/plugins/jcrop/jcrop.min.js', function(){
			
			core.start();	
			
		}); 
		
		core.processCallbackQueue();		

			
				
		
	});
	
	
</script>