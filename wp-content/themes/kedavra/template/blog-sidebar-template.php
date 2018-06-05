<?php kedavra_page_header_menu_choice(); 
/*
Template Name: Blog Sidebar Template
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

<section class="blog style-2 page-wrapper" id="blog">
    <!-- container -->
    <div class="container">
        <div class="row">

        <div class="blog-post col-md-8">

		<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
            $side_blog_hook = array(
                'post_type'         => 'post',
                'paged'             => $paged,
                'ignore_sticky_posts' => 1,  
                'posts_per_page'    => 5               
            );
            $blog_sidebar_loop = new WP_Query($side_blog_hook); 
            if ($blog_sidebar_loop->have_posts()) : while($blog_sidebar_loop->have_posts()) : $blog_sidebar_loop->the_post(); ?>
                
                <div class="post wow fadeInUp">
                <?php if ( has_post_thumbnail() ) { ?>
				<div class="thumbnail">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
                </div>
				<?php } ?>
                    <div class="info">
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="title"><?php the_title(); ?></h4>
                        </a>
                        <div class="post-meta">
                            <span><?php _e( 'By ', 'kedavra' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a></span> | 
                            <span class="categories"><?php the_category(', '); ?></span> | 
                            <span class="comments"><?php comments_number( '0', '1', '%' ); ?><?php _e( ' Comments', 'kedavra' ); ?></span> | <span><?php echo get_the_date(); ?></span>
                        </div>
                        <div class="excerpt">
                            <?php the_excerpt();?>
                        </div>
                        <div class="readmore">
                            <a href="<?php the_permalink(); ?>" class="link"><?php _e( 'Read More', 'kedavra' ); ?></a>
                        </div>
                    </div>
                </div>

		<?php endwhile; // end of the loop. ?>	


        <?php  next_posts_link( 'Older Entries', $blog_sidebar_loop->max_num_pages );
        previous_posts_link( 'Newer Entries' ); wp_reset_postdata(); endif; ?>
        
        </div>

        <?php get_sidebar(); ?>

		</div><!-- row -->

	</div><!-- container -->

</section><!-- page-wrapper -->

</div>

<?php kedavra_footer_type_choice(); ?>