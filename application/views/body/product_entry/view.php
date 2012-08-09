<style>
#products_row{
	width:100%;
	height:125px;
	overflow-x:scroll;
	overflow-y:hidden;
	background:red;
}
#products_row div{
	width:2000px;
	height:125px;
}
#products_row div img{
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
<legend>Remote Product 	Asset</legend>

<div  id='products_row'   >
	<div></div>
</div>

<br />
<br />
<style>
#tags_container{
	padding-left:5px;
	margin-bottom:70px;
}
#tags_container .box{
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
</style>
<div  id='tags_container' >
	<?php  foreach( $colors  as  $color): ?>
			<div  class='box fl' tag_id='<?php  echo  $color->id;   ?>'  style='background:<?php  echo  $color->name;   ?>'  >
				&nbsp;
			</div>
	<?php endforeach; ?>
</div>
<div  class='oh clearfix' >
	<form  id='product_asset_form' class="form-horizontal" method="post" accept-charset="utf-8">
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

<script type="text/javascript" language="Javascript">

	$(document).ready(function() {
		
		_.extend(core, {
			
			 start: function(){

					this.formPrep();
					
					this.setFormProperties();
					
					this.createJcropDiv();
			 		
					this.getProductsThumbs();
					
					this.bindClickToUpdate();
					
					this.bindClickToChooseColor();
					
					this.bindClickToLaunchJcrop();
					
					this.bindSubmitButton();
				
			}
			
			,setFormProperties: function(){
				
				this.mode = 'insert';
				
				this.product_id = undefined;
				
				this.colors = [];
				
			}
			
			,formPrep: function(){
				
					var that = this;
				
			 		$('#editmode').click(function(){
					    return false;
					});
					
			 		$('#insertmode').click(function(){
					    that.switchToInsertMode();
					});					
					
					$('#url').click(function(event) {
								$(this).val('');
					});					
				
			}
			
			,bindClickToChooseColor: function(){
				
					var that = this;
				
					$('.box').click(function(event) {
						
						if( $(this).data('checked') === true ){
							var idx = that.colors.indexOf($(this).attr('tag_id'));
							that.colors.splice(idx, 1);
							$(this).data('checked', false ).html('');
						}else{
							that.colors.push($(this).attr('tag_id')); 
							$(this).data('checked', true ).html('&#10003');
						};
						
						console.log(that.colors);
						
					});	
				
			}
			
			,clear_tags:function(){
				this.colors = []; $('.box').empty().data('checked', false);
			}
			
			,bindSubmitButton: function(){
				
			 		var that = this;
			 	
			 		$('#product_asset_form button').click(function(event) {

						var  post_array = {}
								,fieldsValid = true;    
						
						$('#product_asset_form input[type=text]').each(function(event) {
									if( $(this).val() == ''){
										fieldsValid = false;
									};
									post_array[$(this).attr('name')]= $(this).val();
						});
						
						post_array.table = 'products';
						post_array.colors = that.colors;
						
						if( that.mode == 'update'){
							
							post_array.product_id = that.product_id;
							
						};
						
						if( !fieldsValid){
							alert('Fields must not be blank');
							return;
						};
						
						that.target.style.display='block';					
						that.spinner.spin(that.target);	
						
						$.post( window.base_url  + "product_entry/" + that.mode,
								post_array,
								function(data) {
									setTimeout(function(){
										
										console.log(data);
										
										$('#product_asset_form input[type=text]').val('');
										
										that.target.style.display='none';					
										that.spinner.stop();
										
										if( that.mode === 'update'){
											
											var url = window.base_url  + 'uploads/products/' + that.product_id + '/thumb.jpg?v=' + that.getRandoms(1, 1, 10000);
											
											$('a[product_id=' + that.product_id + '] img').attr('src', url);											
											
										}else{
											that.getProductsThumbs();
										};
										
										
										that.switchToInsertMode();
										that.clear_tags();
										
									}, 100);
									
								}
						);		

			 		});	
			}
			
			,bindClickToUpdate:function(){
				
					var that = this;
				
					$('#products_row a').live('click', function(event) {
						
						that.product_id = $(this).attr('product_id');
						
						$('#picture').attr({
								 'src':window.base_url + 'uploads/products/' + that.product_id + '/image.jpg?v=' + that.getRandoms(1, 1, 10000)
							});
							
						that.clear_tags();						
						
						$.getJSON( window.base_url  + "product_entry/getJsonProductsWherePkIs?id=" + that.product_id,
						
								function(data) {

									that.switchToEditMode();
									
									that.populate_form_for_update.populate_fields(data);
									
									that.populate_form_for_update.populate_tags(data);
									
								}
						);		
											
					});	
				
			}
			
			,populate_form_for_update: {
				
						populate_fields:function(data){
				
									$.each(data.product, function(key, val) {
										
										$.each(val, function(key2, val2) {
											
												if($('#' + key2).length != 0){
													
													$('#' + key2).val(val2);
													
												};
												
												if( key2 === 'cropfile'){
													
													this.cropfile = val2;
													
												};
												
										});
										
									});	
				
						}
						
						,populate_tags:function(data){
							
								var  tag_id;
							
								$.each(data.tags, function(key, val) {
									
										$.each(val, function(key2, val2) {									
												
												if( key2 === 'tag_id'){
													
													tag_id = val2;
													
													console.log( key2 + ' -  ' + tag_id);
													
													$('.box[tag_id=' + tag_id + ']').data('checked', true ).html('&#10003')
													
													core.colors.push(tag_id); 
							
												};
													
												
										});									
																		
								});
								
						}
						
			}
			
			,getProductsThumbs:function(){
				
					this.imageLoadFailed = function(){
							var image = arguments[0];
							image.src = 'http://placehold.it/100x100';
					};				
					
					var that = this;
					
					$.getJSON(window.base_url  + 'product_entry/getJsonAllProducts', function(data) {
						
							var i= data.length +1
							,imgs_ele = ''
							,widthOfRow = (i * 120) + 10
							,url;
							
							$.each(data, function(key, val) {
								
								url = window.base_url  + 'uploads/products/' + val['id'] + '/thumb.jpg?v=' + that.getRandoms(1, 1, 10000);
								
								imgs_ele += '<a product_id="' + val['id'] + '" ><img onerror="core.imageLoadFailed(this)" title="'+ val['url'] +'" src="' + url + '"></a>';
								
							});
							
							$('#products_row div')
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
							
							jcropThis.src = window.base_url 
															+ 'uploads/products/' 
															+ that.product_id + '/' + that.cropfile + '.jpg?v=' 
															+ that.getRandoms(1, 1, 10000);
				 			
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
							
					 		that.coordinates.product_id = that.product_id;
					 		that.coordinates.cropfile = that.cropfile;
					 		that.coordinates.table = 'products';							
				 			
							$.post( window.base_url  + "product_entry/jcrop",
									that.coordinates,
									function(data) {
										setTimeout(function(){
											
											var url = window.base_url  + 'uploads/products/' + that.product_id + '/thumb.jpg?v=' + that.getRandoms(1, 1, 10000);
											
											$('a[product_id=' + that.product_id + '] img').attr('src', url);
											
											that.target.style.display='none';					
											that.spinner.stop();
											
											that.switchToInsertMode();
											
										}, 100);
										
									}
							);		
				 			
				 			
				 });	
			}
			
			,switchToInsertMode: function(){
				
									$('#url').val('');
				
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