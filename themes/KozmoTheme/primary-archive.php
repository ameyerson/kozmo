				<p style="border-bottom: 3px double #eee; margin-bottom: 0; padding-bottom: 1em;" class="fullscreen tablet">We are dedicated to bringing you the best. We have developed a great collection of artists here and will be continuing to add more in the near future...
					Keep coming back to kozmomagic.com to see what we have to offer!</p>
<?php
				$menu_name = 'artists';
				if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menu_items = wp_get_nav_menu_items($menu->term_id);
				}
				if (count($menu_items) > 0) {
					foreach ($menu_items as $menu_item) {
						$term_row = get_term_by('slug', basename($menu_item->url), 'artist');
						echo '<h3><a href="' . $menu_item->url . '" class="random">' . $term_row->name . '</a></h3>';
						echo '<ul class="store group">';
						$query = new WP_Query( array( 'artist' => basename($menu_item->url), 'orderby' => 'date', 'order' => 'DESC' , 'posts_per_page' => -1 ) );
						if ( $query->have_posts() ) : while ( $query->have_posts()  ) : $query->the_post();
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
							<li>
							<a href="<?php echo get_bloginfo('url'); ?>/product/<?php echo $query->post->post_name ?>" class="random text">
								<div class="results-thumb" style="background-image: url(<?php echo $image_url[0] ?>)"></div>
								<p><?php the_title() ?></p>
							</a>
							</li>
							<?php  
						endwhile; else:
							echo '<li> </li>';
						endif;
						echo '</ul>';
					}
				}
?>	