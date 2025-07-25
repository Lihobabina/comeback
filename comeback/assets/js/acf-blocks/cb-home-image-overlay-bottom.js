jQuery(document).ready(function($){
    function overlayBottom(){
        $('.cb-home-image-overlay-bottom').each(function(){
            $(this).css('margin-top', `-${$(this).find('img').height() || 0}px`);
        });
    }

    $(window).on('load', overlayBottom);
    $(window).on('resize', overlayBottom);
});
