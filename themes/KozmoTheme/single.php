<?php get_header(); ?>
<div id="products">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part ( 'entry-product' ); ?>
	<?php
	$artists = get_the_terms( $post->ID, 'artist' );	
	foreach ($artists as $artist) {
		if (!in_array($artist->slug, array('new-products', 'home-page'))) {$the_artist = $artist; break;}
	}
	$query = new WP_Query( array( 'artist' => $the_artist->slug, 'post__not_in' => array($post->ID ), 'orderby' => 'date', 'order' => 'DESC' , 'posts_per_page' => -1 ) );	
	if ( $query->have_posts() ) : ?>
		<h3>More from <?php echo $the_artist->name ?></h3>
	<?php while ( $query->have_posts()  ) : $query->the_post();
		if (get_post_type( $post )  == 'product' ) { ?>
			<div class="entry-results group">
			<?php
			$custom = get_post_custom($post->ID);
			$short_pitch= $custom["short_pitch"][0];	
			$amount= $custom["amount"][0];
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
			?>
			<a href="<?php echo get_bloginfo('url'); ?>/product/<?php echo basename(get_permalink()) ?>" class="random text" >
			<div class="results-thumb" style="background-image: url(<?php echo $image_url[0] ?>);"></div>
			<strong><?php the_title(); ?></strong><span class="no-change"> - <?php echo $first_artist->name ?></span>
			<span class="right"><strong>$<?php echo $amount ?></strong></span>
			<p class="fullscreen tablet"><?php echo $short_pitch ?></p>
			</a></div>
		<?php } ?>
<?php endwhile; else:
		echo '';
	endif;
	?>

	
	
<?php endwhile; else: ?>
	<p> </p>
<?php endif; ?>
</div>
<?php get_footer(); ?>