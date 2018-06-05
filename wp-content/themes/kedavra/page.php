<?php kedavra_page_header_menu_choice(); 

$use_margin 			= get_field('use_margin');
$add_margin 			= get_field('add_margin');

?>

	<?php if( $use_margin === true || $use_margin === NULL  ) { ?>
		<div id="content-wrapper" class="wrapper with-margin" style="padding: <?php echo sanitize_text_field( $add_margin ); ?>px 0px 0px">
	<?php }

	else { ?>
		<div id="content-wrapper" class="wrapper">
	<?php } ?>
	
		<?php while ( have_posts() ) : the_post(); 
		
			get_template_part( 'inc/format/content', 'page' );
					
		endwhile; // end of the loop. ?>

		</div><!-- wrapper -->


<?php kedavra_page_footer_type_choice(); ?>