(function(window, document){
	
	 var app = {
	 	init:function(){
	 		this.setProperties();
	 		this.createImages();
			this.applyMasonry();
			
			var gutter = 22;
			$('#main').width(982);
			$('ul#theContainer').css({padding:gutter+'px 0px 0px '+gutter+'px'});
			$('ul#theContainer li').css({margin:'0px '+gutter+'px '+gutter+'px 0px'});
			
	 	}
	 	,setProperties: function(){
	 		
	 		this.arrangment = [{
	 			  name :'one'	
	 			 ,order:[
	 			 		 'box220x380'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box460x380'

	 			 		,'box220x380'
	 			 		,'box220x180'
	 			 	]
	 			 }
	 			,{
	 			  name :'two'	
	 			 ,order:[
	 			 		 'box380x180'
	 			 		,'box300x180'
	 			 		,'box220x380'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box300x180'
	 			 		,'box220x180'
	 			 		,'box380x180'
	 			 	]
	 			 }
	 		];
	 		
	 		this.theArray = {
	 			 'box220x380':{
	 			  width:'220'
	 			 ,height:'380'	
	 			}
	 			,'box220x180':{
	 			  width:'220'
	 			 ,height:'180'	
	 			}	 			
	 			,'box220x580':{
	 			  width:'220'
	 			 ,height:'580'	
	 			}
	 			,'box238x220':{
	 			  width:'238'
	 			 ,height:'220'	
	 			}
	 			,'box300x180':{
	 			  width:'300'
	 			 ,height:'180'	
	 			}
	 			,'box380x180':{
	 			  width:'380'
	 			 ,height:'180'	
	 			}
	 			,'box460x380':{
	 			  width:'460'
	 			 ,height:'380'	
	 			}
	 			,'box700x580':{
	 			  width:'700'
	 			 ,height:'580'	
	 			}	 			
	 		};
	 		
	 	}
	 	,createImages: function(){
	 		
	 		var  img = ''
	 			,in_array = function (needle, haystack){
				    var  count = 0
				    	,len = haystack.length;
				    for (var i=0; i<len; i++) {
				        if (haystack[i] == needle) return true;
				        count++;
				    }
				    return false;
				}
				order_key = 0;
	 		
			
			for( idx in this.arrangment[order_key].order){

		 		img += "<li class='box'>\
		 		<img src='http://placehold.it/"+this.theArray[this.arrangment[order_key].order[idx]].width+"x"+this.theArray[this.arrangment[order_key].order[idx]].height+"/green/png'>\
		 		</li>";


			}

	 		
	 		$('#theContainer').append(img);

	 	}
	 	
	 	,applyMasonry :function(){
	 		
			var container = $('#theContainer');			 	
			
			container.imagesLoaded( function(){
			
				container.masonry({
					itemSelector : '.box'
				});	
			});		
	 	}
	 	
	 };
	 
	 app.init();
	    
})(this, document);