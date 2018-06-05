<?php kedavra_header_menu_choice(); ?>

<section class="blog page-wrapper archives" id="blog archive">
    <!-- container -->
    <div class="container">

		<div class="row">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); 

					get_template_part( 'inc/format/loop', get_post_format() );

				endwhile; ?>
				
			<?php else : ?>

			<?php get_template_part( 'inc/format/loop', 'no-result' ); ?>

			<?php endif; ?>
		</div><!-- row -->
		<?php kedavra_pagination($pages = '', $range = 2); ?>

		</div><!-- container -->

</section><!-- page-wrapper -->


<?php kedavra_footer_type_choice(); ?>