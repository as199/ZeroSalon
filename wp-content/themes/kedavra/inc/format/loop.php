<article  id="post-<?php the_ID(); ?>" <?php post_class( 'post col-md-6  wow fadeInUp'); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('post-thumb-loop'); ?>
		</a>
		</div><!-- thumbnail-->
	<?php } ?>				

	<div class="info">
		<a href="<?php the_permalink(); ?>">
			<h3 class="title"><?php the_title(); ?></h3>
		</a>
		
		<div class="date"><?php echo get_the_date(); ?></div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->