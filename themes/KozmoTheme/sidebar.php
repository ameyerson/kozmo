			<div id="sidebar">
				<?php wp_nav_menu( array('menu' => 'artists', 
										'container' => '', 
										'items_wrap' => '<ul id="menu-sidebar"><li id="all-products" class="mobile">
													<a href="' . site_url('/') . 'product/">All Products</a></li>
													%3$s</ul>' ) ); ?>
			</div>