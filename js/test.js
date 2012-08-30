(function(window, document){
	
	 var app = {
	 	init:function(){
	 		this.setProperties();
	 		this.createImages();
			this.applyMasonry();
			
			var gutter = 10;
			$('#main').width(960).css({
				 'padding-top':'30px'
				,'background':'red'
			})
			$('#main ul').css({padding:'0px 0px 0px '+gutter+'px'});  // left
			$('#main ul li').css({margin:'0px '+gutter+'px '+gutter+'px 0px'}); // right bottom
			
	 	}
	 	,setProperties: function(){
	 		
	 		this.arrangment = [{
	 			  order:[
	 			 		 'box220x380'
	 			 		,'box456x180'
	 			 		,'box220x180'
	 			 		,'box220x380'
	 			 		,'box456x380'
	 			 		,'box220x180'		 			  
	 			  
	 		
	 			 		 			 		
	 			 	]
	 			 }
	 			 
	 			 ,{
	 			  order:[
	 			 		 'box220x380'
	 			 		,'box456x380'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box456x180'
	 			 		,'box220x180'
	 			 	]
	 			 }		 			 
	 			 
 			 
 
	 			 ,{
	 			  order:[
	 			 		 'box456x380' 			 		
	 			 		,'box456x180'
	 			 		,'box456x380'
	 			 		,'box456x180' 			 			  
	 			  

	 			 	]
	 			 }		 			 
	 			 			 			 
	 			 ,{
	 			  order:[
	 			 		 'box220x380'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box456x380'
	 			 		,'box220x380'
	 			 		,'box220x180'
	 			 	]
	 			 }		 			 
	 			 
	 			 		 
	 			 
	 			 ,{
	 			  order:[
	 			 		 'box220x180'
	 			 		,'box220x380'
	 			 		,'box456x180'
	 			 		,'box220x180'	 			 			 			  
	 			 		,'box456x380'
	 			 		,'box456x180'
	 			 	]
	 			 }		 			 


	 			 
	 			 
	 			 ,{
	 			  order:[
	 			  
	 			 		 'box220x380'
	 			 		,'box220x380'
	 			 		,'box220x380'
	 			 		,'box220x380'
	 			 		,'box220x180'	 			 		
	 			 		,'box220x180'	 			 		
	 			 		,'box220x180'	 			 		
	 			 		,'box220x180'	
	 			  

	 			  

	 			 	]
	 			 }		 			 		 
 			 


	 			 
	 			 ,{
	 			  order:[
	 			 		 'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'
	 			 		,'box220x180'

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
	 			 	,'http://crops.lover.ly/220x380_11809_6361362_1337959882_134.jpg'
	 			 	,'http://crops.lover.ly/220x380_11809_6796484_1338995088_836.jpg'
	 			 	,'http://crops.lover.ly/220x380_11809_6567221_1338301887_686.jpg'
	 			 	,'http://crops.lover.ly/220x380_7582_9467b888cc262789.jpg'
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
	 			 	,'http://youlookfab.com/files/2010/05/Kate-Spade-Stephie.jpg'
	 			 	,'http://crops.lover.ly/220x180_13095_5800e925a8e1e763.jpg'
	 			 	,'http://crops.lover.ly/220x180_9260_d5755153383264e6.jpg'
	 			 	,'http://crops.lover.ly/220x180_73_00faf23049a4233f2.jpg'
	 			 	,'http://crops.lover.ly/220x180_7488_010c16ff11088eac2.jpg'
	 			 	,'http://crops.lover.ly/220x180_86_0f5c6a719627f352e.jpg'
	 			 	,'http://crops.lover.ly/220x180_11809_6952690_1337959826_121.jpg'
	 			 	]	
	 			}	
	 			,'box456x180':{
	 			  width:'456'
	 			 ,height:'180'
	 			 ,src:[
	 			 		 'http://cdnc.lystit.com/photos/2012/05/20/tory-burch-royal-tan-leather-thong-sandals-miller-product-1-3558522-913852438_large_flex.jpeg'
	 			 		,'https://www.booksofthebible.com/stock/p4367d.jpg'
	 			 		,'http://www.hiberniajewelry.com/wp-content/uploads/2012/01/symbols-of-ireland_silver_bracelet-460x180.jpg'
	 			 		,'http://cdnd.lystit.com/photos/2011/11/25/mango-09-stripe-print-ballerina-shoes-product-1-2442284-735614907_large_flex.jpeg'
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
	 			 ,src:[
	 			 		'http://crops.lover.ly/300x180_16615_neonnightlifedress_1343080413_46.jpg'
	 			 	]	
	 			}
	 			,'box380x180':{
	 			  width:'380'
	 			 ,height:'180'
	 			}
	 			,'box456x380':{
	 			  width:'456'
	 			 ,height:'380'
	 			 ,src:[
	 			 	 'http://crops.lover.ly/460x380_11809_6877177_1337960303_688.jpg'
	 			 	,'http://cdnc.lystit.com/photos/2012/07/29/kate-spade-b-gold-coast-coin-purse-product-2-4336803-086859172_large_flex.jpeg'
 			 		,'http://crops.lover.ly/460x380_75_0515b8d201ca77590.jpg'
 			 		,'http://crops.lover.ly/460x380_75_06e7cf26bd01c5af.jpg'	 			 	
	 			 	]
	 			}
	 			,'box700x580':{
	 			  width:'700'
	 			 ,height:'580'	
	 			}	 			
	 		};
	 		
	 	}
	 	,createImages: function(){
	 		
	 		var  img = ''
	 			,src;
			
			for(var order_key = 0; order_key <=4 ;order_key++){
				
				for( idx in this.arrangment[order_key].order){

					src = "http://placehold.it/"+this.theArray[this.arrangment[order_key].order[idx]].width+"x"+this.theArray[this.arrangment[order_key].order[idx]].height+"/green/png";
	
//					if( this.theArray[this.arrangment[order_key].order[idx]].hasOwnProperty('src')){
//						if( !this.theArray[this.arrangment[order_key].order[idx]].hasOwnProperty('srcIdx') ){
//							this.theArray[this.arrangment[order_key].order[idx]].srcIdx = 0;
//						}else{
//							this.theArray[this.arrangment[order_key].order[idx]].srcIdx++;
//						};
//						if( typeof( this.theArray[this.arrangment[order_key].order[idx]].src[ this.theArray[this.arrangment[order_key].order[idx]].srcIdx ]  ) !== "undefined" ){
//							src = this.theArray[this.arrangment[order_key].order[idx]].src[ this.theArray[this.arrangment[order_key].order[idx]].srcIdx ];
//						};
//					};
	
			 		img += "<li class='box'>\
			 		<img src=" + src + ">\
			 		</li>";
	
				}				
				var ul = document.createElement('ul');
				$('#main').append(ul);
				$('#main ul').eq(order_key).addClass('mason_ul').append(img);
				img = '';
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