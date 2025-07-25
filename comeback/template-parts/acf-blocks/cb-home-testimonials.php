<?php
$title = get_field('cb_home_testimonials_title');
$text = get_field('cb_home_testimonials_text');
$testimonials = get_field('cb_home_testimonials');

if($testimonials){
    wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', [], '11.0.5', true);
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css', [], '11.0.5', 'all');
}
?>

<section class="cb-home-testimonials">
    <div class="cb-container">
        <?php
        if( get_field('cb_home_testimonials_show_image_or_animation') ){
            $animation_group = get_field('cb_home_testimonials_animation');
            $animation_group_image_outputs = $animation_group['gallery'] ? array_map(function($image_id){
                return '<div class="swiper-slide">' . wp_get_attachment_image($image_id) . '</div>';
            }, $animation_group['gallery']) : [];

            printf(
                '
                <div class="cb-home-testimonials-animation-group">
                    %s
                    <div class="cb-icon-container"><div class="cb-icon-wrapper"><svg width="46" height="48" viewBox="0 0 46 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.488 35.9758C33.5867 35.8411 31.7382 35.3852 29.8685 35.064C25.8501 34.3801 21.9396 33.2506 18.0186 32.1626C14.0687 31.0487 10.0739 29.9633 6.37152 28.1162C4.26488 27.0645 2.22933 25.8547 1.06804 23.7305C-0.485606 20.881 -0.480339 18.262 1.97654 15.1689C4.51241 11.9774 8.03314 10.0682 11.6381 8.33255C15.2634 6.60824 18.991 5.10043 22.8007 3.81731C24.3807 3.2733 25.9949 2.82773 27.5933 2.33295C27.7224 2.2915 27.8409 2.22155 28.0199 2.39253C27.6355 2.65158 27.2721 2.93653 26.885 3.16968C24.8099 4.48825 23.2773 6.31714 21.8817 8.28334C19.5512 11.5707 18.7217 15.2285 19.0219 19.1764C19.151 20.881 20.1674 22.2177 21.0074 23.6165C22.7744 26.5697 25.3182 28.7975 28.0805 30.8104C30.5031 32.59 33.0048 34.2609 35.4774 35.9732L35.488 35.9758ZM7.55651 30.085C7.57494 30.3026 7.76191 30.3959 7.90411 30.5202C11.698 33.8047 15.7688 36.766 20.0726 39.372C23.681 41.5698 27.4024 43.5827 31.222 45.4027C33.3892 46.4389 35.538 47.5994 37.9975 47.8922C40.1042 48.1512 42.1265 48.0061 43.9356 46.7731C46.3978 45.097 46.7111 42.0765 44.5781 40.2139C43.4702 39.2575 42.1427 38.5801 40.7098 38.2399C37.0021 37.3307 33.1917 36.9809 29.4366 36.3178C25.4867 35.6183 21.6184 34.6029 17.7606 33.5252C14.2951 32.559 10.8587 31.4994 7.54598 30.0824L7.55651 30.085ZM28.7125 10.4283C31.2563 9.52678 33.9133 9.0294 36.5176 8.35587C38.2187 7.90771 39.9067 7.49323 41.1917 6.15135C42.8849 4.37945 42.303 0.970341 39.8303 0.278676C38.5862 -0.0609825 37.2758 -0.0903629 36.0173 0.19319C33.1206 0.801958 30.6585 2.33295 28.2701 3.94165C25.8158 5.59439 23.9488 7.84295 22.3452 10.2806C20.9837 12.353 20.3833 14.6845 20.2385 17.1765C22.2504 13.8814 25.1128 11.7054 28.7125 10.4283Z" fill="white"/></svg></div></div>
                    %s
                </div>
                ',
                $animation_group_image_outputs ? sprintf(
                    '<div class="swiper-container"><div class="swiper-wrapper">%s</div></div>',
                    implode( '', array_merge( ...array_fill(0, 3, $animation_group_image_outputs) ) )
                ) : '',
                $animation_group['title'] ? '<div class="cb-title-container"><div class="cb-title-wrapper"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 22C17.5229 22 22 17.5229 22 12C22 6.47715 17.5229 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5229 6.47715 22 12 22Z" stroke="#3385FF" stroke-width="2" stroke-linejoin="round"/><path d="M15.5 9V9.5" stroke="#3385FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.5 9V9.5" stroke="#3385FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.5 15.5C15.5 15.5 14.5 17.5 12 17.5C9.5 17.5 8.5 15.5 8.5 15.5" stroke="#3385FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg><p>' . $animation_group['title'] . '</p></div></div>' : ''
            );
        } else {
            echo wp_get_attachment_image(get_field('cb_home_testimonials_image'), 'full', false, ['class' => 'cb-home-testimonials-image']);
        }
        
        if($title) echo '<h2 class="cb-home-testimonials-title cb-has-animation">' . $title . '</h2>';
        if($text) echo '<p class="cb-home-testimonials-text">' . $title . '</p>';
        ?>
    </div>

    <?php if($testimonials): ?>
        <div class="cb-testimonials swiper-container">
            <div class="swiper-wrapper">
                <?php
                $star_svg = '<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.13163 1.02052C8.51547 0.348417 9.48453 0.348416 9.86837 1.02052L11.974 4.70742C12.1161 4.95637 12.3583 5.13233 12.639 5.19062L16.7961 6.05383C17.5539 6.21119 17.8534 7.13282 17.3328 7.70556L14.477 10.8474C14.2842 11.0596 14.1917 11.3443 14.223 11.6292L14.6866 15.8496C14.7712 16.619 13.9872 17.1886 13.2816 16.8705L9.41103 15.1253C9.14968 15.0075 8.85032 15.0075 8.58897 15.1253L4.71841 16.8705C4.01283 17.1886 3.22884 16.619 3.31336 15.8496L3.77702 11.6292C3.80832 11.3443 3.71582 11.0596 3.52299 10.8474L0.667195 7.70556C0.146599 7.13282 0.446055 6.21119 1.20387 6.05383L5.36099 5.19062C5.64169 5.13233 5.88387 4.95637 6.02605 4.70742L8.13163 1.02052Z" fill="#FFD029"/></svg>';

                foreach($testimonials as $testimonial){
                    printf(
                        '
                        <div class="cb-testimonial swiper-slide">
                            <p class="cb-testimonial-text">%s</p>
                            <div class="cb-testimonial-profile">
                                %s
                                <div class="cb-testimonial-profile-info">
                                    <h3 class="cb-testimonial-profile-name">%s</h3>
                                    <p class="cb-testimonial-profile-job">%s</p>
                                </div>
                                <div class="cb-testimonial-profile-rating" data-rating="%d">
                                    %s
                                </div>
                            </div>
                        </div>
                        ',
                        $testimonial['text'],
                        wp_get_attachment_image($testimonial['profile_image'], 'thumbnail', false, ['class' => 'cb-testimonial-profile-image']),
                        $testimonial['profile_name'],
                        $testimonial['profile_job'],
                        $testimonial['profile_rating'],
                        $star_svg . $star_svg . $star_svg . $star_svg . $star_svg
                    );
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    <?php endif; ?>
</section>
