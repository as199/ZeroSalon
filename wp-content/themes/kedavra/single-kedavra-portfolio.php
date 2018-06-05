<?php kedavra_page_header_menu_choice(); 

while ( have_posts() ) : the_post();

$portfolio_type = get_field( 'portfolio_type' );
// causes
$raised_value = get_field( 'raised_value' ); 
$donor_value = get_field( 'donor_value' ); 
$goal_value = get_field( 'goal_value' ); 
$goal_percentage = get_field( 'goal_percentage' ); 
$donate_button = get_field( 'donate_button' ); 
$donate_link = get_field( 'donate_link' ); 

//agency
$client_name = get_field( 'client_name' ); 
$release_date = get_field( 'release_date' ); 
$website_name = get_field( 'website_name' ); 

?>
<!-- section -->
<?php if($portfolio_type == 'causes') { ?>
<section class="single-causes page-wrapper clearfix">
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3><?php the_title(); ?></h3>
                <div class="cause-detail">
                    <?php the_post_thumbnail(); ?>
                    <?php if(!empty($raised_value) || !empty($donor_value) || !empty($goal_value) || !empty($goal_percentage) || !empty($donate_button)){ ?>
                        <div class="cause-progress">
                        	<?php if(!empty($goal_percentage)){ ?>
                            <div class="skills-barrow clearfix">
					            <div class="skills-bar" data-percent="<?php echo sanitize_text_field( $goal_percentage ) ?>%">
                           			<div class="bar"><span><?php echo sanitize_text_field( $goal_percentage ) ?>%</span></div>

					            </div>
					        </div>
                        	<?php } ?>
						
                        <div class="progress-detail">
                            <div class="info">
                                <ul>
                                	<?php if(!empty($raised_value)){ ?>
                                    <li><span><i class="fa fa-money"></i></span><?php _e( 'Raised ', 'kedavra' ); ?><?php echo sanitize_text_field( $raised_value ); ?></li>
                                    <?php }
                    				if(!empty($donor_value)) { ?>
                                    <li><span><i class="fa fa-users"></i></span><?php _e( 'Donors ', 'kedavra' ); ?><?php echo sanitize_text_field( $donor_value ); ?></li>
                                    <?php }
                    				if(!empty($goal_value)) { ?>
                                    <li><span><i class="fa fa-thumbs-up"></i></span><?php _e( 'Goal ', 'kedavra' ); ?><?php echo sanitize_text_field( $goal_value ); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php if(!empty($donate_button)){ ?>
                            <div class="button">
                                <a class="link" href="<?php echo esc_url( $donate_link ); ?>"><?php echo sanitize_text_field( $donate_button ); ?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="cause-description">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="col-md-4 sidebar-right">
                <?php dynamic_sidebar( 'causes-sidebar' ); ?>
            </div>
        </div>
    </div>
    <!-- container -->
<script type="text/javascript">
jQuery('.skills-bar').each(function() {
        jQuery(this).find('.bar').animate({
            width: jQuery(this).attr('data-percent')
        }, 6000);
    });
</script>

</section>
<!-- section -->
<?php } ?><!-- end of conditional causes -->

<?php if($portfolio_type == 'agency') { ?>

<section class="single-portfolio with-detail page-wrapper">
    <div class="container">
        <div class="row">
            
            <div class="project-image wow fadeInUp col-md-6">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="project-details col-md-6">
                <h3 class="title"><?php the_title(); ?></h3>
                <div class="client-detail">
                <?php if(!empty($client_name)){ ?>
                    <p><?php _e( 'Client : ', 'kedavra' ); ?><span class="client"><?php echo sanitize_text_field( $client_name ); ?></span></p>
                <?php }
                if(!empty($release_date)) { ?>
                    <p><?php _e( 'Date : ', 'kedavra' ); ?><span class="date"><?php echo sanitize_text_field( $release_date ); ?></span></p>
                <?php }
                if(!empty($website_name)) { ?>
                    <p><?php _e( 'Online : ', 'kedavra' ); ?><span class="link"><a href="<?php echo esc_url( $website_name ); ?>"><?php echo sanitize_text_field( $website_name ); ?></a></span></p>
                <?php } ?>
                </div>
                <div class="description">
                    <?php the_content(); ?>
                </div>
                <div class="pagination-portfolio">
                    <?php previous_post_link('%link','Previous'); ?>
                    <?php next_post_link('%link','Next'); ?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php } ?><!-- end of conditional architect -->

<?php if($portfolio_type == 'architect') { ?>

<section class="single-portfolio full-width-detail page-wrapper">
<?php $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
    <div class="image-project full-width" style="background-image: url(<?php echo esc_url( $post_thumb[0] ); ?>);"></div>
    <div class="container">

        <div class="project-details">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="title"><?php the_title(); ?></h3>
                    <div class="client-detail">
                        <?php if(!empty($client_name)){ ?>
                            <p><?php _e( 'Client : ', 'kedavra' ); ?><span class="client"><?php echo sanitize_text_field( $client_name ); ?></span></p>
                        <?php }
                        if(!empty($release_date)) { ?>
                            <p><?php _e( 'Date : ', 'kedavra' ); ?><span class="date"><?php echo sanitize_text_field( $release_date ); ?></span></p>
                        <?php }
                        if(!empty($website_name)) { ?>
                            <p><?php _e( 'Online : ', 'kedavra' ); ?><span class="link"><a href="<?php echo esc_url( $website_name ); ?>"><?php echo sanitize_text_field( $website_name ); ?></a></span></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="pagination-portfolio">
                <?php previous_post_link('%link','Previous'); ?>
                <?php next_post_link('%link','Next'); ?>
            </div>
        </div>

    </div>
</section>
<?php } ?><!-- end of conditional architect -->

<?php endwhile; // end of the loop. ?>

<?php kedavra_footer_type_choice(); ?>