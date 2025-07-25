<?php
$hero_title = get_field('cb_contact_hero_title');
?>
<section class="cb-contact-hero">
  <div class="cb-container">
    <?php if ($hero_title): ?>
      <h1 class="cb-contact-hero-title cb-has-animation cb-animated"><?= esc_html($hero_title); ?></h1>
    <?php endif; ?>
  </div>
</section>
