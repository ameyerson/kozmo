
						<?php
						$artists = get_the_terms( $post->ID, 'artist' );	
						foreach( $artists as $artist ) {
							if (($artist->slug != 'new-products') && ($artist->slug != 'home-page'))  {$first_artist = $artist; break;}
						}
						$custom = get_post_custom($post->ID);
						$short_pitch= $custom["short_pitch"][0];	
						$url = get_bloginfo('url') . '/product/'. basename(get_permalink());
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
						?>
						<a href="<?php echo $url ?>" class="random text" >
						<div class="featured-thumb" style="background-image: url(<?php echo $image_url[0] ?>);"></div>
						<strong><?php the_title(); ?></strong><br/>
						<span class="no-change artist"><?php echo $first_artist->name ?></span>
						</a>
						<p class="no-change"><?php echo $short_pitch ?></p>
						<a href="<?php echo $url ?>" class="transparent box random" title="<?php the_title() ?> - <?php echo $first_artist->name ?>">SEE MORE<i class="icon-chevron-right" style="margin-left: 10px;"></i></a>
