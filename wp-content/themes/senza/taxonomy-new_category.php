<?php    get_header();  ?>

<?php   $catdata = get_queried_object();
        print_r($catdata);
 ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1><?php echo $catdata->name; ?></h1>
        </div>
    </div>
</div>

<div class="loop">


<?php
// $args = array('post_type' => 'news',
//           //  'post_status'=>'publish',
//              'posts_per_page' => -1,
//              'tax_query'=>array(array('taxnomy'=>'news_category',
//                                         'field'=>'term_id',
//                                         'terms'=>$catdata->term_id)
//                                 ),  
//             );
// new WP_Query($args);   

    while(have_posts()){
    the_post();

    $image=wp_get_attachment_image_src(get_post_thumbnail_id());
?>
<div class="container mt-3 d-flex">
    <div class="row ">
        <div class="col-lg-8">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $image[0];?>" class="card-img-top" alt="...">
                <div class="card-body">
                     <h5 class="card-title"><?php the_title();?></h5>
                    <p class="card-text"><?php the_excerpt();?></p>
                    <p class="card-text"><?php echo get_the_date();?></p>
                     <a href="<?php the_permalink();?>" class="btn btn-primary">Go somewhere</a>
                 </div>
             </div>  
        </div> 
    </div> 
 </div> 
<?php
 }
 ?>  

</div>







<?php get_footer();  ?>
