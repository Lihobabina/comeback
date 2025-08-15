<?php

define( 'COMEBACK_THEME_URL', get_stylesheet_directory_uri() );
define( 'COMEBACK_THEME_DIR', get_stylesheet_directory() );

require_once COMEBACK_THEME_DIR . '/inc/theme-hooks.php';
require_once COMEBACK_THEME_DIR . '/inc/theme-functions.php';
require_once COMEBACK_THEME_DIR . '/inc/cpt-job.php';
require_once COMEBACK_THEME_DIR . '/inc/cpt-job-reviews.php';
require_once COMEBACK_THEME_DIR . '/inc/ajax/job-reviews-handler.php';
require_once COMEBACK_THEME_DIR . '/inc/ajax/filter-vacancies.php';
require_once COMEBACK_THEME_DIR . '/inc/ajax/forms/cb-form-handler.php';
require_once COMEBACK_THEME_DIR . '/inc/ajax/forms/cb-subscription-form-handler.php';

add_theme_support( 'title-tag' );

add_action('phpmailer_init', function($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'mail.adm.tools';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Username   = 'no-reply@comeback.ua';
    $phpmailer->Password   = 'AnZk4X435y';
	$phpmailer->Port       = 465;
	$phpmailer->SMTPSecure = 'ssl';
    $phpmailer->From       = 'no-reply@comeback.ua';
    $phpmailer->FromName   = 'Comeback Agency';
    $phpmailer->SMTPAutoTLS = true;
});


?>
