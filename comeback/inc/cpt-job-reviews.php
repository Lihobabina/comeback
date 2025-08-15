<?php
add_action('init', 'register_job_reviews_post_type');
function register_job_reviews_post_type() {
    $labels = array(
        'name' => 'Job Reviews',
        'singular_name' => 'Job Review',
        'add_new' => 'Add New Review',
        'add_new_item' => 'Add New Job Review',
        'edit_item' => 'Edit Job Review',
        'new_item' => 'New Job Review',
        'all_items' => 'All Job Reviews',
        'view_item' => 'View Job Review',
        'search_items' => 'Search Job Reviews',
        'not_found' => 'No reviews found',
        'not_found_in_trash' => 'No reviews found in trash',
        'menu_name' => 'Job Reviews'
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-format-status',
        'menu_position' => 25,
        'supports' => array('title', 'custom-fields'),
        'show_in_rest' => true
    );

    register_post_type('job_reviews', $args);
}
?>
