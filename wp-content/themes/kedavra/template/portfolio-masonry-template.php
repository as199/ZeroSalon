<?php kedavra_page_header_menu_choice(); 

/*
Template Name: Portfolio Masonry Template
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
<section id="portfolio-wrapper" class="portfolio page-wrapper">
    <!-- container -->
    <div class="container">
    <?php while ( have_posts() ) : the_post();
    if($hide_title == false){ ?>
       <h3 class="title photography wow fadeIn"><?php the_title(); ?></h3>
    <?php } ?>
        <div class="text wow fadeIn"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
        
        <!-- Portfolio Filter
        ============================================= -->
        <?php       

            echo '<ul id="portfolio-filter" class="wow fadeIn clearfix">';
            echo '<li><a data-filter="*" href="#" class="activeFilter">All</a></li>';
            $args = array( 'taxonomy'   => 'portfolio-category' );
            $cat_lists = get_categories( $args );

            foreach ( $cat_lists as $cat_list ) {
                $category_name = $cat_list->name;
                $category_slug = $cat_list->slug;
                echo '<li><a data-filter=".'. sanitize_text_field( $category_slug ) .'" href="#">' . sanitize_text_field( $category_name ) . '</a></li>';
            }  

            echo '</ul>';
        ?><!-- #portfolio-filter end -->

        <!-- Portfolio Items
        ============================================= -->
        <div id="portfolio" class="wow fadeIn clearfix">

         <?php
            $ishome = get_option('page_on_front');
            $testId = get_the_ID();

            if($ishome == $testId) {
                       $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
            }
            else {
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
            }
            
            $porto1 = array(
                'post_type'          => 'kedavra-portfolio',
                'post_status'        => 'publish',
                'posts_per_page'     => 12,
                'paged'              => $paged,

            );
            $portfolio_loop = new WP_Query($porto1);

            if ($portfolio_loop->have_posts()) : while($portfolio_loop->have_posts()) : $portfolio_loop->the_post(); 
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

                    $portfolio_type = get_field( 'portfolio_type' );  

                    $photo_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');          
        ?>
            
        <article class="portfolio-item <?php echo sanitize_text_field( $porto_space ); ?>" data-type="<?php echo sanitize_text_field( $porto_space ); ?>">
            <div class="wow fadeIn">
                <?php if($portfolio_type == 'photography') { ?>
                  <a class="image-link light-box" title="Portfolio" href="<?php echo esc_url( $photo_url[0] ); ?>">
                <?php }
                else { ?>
                  <a class="image-link" title="Portfolio" href="<?php the_permalink(); ?>">
                <?php } ?>
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

                var jQuerycontainer = jQuery('#portfolio');

                jQuerycontainer.isotope({ transitionDuration: '0.65s' });

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
            jQuery(document).ready(function() {
              jQuery('.portfolio-item .image-link.light-box').magnificPopup({ 
                  type: 'image',
                  mainClass: 'mfp-with-zoom', // this class is for CSS animation below

                  zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function 

                    // The "opener" function should return the element from which popup will be zoomed in
                    // and to which popup will be scaled down
                    // By defailt it looks for an image tag:
                    opener: function(openerElement) {
                      // openerElement is the element on which popup was initialized, in this case its <a> tag
                      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                      return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                  }

                });
            });
        </script><!-- Portfolio Script End -->
    </div>
    <!-- container -->
</section>
<!-- section -->

</div><!-- content wrapper -->

<?php
kedavra_footer_type_choice(); ?>