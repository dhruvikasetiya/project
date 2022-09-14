<?php
if(!defined('ABSPATH')){
    //header("location:/wp2");
    die();
}
$popups = array(
    'img1.jpg',
    'img2.jpg',
    'img3.jpg',
);
if(isset($_POST['save_popup'])){
}
?>
<div class="wrap">
    <h1 class="wp-heading-inline"> <?php echo get_admin_page_title(); ?> </h1>
    <h3>Select Popup To Show</h3>
    <form action="">
        <ul>
            <?php 
                foreach($popups as $popup){
                    echo"<li>
                            <input type='radio' name='popup-image' value='$popup' id='$popup' />
                            <label for='$popup'> $popup </label>
                        </li>";
                }
            ?>
        </ul>
        <input type="submit" value="save" name="save_popup">
    </form>
</div>