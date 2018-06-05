<?php
	$image_file	= $instance['image_file'];
	
	$image_block_anim 	= $instance['image_block_anim'];
	$anim_image_delay 	= $instance['anim_image_delay'];

$src = wp_get_attachment_image_src($image_file, 'full' ); 
    $attr = array(
        'src' => $src[0],
    ); 
?>

<div class="big-image wow <?php echo sanitize_text_field( $image_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_image_delay ); ?>s">
	<img src="<?php echo esc_url( $src[0] ); ?>">
</div>