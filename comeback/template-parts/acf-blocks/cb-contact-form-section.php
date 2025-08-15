<?php
$title = get_field('cb_contact_form_title');
$text = get_field('cb_contact_form_description');
$wp_is_mobile = wp_is_mobile();

$ph_name = get_field('cb_contact_form_name');
$ph_email = get_field('cb_contact_form_email');
$ph_position = get_field('cb_contact_form_position');
$ph_message = get_field('cb_contact_form_message');
$btn_text = get_field('cb_contact_form_button_text');

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
            <form class="cb-form" id="cb-contact-form" method="post" enctype="multipart/form-data" >
      <div class="cb-form-row">
        <div class="cb-form-input-wrapper half">
<input type="text" name="name" placeholder="<?= esc_attr($ph_name ?: 'Your Name'); ?>" class="cb-input" required>
        </div>
        <div class="cb-form-input-wrapper half">
<input type="email" name="email" placeholder="<?= esc_attr($ph_email ?: 'Your Email'); ?>" class="cb-input" required>
        </div>
      </div>

      <div class="cb-form-row ">
        <div class="cb-form-input-wrapper full">
<input type="text" name="position" placeholder="<?= esc_attr($ph_position ?: 'Choose Your Position'); ?>" class="cb-input" required>
        </div>
      </div>

      <div class="cb-form-row ">
          <div class="cb-form-input-wrapper full">
<textarea name="message" placeholder="<?= esc_attr($ph_message ?: 'Your Message'); ?>" class="cb-textarea"></textarea>
      </div>
      </div>

     <div class="cb-form-row cb-upload-row">
  <label class="cb-file-label">
    <input type="file" name="attachment[]" multiple class="cb-file-input">
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
<button type="submit" class="cb-btn-submit"><?= esc_html($btn_text ?: 'Send Now'); ?></button>
      </div>
    </form>
          </div>
      </div>

      <div class="cb-contact-form-right">
        <?php if(!$wp_is_mobile): ?>
            <div class="cb-embed-wrapper" style="height:700px;">
<!--                 <spline-viewer loading="eager" loading-anim-type="spinner-big-light" url="https://prod.spline.design/plDN19x11ezKtPjd/scene.splinecode"></spline-viewer> -->
				<canvas id="canvas3d"></canvas>
            </div>
        <?php endif; ?>
      </div>

  </div>
    <div class="cb-contact-form-footer-image-top">
<img src="<?= COMEBACK_THEME_URL; ?>/assets/img/footer-image-top.png" alt="">
    </div>
</section>
