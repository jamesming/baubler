<style>
#container {
  background: #FFF;
  padding: 5px;
  margin-bottom: 20px;
  border-radius: 5px;
  clear: both;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
}

.centered { margin: 0 auto; }


.box {
  margin: 5px;
  padding: 5px;
  background: #D8D5D2;
  font-size: 11px;
  line-height: 1.4em;
  float: left;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
}



.box img{
  display: block;
  width: 100%;
}


.col1 { width: 80px; }
.col2 { width: 180px; }
.col3 { width: 280px; }
.col4 { width: 380px; }
.col5 { width: 480px; }

.col1 img { max-width: 80px; }
.col2 img { max-width: 180px; }
.col3 img { max-width: 280px; }
.col4 img { max-width: 380px; }
.col5 img { max-width: 480px; }
</style>

<div id="container">
	

	<?php foreach( $images  as  $key => $image):?>
	
	    <div class="box photo ">
      	<a href="#" title=""><img src="<?php  echo base_url()   ?>uploads/images/<?php   echo $image->id;  ?>/image.jpg" alt="" /></a>
   		</div>
   		
	<?php endforeach; ?>
	
	


</div> <!-- #container -->


<script type="text/javascript" language="Javascript">

	$(document).ready(function() {
		
		_.extend(core, {
			
			 start: function(){

					    var $container = $('#container');
					    
					    $('.photo').addClass('col2');
					  
					    $container.imagesLoaded( function(){
					      $container.masonry({
					        itemSelector : '.box'
					      });
					    });
				
			}
			,test:function(){
				
			}
			
		});
		
//		core.loadCSS(window.base_url  + 'js/libs/masonry/jquery.masonry.min.js');
		core.loadScript('jcrop', window.base_url  + 'js/libs/masonry/jquery.masonry.min.js', function(){
			
			core.start();	
			
		}); 
		
		core.processCallbackQueue();		
		
	});
	
	
</script>