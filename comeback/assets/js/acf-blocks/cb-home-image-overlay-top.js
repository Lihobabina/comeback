jQuery(document).ready(function($){
    function overlayTop(){
        $('.cb-home-image-overlay-top').each(function(){
            $(this).css('margin-bottom', `-${$(this).find('img').height() || 0}px`);
        });
    }

    $(window).on('load', overlayTop);
    $(window).on('resize', overlayTop);
});
