<?php kedavra_header_menu_choice(); ?>


	<div id="content-wrapper" class="wrapper clearfix">

		<?php while ( have_posts() ) : the_post(); 
		
			get_template_part( 'inc/format/content', get_post_format() );

		endwhile; // end of the loop. ?>

	</div><!-- content-wrapper -->


<?php kedavra_footer_type_choice(); ?>