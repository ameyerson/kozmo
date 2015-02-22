			<?php if ( have_posts() ) : ?>
				<h2>Search Results for: <span><?php echo get_search_query() ?></span></h2>
				<?php kozmo_pagination(); ?>
				<div style="clear:both;"></div>
				<div id="all-results">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $artists = get_the_terms( $post->ID, 'artist' );	
						foreach( $artists as $artist ) {
							if (!in_array($artist->slug, array('new-products', 'home-page')))  {$first_artist = $artist; break;}
						}
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
				<?php endwhile; ?>
				</div>
			<?php else : ?>
					<h2>Nothing Found</h2>
					<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
					<?php get_search_form(); ?>
			<?php endif; ?>