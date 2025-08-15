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

  $html = '';
  $active_terms = [
    'cb-job-category' => [],
    'employment' => [],
    'english_level' => []
  ];

  if ($query->have_posts()) {
    ob_start();
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/content', 'vacancy');

      foreach ($active_terms as $taxonomy => &$list) {
        $terms = get_the_terms(get_the_ID(), $taxonomy);
        if ($terms && !is_wp_error($terms)) {
          foreach ($terms as $term) {
            $list[] = $term->slug;
          }
        }
      }
    }
    $html = ob_get_clean();
  } else {
    $html = '<p>No vacancies found.</p>';
  }

  foreach ($active_terms as &$list) {
    $list = array_unique($list);
  }

  wp_send_json_success([
    'html' => $html,
    'active_terms' => $active_terms
  ]);

  wp_die();
}
