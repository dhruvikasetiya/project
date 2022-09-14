<?php  


if(!defined('WP_UNINSTALL_PLUGIN')){
    header("location:/theme/");
    die("");
} 


    global $wpdb;
    global $table_prefix;
    $table=$table_prefix.'emp';

     $sql="DROP TABLE $table";
      $wpdb->query($sql);

?>