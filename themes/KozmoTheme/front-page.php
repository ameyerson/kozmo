<?php get_header(); ?>

			<div id="featured" class="group">	
				<div id="banner-container" class="fullscreen tablet">
					<ul class="banner">
				<?php
				$banners = array();
				$query_banner = new WP_Query( array( 'post_type' => array('banner')) );
				if ( $query_banner->have_posts() ) : while ( $query_banner->have_posts()  ) : $query_banner->the_post();
						$custom = get_post_custom($post->ID);
						$product_ID= $custom["product_ID"][0];
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						if ($product_ID) {
							$link = get_permalink( $product_ID );
							$banners[] = $product_ID;
						}
				?> 
					  <li><a href="<?php echo $link ?>"><img src="<?php echo $image_url[0] ?>" /></a></li>
				<?php endwhile; else: ?>
						<p> </p>
				<?php endif; ?>
					</ul>
				</div>
				<div id="banner-shadow"></div>
				<div id="newstuff" class="group">
				<?php
					foreach($banners as $post_id) {
						$post = get_post($post_id); ?>
						<div class="featured-entry mobile">
							<?php get_template_part ( 'entry-featured' ); ?>
						</div>
					<?php } ?>

					<?php 
					$query = new WP_Query( array( 'artist' => 'home-page', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 ) );
					if ( $query->have_posts() ) : while ( $query->have_posts()  ) : $query->the_post(); ?>
						<div class="featured-entry">
							<a href="<?php the_permalink(); ?>" class="thumb-link"><div class="archive-thumb" style="background-image: url(<?php echo $image_url[0] ?>)" rel="<?php echo $image_url[0] ?>"></div></a>
							<div class="listing-content">
								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
								<div class="byline">
									<?php echo get_the_term_list($post->ID, 'property-category', '', ', ',''); ?>
								</div><!-- .byline -->
								<div>
								<?php the_excerpt(); ?>
								</div>
								<a class="more" href="<?php the_permalink(); ?>"><i class="icon-arrow-right"></i>Full Listing</a>
							</div>
						</div>
					<?php endwhile; else: ?>
						<p> </p>
					<?php endif; ?>
				
				

				</div>
			
			
			
			</div>

<?php get_footer(); ?>