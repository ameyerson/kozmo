<?php
/** Create the Custom Post Type**/
add_action('init', 'banner_register');

function banner_register() {
//Arguments to create post type.
	$args = array(
		'label' => __('Banners'),
		'singular_label' => __('Banner'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => false,
		'supports' => array('title', 'thumbnail')
	);
	register_post_type( 'banner' , $args );
}
	
add_action("admin_init", "banner_add_meta");

function banner_add_meta(){
	add_meta_box("banner-meta", "Banner Links To",	"banner_meta_options", "banner", "normal", "high");
}

//Create area for extra fields
function banner_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        
        $custom = get_post_custom($post->ID);
		$product_ID= $custom["product_ID"][0];	
?>  
<style type="text/css">
	.product-details input.short {width:150px;}
	.product-details input.long {width:400px;}
	.product-details input.extra {width:90%;}
	.product-details textarea {width:90%;}
	.product-details label {display: block; width: 25%; cursor: default;}
	.product-details label.checkbox {display: inline; margin-left: 5px;}
	.product-details div {margin: 5px 0;}
</style>

<div class="product-details">
	<div><label>Product ID:</label><input class="short" name="product_ID" value="<?php echo $product_ID; ?>" /></div>	
</div>   
<?php  
    }
	
add_action('save_post', 'banner_save_details'); 
  
function banner_save_details(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ //if you remove this the sky will fall on your head.
		return $post_id;
	}else{
    	update_post_meta($post->ID, "product_ID", $_POST["product_ID"]);
    } 
}  

add_filter("manage_edit-banner_columns", "banner_edit_columns");   

function banner_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => "Name"
        );  

        return $columns;
}  

?>