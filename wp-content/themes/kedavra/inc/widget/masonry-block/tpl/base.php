<?php 

$portfolio_filter	= $instance['portfolio_filter']; 	
$portfolio_number	= $instance['portfolio_number'];
$portfolio_button   = $instance['portfolio_button'];    
$portfolio_link     = $instance['portfolio_link'];        

?>

 <!-- Portfolio Filter
============================================= -->
<?php if (!empty($portfolio_filter)) {           

    echo '<ul id="portfolio-filter" class="wow fadeIn clearfix">';
    echo '<li><a data-filter="*" href="#" class="activeFilter">All</a></li>';
    $man_fil_args = array( 'taxonomy'   => 'portfolio-category' );
    $cat_lists_masonry = get_categories( $man_fil_args );

    foreach ( $cat_lists_masonry as $cat_list_man ) {
        $category_name = $cat_list_man->name;
        $category_slug = $cat_list_man->slug;
        echo '<li><a data-filter=".'. sanitize_text_field( $category_slug ) .'" href="#">' . sanitize_text_field( $category_slug ) . '</a></li>';
    }  

    echo '</ul>';
} ?><!-- #portfolio-filter end -->

<!-- Portfolio Items
============================================= -->
<div class="portfolio-all wow fadeIn masonry-style-block clearfix">
    
    <?php
        $porto1_block = array(
            'post_type'          => 'kedavra-portfolio',
            'post_status'        => 'publish',
            'posts_per_page'     => $portfolio_number,

        );
        $portfolio_loop1_block = new WP_Query($porto1_block);

        if ($portfolio_loop1_block->have_posts()) : while($portfolio_loop1_block->have_posts()) : $portfolio_loop1_block->the_post(); 
        global $post;
            
            $category_name = '';
            $category_masonry_block = get_the_terms($post->ID, 'portfolio-category');

            if(!empty($category_masonry_block)){
                if(!is_wp_error( $category_masonry_block )){
                    $category_slug = array();
                    foreach($category_masonry_block as $term){
                        $category_name[] = $term->name;
                        $category_slug[] = $term->slug;
                    }
                }                      
            }
            
            $porto_comas =  join( ", ", $category_name );
            $porto_space =  join( " ", $category_slug );

            $photo_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');                    
    ?>
        
    <article class="portfolio-item <?php echo sanitize_text_field( $porto_space ); ?>" data-type="<?php echo sanitize_text_field( $porto_space ); ?>" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
        <div class="wow fadeIn">
            <a class="image-link" title="Portfolio" href="<?php echo esc_url( $photo_url[0] ); ?>">
                <div class="portfolio-image">
                    <img src="<?php echo esc_url( $photo_url[0] ); ?>" alt="<?php the_title(); ?>">
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

    <?php endwhile; wp_reset_postdata(); endif; ?>

</div><!-- #portfolio end -->

<!-- Infinite Load Button
============================================= -->

<a href="<?php echo esc_url( $portfolio_link ); ?>" id="load-more-portfolio">
    <div class="load-infinite"><span><?php echo sanitize_text_field( $portfolio_button ); ?></span></div>
</a>


<!-- infinite load button end -->

<script>
jQuery( "#portfolio-filter li:first-child" ).addClass( "activeFilter" );
jQuery(window).load(function(){

    var jQuerycontainer = jQuery('.portfolio-all.masonry-style-block');

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
});
jQuery(document).ready(function() {
  jQuery('.portfolio-all .image-link').magnificPopup({ 
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
</script>


