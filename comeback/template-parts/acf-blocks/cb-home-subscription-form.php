<?php
$title = get_field('cb_home_subscription_form_title');
$text = get_field('cb_home_subscription_form_text');
$wp_is_mobile = wp_is_mobile();

// if(!$wp_is_mobile) wp_enqueue_script_module('spline-viewer', 'https://unpkg.com/@splinetool/viewer@1.10.8/build/spline-viewer.js', [], '1.10.8');
?>

<section class="cb-home-subscription-form">
    <div class="cb-container">
        <div class="cb-form-wrapper">
            <?php
            if($title) printf('<h2 class="cb-form-title cb-has-animation">%s</h2>', $title);
            if($text) printf('<p class="cb-form-description">%s</p>', $text);
            ?>
           <form class="cb-form" id="cb-subscription-form" method="post"  >
    <div class="cb-form-input-wrapper">
        <input type="email" autocomplete="email" name="email" class="cb-form-input" placeholder="Enter Your Email" required>
    </div>
    <div class="cb-form-checkboxes">
        <label class="cb-form-label">
            <input type="checkbox" name="checkboxes[]" value="Marketing">
            Marketing
        </label>
        <label class="cb-form-label">
            <input type="checkbox" name="checkboxes[]" value="Engineering">
            Engineering
        </label>
        <label class="cb-form-label">
            <input type="checkbox" name="checkboxes[]" value="Business Developer">
            Business Developer
        </label>
        <label class="cb-form-label">
            <input type="checkbox" name="checkboxes[]" value="Sales">
            Sales
        </label>
    </div>
<button type="submit" class="cb-form-submit"><span class="btn-text">See All Locations</span></button>
</form>

        </div>

        <?php if(!$wp_is_mobile): ?> 
            <div class="cb-embed-wrapper" >
<!--                  <spline-viewer
  loading="eager"
  loading-anim-type="spinner-big-light"
  url="https://prod.spline.design/plDN19x11ezKtPjd/scene.splinecode">
</spline-viewer> -->
<canvas id="canvas3d"></canvas>
            </div>
        <?php endif; ?>
    </div>
</section>
