<?php
$image = get_field('cb_home_profile_info_image');
$title = get_field('cb_home_profile_info_title');
$text = get_field('cb_home_profile_info_text');
$button_text = get_field('cb_home_profile_info_button_text');
$button_link = get_field('cb_home_profile_info_button_link') ?: '#';
?>

<section class="cb-home-profile-info">
    <?= wp_get_attachment_image(get_field('cb_home_profile_info_overlay_top'), 'full', false, ['class' => 'cb-overlay-top']) ?>

    <div class="cb-container">
        <?= wp_get_attachment_image($image, 'full', false, ['class' => 'cb-home-profile-info-image']) ?>

        <div class="cb-home-profile-info-content">
            <?php
            if($title) echo '<h2 class="cb-home-profile-info-title cb-has-animation">' . $title . '<h2>';
            if($text) echo '<p class="cb-home-profile-info-text">' . $text . '<p>';
            if($button_text) printf(
                '<a href="%s" class="cb-home-profile-info-button"><span>%s</span></a>',
                $button_link, $button_text
            );
            ?>
        </div>
    </div>

    <?= wp_get_attachment_image(get_field('cb_home_profile_info_overlay_bottom'), 'full', false, ['class' => 'cb-overlay-bottom']) ?>
</section>
