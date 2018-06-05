<?php 

$fullportfolio_number	= $instance['fullportfolio_number'];      

?>

<!-- section -->
<div id="portfolio-wrapper" class="portfolio full-width">
        
    <!-- Portfolio Items
    ============================================= -->
    <div class="portfolio-all full-width wow fadeIn clearfix">

     <?php
        $porto3_block = array(
            'post_type'          => 'kedavra-portfolio',
            'post_status'        => 'publish',
            'posts_per_page'     => $fullportfolio_number,

        );
        $fullportfolio_loop_block = new WP_Query($porto3_block);

        if ($fullportfolio_loop_block->have_posts()) : while($fullportfolio_loop_block->have_posts()) : $fullportfolio_loop_block->the_post(); 
        global $post;
            
            $category_name = '';
            $category_portofull_block = get_the_terms($post->ID, 'portfolio-category');

            if(!empty($category_portofull_block)){
                if(!is_wp_error( $category_portofull_block )){
                    $category_slug = array();
                    foreach($category_portofull_block as $term){
                        $category_name[] = $term->name;
                        $category_slug[] = $term->slug;
                    }
                }                      
            }
            
            $portofull_comas =  join( ", ", $category_name );
            $portofull_space =  join( " ", $category_slug );

            $portfolio_width = get_field( 'portfolio_width' );                
    ?>
        
    <article class="portfolio-item <?php echo sanitize_text_field( $portfolio_width ); ?> <?php echo sanitize_text_field( $portofull_space ); ?>" data-type="<?php echo sanitize_text_field( $portofull_space ); ?>" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
        <div class="wow fadeIn">
            <a href="<?php the_permalink(); ?>">
                <div class="portfolio-image">
                    <?php the_post_thumbnail(); ?>
                    <div class="portfolio-overlay">
                        <div class="portfolio-desc">
                            <h4 class="title-with-bord"><?php the_title(); ?></h4>
                            <span><?php echo sanitize_text_field( $portofull_comas ); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </article>

    <?php endwhile; endif; ?>

    </div><!-- #portfolio end -->

    <!-- Portfolio Script
    ============================================= -->
    <script type="text/javascript">
    jQuery(document).ready(function(){
        var portoItemWidth = jQuery('.portfolio-all.full-width .portfolio-item').width();
        jQuery('.portfolio-all.full-width .portfolio-item.wide-portfolio').css('width', '50%')
    });
        jQuery(window).load(function(){
            var jQuerycontainer = jQuery('.portfolio-all.full-width');
            jQuerycontainer.isotope({ transitionDuration: '0.65s', layoutMode: 'packery', });
            jQuery('#portfolio-filter a').click(function(){
                jQuery('#portfolio-filter li').removeClass('activeFilter');
                jQuery(this).parent('li').addClass('activeFilter');
                var selector = jQuery(this).attr('data-filter');
                jQuerycontainer.isotope({ filter: selector });
                return false;
            });

            jQuery(window).resize(function() {
                jQuerycontainer.isotope('layout');
            });

        });
    </script><!-- Portfolio Script End -->
</div>
<!-- div -->


<?php wp_reset_postdata(); ?>