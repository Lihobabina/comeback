<?php
$title = get_field('cb_theme_settings_footer_title', 'cb-theme-settings');
$button_text = get_field('cb_theme_settings_footer_button_text', 'cb-theme-settings');
$button_link = get_field('cb_theme_settings_footer_button_link', 'cb-theme-settings') ?: '#';
$image = get_field('cb_theme_settings_footer_image', 'cb-theme-settings');
?>

        <footer class="cb-footer">
            <div class="cb-container">
                <?php
                if($title) echo '<h2 class="cb-footer-title cb-has-animation">' . $title . '</h2>';

                if($button_text) echo '<a href="' . $button_link . '" class="cb-footer-button">' . $button_text . '<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 17.5L17 7.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 17.5L17 7.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 7.5H17V17.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 7.5H17V17.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>';
                ?>

                <div class="cb-footer-menus-wrapper">
                    <?php 
                    wp_nav_menu([
                        'theme_location' => 'footer-1',
                        'container' => false,
                        'menu_class' => 'cb-footer-menu',
                        'depth' => 1
                    ]);

                    wp_nav_menu([
                        'theme_location' => 'footer-2',
                        'container' => false,
                        'menu_class' => 'cb-footer-menu',
                        'depth' => 1
                    ]);
                    ?>
                </div>
            </div>

            <?= wp_get_attachment_image($image, 'full', false, ['class' => 'cb-footer-image']); ?>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>