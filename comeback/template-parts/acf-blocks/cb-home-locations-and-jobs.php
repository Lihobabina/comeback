<?php
$locations = get_field('cb_home_locations');
$locations_button_text = get_field('cb_home_locations_button_text');
$locations_button_link = get_field('cb_home_locations_button_link');
$show_locations_button = get_field('cb_home_locations_show_locations_button'); 
$jobs_title = get_field('cb_home_jobs_title');
$jobs_button_text = get_field('cb_home_jobs_button_text');
$jobs_button_link = get_field('cb_home_jobs_button_link');
$jobs_query = new WP_Query([
    'post_type' => 'cb-job',
    'posts_per_page' => 6
]);

if($locations){
    wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', [], '11.0.5', true);
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css', [], '11.0.5', 'all');
}
?>

<section class="cb-home-locations-and-jobs<?= $locations ? ' has-locations' : '' ?>">

    <?= wp_get_attachment_image(get_field('cb_home_locations_overlay_top'), 'full', false, ['class' => 'cb-overlay-top']) ?>

    <?php if($locations): ?>
        <div class="cb-home-locations">
            <?php foreach($locations as $row){
                $slides = implode( '', array_map(function($city){
                    return sprintf(
                        '<div class="cb-item swiper-slide">%s%s</div>',
                        wp_get_attachment_image($city['image'],'thumbnail'),
                        $city['city']
                    );
                }, $row['cities']) );
                
                printf(
                    '<div class="swiper-container"><div class="swiper-wrapper">%s</div></div>',
                    $slides . $slides . $slides
                );
            } ?>
        </div>
    <?php endif; ?>
<?php
    if($show_locations_button && $locations_button_text) printf(
        '<div class="cb-container cb-home-locations-button-container"><a href="%s" class="cb-home-locations-button"><span>%s</span></a></div>',
        $locations_button_link ?: '#', $locations_button_text
    );
    ?>

    <div class="cb-container cb-home-jobs-container">
        <?php
        if($jobs_title) echo '<h2 class="cb-home-jobs-title cb-has-animation">' . $jobs_title . '</h2>';

        if( $jobs_query->have_posts() ) printf(
            '<div class="cb-home-jobs">%s</div>',
            implode( '', array_map(function($post){
                return sprintf(
                    '
                    <a href="%s" class="cb-home-job">
                        <h3 class="cb-home-job-title">%s</h3>
                        <p class="cb-home-job-excerpt">%s</p>
                        <div class="cb-home-job-states">%s</div>
                        <p class="cb-home-job-apply">Apply Now <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.9603 11.1409C15.18 11.3606 15.18 11.7167 14.9603 11.9363L9.22541 17.6712C9.00573 17.8909 8.64963 17.8909 8.42996 17.6712L8.16476 17.406C7.94508 17.1863 7.94508 16.8302 8.16476 16.6105L13.2367 11.5386L8.16476 6.46665C7.94508 6.24698 7.94508 5.89088 8.16476 5.6712L8.42996 5.406C8.64963 5.18633 9.00573 5.18633 9.22541 5.406L14.9603 11.1409Z" fill="white"/></svg></p>
                    </a>
                    ',
                    get_permalink($post->ID), $post->post_title,
                    $post->post_excerpt, implode( '', array_map(function($state){
                        return sprintf(
                            '<div class="cb-home-job-state">%s%s</div>',
                            wp_get_attachment_image($state['icon'], 'thumbnail'),
                            $state['state']
                        );
                    }, get_field('cb_job_states', $post->ID) ?: []) )
                );
            }, $jobs_query->posts) )
        );

        if($jobs_button_text) printf(
            '<a href="%s" class="cb-home-jobs-button"><span>%s<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 17.5L17 7.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 17.5L17 7.5" stroke="url(#paint0_linear_10_335)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 7.5H17V17.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 7.5H17V17.5" stroke="url(#paint1_linear_10_335)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><defs><linearGradient id="paint0_linear_10_335" x1="12" y1="7.5" x2="12" y2="17.5" gradientUnits="userSpaceOnUse"><stop stop-color="#335FFF"/><stop offset="1" stop-color="#1A4BFF"/></linearGradient><linearGradient id="paint1_linear_10_335" x1="12" y1="7.5" x2="12" y2="17.5" gradientUnits="userSpaceOnUse"><stop stop-color="#335FFF"/><stop offset="1" stop-color="#1A4BFF"/></linearGradient></defs></svg></span></a>',
            $jobs_button_link ?: '#', $jobs_button_text
        );
        ?>
    </div>

    <?= wp_get_attachment_image(get_field('cb_home_locations_overlay_bottom'), 'full', false, ['class' => 'cb-overlay-bottom']) ?>

</section>
