<?php   
//Template Name:about
get_header();

the_post();

$cat = get_categories(array('taxonomy'=>'category'));
$cat_news = get_categories(array('taxonomy'=>'new_category'));
// echo "<pre>";
// print_r($cat);
// echo "</pre>";

?>
<div class="container-fluid py-5">
<div class="container py-5">
    <div class="row">
        <div class="col-lg-5">
            <img class="img-fluid rounded" src="<?php echo  get_template_directory_uri();  ?>/img/about.jpg" alt="">
        </div>
        <div class="col-lg-7 mt-4 mt-lg-0">
            <h2 class="position-relative text-center bg-white text-primary rounded p-3 mt-4 mb-4 d-none d-lg-block" style="width: 350px; margin-left: -205px;">25 Years Experience</h2>
            <h2 class="text-uppercase"><?php the_title(); ?> </h2>
            
            <h1 class="mb-4">We Provide Reliable And Effective Legal Services</h1>
            <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor</p>
            <a href="" class="btn btn-primary mt-2">Learn More</a>
        </div>
    </div>
</div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="position-relative text-center bg-white text-primary rounded p-3 mt-4 mb-4 d-none d-lg-block" style="width: 350px; margin-left:0px;">About Department</h2>
            <h2 class="text-uppercase">Department of Justice</h2>
            <h1 class="mb-4" > Government of India.</h1>
            <p>It is one of the oldest Ministries of the Government of India. Till 31.12.2009, Department of Justice was part of Ministry of Home Affairs and Union Home Secretary had been the Secretary of Department of Justice.</p>
        <a href="" class="btn btn-primary mt-2">Learn More</a>
        </div>
        <div class="col-lg-6">
        <?php  //the_post_thumbnail();  ?>

        <?php $image=wp_get_attachment_image_src(get_post_thumbnail_id(),'large');?>
        <img  class="img-fluid rounded" src="<?php echo $image[0];?>" style="height:375px;width:500px"> 


        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <img src="<?php echo  get_template_directory_uri();  ?>/img/fir.jpg" alt="no"  class=" img-fluid rounded"srcset="">
        </div>
        <div class="col-lg-6">
        <?php the_content(); ?>
        <?php the_excerpt(); ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
     <!-- <button type="button" class="btn btn-primary">Couers</button> -->
    <?php 
        // print_r($cat_news);
         foreach($cat_news as $catvalue ){
     ?>   
        <div class="row  pt-4  d-inline-flex">
            <div class="col-lg-4  ">
                <h4><i class="fa-solid fa-scale-unbalanced img-rounded   rounded-circle text-primary"></i></h4>
            </div>
            <div class="col-lg-10 text-black d-inline-flex">
              <a href="<?php echo get_category_link($catvalue->term_id);?>"><h5><?php echo $catvalue->name; ?></h5></a>
            </div>
        </div>
        <div class="loop"> 

        <?php
$args = array('post_type' => 'news',
          //  'post_status'=>'publish',
             'posts_per_page' => -1,
             'tax_query'=>array(array('taxonomy'=>'new_category',
                                        'field'=>'term_id',
                                        'terms'=>$catvalue->term_id)
                                ),  
            );
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
                    <p class="card-text"><?php //echo get_the_date();?></p>
                    <p class="card-text"><?php the_field('news_data',get_the_id());?></p>
                     <a href="<?php the_permalink();?>" class="btn btn-primary">Go somewhere</a>
                 </div>
             </div>  
        </div> 
    </div> 
 </div> 
<?php
 }
 ?>  

        
     <?php  } ?>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
     <!-- <button type="button" class="btn btn-primary">Couers</button> -->
    <?php 
        // print_r($cat_news);
         foreach($cat as $catvalue ){
     ?>   
        <div class="row  pt-4  d-inline-flex">
            <div class="col-lg-4  ">
                <h4><i class="fa-solid fa-scale-unbalanced img-rounded   rounded-circle text-primary"></i></h4>
            </div>
            <div class="col-lg-10 text-black d-inline-flex">
              <a href="<?php echo get_category_link($catvalue->term_id);?>"><h5><?php echo $catvalue->name; ?></h5></a>
            </div>
        </div>
        <?php } ?>
         </div>
         </div>
       


<?php   get_footer(); ?>  