<?php 

//Template Name:senza form

acf_form_head();
get_header();


acf_form(array(
    'post_id'		=> 'new_post',
    'post_title'	=> true,
    'post_content'	=> true,
    'new_post'		=> array(
        'post_type'		=> 'cars',
        'post_status'	=> 'draft'
    )
));


get_footer();


?>