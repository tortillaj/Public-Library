		<footer id="footer" class="source-org vcard copyright">
			<small>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>
			<p><small>This design was made by <a href="http://tortillaj.com">tortilla</a></small></p>
		</footer>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->
<link href='http://fonts.googleapis.com/css?family=Tinos:400,700' rel='stylesheet' type='text/css'>

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php echo JAVASCRIPTSPATH; ?>functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->
	
</body>

</html>
