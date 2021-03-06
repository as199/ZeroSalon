<?php

class kedavra_latest_work_Widget extends WP_Widget {
	
	function kedavra_latest_work_Widget()
	{
		$widget_ops = array('classname' => 'kedavra_latest_work', 'description' => '');

		$control_ops = array('id_base' => 'kedavra_latest_work-widget');

		parent::__construct('kedavra_latest_work-widget', 'Kedavra Latest Portfolio', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo  $before_title.$title.$after_title;
		} ?>

	    	<div class="other-cause">
				<ul>
		    	<?php 
	    		    $latest_work_wid = array(
				        'post_type'       => 'kedavra-portfolio',
				        'posts_per_page'	=> $instance['amount'],
				        'ignore_sticky_posts' => 1,						        
				    );
		    		$latest_work_loop = new WP_Query($latest_work_wid); 
		    		if ($latest_work_loop->have_posts()) : while($latest_work_loop->have_posts()) : $latest_work_loop->the_post(); 
			        global $post;
			        
			            $categogry_terms = get_the_terms($post->ID, 'portfolio-category');
			                foreach($categogry_terms as $term){
			                $category_name = $term->name;
			                $category_slug = $term->slug;
			            }
		    		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
					    $blogwidimg = aq_resize($img_url[0],  105 , 80, true);
		    	?>
		    	
			    	<!-- widget-news -->
			    	<li class="latest-work-item">
                        <div class="thumb-img">
                            <a href="<?php the_permalink(); ?>">
	                            <?php if ( has_post_thumbnail()) { ?>
									<img src="<?php echo esc_url( $blogwidimg ); ?>" alt="">
								<?php }

								else {
									echo '<img src="'. KEDAVRA_DIR .'/img/placeholder-latestwork-widget.jpg" />';
								}

								?>
	                        </a>
                        </div>
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
		$defaults = array('title' => 'Related Portfolio', 'amount' => '5');
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

add_action( 'widgets_init', create_function('', 'return register_widget("kedavra_latest_work_Widget");') );