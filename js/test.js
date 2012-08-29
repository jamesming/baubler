(function(window, document){
	
	 var app = {
	 	init:function(){
	 		this.setProperties();
	 		this.createImages();
			this.applyMasonry();
			
			var gutter = 11;
			$('#main').width(982).css({'padding-top':'30px'})
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
	 			 ,src:[
	 			 	 'http://crops.lover.ly/220x380_87_d83d639adcf7df18.jpg'
	 			 	,'http://crops.lover.ly/220x380_16615_magentaorchidgown_1343080475_685.jpg'
	 			 	]	
	 			}
	 			,'box220x180':{
	 			  width:'220'
	 			 ,height:'180'
	 			 ,src:[
	 			 	 'http://www.popularhandbags.com/img/coach-poppy-glam-groovy-shoulder-crossbody-bag-purse-13834-multi_21207_220.jpg'
	 			 	,'http://crops.lover.ly/220x180_16615_vintagechanelcrossribbonearrings_1343080432_475.jpg'
	 			 	,'http://tips.become.com/assets/images/shoe-tips/black-dress-shoes.jpg'
	 			 	,'http://www.morninggloryantiques.com/imagesS7/cap60896_small.jpg'
	 			 	,'http://crops.lover.ly/220x180_16615_cherrybombclutch_1343079880_778.jpg'
	 			 	]	
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
	 			 ,src:['http://cdnc.lystit.com/photos/2012/07/29/kate-spade-b-gold-coast-coin-purse-product-2-4336803-086859172_large_flex.jpeg']
	 			}
	 			,'box700x580':{
	 			  width:'700'
	 			 ,height:'580'	
	 			}	 			
	 		};
	 		
	 	}
	 	,createImages: function(){
	 		
	 		var  img = ''
	 			,order_key = 0
	 			,src;
	 		
			
			for( idx in this.arrangment[order_key].order){

				src = "http://placehold.it/"+this.theArray[this.arrangment[order_key].order[idx]].width+"x"+this.theArray[this.arrangment[order_key].order[idx]].height+"/green/png";

				if( this.theArray[this.arrangment[order_key].order[idx]].hasOwnProperty('src')){
					if( !this.theArray[this.arrangment[order_key].order[idx]].hasOwnProperty('srcIdx') ){
						this.theArray[this.arrangment[order_key].order[idx]].srcIdx = 0;
					}else{
						this.theArray[this.arrangment[order_key].order[idx]].srcIdx++;
					};
					if( typeof( this.theArray[this.arrangment[order_key].order[idx]].src[ this.theArray[this.arrangment[order_key].order[idx]].srcIdx ]  ) !== "undefined" ){
						src = this.theArray[this.arrangment[order_key].order[idx]].src[ this.theArray[this.arrangment[order_key].order[idx]].srcIdx ];
					};
				};

		 		img += "<li class='box'>\
		 		<img src=" + src + ">\
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