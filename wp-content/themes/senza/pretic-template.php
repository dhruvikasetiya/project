<?php 

//Template name:practice

get_header();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <div class="container pt-5" <?php  body_class(); ?>>
        <div class="row d-inline-flex d-flex">
            <?php 

                if( have_rows('coures_details',114)){
                     while (have_rows('coures_details',114))
                    {
                        the_row();
            ?>
             <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo get_sub_field('coures_image',114) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                             <h3 class="text-center"><?php echo get_sub_field('coures_name',114) ?></h3>
                        </div>
                    </div>
            </div>

           <?php }   }?>
        </div>
    </div>

    <div class="container pt-3">
        <div  class="row ">
            <div class="col-lg-6">
                <h2 class="pt-3">shortcode:</h2>
               <?php  echo do_shortcode('[diwp-image]');?>
            </div>
           
            <div class="col-lg-3">
                <?php echo do_shortcode('[post]'); ?>
            </div>
        
            <div class="col-lg-3">
            <?php  echo do_shortcode('[diwp-button]');?> 
            </div>
        </div>
    </div>

</body>
</html>



<?php   get_footer(); ?> 