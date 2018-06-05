<?php
    $portfoliocustom_display    = $instance['portfoliocustom_display'];
?>

<!-- demo Items
============================================= -->
<div class="portfolio-all landing custom-link wow fadeIn clearfix">

    <?php
        $porto2_custom_block = array(
            'post_type'          => 'kedavra-portfolio',
            'post_status'        => 'publish',
            'posts_per_page'     => $portfoliocustom_display,

        );
        $portfolio_loop2_custom_block = new WP_Query($porto2_custom_block);

        if ($portfolio_loop2_custom_block->have_posts()) : while($portfolio_loop2_custom_block->have_posts()) : $portfolio_loop2_custom_block->the_post(); 
        
            $cause_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
            $causes_img1 = aq_resize($cause_url[0],  365 , 195, true);

            $custom_link        = get_field('custom_link');                 
        ?>

        <article class="portfolio-item" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
            <div class="wow fadeIn">
                <a title="Portfolio" href="<?php echo esc_url( $custom_link ); ?>" target="_blank">
                    <div class="portfolio-image">
                        <img src="<?php echo esc_url( $causes_img1 ); ?>" alt="<?php the_title(); ?>">
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc">
                                <span><i class="fa fa-long-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-title">
                        <h6><?php the_title(); ?></h6>
                    </div>
                </a>
            </div>
        </article>

        <?php endwhile; endif; ?>


    <!-- demos Script
    ============================================= -->
    <script type="text/javascript">

        jQuery(window).load(function(){

            var jQuerycontainer = jQuery('.portfolio-all.custom-link');

            jQuerycontainer.isotope({ transitionDuration: '0.65s' });

            jQuery(window).resize(function() {
                jQuerycontainer.isotope('layout');
            });

        });
    </script><!-- demos Script End -->

</div><!-- #demos end -->
