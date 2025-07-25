jQuery(document).ready(function($){
    $(window).on('load', function(){
        let swiper = new Swiper('.cb-home-locations .swiper-container', {
            slidesPerView: 'auto', 
            speed: 12000,
            loop: true,
            allowTouchMove: false,
            autoplay: {
                delay: 0,
            },
            breakpoints: {
                0: {
                    spaceBetween: 40
                },
                1025: {
                    spaceBetween: 88
                }
            }
        });
    });
});
