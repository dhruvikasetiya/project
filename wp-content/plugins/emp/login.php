<div class="container pt-5">
    <div class="row">
        <div class="col-lg-2"> </div>
        <div class="col-lg-7">
            <h1>Login Form</h1>
            <form action="<?php echo get_the_permalink(); ?>" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="login-user" name="user-name"
                        aria-describedby="emailHelp">

                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="login-pass" name="pass">

                    <button type="submit" class="btn btn-primary" name="my_login" value="login">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>

