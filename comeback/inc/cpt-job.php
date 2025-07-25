<?php

add_action('init', 'cb_register_post_type_job');
function cb_register_post_type_job() {
    register_post_type('cb-job', [
        'labels' => [
            'name' => 'Jobs',
            'singular_name' => 'Job',
            'add_new' => 'Add new',
            'add_new_item' => 'Add new job',
            'edit_item' => 'Edit job',
            'new_item' => 'New job',
            'view_item' => 'View job',
            'search_items' => 'Search jobs',
            'not_found' => 'Jobs not found',
            'not_found_in_trash' => 'Jobs not found in trash',
            'menu_name' => 'Jobs',
        ],
        'public' => true,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-clipboard',
        'show_in_menu' => 'cb-site-options-menu',
        'has_archive' => true,
        'rewrite' => ['slug' => 'vacancies'],
        'supports' => ['title', 'editor', 'excerpt', 'author'],
        'taxonomies' => ['cb-job-category', 'employment', 'english_level'],
    ]);
}

add_action('init', 'cb_register_taxonomies_for_jobs');
function cb_register_taxonomies_for_jobs() {
    register_taxonomy('cb-job-category', 'cb-job', [
        'labels' => [
            'name' => 'Job Categories',
            'singular_name' => 'Job Category',
            'search_items' => 'Search Job Categories',
            'all_items' => 'All Job Categories',
            'edit_item' => 'Edit Job Category',
            'update_item' => 'Update Job Category',
            'add_new_item' => 'Add New Job Category',
            'new_item_name' => 'New Job Category Name',
            'menu_name' => 'Job Categories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'job-category'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('employment', 'cb-job', [
        'labels' => [
            'name' => 'Employment Types',
            'singular_name' => 'Employment Type',
            'search_items' => 'Search Employment Types',
            'all_items' => 'All Employment Types',
            'edit_item' => 'Edit Employment Type',
            'update_item' => 'Update Employment Type',
            'add_new_item' => 'Add New Employment Type',
            'new_item_name' => 'New Employment Type Name',
            'menu_name' => 'Employment Types',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'employment'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('english_level', 'cb-job', [
        'labels' => [
            'name' => 'English Levels',
            'singular_name' => 'English Level',
            'search_items' => 'Search English Levels',
            'all_items' => 'All English Levels',
            'edit_item' => 'Edit English Level',
            'update_item' => 'Update English Level',
            'add_new_item' => 'Add New English Level',
            'new_item_name' => 'New English Level Name',
            'menu_name' => 'English Levels',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'english-level'],
        'show_in_rest' => true,
    ]);
}

add_action('pre_get_posts', 'cb_filter_jobs_by_taxonomies');
function cb_filter_jobs_by_taxonomies($query) {
    if (is_admin() || !$query->is_main_query()) return;

    if (is_post_type_archive('cb-job')) {
        $tax_query = [];

        if (!empty($_GET['cb-job-category'])) {
            $tax_query[] = [
                'taxonomy' => 'cb-job-category',
                'field' => 'slug',
                'terms' => array_map('sanitize_text_field', (array)$_GET['cb-job-category']),
                'operator' => 'IN',
            ];
        }

        if (!empty($_GET['employment'])) {
            $tax_query[] = [
                'taxonomy' => 'employment',
                'field' => 'slug',
                'terms' => array_map('sanitize_text_field', (array)$_GET['employment']),
                'operator' => 'IN',
            ];
        }

        if (!empty($_GET['english_level'])) {
            $tax_query[] = [
                'taxonomy' => 'english_level',
                'field' => 'slug',
                'terms' => array_map('sanitize_text_field', (array)$_GET['english_level']),
                'operator' => 'IN',
            ];
        }

        if (!empty($tax_query)) {
            if (count($tax_query) > 1) {
                $tax_query['relation'] = 'AND';
            }
            $query->set('tax_query', $tax_query);
        }
    }
}
