<?php
 //jQuery Insert From Google
if (!is_admin()) add_action("wp_enqueue_scripts", "kozmo_jquery_enqueue");
function kozmo_jquery_enqueue() {
	$url = get_stylesheet_directory_uri() . '/js/';
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr', "{$url}libraries/modernizr-2.6.2-respond-1.1.0.min.js", array( 'jquery'), '', false);
	wp_enqueue_script( 'main', "{$url}main.js", array( 'jquery'), '', false);

    if (is_front_page()) {
		wp_enqueue_script( 'jquery-ui', "{$url}libraries/jquery-ui-1.8.22.custom.min.js", array( 'jquery', 'modernizr' ), '', true);
		wp_enqueue_script( 'imagesloaded', "{$url}libraries/jquery.imagesloaded.min.js", array( 'jquery', 'modernizr' ), '', true);
		wp_enqueue_script( 'video', "{$url}libraries/video.js", array( 'jquery', 'modernizr' ), '', true);
		wp_enqueue_script( 'bigvideo', "{$url}libraries/bigvideo.js", array( 'jquery', 'modernizr' ), '', true);
		wp_enqueue_script( 'transit', "{$url}libraries/jquery.transit.min.js", array( 'jquery', 'modernizr' ), '', true);
	}
}

 // Metabox for Custom Page Titles
add_action('admin_menu', 'custom_title');
add_action('save_post', 'save_custom_title');
add_action('wp_head','insert_custom_title');
function custom_title() {
	add_meta_box('custom_title', 'Change page title', 'custom_title_input_function', 'post', 'normal', 'high');
	add_meta_box('custom_title', 'Change page title', 'custom_title_input_function', 'page', 'normal', 'high');
}
function custom_title_input_function() {
	global $post;
	echo '<input type="hidden" name="custom_title_input_hidden" id="custom_title_input_hidden" value="'.wp_create_nonce('custom-title-nonce').'" />';
	echo '<input type="text" name="custom_title_input" id="custom_title_input" style="width:100%;" value="'.get_post_meta($post->ID,'_custom_title',true).'" />';
}
function save_custom_title($post_id) {
	if (!wp_verify_nonce($_POST['custom_title_input_hidden'], 'custom-title-nonce')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$customTitle = $_POST['custom_title_input'];
	update_post_meta($post_id, '_custom_title', $customTitle);
}
function insert_custom_title() {
	if (have_posts()) : the_post();
	  $customTitle = get_post_meta(get_the_ID(), '_custom_title', true);
	  if ($customTitle) {
		echo "<title>$customTitle</title>";
      } else {
    	echo "<title>";
	      if (is_tag()) {
	         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
	      elseif (is_archive()) {
	         wp_title(''); echo ' - '; }
	      elseif ((is_single()) || (is_page()) && (!(is_front_page())) ) {
	         wp_title(''); echo ' - '; }
	      if (is_home()) {
	         bloginfo('name'); echo ' - '; bloginfo('description'); }
	      else {
	          bloginfo('name'); }
	      if ($paged>1) {
	         echo ' - page '. $paged; }
        echo "</title>";
    }
    else :
      echo "<title>Page Not Found</title>";
	endif;
	rewind_posts();
}
 
// register custom menu
add_action('init', 'register_custom_menu');
// add support for thumbnails
add_theme_support( 'post-thumbnails' );
 
function register_custom_menu() {
register_nav_menus(array('artists' => 'Artist Menu' ));
}

require_once('product-posts.php');

add_action('init', 'kozmo_rewrite');
function kozmo_rewrite() {
	global $wp_rewrite;
	$wp_rewrite->add_permastruct('typename', 'typename/ ? %year%/%postname%/', true, 1);
	add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
	$wp_rewrite->flush_rules();
}

add_action( 'admin_menu', 'custom_remove_menus', 999 );
function custom_remove_menus() {
    global $current_user; $current_user = wp_get_current_user(); $current_user_id = $current_user->ID; // get the user ID
    if($current_user_id == '1') {
        // do nothing
    } else {
		remove_submenu_page( 'index.php', 'update-core.php' );
		remove_menu_page('edit.php');
		remove_menu_page('upload.php');
		remove_menu_page('plugins.php');
		remove_menu_page('users.php');
		remove_menu_page('options-general.php');
		remove_submenu_page( 'themes.php', 'themes.php' );
		remove_submenu_page( 'themes.php', 'widgets.php' );
		remove_submenu_page( 'themes.php', 'theme-editor.php' );
		remove_menu_page('tools.php');
        remove_menu_page('link-manager.php' );
		remove_menu_page('edit-comments.php');
		remove_menu_page( 'wpcf7');
    }
}
// dashboard
function custom_dashboard_widget() {
	echo "
		<p>Koz,</p>
		<ul>
		<li>-- Anything for sale goes in Products</li>
		<li>-- Add new Artists (or categories) under the Product menu</li>
		<li>-- Add Artists to the sidebar menu 'Appearance'</li>
		<li>   You control the text that appears on the sidebar list using the little 'down-arrow' on the item and changing 'Navigation Label'</li
		<li>-- Artwork and link to a product for the homepage banner goes in Banner</li>
		<li>   For a banner to link to a product, you need the ID number from the list of products</li>
		<li>-- 3 products to appear on the homepage need to have 'Homepage' checked off as an artist</li>
		<li>-- If there aren't three tagged Home Page, it pulls the laest products to make up the difference.</li>
		<li>-- Images get uploaded with 'set featured image' on the righthand side column</li>
		<li>   Upload the image and then click 'use as featured image' at the bottom of the modal window</li>
		<li>   Product photos are square, something like 400px X 400px;</li>
		<li>   Banners have aspect ration 3:1, and at their largest are 866px wide</li>
		</ul>
	";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'KozmoMagic', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');