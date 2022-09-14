<?php //Template Name:custom ?>
<?php get_header();  ?>



<div class="loop">


<?php
$args = array('post_type' => 'news', 'posts_per_page' => -1);
$loop = new WP_Query($args);   

    while($loop->have_posts()){
    $loop->the_post();

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



<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-lg-5 text-center">
            <h1 class="text-center">latest new category</h1>

            <?php  

                $newcat = get_terms(['taxonomy'=>'new_category','hide_empty'=>false,'orderby'=>'id','order'=>'DESC',]);

                foreach($newcat as $newscatedata){
                    
                     $meta_image = get_wp_term_image($newscatedata->term_id); 
                ?>
                <div class="">
                    <?php if($meta_image!="") { ?>
                         
                        <img src="<?php print_r($meta_image); ?>" >
                    <?php } ?>    
                        
                <h4><i class="fa-solid fa-layer-group img-rounded   rounded-circle text-primary"></i></h4>
                <a href="<?php echo get_category_link($newscatedata->term_id);?>"><h3><?php echo $newscatedata->name; ?></h3></a>
                </div>
                <?php } ?>
        </div>
    </div>
</div>

<?php  get_footer();  ?>