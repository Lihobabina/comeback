<?php
add_action('wp_ajax_cb_send_form', 'cb_handle_form_submission');
add_action('wp_ajax_nopriv_cb_send_form', 'cb_handle_form_submission');

function cb_handle_form_submission() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cb_form_nonce')) {
    wp_send_json_error(['message' => 'Security check failed']);
    wp_die();
  }

  $name     = sanitize_text_field($_POST['name'] ?? '');
  $email    = sanitize_email($_POST['email'] ?? '');
  $position = sanitize_text_field($_POST['position'] ?? '');
  $message  = sanitize_textarea_field($_POST['message'] ?? '');

  if (!$name || !$email || !$position) {
    wp_send_json_error(['message' => 'Please fill out all required fields.']);
    wp_die();
  }

  $to      = 'ceo@comebackagency.com';
  $subject = "New Form Submission from $name";
  $body    = "Name: $name\nEmail: $email\nPosition: $position\nMessage:\n$message";

  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: Comeback Agency <info@comeback2.host>',
    'Reply-To: ' . $email
  ];

  $attachments = [];
  if (!empty($_FILES['attachment'])) {
    $file_array = reformat_files_array($_FILES['attachment']);
    foreach ($file_array as $file) {
      if ($file['error'] === 0) {
        $uploaded = wp_handle_upload($file, ['test_form' => false]);
        if (!isset($uploaded['error'])) {
          $attachments[] = $uploaded['file'];
        }
      }
    }
  }

  $sent = wp_mail($to, $subject, $body, $headers, $attachments);

  if ($sent) {
    wp_send_json_success(['message' => 'Message sent successfully.']);
  } else {
    wp_send_json_error(['message' => 'Failed to send email.']);
  }

  wp_die();
}

function reformat_files_array($file_post) {
  $file_ary = [];
  $file_count = count($file_post['name']);
  $file_keys = array_keys($file_post);

  for ($i = 0; $i < $file_count; $i++) {
    foreach ($file_keys as $key) {
      $file_ary[$i][$key] = $file_post[$key][$i];
    }
  }

  return $file_ary;
}
