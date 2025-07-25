<?php
$title = get_field('cb_home_hero_title');
$content = get_field('cb_home_hero_content');
$button_text = get_field('cb_home_hero_button_text');
$button_link = get_field('cb_home_hero_button_link');

$wp_is_mobile = wp_is_mobile();

if(!$wp_is_mobile) wp_enqueue_script_module('spline-viewer', 'https://unpkg.com/@splinetool/viewer@1.10.8/build/spline-viewer.js', [], '1.10.8');
?>

<section class="cb-home-hero">
    <?php if(!$wp_is_mobile): ?>
        <div class="cb-home-hero-bg-wrapper">
            <spline-viewer loading-anim-type="spinner-big-light" url="https://prod.spline.design/L9IuiYCrsGzu89mp/scene.splinecode"></spline-viewer>
        </div>

        <div class="cb-home-hero-bg-overlay"></div>
    <?php endif; ?>
    
    <div class="cb-container">
        <?php
        if($title) echo '<h1 class="cb-home-hero-title cb-has-animation">' . $title . '</h1>';
        if($content) echo '<div class="cb-home-hero-content">' . $content . '</div>';
        if($button_text) printf(
            '<a href="%s" class="cb-home-hero-button"><span>%s</span></a>',
            $button_link ?: '#', $button_text
        );
        ?>
    </div>
</section>
