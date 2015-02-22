<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="Amazing collection of the best magic artists on DVD.  For sale direct with PayPal Checkout." />
	<meta name="keywords" content="magic DVD,magic tricks,magic tricks DVD,card tricks,street magic,coin magic,card magic,magic supply,magic supplies" />
	<meta name="robots" content="index, follow" />
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php if ( is_front_page() ) { ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/style-homepage.css" /> <!-- homepage stylesheet -->
	<?php } ?>
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>/css/ie.css" />
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<!-- [if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-ie7.css" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" media="screen" />
	<?php wp_head(); ?>
	<script type="text/javascript">$(function () {$("#menu-sidebar").tinyNav();});	</script>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-37682480-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<div id="body" class="group">
			<div id="header">
				<ul class="menu horizontal group">
					<li><a href="<?php echo get_bloginfo('url'); ?>/" class="random box transparent start <?php if ( is_front_page() ) { echo 'on'; } ?>">HOME</a></li>
					<li><a href="<?php echo get_bloginfo('url'); ?>/product/" class="random box transparent start <?php if ( is_archive() ) { echo 'on'; } ?>">STORE</a></li>
					<li><a href="<?php echo get_bloginfo('url'); ?>/contact-us/" class="random box transparent start <?php if ( is_page('contact-us') ) { echo 'on'; } ?>">CONTACT US</a></li>
				</ul>
				<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" id="checkout">
					<input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="business" value="magicman1234@verizon.net" /> 
					<input type="submit" name="submit" value="CHECKOUT" id="checkout" class="random start box inverted"/> 
					<input type="hidden" name="display" value="1" /> <input type="hidden" name="page_style" value="PayPal" />
				</form>
				<div style="clear:both;"></div>
				<h1><a href="<?php echo get_bloginfo('url'); ?>/" class="random">KozmoMagic
					<span id="ring1" class="ring"></span>
					<span id="ring2" class="ring"></span>
					<span id="ring3" class="ring"></span>
				</a></h1>
			</div><!-- div#header -->
			<div id="crumbs" class="group">
				<?php the_breadcrumb(); ?>
				<?php get_search_form( $echo ); ?>
			</div><!-- div#breadcrumb -->
			<div id="container2">
				<div id="container1">
					<?php get_sidebar(); ?>
					<div id="primary">