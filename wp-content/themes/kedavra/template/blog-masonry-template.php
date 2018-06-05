<?php kedavra_page_header_menu_choice(); 
/*
Template Name: Blog Masonry Template
*/
$use_margin     = get_field('use_margin');
$add_margin     = get_field('add_margin');
$hide_title     = get_field( 'hide_title' );

?>

<?php if( $use_margin === true || $use_margin === NULL  ) { ?>
    <div id="content-wrapper" class="wrapper with-margin" style="margin: <?php echo sanitize_text_field( $add_margin ); ?>px 0px 0px">
<?php }

else { ?>
    <div id="content-wrapper" class="wrapper">
<?php } 

if($hide_title == false){ ?>
<div class="page-title text-center">
<h2><?php the_title(); ?></h2>
</div>
<?php } ?> 

<section id="blog-masonry" class="agency blog page-wrapper">
    <!-- container -->
    <div class="container">
        <div class="row">
	    	
			<div class="blog-post">

		<?php 
            $man_blog_hook = array(
                'post_type'         => 'post',
                'posts_per_page'    => '10',
                'ignore_sticky_posts' => 1,                             
            );
            $blog_masonry_loop = new WP_Query($man_blog_hook); 
            if ($blog_masonry_loop->have_posts()) : while($blog_masonry_loop->have_posts()) : $blog_masonry_loop->the_post(); ?>
                <div class="post col-md-4 wow fadeInUp">
                <?php if ( has_post_thumbnail() ) { ?>
				<div class="thumbnail">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
                </div>
				<?php } ?>
                    <div class="info agency">
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="title agency"><?php the_title(); ?></h4>
                        </a>
                        <div class="date"><?php echo get_the_date(); ?></div>
                    </div>
                </div>

		<?php endwhile; wp_reset_postdata(); endif; // end of the loop. ?>	

            </div>

		</div><!-- row -->

		<?php kedavra_pagination($pages = '', $range = 2); ?>

	</div><!-- container -->
	<script type="text/javascript">
	jQuery(window).load(function(){
            var jQuerycontainer = jQuery('#blog-masonry .blog-post');
            jQuerycontainer.isotope({ transitionDuration: '0.65s' });
            jQuery(window).resize(function() {
                jQuerycontainer.isotope('layout');
            });
        });
	</script>

</section><!-- page-wrapper -->

</div>


<?php kedavra_footer_type_choice(); ?>