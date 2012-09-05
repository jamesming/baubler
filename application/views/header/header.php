<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title    ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php  echo base_url()   ?>css/bootstrap/bootstrap.css">
	<style>
	body {
	  padding-top: 60px;
	  padding-bottom: 40px;
	}
	</style>
	
	<link rel="stylesheet" href="<?php  echo base_url()   ?>css/bootstrap/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="<?php  echo base_url()   ?>css/style.css?v=<?php echo rand()    ?>">

	<script type="text/javascript" language="Javascript">
		
		(function(){
			
			var  href = window.location.href
			
					,href_array = href.split("?")
					
					,basePortion_array = href_array[0].split("//")
					
					,protocol= basePortion_array[0]
					
					,host_array =  basePortion_array[1].split("/");
					
			window.base_url = protocol + '//' + host_array[0] + '/' + host_array[1] + '/';			
			
		})();
		
	</script>

<script src="<?php  echo base_url()   ?>js/libs/modernizr/modernizr-2.5.3-respond-1.1.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js"></script>
<script>window.jQuery || document.write('<script src="' + window.base_url + 'js/libs/jquery/jquery-1.7.2.min.js"><\/script>')</script>
<script>window._ || document.write('<script src="' + window.base_url + 'js/libs/underscore/underscore-min.1.3.3.js"><\/script>')</script>

</head>