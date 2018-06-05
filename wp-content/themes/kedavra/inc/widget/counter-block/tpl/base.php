<?php
    $last_row = floor( ( count($instance['counter_item']) - 1 ) / $instance['per_row'] );
    $counter_border			= $instance['counter_border']; 

    $counter_anim 		= $instance['counter_anim'];
	$anim_counter_delay = $instance['anim_counter_delay'];
?>

<?php if($counter_border == true){
echo '<div class="number-counter offset">';
echo '<div class="container"><div class="border vertical-center clearfix">';
} ?>
<div class="foranim clearfix text-center wow <?php echo sanitize_text_field( $counter_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anim_counter_delay ); ?>s">
<?php foreach( $instance['counter_item'] as $i => $counter ) : ?>
	<div class="counter-box box-item <?php if(  floor( $i / $instance['per_row'] ) == $last_row ) echo 'sow-features-feature-last-row' ?>" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%;">
		<div class="counter-content">
			<h1 class="counter" style="color: <?php echo esc_html( $counter['counter_color'] ); ?>"><?php echo sanitize_text_field( $counter['counter_number'] ); ?></h1>
			<h4 style="color: <?php echo esc_html( $counter['counter_color'] ); ?>"><?php echo sanitize_text_field( $counter['counter_title'] ); ?></h4>
		</div>
	</div>
<?php endforeach; ?>
</div>
<?php if($counter_border == true){
echo '</div></div>';
echo '</div>';
} ?>
