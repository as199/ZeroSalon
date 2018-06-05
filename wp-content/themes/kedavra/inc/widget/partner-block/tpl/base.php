<?php 
    $partner_display    = $instance['partner_display'];
?>
<!-- section -->
<div class="container clearfix">
<div id="sponsors">
	<div class="sponsor-wrapper">
	<?php foreach( $instance['partner_item'] as $i => $partner ) :  

	    $src = wp_get_attachment_image_src($partner['partner_img'], 'full' ); 
	        $attr = array(
	            'src' => $src[0],
	        );    

	    ?>
		<div class="sponsor">
			<a href="#">
				<img <?php foreach($attr as $n => $v) echo esc_attr($n).'="' . esc_attr($v) . '" ' ?> alt="<?php echo sanitize_text_field( $partner['partner_name'] ); ?>"  />
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- section -->
<script type="text/javascript">
    jQuery(document).ready(function() {

         jQuery(".sponsor-wrapper").owlCarousel({
            items: <?php echo sanitize_text_field( $partner_display ); ?>,
            pagination: false,
            navigation: false,
                    
         });
    });
</script>
</div>