jQuery(document).ready(function($){
    function animateBars(){
        let $bars = $('.cb-home-text-bars');
        let scrollTop = $(window).scrollTop();
        let position = $bars.offset().top;
        let viewportHeight = $(window).height();

        if(
            scrollTop >= position - (viewportHeight / 1.5) &&
            scrollTop <= position + $bars.height() - (viewportHeight / 2.5)
        ){
            $bars.addClass('cb-animated-text-bars');
        } else {
            $bars.removeClass('cb-animated-text-bars');
        }
    }

    $(window).on('load', animateBars);
    $(window).on('scroll', animateBars);
});