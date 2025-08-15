jQuery(document).ready(function($){
    $(window).on('load', function(){
        let swiper = new Swiper('.cb-home-testimonials .cb-testimonials', {
            slidesPerView: 'auto', 
            centeredSlides: true,
            initialSlide: 2,
            breakpoints: {
                0: {
                    spaceBetween: 8,
                    pagination: {
                        el: '.cb-home-testimonials .cb-testimonials .swiper-pagination',
                        clickable: true
                    }
                },
                1025: {
                    spaceBetween: 30
                }
            }
        });

        let animationGroupSwiper = new Swiper('.cb-home-testimonials-animation-group .swiper-container', {
            slidesPerView: 'auto',
            centeredSlides: true,
            initialSlide: 2,
            speed: 4500,
            loop: true,
            allowTouchMove: false,
            autoplay: {
                delay: 0,
            },
            breakpoints: {
                0: {
                    spaceBetween: 8
                },
                1025: {
                    spaceBetween: 24
                }
            }
        });
    });
});