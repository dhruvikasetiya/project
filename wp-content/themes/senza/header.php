  <?php  wp_head(); ?>

  <!-- Header Start -->
 <head>
    <title>
        <?php  bloginfo('name'); ?>
        <?php  wp_title() ?>
        <?php  if(is_front_page()){
            echo "|"; bloginfo('description');
        } ?>
    </title>

 <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}
li {
  float: left;
}
li a {
  display: block;
  color: #2a2a2a;
  /* text-align: center; */
  padding: 14px 16px;
  text-decoration: none;
  font-size:20px;
  padding-top:30px;

}
li a:hover {
  /* background-color: #111; */
  color:#B49C73;

}
</style>
    <meta charset="utf-8">
    <title>JUSTICE - Free Lawyer Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href=" <?php echo  get_template_directory_uri();  ?>/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel=" preconnect" href="<?php echo  get_template_directory_uri();  ?>/https://fonts.gstatic.com">
    <link href=" <?php echo  get_template_directory_uri();  ?>/https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto:wght@300;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href=" <?php echo  get_template_directory_uri();  ?>/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" <?php echo  get_template_directory_uri();  ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href=" <?php echo  get_template_directory_uri();  ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href=" <?php echo  get_template_directory_uri();  ?>/https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo  get_template_directory_uri();  ?>/ https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo  get_template_directory_uri();  ?>/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo  get_template_directory_uri();  ?>/css/style.css" rel="stylesheet">
</head>
<body <?php // body_class(); ?>>
<div class="container-fluid">
        <div class="row ">
            <div class="col-lg-3 bg-secondary d-none d-lg-block ">
                <a href="<?php echo  site_url(); ?> " class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center ">
                    <?php
                        $logo = get_header_image();
                    ?>
                    <img src= <?php echo $logo ?> class="w-50" >

                </a>
            </div>
            <div class="col-lg-9">
                <div class="row bg-white border-bottom d-none d-lg-flex ">
                    <div class="col-lg-7 text-left">
                        <div class="h-100 d-inline-flex align-items-center py-2 px-3">
                            <i class="fa fa-envelope text-primary mr-2"></i>
                            <small>info@example.com</small>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2 px-2">
                            <i class="fa fa-phone-alt text-primary mr-2"></i>
                            <small>+012 345 6789</small>
                        </div>
                    </div>
                    <div class="col-lg-5 text-right">
                        <div class="d-inline-flex align-items-center p-2">
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                    <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">Justice</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                        <?php
                        wp_nav_menu(array('theme_location'=>'primary-menu'
                                        ,'menu_class'=>'box'))
                    ?>
                         <!-- <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="about.html" class="nav-item nav-link">About us</a>
                            <a href="service.html" class="nav-item nav-link">Practice</a>
                            <a href="team.html" class="nav-item nav-link">Attorneys</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="#" class="dropdown-item">Menu Item 1</a>
                                    <a href="#" class="dropdown-item">Menu Item 2</a>
                                    <a href="#" class="dropdown-item">Menu Item 3</a>
                                </div>
                            </div> 
                            <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                        </div>
                        <a href="" class="btn btn-primary mr-3 d-none d-lg-block">Get A Quote</a>  
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
</body>
<?php the_content();?>
 