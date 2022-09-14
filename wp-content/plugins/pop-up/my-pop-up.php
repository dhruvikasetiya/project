<?php
/*
Plugin Name: pop up
Description: this is my plugin
Version: 1.0
Author:senza
*/

if(!defined('ABSPATH')){
    die();
}

//enqueue scripts
function popup_scripts(){
    $src_js = plugin_dir_url(__FILE__).'pop-up.js';
    $ver_js = filemtime(plugin_dir_path(__FILE__).'pop-up.js');
    $src_css = plugin_dir_url(__FILE__).'pop-up.css';
    $ver_css = filemtime(plugin_dir_path(__FILE__).'pop-up.css');
    wp_enqueue_script('popup-js',$src_js,array('jquery'),$ver_js,true);
    wp_enqueue_style('popup-style',$src_css,'',$ver_css);
}
add_action('wp_enqueue_scripts','popup_scripts');

 //------------------- Add admin page under settings -------------------
 function popup_menu_page(){
    include 'admin-page.php';
}
function popup_admin_page(){
    add_submenu_page('options-general.php','pop-up','pop-up','manage_options','pop-up-menu-page','popup_menu_page');
}
add_action('admin_menu','popup_admin_page');
//------------------- Show the popup on front-end -------------------
function show_popup(){
    ?>
        <div class="popup-wrapper">
            <i class="close"> X </i>
            <img src="<?php echo plugin_dir_url(__FILE__).'img/img2.jpg'; ?>"
             alt="popup">
        </div>
    <?php
}
add_action('wp_head','show_popup');


?>