<?php 
	$title_type			= $instance['title_type'];
	$the_title			= $instance['the_title'];
	$font_style			= $instance['the_title']['font_style'];
	$color				= $the_title['color'];
	$align				= $the_title['align'];
	
    $title_overlay_color  = $instance['title_overlay_color'];
    $overlay_level          = $instance['overlay_level'];

    $title_block_anim          = $instance['title_block_anim'];
    $title_block_delay          = $instance['title_block_delay'];
?>

<?php if($title_type == 'featured') { ?>
<div class="menu clearfix">
	<div class="cover">
		<div class="overlay" style="background-color: <?php echo esc_html( $title_overlay_color ); ?>; opacity: <?php echo sanitize_text_field( $overlay_level ); ?>">
			<!-- container -->
			<div class="container">
				<div class="border">
					<div class="content vertical-center">
						<h1 class="title wow <?php echo sanitize_text_field( $title_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $title_block_delay ); ?>s" style="text-align: <?php echo sanitize_text_field( $align ) ?>; color: <?php echo sanitize_text_field( $color ) ?>; <?php if($font_style == "italic"){ ?>font-style: italic; letter-spacing: 0.01em !important; <?php } ?>"><?php echo sanitize_text_field( $title ); ?></h1>
					</div>  
				</div>
			</div>
			<!-- container -->
		</div>
	</div>
</div>
<?php }
elseif($title_type == 'default') { ?>
	<div class="thetitle wow <?php echo sanitize_text_field( $title_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $title_block_delay ); ?>s">
		<h3 style="text-align: <?php echo sanitize_text_field( $align ) ?>; color: <?php echo sanitize_text_field( $color ) ?>; <?php if($font_style == "italic"){ ?>font-style: italic; letter-spacing: 0.01em !important; <?php } ?>"><?php echo sanitize_text_field( $title ); ?></h3>
	</div>
<?php } 
elseif($title_type == 'subtitled') { 
	$subtitle 		= $instance['the_title']['subtitle'];
	?>
	<div class="section-title">
        <h3 class="title agency wow <?php echo sanitize_text_field( $title_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $title_block_delay ); ?>s" style="text-align: <?php echo sanitize_text_field( $align ) ?>; color: <?php echo sanitize_text_field( $color ) ?>; <?php if($font_style == "italic"){ ?>font-style: italic; letter-spacing: 0.01em !important; <?php } ?>"><?php echo sanitize_text_field( $title ); ?></h3>
        <div class="wow <?php echo sanitize_text_field( $title_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $title_block_delay ); ?>s" style="text-align: <?php echo sanitize_text_field( $align ) ?>;"><?php echo balancetags( $subtitle ); ?></div>
    </div>
<?php } ?>