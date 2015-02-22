						<?php
						$custom = get_post_custom($post->ID);
						$more= $custom["more"][0];
						$even_more= $custom["even_more"][0];
						$short_pitch= $custom["short_pitch"][0];	
						$trailer= $custom["trailer"][0];
						$item_name= $custom["item_name"][0];
						$item_number= $custom["item_number"][0];
						$amount= $custom["amount"][0];
						$options_label= $custom["options_label"][0];
						$custom_options= $custom["custom_options"][0];
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
						?>
						<div class="product-entry">
							<a name="<?php echo basename(get_permalink()) ?>"></a><h3><?php echo the_title(); ?></h3>
							<div class="product-detail-block column">
								<?php echo the_content(); ?>
								<?php if ($amount) { ?>
								<p class="price"><span>$<?php echo $amount ?></span><br/>SHIPPING INCLUDED</p>
								<?php } ?>
									<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
										<input type="hidden" name="cmd" value="_cart"></input>
										<input type="hidden" name="business" value="magicman1234@verizon.net"></input>
										<input type="hidden" name="lc" value="US"></input>
										<input type="hidden" name="item_name" value="<?php echo $item_name ?>"></input>
										<input type="hidden" name="item_number" value="<?php echo $item_number ?>"></input>
										<input type="hidden" name="amount" value="<?php echo preg_replace('/\D/', '', $amount) ?>"></input>
										<input type="hidden" name="currency_code" value="USD"></input>
										<input type="hidden" name="button_subtype" value="products"></input>
										<input type="hidden" name="no_note" value="0"></input>
										<input type="hidden" name="add" value="1"></input>
										<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHostedGuest"></input>
										<?php if ($custom_options) {
											echo '<div class="custom-options">';
											echo '<input type="hidden" name="on0" value="' . $options_label . '"></input>';
											echo '<label>' . $options_label . '</label><br/>';
											echo '<select name="os0">';
											$options_list = explode(", ", $custom_options);
											foreach ($options_list as $value) {
												echo '<option value="' . $value . '">' . $value . '</option>';
											}
											echo '</select></div><div style="clear:both"></div>';	
										}?>
										<?php if ($amount) { ?>
										<input type="submit" name="submit" value="BUY NOW" class="random box transparent"></input>
										<?php } ?>
										<?php if ($trailer) { ?>
											<a href="http://www.youtube.com/embed/<?php echo $trailer ?>?autoplay=1&amp;autohide=1&amp;rel=0&amp;showinfo=0" class="fancybox fancybox.iframe transparent box random fullscreen tablet" title="<?php echo the_title() ?> - <?php echo get_queried_object()->name ?>">WATCH TRAILER</a>
											<a href="http://www.youtube.com/watch?v=<?php echo $trailer ?>&amp;autoplay=1" target="_blank" class="transparent box random mobile" title="<?php echo the_title() ?> - <?php echo get_queried_object()->name ?>">WATCH TRAILER</a>
										<?php } else { ?>
										<span style="float: left; height: 1em; width: 50%;" class="fullscreen tablet"></span>		
										<?php } ?>
									</form>
							</div>
							<?php if ($trailer) { ?>
							<a href="http://www.youtube.com/embed/<?php echo $trailer ?>?autoplay=1&amp;autohide=1&amp;rel=0&amp;showinfo=0" class="fancybox fancybox.iframe" title="<?php echo the_title() ?> - <?php echo get_queried_object()->name ?>">
							<?php } ?>
								<div class="product-containing-block column">
									<div class="product-image-wrapper">
										<div class="product-image" style="background-image: url(<?php echo $image_url[0] ?>)"></div>
									</div>
								</div>
							<?php if ($trailer) { ?>
							</a>
							<?php } ?>
							<p style="clear:both">
								<?php 
								echo $more;
								if ($even_more) { ?>
									<p class="fullscreen tablet"><a href="#inline-<?php echo basename(get_permalink()) ?>" class="fancybox random text" style="font-weight: 700;">
									Even More >>>
									</a> </p>
									<div id="inline-<?php echo basename(get_permalink()) ?>" style="display:none;"> 
										<h4 class="start"><?php echo the_title() ?> - <?php echo get_queried_object()->name ?></h4>
										<p><?php echo $even_more ?></p> 
									</div> 
								<?php } ?>
							</p>
						</div>		