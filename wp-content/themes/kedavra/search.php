<?php kedavra_header_menu_choice();  ?>


<section class="blog page-wrapper search-result" id="blog search">
    <!-- container -->
    <div class="container">

		<div class="row">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); 


					get_template_part( 'inc/format/loop', get_post_format() );

				endwhile; ?>

			<?php else : ?>
			<?php get_template_part( 'inc/format/content', 'no-result' ); ?>

			<?php endif; ?>
			</div><!-- row -->
		<?php kedavra_pagination($pages = '', $range = 2); ?>

		</div><!-- container -->

</section><!-- page-wrapper -->


<?php kedavra_footer_type_choice(); ?>