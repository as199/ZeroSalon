<?php 
	$program_item			= $instance['program_item'];
?>

<div class="programs-list">
<?php foreach( $program_item as $i => $program ) : 

	$service_img_anim 	= $program['service_img_anim'];
	$service_img_delay 	= $program['service_img_delay'];

	$service_desc_anim 	= $program['service_desc_anim'];
	$service_desc_delay = $program['service_desc_delay'];
?>
	<div class="row">
		<?php 
		$program_src = wp_get_attachment_image_src($program['program_img'], 'full' ); 
		$attr = array(
		    'src' => $program_src[0],
		); ?>
		<div class="col-md-6 text-center wow <?php echo sanitize_text_field( $service_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $service_img_delay ); ?>s">
			<img src="<?php echo esc_url( $program_src[0] ); ?>" alt="<?php echo sanitize_text_field( $program['program_title'] ); ?>">
		</div>
		<div class="info vertical-center col-md-6 wow <?php echo sanitize_text_field( $service_desc_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $service_desc_delay ); ?>s">
			<h4 class="name <?php echo sanitize_text_field( $program['title_text_align'] ); ?>" style="color: <?php echo esc_html( $program['service_title_color'] ); ?>;"><?php echo sanitize_text_field( $program['program_title'] ); ?></h4>
			<h4 class="price <?php echo sanitize_text_field( $program['title_text_align'] ); ?>" style="color: <?php echo esc_html( $program['service_price_color'] ); ?>;"><?php echo sanitize_text_field( $program['program_price'] ); ?></h4>
			<p class="text <?php echo sanitize_text_field( $program['text_align'] ); ?>" style="color: <?php echo esc_html( $program['service_subtitle_color'] ); ?>;"><?php echo balancetags( $program['program_desc'] ); ?></p>

		</div>
	</div>
<?php endforeach; ?>
</div>