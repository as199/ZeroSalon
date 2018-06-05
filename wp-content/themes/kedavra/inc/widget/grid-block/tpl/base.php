<?php 

$grid_filter	= $instance['grid_filter']; 	
$grid_number	= $instance['grid_number'];
$grid_button   = $instance['grid_button'];    
$grid_link     = $instance['grid_link'];        

?>

 <!-- Portfolio Filter
============================================= -->
<?php if ($grid_filter) {           

    echo '<ul id="causes-filter" class="wow fadeIn clearfix">';
        echo '<li><a data-filter="*" href="#" class="activeFilter">All</a></li>';
        $grid_fil_args = array( 'taxonomy'   => 'portfolio-category' );
        $cat_lists_grid = get_categories( $grid_fil_args );

        foreach ( $cat_lists_grid as $cat_list_grid ) {
            $category_name = $cat_list_grid->name;
            $category_slug = $cat_list_grid->slug;
            echo '<li><a data-filter=".'. sanitize_text_field( $category_slug ) .'" href="#">' . sanitize_text_field( $category_name ) . '</a></li>';
        }  

        echo '</ul>';
} ?><!-- #portfolio-filter end -->

<!-- Portfolio Items
============================================= -->
<div id="causes" class="wow fadeIn causes-block clearfix">

<?php
    $porto2_block = array(
        'post_type'          => 'kedavra-portfolio',
        'post_status'        => 'publish',
        'posts_per_page'     => $grid_number,

    );
    $portfolio_loop2_block = new WP_Query($porto2_block);

    if ($portfolio_loop2_block->have_posts()) : while($portfolio_loop2_block->have_posts()) : $portfolio_loop2_block->the_post(); 
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

<article class="causes-item <?php echo sanitize_text_field( $porto_space ); ?>" data-type="<?php echo sanitize_text_field( $porto_space ); ?>" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
    <div class="wow fadeIn">
        <a class="image-link" title="causes" href="<?php the_permalink(); ?>">
            <div class="causes-image">
                <img src="<?php echo esc_url( $causes_img ); ?>" alt="<?php the_title(); ?>">
                <div class="causes-desc">
                    <h4 class="title-with-bord"><?php the_title(); ?></h4>
                    <?php if($portfolio_type == 'causes') { ?>
                    <?php if(!empty($raised_value)){ ?>
                    <span><?php _e( 'Raised ', 'kedavra' ); ?><?php echo sanitize_text_field( $raised_value ); ?></span> | 
                    <?php }
                    if(!empty($donor_value)) { ?>
                    <span><?php _e( 'Donors ', 'kedavra' ); ?><?php echo sanitize_text_field( $donor_value ); ?></span> | 
                    <?php }
                    if(!empty($goal_value)) { ?>
                    <span><?php _e( 'Goal ', 'kedavra' ); ?><?php echo sanitize_text_field( $goal_value ); ?></span>
                    <?php }} ?>
                </div>
            </div>
        </a>
    </div>
</article>

<?php endwhile; endif; ?>

</div><!-- #portfolio end -->

<!-- Infinite Load Button
============================================= -->

<a href="<?php echo esc_url( $grid_link ); ?>" id="load-more-portfolio">
    <div class="load-infinite"><span><?php echo sanitize_text_field( $grid_button ); ?></span></div>
</a>


<!-- infinite load button end -->
<script>
jQuery( "#portfolio-filter li:first-child" ).addClass( "activeFilter" );
jQuery(window).load(function(){

    var jQuerycontainer = jQuery('#causes.causes-block');

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
});
</script>


<?php wp_reset_postdata(); ?>