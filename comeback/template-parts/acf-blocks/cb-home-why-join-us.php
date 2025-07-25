<?php
$title = get_field('cb_home_why_join_us_title');
$text = get_field('cb_home_why_join_us_text');
$items = get_field('cb_home_why_join_us_items');
?>

<section class="cb-home-why-join-us">
    <?= wp_get_attachment_image(get_field('cb_home_why_join_us_overlay_top'), 'full', false, ['class' => 'cb-overlay-top']) ?>

    <div class="cb-home-why-join-us-bg-items">
        <span class="cb-home-why-join-us-bg-item"></span>
        <span class="cb-home-why-join-us-bg-item"></span>
        <span class="cb-home-why-join-us-bg-item"></span>
        <span class="cb-home-why-join-us-bg-item"></span>
        <span class="cb-home-why-join-us-bg-item"></span>
    </div>

    <div class="cb-container">
        <?php
        if($title) echo '<h2 class="cb-home-why-join-us-title cb-has-animation">' . $title . '</h2>';
        if($text) echo '<p class="cb-home-why-join-us-text">' . $text . '</p>';

        if($items){
            echo '<div class="cb-home-why-join-us-items">';

            foreach($items as $item){
                printf(
                    '
                    <div class="cb-home-why-join-us-item">
                        %s
                        <h3 class="cb-home-why-join-us-item-title">%s</h3>
                        <p class="cb-home-why-join-us-item-text">%s</p>
                    </div>
                    ',
                    wp_get_attachment_image($item['image'], 'thumbnail', false, ['class' => 'cb-home-why-join-us-item-image']),
                    $item['title'], $item['text']
                );
            }

            echo '</div>';
        }
        ?>
    </div>

    <?= wp_get_attachment_image(get_field('cb_home_why_join_us_overlay_bottom'), 'full', false, ['class' => 'cb-overlay-bottom']) ?>
</section>
