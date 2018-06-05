<?php 
	$about_item			= $instance['about_item'];

	$about2_img_anim 	= $instance['about2_img_anim'];
	$anim_img_delay 	= $instance['anim_img_delay'];
	$about2_desc_anim 	= $instance['about2_desc_anim'];
	$anim_desc_delay 	= $instance['anim_desc_delay'];
?>

<div class="about-twoside" class="architect clearfix">
	
	<?php foreach( $about_item as $i => $about2 ) :  
	$src = wp_get_attachment_image_src($about2['about2_img'], 'full' ); 
	$alt = get_post_meta($about2['about2_img'], '_wp_attachment_image_alt', true);
        $attr = array(
            'src' => $src[0],
        );
         ?>

	<div class="full-width-container about-us">
		<div class="container">
		<?php if(!empty($about2['about2_img'])){ ?>
			<div class="image-thumbnail col-md-6 no-padding wow <?php echo sanitize_text_field( $about2_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_img_delay ); ?>s">
				<img src="<?php echo esc_url( $src[0] ); ?>" alt="<?php echo sanitize_text_field( $alt ); ?>" width="800">
				<h4><?php echo sanitize_text_field( $alt ); ?></h4>
			</div>
		<?php } ?>

			<div class="content vertical-center col-md-6 no-padding <?php echo sanitize_text_field($about2['text_align']) ?> wow <?php echo sanitize_text_field( $about2_desc_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_img_delay ); ?>s">
				<h3 class="title architect" style="color: <?php echo sanitize_text_field($about2['about2_title_color']) ?>;"><?php echo sanitize_text_field($about2['about2_title']) ?></h3>
				<div style="color: <?php echo sanitize_text_field($about2['about2_desc_color']) ?>;"><?php echo balancetags($about2['about2_desc']); ?></div>
			</div>
		</div>
	</div>

	<?php endforeach; ?>

</div>
<!-- section -->