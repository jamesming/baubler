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
	 		
			this.applyMasonry();
			
			var gutter = 10;
			$('#main').width(960).css({
				 'padding-top':'20px'
				 ,'background':'#F4F2F3'
			})
			$('#main ul').css({padding:'0px 0px 0px '+gutter+'px'});  // left
			$('#main ul li').css({margin:'0px '+gutter+'px '+gutter+'px 0px'}); // right bottom
			
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
	 			 ,src:[
	 			 	 'http://crops.lover.ly/220x380_87_d83d639adcf7df18.jpg'
	 			 	,'http://crops.lover.ly/220x380_16615_magentaorchidgown_1343080475_685.jpg'
	 			 	,'http://crops.lover.ly/220x380_11809_6361362_1337959882_134.jpg'
	 			 	,'http://crops.lover.ly/220x380_11809_6796484_1338995088_836.jpg'
	 			 	,'http://crops.lover.ly/220x380_11809_6567221_1338301887_686.jpg'
	 			 	,'http://crops.lover.ly/220x380_7582_9467b888cc262789.jpg'
	 			 	]	
	 			}
	 			,'220x180':{
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
	 			 	,'http://crops.lover.ly/220x180_71_0e7a082047652a5fb.jpg'
	 			 	,'http://crops.lover.ly/220x180_75_145fb7ba4811a527.jpg'
	 			 	]	
	 			}	
	 			,'456x180':{
	 			  width:'456'
	 			 ,height:'180'
	 			 
	 			 ,src:[
	 			 		  'http://cdnd.lystit.com/photos/2011/12/17/diane-von-furstenberg-royal-blue-suede-palm-wedge-slide-product-4-2564461-538315793_full.jpeg'
	 			 		 ,'http://www.desirablegems.com/resources/net.mage.prevalent.potion.products.Product/picture/%5Bjava.lang.Integer:4:4305%5D.jpg'
	 			 		 ,'http://cdna.lystit.com/photos/2011/09/17/miu-miu-nero-flared-heel-bootie-product-3-2056139-636211227_full.jpeg'
	 			 		 ,'http://pictures.kyozou.com/pictures/_6/5030/5029216.jpg'
	 			 		 ,'http://cdn.highwire.com/2345420-2562328.jpg'
	 			 		 
	 			 	]	
	 			 
	 			 

	 			}	 	
	 			
	 			,'456x380':{
	 			  width:'456'
	 			 ,height:'380'
	 			 
	 			 ,src:[
	 			 		 'http://images.texnet.com.cn/bin/img/product_en---0-----232/700232_1.jpg'
	 			 		,'http://sickathanverage.typepad.com/.a/6a00e5504d1b2f88330120a7009477970b-800wi'
	 			 		,'http://www.thejewelbox.com/vint_rings/RN2682V.jpg'
	 			 		,'http://www.fashionfuss.com/wp-content/uploads/2009/09/emilio-pucci-metal-toecap-suede-pumps-1.jpg'
	 			 		,'http://g-soul.ocnk.net/data/g-soul/product/20120309_960540.jpg'
	 			 		,'http://www.giddygecko.com/wpimages/a6b2c6db2306.jpg'
	 			 	]		 			 

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
	 			 ,src:[
	 			 		'http://crops.lover.ly/300x180_16615_neonnightlifedress_1343080413_46.jpg'
	 			 	]	
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
	 	,createImages: function(){
	 		
	 		var  img = ''
	 			,src
	 			,count=0;
			
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
	

			 		
			 		
			 		console.log( window.base_url + 'uploads/products/' + this.products[count] + '/' + this.arrangment[order_key].order[idx] + '.jpg' );
			 		
			 		//src = window.base_url + 'uploads/products/' + this.products[count] + '/' + this.arrangment[order_key].order[idx] + '.jpg';
			 		
			 		
			 		img += "<li class='box'>\
			 		<img src=" + src + ">\
			 		</li>";			 		
			 		
			 		
			 		
			 		count++;
	
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
	 	
	 	,getProducts: function( callback){
	 		
	 			var that = this;
	 		
	 			$.getJSON( window.base_url  + '/search/getJsonProductsInOrder',
				{},
				function(data) {
					
					that.products = data;
					console.log(that.products);
					
					that.createImages();
					
			    
				});
	 	}
	 	
	 };
	 
	 app.init();
	    
})(this, document);