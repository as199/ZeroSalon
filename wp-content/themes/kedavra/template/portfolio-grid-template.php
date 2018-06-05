<?php kedavra_page_header_menu_choice(); 

/*
Template Name: Portfolio Grid Template
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
 <section id="causes-wrapper" class="causes page-wrapper">
    <!-- container -->
    <div class="container">
    <?php while ( have_posts() ) : the_post(); 
    if($hide_title == false){ ?>
        <div class="thetitle wow fadeIn">
        <h3><?php the_title(); ?></h3>
        </div>
    <?php } ?>
        <div class="text wow fadeIn"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
        
        <!-- Portfolio Filter
        ============================================= -->
        <?php       

            echo '<ul id="causes-filter" class="wow fadeIn clearfix">';
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
        <div id="causes" class="wow fadeIn clearfix">

         <?php
            $ishome = get_option('page_on_front');
            $testId = get_the_ID();

            if($ishome == $testId) {
                       $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
            }
            else {
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
            }

            $porto2 = array(
                'post_type'          => 'kedavra-portfolio',
                'post_status'        => 'publish',
                'posts_per_page'     => 12,
                'paged'              => $paged,

            );
            $portfolio_loop = new WP_Query($porto2);

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

                $cause_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
                    $causes_img = aq_resize($cause_url[0],  275 , 185, true);

                $portfolio_type = get_field( 'portfolio_type' );  
                $raised_value = get_field( 'raised_value' ); 
                $donor_value = get_field( 'donor_value' ); 
                $goal_value = get_field( 'goal_value' );                 
        ?>

        <article class="causes-item <?php echo sanitize_text_field( $porto_space ); ?>" data-type="<?php echo sanitize_text_field( $porto_space ); ?>">
            <div class="wow fadeIn">
                <a class="image-link" title="causes" href="<?php the_permalink(); ?>">
                    <div class="causes-image">
                        <img src="<?php echo esc_url( $causes_img ); ?>" alt="<?php the_title(); ?>">
                        <div class="causes-desc">
                            <h4 class="title-with-bord"><?php the_title(); ?></h4>
                            <?php if($portfolio_type == 'causes') { ?>
                            <?php if(!empty($raised_value)){ ?>
                            <span><?php _e( 'Raised .', 'kedavra' ); ?><?php echo sanitize_text_field( $raised_value ); ?></span> | 
                            <?php }
                            if(!empty($donor_value)) { ?>
                            <span><?php _e( 'Donors .', 'kedavra' ); ?><?php echo sanitize_text_field( $donor_value ); ?></span> | 
                            <?php }
                            if(!empty($goal_value)) { ?>
                            <span><?php _e( 'Goal .', 'kedavra' ); ?><?php echo sanitize_text_field( $goal_value ); ?></span>
                            <?php }} ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>

        <?php endwhile; endif; ?>

        </div><!-- #portfolio end -->

        <!-- infinite load button start -->
        <div id="load-more-causes"><?php next_posts_link( '', $portfolio_loop->max_num_pages ); ?></div>
        <button id="load-infinite">Load More</button>
        <!-- infinite load button end -->

        <!-- Portfolio Script
        ============================================= -->
        <script type="text/javascript">

            jQuery(window).load(function(){

               var jQuerycontainer = jQuery('#causes');

                jQuerycontainer.isotope({ transitionDuration: '0.65s' });

                jQuery('#causes-filter a').click(function(){
                    jQuery('#causes-filter li').removeClass('activeFilter');
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
                    navSelector  : '#load-more-causes', 
                    nextSelector : '#load-more-causes a', 
                    itemSelector : 'article.causes-item',

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
    </div>
    <!-- container -->
</section>
<!-- section -->

</div>

<?php
kedavra_footer_type_choice(); ?>