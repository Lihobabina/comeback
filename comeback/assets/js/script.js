jQuery(document).ready(function($){
    function animateElements(){
        $('.cb-has-animation:not(.cb-animated)').each(function(){
            let $this = $(this);
            let scrollTop = $(window).scrollTop();
            let position = $this.offset().top;
            let viewportHeight = $(window).height();

            if(
                scrollTop >= position - (viewportHeight / 1.5) &&
                scrollTop <= position + $this.height() - (viewportHeight / 2.5)
            ){
                $this.addClass('cb-animated');
            }
        });
    }

    $(window).on('load', animateElements);
    $(window).on('scroll', animateElements);
});
