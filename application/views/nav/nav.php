    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Baubler Admin</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="#about">About</a></li>
              <li  id='nav_product_search' ><a href="<?php echo base_url()     ?>search">Search</a></li>
              <li  id='nav_product_entry' class="active"><a href="<?php echo base_url()     ?>product_entry">Product Entry</a></li>
              <li><a  id='mode' href="#">Update</a></li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<script type="text/javascript" language="Javascript">
	
	$(document).ready(function() { 
		
		$('.nav li').removeClass('active');
		$('#<?php echo $nav_selected;    ?>').addClass('active');
		
	});

</script>