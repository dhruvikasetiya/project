<?php 
    global $wpdb;
    global $table_prefix;
    $table=$table_prefix.'emp';

    if(isset($_GET['my_search_term'])){
     $q = "select * from `$table` WHERE `name` LIKE '%".$_GET['my_search_term']."%';";
     }else{
        $q = "select * from `$table`;";
    }

    $result=$wpdb->get_results($q);
   //  print_r($result);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 pt-5"><h1>my plugin page</h1>
                <form actio="<?php echo admin_url('admin.php'); ?>">
                    <input type="hidden" name="page" value="emp/emp.php">
                    <input type="text" name="my_search_term" id="my-search-term">
                    <input type="submit" value="search" name="search"/>
                </form>
        </div>

       
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-9 ">
        <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
    </tr>
    <?php
    foreach($result as $data){
    ?>
    <tr>
        <td><?php echo $data->id;?></td>
        <td><?php echo $data->name;?></td>
        <td><?php echo $data->email;?></td>
    </tr>
    <?php
    }
    ?>
</table>
        </div>
    </div>
</div>
