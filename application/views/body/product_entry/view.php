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

<?php $this->load->view($tags_container); ?>


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
			
			 init_product_entry: function(){

					this.formPrep();
					
					this.setProductEntryProperties();
					
					this.createJcropDiv();
			 		
					this.getProductsThumbNailImages();
					
					this.bindClickToUpdate();
					
					this.bindClickToLaunchJcrop();
					
					this.bindSubmitButton();
				
			}
			
			,setProductEntryProperties: function(){
				
				this.mode = 'insert';
				
				this.product_id = undefined;
				
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
						
						post_array.tags = that.tags;
						post_array.numberOfColors = that.numberOfColors;
						
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
										that.clearAllTags();	
										
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
							
						that.clearAllTags();					
						
						$.getJSON( window.base_url  + "product_entry/getJsonProductsWherePkIs?id=" + that.product_id,
						
								function(data) {

									that.switchToEditMode();
									
									for(var key in data.tags){

										if( core.in_array(data.tags[key].tag_id, core.all_tags.articles) ){
											var article_tag = data.tags[key].tag_id;
											core.getTypeOfAndCustomTagsButtonsBasedOnTheArticleTag( article_tag, 
											
												function(){

													core.populate_form_for_update.populate_fields_chosen_for_product(data);
													core.populate_form_for_update.populate_tags_chosen_for_product(data);	
													
													core.bind_typeOf_click();
													core.bindClickToCustomTags();
													
												}
											
											);
										};
									}
									
									
								}
						);		
											
					});	
				
			}
			
			,populate_form_for_update: {
				
						populate_fields_chosen_for_product:function(data){
				
									$.each(data.product, function(key, val) {
										
										$.each(val, function(key2, val2) {
											
												if($('#' + key2).length != 0){
													
													$('#' + key2).val(val2);
													
												};
												
												if( key2 === 'cropfile'){
													
													core.cropfile = val2;
													
												};
												
										});
										
									});	
				
						}
						
						,populate_tags_chosen_for_product:function(data){
							
								core.numberOfColors = 0;
							
								var    tag_id
											,clearAllNonColorBoxesOfYellowHighlight = function(){
												
													$('.non_color .box').css({background:'white'});
												
											}
											,markThisColorTagWithCheck = function( tag_id ){
												
													var idx = core.all_tags.color.indexOf( tag_id );
													
													if( idx !== -1 ){
														
														core.numberOfColors++;
														
														$('.box[tag_id=' + tag_id + ']').data('checked', true ).html('&#10003');
														
													};
											}
											,highlightThisTagYellow = function(tag_id){
												
													var idx = core.all_tags.color.indexOf( tag_id );
												
													if( idx === -1 ){
														
														$('.box[tag_id=' + tag_id + ']').data('checked', true ).css({background:'yellow'});
														
													};
													
											};
											
								clearAllNonColorBoxesOfYellowHighlight();
							
								$.each(data.tags, function(key, val) {
									
										$.each(val, function(key2, val2) {									
												
												if( key2 === 'tag_id'){
													
													tag_id = val2;
													
													markThisColorTagWithCheck(tag_id);
													
													highlightThisTagYellow(tag_id);
													
													core.tags.push(tag_id); 
							
												};
													
												
										});									
																		
								});
								
						}
						
			}
			
			,getProductsThumbNailImages:function(){
				
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
				
									this.clearAllTags();				
				
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
			
			core.init_product_entry();	
			
		}); 
		
		core.processCallbackQueue();		
		
	});
	
	
</script>