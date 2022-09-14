<?php

//Plugin Name: Emp
//Plugin URI:https://in.linkedin.com/in/dipaknarola
//Description: A simple wordpress plugin
//Author: Dhruvi Kasetiya
//Author URI: https://in.linkedin.com/in/dipaknarola
//version:1.0

register_activation_hook(__FILE__,'form_data_activate');
register_deactivation_hook(__FILE__,'form_data_deactivate');

function form_data_activate(){
    global $wpdb;
    global $table_prefix;
    $table=$table_prefix.'emp';
    
    $sql="CREATE TABLE $table (
        `id` int(11) NOT NULL primary key,
        `name` varchar(50) NOT NULL,
        `email` varchar (50) NOT NULL)
         ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
         $wpdb->query($sql);

    $sql2="insert into $table(`id`,`name`,`email`) values(1,'mansi','m@gmail.com')";
    $wpdb->query($sql2);

    // $data = array(
    //     'name' => 'dhruvi',
    //     'email'=> 'dhulu@gmail.com'
    // );

    // $wpdb->insert($emp,$data);
}
function form_data_deactivate(){
    global $wpdb;
    global $table_prefix;
    $table=$table_prefix.'emp';
    // $sql="DROP TABLE $table";
    //  $wpdb->query($sql);

    $sql = "TRUNCATE `$table`";
    $wpdb->query($sql);

}

function myshortcode($atts){
     $atts= array_change_key_case((array)  $atts,CASE_LOWER);

    $atts = shortcode_atts(array(
        'msg'=> 'I am good ',
        'note'=> 'defalut',
       'type'=>'img_gallery'
    ), $atts);

    ob_start();
    ?>
<h1>hello youtube</h1>
<?php 
    $html = ob_get_clean();

    // return 'results:'.$atts['msg'].''.$atts['note'];
   // return $html;
   // include 'img_gallery.php'; 
   include $atts['type'].'.php';
}
add_shortcode('tube','myshortcode');




function select(){
    global $wpdb;
    global $table_prefix;
    $table=$table_prefix.'emp';

   $q = "SELECT * FROM `$table`;";
     $results = $wpdb->get_results($q);

    //  echo "<pre>";
    //  print_r($results);
    //   echo "</pre>";
    ob_start()
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 mt-5">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                foreach ($results as $row);
            ?>
                    <tr>
                        <td><?php  echo $row->id;?></td>
                        <td><?php  echo $row->name;?></td>
                        <td><?php  echo $row->email;?></td>

                    </tr>
                    <?php
               // endforeach;
            ?>
                </tbody>
                </tbody>
            </table>



        </div>
    </div>
</div>

<?php
    $html = ob_get_clean();

    return $html;
}
add_shortcode('select','select');


//---admin ma add krva
add_action('admin_menu','form_data_menu');
function form_data_menu(){
    add_menu_page('emp','emp',8,__FILE__,'form_data_list');
}
function form_data_list(){
    include('emp_list.php');
}
add_shortcode('emp','form_data_list');


//--post mte
function my_posts(){
    $args = array(
        'post_type'=>'post',
        //  's'=>'Action',
        'posts_per_page'=>2,
        'order'=>'ASC',
        'tax-query'=>array(
            'relation'=>'OR',
            array(
                'taxonomy'=>'category',
                
            )
        )

    );
    $query= new wp_query($args);

    ob_start();
    if($query->have_posts());
    ?>
    <ul>
        <?php
        
        while($query->have_posts()){
            $query->the_post();
            echo '<li><a href="'.get_the_permalink().'">'. get_the_title().'</a>->'.get_the_content().'</li>';
        }
        ?>
    </ul>
    <?php
   // endif;
    wp_reset_postdata();
    $html= ob_get_clean();
    return $html;
    
}
add_shortcode('mypost','my_posts');

function head_fun(){
   if(is_single()){
    global $post;
   $views = get_post_meta($post->ID,'views',true);

    if($views == ''){
        add_post_meta($post->ID,'views',1);
    }else{
        $views++;
        update_post_meta($post->ID,'views',true);
    }
   }
}
add_action('wp_head','head_fun');

function views_count(){
    global $post;
    return 'total views:'.get_post_meta($post->ID,'views',true);
}
add_shortcode('view','views_count');

//custom taxonomy-------------

function my_post(){
    $lables = array(
        'name'          => 'Cars', // Plural name
        'singular_name' => 'Car'   // Singular name
    );
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
    $option = array(
        'labels'              => $lables,
        'description'         => 'Post type post product', 
        'supports'            => $supports,
        'taxonomies'          => array( 'car_category', 'post_tag' ), 
        'hierarchical'        => false, 
        'public'              => true,  
        'show_ui'             => true,  
        'show_in_menu'        => true,  
        'show_in_nav_menus'   => true,  
        'show_in_admin_bar'   => true,  
        'menu_position'       => 5,     
        'menu_icon'           => 'dashicons-share-alt2',
        'can_export'          => true,  
        'has_archive'         => true,  
        'exclude_from_search' => false, 
        'publicly_queryable'  => true,  
        'capability_type'     => 'post' 
    );
    register_post_type('cars',$option);
}
add_action('init','my_post');

// register_taxonomy( 'car_category', 'food', array('hierarchical' => true, 'label' => 'car_category',  'singular_label' => 'car_category', 'query_var'=>true , 'rewrite' => true ));
//  register_taxonomy_for_object_type( 'car_category', 'food' );


//register------
function my_register_form(){
        include 'register.php';

}add_shortcode('my_form','my_register_form');

//loginn----
function my_login_form(){
    ob_start();
    include 'login.php';
    return ob_get_clean();

}add_shortcode('my_login','my_login_form');

//user_profile-------
function my_profile(){
    ob_start();
    include 'profile.php';
    return ob_get_clean();

}add_shortcode('my-profile','my_profile');

//login----

    function my_login(){
        if(isset($_POST['my_login'])){
            $uname = esc_sql($_POST['user-name']);
            $pass = esc_sql($_POST['pass']);
           // echo $uname
                        $login_data = array(
                'user_login' => $uname,
                'user_password' => $pass
            );
           // print_r($login_data);
            $user = wp_signon($login_data);
    
            if(!is_wp_error($user)){
                echo "login success";
             if($user->roles[0] == 'administrator'){
                wp_redirect(admin_url());
                exit;
             }else{
                wp_redirect(site_url('profile'));
                exit;
             }
            //   echo "<pre>";
            //    print_r($user);
            //     echo "<pre>";

            }else{
                echo $user->get_error_message();
            }
        }
    }
    add_action('template_redirect','my_login');

    //profile-----

    function my_check_redirect(){
        $is_user_logged_in = is_user_logged_in();

        if($is_user_logged_in && (is_page('login') ||  is_page('register'))){
            wp_redirect(site_url('profile'));
            exit;
        }elseif(!$is_user_logged_in && is_page('profile')){
            wp_redirect(site_url('login'));
            exit;
        }
    }
add_action('template_redirect','my_check_redirect');

function redirect_after_loguot(){
    wp_redirect(site_url('login'));
    exit;
}
add_action('wp_logout','redirect_after_loguot');
?>