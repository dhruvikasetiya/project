<?php




function prefix_create_custom_post_type() {
    /*
     * The $labels describes how the post type appears.
     */
    $labels = array(
        'name'          => 'news', // Plural name
        'singular_name' => 'news'   // Singular name
    );

    /*
     * The $supports parameter describes what the post type supports
     */
    $supports = array(
        'title',        // Post title
        'editor',       // Post content
        'excerpt',      // Allows short description
        'author',       // Allows showing and choosing author
        'thumbnail',    // Allows feature images
        'comments',     // Enables comments
        'trackbacks',   // Supports trackbacks
        'revisions',    // Shows autosaved version of the posts
        'custom-fields' // Supports by custom fields
    );

    /*
     * The $args parameter holds important parameters for the custom post type
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Post type post product', // Description
        'supports'            => $supports,
        'taxonomies'          => array( 'new_category', 'post_tag' ), // Allowed taxonomies
        'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,  // Makes the post type public
        'show_ui'             => true,  // Displays an interface for this post type
        'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar'   => true,  // Displays in the black admin bar
        'menu_position'       => 5,     // The position number in the left menu
        'menu_icon'           => 'dashicons-amazon',
		  // The URL for the icon used for this post type
        'can_export'          => true,  // Allows content export using Tools -> Export
        'has_archive'         => true,  // Enables post type archive (by month, date, or year)
        'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
        'capability_type'     => 'post' // Allows read, edit, delete like “Post”
    );

    register_post_type('news', $args); //Create a post type with the slug is ‘product’ and arguments in $args.
}

add_action('init', 'prefix_create_custom_post_type');

//custom new category:
register_taxonomy( 'new_category', 'food', array('hierarchical' => true, 'label' => 'new_Categories',  'singular_label' => 'Category', 'query_var'=>true , 'rewrite' => true ));
register_taxonomy_for_object_type( 'new_category', 'food' );


//menu
register_nav_menus(
    array('primary-menu'=>'top')

);

//feachur img
add_theme_support('post-thumbnails');

add_theme_support('custom-header');

register_sidebar(
    array(
        'name'=>"sidebar location",
        'id'=>'sidebar'
    )
    );

add_theme_support('custom-background');

add_post_type_support('page','excerpt');



add_action('wp_head','callback');
function callback(){

            global $post;
            $initial_count =1;
         //   $post_id = $post->ID;
            if(is_singular('news')){
                //echo "<pre>";news ni jagiya e posts kru to noraml post nu preview thy....
              // print_r($post->ID);
            
                $cur_count = get_post_meta($post_id, '_total_visit_count', true);

                if($cur_count == ''){
                    add_post_meta($post_id, '_total_visit_count', $initial_count);
                }else{
                    $updated_count = $cur_count + $initial_count;
                    update_post_meta($post_id, '_total_visit_count', $updated_count);   
                }
            }
}




//shortcode-----

function demo($arg){
           
    echo "<pre>";
    print_r($arg['type']);
    echo "</pre>";
 }
 add_shortcode('test','demo');





//img shortcode----------
function diwp_image_shortcode($attr){
 
    $args = shortcode_atts(
 
            array(
                'src'   => '#',
                'width' => '500',
                'height'   => '300',
                'class' => ''   
                       
             ), $attr);
    
   $image = '<img src="http://localhost/theme/wp-content/uploads/2022/07/ji.jpg'.$args['src'].'" width="'.$args['width'].'" height="'.$args['height'].'" class="'.$args['class'].'" />';
 
   return $image;
 
}
 
add_shortcode('diwp-image', 'diwp_image_shortcode');

//custom code shortcode---------
function code(){

   

   echo  "<div class='col-lg-3'>
    <h1><i class='fa-solid fa-location-dot text-secondary'></i></h1>
    <h5>address:</h5>  
    </div>";
    the_field('address',66); 
   
}

add_shortcode('post','code');


//buttun shortcode----

function diwp_button_shortcode($attr){
 
    $args = shortcode_atts(
 
                array(
                        'link'   => '#',
                        'bgcolor' => '#B49C73',
                        'textcolor' => '#212529',
                        'text' => 'Button',
                       
                      ), $attr);
 
    $button = '<a href="'.$args['link'].'" style="background:'.$args['bgcolor'].'; color:'.$args['textcolor'].'; padding: 8px 20px; display: inline-block; border-radius: 4px; font-size: inherit;margin: 15px 0px;">'.$args['text'].'</a>';
 
    return $button;
}
 
add_shortcode('diwp-button', 'diwp_button_shortcode');


//signin shortcopde--------- img---


function image_shortcode($attr){
 
    $args = shortcode_atts(
 
            array(
                'src'   => '#',
                'width' => '90',
                'height'   => '90',
                'class' => ''   
                       
             ), $attr);
    
   $img = '<img src="http://localhost/theme/wp-content/uploads/2022/07/d1.jpg'.$args['src'].'" width="'.$args['width'].'" height="'.$args['height'].'" class="'.$args['class'].'" />';
 
   return $img;
 
}
 
add_shortcode('image', 'image_shortcode');

//form----

function sig(){

    echo "  <form class='pt-5'>
    <div class='mb-3'>
        <label for='exampleInputEmail1' class='form-label'>Email address</label>
        <input type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
        <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
    </div>
   <div class='mb-3'>
        <label for='exampleInputPassword1' class='form-label'>Password</label>
        <input type='password' class='form-control' id='exampleInputPassword1'>
    </div>
  <div class='mb-3 form-check'>
        <input type='checkbox' class='form-check-input' id='exampleCheck1'>
        <label class='form-check-label' for='exampleCheck1'>Check me out</label>
    </div>


</form> ";

}
add_shortcode('form','sig');


//---signi ---btn---
function button_shortcode($attr){
 
    $args = shortcode_atts(
 
                array(
                        'link'   => 'http://localhost/theme/',
                        'bgcolor' => '#B49C73',
                        'textcolor' => '#212529',
                        'text' => 'Button',
                        
                       
                      ), $attr);
 
    $button = '<a href="'.$args['link'].'" style="background:'.$args['bgcolor'].'; color:'.$args['textcolor'].'; padding: 8px 20px; display: inline-block; border-radius: 4px; font-size: inherit;margin: 15px 0px;">'.$args['text'].'</a>';
 
    return $button;
   
}
 
add_shortcode('button', 'button_shortcode');

//ajax--

add_action('wp_ajax_contact_us','ajax_contact_us');
add_action('wp_ajax_nopriv_contact_us','ajax_contact_us');
function ajax_contact_us(){
    $arr = [];
     wp_parse_str($_POST['contact_us'],$arr);
    global $wpdb;
    global $table_prefix;
    $table = $table_prefix.'contact_us';
    $result = $wpdb->insert($table,[
        "name"=>$arr['name'],
        "password"=>$arr['pass']
    ]);
   // $result=0;
    if($result>0){
        wp_send_json_success("data inserted");
    }else{
        wp_send_json_error("please try agin");
    }
   
   // wp_send_json_success("test");
}


//commission---
// add_filter('woocommerce_product_data_tabs', 'misha_product_settings_tabs' );
// function misha_product_settings_tabs( $tabs ){
 
// 	//unset( $tabs['inventory'] );
 
// 	$tabs['misha'] = array(
// 		'label'    => 'commission',
// 		'target'   => 'misha_product_data',
// 		'class'    => array('show_if_virtual'),
// 		'priority' => 21,
// 	);
// 	return $tabs;
 
// }

add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
function woo_add_custom_general_fields() {

    echo '<div class="options_group">';

    woocommerce_wp_select( array( // Text Field type
        'id'          => '_Commision_Type',
        'label'       => __( 'Commission_Type', 'woocommerce' ),
        'wrapper_class' => 'show_if_simple',
        'description' => __( 'Commission_Type', 'woocommerce' ),
        'desc_tip'    => true,
        'options'     => array(
            ''        => __( 'Select commission type', 'woocommerce' ),
            'percentage'    => __('Percentage %', 'woocommerce' ),
            'fixed' => __('Fixed price', 'woocommerce' ),
        )
    ) );

    echo '</div>';
}

//saving into database
add_action( 'woocommerce_process_product_meta', 'woo_save_custom_general_fields', 30, 1 );
function woo_save_custom_general_fields( $post_id ){

    // Saving "Conditions" field key/value
    $posted_field_value = $_POST['_Commision_Type'];
    if( ! empty( $posted_field_value ) )
        update_post_meta( $post_id, '_Commision_Type', esc_attr( $posted_field_value ) );
}
//displaying on frontend
add_action( 'woocommerce_product_meta_start', 'woo_display_custom_general_fields_values', 50 );
function woo_display_custom_general_fields_values() {
    global $product;

    $product_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;

    echo '<span class="commision_Type">Commision Type: ' . get_post_meta( $product_id, '_Commision_Type', true ) . '</span>';
}
/*
 * Tab content
 */
add_action( 'woocommerce_product_data_panels', 'misha_product_panels' );
function misha_product_panels(){
 
	echo '<div id="misha_product_data" class="panel woocommerce_options_panel hidden">';
 
	woocommerce_wp_text_input( array(
		'id'                => 'misha_plugin_version',
		'value'             => get_post_meta( get_the_ID(), 'misha_plugin_version', true ),
		'label'             => 'Plugin version',
		'description'       => 'Description when desc_tip param is not true'
	) );
 
	woocommerce_wp_textarea_input( array(
		'id'          => 'misha_changelog',
		'value'       => get_post_meta( get_the_ID(), 'misha_changelog', true ),
		'label'       => 'Changelog',
		'desc_tip'    => true,
		'description' => 'Prove the plugin changelog here',
	) );
 
	woocommerce_wp_select( array(
		'id'          => 'misha_ext',
		'value'       => get_post_meta( get_the_ID(), 'misha_ext', true ),
		'wrapper_class' => 'show_if_downloadable',
		'label'       => 'File extension',
		'options'     => array( '' => 'Please select', 'zip' => 'Zip', 'gzip' => 'Gzip'),
	) );
 
	echo '</div>';
 
}
 
/*
 * Save
 */
//add_action('woocommerce_process_product_meta', 'bla_bla_bla' ...');




//REST API WORK----------

function rest_api_work(){

    register_rest_route('custom/v1','myapi',
    
        array(
            'methods'=>'GET',
            'callback'=>'get_custom_users_data'
        )
    );
}

//the following registers an api route with multiple parameters.
add_action('rest_api_init','rest_api_work');


function get_custom_users_data(){

    global $wpdb;
    $data = json_encode($_REQUEST);

    $wpdb->insert('mytable',array(

        'submit_data'=>$data
    ));

    return rest_ensure_response($_REQUEST);
}




?>