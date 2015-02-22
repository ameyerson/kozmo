<?php get_header(); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
				</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>