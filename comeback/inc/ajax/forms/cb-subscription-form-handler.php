<?php
add_action('wp_ajax_cb_send_subscription_form', 'cb_handle_subscription_form');
add_action('wp_ajax_nopriv_cb_send_subscription_form', 'cb_handle_subscription_form');

function cb_handle_subscription_form() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cb_form_nonce')) {
    wp_send_json_error(['message' => 'Security check failed']);
    wp_die();
  }

  $email = sanitize_email($_POST['email'] ?? '');
  $checkboxes = isset($_POST['checkboxes']) ? sanitize_text_field(implode(', ', $_POST['checkboxes'])) : '';

  if (!$email) {
    wp_send_json_error(['message' => 'Please provide a valid email address.']);
    wp_die();
  }

  $to      = 'ceo@comebackagency.com';
  $subject = 'New Subscription from ' . $email;
  $message = "Email: $email\nSelected Options: $checkboxes";

  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: Comeback Agency <no-reply@comeback.ua>',
  ];

  $sent = wp_mail($to, $subject, $message, $headers);

  if ($sent) {
    wp_send_json_success(['message' => 'Your subscription was successful.']);
  } else {
    wp_send_json_error(['message' => 'Failed to send subscription email.']);
  }

  wp_die();
}
