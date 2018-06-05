<?php kedavra_page_header_menu_choice(); 

/*
Template Name: Gallery Template
*/
$images = get_field('kedavra_gallery');
?>

<!-- GALLERY
============================================= -->
<!-- section -->
<section class="gallery fullscreen" id="gallery">
	<div class="flexslider">
		<ul class="slides">
		<?php foreach( $images as $image ):

		$alt = $image['alt']; ?>
			<li>
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
			</li>
		<?php endforeach;  ?>
		</ul>
	</div>

	<div class="navigate">

	<!-- container -->
	<div class="links container">

		<div class="row">

			<div class="link col-md-6 text-center">

				<a href="#" class="prev"><?php _e( 'Prev', 'kedavra' ); ?></a>

			</div>

			<div class="link col-md-6 text-center">

				<a href="#" class="next"><?php _e( 'Next', 'kedavra' ); ?></a>

			</div>

		</div>

	</div>
	<!-- container -->

	 </div>
</section>
<!-- section -->
<!-- gallery end -->
<?php
kedavra_footer_type_choice(); ?>