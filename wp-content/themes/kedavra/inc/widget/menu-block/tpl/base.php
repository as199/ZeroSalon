<?php 
	$menu_item			= $instance['menu_item'];
?>

<div class="menu-list">
	<ul>
	<?php foreach( $menu_item as $i => $menu ) : 

	$menu_block_anim 	= $menu['menu_block_anim'];
	$menu_block_delay 	= $menu['menu_block_delay'];
	?>
		<li class="product wow <?php echo sanitize_text_field( $menu_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $menu_block_delay ); ?>s">
			<div class="info"> 
				<h4 class="name" style="color: <?php echo esc_html( $menu['menu_title_color'] ); ?>;"><?php echo sanitize_text_field( $menu['menu_title'] ); ?></h4>
				<h4 class="price" style="color: <?php echo esc_html( $menu['menu_price_color'] ); ?>;"><?php echo sanitize_text_field( $menu['menu_price'] ); ?></h4>
				<p class="text" style="color: <?php echo esc_html( $menu['menu_subtitle_color'] ); ?>;"><?php echo sanitize_text_field( $menu['menu_subtitle'] ); ?></p>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
</div>