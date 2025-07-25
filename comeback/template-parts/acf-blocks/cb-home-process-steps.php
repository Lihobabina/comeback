<?php
$title = get_field('cb_home_process_steps_title');
$steps = get_field('cb_home_process_steps');
?>

<section class="cb-home-process-steps">
    <div class="cb-container">
        <?php
        if($title) echo '<h2 class="cb-home-process-steps-title cb-has-animation">' . $title . '</h2>';

        if($steps):
        ?>
            <div class="cb-process-steps">
                <?php
                foreach($steps as $key => $step){
                    printf(
                        '
                        <div class="cb-process-step">
                            <p class="cb-process-step-number">%d</p>
                            <h3 class="cb-process-step-title">%s</h3>
                        </div>
                        ',
                        $key + 1, $step['title']
                    );
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
