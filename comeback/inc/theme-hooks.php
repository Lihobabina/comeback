<?php
if (!defined('COMEBACK_THEME_DIR')) {
    define('COMEBACK_THEME_DIR', get_template_directory());
}

add_action('wp_enqueue_scripts', 'cb_enqueue_scripts');
add_action('admin_enqueue_scripts', 'cb_admin_enqueue_scripts');

add_action('after_setup_theme', 'cb_register_nav_menus');
add_action('after_setup_theme', 'cb_add_theme_supports');

add_filter('upload_mimes', 'cb_allow_svg_upload');

add_filter('block_categories_all', 'cb_register_gutenberg_categories');
add_action('acf/init', 'cb_register_acf_blocks');

add_action('acf/init', 'cb_add_theme_settings_options_page');



?>
