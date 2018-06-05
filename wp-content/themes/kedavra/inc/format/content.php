<article id="post-<?php the_ID(); ?>" <?php post_class('post article clearfix'); ?>>

	<!-- container -->
	<div class="container">

		<div class="offset">

			<div class="col-md-12">

				<div class="info">

				<div class="row">

					<h3 class="title"><?php the_title(); ?></h3>

					<span class="date"><?php echo get_the_date(); ?></span>

				</div>

				</div>

			</div>

			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumb">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php } ?>

			<div class="content">

				<?php the_content(); ?>
        		<?php wp_link_pages(); ?>

			</div>

			<div class="links row">

				<div class="back col-md-6">

					<span class="single-tag-bottom"><strong><?php _e( 'Tags: ', 'kedavra' ); ?></strong><?php the_tags( '',', ','' ); ?></span>
					<span class="single-category-bottom"><strong><?php _e( 'Categories: ', 'kedavra' ); ?></strong><?php the_category( ', ' ); ?></span>

				</div>

				<div class="social col-md-6">

				<div class="facebook">
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="sharing-post product_share_facebook facebook" onclick="event.preventDefault(); javascript:window.open(this.href,
    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="fa fa-fw fa-facebook"></i>Share</a>
				</div>

				<div class="twitter">
				<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>" onclick="javascript:window.open(this.href,
    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="sharing-post product_share_twitter twitter"><i class="fa fa-fw fa-twitter"></i>Tweet</a> 
              	</div>   

				</div>

			</div>
			
		</div> 

	</div><!-- container -->

	<div class="comment-part">
	<div class="container">
	<div class="offset">
	<?php
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		if ( comments_open() || '0' != get_comments_number() ) comments_template();
	?>
	</div>
	</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

			