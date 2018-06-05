<?php
	$per_row			= $instance['per_row']; 
	$feature_type		= $instance['feature_type']; 
?>

<?php 
if($feature_type == 'style1'){
foreach( $instance['feature_block'] as $i => $feature ) :

	$feature_img		= $feature['feature_img'];
	$feature_icon 		= $feature['feature_icon'];
	$feature_title 		= $feature['feature_title'];
	$feature_subtitle	= $feature['feature_subtitle'];
	$feat_text_color	= $feature['feat_text_color'];
	$text_align			= $feature['text_align'];

	$feature_block_anim	= $feature['feature_block_anim'];
	$feature_block_delay= $feature['feature_block_delay'];
?>

<!-- section -->
<div class="feature wow <?php echo sanitize_text_field( $feature_block_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $feature_block_delay ); ?>s" style="width: <?php echo round( 100 / $per_row, 3 ) ?>%">
<?php 
$feat_src = wp_get_attachment_image_src($feature_img, 'full' ); 
$attr = array(
    'src' => $feat_src[0],
); ?>
	<?php if(!empty( $feature_img ) ) { ?>
	<img class="icon" src="<?php echo esc_url( $feat_src[0] ); ?>" alt="">
	<?php }
	else {
		echo siteorigin_widget_get_icon( $feature_icon );
	} ?>
	<h4 class="title <?php echo sanitize_text_field( $text_align ); ?>" style="color: <?php echo esc_html( $feat_text_color ); ?>"><?php echo sanitize_text_field( $feature_title ); ?></h4>
	<div class="<?php echo sanitize_text_field( $text_align ); ?>"><?php echo balancetags( $feature_subtitle ); ?></div>
</div>
<!-- section -->
<?php endforeach; 
} ?>

<?php 
if($feature_type == 'style2'){
foreach( $instance['feature_block'] as $i => $feature2 ) :

	$feature_img2		= $feature2['feature_img'];
	$feature_icon2 		= $feature2['feature_icon'];
	$feature_title2 	= $feature2['feature_title'];
	$feature_subtitle2	= $feature2['feature_subtitle'];
	$feat_text_color2	= $feature2['feat_text_color'];
	$text_align2		= $feature2['text_align'];

	$feature_block_anim2	= $feature2['feature_block_anim'];
	$feature_block_delay2	= $feature2['feature_block_delay'];
?>

<!-- section -->
<div class="feature-item wow <?php echo sanitize_text_field( $feature_block_anim2 ); ?>" data-wow-delay="<?php echo sanitize_text_field( $feature_block_delay2 ); ?>s" style="width: <?php echo round( 100 / $per_row, 3 ) ?>%">
<?php 
$feat_src2 = wp_get_attachment_image_src($feature_img2, 'full' ); ?>
	<div class="feature-img">
		<?php if(!empty( $feature_img2 ) ) { ?>
			<img src="<?php echo esc_url( $feat_src2[0] ); ?>" alt="">
		<?php }
		else {
			echo siteorigin_widget_get_icon( $feature_icon2 );
		} ?>
	</div>
	<div class="feature-desc <?php echo sanitize_text_field( $text_align2 ); ?>">
		<h5 style="color: <?php echo esc_html( $feat_text_color2 ); ?>"><?php echo sanitize_text_field( $feature_title2 ); ?></h5>
		<p style="color: <?php echo esc_html( $feat_text_color2 ); ?>; opacity: 0.5;"><?php echo balancetags( $feature_subtitle2 ); ?></p>
	</div>
</div>
<!-- section -->
<?php endforeach; 
} ?>