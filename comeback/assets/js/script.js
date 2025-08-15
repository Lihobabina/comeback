jQuery(document).ready(function($){

  $('.js-anim-text').each(function() {
    const $this = $(this);
    const text = $this.text();
    const wrappedText = text.replace(/\S/g, "<span class='letter'>$&</span>");
    $this.html(wrappedText);
  });

  $('.a-logo').css('opacity', '1');

  if ($('.js-anim-text').length) {
    anime.timeline({loop: false})
      .add({
        targets: '.js-anim-text .letter',
        opacity: [0, 1],
        scale: [0, 1],
        easing: "easeInOutQuad",
        duration: 500,
        delay: function(el, i) {
          return 150 * (i + 1);
        }
      });
  }



  function animateElements() {
    $('.cb-has-animation:not(.cb-animated)').each(function(){
      const $this = $(this);
      const scrollTop = $(window).scrollTop();
      const position = $this.offset().top;
      const viewportHeight = $(window).height();

      if (
        scrollTop >= position - (viewportHeight / 1.5) &&
        scrollTop <= position + $this.height() - (viewportHeight / 2.5)
      ) {
        $this.addClass('cb-animated');
      }
    });
  }

  $(window).on('load scroll', animateElements);

  $('.cb-header-burger').on('click', function () {
    $('.cb-mobile-menu').addClass('active');
  });

  $('.cb-mobile-close').on('click', function () {
    $('.cb-mobile-menu').removeClass('active');
  });

// 	preloader
jQuery(document).ready(function($){
    Pace.on('done', function(){
        $('#preloader').addClass('hidden');
        setTimeout(function(){
            $('#preloader').css('display', 'none');
        }, 500);
    });
});



	
});





