<?php kedavra_header_menu_choice(); ?>

		<div id="content-wrapper" class="wrapper page-wrapper">
			<article class="single-post post no-result 404 clearfix">

				<div class="post-content clearfix"> 
					<div class="post-entry text-center col-md-12"> 

						<div class="error-header">
                                <h1><?php _e( 'Sorry, page not found.', 'kedavra' ); ?></h1>
                                <p><?php _e( 'The page you are looking for is no longer available or has been moved.', 'kedavra' ); ?></p>
                            </div><!-- end error-header -->

                            <div class="various-content">

                                <div class="var-section search-form">
                                    <h2><?php _e( 'Search the site', 'kedavra' ); ?></h2>
                                    <form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
									<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="S E A R C H" />
									<input type="submit" class="submit search-button" value="<?php echo esc_attr_x( '', 'submit button', 'kedavra' ); ?>" />
									</form>
                                </div><!-- end var-section -->

                                <div class="var-section post-list">
                                    <h2><?php _e( 'Latest Article', 'kedavra' ); ?></h2>
                                    <ul>
                                        <?php 
                                            $page_404 = array(
                                                'post_type'         => 'post',
                                                'posts_per_page'    => '10',
                                                'ignore_sticky_posts' => 1,                             
                                            );
                                            $hook_404page = new WP_Query($page_404); 
                                            if ($hook_404page->have_posts()) : while($hook_404page->have_posts()) : $hook_404page->the_post();
    								    	?>
									    	<li>
									    		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									    	</li>
								    	  
								    	<?php 
								    		endwhile; wp_reset_postdata(); endif;
								    	?>
                                    </ul>
                                </div><!-- end var-section -->

                            </div><!-- end various-content -->

					</div><!-- post-entry -->
				</div><!-- post-content -->
			</article><!-- #post-0 .post .no-result .not-found -->
		</div><!-- wrapper -->


<?php kedavra_footer_type_choice();