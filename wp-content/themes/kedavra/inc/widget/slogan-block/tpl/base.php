<?php 
	$slogan_title 		= $instance['slogan_title'];
	$slogan_subtitle 	= $instance['slogan_subtitle'];
	$text_align			= $instance['text_align'];
	$slogan_text_link	= $instance['slogan_text_link'];
	$slogan_link 		= $instance['slogan_link'];
	$slogan_text_color 	= $instance['slogan_text_color'];
	$slogan_button_color = $instance['slogan_button_color'];

    $slogan_overlay_color  = $instance['slogan_overlay_color'];
    $overlay_level         = $instance['overlay_level'];

    $slogan_block_anim 	 = $instance['slogan_block_anim'];
    $slogan_block_delay  = $instance['slogan_block_delay'];
?>

<!-- section -->
<div class="featured featured-bg">
	<div class="overlay" style="background-color: <?php echo esc_html( $slogan_overlay_color ); ?>; opacity: <?php echo sanitize_text_field( $overlay_level ); ?>">
		<div class="container">
			<div class="border">
				<div class="vertical-center">
					<div class="content wow <?php echo sanitize_text_field( $slogan_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $slogan_block_delay ); ?>s">
						<h3 class="title" style="color: <?php echo esc_html( $slogan_text_color ) ?>;"><?php echo sanitize_text_field( $slogan_title ); ?></h3>
						<div class="text" style="color: <?php echo esc_html( $slogan_text_color ) ?>;"><?php echo balancetags( $slogan_subtitle ); ?></div>
						<a class="link" href="<?php echo esc_url( $slogan_link ); ?>" style="color: <?php echo esc_html( $slogan_button_color ) ?>; border-color: <?php echo esc_html( $slogan_button_color ) ?>;"><?php echo sanitize_text_field( $slogan_text_link ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- section -->
<script type="text/javascript">
    jQuery(document).ready(function() {

         var sloganHeight = jQuery('.featured.featured-bg .content').height();

            jQuery('.featured.featured-bg').css('height', sloganHeight + 260);
       
    });
</script>