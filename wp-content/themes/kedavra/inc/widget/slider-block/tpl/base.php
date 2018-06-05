<?php 

$heroslider_overlay_color	= $instance['heroslider_overlay_color'];
$overlay_level				= $instance['overlay_level'];

$section_to_link			= $instance['section_to_link']; 
$slider_type				= $instance['slider_type']; 

if($slider_type == 'style1'){ ?>
<div class="home-slider salon fullscreen">
	<div class="flexslider">
		<ul class="slides">
		<?php foreach( $instance['heroslider1_item'] as $i => $slide ) :

			$heroslide_img		= $slide['heroslider_img'];
			$heroslide_title 	= $slide['heroslider_title'];
			$heroslide_subtitle = $slide['heroslider_subtitle'];

			$slide1_animation_anim 	= $slide['slide1_animation_anim'];
			$slide1_animation_delay = $slide['slide1_animation_delay'];

			$heroslideurl = wp_get_attachment_image_src($heroslide_img, 'full' ); 
		?>
			<li style="background-image: url(<?php echo esc_url( $heroslideurl[0] ); ?>)">
				<div class="overlay" style="background-color: <?php echo esc_html( $heroslider_overlay_color ); ?>; opacity: <?php echo sanitize_text_field( $overlay_level ); ?>">
					<!-- container --> 
					<div class="container">
						<div class="border">
							<div class="content vertical-center">
								<h1 class="title wow <?php echo sanitize_text_field( $slide1_animation_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $slide1_animation_delay ); ?>s"><?php echo sanitize_text_field( $heroslide_title ); ?></h1>
								<div class="text-hero salon wow <?php echo sanitize_text_field( $slide1_animation_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $slide1_animation_delay ); ?>s"><?php echo balancetags( $heroslide_subtitle ); ?></div>
							</div>      
						</div>
					</div>
					<!-- container -->
				</div>
			</li>
		<?php endforeach; ?>
		</ul>

		<?php if(!empty($section_to_link)) { ?>
		<!-- container -->
			<div class="buttons container">
				<div class="col-md-12">
					<div class="scroll"></div>
				</div>
			</div>
		 <!-- container -->
		 <?php } ?>
	</div>
</div>
<!-- section -->
 <script type="text/javascript">
jQuery(".home-slider .scroll").click(function(){
        jQuery('html,body').stop().animate({scrollTop: jQuery("<?php echo sanitize_text_field( $section_to_link ); ?>").position().top - 80}, 'slow');
    });
</script>
<?php } 

if($slider_type == 'style2'){ ?>
<!-- section -->
<section class="home-slider architect">
    <div class="flexslider">
        <ul class="slides">
        <?php foreach( $instance['heroslider2_item'] as $i => $slide2 ) :

        	$heroslide_img		= $slide2['heroslider_img'];
			$heroslide_title 	= $slide2['heroslider_title'];
			$heroslide_button 	= $slide2['heroslider_button'];
			$heroslide_link 	= $slide2['heroslider_link'];

			$slide2_animation_anim 	= $slide2['slide2_animation_anim'];
			$slide2_animation_delay = $slide2['slide2_animation_delay'];

        	$heroslideurl = wp_get_attachment_image_src($heroslide_img, 'full' ); 
			?>
            <li style="background-image: url(<?php echo esc_url( $heroslideurl[0] ); ?>)">
                <div class="overlay">
                    <!-- container --> 
                    <div class="container">
                        <div class="slider-wrapper">
                            <div class="content vertical-center">
                                <div class="title wow <?php echo sanitize_text_field( $slide2_animation_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $slide2_animation_delay ); ?>s"><?php echo balancetags( $heroslide_title ); ?></div>
                                <div class="button box light wow <?php echo sanitize_text_field( $slide2_animation_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $slide2_animation_delay ); ?>s">
                                    <a href="<?php echo esc_url( $heroslide_link ); ?>"><?php echo sanitize_text_field( $heroslide_button ); ?></a>
                                </div>

                                <div class="navigate">
                                    <div class="prev-slide">
                                        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                                    </div>

                                    <div class="next-slide">
                                        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                    <!-- container -->
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<!-- section -->
<?php } ?>