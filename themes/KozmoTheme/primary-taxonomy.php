					<h2>
						<?php if (get_queried_object()->slug != 'new-products') {echo 'Artist: ';} ?> 
						<?php echo get_queried_object()->name; ?>
					</h2>
					<?php kozmo_pagination(); ?>
					<div style="clear: both;"></div>
					<div id="products">
					<?php 
					$query = new WP_Query( array( 'artist' => get_queried_object()->slug, 'orderby' => 'date', 'order' => 'DESC' ) );
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

						<?php get_template_part ( 'entry-product' ); ?>

					<?php endwhile; else: ?>
						<p> </p>
					<?php endif; ?>
					</div>	
					
