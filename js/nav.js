$('#mode').click(function(event) {
	
		var  input_box
			,createInputBoxes = function( whichTags, boxed_tags ){
				
						var input_boxes = '';
				
						for(var idx in boxed_tags[whichTags]){
							
							input_box = "";
							
							input_box = "<input  class='tag_field'  tag_id=" + boxed_tags[whichTags][idx].tag_id + " value='" + boxed_tags[whichTags][idx].tag_name + "' />";
							
							input_boxes += input_box;
							
						};	
							
						input_boxes += "<input   class='tag_field' tag_id=-1 value='' />";
						input_boxes += "<input type='button' value='submit' />";
						
						$('.control-group.' + whichTags + ' div.box_wrapper').append(input_boxes);	
			};
	
		if( $(this).data('mode') === 1){
			$(this).html('Entry').data('mode', 0);
			core.mode = 0;
			
			$('.control-group.typeOf div.box_wrapper input').remove();
			$('.control-group.custom div.box_wrapper input').remove();	
			
			$('.control-group.typeOf div.box_wrapper div.box').show();
			$('.control-group.custom div.box_wrapper div.box').show();					
			
			
		}else{
			$(this).html('Update').data('mode', 1);
			core.mode = 1;
			
			$('.control-group.typeOf div.box_wrapper div.box').hide();
			$('.control-group.custom div.box_wrapper div.box').hide();
			
			
			for(var key in core.boxed_tags){
				
					if( key === 'typeOf' ){
						createInputBoxes( 'typeOf', core.boxed_tags );
					};
					
					if( key === 'custom' ){
						createInputBoxes( 'custom', core.boxed_tags );		
					};
				
			};
			
			$('.control-group.typeOf div.box_wrapper input, .control-group.custom div.box_wrapper input')
			.css({'margin-bottom':'8px'});
			
			
		};
		
});	

_.extend(core, {
});