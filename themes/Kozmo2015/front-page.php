<?php get_header(); ?>

<!-- 	<div id="video-screen">
		<video
			preload="auto" width="300" height="150"
			poster="http://video-js.zencoder.com/oceans-clip.png"
			data-setup=''>
			<source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
			<source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
			<source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
			<p>
				To view this video please enable JavaScript, and consider upgrading to a web browser that 
				<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
			</p>
		</video>
	</div> -->

	<div class="wrapper">
		<div id="video-bkg"></div>
		<nav id="screen-nav">
			<ul>
				<li><a href="#" rel="1">cards</a></li>
				<li><a href="#" rel="2">coins</a></li>
				<li><a href="#" rel="3">dove</a></li>
			</ul>
		</nav>

		<section class="screen live" id="screen-1" data-video="<?php echo get_stylesheet_directory_uri(); ?>/videos/cards.mp4">
			<div class="overlay"></div>
			<div class="big-image" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/cards.jpg)"></div>
		</section>
		<section class="screen" id="screen-2" data-video="<?php echo get_stylesheet_directory_uri(); ?>/videos/coins.mp4">
			<div class="overlay"></div>
			<div class="big-image" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/coins.jpg)"></div>
		</section>
		<section class="screen" id="screen-3" data-video="<?php echo get_stylesheet_directory_uri(); ?>/videos/dove.mp4">
			<div class="overlay"></div>
			<div class="big-image" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/dove.jpg)"></div>
		</section>
	</div>

<?php get_footer(); ?>