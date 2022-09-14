<?php   get_header(); ?>

<?php // Template Name:frm ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   
<div class="conatiner">
    <div class="row">
    <h4>AJAX</h4>
        <div class="col-lg-3"></div>
       
        <div class="col-lg-6">
            <form id="frmcontact" class="pt-5" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">name</label>
                    <input type="text" class="form-control" id="exampleInput" name="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                </div>

                <button type="submit" class="btn btn-success" name="submit">Submit</button>
            </form>
        </div>

    </div>


    <div class="row">
    <h4>API</h4>
        <div class="col-lg-2"></div>
        
        <div class="col-lg-6">
        <form id="form" class="pt-5" method="GET">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">f_name</label>
                    <input type="text" class="form-control" id="exampleInput" name="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">email</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="email">
                </div>

                <button type="submit" class="btn btn-success" name="submit" id="submitdata">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
jQuery('#frmcontact').submit(function(event) {
    event.preventDefault();
    var link="<?php echo admin_url('admin-ajax.php') ?>";
    var form = jQuery('#frmcontact').serialize();
    
    var formData = new FormData;
    formData.append('action','contact_us');
    formData.append('contact_us',form);
    jQuery.ajax({
        url:"<?php echo admin_url('admin-ajax.php') ?>",
        data:formData,
        processData:false,
        contentType:false,
        type:'post',
        success:function(result){
            alert(result.data);
        }
    });

       
});

</script>



<!-- //--API --// -->

<script>
    jQuery(document).ready(function(){
        jquery("#submitdata").click (function(){

             var url ="<?php  echo get_site_url();?>/wp-json/custom/v1/myapi";

             jquery.ajax({
                url:url,
                type:'GET',
                data:jquery('#form').serialize(),
                success:function(result){
                    alert("your data inserted" + result);
                }
             });
        });
    }
</script>


<?php   get_footer(); ?>