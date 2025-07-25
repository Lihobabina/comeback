<?php get_header(); ?>

<?php
$hero_title = get_field('cb_theme_settings_archive_page_title', 'cb-theme-settings');
$image_bottom = get_field('cb_theme_settings_archive_image_bottom', 'cb-theme-settings');
$section_title = get_field('cb_theme_settings_archive_section_title', 'cb-theme-settings');
?>

<section class="cb-archive-hero">
  <div class="cb-container">
    <?php if ($hero_title): ?>
    <h1 class="cb-archive-hero-title cb-has-animation cb-animated"><?= esc_html($hero_title); ?></h1>
    <?php endif; ?>
  </div>
</section>

<section class="cb-archive-section">
    <?php if ($image_bottom): ?>
  <div class="cb-archive-hero-image-bottom">
<img src="<?= COMEBACK_THEME_URL; ?>/assets/img/hero-image-bottom.png" alt="">
    </div>
  <?php endif; ?>
  <div class="cb-container">
    <?php if ($section_title): ?>
    <h2 class="cb-archive-section-title"><?= esc_html($section_title); ?></h2>
    <?php endif; ?>
    <div class="cb-archive-content-grid">
      <div class="cb-archive-posts">
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'vacancy');
          endwhile;
        endif;
        ?>
      </div>
      <div class="cb-archive-filters-overlay">
        <h3 class="cb-archive-filters-title-mob"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M25.3307 16H6.66406" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.9974 25.3307L6.66406 15.9974L15.9974 6.66406" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
Vacancies
</h3>
<div class="cb-archive-filters">
  <form id="cb-archive-filter-form" method="GET" action="">

    <div class="cb-filter-block">
      <div class="cb-filter-group cb-filter-search-group">
        <input type="text" name="s" placeholder="Search by position" class="cb-filter-search" value="<?= isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>">
      </div>
    </div>

    <div class="cb-filter-block">
      <h3 class="cb-filter-title">Category</h3>
      <div class="cb-filter-group">
        <?php
        $job_categories = get_terms([
          'taxonomy' => 'cb-job-category',
          'hide_empty' => true,
        ]);

        if (!empty($job_categories) && !is_wp_error($job_categories)) :
          foreach ($job_categories as $term) :
        ?>
            <label class="cb-filter-checkbox">
              <input type="checkbox" name="cb-job-category[]" value="<?= esc_attr($term->slug); ?>" <?= (isset($_GET['cb-job-category']) && in_array($term->slug, (array) $_GET['cb-job-category'])) ? 'checked' : ''; ?>>
              <span><?= esc_html($term->name); ?></span>
            </label>
        <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>

    <div class="cb-filter-block">
      <h3 class="cb-filter-title">Employment</h3>
      <div class="cb-filter-group">
        <?php
        $employment_terms = get_terms([
          'taxonomy' => 'employment',
          'hide_empty' => true,
        ]);

        if (!empty($employment_terms) && !is_wp_error($employment_terms)) :
          foreach ($employment_terms as $term) :
        ?>
            <label class="cb-filter-checkbox">
              <input type="checkbox" name="employment[]" value="<?= esc_attr($term->slug); ?>" <?= (isset($_GET['employment']) && in_array($term->slug, (array) $_GET['employment'])) ? 'checked' : ''; ?>>
              <span><?= esc_html($term->name); ?></span>
            </label>
        <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>

    <div class="cb-filter-block">
      <h3 class="cb-filter-title">English</h3>
      <div class="cb-filter-group">
        <?php
        $english_terms = get_terms([
          'taxonomy' => 'english_level',
          'hide_empty' => true,
        ]);

        if (!empty($english_terms) && !is_wp_error($english_terms)) :
          foreach ($english_terms as $term) :
        ?>
            <label class="cb-filter-checkbox">
              <input type="checkbox" name="english_level[]" value="<?= esc_attr($term->slug); ?>" <?= (isset($_GET['english_level']) && in_array($term->slug, (array) $_GET['english_level'])) ? 'checked' : ''; ?>>
              <span><?= esc_html($term->name); ?></span>
            </label>
        <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>

    <div class="cb-filter-buttons">
      <button type="reset" class="cb-btn cb-btn-reset">Reset</button>
      <button type="submit" class="cb-btn cb-btn-apply">Apply</button>
    </div>

  </form>
</div>

</div>



    </div>
  </div>
  <button class="cb-show-filters-btn">Filters</button>
  <div class="cb-archive-footer-image-top">
<img src="<?= COMEBACK_THEME_URL; ?>/assets/img/footer-image-top.png" alt="">
    </div>
</section>

<?php get_footer(); ?>