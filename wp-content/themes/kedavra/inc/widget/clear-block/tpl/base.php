<?php 
	$clear_px			= $instance['clear_px'];
	$use_border			= $instance['use_border'];
	$border_type		= $instance['border_type'];
	$border_height		= $instance['border_height'];
	$border_color		= $instance['border_color'];
?>

<div class="clearfix clear-bord" style="margin: <?php echo sanitize_text_field( $clear_px ); ?>px 0px; <?php if($use_border == true){ ?> border: <?php echo sanitize_text_field( $border_height );?>px <?php echo sanitize_text_field( $border_type ); ?> <?php echo esc_html( $border_color ); } ?>"></div>