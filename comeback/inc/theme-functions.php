<?php

if( !function_exists('cb_enqueue_scripts') ){
    function cb_enqueue_scripts(){
        wp_enqueue_style(
            'cb-main',
            COMEBACK_THEME_URL . '/assets/css/style.css',
            [],
            filemtime(COMEBACK_THEME_DIR . '/assets/css/style.css')
        );
		 wp_enqueue_script(
        'pace-js',
        'https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js',
        [],
        null,
        true
    );
		
    wp_enqueue_style(
        'pace-theme-default',
        'https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/blue/pace-theme-flash.min.css',
        [],
        null
    );
        wp_enqueue_script(
        'animejs',
        'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js',
         ['jquery'],
        null,
        true
        );
        if (is_page('contact-us')) {
            wp_enqueue_script(
            'cb-contact-form-section',
            COMEBACK_THEME_URL . '/assets/js/acf-blocks/cb-contact-form-section.js',
            [],
            null,
            true
            );
            
            wp_localize_script('cb-contact-form-section', 'cbFormAjax', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('cb_form_nonce'),
            ]);	
        }
        if (is_front_page()) {
            wp_enqueue_script(
                'cb-home-subscription-form',
                COMEBACK_THEME_URL . '/assets/js/acf-blocks/cb-home-subscription-form.js',
                [],
                null,
                true
            );
wp_enqueue_script(
            'cb-home-locations-and-jobs',
            COMEBACK_THEME_URL . '/assets/js/acf-blocks/cb-home-locations-and-jobs.js',
            [],
            null,
            true
            );
            wp_localize_script('cb-home-subscription-form', 'cbFormAjax', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('cb_form_nonce'),
            ]);
        }
        wp_enqueue_script(
            'cb-main',
            COMEBACK_THEME_URL . '/assets/js/script.js',
            ['jquery'],
            filemtime(COMEBACK_THEME_DIR . '/assets/js/script.js'),
            true
        );
        if (is_singular('cb-job')) {
            wp_enqueue_style(
                'cb-job-single',
                COMEBACK_THEME_URL . '/assets/css/single-cb-job.css',
                [],
                filemtime(COMEBACK_THEME_DIR . '/assets/css/single-cb-job.css')
            );
            wp_enqueue_style(
                'cb-job-single-form',
                COMEBACK_THEME_URL . '/assets/css/single-cb-job-form.css',
                [],
                filemtime(COMEBACK_THEME_DIR . '/assets/css/single-cb-job.css')
            );
            wp_enqueue_script(
                    'cb-job-single-form-script',
                    COMEBACK_THEME_URL . '/assets/js/single-form.js',
                    ['jquery'],
                    filemtime(COMEBACK_THEME_DIR . '/assets/js/single-form.js'),
                    true
            );
            global $post;
            wp_localize_script('cb-job-single-form-script', 'cbFormData', [
                'ajaxurl' => admin_url('admin-ajax.php'),
                'security' => wp_create_nonce('cb_form_nonce'),
                'vacancy_post_id'      => $post->ID,
                'vacancy_post_title'   => get_the_title($post),
            ]);
        }
		if ( is_front_page() || is_page('contact-us') ) {
   $spline_data = [
    'baseUrl' => get_template_directory_uri() . '/assets/spline/'
];

wp_enqueue_script(
    'spline-robot-init',
    get_template_directory_uri() . '/assets/js/spline/robot-init.js',
    [],
    null,
    true
);
wp_localize_script('spline-robot-init', 'splineData', $spline_data);

wp_enqueue_script(
    'home-hero-init',
    get_template_directory_uri() . '/assets/js/spline/home-hero-init.js',
    [],
    filemtime(get_template_directory() . '/assets/js/spline/home-hero-init.js'),
    true
);
wp_localize_script('home-hero-init', 'splineData', $spline_data); 
}
        if ( is_post_type_archive('cb-job') ) {
            wp_enqueue_style(
                'cb-jobs-archive',
                COMEBACK_THEME_URL . '/assets/css/archive-cb-job.css',
                [],
                filemtime(COMEBACK_THEME_DIR . '/assets/css/archive-cb-job.css')
            );

            wp_enqueue_script(
                'cb-ajax-filters',
                COMEBACK_THEME_URL . '/assets/js/ajax-filters.js',
                ['jquery'],
                filemtime(COMEBACK_THEME_DIR . '/assets/js/ajax-filters.js'),
                true
            );

            wp_localize_script('cb-ajax-filters', 'cb_ajax_obj', [
                'ajaxurl' => admin_url('admin-ajax.php'),
            ]);

        }
    }
}
add_action('wp_enqueue_scripts', 'cb_enqueue_scripts');

if( !function_exists('cb_admin_enqueue_scripts') ){
    function cb_admin_enqueue_scripts(){
        wp_enqueue_style( 'cb-main', COMEBACK_THEME_URL . '/assets/css/admin.css', [], filemtime(COMEBACK_THEME_DIR . '/assets/css/admin.css') );
    }
}

if( !function_exists('cb_register_nav_menus') ){
    function cb_register_nav_menus(){
        register_nav_menus([
            'header' => 'Header',
            'footer-1' => 'Footer 1',
            'footer-2' => 'Footer 2',
            'mobile'    => 'Mobile Menu',
        ]);
    }
}

if( !function_exists('cb_add_theme_supports') ){
    function cb_add_theme_supports(){
        add_theme_support(
            'custom-logo', [
                'height' => 160,
                'width' => 42,
                'flex-width'  => true,
                'flex-height' => true,
            ]
        );
    }
}

if( !function_exists('cb_allow_svg_upload') ){
    function cb_allow_svg_upload($mimes){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}

if( !function_exists('cb_register_gutenberg_categories') ){
    function cb_register_gutenberg_categories($block_categories){
        $block_categories[] = [
            'slug' => 'comeback',
            'title' => 'Come Back',
        ];

        return $block_categories;
    }
}

if( !function_exists('cb_register_acf_blocks') ){
    function cb_register_acf_blocks(){
        if( !function_exists('acf_register_block') ) return;

        require COMEBACK_THEME_DIR . '/inc/acf-blocks.php';

        foreach($acf_blocks as $acf_block){
            acf_register_block($acf_block);
        }
    }
}

if( !function_exists('cb_acf_block_render_callback') ){
    function cb_acf_block_render_callback($block){
        if( !function_exists('get_field') ) return;

        $slug = str_replace( 'acf-', '', acf_slugify($block['name']) );

        require COMEBACK_THEME_DIR . '/template-parts/acf-blocks/' . $slug . '.php';
    }
}

if( !function_exists('cb_add_theme_settings_options_page') ){
    function cb_add_theme_settings_options_page(){
        if( !function_exists('acf_add_options_page') ) return;

        acf_add_options_page([
            'page_title' => 'Come Back Settings',
            'menu_title' => 'Come Back',
            'menu_slug' => 'cb-site-options-menu',
            'post_id' => 'cb-site-options',
            'position' => 30.01,
            'redirect' => false,
            'icon_url' => COMEBACK_THEME_URL . '/assets/img/cba-white-vector.svg'
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'cb-theme-settings-menu',
            'post_id' => 'cb-theme-settings',
            'parent' => 'cb-site-options-menu'
        ]);
    }
}

