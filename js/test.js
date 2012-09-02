(function(){
	
	var  href = window.location.href
	
			,href_array = href.split("?")
			
			,basePortion_array = href_array[0].split("//")
			
			,protocol= basePortion_array[0]
			
			,host_array =  basePortion_array[1].split("/");
			
	window.base_url = protocol + '//' + host_array[0] + '/' + host_array[1] + '/';			
	
})();

(function(window, document){
	
	 var app = {
	 	init:function(){
	 		this.setProperties();
	 		this.getProducts();
			
	 	}
	 	,setProperties: function(){
	 		
	 		this.arrangment = [{
	 			  order:[
	 			 		 '220x380'
	 			 		,'456x180'
	 			 		,'220x180'
	 			 		,'220x380'
	 			 		,'456x380'
	 			 		,'220x180'		 			  
	 			  
	 		
	 			 		 			 		
	 			 	]
	 			 }
	 			 
	 			 ,{
	 			  order:[
	 			 		 '220x380'
	 			 		,'456x380'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'456x180'
	 			 		,'220x180'
	 			 	]
	 			 }		 			 
	 			 
 			 
 
	 			 ,{
	 			  order:[
	 			 		 '456x380' 			 		
	 			 		,'456x180'
	 			 		,'456x380'
	 			 		,'456x180' 			 			  
	 			  

	 			 	]
	 			 }		 			 
	 			 			 			 
	 			 ,{
	 			  order:[
	 			 		 '220x380'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'456x380'
	 			 		,'220x380'
	 			 		,'220x180'
	 			 	]
	 			 }		 			 
	 			 
	 			 		 
	 			 
	 			 ,{
	 			  order:[
	 			 		 '220x180'
	 			 		,'220x380'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'	 			 			 			  
	 			 		,'456x380'
	 			 		,'456x180'
	 			 	]
	 			 }		 			 

/*	 			 
	 			 ,{
	 			  order:[
	 			  
	 			 		 '220x380'
	 			 		,'220x380'
	 			 		,'220x380'
	 			 		,'220x380'
	 			 		,'220x180'	 			 		
	 			 		,'220x180'	 			 		
	 			 		,'220x180'	 			 		
	 			 		,'220x180'	
	 			 	]
	 			 }		 			 		 
	 			 ,{
	 			  order:[
	 			 		 '220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'
	 			 		,'220x180'

	 			 	]
	 			 }	 */
	 			 	
	 		];
	 		
	 		this.theArray = {
	 			 '220x380':{
	 			  width:'220'
	 			 ,height:'380'
	 			}
	 			,'220x180':{
	 			  width:'220'
	 			 ,height:'180'
	 			}	
	 			,'456x180':{
	 			  width:'456'
	 			 ,height:'180'
	 			}	 	
	 			,'456x380':{
	 			  width:'456'
	 			 ,height:'380'
	 			}	 					
	 			,'220x580':{
	 			  width:'220'
	 			 ,height:'580'	
	 			}
	 			,'238x220':{
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
	 			,'box700x580':{
	 			  width:'700'
	 			 ,height:'580'	
	 			}	 			
	 		};
	 		
	 	}
	 	,getProducts: function( callback){
	 		
	 			var that = this;
	 			
	
	 			$.getJSON(  'http://localhost/baubler/search/getJsonProductsInOrder',
				{},
				function(data) {
					
					that.products = data;
					that.createImages();

					var gutter = 10;
					$('#main').width(960).css({
						 'padding-top':'20px'
						 ,'background':'#F4F2F3'
					})
					$('#main ul').css({padding:'0px 0px 0px '+gutter+'px'});  // left
					$('#main ul li').css({margin:'0px '+gutter+'px '+gutter+'px 0px'}); // right bottom	
					that.applyMasonry();						

			    
				});
	 	}	
	 	,createImages: function(){
	 		
	 		console.log(this.products.length);
	 		
	 		var  li = ''
	 			,src
	 			,count=0;
			
			for(var order_key = 0; order_key <=4 ;order_key++){
				
				
				for( idx in this.arrangment[order_key].order){

					if( this.products[count] !== null){
			 			src = window.base_url + 'uploads/products/' + this.products[count] + '/' + this.arrangment[order_key].order[idx] + '.jpg?v=' + Math.random();
					}else{
						src = "http://placehold.it/"+this.theArray[this.arrangment[order_key].order[idx]].width+"x"+this.theArray[this.arrangment[order_key].order[idx]].height+"/red/png";
						//src = "http://lorempixel.com/g/"+this.theArray[this.arrangment[order_key].order[idx]].width+"/"+this.theArray[this.arrangment[order_key].order[idx]].height+"/fashion/" + this.arrangment[order_key].order[idx] + '-' + count +"/"	
					};
	
			 		li += "<li class='box'>\
			 		<img src=" + src + ">\
			 		</li>";
			 		
					count++;
				}		
						
				var ul = document.createElement('ul');
				$('#main').append(ul);
				
				$('#main ul').eq(order_key).addClass('mason_ul').append(li);
				
				li = '';
				
				
				if( count > this.products.length ) break;
				
			}

	 	}
	 	
	 	,applyMasonry :function(){
	 		
			var container = $('.mason_ul');			 	
			
			container.imagesLoaded( function(){
				container.masonry({
					itemSelector : '.box'
				});	
			});		
	 	}
	 	
	 };
	 
	 app.init();
	    
})(this, document);