<?php get_template_part( 'header', 'top' ); ?> 

	<header id="global-header">
		<div class="container">
			<h1>
				<a href="/">KozmoMagic
<!-- 					<span id="ring1" class="ring"></span>
					<span id="ring2" class="ring"></span>
					<span id="ring3" class="ring"></span> -->
				</a>
			</h1>
			<ul id="header-nav" class= "clearfix">
				<li><a href="<?php echo get_bloginfo('url'); ?>/product/" class="<?php if ( is_archive() ) { echo 'on'; } ?>">STORE</a></li>
				<li><a href="<?php echo get_bloginfo('url'); ?>/contact-us/" class="<?php if ( is_page('contact-us') ) { echo 'on'; } ?>">CONTACT</a></li>
			</ul>
		</div>
	</header>