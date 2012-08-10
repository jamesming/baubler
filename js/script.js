/* Author: James Ming
*/


core = {
			init:function(){
				
				this.setProperties();
				
				this.bindClickToChooseColor();
				
				this.bindClickToChooseArticle();				
				
				this.loadSpinner();
				
			}
			
			,setProperties:function(){
				
	 			this.spinnerDelay = 2000;
	 			
	 			this.tags = [];
	 			
			}
			
			,getRandoms: function(numPicks, low, high) {
				
				
					var len = high - low + 1;
					var nums = new Array(len);
					var selections = [], i;
					// initialize the array
					for (i = 0; i < len; i++) {
					    nums[i] = i + low;
					}
					
					// randomly pick one from the array
					for (var i = 0; i < numPicks; i++) {
					    var index = Math.floor(Math.random() * nums.length);
					    selections.push(nums[index]);
					    nums.splice(index, 1);
					}
					return(selections);
			}
			
	 		,loadSpinner:function(){
	 			
	 						var  style =''
	 								,that = this;
	 								
							this.loadScript('spinner', window.base_url + 'js/libs/spinner/' + 'spin.min.js', function(){
								
									that.loadCSS(window.base_url + 'js/libs/spinner/' + 'spin.css');
					
									that.createFixedDiv(
										 'spinner'
										, style
									);
									
									that.spinner = new Spinner();
									that.target = document.getElementById('spinner');
									
								});
							this.processCallbackQueue();
			}	
			,scripts: {}
    	,loadScript : function(name, url, callback){
    		
    		this.callbackQueue[name] = {
    			 scripts:false
    			,callback:callback	
    		};

				if( !this.scripts[name]){
					
	    		if(    typeof(this.target) !== "undefined" 
	    				&& typeof(this.spinner) !== "undefined" ){
	    					
						this.target.style.display='block';					
						this.spinner.spin(this.target);	
	    					
						this.target.style.display='block';					
						this.spinner.spin(this.target);	    			
	    		};					
					
					this.scripts[name] = url;
					
	    		var  head = document.documentElement
	    				,script = document.createElement('script');
	    		
	    		script.async = false;
	    		script.src = url;
	    		
	    		var 	that = this
	    				 ,done = false;
	    		
	    		script.onload = script.onreadystatechange = function(){

  											
	    			if( this.readyState != 'loading' ) {  											
	    											
	    											done = true;

	    											if( that.callbackQueue[name]){		
	    												that.callbackQueue[name].scripts = true;
	    											};

	    											script.onload = script.onreadystatechange = null;
	    											if( head && script.parentNode ){
	    												head.removeChild( script );
	    											};
	    				
	    			};
	    			
	    		};
	    		head.insertBefore( script, head.firstChild );					
					
				} 
				else {

					this.callbackQueue[name].scripts = true;
					
				}
    	}
    	
			,callbackQueue: {}    	
    	,processCallbackQueue: function(){
    		
	    		var		that = this
	    		     ,queueIsReady = function(){
	    		     		var readiness = true;
					    		for( name in that.callbackQueue){
					    			if( that.callbackQueue[name].scripts === false){
					    				readiness = false;
					    			};
					    		};
					    		return readiness;  			
				    		}
				    	 ,doWhenReady = function(){
				    	 	
				    	 		if( queueIsReady() === false){
				    	 			setTimeout(function(){
				    	 				doWhenReady();
				    	 			}, 10);
				    	 		}else{
							    		for( name in that.callbackQueue){
							    			that.callbackQueue[name].callback();
							    			delete that.callbackQueue[name];
							    		};
							    		that.callbackQueue = {};
							    		setTimeout(function(){
							    			if( typeof(that.spinner) !== "undefined"){
							    				that.spinner.stop();
							    				that.target.style.display='none';	
							    			}  
							    		}, core.spinnerDelay);
							    		
				    	 		};
				    	 };
				    	 
				 doWhenReady();

    	}	
    	
    	
			,loadCSS: function( url){
			
					var     head = document.getElementsByTagName('head')[0]				    		
								, link = document.createElement('link')
							  , path = url + '?v=' + Math.floor(Math.random() * (99999999999999 - 1 + 1)) + 1;			
							  
						    link.rel = 'stylesheet';
						    link.type = 'text/css';
						    link.href = path;
						    link.media = 'all';
						    head.parentNode.insertBefore(link, head);			
						    $(head).prepend(link);			
			
			}
			,createFixedDiv:function( nameOfId, style ){
										  var newDiv = document.createElement('div');
											newDiv.id =  nameOfId;
											newDiv.innerHTML = style;
											document.body.insertBefore(newDiv, document.body.firstChild);	
			}
			
			
			
			
			,bindClickToChooseColor: function(){
				
					var that = this;
				
					$('.tags.container .colors .box').click(function(event) {
						
						if( $(this).data('checked') === true ){
							var idx = that.tags.indexOf($(this).attr('tag_id'));
							that.tags.splice(idx, 1);
							$(this).data('checked', false ).html('');
						}else{
							that.tags.push($(this).attr('tag_id')); 
							$(this).data('checked', true ).html('&#10003');
						};
						
						console.log(that.tags);
						
					});	
				
			}
			
			,bindClickToChooseArticle:function(){
				
					var that = this;
				
					$('.tags.container .articles .box').click(function(event) {
						
						$('.articles .box').data('checked', false ).css({background:'white'});
						
						if( $(this).data('checked') === true ){

							$(this).data('checked', false ).css({background:'white'});
							
						}else{

							$(this).data('checked', true ).css({background:'yellow'});
							
						};
						
						console.log(that.tags);
						
					});					
				
				
			}
			
			,clear_tags:function(){
				this.tags = []; $('.tags.container .colors .box').empty().data('checked', false);
			}
			
			
    	
};
window.onload = function(){
	core.init();	
};

