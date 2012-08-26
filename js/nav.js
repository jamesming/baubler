_.extend(core, {
	
	init_nav: function(){
		
		this.setPropertiesNav();
		
		this.bindInputFields();
		
	}
	
	,setPropertiesNav: function(){
		
		this.update_array = [];
		
	}
	
	,bindInputFields: function(){
		
		var that = this;
		
		$('#mode').click(function(event) {
			
				var  input_box;
			
				if( $(this).data('mode') === 1){
					$(this).html('Entry').data('mode', 0);
					core.mode = 0;
					
					
					that.entryMode();

					
				}else{
					$(this).html('Update').data('mode', 1);
					
					
					core.mode = 1;
					that.update_array = [];

					that.updateMode();
					
				};
				
		});	
		
		
		$('.tag_field.update').live('change', function(){
				
				that.update_array.push({
						 tag_id: $(this).attr('tag_id')	
						,name:  $(this).val()
						,CRUD: 'update'
					}
				);
				
		});		
		
		
		$('.tag_field.insert').live('change', function(){
				
				that.update_array.push({
						 name:  $(this).val()
						,parent_tag_id :  $(this).attr('parent_tag_id')
						,tags_type_id: $(this).attr('tags_type_id')										
						,CRUD: 'insert'
					}
				);
					
		});	
		$('.tags.container input[type=button]').live('click', function(){
			
			$.post( window.base_url  + "product_entry/crud_tags",
			
					{'post_array': that.update_array},
					
					function(data) {
						
						that.returnToEntryModeWithFreshlyUpdatedTags();
						
					}
			);		

		
		});			
	}
	
	,updateMode: function(){
		
		var that = this;

		$('.control-group.typeOf div.box_wrapper div.box').hide();
		$('.control-group.custom div.box_wrapper div.box').hide();
		
		if( typeof(this.boxed_tags.typeOf) !== "undefined" ){
			for(var key in core.boxed_tags){
				
				if( key === 'typeOf' ){
					this.createUpdateFields( 'typeOf', core.boxed_tags );
				};
				

			};			
		}else{
			
			this.createInsertFields( '', 'typeOf' );
			
		};

		if( typeof(this.boxed_tags.custom) !== "undefined" ){
			for(var key in core.boxed_tags){
				
				if( key === 'custom' ){
					this.createUpdateFields( 'custom', core.boxed_tags );		
				};

			};			
		}else{
			
				this.createInsertFields( '', 'custom' );
			
		};

		
		$('.control-group.typeOf div.box_wrapper input, .control-group.custom div.box_wrapper input')
		.css({'margin-bottom':'8px'});
		
	}
	
	,entryMode: function(){
		
		$('.control-group.typeOf div.box_wrapper input').remove();
		$('.control-group.custom div.box_wrapper input').remove();	
		
		$('.control-group.typeOf div.box_wrapper div.box').show();
		$('.control-group.custom div.box_wrapper div.box').show();					
				
	}
	
	,createUpdateFields: function( whichTags, boxed_tags ){
		
		var  input_boxes = ''
			,that = this;

		for(var idx in boxed_tags[whichTags]){
			
			input_box = "";
			
			input_box = "<input  class='tag_field update'  tag_id=" + boxed_tags[whichTags][idx].tag_id + " value='" + boxed_tags[whichTags][idx].tag_name + "' />";
			
			input_boxes += input_box;
			
			tags_type_id  = boxed_tags[whichTags][idx].tags_type_id;
			
		};	


		this.createInsertFields(input_boxes, whichTags);

	}
	
	,createInsertFields: function( input_boxes, whichTags ){
		
		var tagTypeLookUp = {
				 'typeOf':7
				,'custom':8	
			};
		
							
		input_boxes += "<input  tags_type_id="+  tagTypeLookUp[whichTags] + "   parent_tag_id="+ this.article_tag_id  +"  class='tag_field insert' value='' />";
		input_boxes += "<input type='button' value='submit' />";
		
		$('.control-group.' + whichTags + ' div.box_wrapper').append(input_boxes);	
							
		
	}
	
	,returnToEntryModeWithFreshlyUpdatedTags: function(){
						
		$('.control-group.typeOf div.box_wrapper input').remove();
		$('.control-group.custom div.box_wrapper input').remove();	
		
		$('#mode').html('Entry').data('mode', 0);
		core.mode = 0;		
		
		var that = this;				
		
		this.getTypeOfAndCustomTagsButtonsBasedOnTheArticleTag(that.article_tag_id,
		
			function(){
				that.bind_typeOf_click();
				that.bindClickToCustomTags();	
			}
		
		);						
						
	}
	
});

$(document).ready(function() { 
	core.init_nav();
});