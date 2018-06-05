<?php 
    $html_text     		= $instance['html_text'];

	$text_align 		= $instance['text_align'];
	$html_block_anim 	= $instance['html_block_anim'];
	$anim_html_delay 	= $instance['anim_html_delay'];
?>

<div class="html-content wow <?php echo sanitize_text_field( $text_align ); ?> <?php echo sanitize_text_field( $html_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_html_delay ); ?>s">
	<?php echo balancetags( $html_text ); ?>
</div>