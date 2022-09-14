
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet">
</head>
<body>
  
</body>
</html>
<?php //Template Name:sig ?>




<div class="container pt-4 mt-5">
  <div class="row">
      <div class="col-lg-4">

      </div>
      <div class="col-lg-4 text-center img-fluid rounded rounded-circle">
          <?php  echo do_shortcode('[image]');?>
      </div>
  </div>
    <div class="row">
        <div class=" col-lg-4">
    
        </div>
        <div class="col-lg-4 ">
    
          <?php  echo do_shortcode('[form]');?>

        <div class="">
            <?php  echo do_shortcode('[button]');?>
        </div>
        </div>
    </div>
</div>



<div class="container pt-5 ">
  <div class="row text-left ">
    <div class="col-lg-3 ">
    </div>
    <div class="text col-lg-5 p-3 border border-2 rounded-3 p-3 mb-2 bg-secondary text-white shadow-lg p-3 mb-5 border border-dark  rgba-red-strong">
    <?php wp_login_form(); ?>
    </div>
  </div>
</div>







