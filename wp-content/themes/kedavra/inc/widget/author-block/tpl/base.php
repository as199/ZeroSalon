<?php 
	$author_img			= $instance['author_left']['author_img'];
	$author_title_left	= $instance['author_left']['author_title'];
	$author_name		= $instance['author_left']['author_name'];
	$author_job			= $instance['author_left']['author_job'];
	$author_text_color	= $instance['author_left']['author_text_color'];

	$author_sign_img	= $instance['author_right']['sign_img'];
	$author_title_right	= $instance['author_right']['author_title_right'];
	$author_subtitle	= $instance['author_right']['author_subtitle_right'];
	$author_desc		= $instance['author_right']['author_desc'];
	$author_text_align	= $instance['author_right']['text_align'];
	$author_textright_color	= $instance['author_right']['author_textright_color'];


	$author_left_anim 	= $instance['author_left']['author_left_anim'];
	$author_left_delay 	= $instance['author_left']['author_left_delay'];
	$author_right_anim 	= $instance['author_right']['author_right_anim'];
	$author_right_delay = $instance['author_right']['author_right_delay'];

	$authorimg = wp_get_attachment_image_src($author_img, 'full' ); 
	$author_signimg = wp_get_attachment_image_src($author_sign_img, 'full' ); 
?>

<!-- section-intro -->
<div class="section-intro">
	<div class="full-width-container about-us right-text">
		<div class="container">
		<?php if(!empty($authorimg)){ ?>
			<div class="image-thumbnail col-md-6 no-padding wow <?php echo sanitize_text_field( $author_left_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $author_left_delay ); ?>s">
				<img src="<?php echo esc_url( $authorimg[0] ); ?>" alt="author-img-block" width="800">
				<div class="left-content">
					<h3 style="color: <?php echo esc_html( $author_text_color ); ?>"><?php echo sanitize_text_field( $author_title_left ); ?></h3>
					<h3 class="bold" style="color: <?php echo esc_html( $author_text_color ); ?>"><?php echo sanitize_text_field( $author_name ); ?></h3>
					<div class="with-border-bottom" style="background-color: <?php echo esc_html( $author_text_color ); ?>"></div>
					<p style="color: <?php echo esc_html( $author_text_color ); ?>; opacity: 0.7;"><?php echo sanitize_text_field( $author_job ); ?></p>
				</div>
			</div>
		<?php } ?>

			<div class="content vertical-center col-md-6 no-padding <?php echo sanitize_text_field( $author_text_align ); ?> wow <?php echo sanitize_text_field( $author_right_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $author_right_delay ); ?>s">
				<h1 class="title" style="color: <?php echo esc_html( $author_textright_color ); ?>"><?php echo sanitize_text_field( $author_title_right ); ?></h1>
				<?php if($author_text_align == 'text-center'){ ?>
					<div class="with-border-bottom" style="background-color: <?php echo esc_html( $author_textright_color ); ?>; margin: 10px auto 15px;"></div>
				<?php }
				elseif($author_text_align == 'text-right'){ ?>
					<div class="with-border-bottom" style="background-color: <?php echo esc_html( $author_textright_color ); ?>; margin: 10px 0 15px auto;"></div>
				<?php }
				elseif($author_text_align == 'text-left'){ ?>
					<div class="with-border-bottom" style="background-color: <?php echo esc_html( $author_textright_color ); ?>; margin: 10px 0 15px;"></div>
				<?php } ?>
				<h3 style="color: <?php echo esc_html( $author_textright_color ); ?>"><?php echo sanitize_text_field( $author_subtitle ); ?></h3>
				<div class="short-brief">
					<div><?php echo balancetags( $author_desc ); ?></div>
				<?php if(!empty($author_signimg)){ ?>
					<img src="<?php echo esc_url( $author_signimg[0] ); ?>" alt="author-sign" width="200">
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- section-intro -->