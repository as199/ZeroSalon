<?php 
	$about_img			= $instance['about_img'];
	$about_title 		= $instance['about_title'];
	$about_subtitle 	= $instance['about_subtitle'];
	$about_title_color 	= $instance['about_title_color'];
	$text_align			= $instance['text_align'];
	$button_type		= $instance['button_type'];
	$about_text_link	= $instance['about_text_link'];
	$about_link 		= $instance['about_link'];
	$about_button_color = $instance['about_button_color'];

	$about_img_anim = $instance['about_img_anim'];
	$about_desc_anim = $instance['about_desc_anim'];
	$anim_img_delay 	= $instance['anim_img_delay'];
	$anim_desc_delay 	= $instance['anim_desc_delay'];

?>

<!-- about -->
<?php 
$about_src = wp_get_attachment_image_src($about_img, 'full' ); 
$attr = array(
    'src' => $about_src[0],
); ?>

<div class="about clearfix">
	<!-- row -->
	<div class="row">
		<div class="col-md-6 text-center wow <?php echo sanitize_text_field( $about_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_img_delay ); ?>s">
		<?php if(!empty($about_img)) { ?>
			<img src="<?php echo esc_url( $about_src[0] ); ?>" alt="<?php echo sanitize_text_field( $about_title ); ?>">
		<?php } ?>
		</div>
		<div class="about-description col-md-6 <?php echo sanitize_text_field( $text_align ); ?> vertical-center wow <?php echo sanitize_text_field( $about_desc_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_desc_delay ); ?>s">
            <h3 class="title" style="color: <?php echo esc_html( $about_title_color ) ?>;"><?php echo sanitize_text_field( $about_title ); ?></h3>
			<div><?php echo balancetags( $about_subtitle ); ?></div>

		<?php if($button_type == 'default'){ ?>
			<a class="link" href="<?php echo esc_url( $about_link ); ?>" style="color: <?php echo esc_html( $about_button_color ) ?>; border-color: <?php echo esc_html( $about_button_color ) ?>;"><?php echo sanitize_text_field( $about_text_link ); ?></a>
		<?php }
		elseif($button_type == 'background'){ ?>
			<div class="button box light">
	            <a class="black-bg" href="<?php echo esc_url( $about_link ); ?>" style="background-color: <?php echo esc_html( $about_button_color ) ?>;"><?php echo sanitize_text_field( $about_text_link ); ?></a>
	        </div>
		<?php } ?>

		</div>
	</div>
</div>

<!-- about -->