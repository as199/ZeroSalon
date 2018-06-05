<?php
$skill_title     = $instance['skill_title']; 

$skill_block_anim   = $instance['skill_block_anim'];
$skill_block_delay  = $instance['skill_block_delay'];
?>

<!-- SKILL
============================================= -->
<div class="skill-block skill">
    <div class="ourskill-block wow <?php echo sanitize_text_field( $skill_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $skill_block_delay ); ?>s">
    <h3><?php echo sanitize_text_field( $skill_title ); ?> </h3>

    <?php foreach( $instance['skill_bar'] as $i => $skill ) : ?>
        
        <div class="skills-barrow clearfix">
            <div class="skills-title"><?php echo sanitize_text_field($skill['skill_name']) ?> 
                <span class="skill-bar-percent bar-perce"><?php echo sanitize_text_field($skill['skill_number']) ?> / 100</span>
            </div>
            <div class="skills-bar" data-percent="<?php echo sanitize_text_field($skill['skill_number']) ?>%">
                <div class="bar" style="background: <?php echo esc_html($skill['skill_color']) ?>;"></div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
    <script type="text/javascript">
    jQuery('.skills-bar').each(function() {
        jQuery(this).find('.bar').animate({
            width: jQuery(this).attr('data-percent')
        }, 6000);
    });
</script>
</div>
<!-- skill end -->