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
      <?php if (get_field('cb_enable_reviews')) : ?>
        <form id="cb-apply-form" class="cb-apply-form">
          <h4 class="cb-apply-form-title"><?= get_field('cb_form_title')?></h4>
            <input type="hidden" name="source" id="sourceField" value="none">
            <div class="cb-apply-form-inputs">
              <input type="text" required name="name" class="cb-apply-input form-field" placeholder="<?= get_field('cb_name_placeholder')?>" />
              <input type="email" required name="email" class="cb-apply-input form-field" placeholder="<?= get_field('cb_email_placeholder')?>" />
              <textarea class="form-field cb-apply-input" required name="message" rows="5" placeholder="<?= get_field('cb_message_placeholder')?>"></textarea>
            </div>
            <div class="cb-apply-form-files-inputs">
              <div class="cb-apply-form-cv-input">
                <label class="cb-file-label">
                  <input type="file"  name="cv_file" class="cb-file-input" accept=".pdf,.docx,.odt,.ods,.pptx,.xls,.xlsx,.rtf,.txt">
                  <span class="cb-file-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M21.5969 11.9976L12.3857 21.2088C11.1071 22.4546 9.38916 23.1466 7.604 23.1349C5.81884 23.1233 4.11009 22.409 2.84777 21.1467C1.58544 19.8844 0.871135 18.1756 0.859519 16.3905C0.847903 14.6053 1.53991 12.8874 2.7857 11.6088L12.2721 2.12236C13.1208 1.27367 14.2719 0.796875 15.4721 0.796875C16.6723 0.796875 17.8234 1.27367 18.6721 2.12236C19.5208 2.97105 19.9976 4.12213 19.9976 5.32236C19.9976 6.52259 19.5208 7.67367 18.6721 8.52236L9.4593 17.7352C9.03496 18.1595 8.45942 18.3979 7.8593 18.3979C7.25919 18.3979 6.68365 18.1595 6.2593 17.7352C5.83496 17.3108 5.59656 16.7353 5.59656 16.1352C5.59656 15.535 5.83496 14.9595 6.2593 14.5352L15.1969 5.59756" stroke="url(#paint0_linear_688_4806)" stroke-width="1.5"/>
                          <defs>
                            <linearGradient id="paint0_linear_688_4806" x1="11.2281" y1="0.796875" x2="11.2281" y2="23.1351" gradientUnits="userSpaceOnUse">
                              <stop stop-color="#335FFF"/>
                              <stop offset="1" stop-color="#1A4BFF"/>
                            </linearGradient>
                          </defs>
                    </svg>
                  </span>
                  <span class="cb-file-text"><?= get_field('cb_cv_label') ?></span>
                </label>
                <p class="cb-file-accepted"><?= get_field('cb_cv_instruction') ?></p>
                <p class="cb-file-name" data-placeholder="No file selected"></p>
              </div>
              <div class="cb-apply-form-video-input">
                <label class="cb-file-label">
                  <input type="file" name="video_file" class="cb-file-input" accept="video/mp4,video/webm,video/quicktime,video/x-msvideo">
                  <span class="cb-file-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M23 7L16 12L23 17V7Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M23 7L16 12L23 17V7Z" stroke="url(#paint0_linear_726_32)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M14 5H3C1.89543 5 1 5.89543 1 7V17C1 18.1046 1.89543 19 3 19H14C15.1046 19 16 18.1046 16 17V7C16 5.89543 15.1046 5 14 5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M14 5H3C1.89543 5 1 5.89543 1 7V17C1 18.1046 1.89543 19 3 19H14C15.1046 19 16 18.1046 16 17V7C16 5.89543 15.1046 5 14 5Z" stroke="url(#paint1_linear_726_32)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <defs>
                        <linearGradient id="paint0_linear_726_32" x1="19.5" y1="7" x2="19.5" y2="17" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#335FFF"/>
                          <stop offset="1" stop-color="#1A4BFF"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_726_32" x1="8.5" y1="5" x2="8.5" y2="19" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#335FFF"/>
                          <stop offset="1" stop-color="#1A4BFF"/>
                        </linearGradient>
                      </defs>
                    </svg>
                  </span>
                  <span class="cb-file-text"><?= get_field('cb_video_label') ?></span>
                </label>
                <p class="cb-file-accepted"><?= get_field('cb_video_instruction') ?></p>
                <p class="cb-file-name" data-placeholder="No file selected"></p>
              </div>
            </div>

            <button type="submit"  class="cb-apply-submit-btn cb-btn cb-btn-apply cb-single-apply-btn">
              <div class="icon"></div>  
              <?= get_field('cb_apply_now_text') ?>
            </button>
          
        </form>
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

      <?php if (get_field('cb_enable_reviews')) : ?>
            <div class="cb-job-info-block cb-job-info-apply">
              <button href="#cb-apply-form" class="cb-btn cb-btn-apply cb-job-info-apply-btn"><?= get_field('cb_apply_now_text') ?></button>
            </div>
      <?php endif; ?>
    </div>
  </div>
    <div class="cb-archive-footer-image-top">
      <img src="<?= COMEBACK_THEME_URL; ?>/assets/img/footer-image-top.png" alt="">
    </div>
</section>

<?php get_footer(); ?>
