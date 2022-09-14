<?php

//update----
if(isset($_POST['update'])){
    $user_id = esc_sql($_POST['user_id']);
    $fname = esc_sql($_POST['user_fname']);
    $lname = esc_sql($_POST['user_lname']);

    if($_FILES['user_img']['error'] == 0){

    // echo '<pre>';
    // print_r($file);
    // echo '</pre>';


    //img-uplod------------
        $file = $_FILES['user_img'];
      $ext = explode('/',$file['type'])[1];
        $file_name = "$user_id.$ext";
    
       
        //print_r($image);
    
        if(!metadata_exists('user',$user_id,'user_profile_img_url')){
            $image = wp_upload_bits($file_name,null, file_get_contents($file['tmp_name']));
            add_user_meta($user_id,'user_profile_img_url',$image['url']);
            add_user_meta($user_id,'user_profile_img_path',esc_sql($image['file']));
        }else{
           $profile_img_path = get_usermeta($user_id,'user_profile_img_path');
            wp_delete_file($profile_img_path);
            $image = wp_upload_bits($file_name,null, file_get_contents($file['tmp_name']));
            update_user_meta($user_id,'user_profile_img_url',$image['url']);
            update_user_meta($user_id,'user_profile_img_path',esc_sql($image['file']));
        }


    }
    $userdata = array(
        'ID' => $user_id,
        'first_name' => $fname,
        'last_name' => $lname
    );

   $user = wp_update_user($userdata);
   
   if(is_wp_error($user)){
    echo 'can not update :' .$user->get_error_message();
   }
}


$user_id = get_current_user_id();
$user = get_userdata($user_id);

if($user != false):
    // echo "<pre>";
   
//echo wp_logout_url();
   // echo '<pre>';
    //print_r($user);

    $user_type =  get_usermeta($user_id,'type');
    $fname =  get_usermeta($user_id,'first_name');
    $lname =  get_usermeta($user_id,'last_name');

    $profile_img = get_usermeta($user_id,'user_profile_img_url');
  //  echo $profile_img = get_usermeta($user_id,'user_profile_img_path');

?>


<div class="col-lg-4"></div>
<div class="col-lg-4">

    <?php  

if($profile_img != ''){
    ?>
    <img src="<?php echo $profile_img; ?>" alt="nooo" width="200" class="pt-3">
    <?php
}
?>

    <h1>hii<?php  echo "   $fname $lname <small>($user_type)</small>"; ?></h1>

    <p>Not <?php echo " $fname  $lname"; ?> <a href="<?php echo wp_logout_url(); ?>">logout</a></p>
</div>



<div class="comtainer">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-7 pt-5">
            <form action="<?php echo get_the_permalink();?>" method="POST" enctype="multipart/form-data">
                <h1>Profile</h1>  profile Image: <input type="file" name="user_img" id="user-img" class="pb-2">
                <div class="mb-3">


                  
                    <input type="hidden" name="user_id" value="<?php  echo $user_id; ?>">


                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="user_fname" id="user-fname"
                        value="<?php echo $fname; ?>" aria-describedby="emailHelp">


                    <label for="exampleInputEmail1" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="user_lname" id="user-fname"
                        value="<?php echo $lname; ?>" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary" name="update" id="update">update</button>

            </form>
        </div>
    </div>
</div>

<?php
endif;
?>