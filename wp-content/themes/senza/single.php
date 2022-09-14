<?php  get_header(); ?>
<?php  the_post(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h1><?php the_title();?></h1>

        <?php
            $image=wp_get_attachment_image_src(get_post_thumbnail_id(),'large');    
        ?>
        <img  class="img-fluid rounded" src="<?php echo $image[0];?>" style="width:100%"/> 

        <div class="col-lg-12">

           <h3 class="fs-1"> <?php  echo get_the_date(); ?><br></h3>
   


           <?php 

        


            ?>
            <h4 class="fs-4"><?php  the_author(); ?></h4>
            <h5 class=" fst-italic"><?php  the_content(); ?></h5>
            <h5 class=" fst-italic"><?php
            
            global $post;
            $post_id = $post->ID;

            $total_count = get_post_meta($post_id, '_total_visit_count', true); 

           

            if($total_count > 0){
               
               // echo "<i class="fa-solid fa-eye"></i>" ;
                echo "Total Count " . $total_count;
            }else{
                echo "Zero View";
            }
            
            
            ?></h5>
        
        </div>
        </div>
        <div class="col-lg-5">
            <button type="button" class="btn btn-primary text-white mt-4 mb-4">comment</button>
            <?php  comment_form(); ?>
        </div>
        
    </div>

</div>


<!-- <div class="loop">




<?php  get_footer(); ?>