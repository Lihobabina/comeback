<?php
$title = get_field('cb_contact_form_title');
$text = get_field('cb_contact_form_description');
$wp_is_mobile = wp_is_mobile();

if(!$wp_is_mobile) wp_enqueue_script_module('spline-viewer', 'https://unpkg.com/@splinetool/viewer@1.10.8/build/spline-viewer.js', [], '1.10.8');
?>

<section class="cb-contact-form-section">
      <div class="cb-contact-form-image-bottom">
<img src="<?= COMEBACK_THEME_URL; ?>/assets/img/hero-image-bottom.png" alt="">
    </div>
  <div class="cb-container">
      
      <div class="cb-contact-form-left">
        <?php if ($title): ?>
          <h2 class="cb-contact-form-title"><?= esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($text): ?>
          <div class="cb-contact-form-text">
            <?= wp_kses_post($text); ?>
          </div>
        <?php endif; ?>

          <div class="cb-contact-form-wrapper">
            <form class="cb-form" method="post" enctype="multipart/form-data">
      <div class="cb-form-row">
        <input type="text" name="name" placeholder="Your Name" class="cb-input half">
        <input type="email" name="email" placeholder="Your Email" class="cb-input half">
      </div>

      <div class="cb-form-row">
        <input type="text" name="position" placeholder="Choose Your Position" class="cb-input full">
      </div>

      <div class="cb-form-row">
        <textarea name="message" placeholder="Your Message" class="cb-textarea full"></textarea>
      </div>

     <div class="cb-form-row cb-upload-row">
  <label class="cb-file-label">
    <input type="file" name="attachment" class="cb-file-input" multiple>
    <span class="cb-file-text">
      <img src="<?= COMEBACK_THEME_URL; ?>/assets/img/attach-icon.svg" alt=""> Attach a file
    </span>
  </label>
  <p class="cb-file-note">
    Accepted formats: .pdf, .docx, .odt, .ods, .pptx, .xls/x, .rtf, .txt.
  </p>
  <ul class="cb-file-preview-list" id="file-preview-list"></ul>
</div>


      <div class="cb-form-row">
        <button type="submit" class="cb-btn-submit">Send Now</button>
      </div>
    </form>
          </div>
      </div>

      <div class="cb-contact-form-right">
        <?php if(!$wp_is_mobile): ?>
            <div class="cb-embed-wrapper">
                <spline-viewer loading-anim-type="spinner-big-light" url="https://prod.spline.design/plDN19x11ezKtPjd/scene.splinecode"></spline-viewer>
            </div>
        <?php endif; ?>
      </div>

  </div>
    <div class="cb-contact-form-footer-image-top">
<img src="<?= COMEBACK_THEME_URL; ?>/assets/img/footer-image-top.png" alt="">
    </div>
</section>
