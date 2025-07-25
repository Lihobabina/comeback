<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?= get_bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
</head>
<body>
    <header class="cb-header">
        <div class="cb-header-container">
            <?= get_custom_logo() ?: '<a href="' . home_url('/') . '" class="cb-header-logo"><img src="' . COMEBACK_THEME_URL . '/assets/img/logo-cba-white.svg" alt="Site Logo"></a>' ?>

            <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'cb-header-menu',
                'depth' => 1
            ]); ?>

            <?php
            $button_text = get_field('cb_theme_settings_header_button_text', 'cb-theme-settings');

            if($button_text) printf(
                '<a class="cb-header-button" href="%s"><span>%s</span></a>',
                get_field('cb_theme_settings_header_button_link', 'cb-theme-settings') ?: '#',
                $button_text
            );
            ?>
<button class="cb-header-burger" aria-label="Toggle menu">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 16H28" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 8H28" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 24H28" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </button>
        </div>
    </header>
    <div class="cb-mobile-menu">
  <div class="cb-mobile-menu-container">
    <div class="cb-mobile-menu-header">
      <a href="<?= esc_url(home_url('/')) ?>" class="cb-mobile-logo">
        <img src="<?= esc_url(COMEBACK_THEME_URL . '/assets/img/logo-cba-white.svg') ?>" alt="Site Logo">
      </a>
      <button class="cb-mobile-close" aria-label="Close menu">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M24 8L8 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8 8L24 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

      </button>
    </div>

    <nav class="cb-mobile-nav">
      <?php wp_nav_menu([
        'theme_location' => 'header',
        'container' => false,
        'menu_class' => 'cb-mobile-menu-list',
        'depth' => 1
      ]); ?>
    </nav>

    <div class="cb-mobile-socials">
      <a href="#" class="cb-mobile-social" target="_blank" rel="noopener">
        <img src="<?= esc_url(COMEBACK_THEME_URL . '/assets/img/icon-fb.svg') ?>" alt="Facebook">
      </a>
      <a href="#" class="cb-mobile-social" target="_blank" rel="noopener">
        <img src="<?= esc_url(COMEBACK_THEME_URL . '/assets/img/icon-insta.svg') ?>" alt="Instagram">
      </a>
      <a href="#" class="cb-mobile-social" target="_blank" rel="noopener">
        <img src="<?= esc_url(COMEBACK_THEME_URL . '/assets/img/icon-youtube.svg') ?>" alt="YouTube">
      </a>
    </div>
  </div>
</div>

