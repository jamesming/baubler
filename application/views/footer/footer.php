



<script src="<?php echo base_url()    ?>js/libs/bootstrap/bootstrap.min.js"></script>

<script src="<?php echo base_url()    ?>js/plugins.js?v=<?php echo rand()    ?>"></script>
<script src="<?php echo base_url()    ?>js/script.js?v=<?php echo rand()    ?>"></script>

<script src="<?php echo base_url()    ?>js/nav.js?v=<?php echo rand()    ?>"></script>
<?php 

switch($body) {
    case "body/product_entry/view":
         ?>
         <script src="<?php echo base_url()    ?>js/product_entry.js?v=<?php echo rand()    ?>"></script>
         <?php
        break;
    case "body/search/view":
         ?>
         <script src="<?php echo base_url()    ?>js/search.js?v=<?php echo rand()    ?>"></script>
         <?php    
        break;
}

?>
<script src="<?php echo base_url()    ?>js/tags.js?v=<?php echo rand()    ?>"></script>


<script>
	var _gaq=[['_setAccount','<?php echo $GA_account;    ?>'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>



<script type="text/javascript" language="Javascript">
				!window.parent.hasOwnProperty("$") ||	window.parent.$('.top').parent().css({background:'#' + (Math.random() * 0xFFFFFF << 0).toString(16)});
</script>

