<?php
add_action('wp_ajax_cb_filter_vacancies', 'cb_filter_vacancies_callback');
add_action('wp_ajax_nopriv_cb_filter_vacancies', 'cb_filter_vacancies_callback');

function cb_filter_vacancies_callback() {
  $args = [
    'post_type' => 'cb-job',
    'posts_per_page' => -1,
  ];

  if (!empty($_POST['search'])) {
    $args['s'] = sanitize_text_field($_POST['search']);
  }

  $tax_query = [];

  if (!empty($_POST['categories'])) {
    $tax_query[] = [
      'taxonomy' => 'cb-job-category',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', (array) $_POST['categories']),
      'operator' => 'IN',
    ];
  }

  if (!empty($_POST['employment'])) {
    $tax_query[] = [
      'taxonomy' => 'employment',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', (array) $_POST['employment']),
      'operator' => 'IN',
    ];
  }

  if (!empty($_POST['english_level'])) {
    $tax_query[] = [
      'taxonomy' => 'english_level',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', (array) $_POST['english_level']),
      'operator' => 'IN',
    ];
  }

  if ($tax_query) {
    if (count($tax_query) > 1) {
      $tax_query['relation'] = 'AND';
    }
    $args['tax_query'] = $tax_query;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    ob_start();
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/content', 'vacancy');
    }
    wp_send_json_success(ob_get_clean());
  } else {
    wp_send_json_success('<p>No vacancies found.</p>');
  }

  wp_die();
}
