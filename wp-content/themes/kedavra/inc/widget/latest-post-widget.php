<?php

class kedavra_latest_thumb_Widget extends WP_Widget {
	
	function kedavra_latest_thumb_Widget()
	{
		$widget_ops = array('classname' => 'kedavra_latest_thumb', 'description' => '');

		$control_ops = array('id_base' => 'kedavra_latest_thumb-widget');

		parent::__construct('kedavra_latest_thumb-widget', 'Kedavra Latest Post', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo  $before_title.$title.$after_title;
		} ?>

	    	<div class="post-type-widget">
				<ul>
		    	<?php 
		    		    $latest_post_wid = array(
					        'post_type'         => 'post',
					        'posts_per_page'	=> $instance['amount'],
					        'ignore_sticky_posts' => 1,						        
					    );
		    		$latest_thumb = new WP_Query($latest_post_wid); 
		    		if ($latest_thumb->have_posts()) : while($latest_thumb->have_posts()) : $latest_thumb->the_post();
		    		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
					    $blogwidimg = aq_resize($img_url[0],  110 , 80, true);
		    	?>
		    	
			    	<!-- widget-news -->
	                <li class="clearfix">
	                    <span class="post-category">
	                        <a href="<?php the_permalink(); ?>"><?php the_category(' , '); ?></a>
	                    </span>
	                    <figure class="post-thumbnail">
	                        <a href="<?php the_permalink(); ?>">
	                            <?php if ( has_post_thumbnail()) { ?>
									<img src="<?php echo esc_url( $blogwidimg ); ?>" alt="">
								<?php }

								else {
									echo '<img src="'. KEDAVRA_DIR .'/img/placeholder-latestpost-widget.jpg" />';
								}

								?>
	                        </a>
	                    </figure>
	                    <h2 class="post-title">
	                         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                    </h2>
	                </li>
	                <!-- widget-news end -->
		    	  
		    	<?php 
		    		endwhile; wp_reset_postdata(); endif;
		    	?>
	            </ul>
	    	</div>
		
		<?php echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		if( is_numeric($new_instance['amount']) ){
			$instance['amount'] = $new_instance['amount'];
		} else {
			$new_instance['amount'] = '3';
		}

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Latest Posts', 'amount' => '3');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('amount'); ?>">Amount of Posts:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('amount'); ?>" name="<?php echo $this->get_field_name('amount'); ?>" value="<?php echo $instance['amount']; ?>" />
		</p>
	<?php
	}
}

add_action( 'widgets_init', create_function('', 'return register_widget("kedavra_latest_thumb_Widget");') );