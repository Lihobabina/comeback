jQuery(function ($) {
  const $form = $('#cb-archive-filter-form');
  const $results = $('.cb-archive-posts');
  const $applyBtn = $('.cb-btn-apply');
  const $filtersOverlay = $('.cb-archive-filters-overlay');
  const $archiveSection = $('.cb-archive-section');

  function getFilters() {
    const categories = [];
    const employment = [];
    const english_level = [];

    $form.find('input[name="cb-job-category[]"]:checked').each(function () {
      categories.push($(this).val());
    });
    $form.find('input[name="employment[]"]:checked').each(function () {
      employment.push($(this).val());
    });
    $form.find('input[name="english_level[]"]:checked').each(function () {
      english_level.push($(this).val());
    });

    return {
      action: 'cb_filter_vacancies',
      search: $form.find('input[name="s"]').val(),
      categories,
      employment,
      english_level
    };
  }

  function applyFilters() {
    $results.addClass('loading');
    $.post(cb_ajax_obj.ajaxurl, getFilters(), function (response) {
      if (response.success) {
        $results.html(response.data);
      }
      $results.removeClass('loading');
    });
  }

  function closeFiltersAndScroll() {
    if ($(window).width() < 1024) {
      $filtersOverlay.removeClass('active');
      $('html, body').animate({
        scrollTop: $archiveSection.offset().top
      }, 300);
    }
  }

  $form.on('change', 'input[type="checkbox"]', function () {
    $(this).closest('label').toggleClass('active', this.checked);
  });

  $applyBtn.on('click', function (e) {
    e.preventDefault();
    applyFilters();
    closeFiltersAndScroll();
  });

  $form.on('reset', function () {
    setTimeout(() => {
      $form.find('label.cb-filter-checkbox').removeClass('active');
      applyFilters();
      closeFiltersAndScroll();
    }, 100);
  });
});



jQuery(function($) {
  function initMobileFilters() {
    const $filtersOverlay = $('.cb-archive-filters-overlay');
    const $showFiltersBtn = $('.cb-show-filters-btn');
    const $closeFiltersBtn = $('.cb-archive-filters-title-mob');

    $(window).off('scroll.filters');
    $showFiltersBtn.off('click.filters');
    $closeFiltersBtn.off('click.filters');

    if ($(window).width() < 1024) {
      $(window).on('scroll.filters', function() {
        if ($(window).scrollTop() > 300) {
          $showFiltersBtn.fadeIn();
        } else {
          $showFiltersBtn.fadeOut();
        }
      });

      $showFiltersBtn.on('click.filters', function() {
        $filtersOverlay.addClass('active');
      });

      $closeFiltersBtn.on('click.filters', function() {
        $filtersOverlay.removeClass('active');
      });
    } else {
      $showFiltersBtn.hide();
    }
  }

  initMobileFilters();

  $(window).on('resize', function() {
    initMobileFilters();
  });
});
