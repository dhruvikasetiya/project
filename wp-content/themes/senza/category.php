<?php  get_header(); ?>
<div class="loop">


<?php
    while(have_posts()){
    the_post();

    $image=wp_get_attachment_image_src(get_post_thumbnail_id());
?>
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-12">
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

<div class="container py-5 pt-3 mt-5">
    <div class="row">
        <div class="col-lg-3">
        <?php  wp_pagenavi(); ?>
        </div>
    </div>
</div>
<!-- <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
<?php //the_title(); ?> 

<?php   get_footer(); ?>  





