<?php 

$upload_dir = wp_upload_dir();
$base_dir   = trailingslashit($upload_dir['basedir']);
$base_url   = trailingslashit($upload_dir['baseurl']);


add_action('wp_ajax_cb_apply_form_submit', 'cb_handle_apply_form');
add_action('wp_ajax_nopriv_cb_apply_form_submit', 'cb_handle_apply_form');

function cb_handle_apply_form() {
    if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'cb_form_nonce')) {
        wp_send_json_error('Security check failed.');
    }

    $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    $source  = isset($_POST['source']) ? sanitize_text_field($_POST['source']) : 'none';
    $position = isset($_POST['position']) ? sanitize_text_field($_POST['position']) : '';
    $vacancy  = isset($_POST['vacancy_relationship']) ? intval($_POST['vacancy_relationship']) : 0;

    if (empty($name) || empty($email) || !is_email($email)) {
        wp_send_json_error('Invalid form data.');
    }


    $post_id = wp_insert_post([
        'post_type'   => 'job_reviews',
        'post_title'  => $name . ' - ' . current_time('mysql'),
        'post_status' => 'publish',
    ]);
  
   if (is_wp_error($post_id)) {
        wp_send_json_error('Failed to save application.');
    }

    $cv_result = save_uploaded_file_as_attachment('cv_file', 'cv', $post_id);
    if (is_wp_error($cv_result)) {
        wp_send_json_error($cv_result->get_error_message());
    }
    $cv_url = $cv_result;

    // Save Video
    $video_result = save_uploaded_file_as_attachment('video_file', 'video', $post_id);
    if (is_wp_error($video_result)) {
        wp_send_json_error($video_result->get_error_message());
    }
    $video_url = $video_result;


    update_field('name', $name, $post_id);
    update_field('email', $email, $post_id);
    update_field('message', $message, $post_id);
    update_field('position', $position, $post_id);
    update_field('source', $source, $post_id);
    update_field('vacancy_relationship', $vacancy, $post_id); 
    update_field('cv', $cv_url, $post_id);
    update_field('video', $video_url, $post_id);

    wp_send_json_success();
}

function save_uploaded_file_as_attachment($file_field, $subdir_prefix, $parent_post_id = 0) {
    $upload_dir = wp_upload_dir();
    $base_dir   = trailingslashit($upload_dir['basedir']);
    $base_url   = trailingslashit($upload_dir['baseurl']);

    if (empty($_FILES[$file_field]) || !is_uploaded_file($_FILES[$file_field]['tmp_name'])) {
        return '';
    }

    $subdir     = trailingslashit($subdir_prefix);
    $dir_path   = $base_dir . $subdir;

    if (!is_dir($dir_path)) {
        wp_mkdir_p($dir_path);
    }

    $original_name = sanitize_file_name($_FILES[$file_field]['name']);
    $unique_name   = uniqid($file_field . '_') . '-' . $original_name;
    $target_path   = $dir_path . $unique_name;

    if (!move_uploaded_file($_FILES[$file_field]['tmp_name'], $target_path)) {
        return new WP_Error('upload_failed', ucfirst($file_field) . ' upload failed.');
    }

    $file_url  = $base_url . $subdir . $unique_name;
    $filetype  = wp_check_filetype($unique_name, null);

    $attachment = [
        'guid'           => $file_url,
        'post_mime_type' => $filetype['type'],
        'post_title'     => preg_replace('/\.[^.]+$/', '', $original_name),
        'post_content'   => '',
        'post_status'    => 'inherit',
        'post_parent'    => $parent_post_id,
    ];

    $attach_id = wp_insert_attachment($attachment, $target_path, $parent_post_id);

    require_once ABSPATH . 'wp-admin/includes/image.php';
    $attach_data = wp_generate_attachment_metadata($attach_id, $target_path);
    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;
}

?>