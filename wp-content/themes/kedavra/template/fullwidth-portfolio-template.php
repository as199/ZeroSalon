<?php kedavra_page_header_menu_choice(); 

/*
Template Name: Full Width Portfolio Template
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
<?php } ?> 

<!-- section -->
<section id="portfolio-wrapper" class="portfolio page-template page-wrapper full-width">
    <!-- container -->
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
    <?php if($hide_title == false){ ?>
       <h3 class="title agency wow fadeIn"><?php the_title(); ?></h3>
    <?php } ?>
        <div class="text wow fadeIn"><?php the_content(); ?></div>
    </div>
    <?php endwhile; // end of the loop. ?>
        
        <div class="container">
        <!-- Portfolio Filter
        ============================================= -->
        <?php       

            echo '<ul id="portfolio-full-filter" class="wow fadeIn clearfix">';
            echo '<li><a data-filter="*" href="#" class="activeFilter">All</a></li>';
            $full_porto = array( 'taxonomy'   => 'portfolio-category' );
            $cats_full_porto = get_categories( $full_porto );

            foreach ( $cats_full_porto as $cat_full_porto ) {
                $category_name = $cat_full_porto->name;
                $category_slug = $cat_full_porto->slug;
                echo '<li><a data-filter=".'. sanitize_text_field( $category_slug ) .'" href="#">' . sanitize_text_field( $category_name ) . '</a></li>';
            }  

            echo '</ul>';
        ?><!-- #portfolio-filter end -->
        </div>
        
        <!-- Portfolio Items
        ============================================= -->
        <div id="portfolio" class="full-width wow fadeIn clearfix">

         <?php

            $ishome = get_option('page_on_front');
            $testId = get_the_ID();

            if($ishome == $testId) {
                $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
            }
            else {
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
            }

            $porto3 = array(
                'post_type'          => 'kedavra-portfolio',
                'post_status'        => 'publish',
                'posts_per_page'     => 10,
                'paged'              => $paged,

            );
            $portfolio_loop = new WP_Query($porto3);

            if ($portfolio_loop->have_posts()) : while($portfolio_loop->have_posts()) : $portfolio_loop->the_post(); 
            global $post;
                
                $category_name = '';
                    $category_terms = wp_get_object_terms($post->ID, 'portfolio-category');
                    if(!empty($category_terms)){
                      if(!is_wp_error( $category_terms )){
                        $portfolio_kedav = array();

                         foreach($category_terms as $term){
                            
                            $category_name[] = $term->name;
                            $portfolio_kedav[] = $term->slug;
                        }                      
                      }
                    }       

                    $porto_comas =  join( ", ", $category_name );
                    $porto_space =  join( " ", $portfolio_kedav );

                $portfolio_width = get_field( 'portfolio_width' );                
        ?>
            
        <article class="portfolio-item <?php echo sanitize_text_field( $portfolio_width ); ?> <?php echo sanitize_text_field( $porto_space ); ?>" data-type="<?php echo sanitize_text_field( $porto_space ); ?>">
            <div class="wow fadeIn">
                <a href="<?php the_permalink(); ?>">
                    <div class="portfolio-image">
                        <?php the_post_thumbnail(); ?>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc">
                                <h4 class="title-with-bord"><?php the_title(); ?></h4>
                                <span><?php echo sanitize_text_field( $porto_comas ); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </article>

        <?php endwhile; endif; ?>

        </div><!-- #portfolio end -->

        <!-- infinite load button start -->
        <div id="load-more-portfolio"><?php next_posts_link( '', $portfolio_loop->max_num_pages ); ?></div>
        <button id="load-infinite">Load More</button>
        <!-- infinite load button end -->

        <!-- Portfolio Script
        ============================================= -->
        <script type="text/javascript">

            jQuery(window).load(function(){
                var jQuerycontainer = jQuery('.page-template #portfolio.full-width');
                jQuerycontainer.isotope({ transitionDuration: '0.65s', layoutMode: 'packery', });

                jQuery('#portfolio-full-filter a').click(function(){
                    jQuery('#portfolio-full-filter li').removeClass('activeFilter');
                    jQuery(this).parent('li').addClass('activeFilter');
                    var selector = jQuery(this).attr('data-filter');
                    jQuerycontainer.isotope({ filter: selector });
                    return false;
                });

                jQuery(window).resize(function() {
                    jQuerycontainer.isotope('layout');
                });

                // Infinite Scroll
                jQuerycontainer.infinitescroll({
                    loading: {
                finishedMsg: 'There is no more',
                msgText: 'loading',
                speed: 'normal'
                    },

                state: {
                isDone: false
                },
                    navSelector  : '#load-more-portfolio', 
                    nextSelector : '#load-more-portfolio a', 
                    itemSelector : 'article.portfolio-item',

                },
                // Infinite Scroll Callback
                function( newElements ) {
                    jQuerycontainer.isotope( 'appended', jQuery( newElements ) );
                    var t = setTimeout( function(){ jQuerycontainer.isotope('layout'); }, 2000 );

                });

                jQuerycontainer.infinitescroll('unbind');
                  jQuery("#load-infinite").click(function(){
                        jQuerycontainer.infinitescroll('retrieve');
                         return false;

                });

            });
        </script><!-- Portfolio Script End -->
</section>
<!-- section -->

</div>

<?php
kedavra_footer_type_choice(); ?>