<?php

if(isset($_POST['register'])){
    global $wpdb;
    $fname = $wpdb->escape($_POST['fname']);
    $lname = $wpdb->escape($_POST['lname']);
    $uname = $wpdb->escape($_POST['uname']);
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $conpsw = $wpdb->escape($_POST['conpsw']);

    if($password == $conpsw){
        //wp_insert_user()
        //wp_create_user()
        

        //wp_insert_user()------
        $user_data = array(
            'user_login'=>$uname,
            'user_email'=>$email,
            'fisrt_name'=>$fname,
            'last_name'=>$lname,
            'display_name'=>$fname.' ' .$lname,
            'user_pass'=>$password,
        );

        $result = wp_insert_user($user_data);

        //wp_create_user()----------
       // $result = wp_create_user($uname,$password,$conpsw);

        if(!is_wp_error($result)){
            echo 'user created ID:'.$result;
            add_user_meta($result,'type','faculty');
            update_user_meta($result,'show_admin_bar_front',false);
        }else{
            echo $result->get_error_message();
        }

    }else{
        echo 'password must match!';
    }
}

?>


<div class="container pt-5">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-7">
            <h1>Register Form</h1>
            <form action="<?php echo get_the_permalink(); ?>" method="post">
                <div class="mb-3">

                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="f-name" name="fname" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="l-name" name="lname" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="u-name" name="uname" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password">

                    <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
                    <input type="password" class="form-control" id="con" name="conpsw">

                </div>

                <button type="submit" class="btn btn-primary" name="register" value="register">Submit</button>
            </form>
        </div>
    </div>
</div>