<?php

//Plugin Name: Form Data
//Plugin URI:https://in.linkedin.com/in/dipaknarola
//Description: A simple wordpress plugin
//Author: Dhruvi Kasetiya
//Author URI: https://in.linkedin.com/in/dipaknarola
//version:1.0


if(!defined('ABSPATH')){
  header("location:/theme/");
  die("");
}
echo "silcen is golden";


// $filedata = get_file_data(plugin_dir_path(__FILE__) . '\form_data\data.php', array(
//   'Page Name' => 'data.php',
  
//  // 'Template File' => 'template-data.php',));
//   print_r($filedata) );




//---get anthor file data-----
require_once __DIR__ . '/data.php';

  function tbare_wordpress_plugin_demo($atts) {
    $Content = "<style>\r\n";
    $Content .= "h3.demoClass {\r\n";
    $Content .= "color: #26b158;\r\n";
    $Content .= "}\r\n";
    $Content .= "</style>\r\n";
    $Content .= '<h3 class="demoClass">Check it out!</h3>';
     
      return $Content;

     
  }
  add_shortcode('tbare-plugin-demo', 'tbare_wordpress_plugin_demo');












































  function form_data_activate(){
    global $wpdb;
    global $table_prefix;
    $table=$table_prefix.'form_data';
    $sql = "CREATE TABLE $table (
        `id` int(11) NOT NULL primary key,
        `name` varchar(200) NOT NULL,
        `email` varchar(100) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      $wpdb->query($sql);
}

register_activation_hook(__FILE__,'form_data_activate');


function form_data_deactivate(){
 
  global $wpdb;
  global $table_prefix;
  $table=$table_prefix.'form_data';
  $sql = "  DROP TABLE  `theme`.$table";
  $wpdb->query($sql);

 
}
 register_deactivation_hook(__FILE__,'form_data_deactivate');



//  function my_sc_fun(){
//   return "hello";
//  }
//  add_shortcode('my-sc','my_sc_fun');



?>
