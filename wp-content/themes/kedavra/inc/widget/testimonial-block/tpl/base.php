<?php 
	$testimonial_number		= $instance['testimonial_number']; 
	$testimonial_nav		= $instance['testimonial_nav'];
	$testimonial_animation	= $instance['testimonial_animation'];
	$testi_author_color 	= $instance['testi_author_color'];
?>

<!-- section -->
<div class="testimonial-wrap">
	<div class="testimonial-item flexslider testi-block">
		<ul class="slides">
			<?php $testimo_block = array(
				'post_type'				=>	'kedavra_testimonial',
				'posts_per_page'		=>	$testimonial_number,
				);

				$testimonial_block_query = new WP_Query($testimo_block);

				if ($testimonial_block_query->have_posts()) : while($testimonial_block_query->have_posts()) : $testimonial_block_query->the_post();

			        $img_url_testi = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
			            $image_testi2 = aq_resize($img_url_testi[0],  75 , 75, true);
			    
			?>
			<li>
				<div class="review">
					<?php the_content(); ?>
					<?php if ( has_post_thumbnail()) { ?>
						<img src="<?php echo esc_url( $image_testi2 ); ?>" alt="<?php the_title(); ?>">
					<?php } ?>
					<h6 class="title" style="color: <?php echo esc_html( $testi_author_color ); ?>"><?php the_title(); ?></h6>
					<?php $testimonial_job = get_field('testimonial_job');
						if($testimonial_job !== ''){ ?>
						<small style="color: <?php echo esc_html( $testi_author_color ); ?>"><?php echo sanitize_text_field( $testimonial_job ); ?></small>
					<?php }  ?>
				</div>
			</li>
			<?php endwhile; wp_reset_postdata(); endif; ?>
		</ul>
	</div>
</div>
<!-- section -->

<script type="text/javascript">
jQuery( ".testimonial-wrap .review p" ).addClass( "testi-text" );
jQuery(document).ready(function() {

	jQuery(".testimonial-wrap .flexslider.testi-block").flexslider({
		animation: "<?php echo sanitize_text_field( $testimonial_animation ); ?>",
		controlNav: false,
		prevText: "",
		nextText: "",
		directionNav: <?php echo sanitize_text_field( $testimonial_nav ); ?>,
		smoothHeight: false,
		slideshowSpeed: 5000
	});
});
</script>