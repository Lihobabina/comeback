<?php
$rear_text = get_field('cb_home_text_bars_rear_text');
$front_text = get_field('cb_home_text_bars_front_text');

if(!$rear_text && !$front_text) return;

?>

<section class="cb-home-text-bars">
    <?php
    if($rear_text) printf(
        '
        <div class="cb-rear-text-bar">
            <div class="cb-container">
                <p>%s</p>
            </div>
        </div>
        ',
        $rear_text
    );

    if($front_text) printf(
        '
        <div class="cb-front-text-bar">
            <div class="cb-container">
                <p>%s</p>
            </div>
        </div>
        ',
        $front_text
    );
    ?>
</section>
