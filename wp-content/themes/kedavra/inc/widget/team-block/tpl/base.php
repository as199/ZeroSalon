<?php
    $team_type		= $instance['team_type']; 
    $team_display	= $instance['team_display']; 

    $team_img_anim    = $instance['team_img_anim']; 
    $team_img_delay   = $instance['team_img_delay']; 
    $team_desc_anim   = $instance['team_desc_anim']; 
    $team_desc_delay  = $instance['team_desc_delay']; 
?>

<?php
if($team_type == 'style1'){ ?>
<!-- our-volunteer -->
<div class="our-volunteer">        
    <div class="volunteer row">

    <?php $team1 = array(

    'post_type'        => 'kedavra_team',
    'post_status'        => 'publish',
    'posts_per_page'     => $team_display,

    );

    $team_hook1 = new WP_Query($team1);
    if ($team_hook1->have_posts()) : while($team_hook1->have_posts()) : $team_hook1->the_post();
  
  	$team_function 			= get_field('team_function');
	$facebook 				= get_field('facebook');
	$twitter 				= get_field('twitter');
	$google_plus 			= get_field('google_plus');
	$instagram 				= get_field('instagram');
	$behance 				= get_field('behance');
	$dribble 				= get_field('dribble');

	if (has_post_thumbnail()) { 
        $team_url1 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
            $team_img1 = aq_resize($team_url1[0],  360 , 380, false);
        } ?>

        <div class="skat" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
            <div class="volunteer-item">
            	<div class="team-thumb wow <?php echo sanitize_text_field( $team_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $team_img_delay ); ?>s">
                	<img src="<?php echo esc_url( $team_img1 ); ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="overlay">
                    <div class="volunteer-detail wow <?php echo sanitize_text_field( $team_desc_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $team_desc_delay ); ?>s">
                        <h3 class="name"><?php the_title(); ?></h3>
                        <p class="position"><?php echo sanitize_text_field( $team_function ); ?></p>
                        <div class="description"><?php the_content(); ?></div>
                        <div class="social-links">
                            <ul>
                            <?php if(!empty($facebook)){ ?>
                                <li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook-square"></i></a></li>
                            <?php }
                            if(!empty($twitter)){ ?>
                                <li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter-square"></i></a></li>
                            <?php }
                            if(!empty($instagram)){ ?>
                                <li><a href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php }
                            if(!empty($google_plus)){ ?>
                                <li><a href="<?php echo esc_url( $google_plus ); ?>"><i class="fa fa-google-plus-square"></i></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; wp_reset_postdata(); endif; ?>

    </div>
</div>
<!-- our-volunteer -->
<?php }

if($team_type == 'style2'){ ?>
<!-- team-list -->
<div class="team-list clearfix">

	<?php $team2 = array(

    'post_type'        => 'kedavra_team',
    'post_status'        => 'publish',
    'posts_per_page'     => $team_display,

    );

    $team_hook2 = new WP_Query($team2);
    if ($team_hook2->have_posts()) : while($team_hook2->have_posts()) : $team_hook2->the_post();
  
  	$team_function 			= get_field('team_function');
	$facebook 				= get_field('facebook');
	$twitter 				= get_field('twitter');
	$google_plus 			= get_field('google_plus');
	$instagram 				= get_field('instagram');
	$behance 				= get_field('behance');
	$dribble 				= get_field('dribble');

	if (has_post_thumbnail()) { 
        $team_url2 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
            $team_img2 = aq_resize($team_url2[0],  290 , 325, false);
        } ?>

    <div class="team-member skat" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
        <div class="team-content clearfix">
            <div class="team-details col-md-6 wow <?php echo sanitize_text_field( $team_desc_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $team_desc_delay ); ?>s">
                <h3><?php the_title(); ?></h3>
                <p class="position"><?php echo sanitize_text_field( $team_function ); ?></p>
                <?php the_content(); ?>
                <ul>
                    <?php if(!empty($facebook)){ ?>
                        <li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php }
                    if(!empty($twitter)){ ?>
                        <li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php }
                    if(!empty($twitter)){ ?>
                        <li><a href="<?php echo esc_url( $behance ); ?>"><i class="fa fa-behance"></i></a></li>
                    <?php }
                    if(!empty($instagram)){ ?>
                        <li><a href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php }
                    if(!empty($google_plus)){ ?>
                        <li><a href="<?php echo esc_url( $google_plus ); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
           	<div class="team-thumb2 col-md-6 wow <?php echo sanitize_text_field( $team_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $team_img_delay ); ?>s">
            	<img src="<?php echo esc_url( $team_img2 ); ?>" alt="<?php the_title(); ?>">
            </div>
        </div>
    </div>

    <?php endwhile; wp_reset_postdata(); endif; ?>

</div>
<!-- team-list -->
<?php } ?>