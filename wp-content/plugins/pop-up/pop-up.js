jQuery(document).ready(function($){
    setTimeout(function(){
        $('.popup-wrapper').fadeIn();
    }, 1000);
    $('.close').click(function(){
        $('.popup-wrapper').fadeOut();
    });
});