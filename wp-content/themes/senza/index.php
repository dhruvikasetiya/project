<?php  get_header(); ?>

<!-- //normal post -->
<div class="loop">


<?php
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
        <?php get_sidebar(); ?>
    </div> 
 </div> 
<?php
 }
 ?>   
</div>


<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-lg-4">
        <?php  wp_pagenavi(); ?>
        </div>
    </div>
</div>
<!-- custom post -->




<?php   get_footer(); ?>  





