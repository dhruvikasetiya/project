<?php // Template Name:news ?>
<?php get_header();  

if(isset($_POST['btn'])){
    $id= wp_insert_post(
        array(
            'post_type'=>'news',
            'post_status'=>'draft',
            'post_title'=>$_POST['ntitle'],
            'post_content'=>$_POST['text']
        )
        );

        wp_set_object_terms($id,$_POST['cat'],'new_category');
}

?>


<div class="container Pt-5">
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-6 ">
            <form method="POST">
            <div class="mb-3">
              <h5>News title</h5>
                <input type="text" class="form-control" id="title" placeholder="" name="ntitle">
            </div>
            <div class="mb-3">
            <h5>Textarea</h5>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
            </div>

            <div class="col-lg-5">

                <select name="cat" class="mt-4">
                    <option>select news category</option>
                        <?php    $newcat = get_terms(['taxonomy'=>'new_category','hide_empty'=>false,'orderby'=>'id','order'=>'DESC',]);

                            foreach($newcat as $newscatdata){

                        ?>

                    <option value="<?php echo $newscatdata->name; ?>"><?php  echo $newscatdata->name;?></option>
                        <?php  } ?>

                </select>


            </div>
           
            <button class="btn btn-primary mt-4" name="btn">save news</button>
            </form>
            
        </div>
    </div>
</div>

<?php wp_login_form(); ?>
<?php get_footer();  ?>