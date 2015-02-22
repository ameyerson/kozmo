<?php
/** Create the Custom Post Type**/
add_action('init', 'product_post_register');

function product_post_register() {
//Arguments to create post type.
	$args = array(
		'label' => __('Products'),
		'singular_label' => __('Product'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'rewrite' => array('slug' => 'product', 'with_front'=> false), 
	);
	//Register type and custom taxonomy for type.
	register_post_type( 'product' , $args );
	register_taxonomy("artist", array("product"), array("hierarchical" => true, "label" => "Artists", "singular_label" => "Artist", 'rewrite' => array('slug' => 'artist', 'with_front'=> false, 'hierarchical'=> true), "slug" => 'artist'));
}

add_action("admin_init", "product_add_meta");

function product_add_meta(){
	add_meta_box("product-meta", "Product Details",	"product_meta_options", "product",	"normal", "high");
}

//Create area for extra fields
function product_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        
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
	<div><label>More <em><small>displays under the product photo</small></em>:</label><textarea rows="8" name="more" ><?php if( $more ) { echo strip_tags($more); } ?></textarea></div> 
	<div><label>Even More <em><small>displays in a modal window</small></em>:</label><textarea rows="8" id="even_more" name="even_more"><?php if( $even_more ) { echo strip_tags($even_more); } ?></textarea>
	<div><label>Short pitch <em><small>for Related Products and Search Results page</small></em>:</label><input class="extra" name="short_pitch" maxlength="100" value="<?php echo $short_pitch; ?>" /></div>
	<div><label>Trailer YouTube ID:</label><input class="short" name="trailer" value="<?php echo $trailer; ?>" /></div>	
	<strong>PAYPAL</strong>
	<div><label>Item Name:</label><input class="long" name="item_name" value="<?php echo $item_name; ?>" /></div>
	<div><label>Item Number:</label><input class="short" name="item_number" value="<?php echo $item_number; ?>" /></div>
	<div><label>Amount:</label><input class="short" name="amount" value="<?php echo $amount; ?>" /></div>
	<div><label>Label for additional options:</label><input class="long" name="options_label" value="<?php echo $options_label; ?>" /></div>
	<div><label style="width: 50%;">Options: <em><small>comma separated i.e. option1, option2, option3...</small></em></label><input name="custom_options" class="extra" value="<?php echo $custom_options; ?>" /></div>

</div>   
<?php  
    }
	
add_action('save_post', 'product_save_details'); 
  
function product_save_details(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ //if you remove this the sky will fall on your head.
		return $post_id;
	}else{
    	update_post_meta($post->ID, "more", nl2br($_POST["more"]));
    	update_post_meta($post->ID, "even_more", nl2br($_POST["even_more"]));
    	update_post_meta($post->ID, "short_pitch", $_POST["short_pitch"]);
    	update_post_meta($post->ID, "trailer", $_POST["trailer"]);
    	update_post_meta($post->ID, "item_name", $_POST["item_name"]);
    	update_post_meta($post->ID, "item_number", $_POST["item_number"]);
    	update_post_meta($post->ID, "amount", $_POST["amount"]); 
    	update_post_meta($post->ID, "options_label", $_POST["options_label"]); 
    	update_post_meta($post->ID, "custom_options", $_POST["custom_options"]);
    } 
}  

add_filter("manage_edit-product_columns", "product_edit_columns");   

function product_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
			"product_ID" => "ID",
            "title" => "Product",
            "amount" => "Amount", 
            "cat" => "Artist",
        );  

        return $columns;
}  

add_action("manage_product_posts_custom_column",  "product_custom_columns"); 

function product_custom_columns($column){
        global $post;
        $custom = get_post_custom();
        switch ($column)
        {
			case "product_ID":
				echo $post->ID;
				break;
            case "amount":
            	echo $custom["amount"][0];
            	break;
            case "cat":
                echo get_the_term_list($post->ID, 'artist', '', ', ','');
                break;
        }
}

?>