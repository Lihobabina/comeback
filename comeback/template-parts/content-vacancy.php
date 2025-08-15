<div class="cb-vacancy-item">
    <div class="cb-vacancy-content">
        <div class="cb-vacancy-header">
            <a href="<?php the_permalink(); ?>" class="cb-vacancy-title-link">
                <h3 class="cb-vacancy-title"><?php the_title(); ?></h3>
            </a>
            <a href="<?php the_permalink(); ?>" class="cb-vacancy-apply">Apply Now <svg width="24" height="24"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.9603 11.1428C15.18 11.3625 15.18 11.7186 14.9603 11.9383L9.22541 17.6731C9.00573 17.8928 8.64963 17.8928 8.42996 17.6731L8.16476 17.408C7.94508 17.1883 7.94508 16.8321 8.16476 16.6125L13.2367 11.5406L8.16476 6.46861C7.94508 6.24893 7.94508 5.89283 8.16476 5.67315L8.42996 5.40796C8.64963 5.18828 9.00573 5.18828 9.22541 5.40796L14.9603 11.1428Z"
                        fill="url(#paint0_linear_425_10619)" />
                    <defs>
                        <linearGradient id="paint0_linear_425_10619" x1="8" y1="11.5405" x2="15.125" y2="11.5405"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#335FFF" />
                            <stop offset="1" stop-color="#1A4BFF" />
                        </linearGradient>
                    </defs>
                </svg>
            </a>
        </div>

        <?php
$terms = get_the_terms(get_the_ID(), 'cb-job-category');
if ($terms && !is_wp_error($terms)) :
    foreach ($terms as $term) : ?>
        <span class="cb-vacancy-category"><?= esc_html($term->name); ?></span>
        <?php endforeach;
endif;
?>

       <?php 
$excerpt = get_the_excerpt();
if ($excerpt || have_rows('cb_job_states')): 
?>
        <div class="cb-vacancy-description-block">

            <?php if ($excerpt): ?>
            <div class="cb-vacancy-excerpt"><?= esc_html($excerpt); ?></div>
            <?php endif; ?>

            <?php if (have_rows('cb_job_states')): ?>
            <div class="cb-vacancy-meta">
                <?php while (have_rows('cb_job_states')): the_row(); 
          $icon = get_sub_field('icon');
          $state = get_sub_field('state');
        ?>
                <div class="cb-vacancy-meta-item">
                    <?php if (!empty($icon)): ?>
                    <img src="<?= esc_url($icon); ?>" alt="<?= esc_attr($state); ?>" class="cb-meta-icon">
                    <?php endif; ?>
                    <?php if ($state): ?>
                    <span class="cb-meta-text"><?= esc_html($state); ?></span>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="cb-vacancy-apply cb-vacancy-apply-mob">Apply Now <svg width="24"
                    height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.9603 11.1409C15.18 11.3606 15.18 11.7167 14.9603 11.9363L9.22541 17.6712C9.00573 17.8909 8.64963 17.8909 8.42996 17.6712L8.16476 17.406C7.94508 17.1863 7.94508 16.8302 8.16476 16.6105L13.2367 11.5386L8.16476 6.46665C7.94508 6.24698 7.94508 5.89088 8.16476 5.6712L8.42996 5.406C8.64963 5.18633 9.00573 5.18633 9.22541 5.406L14.9603 11.1409Z"
                        fill="url(#paint0_linear_570_7762)" />
                    <defs>
                        <linearGradient id="paint0_linear_570_7762" x1="8" y1="11.5386" x2="15.125" y2="11.5386"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#335FFF" />
                            <stop offset="1" stop-color="#1A4BFF" />
                        </linearGradient>
                    </defs>
                </svg>

            </a>
        </div>
        <?php endif; ?>

    </div>
</div>