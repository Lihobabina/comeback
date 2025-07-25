<?php get_header(); ?>

<section class="cb-single-hero">
  <div class="cb-container">
    <h1 class="cb-single-hero-title cb-has-animation cb-animated">
      <?= esc_html(get_the_title()); ?>
    </h1>
    <?php if ($subtitle = get_field('cb_job_salary_subtitle')) : ?>
      <span class="cb-single-hero-subtitle"><?= esc_html($subtitle); ?></span>
    <?php endif; ?>
  </div>
</section>

<section class="cb-single-section">
  <div class="cb-single-hero-image-bottom">
    <img src="<?= COMEBACK_THEME_URL; ?>/assets/img/hero-image-bottom.png" alt="">
  </div>

  <div class="cb-container cb-single-flex">
    <div class="cb-single-left">
      <h3 class="cb-single-left-title">About Vacancy</h3>
      <div class="cb-single-description">
        <?php the_content(); ?>
      </div>
      <?php if (!get_field('cb_show_main_apply_button')) : ?>
        <button class="cb-btn cb-btn-apply cb-single-apply-btn">
          <div class="icon"></div>  
          Apply Now
        </button>
      <?php endif; ?>
    </div>

    <div class="cb-single-right">
      <?php if (have_rows('cb_job_skills')) : ?>
        <div class="cb-job-info-block cb-job-info-skills">
          <h4 class="cb-job-info-title">General Skills</h4>
          <ul class="cb-job-info-list">
            <?php while (have_rows('cb_job_skills')) : the_row(); ?>
              <?php if ($skill = get_sub_field('cb_job_skill_item')) : ?>
                <li class="cb-job-info-item"><?= esc_html($skill); ?></li>
              <?php endif; ?>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if (get_field('cb_job_salary_range') || get_field('cb_job_salary_note')) : ?>
        <div class="cb-job-info-block cb-job-info-salary">
          <h4 class="cb-job-info-title">Salary</h4>
          <div class="cb-job-info-text">
            <?php if ($range = get_field('cb_job_salary_range')) : ?>
              <p class="cb-salary-range"><?= esc_html($range); ?></p>
            <?php endif; ?>
            <?php if ($note = get_field('cb_job_salary_note')) : ?>
              <p class="cb-salary-note"><?= esc_html($note); ?></p>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($employment = get_field('cb_job_employment_type')) : ?>
        <div class="cb-job-info-block cb-job-info-employment">
          <h4 class="cb-job-info-title">Employment</h4>
          <div class="cb-job-info-text">
            <p class="cb-employment-type"><?= esc_html($employment); ?></p>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!get_field('cb_show_side_apply_button')) : ?>
        <div class="cb-job-info-block cb-job-info-apply">
          <button class="cb-btn cb-btn-apply cb-job-info-apply-btn">Apply</button>
        </div>
      <?php endif; ?>
    </div>
  </div>
    <div class="cb-archive-footer-image-top">
<img src="<?= COMEBACK_THEME_URL; ?>/assets/img/footer-image-top.png" alt="">
    </div>
</section>

<?php get_footer(); ?>
